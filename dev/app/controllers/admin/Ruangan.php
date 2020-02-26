<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruangan extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Ruangan', '_db');
	}

	public function index()
	{
		$this->site->load('ruangan/list_ruangan');
		
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
				$row[] = $r->kode_ruangan;
				$row[] = $r->nama_ruangan;
				$row[] = $r->gedung;
				$row[] = $r->alpa;
				//add html for action
				$row[] = '
				<div class="text-center"><button type="button" class="btn btn-sm btn-warning edit" title="Edit" id="edit" data-id = "'.$r->id.'"><i class="fa fa-pencil"></i>Edit </button>
				<button type="button" class="btn btn-sm btn-danger delete" title="Delete" id="delete" data-id = "'.$r->id.'"><i class="fa fa-trash"></i>Delete</button></div>
				

				<button type="button" class="btn btn-sm btn-primary alpa" title="Delete" id="alpa" data-id = "'.$r->id.'"><i class="fa fa-trash"></i>Alpa</button></div>
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

	public function change()
	{
		$id = $this->input->post('user_id');
		$data = $this->_db->get_by(['id' => $id]);
		foreach ($data as $row) {
			$data_alpa = $row->alpa;
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

	public function create()
	{

		$data = [
			'nama_ruangan' 	=> $this->input->post('ruangan'),
			'kode_ruangan'	=> $this->input->post('kode_ruangan'),
			'gedung'		=> $this->input->post('gedung'),
		];

		$this->form_validation->set_rules($this->__rules());
		if ($this->form_validation->run() === TRUE) {
			
			$save = $this->_db->insert($data);
			if ($save) {
				$response['success'] = true;
				$response['message'] = 'Data Ruangan Berhasil di Simpan !';
			} else {
				$response['success'] = false;
				$response['message'] = 'Gagal Menyimpan data Ruangan !';
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
			$response['message'] = 'Ruangan Berhasil di Hapus !';
		} else {
			$response['success'] = false;
			$response['message'] = 'Gagal menghapus data Ruangan !';
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
			$response['message'] = 'Gagal meload data ruangan';
			$response['success'] = false;
		}

		$this->response($response);

	}

	public function data_update_save()
	{
		$id = $this->input->post('id', TRUE);
		$data = [
			'nama_ruangan' 	=> $this->input->post('ruangan'),
			'kode_ruangan'	=> $this->input->post('kode_ruangan'),
			'gedung'		=> $this->input->post('gedung'),
		];

		$save_update = $this->_db->update($data, ['id' => $id]);
		if ($save_update) {
			$response['success'] = true;
			$response['message'] = 'Data Ruangan Berhasil di UPdate !';
		} else {
			$response['success'] = false;
			$response['message'] = 'Gagal Mengupdate data Ruangan !';
		}

		return $this->response($response);
	}

	public function __rules()
	{
		$rules = [
			'ruangan' => array(
				'field' => 'ruangan' , 
				'label' => 'Ruangan', 
				'rules' => 'trim|required', 
				'errors' => array('required' => 'Bidang Isi Ruangan tidak boleh kosong' )
			),
			'kode_ruangan' => array(
				'field' => 'kode_ruangan',
				'label' => 'Kode Ruangan',
				'rules' => 'trim|required',
				'errors' => array(
							'required' => 'Bidang isi Kode Ruangan tidak boleh kosong'
						) 
			),

		];

		return $rules;
	}

}

/* End of file Ruanga.php */
/* Location: ./application/controllers/Ruanga.php */