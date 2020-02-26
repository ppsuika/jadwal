<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SI_Auth extends SI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'M_User' => 'muser'
		));
		$this->load->helper(array('admin'));
		$this->load->library(array('session', 'Access_management'));

		$this->site->side = 'backend';
		$this->site->template = 'adminlte';
		$this->site->modul = 'modular';

		$session_data = $this->session->userdata();
		if (in_array('logged_in', $session_data)) {
			redirect('admin/dashboard');
		} 
		// if ($this->session->userdata('logged_in')) {
		// 	
		// } else if (!$this->session->userdata('logged_in')) {
		// 	
		// }

		
		 
		
	}

	

}

/* End of file SI_Auth.php */
/* Location: ./application/controllers/SI_Auth.php */