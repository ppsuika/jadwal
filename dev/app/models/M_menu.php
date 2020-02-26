<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_menu extends SI_Model {

	public $table_name = 'si_menu';
	protected $primary_key = 'id_menu';

	public $id = 'role_id';
	public $table_option = 'si_menu_option_category';
	public $menu_to_role = 'si_menu_to_role';
	var $column_order = array(null, 'label', 'link', 'sort', 'parent', 'status', 'category', null);
	var $column_search = array('label', 'link', 'sort', 'parent', 'status', 'category'); 
	var $order = array('id_menu' => 'desc'); // default order 
	var $select = array('si_menu.id_menu','si_menu.label','si_menu.slug','si_menu.link','si_menu.icon','si_menu.parent','si_menu.status','si_menu.sort','si_menu_category.category');
	var $join = array('si_menu_category' => 'si_menu_category.menu_category_id = si_menu.category_id'); 

	public function __construct()
	{
		parent::__construct();
		
	}



	public function getMenu_role($where = null, $admin_menu = true)
	{
		if ($where != null) {
			$this->db->select('
				si_menu.id_menu,
				si_menu.label,
				si_menu.slug,
				si_menu.link,
				si_menu.icon,
				si_menu.parent,
				si_menu.status,
				si_menu.sort,
				si_menu_category.category
			');

			$this->db->from($this->table_name);
			$this->db->join($this->menu_to_role, $this->menu_to_role.'.menu_id = si_menu.id_menu', 'left');
			$this->db->join('si_menu_category', 'si_menu_category.menu_category_id = si_menu.category_id', 'left');
			$this->db->where($this->menu_to_role.'.'.$this->id, $this->session->userdata('role_id'));
			$this->db->where('si_menu_category.category', 'admin_menu');
			$this->db->where('si_menu.status', 'Y');
			$this->db->where('si_menu.parent', $where);
			$this->db->order_by('si_menu.sort', 'ASC');

		}else if ($admin_menu == true) {

			$this->db->select('
				si_menu.id_menu,
				si_menu.label,
				si_menu.slug,
				si_menu.link,
				si_menu.icon,
				si_menu.parent,
				si_menu.status,
				si_menu.sort,
				si_menu_category.category
			');

			$this->db->from($this->table_name);
			$this->db->join($this->menu_to_role, $this->menu_to_role.'.menu_id = si_menu.id_menu', 'left');
			$this->db->join('si_menu_category', 'si_menu_category.menu_category_id = si_menu.category_id', 'left');
			$this->db->where($this->menu_to_role.'.'.$this->id, $this->session->userdata('role_id'));
			$this->db->where('si_menu_category.category', 'admin_menu');
			$this->db->where('si_menu.status', 'Y');
			$this->db->order_by('si_menu.sort', 'ASC');

		} else {
			$this->db->select('
				si_menu.id_menu,
				si_menu.label,
				si_menu.slug,
				si_menu.link,
				si_menu.icon,
				si_menu.parent,
				si_menu.status,
				si_menu.sort,
				si_menu_category.category
			');

			$this->db->from($this->table_name);
			$this->db->join($this->menu_to_role, $this->menu_to_role.'.menu_id = si_menu.id_menu', 'left');
			$this->db->join('si_menu_category', 'si_menu_category.menu_category_id = si_menu.category_id', 'left');
			$this->db->where($this->menu_to_role.'.'.$this->id, $this->session->userdata('role_id'));
			$this->db->where('si_menu.status', 'Y');
			$this->db->order_by('si_menu.sort', 'ASC');

		}
		

		return $this->db->get()->result();
	}

	public function get_ajax($select_data = null)
	{
		
	}

	public function get_menu_to_role()
	{
		$this->db->select('
				si_menu.slug,

			');

			$this->db->from($this->table_name);
			$this->db->join($this->menu_to_role, $this->menu_to_role.'.menu_id = si_menu.id_menu', 'left');
			$this->db->where($this->menu_to_role.'.'.$this->id, $this->session->userdata('role_id'));
			$this->db->where('si_menu.status', 'Y');
			$this->db->order_by('si_menu.sort', 'ASC');
		return $this->db->get()->result_array();

    }

}





/* End of file M_menu.php */
/* Location: ./application/models/M_menu.php */