<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Templates extends SI_Model {

	public $table_name = 'si_template';
	protected $primary_key = 'template_id';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function delete_where_not_in($array){
		$this->db->where_not_in('template_directory', $array);
		parent::delete_by(NULL);
	}

}

/* End of file M_Templates.php */
/* Location: ./application/models/M_Templates.php */