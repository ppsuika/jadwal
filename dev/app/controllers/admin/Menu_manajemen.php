<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_manajemen extends SI_Backend {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Menu', '_db');
	}

	public function index()
	{

		$this->site->load('menu/list_menu');
		
		
	}

	public function ajax()
	{
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
		$data_menu = $this->_db->getRequestAjax();

		$data = array();
			$no = $_POST['start'];
			foreach ($data_menu as $r) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $r->label;
				$row[] = $r->link;
				$row[] = '<i class="'.$r->icon.'"></i> '.$r->icon;
				$row[] = $r->sort;
				$row[] = $r->parent;
				$row[] = $r->status;
				$row[] = $r->category;

				//add html for action
				$row[] = '
				<div class="text-center"><button href="'.base_url("menu_manajemen/edit/").$r->id_menu.'" class="btn btn-sm btn-warning edit" title="Edit" id="edit" data-id = "'.$r->id_menu.'"><i class="fa fa-pencil"></i>Edit </button>
				<button type="button" class="btn btn-sm btn-danger delete" title="Delete" id="delete" data-id = "'.$r->id_menu.'"><i class="fa fa-trash"></i>Delete</button></div>';
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


	public function delete()
	{
		$delete = $this->_db->delete($this->input->post('user_id'));
    	if ($delete) {
			$this->_db->delete_by_table(['menu_id' => $this->input->post('user_id')], 'si_menu_to_role');
    		$response['success'] = true;
    		$response['message'] = 'Data Berhasil di Hapus !';
     	}else {
     		$response['success'] = false;
    		$response['message'] = 'Data Gagal di hapus !';
     	}

     	return $this->response($response);
	}

	public function add()
	{
		$this->site->load('menu/menu_add');	
	}

	public function save_data()
	{
		
		$data = [
			'label'		=> $this->input->post('label', TRUE),
			'slug'		=> $this->input->post('link', TRUE),
			'link'		=> $this->input->post('link', TRUE),
			'icon'		=> 'fa '.$this->input->post('icon', TRUE),
			'parent'	=> $this->input->post('parent', TRUE),
			'status'	=> 'Y',
			'sort'		=> '',//$this->input->post('sort', TRUE),
			'category_id'	=> $this->input->post('category_id', TRUE), 
		];

		$menu_id = $this->_db->insert($data);
		if ($menu_id) {

			foreach ($this->input->post('group') as $row) {
					$data_role_menu = [
						'role_id' => $row, 
						'menu_id' => $menu_id
					];	
					$insert_role = $this->_db->insertTable($data_role_menu, 'si_menu_to_role');

				}
			$response['success'] = true;
			$response['success'] = 'Data Menu berhasil di simpan';
		} else {
			$response['success'] = false;
			$response['success'] = 'Data Menu gagal di simpan';
		}

		$this->response($response);
		
	}

	

}

/* End of file Menu_manajemen.php */
/* Location: ./application/controllers/Menu_manajemen.php */