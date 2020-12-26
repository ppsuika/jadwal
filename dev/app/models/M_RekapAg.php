<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_RekapAg extends SI_Model {
	public $table_name = 'ci_agenda';
	protected $primary_key = 'id_agenda';

	public $id = 'id_agenda';
	
	
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