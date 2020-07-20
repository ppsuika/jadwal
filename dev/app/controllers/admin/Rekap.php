<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\IReader;


class Rekap extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Rekap', '_db');
		$this->load->model('M_Export', 'export');
	}

	public function index()
	{
		$data = array(

        'id' => set_value('id'),

        'nama_prodi' => set_value('nama_prodi'),

        'nama_matkul' => set_value('nama_matkul'),

        'nama_dosen' => set_value('nama_dosen'),

        'nama_ruangan' => set_value('nama_ruangan'),

        'dosen_pengganti' => set_value('dosen_pengganti'),

        'semester' => set_value('semester'),

    	'jam_mulai' => set_value('jam_mulai'),

    	'jam_berakhir' => set_value('jam_berakhir'),

    	'tanggal' => set_value('tanggal'),

    	'jml_mahasiswa' => set_value('jml_mahasiswa'),

    	);
		$this->site->load('rekap/index', $data);
		
	}

	public function get()
	{
		if (($this->input->post('tanggal') == null || $this->input->post('range') == null) || ($this->input->post('tanggal') == null && $this->input->post('range') == null) || $this->input->post('nama_dosen') == null) {
			 $this->session->set_flashdata('message', 'tanggal / nama dosen tidak boleh di kosongkan');
			 redirect('admin/rekap');
		}
		$tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
		$range = date('Y-m-d', strtotime($this->input->post('range')));

		if ($tanggal <= $range) {	
				$data = $this->_db->select('ci_jadwal.id,ci_prodi.nama_prodi,ci_jadwal.semester,ci_matkul.nama_matkul,ci_dosen.nama_dosen,ci_jadwal.dosen_pengganti,ci_ruangan.nama_ruangan,ci_ruangan.gedung,ci_jadwal.jml_mahasiswa,ci_jadwal.jam_mulai,ci_jadwal.jam_berakhir,ci_jadwal.tanggal')
				->join('ci_prodi', 'nama_prodi', 'left')
				->join('ci_matkul', 'nama_matkul', 'left')
				->join('ci_dosen', 'nama_dosen', 'left')
				->join('ci_ruangan', 'kode_ruangan', 'left')
				->wheres('ci_jadwal.nama_dosen', $this->input->post('nama_dosen'))
				->wheres('ci_jadwal.tanggal >=', $this->input->post('tanggal'))
				->wheres('ci_jadwal.tanggal <=', $this->input->post('range'))
				->get('');
			$this->load->library("Excel");	


			
			if ($data) {
				$object = new PHPExcel();
				 $object->setActiveSheetIndex(0);

				  $table_columns = array("Program Studi", "Matakuliah", "Dosen", "Ruangan", "Tanggal");

				  $column = 0;
				  foreach($table_columns as $field)
				  {
				   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
				   $column++;
				  }

				  
				  $excel_row = 2;
				  foreach ($data as $row) {
				  
				   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->nama_prodi);
				   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->nama_matkul);
				   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->nama_dosen);
				   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->nama_ruangan);
				   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->tanggal);
				   $excel_row++;
				 }

				  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
				  header('Content-Type: application/vnd.ms-excel');
				  header('Content-Disposition: attachment;filename="Rekap.xls"');
				  echo $object_writer->save('php://output');
			} else {
				$this->session->set_flashdata('message', "Data kehadiran tidak ada");
			 redirect('admin/rekap');
			}
		
		 


		} else {
			$this->session->set_flashdata('message', "tanggal awal tidak boleh lebih besar dari range");
			 redirect('admin/rekap');

		}
	}

	public function excel()
	{


		if (($this->input->post('tanggal') == null || $this->input->post('range') == null) || ($this->input->post('tanggal') == null && $this->input->post('range') == null) || $this->input->post('nama_dosen') == null) {
			 $this->session->set_flashdata('message', 'tanggal / nama dosen tidak boleh di kosongkan');
			 redirect('admin/rekap');
		}
		$tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
		$range = date('Y-m-d', strtotime($this->input->post('range')));

		if ($tanggal <= $range) {	
				$data = $this->_db->select('ci_jadwal.id,ci_prodi.nama_prodi,ci_jadwal.semester,ci_matkul.nama_matkul,ci_dosen.nama_dosen,ci_jadwal.dosen_pengganti,ci_ruangan.nama_ruangan,ci_ruangan.gedung,ci_jadwal.jml_mahasiswa,ci_jadwal.jam_mulai,ci_jadwal.jam_berakhir,ci_jadwal.tanggal, ci_jadwal.sesi_kuliah, ci_jadwal.jumlah_sesi')
				->join('ci_prodi', 'nama_prodi', 'left')
				->join('ci_matkul', 'nama_matkul', 'left')
				->join('ci_dosen', 'nama_dosen', 'left')
				->join('ci_ruangan', 'kode_ruangan', 'left')
				->wheres('ci_jadwal.nama_dosen', $this->input->post('nama_dosen'))
				->wheres('ci_jadwal.tanggal >=', $this->input->post('tanggal'))
				->wheres('ci_jadwal.tanggal <=', $this->input->post('range'))
				->get();



				
			if ($data) {
				$spreadsheet = new Spreadsheet();
        		$sheet = $spreadsheet->getActiveSheet();


				 $spreadsheet->getProperties()->setCreator('PPSUIKA - Jadwal')
				->setLastModifiedBy('PPSUIKA - Jadwal')
				->setTitle('Office 2007 XLSX Test Document')
				->setSubject('Office 2007 XLSX Test Document')
				->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
				->setKeywords('office 2007 openxml php')
				->setCategory('Test result file');
					
				  // Add some data
					$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A1', 'REKAP KEHADIRAN MENGAJAR DOSEN SEKOLAH PASCASARJANA UIKA BOGOR')
					
					->setCellValue('A3', 'Periode : ')
					->setCellValue('B3',  $tanggal.' s/d '.$range )
					->setCellValue('A5', 'Program Studi')
					->setCellValue('B5', 'Semester')
					->setCellValue('C5', 'Matakuliah')
					->setCellValue('D5', 'Ruangan')
					->setCellValue('E5', 'Sesi Wajib')
					->setCellValue('F5', 'Sesi Hadir')
					->setCellValue('G5', 'Tanggal');
					$styleTitle = [
					    'font' => [
					        'bold' => true,
					        'size' => 18,
					    ],
					    'alignment' => [
					        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
					    ]
					];

					$StyleName = [
					    'font' => [
					        'bold' => true,
					        'size' => 15,
					    ],
					    'alignment' => [
					        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
					    ]
					];

					$styleBorder = [
					    'borders' => [
					        'allBorders' => [
					            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
					            'color' => ['argb' => 'FFFF0000'],
					        ],
					        'outline' => [
					            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
					            'color' => ['argb' => 'FFFF0000'],
					        ],
					    ],
					];

					$spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($styleTitle);
					$spreadsheet->getActiveSheet()->getStyle('A2:B3')->applyFromArray($StyleName);
					$spreadsheet->getActiveSheet()->getStyle('A5:G1')->applyFromArray($styleBorder);
					$spreadsheet->getActiveSheet()->mergeCells("B3:G3");
					$spreadsheet->getActiveSheet()->mergeCells("B2:G2");
					$spreadsheet->getActiveSheet()->mergeCells("A1:G1");
					$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);


				  $nama_dosen = '';
				  $excel_row = 6;
				  foreach ($data as $row) {

					  $spreadsheet->setActiveSheetIndex(0)
					  ->setCellValue('A2', 'Nama Dosen : ')
					  ->setCellValue('B2',  $row->nama_dosen )
					  ->setCellValue('A'.$excel_row, $row->nama_prodi)
					  ->setCellValue('B'.$excel_row, $row->semester)
					  ->setCellValue('C'.$excel_row, $row->nama_matkul)
					  ->setCellValue('D'.$excel_row, $row->nama_ruangan)
					  ->setCellValue('E'.$excel_row, $row->sesi_kuliah)
					  ->setCellValue('F'.$excel_row, $row->jumlah_sesi)
					  ->setCellValue('G'.$excel_row, $row->tanggal);
				   
				   $excel_row++;
				   $nama_dosen = $row->nama_dosen;
				 }
				 $writer = new Xlsx($spreadsheet);
				 $spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y'));
				 $spreadsheet->setActiveSheetIndex(0);

				$filename = 'Report Kehadiran-'.$nama_dosen.'-'.date('d-m-Y');
 				$path = FCPATH . 'downloads/reporting/'.$filename.'.xlsx';
 				$data = [
 					'id_dosen' => $this->input->post('nama_dosen'),
		 			'name' => $filename,
		 		];
		 		$this->db->set($data);
		 		$this->db->insert('excel_reporting');
		 		


		        $writer->save($path);
		        $response['status'] = true;
		        $response['message'] = "File berhasil di generate, Silahkan klik download pada button yg di sediakan";



				  // Redirect output to a client’s web browser (Xlsx)
				// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				// header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
				// header('Cache-Control: max-age=0');
				// // If you're serving to IE 9, then the following may be needed
				// header('Cache-Control: max-age=1');

				// // If you're serving to IE over SSL, then the following may be needed
				// header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
				// header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
				// header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
				// header('Pragma: public'); // HTTP/1.0
				// $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
				// $writer->save('php://output');
				// exit;
				
			} else {
				$response['status'] = false;
				$response['message'] = "Data kehadiran tidak ada";


				// $this->session->set_flashdata('message', "Data kehadiran tidak ada");
			 // redirect('admin/rekap');
			}
		
		 


		} else {
			$response['status'] = true;
			$response['message'] = "tanggal awal tidak boleh lebih besar dari range";

			// $this->session->set_flashdata('message', "tanggal awal tidak boleh lebih besar dari range");
			//  redirect('admin/rekap');

		}

		return $this->response($response);
	}

	public function show()
	{
		$post = $this->input->post(null, true);
		$nama_dosen = $post['nama_dosen'];
		$tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
		$range = date('Y-m-d', strtotime($this->input->post('range')));

		if ($tanggal <= $range) {	

			if ($this->input->post('nama_dosen')) {
				$rekap = $this->_db->select('ci_jadwal.id,ci_prodi.nama_prodi,ci_jadwal.semester,ci_matkul.nama_matkul,ci_dosen.nama_dosen,ci_jadwal.dosen_pengganti,ci_ruangan.nama_ruangan,ci_ruangan.gedung,ci_jadwal.jml_mahasiswa,ci_jadwal.jam_mulai,ci_jadwal.jam_berakhir,ci_jadwal.tanggal, ci_jadwal.sesi_kuliah, ci_jadwal.jumlah_sesi')
				->join('ci_prodi', 'nama_prodi', 'left')
				->join('ci_matkul', 'nama_matkul', 'left')
				->join('ci_dosen', 'nama_dosen', 'left')
				->join('ci_ruangan', 'kode_ruangan', 'left')
				->wheres('ci_jadwal.tanggal >=', $this->input->post('tanggal'))
				->wheres('ci_jadwal.tanggal <=', $this->input->post('range'))
				->wheres('ci_jadwal.nama_dosen', $this->input->post('nama_dosen'))
				->get();
				$data['all'] = false;
			
			} else {
				$rekap = $this->_db->select('ci_jadwal.id,ci_prodi.nama_prodi,ci_jadwal.semester,ci_matkul.nama_matkul,ci_dosen.nama_dosen,ci_jadwal.dosen_pengganti,ci_ruangan.nama_ruangan,ci_ruangan.gedung,ci_jadwal.jml_mahasiswa,ci_jadwal.jam_mulai,ci_jadwal.jam_berakhir,ci_jadwal.tanggal, ci_jadwal.sesi_kuliah, ci_jadwal.jumlah_sesi')
				->join('ci_prodi', 'nama_prodi', 'left')
				->join('ci_matkul', 'nama_matkul', 'left')
				->join('ci_dosen', 'nama_dosen', 'left')
				->join('ci_ruangan', 'kode_ruangan', 'left')
				->wheres('ci_jadwal.tanggal >=', $this->input->post('tanggal'))
				->wheres('ci_jadwal.tanggal <=', $this->input->post('range'))
				->get();
				$data['all'] = true;
				


			}


			if ($rekap) {
				if ($this->input->post('save_type') == 'generate') {
					$spreadsheet = new Spreadsheet();
	        		$sheet = $spreadsheet->getActiveSheet();
					 $spreadsheet->getProperties()->setCreator('PPSUIKA - Jadwal')
					->setLastModifiedBy('PPSUIKA - Jadwal')
					->setTitle('Office 2007 XLSX Test Document')
					->setSubject('Office 2007 XLSX Test Document')
					->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
					->setKeywords('office 2007 openxml php')
					->setCategory('Test result file');
					if ($data['all'] == false) {
						$data['status'] = true;
			        	$data['message'] = "File berhasil di generate, Silahkan klik download pada button yg di sediakan";
			        	$spreadsheet->setActiveSheetIndex(0)
							->setCellValue('A1', 'REKAP KEHADIRAN MENGAJAR DOSEN SEKOLAH PASCASARJANA UIKA BOGOR')
							->setCellValue('A3', 'Periode : ')
							->setCellValue('B3',  $tanggal.' s/d '.$range )
							->setCellValue('A5', 'Program Studi')
							->setCellValue('B5', 'Semester')
							->setCellValue('C5', 'Matakuliah')
							->setCellValue('D5', 'Ruangan')
							->setCellValue('E5', 'Sesi Wajib')
							->setCellValue('F5', 'Sesi Hadir')
							->setCellValue('G5', 'Tanggal');

					} else {
						$spreadsheet->setActiveSheetIndex(0)
							->setCellValue('A1', 'REKAP KEHADIRAN MENGAJAR DOSEN SEKOLAH PASCASARJANA UIKA BOGOR')
							->setCellValue('A3', 'Periode : ')
							->setCellValue('B3',  $tanggal.' s/d '.$range )
							->setCellValue('A5', 'Nama Dosen')
							->setCellValue('B5', 'Program Studi')
							->setCellValue('C5', 'Semester')
							->setCellValue('D5', 'Matakuliah')
							->setCellValue('E5', 'Ruangan')
							->setCellValue('F5', 'Sesi Wajib')
							->setCellValue('G5', 'Sesi Hadir')
							->setCellValue('H5', 'Tanggal');
					}

					$styleTitle = [
					    'font' => [
					        'bold' => true,
					        'size' => 18,
					    ],
					    'alignment' => [
					        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
					    ]
					];

					$StyleName = [
					    'font' => [
					        'bold' => true,
					        'size' => 15,
					    ],
					    'alignment' => [
					        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
					    ]
					];

					$styleBorder = [
					    'borders' => [
					        'allBorders' => [
					            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
					            'color' => ['argb' => 'FFFF0000'],
					        ],
					        'outline' => [
					            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
					            'color' => ['argb' => 'FFFF0000'],
					        ],
					    ],
					];

					$spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($styleTitle);
					$spreadsheet->getActiveSheet()->getStyle('A2:B3')->applyFromArray($StyleName);
					$spreadsheet->getActiveSheet()->getStyle('A5:G1')->applyFromArray($styleBorder);
					$spreadsheet->getActiveSheet()->mergeCells("B3:G3");
					$spreadsheet->getActiveSheet()->mergeCells("B2:G2");
					$spreadsheet->getActiveSheet()->mergeCells("A1:G1");
					$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
					$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
			      	$nama_dosen = '';
					$excel_row = 6;

					foreach ($rekap as $row) {
						if ($data['all'] == false) {
							$spreadsheet->setActiveSheetIndex(0)
							  ->setCellValue('A2', 'Nama Dosen : ')
							  ->setCellValue('B2',  $row->nama_dosen )
							  ->setCellValue('A'.$excel_row, $row->nama_prodi)
							  ->setCellValue('B'.$excel_row, $row->semester)
							  ->setCellValue('C'.$excel_row, $row->nama_matkul)
							  ->setCellValue('D'.$excel_row, $row->nama_ruangan)
							  ->setCellValue('E'.$excel_row, $row->sesi_kuliah)
							  ->setCellValue('F'.$excel_row, $row->jumlah_sesi)
							  ->setCellValue('G'.$excel_row, $row->tanggal);
							$nama_dosen = $row->nama_dosen;
						} else {
							$spreadsheet->setActiveSheetIndex(0)
							  ->setCellValue('A'.$excel_row,  $row->nama_dosen )
							  ->setCellValue('B'.$excel_row, $row->nama_prodi)
							  ->setCellValue('C'.$excel_row, $row->semester)
							  ->setCellValue('D'.$excel_row, $row->nama_matkul)
							  ->setCellValue('E'.$excel_row, $row->nama_ruangan)
							  ->setCellValue('F'.$excel_row, $row->sesi_kuliah)
							  ->setCellValue('G'.$excel_row, $row->jumlah_sesi)
							  ->setCellValue('H'.$excel_row, $row->tanggal);
							$nama_dosen = "ALL";
						}
						$excel_row++;
					}
				 $writer = new Xlsx($spreadsheet);
				 $spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y'));
				 $spreadsheet->setActiveSheetIndex(0);
				 $filename = 'Report Kehadiran -'.$nama_dosen.'- Periode -'.tgl_indo($tanggal).' sd '.tgl_indo($range).'-Generate date-'.date('d-m-Y');
				 $path = FCPATH . 'downloads/reporting/'.$filename.'.xlsx';	
				 $report = $writer->save($path);

				$data['status'] = true;
				$data['message'] ="data berhasil di generate";
				$insert = [
 					'id_dosen' => $this->input->post('nama_dosen'),
		 			'name' => $filename,
		 			'periode_tgl' => $this->input->post('tanggal'),
		 			'periode_range' => $this->input->post('range'),
		 			'id_group' => $this->session->userdata('group')
		 		];

		 		if ($data['all'] == true) {
		 			$insert = [
		 				'status_all' => 1,
		 				'id_dosen' => 16,
			 			'name' => $filename,
			 			'periode_tgl' => $this->input->post('tanggal'),
			 			'periode_range' => $this->input->post('range'),
			 			'id_group' => $this->session->userdata('group')
		 			];
		 		}

		 		
			 		if (is_file(base_url('downloads/reporting/'.$filename.'.xlsx'))) {
				 		$insert_update = [
				 			'date' => date('Y-m-d H:i:s')
				 		];

				 		$this->db->where('name', $filename);
				 		$this->db->update('excel_reporting', $insert_update);
			 		} else {
			 			$this->db->where('name', $filename);
			 			$report = $this->db->get('excel_reporting');
			 			if ($report->num_rows() > 0) {
			 				$insert_update = [
					 			'date' => date('Y-m-d H:i:s')
					 		];

					 		$this->db->where('name', $filename);
					 		$this->db->update('excel_reporting', $insert_update);
			 			} else {
			 				$this->db->set($insert);
					 		$this->db->insert('excel_reporting');			 				
			 			}
						
			 		}

				} else {
					$data['rekap'] = $rekap;	
					$data['status'] = true;
					$data['periode'] = tgl_indo($tanggal).' s/d '.tgl_indo($range);
				}
				
			} else {
				$data['status'] = false;
				$data['message'] = "Data tidak ditemukan";
			}	

		} else {
			$data['status'] = false;
			$data['message'] = "tanggal awal tidak boleh lebih besar dari range";
		}
		return $this->response($data);	
	}

	public function show_log()
	{
		$this->load->library('Datatables');
		//if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
		// $this->load->model('M_Export', 'export');	
		// if (get_group('group_code') != 'ADM') {
		// 	$this->export->jadwal_where(['excel_reporting.id_group' => $this->session->userdata('group')]);	
		// }


		// $datas	= $this->export->select(
		// 		[
		// 			'excel_reporting.id','excel_reporting.name','ci_dosen.nama_dosen','excel_reporting.periode_tgl','excel_reporting.periode_range','excel_reporting.date','si_group.group'
		// 		])
		// 	->getJoin()
		// 	->search_item(
		// 		['ci_dosen.nama_dosen','excel_reporting.name', 'excel_reporting.date'
		// 		])
		// 	->column_order([null,'nama_dosen', 'name', 'periode', 'tanggal', null])
		// 	->datatables();



		// $data_menu = $this->export->getRequestAjax('excel_reporting');
		// $data = array();
		// 	$no = $_POST['start'];
		// 	foreach ($data_menu as $r) {
		// 		$no++;
		// 		$row = array();
		// 		$row[] = $no;
		// 		$row[] = $r->nama_dosen;
		// 		$row[] = $r->name;
		// 		$row[] = $r->periode_tgl.' s/d '.$r->periode_range;
		// 		$row[] = $r->date;
		// 		$row[] = '
		// 		<div class="text-center"><a target="_blank" href="'.base_url('downloads/reporting/'.$r->name.'.xlsx').'"> <i class="fa fa-download"></i> Download File </a>
		// 		</div>';
		// 		$data[] = $row;
		// 	}

		// 	$json_data = [
		// 		"draw" => $_POST['draw'],
		// 		"recordsTotal" => $this->export->count_all(),
		// 		"recordsFiltered" => $this->export->count_filtered(),
		// 		'data' => $data
		// 	];

			return $this->output_json($this->export->datatables_data(), false);
		//}
	}

	public function output_json($data, $encode = true)
    {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

	public function download_file($id)
	{
		$this->load->helper('download');
		$this->db->where('id',$id);
		$get = $this->db->get('excel_reporting')->row();
		$filename = $get->name.'.xlsx';
		$path = file_get_contents(base_url('downloads/reporting/'.$filename));
		return force_download($get->name, $path);
	}


	public function ajax()
	{
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
			if (get_group('group_code') != 'ADM') {
				$this->_db->jadwal_where(['ci_jadwal.group_id' => $this->session->userdata('group')]);	
			}
		$data_menu = $this->_db->getRequestAjax();

		$data = array();
			$no = $_POST['start'];
			foreach ($data_menu as $r) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $r->nama_prodi;
				$row[] = $r->nama_matkul;
				$row[] = $r->nama_dosen;
				$row[] = $r->nama_ruangan;
				$row[] = $r->tanggal;
				//add html for action
				$row[] = '
				<div class="text-center"><button type="button" class="btn btn-sm btn-warning edit" title="Edit" id="edit" data-id = "'.$r->id.'"><i class="fa fa-pencil"></i>Edit </button>
				<button type="button" class="btn btn-sm btn-danger delete" title="Delete" id="delete" data-id = "'.$r->id.'"><i class="fa fa-trash"></i>Delete</button></div>';
				$data[] = $row;
			}

			$json_data = [
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->_db->count_all(),
				"recordsFiltered" => $this->_db->count_filtered(),
				'data' => $data
			];

			return $this->response($json_data);
		}
			

	}

	public function add()
	{

		$data = array(

        'id' => set_value('id'),

        'nama_prodi' => set_value('nama_prodi'),

        'nama_matkul' => set_value('nama_matkul'),

        'nama_dosen' => set_value('nama_dosen'),

        'nama_ruangan' => set_value('nama_ruangan'),

        'dosen_pengganti' => set_value('dosen_pengganti'),

        'semester' => set_value('semester'),

    	'jam_mulai' => set_value('jam_mulai'),

    	'jam_berakhir' => set_value('jam_berakhir'),

    	'tanggal' => set_value('tanggal'),

    	'jml_mahasiswa' => set_value('jml_mahasiswa'),

    	);
		$this->site->load('jadwal/form_jadwal', $data);
		
	}

	public function get_update()
	{
		$id = $this->input->post('user_id', TRUE);
		$data = $this->_db->get_by(['id' => $id]);
		if ($data) {
			foreach ($data as $row) {
				$response['message'] = $row;
				$response['success'] = true;
			}
		} else {
			$response['message'] = 'Gagal meload data Dosen';
			$response['success'] = false;
		}

		$this->response($response);
	}

	public function update_save()
	{
		

			$data = [
		       'nama_prodi' => $this->input->post('nama_prodi'),
		        'nama_matkul' => $this->input->post('nama_matkul'),
		        'nama_dosen' => $this->input->post('nama_dosen'),
		        'dosen_pengganti' => $this->input->post('dosen_pengganti'),
		        'kode_ruangan' => $this->input->post('nama_ruangan'),
		        'semester' => $this->input->post('semester'),
		        'jam_mulai' => $this->input->post('jam_mulai'),
		        'jam_berakhir' => $this->input->post('jam_berakhir'),
		        'tanggal' => $this->input->post('tanggal'),
		        'kode_ruangan' => $this->input->post('nama_ruangan'),
		        'jml_mahasiswa' => $this->input->post('jml_mahasiswa'),
		        'group_id' => $this->session->userdata('group'),
		       ];

		       
			$id = $this->input->post('id', TRUE);
			$save_data = $this->_db->update($data, ['id' => $id]);
			if ($save_data) {
					$response['success'] = true;
					$response['message'] = 'Data Jadwal berhasil di update !';
				
			} else {
				$response['success'] = false;

				$response['message'] = 'Gagal mengupdate data Jadwal';
			}
		 

		return $this->response($response);
	}


	public function add_save()
	{

		// $this->__rules();

		// if($this->form_validation->run() === false)

		// {

		// 	$response['success'] = false;

		// 	$response['message'] = validation_errors();

		// }else

		// {

			
			 

		       $data = [
		       'nama_prodi' => $this->input->post('nama_prodi'),
		        'nama_matkul' => $this->input->post('nama_matkul'),
		        'nama_dosen' => $this->input->post('nama_dosen'),
		        'dosen_pengganti' => $this->input->post('dosen_pengganti'),
		        'kode_ruangan' => $this->input->post('nama_ruangan'),
		        'semester' => $this->input->post('semester'),
		        'jam_mulai' => $this->input->post('jam_mulai'),
		        'jam_berakhir' => $this->input->post('jam_berakhir'),
		        'tanggal' => $this->input->post('tanggal'),
		        'kode_ruangan' => $this->input->post('nama_ruangan'),
		        'jml_mahasiswa' => $this->input->post('jml_mahasiswa'),
		        'group_id' => $this->session->userdata('group'),
		       ];

			$save_data = $this->_db->insert($data);
			if ($save_data) {
				$this->db->set(['id_jadwal' => $save_data, 'id_group' => $this->session->userdata('group')]);
				$this->db->insert('ci_kehadiran_dosen');
				if ($this->input->post('save_type') == 'stay') {
					$response['success'] = true;
					$response['message'] = 'Your data has been successfully stored into the database. '.anchor('admin/jadwal', ' Go back to list');
				} else {
					$response['success'] = true;
					$response['message'] = false;
				}
			} else {
				$response['success'] = false;

				$response['message'] = 'Gagal menyimpan data jadwal';
			}

			





			

		// } 

		return $this->response($response);
	}


	public function delete()
	{
		$id = $this->input->post('user_id', TRUE);

		$delete = $this->_db->delete($id);
		if ($delete) {
			$response['success'] = true;
			$response['message'] = 'Data Jadwal Berhasil di Hapus !';
		} else {
			$response['success'] = false;
			$response['message'] = 'Gagal menghapus data Jadwal !';
		}
		return $this->response($response);
	}

	public function __rules()
	{

		$this->form_validation->set_rules('nama_dosen', 'Dosen Name', 'trim|required|is_unique[ci_dosen.nama_dosen]', array('required' => 'Nama Dosen tidak boleh kosong', 'is_unique' => 'Nama Dosen sudah terdaftar'));
	}

	public function rekap_mengajar()
	{
		$nama_dosen = $this->input->post('nama_dosen', TRUE);
		$tanggal = $this->input->post('tanggal', TRUE);
		$range = $this->input->post('range', TRUE);
		$data = array(
			'nama_dosen' =>$nama_dosen,
			'date1' => $tanggal,
			'date2' => $range,
		);	

		$datas = $this->_db->get_range($data);

		
		if ($datas) {
			//foreach ($datas as $row) {
				$response['message'] = $datas;
				$response['success'] = true;
			//}
		} else {
			$response['message'] = "Gagal";
			$response['success'] = false;
		}

		$this->response($response);
	}


	

}

/* End of file Ruanga.php */
/* Location: ./application/controllers/Ruanga.php */