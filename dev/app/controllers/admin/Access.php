<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->site->load('access/menu');
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('ID');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Logout !</div>');
			redirect('auth');
	}


}

/* End of file Access.php */
/* Location: ./application/controllers/Access.php */