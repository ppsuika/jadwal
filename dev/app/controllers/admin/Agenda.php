<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Agenda', '_db');
	}

	public function index()
	{
		$data =['nama_prodi' => set_value('nama_prodi')];
		$this->site->load('agenda/agenda_list', $data);
		
	}

	public function ajax()
	{
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
			// if (get_group('group_code') != 'ADM') {
			// 	$this->_db->jadwal_where(['ci_jadwal.group_id' => $this->session->userdata('group')]);	
			// }
		$data_menu = $this->_db->getRequestAjax();

		$data = array();
			$no = $_POST['start'];
			foreach ($data_menu as $r) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $r->judul_kegiatan;
				$row[] = '<strong>#'.$r->jenis_kegiatan.'</strong> - '.$r->kegiatan;
				$row[] = tgl_indo($r->tanggal);
				$row[] = $r->jam_mulai.' s/d '. $r->jam_berakhir;
				$row[] = $r->nama_prodi;
				//add html for action
				$row[] = '
				<div class="text-center"><button type="button" class="btn btn-sm btn-warning edit" title="Edit" id="edit" data-id = "'.$r->id_agenda.'"><i class="fa fa-pencil"></i>Edit </button>
				<button type="button" class="btn btn-sm btn-danger delete" title="Delete" id="delete" data-id = "'.$r->id_agenda.'"><i class="fa fa-trash"></i>Delete</button></div>';
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
		$this->site->load('agenda/agenda_add');
		
	}

	public function add_save()
	{
		$this->__rules();
		if($this->form_validation->run() === false)
		{
			$response['success'] = false;
			$response['message'] = validation_errors();
		}else{

		       $data = [
		       'judul_kegiatan' => $this->input->post('judul_kegiatan'),
		       'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
		       'prodi_id' => $this->input->post('nama_prodi'),
		       'jam_mulai' => $this->input->post('jam_mulai'),
		       'jam_berakhir' => 'Selesai',
		       'tanggal' => $this->input->post('tanggal'),
		       'kegiatan' => $this->input->post('kegiatan'),
		       ];
			$save_data = $this->_db->insert($data);
			if ($save_data) {
				
				if ($this->input->post('save_type') == 'stay') {
					$response['success'] = true;
					$response['message'] = 'Your data has been successfully stored into the database. '.anchor('admin/agenda', ' Go back to list');
				} else {
					$response['success'] = true;
					$response['message'] = false;
				}
			} else {
				$response['success'] = false;

				$response['message'] = 'Gagal menyimpan data Agenda';
			}
		} 

		return $this->response($response);
	}

	public function __rules()
	{
		$this->form_validation->set_rules('kegiatan', 'Isi Kegiatan', 'trim|required', array('required' => 'Isi Kegiatan tidak boleh kosong'));
		
	}

	public function delete()
	{
		$id = $this->input->post('user_id', TRUE);

		$delete = $this->_db->delete($id);
		if ($delete) {
			$response['success'] = true;
			$response['message'] = 'Data Dosen Berhasil di Hapus !';
		} else {
			$response['success'] = false;
			$response['message'] = 'Gagal menghapus data dosen !';
		}
		return $this->response($response);
	}


	public function get_update()
	{
		$id = $this->input->post('user_id', TRUE);
		$data = $this->_db->get_by(['id_agenda' => $id]);
		if ($data) {
			foreach ($data as $row) {
				$response['message'] = $row;
				$response['success'] = true;
			}
		} else {
			$response['message'] = 'Gagal meload data Agenda';
			$response['success'] = false;
		}

		$this->response($response);
	}

	public function update_save()
	{
		$this->__rules();
		if($this->form_validation->run() === false)
		{
			
			$response['success'] = false;
			$response['message'] = validation_errors();
		}else{

	       $data = [
	       'judul_kegiatan' => $this->input->post('judul_kegiatan'),
	       'jenis_kegiatan' => $this->input->post('jenis_kegiatan'),
	       'prodi_id' => $this->input->post('nama_prodi'),
	       'jam_mulai' => $this->input->post('jam_mulai'),
	       'jam_berakhir' => 'Selesai',
	       'tanggal' => $this->input->post('tanggal'),
	       'kegiatan' => $this->input->post('kegiatan'),
	       ];
			$id = $this->input->post('id', TRUE);
			$save_data = $this->_db->update($data, ['id_agenda' => $id]);
			if ($save_data) {
					$response['success'] = true;
					$response['message'] = 'Data Agenda berhasil di update !';
				
			} else {
				$response['success'] = false;

				$response['message'] = 'Gagal mengupdate data Agenda';
			}
		} 

		return $this->response($response);
	}

}

/* End of file Agenda.php */
/* Location: ./application/controllers/Agenda.php */