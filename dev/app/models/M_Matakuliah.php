<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Matakuliah extends SI_Model {

	public $table_name = 'ci_matkul';
	protected $primary_key = 'id';

	public $id = 'id';
	var $column_order = array(null, 'kode_matkul','nama_matkul', 'sks', null);
	var $column_search = array('kode_matkul', 'nama_matkul', 'sks'); 
	var $order = array('id' => 'desc'); // default order 
	var $select = array('id','kode_matkul', 'nama_matkul', 'sks',);


	public function __construct()
	{
		parent::__construct();
		
	}

}

/* End of file M_Ruangan.php */
/* Location: ./application/models/M_Ruangan.php */