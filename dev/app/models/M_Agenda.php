<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Agenda extends SI_Model {

	public $table_name = 'ci_agenda';
	protected $primary_key = 'id_agenda';

	public $id = 'id_agenda';
	var $column_order = array(null, 'judul_kegiatan','kegiatan', 'tanggal','jam_mulai','nama_prodi', null);
	var $column_search = array('ci_agenda.id_agenda','ci_prodi.nama_prodi','ci_agenda.judul_kegiatan','ci_agenda.jenis_kegiatan','ci_agenda.kegiatan','ci_agenda.jam_mulai','ci_agenda.jam_berakhir','ci_agenda.tanggal'); 
	var $order = array('id_agenda' => 'desc'); // default order 
	var $select = array('ci_agenda.id_agenda','ci_prodi.nama_prodi','ci_agenda.judul_kegiatan','ci_agenda.jenis_kegiatan','ci_agenda.kegiatan','ci_agenda.jam_mulai','ci_agenda.jam_berakhir','ci_agenda.tanggal');
	var $join = array(
		'ci_prodi' => 'ci_prodi.id = ci_agenda.prodi_id',
	
	);
	public function __construct()
	{
		parent::__construct();
		
	}

	public function now_agenda($where)
	{
		$select_dat = implode(', ', $this->select);
		$this->db->select($select_dat);
        $this->db->from($this->table_name);
        //$this->db->join('role', 'ar_users.role = role.id', 'left');
        $this->getJoin();
        $this->db->where($where);
        $this->db->order_by('id_agenda', 'ASC');
        $query = $this->db->get();  
        return $query->result(); 
	}

}

/* End of file M_Agenda.php */
/* Location: ./application/models/M_Agenda.php */