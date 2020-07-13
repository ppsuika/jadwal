<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends SI_Frontend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Jadwal', 'db_jadwal');
		$this->load->model('M_Agenda', 'db_agenda');

		
	}

	public function index()
	{
		$jadwal = $this->db_jadwal->get_jadwal(['tanggal' => date('Y-m-d')]);
		$this->db->order_by('ci_agenda.tanggal', 'ASC');
		$this->db->order_by('ci_agenda.jam_mulai', 'ASC');
		$agenda = $this->db_agenda->now_agenda("(ci_agenda.tanggal >= now() - INTERVAL 1 DAY)");
		$data = [
			'title' => 'Dashboard',
			'jadwal' => $jadwal,
			'tanggal' => date('Y-m-d'),
			'agenda'	=> $agenda
		];

		$this->site->view('index',$data);
	}

	public function ajaxFile()
	{
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
			$data_menu = $this->db_agenda->now_agenda("(ci_agenda.tanggal >= now())");
			if ($data_menu) {
				$data_ajax = [
					'data' => $data_menu,
					'message' => true,
				];
			} else {
				$data_ajax = [
					'message' => false
				];
			}

			return $this->response($data_ajax);
		}
	}

	public function ajaxAgenda()
	{
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
			// if (get_group('group_code') != 'ADM') {
			// 	$this->_db->jadwal_where(['ci_jadwal.group_id' => $this->session->userdata('group')]);	
			// }
		$data_menu = $this->db_agenda->getRequestAjax();

		$data = array();
			$no = $_POST['start'];
			foreach ($data_menu as $r) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $r->nama_prodi;
				$row[] = $r->judul_kegiatan;
				$row[] = tgl_indo($r->tanggal).' - '.$r->jam_mulai.' s/d '. $r->jam_berakhir;
				$data[] = $row;
			}

			$json_data = [
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->db_agenda->count_all(),
				"recordsFiltered" => $this->db_agenda->count_filtered(),
				'data' => $data
			];

			return $this->response($json_data);
		}
			
	}

	public function agenda()
	{
		$agenda = $this->db_agenda->now_agenda("(ci_agenda.tanggal >= now() - INTERVAL 1 DAY)");
		print_r($agenda);
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */