<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Image', 'mimage');
		$this->load->model('M_user', '_db');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'user_counts' => '',
		];
		$this->site->load('user/list_user', $data);
	}

	public function requesAjax()
	{
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			$dataAjax = $this->_db->getRequestAjax();
			$data = array();
			$no = $_POST['start'];
			foreach ($dataAjax as $r) {
				 if (is_file(FCPATH . 'si-content/uploads/user/' . $r->avatar)): 
                 $img_url = base_url() . 'si-content/uploads/user/' . $r->avatar; 
                 else: 
                 $img_url = base_url() . 'si-content/uploads/user/default.png'; 
                 endif; 
                 if ($r->status == 'Y') { $status ='checked'; } else {$status = '';}
                 $switch = '<input type="checkbox" name="status" data-user-id="'.$r->ID.'" class="switch-button"'.$status.'>';
                 $chip = '<a class="fancybox" rel="group" href="'.$img_url.'">
                          <img src="'.$img_url.'" alt="Person" width="50" height="50">
                       	 </a>';
				$no++;
				$row = array();
				$row[] = '<p class="text-center">'.$no.'</p>';
				$row[] = '<div class="chip">'.$chip.$r->username."</div>";
				$row[] = $r->fullname;
				$row[] = $r->email;
				$row[] = $r->role;
				$row[] = $r->group;
				$row[] = $r->status;

				//add html for action
				$row[] = '
				<div class="text-center"><button type="button" class="btn btn-sm btn-warning edit" title="Edit" id="edit" data-id = "'.$r->ID.'"><i class="fa fa-pencil"></i>Edit </button>
				<button type="button" class="btn btn-sm btn-danger delete" title="Delete" id="delete" data-id = "'.$r->ID.'"><i class="fa fa-trash"></i>Delete</button></div>';
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
		$data = ['group_id' => $this->session->userdata('group')];
		$this->site->load('user/add_user', $data);
		# code...
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
						FCPATH . 'si-content/uploads/user/' . $user_avatar_name_copy);
				$data['avatar'] = $user_avatar_name_copy;
			}



			//insert user ---> harus tambah verifikasi
		       $data = [
		       'username' => $this->input->post('username'),
		       'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		       'email' => $this->input->post('email'),
		       'fullname' => $this->input->post('fullname'),
		       'role_id' => $this->input->post('role_id'),
		       'group_id' => $this->input->post('group_id'),
		       'status' => 'Y',
		       'avatar' => date('YmdHis') . '-' . $user_avatar_name
		       

		       ];

			$save_data = $this->_db->insert($data);
			if ($save_data) {
				if (is_dir(FCPATH . 'si-content/uploads/tmp/'. $this->input->post('uuid'))) {
					@rmdir(FCPATH . 'si-content/uploads/tmp/'. $this->input->post('uuid').'/');
				}
				if ($this->input->post('save_type') == 'stay') {
					$response['success'] = true;
					$response['message'] = 'Your data has been successfully stored into the database. '.anchor('admin/users', ' Go back to list');
				} else {
					$response['success'] = true;
					$response['message'] = false;
				}
			} else {
				$response['success'] = false;

				$response['message'] = 'Gagal menyimpan data User';
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
			$response['message'] = 'Data User Berhasil di Hapus !';
		} else {
			$response['success'] = false;
			$response['message'] = 'Gagal menghapus data User !';
		}
		return $this->response($response);
	}

	public function get_update()
	{
		$id = $this->input->post('user_id', TRUE);
		$data = $this->_db->get_by(['ID' => $id]);
		if ($data) {
			foreach ($data as $row) {
				$response['message'] = $row;
				$response['success'] = true;
			}
		} else {
			$response['message'] = 'Gagal meload data User';
			$response['success'] = false;
		}

		$this->response($response);
	}

	public function update_save()
	{
		$this->form_validation->set_rules('role_id', 'Role', 'trim|required', array('required' => 'Role tidak boleh kosong'));
		$this->form_validation->set_rules('group_id', 'Group', 'trim|required', array('required' => 'Group tidak boleh kosong'));
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
						FCPATH . 'si-content/uploads/user/' . $user_avatar_name_copy);
				$data['avatar'] = $user_avatar_name_copy;
			}

			//insert user ---> harus tambah verifikasi
			if (!empty($this->input->post('password'))) {
				$data = [
		       'username' => $this->input->post('username'),
		       'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		       'email' => $this->input->post('email'),
		       'fullname' => $this->input->post('fullname'),
		       'role_id' => $this->input->post('role_id'),
		       'group_id' => $this->input->post('group_id'),
		       'status' => 'Y',
		       'avatar' => date('YmdHis') . '-' . $user_avatar_name
		       ];
			} else {

				$data = [
		       'username' => $this->input->post('username'),
		       'email' => $this->input->post('email'),
		       'fullname' => $this->input->post('fullname'),
		       'role_id' => $this->input->post('role_id'),
		       'group_id' => $this->input->post('group_id'),
		       'status' => 'Y',
		       'avatar' => date('YmdHis') . '-' . $user_avatar_name
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

	public function __rules()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[si_users.email]', array('required' => 'Email tidak boleh kosong', 'is_unique' => 'Email sudah terdaftar'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required', array('required' => 'Username tidak boleh kosong'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('required' => 'Password tidak boleh kosong'));
		$this->form_validation->set_rules('role_id', 'Role', 'trim|required', array('required' => 'Role tidak boleh kosong'));
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
			if ($delete_by == 'ID') {
				$user = $this->_db->get($uuid);
				$path = FCPATH . 'si-content/uploads/user/'.$user->avatar;
				if (isset($uuid)) {
					if (is_file($path)) {
						$delete_file = unlink($path);
						$this->_db->update(['avatar' => ''], ['ID' => $uuid]);
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
					'thumbnailUrl' 			=> base_url('si-content/uploads/user/'.$user->avatar),
					'id' 					=> 0,
					'name' 					=> $user->avatar,
					'uuid' 					=> $user->ID,
					'deleteFileEndpoint' 	=> base_url('admin/users/delete_avatar_file'),
					'deleteFileParams'		=> ['by' => 'ID']
				];

	    		return $this->response($result);
			}

		}

	}












	/** END **/

	public function profile()
	{
		$this->load->model('M_Post', 'mpost');
		$data = [
			'title' => 'My Profile',
			'data_user_post' => $this->mpost->get(),
		];
		$this->site->load('user/user_profile', $data);
	}

	public function save_post()
	{
		$id = $this->session->userdata('ID');
		$data = [
			'ID_users' => $id,
			'content' => $this->input->post('editor'),
			'date' => date('Y-m-d'),
		];
		$this->load->model('M_Post', 'mpost');
		$post = $this->mpost->insert($data);
		if ($post) {
			redirect('admin/users/profile');
		}
	}

	public function update_users()
	{
		$id = $this->session->userdata('ID');
		if (!($this->input->post('password')) ) {
			$data = [
				'fullname' => $this->input->post('fullname'),
			];
		}
		$post = $this->muser->update($data, ['ID' => $id]);
		if ($post) {
			redirect('admin/users/profile#profile_settings');
		}
	}

	public function profile_ajax()
	{
		$id = $this->session->userdata('ID');
		$loadData = $this->muser->get_by(['id' => $id]);
		if ($loadData) {
			foreach ($loadData as $row) {
				$response['profile'] = $row;
			}

			$response['status'] = true;
		} else {
			$response['status'] = false;
			$response['message'] = "Gagal meload data profile";
		}

		return $this->response($response);
	}

	public function fileupload()
	{
		$upload_image = $_FILES['image']['name'];
		$id = $this->session->userdata('ID');
		$loadData = $this->muser->get_by(['id' => $id]);
		foreach ($loadData as $row) {
			$avatar = $row->avatar;
		}


		if ($upload_image) {
			$config['upload_path'] = './si-content/uploads/user/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1024';
			$this->load->library('upload', $config);
		
			if ( $this->upload->do_upload('image')){
				$data = array('upload_data' => $this->upload->data());
				$old_image = $avatar;
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'si-content/uploads/user/'.$old_image);
				}

				$new_image = $this->upload->data('file_name');
				$upload = ['avatar' => $new_image];
				$this->muser->update($upload, ['ID' => $this->session->userdata('ID')]);
				redirect('admin/users/profile');
				
			}
			else{
				$error = array('error' => $this->upload->display_errors());
				
			}
		}
		
		
	}

	public function uploadImageEditor()
	{

		// $options = array(
		//   'validation' => array(
		//     'allowedExts' => array('gif', 'jpeg', 'jpg', 'png', 'svg', 'blob'),
		//     'allowedMimeTypes' => array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png', 'image/svg+xml')
		//   )
		// );
		// try {
		//   $response = FroalaEditor_Image::upload('/downloads/', $options);
		//   echo stripslashes(json_encode($response));
		// }
		// catch (Exception $e) {
		//   http_response_code(404);
		// }

		 $allowedExts = array("gif", "jpeg", "jpg", "png");

		    // Get filename.
		    $temp = explode(".", $_FILES["image_param"]["name"]);

		    // Get extension.
		    $extension = end($temp);

		    // An image check is being done in the editor but it is best to
		    // check that again on the server side.
		    // Do not use $_FILES["file"]["type"] as it can be easily forged.
		    $finfo = finfo_open(FILEINFO_MIME_TYPE);
		    $mime = finfo_file($finfo, $_FILES["image_param"]["tmp_name"]);

		    if ((($mime == "image/gif")
		    || ($mime == "image/jpeg")
		    || ($mime == "image/pjpeg")
		    || ($mime == "image/x-png")
		    || ($mime == "image/png"))
		    && in_array($extension, $allowedExts)) {
		        // Generate new random name.
		        $name = sha1(microtime()) . "." . $extension;

		        // Save file in the uploads folder.
		        move_uploaded_file($_FILES["image_param"]["tmp_name"], getcwd() . "/downloads/" . $name);
		        
		        $data = ['name' => $name, 'tag' => 'Post', 'url' => base_url("downloads/". $name), 'thumb' => base_url("downloads/". $name)];
		        $this->mimage->insert($data);
		        // Generate response.
		        $response = new StdClass;
		        $response->link = base_url("downloads/". $name);
		        echo stripslashes(json_encode($response));
		    }
	}

	public function imageLoad()
	{

		$image = $this->mimage->get();
		// Array of image links to return.
	    $response = array();

	    // Image types.
	    $image_types = array(
	                      "image/gif",
	                      "image/jpeg",
	                      "image/pjpeg",
	                      "image/jpeg",
	                      "image/pjpeg",
	                      "image/png",
	                      "image/x-png"
	                  );

	    // Filenames in the uploads folder.
	    $fnames = scandir(FCPATH."downloads");

	    // Check if folder exists.
	    if ($fnames) {
	        // Go through all the filenames in the folder.
	        foreach ($fnames as $name) {
	            // Filename must not be a folder.
	            if (!is_dir($name)) {
	                // Check if file is an image.
	                if (in_array(mime_content_type(getcwd() . "\downloads\/" . $name), $image_types)) {
	                    // Add to the array of links.
	                    
	                    //array_push($response, $image);
	                    //array_push($response, array('thumb' => base_url('downloads/').$name, 'url' => base_url('downloads/').$name, 'tag' => 'images', 'name'=>$name));
	                }
	            }
	        }
	    }

	    // Folder does not exist, respond with a JSON to throw error.
	    else {
	        $response = new StdClass;
	        $response->error = "Images folder does not exist!";
	    }

	    $response = json_encode($image);

	    // Send response.
	    echo ($response);
	}

	public function imageDelete()
	{
	// $filePath = FCPATH."/downloads/9ee0c66bfa983a4db5050002dbc83a868014a0fe.png";
	// if (file_exists($filePath)) {
	//       if (unlink($filePath)) {
	//       	echo "Berhasil";
	//       } else {
	//       	echo "gagal";
	//       }
	// }	
	// 	die();
		 $src = $_POST["src"];

	 //    // Check if file exists.
	 //    if (file_exists(getcwd() . $src)) {
	 //      // Delete file.
	 //      unlink(getcwd() . $src);
	 //    }

	// $filePath = FCPATH."/downloads/". $src;
	//     // Check if file exists.
	//     if (file_exists($filePath)) {
	//       // Delete file.
	//       unlink($filePath);
	//       echo stripslashes(json_encode('Success'));
	//     }	
		$image = $this->mimage->get_by(['url' => $src]);
		foreach ($image as $row) {
			$image_name = $row->name;
		}
	    try {
		  //$response = FroalaEditor_Image::delete($image_name, FCPATH."downloads/");
		  // echo FCPATH."downloads/".$image_name;
		    // Check if file exists.
		    if (file_exists(FCPATH."downloads/".$image_name)) {
		      // Delete file.
		      unlink(FCPATH."downloads/".$image_name);
		      $this->mimage->delete_by(['url' => $src]);
		    }

		}
		catch (Exception $e) {
		  http_response_code(404);
		}
	}


	public function post_delete()
	{
		$this->load->model('M_Post', 'mpost');
		$id = $this->input->post('id', TRUE);
		$delete = $this->mpost->delete($id);
		if ($delete) {
			$response['success'] = true;
			$response['message'] = 'berhasil menghapus data';
		} else {
			$response['success'] = false;
			$response['message'] = 'Gagal menghapus data';
		}

		return $this->response($response);
	}

	

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */