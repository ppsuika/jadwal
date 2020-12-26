<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Dosen extends SI_Model {

	public $table_name = 'ci_dosen';
	protected $primary_key = 'id';

	public $id = 'id';
	var $column_order = array(null,'kode_dosen', 'nama_dosen','kontak', 'email', null);
	var $column_search = array('kode_dosen','nama_dosen','kontak', 'email'); 
	var $order = array('id' => 'desc'); // default order 
	var $select = array('id','kode_dosen','nama_dosen','kontak', 'email', 'nidn', 'avatar');


	public function __construct()
	{
		parent::__construct();
		
	}

}

/* End of file M_Ruangan.php */
/* Location: ./application/models/M_Ruangan.php */