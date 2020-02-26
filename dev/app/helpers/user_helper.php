<?php 
function get_user_info($param=null){
	$_this =& get_instance();
	if($param != null){
		//return $_this->session->userdata($param);
    $_this->db->where(['email' => $_this->session->userdata('email')]);
    $data = $_this->db->get('si_users')->row();
    return $data->$param;

	}
	else{
		return $_this->session->userdata;
	}
}

function get_user_info_id($param, $id)
{
	$_this =& get_instance();
	if($param != null){
		//return $_this->session->userdata($param);
    $_this->db->where(['ID' => $id]);
    $data = $_this->db->get('si_users')->row();
    return $data[$param];
	}
}

function array_prfix(&$value, $key) {
	echo $a = $key.'.'.$value;
}