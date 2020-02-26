<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Dosen', '_db');
	}

	public function index()
	{
		$this->site->load('dosen/list_dosen');
		
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
				$row[] = $r->nama_dosen;
				$row[] = $r->kontak;
				$row[] = $r->email;
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
		$this->site->load('dosen/form_dosen');
		
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
		$this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'trim|required', array('required' => 'Nama Dosen tidak boleh kosong'));
		if($this->form_validation->run() === false)
		{
			$response['success'] = false;
			$response['message'] = validation_errors();
		}else{

			$user_avatar_uuid = $this->input->post('user_avatar_uuid');
			$user_avatar_name = $this->input->post('user_avatar_name');

			if (!empty($user_avatar_name)) {
				$user_avatar_name_copy = date('YmdHis') . '-' . $user_avatar_name;
				if (!is_dir(FCPATH . 'si-content/uploads/user')) {

					mkdir(FCPATH . 'si-content/uploads/user');
				}

				@rename(FCPATH . 'si-content/uploads/tmp/' . $user_avatar_uuid . '/' . $user_avatar_name, 
						FCPATH . 'si-content/uploads/img/' . $user_avatar_name_copy);
				$data['avatar'] = $user_avatar_name_copy;
			}

			//insert user ---> harus tambah verifikasi
			if (!empty($this->input->post('avatar_save'))) {
				$data = [

		       'nama_dosen' => $this->input->post('nama_dosen'),

		       'email' => $this->input->post('email'),

		       'kontak' => $this->input->post('kontak'),

		       'nidn' => $this->input->post('nidn'),
		       'avatar' => date('YmdHis') . '-' . $user_avatar_name
		       

		       ];
			} else {
				$data = [

		       'nama_dosen' => $this->input->post('nama_dosen'),

		       'email' => $this->input->post('email'),

		       'kontak' => $this->input->post('kontak'),

		       'nidn' => $this->input->post('nidn'),
		       'avatar' => $this->input->post('avatar_save')
		       

		       ];
			}
		       
			$id = $this->input->post('id', TRUE);
			$save_data = $this->_db->update($data, ['id' => $id]);
			if ($save_data) {
				if (is_dir(FCPATH . 'si-content/uploads/tmp/'. $this->input->post('uuid'))) {
					@rmdir(FCPATH . 'si-content/uploads/tmp/'. $this->input->post('uuid').'/');
				}
				
					$response['success'] = true;
					$response['message'] = 'Data dosen berhasil di update !';
				
			} else {
				$response['success'] = false;

				$response['message'] = 'Gagal mengupdate data dosen';
			}
		} 

		return $this->response($response);
	}


	public function add_save()
	{

		$this->__rules();

		if($this->form_validation->run() === false)

		{

			$response['success'] = false;

			$response['message'] = validation_errors();

		}else

		{

			$user_avatar_uuid = $this->input->post('user_avatar_uuid');
			$user_avatar_name = $this->input->post('user_avatar_name');

			if (!empty($user_avatar_name)) {



				$user_avatar_name_copy = date('YmdHis') . '-' . $user_avatar_name;



				if (!is_dir(FCPATH . 'si-content/uploads/user')) {

					mkdir(FCPATH . 'si-content/uploads/user');

				}



				@rename(FCPATH . 'si-content/uploads/tmp/' . $user_avatar_uuid . '/' . $user_avatar_name, 

						FCPATH . 'si-content/uploads/img/' . $user_avatar_name_copy);



				$data['avatar'] = $user_avatar_name_copy;

			}



			//insert user ---> harus tambah verifikasi
			 

		       $data = [

		       'nama_dosen' => $this->input->post('nama_dosen'),

		       'email' => $this->input->post('email'),

		       'kontak' => $this->input->post('kontak'),

		       'nidn' => $this->input->post('nidn'),
		       'avatar' => date('YmdHis') . '-' . $user_avatar_name
		       

		       ];

			$save_data = $this->_db->insert($data);
			if ($save_data) {
				if (is_dir(FCPATH . 'si-content/uploads/tmp/'. $this->input->post('uuid'))) {
					@rmdir(FCPATH . 'si-content/uploads/tmp/'. $this->input->post('uuid').'/');
				}
				if ($this->input->post('save_type') == 'stay') {
					$response['success'] = true;
					$response['message'] = 'Your data has been successfully stored into the database. '.anchor('admin/dosen', ' Go back to list');
				} else {
					$response['success'] = true;
					$response['message'] = false;
				}
			} else {
				$response['success'] = false;

				$response['message'] = 'Gagal menyimpan data dosen';
			}

			





			

		} 

		return $this->response($response);
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

	public function __rules()
	{

		$this->form_validation->set_rules('nama_dosen', 'Dosen Name', 'trim|required|is_unique[ci_dosen.nama_dosen]', array('required' => 'Nama Dosen tidak boleh kosong', 'is_unique' => 'Nama Dosen sudah terdaftar'));
	}


	/**

	* Upload Image User

	* 

	* @return JSON

	*/

	public function upload_avatar_file()

	{



		$uuid = $this->input->post('qquuid');



		mkdir(FCPATH . 'si-content/uploads/tmp/' . $uuid);



		$config = [

			'upload_path' 		=> './si-content/uploads/tmp/' . $uuid . '/',

			'allowed_types' 	=> 'png|jpeg|jpg|gif',

			'max_size'  		=> '1000'

		];

		

		$this->load->library('upload', $config);

		$this->load->helper('file');



		if ( ! $this->upload->do_upload('qqfile')){

			$result = [

				'success' 	=> false,

				'error' 	=>  $this->upload->display_errors()

			];



    		return $this->response($result);

		}

		else{

			$upload_data = $this->upload->data();



			$result = [

				'uploadName' 	=> $upload_data['file_name'],

				'success' 		=> true,

			];



    		return $this->response($result);

		}





	}







	/**

	* Delete Image User

	* 

	* @return JSON

	*/

	public function delete_avatar_file($uuid)

	{

		

		if (!empty($uuid)) {

			$this->load->helper('file');



			$delete_by = $this->input->get('by');

			$delete_file = false;



			if ($delete_by == 'id') {

				$user = $this->_db->get($uuid);

				$path = FCPATH . 'si-content/uploads/img/'.$user->avatar;



				if (isset($uuid)) {

					if (is_file($path)) {

						$delete_file = unlink($path);

						$this->_db->update(['avatar' => ''], ['id' => $uuid]);

					}

				}

			} else {

				$path = FCPATH . '/si-content/uploads/tmp/' . $uuid . '/';

				$delete_file = delete_files($path, true);

			}



			if (isset($uuid)) {

				if (is_dir($path)) {

					rmdir($path);

				}

			}



			if (!$delete_file) {

				$result = [

					'error' =>  'Error delete file'

				];



	    		return $this->response($result);

			} else {

				$result = [

					'success' => true,

				];



	    		return $this->response($result);

			}

		}

	}



	/**

	* Get Image User

	* 

	* @return JSON

	*/

	public function get_avatar_file($id)

	{

		

		$this->load->helper('file');

		$user = $this->_db->get($id);



		if (!$user) {

			$result = [

				'error' =>  'Error getting file'

			];



    		return $this->response($result);

		} else {

			if (!empty($user->avatar)) {

				$result[] = [

					'success' 				=> true,

					'thumbnailUrl' 			=> base_url('si-content/uploads/img/'.$user->avatar),

					'id' 					=> 0,

					'name' 					=> $user->avatar,

					'uuid' 					=> $user->id,

					'deleteFileEndpoint' 	=> base_url('admin/dosen/delete_avatar_file'),

					'deleteFileParams'		=> ['by' => 'id']

				];



	    		return $this->response($result);

			}

		}

	}

}

/* End of file Ruanga.php */
/* Location: ./application/controllers/Ruanga.php */