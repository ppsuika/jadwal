<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_RUangan extends SI_Model {

	public $table_name = 'ci_ruangan';
	protected $primary_key = 'id';

	public $id = 'id';
	var $column_order = array(null, 'kode_ruangan', 'nama_ruangan', 'gedung', 'alpa', null);
	var $column_search = array('kode_ruangan', 'nama_ruangan', 'gedung'); 
	var $order = array('id' => 'desc'); // default order 
	var $select = array('id','kode_ruangan', 'nama_ruangan', 'gedung', 'alpa');


	public function __construct()
	{
		parent::__construct();
		
	}

}

/* End of file M_Ruangan.php */
/* Location: ./application/models/M_Ruangan.php */