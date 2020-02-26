<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SI_Model extends CI_Model {

	protected $table_name;
	protected $order_by;
	protected $order_by_type;
	protected $primary_filter = 'intval';
	protected $primary_key = 'id';
	protected $type;
	public $rules;
	var $column_order = array();
	var $column_search = array(); 
	var $select_field;
	var $join = null;
	var $where = null;


	public function __construct()
	{
		parent::__construct();
	}

	public function ajax()
	{
		if ($this->order_by_type) {
			$this->db->order_by($this->order_by, $this->order_by_type);
		} else {
			$this->db->order_by($this->order_by);
		}

		return$this->db->get($this->table_name)->result_array();

	}

	public function insert($data, $batch=FALSE)
	{
		if ($batch === TRUE) {
			$this->db->insert_batch($this->table_name, $data);
		} else {
			$this->db->set($data);
			$this->db->insert($this->table_name);
			$id = $this->db->insert_id();
			return $id;
		}
	}

	public function insertTable($data, $table, $batch=FALSE)
	{
		if ($batch === TRUE) {
			$this->db->insert_batch($table, $data);
		} else {
			$this->db->set($data);
			$this->db->insert($table);
			$id = $this->db->insert_id();
			return $id;
		}
	}

	public function update($data, $where = array())
	{
		$this->db->set($data);
		$this->db->where($where);
		return $this->db->update($this->table_name);
	}

	public function get($id=NUll, $single=FALSE)
	{
		if ($id != NUll) {
			$filter = $this->primary_filter;
			$id = $filter($id);
			$this->db->where($this->primary_key, $id);
			$method = 'row';
		} else if ($single === TRUE) {
			$method = 'row';
		} else {
			$method	= 'result';
		}

		if ($this->order_by_type) {
			$this->db->order_by($this->order_by, $this->order_by_type);
		} else {
			$this->db->order_by($this->order_by);
		}

		return $this->db->get($this->table_name)->$method();
	}

	public function get_by($where = NUll, $limit = NUll, $offset = NUll, $single = FALSE, $select = NUll)
	{
		 if ($select != NUll) {
		 	$this->db->select($select);
		 }

		 if ($where) {
		 	$this->db->where($where);
		 }

		 if (($limit) && ($offset)) {
		 	$this->db->limit($limit, $offset);
		 } else if ($limit) {
		 	$this->db->limit($limit);
		 }

		 return $this->get(NUll, $single);
	}

	public function delete($id)
	{
		$filter = $this->primary_filter;
		$id = $filter($id);

		if (!$id) {
			return FALSE;
		}

		$this->db->where($this->primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->table_name);
		return true;
	}

	public function delete_by($where = NUll)
	{
		if ($where) {
			$this->db->where($where);
		}

		$this->db->delete($this->table_name);
	}

	public function delete_by_table($where = NUll, $table)
	{
		if ($where) {
			$this->db->where($where);
		}

		$this->db->delete($table);
	}

	public function count($where= NUll)
	{
		if (!empty($this->type)) {
			$where['post_type'] = $this->type;
		}

		if ($where) {
			$this->db->where($where);
		}
		$this->db->from($this->table_name);
		return $this->db->count_all_results();
	}


	/* Request Ajax query */

	public function getRequestAjax()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();  
        return $query->result();   
	}


	public function _get_datatables_query($select_data = null)
	{
		//SELECT * FROM ar_users JOIN ar_role ON ar_role.id = ar_users.role
		$select_dat = implode(', ', $this->select);
		$this->db->select($select_dat);
        $this->db->from($this->table_name);
        //$this->db->join('role', 'ar_users.role = role.id', 'left');
        $this->getJoin();
        $this->getWhere();
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function getJoin()
	{
		$i = 1;
		if ($this->join != null) {
			 foreach ($this->join as $key => $value) {
			 	$a[$i] = $this->db->join($key, $value, 'left');
			 	$i++;
			 }
		} else {
			$a = '';
		}

		 return $a;
	}

	public function wheres($columns, $condition)
    {
        $this->db->where($columns, $condition);
        return $this;
    }

	public function getWhere()
	{
		if ($this->where != null) {
			if (is_array($this->where)) {
				return $this->db->where($this->where);
			}
		} else {
			return false;
		}
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $this->db->count_all_results();
	}

}

/* End of file SI_Model.php */
/* Location: ./app/core/SI_Model.php */