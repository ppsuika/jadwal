<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SI_Controller extends MX_Controller {

	public $data = array();
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('template', 'form','user','MY_helper'));
		$this->load->library(array('Site', 'form_validation', 'parser'));
		$this->load->model(array());

        $this->data['information'] = $this->loadInfo();

		
	}

	public function response($data, $status = '200')
	{
		die(json_encode($data));
	}

	/**
     * Load Aplication Info
     */
    public function loadInfo()
    {
    	$this->load->model('M_Configuration');
        $dataDB = $this->M_Configuration->getInfo();
        return $dataDB; 
    }


}

/* End of file SI_Controller.php */
/* Location: ./app/core/SI_Controller.php */