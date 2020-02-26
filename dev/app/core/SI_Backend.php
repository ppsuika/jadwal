<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SI_Backend extends SI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'M_User' => 'muser'
		));
		$this->load->helper(array('cookie','MY','admin'));
		$this->load->library(array('session', 'pagination'));

		$this->site->side = 'backend';
		$this->site->template = 'adminlte';
		$this->site->modul = 'modular';
		$this->site->is_loggedin();
		$this->load->model('M_menu', 'menu');

		$config = [
			'data_menu' => $this->menu->getMenu_role('', 1),
		];
		$this->load->library('Multi_menu');
		$this->multi_menu->initialize($config);
		// $menu = $this->db->get('user_sub_menu')->result_array();
		// foreach ($menu as $m) {
		// 	$a[$m['id']]=  $m['url'];
		// }
		// $config['link_in'] = $a;
		
  //   	$this->multi_menu->set_items($menu);
  //   	$this->multi_menu->initialize($config);
  //   	$this->site->is_loggedin();
		if (kridensial() != true) {
			$this->session->set_flashdata('message', 'Maaf ! Anda tidak memiliki akses ke halaman tersebut !');
			$this->session->set_flashdata('status', true);
			redirect('admin/dashboard');
		}

		
		
	}

	

}



/* End of file backend.php */
/* Location: ./application/controllers/backend.php */