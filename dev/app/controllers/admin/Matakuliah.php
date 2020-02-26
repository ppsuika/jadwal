<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matakuliah extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Matakuliah', '_db');
	}

	public function index()
	{
		$this->site->load('matakuliah/list_matakuliah');
		
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
				$row[] = $r->kode_matkul;
				$row[] = $r->nama_matkul;
				$row[] = $r->sks;
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


	public function create()
	{

		$data = [
			'kode_matkul' 	=> $this->input->post('kode_matkul'),
			'nama_matkul'	=> $this->input->post('nama_matkul'),
			'sks'		=> $this->input->post('sks'	),
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
			$response['message'] = 'Matakuliah Berhasil di Hapus !';
		} else {
			$response['success'] = false;
			$response['message'] = 'Gagal menghapus data Matakuliah !';
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
			'kode_matkul' 	=> $this->input->post('kode_matkul'),
			'nama_matkul'	=> $this->input->post('nama_matkul'),
			'sks'		=> $this->input->post('sks'	),
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
			'nama_matkul' => array(
				'field' => 'nama_matkul' , 
				'label' => 'Nama Matakuliah', 
				'rules' => 'trim|required', 
				'errors' => array('required' => 'Bidang Isi Nama Matakuliah tidak boleh kosong' )
			),
			

		];

		return $rules;
	}

}

/* End of file Ruanga.php */
/* Location: ./application/controllers/Ruanga.php */