<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Jadwal extends SI_Model {

	public $table_name = 'ci_jadwal';
	protected $primary_key = 'id';

	public $id = 'id';
	var $column_order = array(null, 'nama_prodi','nama_matkul', 'nama_dosen','nama_ruangan','sesi_kuliah','tanggal', null);
	var $column_search = array('ci_prodi.nama_prodi','ci_matkul.nama_matkul', 'ci_dosen.nama_dosen', 'ci_jadwal.tanggal'); 
	var $order = array('id' => 'desc'); // default order 
	var $select = array('ci_jadwal.id','ci_prodi.nama_prodi','ci_jadwal.semester','ci_matkul.nama_matkul','ci_dosen.nama_dosen','ci_jadwal.dosen_pengganti','ci_ruangan.nama_ruangan','ci_ruangan.gedung','ci_jadwal.jml_mahasiswa','ci_jadwal.jam_mulai','ci_jadwal.jam_berakhir','ci_jadwal.tanggal','si_group.group', 'ci_jadwal.group_id', 'ci_jadwal.jam_masuk', 'ci_jadwal.jam_keluar',  'ci_jadwal.url_video');
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

	public function datatables_data($tanggal = null, $range = null, $periode=null)
	{
		$select_dat = implode(', ', $this->select);
		$this->datatables->select($select_dat);
        $this->datatables->from($this->table_name);
        $this->datatables->join('ci_prodi', 'ci_prodi.id = ci_jadwal.nama_prodi');
        $this->datatables->join('ci_matkul', 'ci_matkul.id = ci_jadwal.nama_matkul');
        $this->datatables->join('ci_dosen', 'ci_dosen.id = ci_jadwal.nama_dosen');
        $this->datatables->join('ci_ruangan', 'ci_ruangan.id = ci_jadwal.kode_ruangan');
        $this->datatables->join('si_group', 'si_group.group_id = ci_jadwal.group_id');
        //$this->datatables->join('si_periode', 'si_periode.id = ci_jadwal.id_periode');
        $this->db->order_by('ci_jadwal.id', 'desc');
        $this->db->order_by('ci_jadwal.jam_mulai', 'ASC');
        if ($this->session->userdata('group') != 6) {
        	$this->db->where(['ci_jadwal.group_id' => $this->session->userdata('group')]);
        }
        
        
        if ($tanggal != null && $range != null && $periode != null) {
			$this->db->where('ci_jadwal.tanggal >=', $tanggal );
			$this->db->where('ci_jadwal.tanggal <=', $range );
			$this->db->where('ci_jadwal.id_periode', $periode );
        } else if ($tanggal != null && $range == null && $periode == null) {
        	$this->db->where('ci_jadwal.tanggal', $tanggal );
        } else if ($range != null && $tanggal == null && $periode == null) {
        	$this->db->where('ci_jadwal.tanggal', $range );
        } else if ($periode != null && $tanggal == null && $range == null) {
        	$this->db->where('ci_jadwal.id_periode', $periode );
        } else if ($tanggal != null && $range != null ) {
			$this->db->where('ci_jadwal.tanggal >=', $tanggal );
			$this->db->where('ci_jadwal.tanggal <=', $range );
		} else if ($tanggal != null && $range == null ) {
        	$this->db->where('ci_jadwal.tanggal', $tanggal );
        } else if ($range != null && $tanggal == null ) {
        	$this->db->where('ci_jadwal.tanggal', $range );
        } else {
        	$this->db->where(['tanggal' => date('Y-m-d')]);
        }
        return $this->datatables->generate();
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

	public function get_jadwal_($where = NUll)
	{
		$select_dat = implode(', ', $this->select);
		$this->db->select($select_dat);
        $this->db->from($this->table_name);
        //$this->db->join('role', 'ar_users.role = role.id', 'left');
        $this->getJoin();
        $this->db->where($where);
        $this->db->order_by('jam_mulai', 'ASC');
        $query = $this->db->get();  
        return $query->row();  
	}

	public function sesi_kehadiran($where = null)
	{
		$this->db->select('ci_kehadiran_dosen.id_jadwal, ci_dosen.nama_dosen, ci_kehadiran_dosen.tanggal, ci_kehadiran_dosen.sesi_kuliah, ci_kehadiran_dosen.jumlah_sesi, si_group.group');
        $this->db->from('ci_kehadiran_dosen');
        $this->db->join('ci_dosen', 'ci_dosen.id = ci_kehadiran_dosen.id_dosen', 'left');
        $this->db->join('si_group', 'si_group.group_id = ci_kehadiran_dosen.id_group', 'left');
        $this->db->where($where);
        $query = $this->db->get();  
        return $query->row();
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