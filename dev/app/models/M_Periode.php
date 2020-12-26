<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Periode extends SI_Model {

	public $table_name = 'si_periode';
	protected $primary_key = 'id';

	public $id = 'id';
	var $column_order = array(null, 'periode','keterangan', null);
	var $column_search = array('periode', 'keterangan'); 
	var $order = array('id' => 'desc'); // default order 
	var $select = array('id','periode', 'keterangan');



	public function __construct()
	{
		parent::__construct();
		
	}

}

/* End of file M_Periode.php */
/* Location: .//D/Server/www/jadwal/dev/app/models/M_Periode.php */