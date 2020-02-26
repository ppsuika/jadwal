<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Post extends SI_Model {

	protected $table_name = 'users_post_admin';
	protected $order_by = 'id';
	protected $order_by_type = 'DESC';
	protected $primary_key = 'id';

	public function __construct()
	{
		parent::__construct();
		
	}

}

/* End of file M_Post.php */
/* Location: ./application/models/M_Post.php */