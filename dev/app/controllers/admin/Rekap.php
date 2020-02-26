<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekap extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Rekap', '_db');
	}

	public function index()
	{
		$data = array(

        'id' => set_value('id'),

        'nama_prodi' => set_value('nama_prodi'),

        'nama_matkul' => set_value('nama_matkul'),

        'nama_dosen' => set_value('nama_dosen'),

        'nama_ruangan' => set_value('nama_ruangan'),

        'dosen_pengganti' => set_value('dosen_pengganti'),

        'semester' => set_value('semester'),

    	'jam_mulai' => set_value('jam_mulai'),

    	'jam_berakhir' => set_value('jam_berakhir'),

    	'tanggal' => set_value('tanggal'),

    	'jml_mahasiswa' => set_value('jml_mahasiswa'),

    	);
		$this->site->load('rekap/index', $data);
		
	}

	public function get()
	{
		$tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
		$range = date('Y-m-d', strtotime($this->input->post('range')));

		if ($tanggal <= $range) {	
				$response = $this->_db
				->wheres('ci_jadwal.nama_dosen', $this->input->post('nama_dosen'))
				->wheres('ci_jadwal.tanggal >=', $this->input->post('tanggal'))
				->wheres('ci_jadwal.tanggal <=', $this->input->post('range'))
				->getRequestAjax();




		} else {
			$response = $tanggal. "lebih besar dari". $range;
		}
		$this->response($response);
	}

	public function ajax()
	{
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
			if (get_group('group_code') != 'ADM') {
				$this->_db->jadwal_where(['ci_jadwal.group_id' => $this->session->userdata('group')]);	
			}
		$data_menu = $this->_db->getRequestAjax();

		$data = array();
			$no = $_POST['start'];
			foreach ($data_menu as $r) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $r->nama_prodi;
				$row[] = $r->nama_matkul;
				$row[] = $r->nama_dosen;
				$row[] = $r->nama_ruangan;
				$row[] = $r->tanggal;
				//add html for action
				$row[] = '
				<div class="text-center"><button type="button" class="btn btn-sm btn-warning edit" title="Edit" id="edit" data-id = "'.$r->id.'"><i class="fa fa-pencil"></i>Edit </button>
				<button type="button" class="btn btn-sm btn-danger delete" title="Delete" id="delete" data-id = "'.$r->id.'"><i class="fa fa-trash"></i>Delete</button></div>';
				$data[] = $row;
			}

			$json_data = [
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->_db->count_all(),
				"recordsFiltered" => $this->_db->count_filtered(),
				'data' => $data
			];

			return $this->response($json_data);
		}
			

	}

	public function add()
	{

		$data = array(

        'id' => set_value('id'),

        'nama_prodi' => set_value('nama_prodi'),

        'nama_matkul' => set_value('nama_matkul'),

        'nama_dosen' => set_value('nama_dosen'),

        'nama_ruangan' => set_value('nama_ruangan'),

        'dosen_pengganti' => set_value('dosen_pengganti'),

        'semester' => set_value('semester'),

    	'jam_mulai' => set_value('jam_mulai'),

    	'jam_berakhir' => set_value('jam_berakhir'),

    	'tanggal' => set_value('tanggal'),

    	'jml_mahasiswa' => set_value('jml_mahasiswa'),

    	);
		$this->site->load('jadwal/form_jadwal', $data);
		
	}

	public function get_update()
	{
		$id = $this->input->post('user_id', TRUE);
		$data = $this->_db->get_by(['id' => $id]);
		if ($data) {
			foreach ($data as $row) {
				$response['message'] = $row;
				$response['success'] = true;
			}
		} else {
			$response['message'] = 'Gagal meload data Dosen';
			$response['success'] = false;
		}

		$this->response($response);
	}

	public function update_save()
	{
		

			$data = [
		       'nama_prodi' => $this->input->post('nama_prodi'),
		        'nama_matkul' => $this->input->post('nama_matkul'),
		        'nama_dosen' => $this->input->post('nama_dosen'),
		        'dosen_pengganti' => $this->input->post('dosen_pengganti'),
		        'kode_ruangan' => $this->input->post('nama_ruangan'),
		        'semester' => $this->input->post('semester'),
		        'jam_mulai' => $this->input->post('jam_mulai'),
		        'jam_berakhir' => $this->input->post('jam_berakhir'),
		        'tanggal' => $this->input->post('tanggal'),
		        'kode_ruangan' => $this->input->post('nama_ruangan'),
		        'jml_mahasiswa' => $this->input->post('jml_mahasiswa'),
		        'group_id' => $this->session->userdata('group'),
		       ];

		       
			$id = $this->input->post('id', TRUE);
			$save_data = $this->_db->update($data, ['id' => $id]);
			if ($save_data) {
					$response['success'] = true;
					$response['message'] = 'Data Jadwal berhasil di update !';
				
			} else {
				$response['success'] = false;

				$response['message'] = 'Gagal mengupdate data Jadwal';
			}
		 

		return $this->response($response);
	}


	public function add_save()
	{

		// $this->__rules();

		// if($this->form_validation->run() === false)

		// {

		// 	$response['success'] = false;

		// 	$response['message'] = validation_errors();

		// }else

		// {

			
			 

		       $data = [
		       'nama_prodi' => $this->input->post('nama_prodi'),
		        'nama_matkul' => $this->input->post('nama_matkul'),
		        'nama_dosen' => $this->input->post('nama_dosen'),
		        'dosen_pengganti' => $this->input->post('dosen_pengganti'),
		        'kode_ruangan' => $this->input->post('nama_ruangan'),
		        'semester' => $this->input->post('semester'),
		        'jam_mulai' => $this->input->post('jam_mulai'),
		        'jam_berakhir' => $this->input->post('jam_berakhir'),
		        'tanggal' => $this->input->post('tanggal'),
		        'kode_ruangan' => $this->input->post('nama_ruangan'),
		        'jml_mahasiswa' => $this->input->post('jml_mahasiswa'),
		        'group_id' => $this->session->userdata('group'),
		       ];

			$save_data = $this->_db->insert($data);
			if ($save_data) {
				$this->db->set(['id_jadwal' => $save_data, 'id_group' => $this->session->userdata('group')]);
				$this->db->insert('ci_kehadiran_dosen');
				if ($this->input->post('save_type') == 'stay') {
					$response['success'] = true;
					$response['message'] = 'Your data has been successfully stored into the database. '.anchor('admin/jadwal', ' Go back to list');
				} else {
					$response['success'] = true;
					$response['message'] = false;
				}
			} else {
				$response['success'] = false;

				$response['message'] = 'Gagal menyimpan data jadwal';
			}

			





			

		// } 

		return $this->response($response);
	}


	public function delete()
	{
		$id = $this->input->post('user_id', TRUE);

		$delete = $this->_db->delete($id);
		if ($delete) {
			$response['success'] = true;
			$response['message'] = 'Data Jadwal Berhasil di Hapus !';
		} else {
			$response['success'] = false;
			$response['message'] = 'Gagal menghapus data Jadwal !';
		}
		return $this->response($response);
	}

	public function __rules()
	{

		$this->form_validation->set_rules('nama_dosen', 'Dosen Name', 'trim|required|is_unique[ci_dosen.nama_dosen]', array('required' => 'Nama Dosen tidak boleh kosong', 'is_unique' => 'Nama Dosen sudah terdaftar'));
	}

	public function rekap_mengajar()
	{
		$nama_dosen = $this->input->post('nama_dosen', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$range = $this->input->post('range', TRUE);
		$data = array(
			'nama_dosen' =>$nama_dosen,
			'date1' => $tanggal,
			'date2' => $range,
		);	

		$datas = $this->_db->get_range($data);

		
		if ($datas) {
			//foreach ($datas as $row) {
				$response['message'] = $datas;
				$response['success'] = true;
			//}
		} else {
			$response['message'] = "Gagal";
			$response['success'] = false;
		}

		$this->response($response);
	}


	

}

/* End of file Ruanga.php */
/* Location: ./application/controllers/Ruanga.php */