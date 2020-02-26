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
			'agenda_prodi'	=> $agenda_prodi
		];
		$this->site->load('dashboard', $data);
	}


	public function update_kehadiran()
	{
		$id = $this->input->post('id', TRUE);
		$sesi = $this->input->post('sesi', TRUE);
		$this->db->where(['id' => $id]);
		$data_jadwal = $this->db->get('ci_jadwal')->row();
		$data_update = [
			'tanggal' => $data_jadwal->tanggal,
			'id_dosen' => $data_jadwal->nama_dosen
		];
		
		if (is_array($sesi)) {
			$data_update['sesi_kuliah'] = json_encode($sesi);
			$data_update['jumlah'] = count($sesi);
		} else {
			$data_update['sesi_kuliah'] = $sesi;
		}
		$this->db->where(['id_jadwal' => $id]);
		$this->db->set($data_update);
		$this->db->update('ci_kehadiran_dosen');
		$response['message'] = $sesi;
		$this->response($response);
	}

	public function menu()
	{
		
	}

	
	

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */

/* Perubahan pada tampilan dashboard modular/dashboard 
	* Perubahan Pada Controller Dashboard
	* Perubahan Pada Database tabel ci_agenda, penambahan field , group_id	

*/