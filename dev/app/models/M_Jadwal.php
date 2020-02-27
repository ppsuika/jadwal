<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Jadwal extends SI_Model {

	public $table_name = 'ci_jadwal';
	protected $primary_key = 'id';

	public $id = 'id';
	var $column_order = array(null, 'nama_prodi','nama_matkul', 'nama_dosen','nama_ruangan','sesi_kuliah','tanggal', null);
	var $column_search = array('ci_prodi.nama_prodi','ci_matkul.nama_matkul', 'ci_dosen.nama_dosen', 'ci_jadwal.tanggal'); 
	var $order = array('id' => 'desc'); // default order 
	var $select = array('ci_jadwal.id','ci_prodi.nama_prodi','ci_jadwal.semester','ci_matkul.nama_matkul','ci_dosen.nama_dosen','ci_jadwal.dosen_pengganti','ci_ruangan.nama_ruangan','ci_ruangan.gedung','ci_jadwal.jml_mahasiswa','ci_jadwal.jam_mulai','ci_jadwal.jam_berakhir','ci_jadwal.tanggal','si_group.group', 'ci_jadwal.group_id', 'ci_jadwal.sesi_kuliah');
	var $join = array(
		'ci_prodi' => 'ci_prodi.id = ci_jadwal.nama_prodi',
		'ci_matkul' => 'ci_matkul.id = ci_jadwal.nama_matkul',
		'ci_dosen' => 'ci_dosen.id = ci_jadwal.nama_dosen',
		'ci_ruangan' => 'ci_ruangan.id = ci_jadwal.kode_ruangan',
		'si_group' => 'si_group.group_id = ci_jadwal.group_id',
	);




	public function __construct()
	{
		parent::__construct();
		
	}

	public function jadwal_where($where)
	{
		$this->where = $where;
	}


	public function get_jadwal($where = NUll)
	{
		$select_dat = implode(', ', $this->select);
		$this->db->select($select_dat);
        $this->db->from($this->table_name);
        //$this->db->join('role', 'ar_users.role = role.id', 'left');
        $this->getJoin();
        $this->db->where($where);
        $this->db->order_by('jam_mulai', 'ASC');
        $query = $this->db->get();  
        return $query->result();  
	}

	public function get_range($data)
	{
		$condition = "nama_dosen = ".$data['nama_dosen']." AND tanggal BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where($condition);
		$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
	}

}

/* End of file M_Ruangan.php */
/* Location: ./application/models/M_Ruangan.php */