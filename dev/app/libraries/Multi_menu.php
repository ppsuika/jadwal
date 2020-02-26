<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Multi_menu {


	private $menu_id_menu                  = 'id_menu';
	private $menu_label               = 'name';	
	private $menu_key                 = 'key';
	private $menu_parent              = 'parent';	
	private $menu_order               = 'order';	
	private $menu_icon               = 'icon';
	private $data_menu               = array();
	private $root_parent               = -1;
	private $family_tree               = [];
	private $root_parent_name               = "";


	public function __construct($config = array())
	{
		// just in case link helper has not load yet
		$this->ci =& get_instance();
		$this->ci->load->helper('url');

		$this->initialize($config);
	}
	

	public function initialize($config = array())
	{
		foreach ($config as $key => $value) {
			$this->$key = $value;
		}
	}

	public function sub_menu($id_menu)
	{
		$this->ci->load->model('M_Menu', 'menu');
		return $this->ci->menu->getMenu_role($id_menu);
	}

	public function render()
	{
		$html_menu = '';
		foreach ($this->data_menu as $row) {
			
			$sub_menu = $this->sub_menu($row->id_menu);	
			if(count($sub_menu) > 0)
	        {
	        	
	        	
					$html_menu .= '<li class="treeview '.$row->slug.'" >'.anchor('','<i class="'.$row->icon.'"></i>
		                 <span class="menu-text">'.ucwords($row->label).'</span>
		                <span class="pull-right-container">
			                <i class="fa fa-angle-left pull-right"></i>
			            </span>');

				
				
	            // buat menu + sub menu
	            $html_menu .= "<ul class='treeview-menu'>";
	            foreach ($sub_menu as $s)
	            {

	            	// if ($row->slug == $this->ci->uri->segment(2)) {
	             //    	$html_menu .= '<li class="active">'.anchor('admin/'.$s->link,'<i class="'.$s->icon.'"></i>'.  ($s->label), array('class' => 'waves-effect waves-block', )).'</li>';
	             //    } else {
	                	$html_menu .= '<li >'.anchor('admin/'.$s->link,'<i class="'.$s->icon.'"></i>'.  ($s->label), array('class' => 'waves-effect waves-block', )).'</li>';
	                //}
	            }
	            $html_menu .= "</ul>";
	            $html_menu .= '</li>';
	        }
	        else if ($row->parent == 0) 
	        {
	        	if ($row->slug == $this->ci->uri->segment(2)) {
					$active = "active";
				} else {
					$active = "";
				}
	            // single menu
	            $html_menu .= '<li class="'.$active.'">'.anchor(site_url('admin/'.$row->link),'<i class="'.$row->icon.' ">
	                 </i>  <span class="menu-text">'.ucwords($row->label).'</span>').'</li>';
	        }
		}
		
		 
		
		return $html_menu;	
	}

	public function buildTree()
	{
		foreach ($this->data_menu as $row) {
			if ($row->parent == 0) {
				$this->family_tree = $row->id_menu;
				$this->root_parent_name = $row->label;
			} else {
				$this->family_tree[$row->parent];
				if (!isset($this->family_tree[$row->parent])) {
					$this->family_tree[$row->parent] = [];
				}
				$this->family_tree[$row->parent][] = array($row->label, $row->id_menu);
			 }
		}
	}

	public function buildList()
	{
		$list = "<ul>";

		foreach ($this->family_tree[$this->root_parent] as $key => $value) {
			# code...
		}
	}

}

/* End of file Multi_menu.php */
/* Location: ./application/controllers/Multi_menu.php */