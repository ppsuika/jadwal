<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends SI_Auth {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array(
			'required' => '%s Tidak boleh kosong',
			'valid_email' => 'format %s tidak benar',
		));

		$this->form_validation->set_rules('password', 'Password', 'trim|required', array(
			'required' => '%s Tidak boleh kosong',
		));

		if ($this->form_validation->run() == FALSE) {
			$this->site->view('login');
		} else {
			$this->_login();
		}
	}

	public function registration()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->site->view('registration');
		} else {
			$data = [
				'username' => htmlspecialchars($this->input->post('username', TRUE)),
				'email' => htmlspecialchars($this->input->post('email', TRUE)),
				'password' => password_hash($this->input->post('pwd', TRUE), PASSWORD_DEFAULT),
				'image' => 'default.jpg',
				'role_id'	=> 2,
				'is_active'	=> 1,
				'created_on'	=> time()
			];

			$this->muser->insert($data);
			$this->session->set_flashdata('message', 'Akun berhasil terdaftar');
			redirect('auth');
		}
		
	}

	private function _rules()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required', array(
			'required' => '%s Tidak boleh kosong'
		));

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', array(
			'required' => '%s Tidak boleh kosong',
			'valid_email' => 'format %s tidak benar',
			'is_unique'	=> '%s yang anda gunakan telah terdaftar'
		));

		$this->form_validation->set_rules('pwd', 'Password', 'trim|required|min_length[5]|matches[pwd_confirm]', array(
			'required' => '%s Tidak boleh kosong',
			'matches'	=> '%s Tidak Match', 
			'min_length' => '%s Minimal 5 karakter'
		));

		$this->form_validation->set_rules('pwd_confirm', 'Password Confirmation', 'trim|required|matches[pwd]', array(
			'required' => '%s Tidak boleh kosong',
			'matches'	=> '%s Tidak Match' 
		));
	}

	private function _login()
	{
		 
		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);
		$user = $this->muser->get_by(['email' => $email], null, null, true);
		if ($user) {
			if ($user->status == 'Y') {
				if (password_verify($password, $user->password)) {
					$data = [
						'email' => $user->email,
						'role_id'	=> $user->role_id,
						'logged_in'	=> true,
						'ID' => $user->ID,
						'group' => $user->group_id,
					];
					$this->session->set_userdata($data);
					redirect('admin/dashboard','refresh');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Password salah !</div>');
				redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum teraktivasi</div>');
				redirect('auth');
			}
		} else {
			
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum teregistrasi</div>');
			redirect('auth');
		}
	}

	
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */