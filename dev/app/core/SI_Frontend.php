<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SI_Frontend extends SI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('inflector','admin'));
		$this->load->library(array());
		$this->load->model(array('M_Configuration' => 'db_config', 'M_Templates' => 'ctemplate'));
		$this->site->side = 'frontend';
		/* bagian template setting database */
		$get_template_setting_db = $this->db_config->get_by(array('option_name' => 'template_setting'),NULL,NULL,TRUE,'option_value');
		$template_setting = @unserialize($get_template_setting_db->option_value);
		
		if(!empty($template_setting['template_directory']))
			$this->site->template = $template_setting['template_directory'];		
		else
			$this->site->template = 'default';
		
		$this->site->template_setting = unserialize($template_setting['template_attribute']);
	}

	

}

/* End of file si_frontend.php */
/* Location: ./application/controllers/si_frontend.php */