<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends SI_Frontend {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $data = array(
		// 		'username' => 'admin',
		// 		'password' => md5('admin'),
		// 		'group' => 'admin',
		// 		'email'	=> 'admin@admin.com'
		// );

		// $id = $this->muser->insert($data);
		// echo $id;

		// $data = array(
		// 		'group' => 'user',
		// 		'email'	=> 'admin@local.com'
		// );
		// $this->muser->update($data, array('ID' => 27));

		$this->site->view('index');
	}
}
