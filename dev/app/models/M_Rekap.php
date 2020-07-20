<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rekap extends SI_Model {
	public $table_name = 'ci_jadwal';
	protected $primary_key = 'id';

	public $id = 'id';
	var $column_order = array(null,'nama_dosen', 'name','periode', 'tanggal_generate','download', null);
	var $column_search = array('ci_dosen.nama_dosen','excel_reporting.name','excel_reporting.periode_tgl', 'excel_reporting.periode_range', 'excel_reporting.date'); 
	var $order = array('id' => 'desc'); // default order 
	var $select = array('excel_reporting.id','excel_reporting.name','ci_dosen.nama_dosen','excel_reporting.periode_tgl','excel_reporting.periode_range','excel_reporting.date','si_group.group');
	var $join = array(
		'ci_dosen' => 'ci_dosen.id = excel_reporting.id_dosen',
		'si_group' => 'si_group.group_id = excel_reporting.id_group',
	);
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function jadwal_where($where)
	{
		$this->where = $where;
	}

}

/* End of file M_Rekap.php */
/* Location: .//D/Server/www/jadwal/dev/app/models/M_Rekap.php */