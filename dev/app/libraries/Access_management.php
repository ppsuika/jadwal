<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_management {

  private $function_name = '';


  public function have_access($userGroupId){
    $ci =& get_instance();  
    $current_route = $ci->uri->segment(1);
    $ci->load->model("user_access_role_model");
    $ci->load->model("admin_nav_model");
    $ci->db->where('id', $userGroupId);
    $userGroupData = $ci->db->get('user_access_role')->result_array();

    die(var_dump($userGroupData));

    $ci->user_access_group_model->find($userGroupId);
    $userAccess = explode(",", $userGroupData['access_right']);
    $activeMenu = $ci->admin_navigation_model->find($current_route,"routes");
    //die(var_dump($current_route).'');
    if(!in_array($activeMenu['id'], $userAccess)){
     header("location:".base_url("error/301"));
    }
  }

  public function check_access($user_access_id,$function_name){
    $this->function_name = $function_name;
    $ci =& get_instance();  
    $ci->load->model("user_access_group_model");
    $ci->load->model("access_item_model");

    $access_item = $ci->access_item_model->find($function_name,"code");
    if(isset($access_item['id'])){
      $user_access = $ci->user_access_model->find($user_access_id,"user_access_group_id", " AND access_item_id =".$access_item['id']);
    }else{
      header("location:".base_url("error/301"));
    }

    if(!isset($user_access['id']) || $user_access['access_item_type'] == "none"){
      header("location:".base_url("error/301"));
    }
    else{
      return $user_access;
    }

  }









  public function foreach_data($userGroupId)
  {
  	$ci =& get_instance();  
  	$ci->db->where('id', $userGroupId);
    $userGroupData = $ci->db->get('user_access_role')->result_array();
  	foreach ($userGroupData as $row) {
  		return $row;
  	}
  }

  private function executeQuery($query){
  	$ci =& get_instance();  
        $res =  $ci->db->query($query);
        return $res;
    }


  public function get_categories($accessRightString){
        $data = array();
        $query = "SELECT DISTINCT admin_nav_category FROM admin_navigation";

        $accessRightArray = explode(",", $accessRightString);
        foreach($accessRightArray as $key=>$val){
            if($key == 0){
                $query .= " WHERE";
            }
            else{
                $query .= " OR";
            }
            $query .= " id = $val";
        }
    
        $rows = $this->executeQuery($query);
        
        foreach ($rows->result_array() as $row) {
            
                $data[] = $row['admin_nav_category'];
        }
        
        return $data;
    }



	private function find($id,$by='id',$table,$custom_where="") 
    {
    	$ci =& get_instance(); 
        $rows = $this->readRowInfo($table, $id ,$by,$custom_where);
        return $rows;
    }

    private function readRowInfo($table_name, $id, $by = "", $additional_criteria = ""){
    	$ci =& get_instance(); 
        $data = array();
        if ($by == "") $by = "id";
        $where = ($id != "") ? " WHERE $by = '$id'" : "";
        $where .= $additional_criteria != "" ? $additional_criteria : "";
        $query = "SELECT * FROM " . $table_name . $where;
                $rows = $this->executeQuery($query);
                foreach ($rows->result_array() as $row) {
                        $data = $row;
                }
                return $data;

    }


    private function readAllRows($table_name, $additional_criteria = "",$data_status = ""){

        $data = array();
        if($data_status == "")
        {   
            $where = " WHERE 1 ";
        }

        $where .= $additional_criteria != "" ? $additional_criteria : "";
        $query = "SELECT * FROM " . $table_name . $where;

        $rows = $this->executeQuery($query);
        foreach ($rows->result_array() as $row) {
            foreach($row as $key=>$val){
                    $row[$key] = $val;
            }
            $data[] = $row;

        }
        return $data;

    }

    private function all($custom_where="", $table, $data_status=""){
        $rows = $this->readAllRows($table,$custom_where,$data_status);
        return $rows;
    }











	public function generate_admin_sidemenu($userGroupId){

    $sidemenu = "";
        $ci =& get_instance();  
        //load all necessary controller
        // $ci->load->model("user_access_group_model");
        // $ci->load->model("user_sub_menu");
        // $ci->load->model("admin_navigation_category_model");

        //find user access right
        $userGroupData = $this->foreach($userGroupId);

        $accessRightString = $userGroupData['access_right'];
        $userAccess = explode(",", $userGroupData['access_right']);

        $categoryIds = $this->get_categories($accessRightString);
        
      $categoryQuery = " AND(";
        foreach($categoryIds as $key=>$val){
          if($key != 0){
                $categoryQuery .= " OR";
            }
          $categoryQuery .= " id = ".$val;
        }
        $categoryQuery .= " ) ORDER BY sort ASC";

    $current_route = $ci->uri->segment_array();
    $route = implode('/', $current_route);
    $activeMenu = $this->find($route,"link", 'admin_navigation');

    $activeRoute = isset($activeMenu['admin_nav_category']) ? $activeMenu['admin_nav_category'] : 0;
    //get all category based on user group access right
        $categories = $this->all($categoryQuery, 'admin_navigation');
        
        //BEGIN GENERATE SIDEMENU
        foreach($categories as $category){
          //if error category
          if($category["sort"] == 0){

          }else{
              $active = $category['id'] == $activeRoute ? "active" : "";
              $category_link = $category['link'] != "" ? base_url($category['link']) : "javascript:;";
              $menus = $this->all(" AND admin_nav_category = ".$category['id']." AND display = 1 ORDER BY sort ASC", 'admin_navigation');


              $sidemenu .= "<li class='$active'>";
                $sidemenu .= "<a href='$category_link'>";
                  $sidemenu .= "<i class='fa fa-".$category['icon']."'></i>";
                  $sidemenu .= "<span class='title'>".$category['label']."</span>";
                  $sidemenu .= "<span class='arrow open'></span><span class='selected'></span>";
              $sidemenu .= "</a>";
              if(count($menus) != 0){
                $sidemenu .= "<ul class='sub-menu'>";
                  foreach($menus as $menu){

                    if(in_array($menu['id'], $userAccess)){

                        $sidemenu .= "<li>";
                          $sidemenu .= "<a href='".base_url($menu['link'])."'>".$menu['label']."</a>";
                        $sidemenu .= "</li>";
                         print_r($menus);
                    }

                  }
                $sidemenu .= "</ul>";

              }
              $sidemenu .= "</li>";

          }
      }
      //END GENERATE SIDEMENU

      return $sidemenu;
    }

    

}


/* End of file Access_management.php */
/* Location: ./app/Libraries/Access_management.php */