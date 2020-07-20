<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Export extends SI_Model {
	public $table_name = 'excel_reporting';
	protected $primary_key = 'id';

	public $id = 'id';
	var $column_order = array(null,'ci_dosen.nama_dosen', 'excel_reporting.name');
	var $column_search = array('ci_dosen.nama_dosen','excel_reporting.name', 'excel_reporting.date'); 
	var $order = array('excel_reporting.id' => 'desc'); // default order 
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



	public function datatables_data()
	{
		$this->datatables->select('excel_reporting.id, excel_reporting.status_all, excel_reporting.name,ci_dosen.nama_dosen,excel_reporting.periode_tgl,excel_reporting.periode_range,excel_reporting.date,si_group.group');
        $this->datatables->from('excel_reporting');
        $this->datatables->join('si_group', 'excel_reporting.id_group = si_group.group_id');
        $this->datatables->join('ci_dosen', 'ci_dosen.id = excel_reporting.id_dosen');
        $this->db->order_by('excel_reporting.date', 'desc');
        return $this->datatables->generate();
	}

}

/* End of file M_Rekap.php */
/* Location: .//D/Server/www/jadwal/dev/app/models/M_Rekap.php */