<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Image extends SI_Model {

	protected $table_name = 'image_manager';
	protected $order_by = 'id';
	protected $order_by_type = 'DESC';
	protected $primary_key = 'id';

	public function __construct()
	{
		parent::__construct();
		
	}

}

/* End of file M_Image.php */
/* Location: ./application/models/M_Image.php */