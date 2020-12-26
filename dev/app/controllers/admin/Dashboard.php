<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Agenda', 'db_agenda');
		$this->load->model('M_Jadwal', '_db');
	}

	public function index()
	{
		
		
		/*CATATAN BUAT ACCES MENUNGIKUT MENU MANAJEMEN SIAK*/
		$agenda_prodi = $this->db_agenda->now_agenda(['(ci_agenda.tanggal >= now())', 'group_id' => $this->session->userdata('group')]);
		$agenda = $this->db_agenda->now_agenda("(ci_agenda.tanggal >= now())");
		$jadwal = $this->_db->get_jadwal(['tanggal' => date('Y-m-d')]);
		$jadwal_prodi = $this->_db->get_jadwal(['tanggal' => date('Y-m-d'), 'ci_jadwal.group_id' => $this->session->userdata('group')]);

		$data = [
			'title' => 'Dashboard',
			'jadwal' => $jadwal,
			'agenda' => $agenda,
			'jadwal_prodi' => $jadwal_prodi,
			'agenda_prodi'	=> $agenda_prodi,
			
		];

		
		$this->site->load('dashboard', $data);
	}

	public function show($id)
	{
		$jadwals = $this->_db->get_jadwal(['ci_jadwal.id' => $id]);
		
		$sesi_old = $this->_db->get_jadwal_(['ci_jadwal.id' => $id]);
		foreach ($jadwals as $jadwal) {
			$data['jadwal'] = $jadwal;
		}
		$data['sesi_old'] = $sesi_old;
		



		$this->load->view($this->view_table.'/jadwal/show', $data);
	}




	public function getJadwal($tanggal = null, $range = null, $periode= null)
	{
		

		$this->load->library('datatables');
		
		$this->output_json($this->_db->datatables_data($tanggal, $range, $periode), false);
	}

	public function output_json($data, $encode = true)
    {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

	public function detail($id)
	{
		$jadwals = $this->_db->get_jadwal(['ci_jadwal.id' => $id]);

		$sesi_old = $this->_db->get_jadwal(['ci_jadwal.id' => $id]);
		foreach ($jadwals as $jadwal) {
			$data['jadwal'] = $jadwal;
		}

		foreach ($sesi_old as $rw) {
			$data['sesi_old'] = $rw;
		}
		

		$this->load->view($this->view_table.'/jadwal/detail', $data);
	}

	public function zoom($id)
	{
		$jadwals = $this->_db->get_jadwal(['ci_jadwal.id' => $id]);

		$sesi_old = $this->_db->get_jadwal(['ci_jadwal.id' => $id]);
		foreach ($jadwals as $jadwal) {
			$data['jadwal'] = $jadwal;
		}

		foreach ($sesi_old as $rw) {
			$data['sesi_old'] = $rw;
		}
		

		$this->load->view($this->view_table.'/jadwal/zoom', $data);
	}

	public function save_url()
	{
		$id = $this->input->post('id', TRUE);
		$post = $this->input->post(null, true);
		$url = $post['rekaman'];
		$update = ['url_video' => $url];
		$update_save = $this->_db->update($update, ['id' => $id], 'ci_jadwal');
		if ($update_save) {
			$response['success'] = true; 
			$response['message'] = "berhasil mengupdate data"; 
		} else {
			$response['success'] = false; 
			$response['message'] = "gagal mengupdate data"; 
		}
		$this->response($response);
	}


	public function save_jam()
	{
		$id = $this->input->post('form_kehadiran_id', TRUE);
		$post = $this->input->post(null, true);
		$jam_masuk = $post['jam_mulai'];
		$jam_keluar = $post['jam_berakhir'];
		$update = ['jam_masuk' => $jam_masuk, 'jam_keluar' => $jam_keluar];
		$update_save = $this->_db->update($update, ['id' => $id], 'ci_jadwal');
		if ($update_save) {
			$response['success'] = true; 
			$response['message'] = "berhasil mengupdate data"; 
		} else {
			$response['success'] = false; 
			$response['message'] = "gagal mengupdate data"; 
		}
		$this->response($response);
	}


	public function update_kehadiran()
	{
		$id = $this->input->post('id', TRUE);
		$sesi = $this->input->post('sesi_kuliah', TRUE);
		$update = ['jumlah_sesi' => $sesi];
		$update_save = $this->_db->update($update, ['id_jadwal' => $id], 'ci_kehadiran_dosen');
		$update_save = $this->_db->update($update, ['id' => $id], 'ci_jadwal');
		if ($update_save) {
			$response['success'] = true; 
			$response['message'] = "berhasil mengupdate data"; 
		} else {
			$response['success'] = false; 
			$response['message'] = "gagal mengupdate data"; 
		}
		$this->response($response);
	}

	public function sesis_kehadiran()
	{
		$jadwal['sesi_kuliah'] = $this->_db->get_jadwal(['ci_jadwal.id' => $this->input->post('id')]);
		//$response['sesi_kuliah'] = get_data('ci_jadwal', ['id' => $this->input->post('id')]);
		// $this->db->where(['id_jadwal' => $this->input->post('id')]);
		// $response['sisi_aktif'] = $this->db->get('ci_kehadiran_dosen')->row()->jumlah_sesi;
		return $this->response($jadwal);
	}

	
	

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */

/* Perubahan pada tampilan dashboard modular/dashboard 
	* Perubahan Pada Controller Dashboard
	* Perubahan Pada Database tabel ci_agenda, penambahan field , group_id	

*/