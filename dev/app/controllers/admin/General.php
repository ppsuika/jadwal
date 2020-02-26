<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Configuration', '_db');
	}

	public function index()
	{
		$this->site->load('general/index', $this->data);
		
	}

	/**
     * Simpan Data
     * Output @response
     * Perbaikan : Upload image icon, Edit upload image url disallow,
     */
    public function simpan()
    {
        $user_avatar_uuid = $this->input->post('user_avatar_uuid');
        $user_avatar_name = $this->input->post('user_avatar_name');
        if (!empty($user_avatar_name)) {

            $user_avatar_name_copy = date('YmdHis') . '-' . $user_avatar_name;

            if (!is_dir(FCPATH . '/si-content/uploads/img/')) {
                mkdir(FCPATH . '/si-content/uploads/img/');
            }

            @rename(FCPATH . 'uploads/tmp/' . $user_avatar_uuid . '/' . $user_avatar_name, 
                    FCPATH . 'si-content/uploads/img/' . $user_avatar_name_copy);

            
        }


        $saveInfo= [
            'nama_instansi'   => $this->input->post('nama_instansi'),
            'alamat_instansi' => $this->input->post('alamat_instansi'),
            'nama_aplikasi'   => $this->input->post('nama_aplikasi'),
            'icon'         => '',
            'logo_instansi'   => $user_avatar_name_copy  
        ];

        $simpanInfo = $this->_db->simpanInfo($saveInfo);
        if ($simpanInfo) {
				 
            if ($this->input->post('save_type') == 'stay') {
                $response['success'] = true;
                $response['message'] = 'Data berhasil di simpan';
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Gagal Mengupdate Data';
        }

        /** 
        *$savePenandatangan = [
        *    ''   => $this->input->post('nama_pertama'),
        *    ''   => $this->input->post('jabatan_pertama'),
        *    ''   => $this->input->post('nidn_nip_pertama'),
        *    ''   => $this->input->post('nama_kedua'),
        *    ''   => $this->input->post('jabatan_kedua'),
        *    ''   => $this->input->post('nidn_nip_kedua'),
        *];
        */

        return $this->response($response);
    }


	public function uploadImg()
    {
        $final_files_data = array();
	    $this->load->library('upload');
	    $number_of_files_uploaded = count($_FILES['favicon']['name']);
	    // Faking upload calls to $_FILE
	    for ($i = 0; $i < $number_of_files_uploaded; $i++) :
	      $_FILES['faviconfile']['name']     = $_FILES['favicon']['name'][$i];
	      $_FILES['faviconfile']['type']     = $_FILES['favicon']['type'][$i];
	      $_FILES['faviconfile']['tmp_name'] = $_FILES['favicon']['tmp_name'][$i];
	      $_FILES['faviconfile']['error']    = $_FILES['favicon']['error'][$i];
	      $_FILES['faviconfile']['size']     = $_FILES['favicon']['size'][$i];
	      $config = array(
	        'file_name'     => $_FILES['faviconfile']['name'],
	        'allowed_types' => 'jpg|png|ico',
	        //'max_size'      => 3000,
	        'overwrite'     => FALSE,
	        
	        /* real path to upload folder ALWAYS */
	        'upload_path'
	            => './si-content/uploads/img/'
	      );
	      
	      $this->upload->initialize($config);
	      if ( ! $this->upload->do_upload()) :
	        return $error = array('error' => $this->upload->display_errors(), 'path' => $config['upload_path']);
	      else :
	        $final_files_data['favicon'] = $this->upload->data();
	        // Continue processing the uploaded data
	      endif;
        endfor;
        return $final_files_data;
    }

    public function do_upload()
    {
        $config['upload_path']   = './si-content/uploads/img/'; 
        $config['allowed_types'] = 'ico|jpg|png'; 
        $config['max_size']      = 100; 
        $config['max_width']     = 1024; 
        $config['max_height']    = 768;  
        $this->load->library('upload', $config);
        // script upload file pertama
        if(!$this->upload->do_upload('icon')){
            // /return $data = ['error' => $this->upload->display_errors()];
            return $data = $this->upload->data();
        } else {
            return $data =  $this->upload->data();
        }
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
				$path = FCPATH . 'si-content/uploads/img/'.$user->logo_instansi;
				if (isset($uuid)) {
					if (is_file($path)) {
						$delete_file = unlink($path);
						$this->_db->update(['logo_instansi' => ''], ['id' => $uuid]);
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
	public function get_logo_instansi_file($id)
	{

		$this->load->helper('file');
		$user = $this->_db->get($id);
		if (!$user) {
			$result = [
				'error' =>  'Error getting file'
			];
    		return $this->response($result);
		} else {
			if (!empty($user->logo_instansi)) {
				$result[] = [
					'success' 				=> true,
					'thumbnailUrl' 			=> base_url('si-content/uploads/img/'.$user->logo_instansi),
					'id' 					=> 0,
					'name' 					=> $user->logo_instansi,
					'uuid' 					=> $user->ID,
					'deleteFileEndpoint' 	=> base_url('admin/general/delete_logo_instansi_file'),
					'deleteFileParams'		=> ['by' => 'ID']
				];

	    		return $this->response($result);
			}

		}

	}


}

/* End of file General.php */
/* Location: ./application/controllers/General.php */