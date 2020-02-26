<?php 

function get_list_directory($dir){
	if ($handle = opendir($dir)) {
		
		$dir = Array();

	    /* This is the correct way to loop over the directory. */
	    while (false !== ($entry = readdir($handle))) {
			if ($entry != "." && $entry != "..") {
	        	$dir[] = $entry;
			}
	    }

	    closedir($handle);
	}		

	return $dir;		
}

function kridensial()
{
	$ci =& get_instance();
	//1. Cek menu apa saja yang sesuai dengan role
	$role_id = $ci->session->userdata('role_id');
	$ci->load->model('M_Menu', 'db_menu');
	$a =  $ci->db_menu->get_menu_to_role();
	$array = array('access');
	array_push($a, $array);
		foreach ($a as $key => $value) {
			foreach ($value as $row) {
				$data[] = $row;
			}
		}
		
	if (in_array($ci->uri->segment(2),$data)) {
		return true;
	} else {
		return false;
	}
}

function register_kridensial($array = array())
{
	
}