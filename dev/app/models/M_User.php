<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_User extends SI_Model {

	public $table_name = 'si_users';
	protected $primary_key = 'ID';

	public $id = 'ID';
	var $column_order = array(null, 'username', 'fullname', 'email', 'role', 'group', 'status', null);
	var $column_search = array('ID','username', 'fullname', 'password', 'email', 'role', 'status', 'group'); 
	var $order = array('ID' => 'desc'); // default order 
	var $select = array('si_users.ID','si_users.username', 'si_users.fullname','si_users.email', 'si_users.avatar', 'si_users.status', 'si_users.created_at', 'si_role.role', 'si_group.group');
	var $join = array(
		'si_role' => 'si_role.role_id = si_users.role_id',
		'si_group' => 'si_group.group_id = si_users.group_id',
	);

	public function __construct()
	{
		parent::__construct();
		
	}

}

/* End of file M_User.php */
/* Location: ./application/models/M_User.php */