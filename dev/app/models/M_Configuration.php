<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Configuration extends SI_Model {

	public $table_name = 'si_options';
	protected $primary_key = 'option_id';
	var $table  = 'info_settings';
	var $prim = 'id';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getInfo()
    {
        $query = $this->db->get($this->table);
		return $query->row_array();
		
	}

	public function getOptions()
    {
        $query = $this->db->get($this->table_name);
		return $query->row_array();
		
	}
	
	public function simpanInfo($data = array())
	{
		$this->db->where($this->prim, 1);
		$this->db->set($data);
		return $this->db->update($this->table);
	}

}

/* End of file M_Configuration.php */
/* Location: ./application/models/M_Configuration.php */