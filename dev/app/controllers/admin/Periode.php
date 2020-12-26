<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_periode', '_db');
	}


	public function index()
	{
		$data = array(
        	'periode_aktif' => set_value('periode_aktif')
    	);
		$this->site->load('periode/list_periode', $data);	
	}

	public function set_periode()
	{
		$data = array(
        	'periode_aktif' => set_value('periode_aktif')
    	);
		$this->site->load('periode/periode_aktif', $data);	
		
	}

	public function set()
	{
		$id = $this->input->post('periode_aktif');
		$data = $this->_db->get();
		foreach ($data as $row) {
			$status = $row->status;
		}

		$data_update = [
			'alpa' => $data_alpa + 1,
		]; 

		$save_update = $this->_db->update($data_update, ['id' => $id]);
		if ($save_update) {
			$response['success'] = true;
			$response['message'] = "berhasil mengupdate";
		} else {
			$response['success'] = false;
			$response['message'] = "Gagal mengupdate";
		}


		

		return $this->response($response);

	}

	public function ajax()
	{
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
		$data_menu = $this->_db->getRequestAjax();

		$data = array();
			$no = $_POST['start'];
			foreach ($data_menu as $r) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $r->periode;
				$row[] = $r->keterangan;
				//add html for action
				$row[] = '
				<div class="text-center"><button type="button" class="btn btn-sm btn-warning edit" title="Edit" id="edit" data-id = "'.$r->id.'"><i class="fa fa-pencil"></i>Edit </button>
				<button type="button" class="btn btn-sm btn-danger delete" title="Delete" id="delete" data-id = "'.$r->id.'"><i class="fa fa-trash"></i>Delete</button></div>
				

				
				';
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

	public function create()
	{

		$data = [
			'periode' 	=> $this->input->post('periode'),
			'keterangan'	=> $this->input->post('keterangan'),
		];

		$this->form_validation->set_rules($this->__rules());
		if ($this->form_validation->run() === TRUE) {
			
			$save = $this->_db->insert($data);
			if ($save) {
				$response['success'] = true;
				$response['message'] = 'Data Periode Berhasil di Simpan !';
			} else {
				$response['success'] = false;
				$response['message'] = 'Gagal Menyimpan data Periode !';
			}

		} else {
			$response['success'] = false;
			$response['message'] = validation_errors();
		}
		
		return $this->response($response);
	}

	public function delete()
	{
		$id = $this->input->post('user_id', TRUE);

		$delete = $this->_db->delete($id);
		if ($delete) {
			$response['success'] = true;
			$response['message'] = 'Periode Berhasil di Hapus !';
		} else {
			$response['success'] = false;
			$response['message'] = 'Gagal menghapus data Periode !';
		}
		return $this->response($response);

	}

	public function data_update()
	{
		$id = $this->input->post('user_id', TRUE);
		$data = $this->_db->get_by(['id' => $id]);
		if ($data) {
			foreach ($data as $row) {
				$response['message'] = $row;
				$response['success'] = true;
			}
		} else {
			$response['message'] = 'Gagal meload data periode';
			$response['success'] = false;
		}

		$this->response($response);

	}

	public function data_update_save()
	{
		$id = $this->input->post('id', TRUE);
		$data = [
			'periode' 	=> $this->input->post('periode'),
			'keterangan'	=> $this->input->post('keterangan'),
		];

		$save_update = $this->_db->update($data, ['id' => $id]);
		if ($save_update) {
			$response['success'] = true;
			$response['message'] = 'Data Periode Berhasil di Update !';
		} else {
			$response['success'] = false;
			$response['message'] = 'Gagal Mengupdate data Periode !';
		}

		return $this->response($response);
	}

	public function __rules()
	{
		$rules = [
			'ruangan' => array(
				'field' => 'periode' , 
				'label' => 'Periode', 
				'rules' => 'trim|required', 
				'errors' => array('required' => '%s tidak boleh kosong' )
			),
		];

		return $rules;
	}

}

/* End of file Periode.php */
/* Location: .//D/Server/www/jadwal/dev/app/controllers/admin/Periode.php */