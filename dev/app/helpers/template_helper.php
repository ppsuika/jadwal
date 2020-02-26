<?php 
// get_template_dir(dirname(__FILE__), 'css/style.css');
function get_template_dir($path, $dir_file) {
	global $SIConfig;
	$replace_path = str_replace('\\', '/', $path);
    $get_digit_doc_root = strlen($SIConfig->document_root)-4;
    $full_path = substr($replace_path, $get_digit_doc_root);
    return $SIConfig->site_url.$full_path.'/'.$dir_file;
    //return 'si-content/si-templates/backend/adminlte/include/'.$dir_file;
}

function get_template($view)
{
	$CI =& get_instance();
	return $CI->site->view($view);
}


function _ent($string = null) {
		return htmlentities($string);
}


function admin_menu($id)
{
	// data main menu
	$ci =& get_instance();
        $main_menu = $ci->db->get_where('user_sub_menu', array('parent_id' => 0));
        foreach ($main_menu->result() as $main) {
            // Query untuk mencari data sub menu
            $sub_menu = $ci->db->get_where('user_sub_menu', array('parent_id' => $main->id));
            // periksa apakah ada sub menu
            if ($sub_menu->num_rows() > 0) {
                // main menu dengan sub menu
                echo "<li class='treeview'>" . anchor($main->url, '<i class="' . $main->icon . '"></i>' . $main->title .
                        '<span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>');
                // sub menu nya disini
                echo "<ul class='treeview-menu'>";
                foreach ($sub_menu->result() as $sub) {
                    echo current_url();
                    echo "<li>" . anchor($sub->url, '<i class="' . $sub->icon . '"></i>' . $sub->title) . "</li>";
                }
                echo"</ul></li>";
            } else {
                // main menu tanpa sub menu
                echo "<li>" . anchor($main->url, '<i class="' . $main->icon . '"></i>' . $main->title) . "</li>";
            }
        }

        
}


function getTemplateMenu($role, $segment)
{
    $ci =& get_instance();
    
    $querySubmenu = "SELECT *, `role_id`, `user_access_menu`.`menu_id`
                        FROM  `user_sub_menu` JOIN `user_access_menu` 
                        ON `user_sub_menu`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_sub_menu`.`is_active` = 1 
                        AND `user_access_menu`.`role_id` = $role
                        ORDER BY `user_sub_menu`.`sort` ASC
            
        ";  

    $subMenu = $ci->db->query($querySubmenu)->result_array();
    // echo "<pre>";
    // print_r($subMenu);
    // echo "</pre>";
    // die();
    $ci->multi_menu->set_items($subMenu);
     // call render in view
     $menu =  $ci->multi_menu->render();

   // return menu_render($menu, $segment);
     return $menu;


}

function menu_render($data, $segment)
{
    $ci =& get_instance();
    $link = $ci->uri->segment($segment);
        $xml = $data;
              $doc = new DOMDocument();
              $doc->preserveWhiteSpace = false;
              $doc->loadXML($xml);
              $i=0;
              if ($link) {
                    while(is_object($a = $doc->getElementsByTagName("li")->item($i)))
                    {
                        if ($a->nodeValue == $link) {
                            $a->setAttribute('class', (@$a->hasAttributes('class') ? $a->getAttribute('class') . ' ' : '') . 'nav-active') ;
                        } else {
                            
                        }
                        
                        
                    $i++;
                    }
                return preg_replace('~<(?:!DOCTYPE|/?(?:html|body))[^>]*>\s*~i', '', $doc->saveHTML() );
                }
        return $xml;    
}


function title()
    {
        $db =& get_instance();
        global $SConfig;
        $array_backend_page = array(
            'dashboard' => 'Dashboard', 
            'post' => 'Daftar Postingan', 
            'halaman' => 'Daftar Halaman', 
            'produk' => 'Daftar Produk', 
            'komentar' => 'Daftar komentar', 
            'tampilan' => 'Tampilan', 
            'Statistik' => 'Statistik', 
            'konfigurasi' => 'Konfigurasi', 
            'user' => 'Data User', 
            'login'=> 'Panel Login'
        );

        $title = NULL;
        if ($db->site->side == 'backend' && (array_key_exists($db->uri->segment(2), $array_backend_page))) {
            return $array_backend_page[$db->uri->segment(2)];
        }
}

function executeQuery($query){
    $ci =& get_instance();  
        $res =  $ci->db->query($query);
        return $res;
    }


function getParentid($accessRightString){
    $data = array();
        $query = "SELECT DISTINCT parent FROM admin_navigation";
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
         
    
        $rows = executeQuery($query);
        
        foreach ($rows->result_array() as $row) {
            if ($row['parent'] != 0 ) {
                $data[] = $row['parent'];
            }
                
        
        }
      return $data;

}    


function runQuery($categoryQuery , $table)
{
    $data = array();
        $where = " WHERE 1 ";
        $where .= $categoryQuery != "" ? $categoryQuery : "";
        $query = "SELECT * FROM ".$table. " ".$where;

        $rows = executeQuery($query);
        foreach ($rows->result_array() as $row) {
            foreach($row as $key=>$val){
                    $row[$key] = $val;
            }
            $data[] = $row;

        }
        return $data;
}


function getNoparent($accessRightString){
    $data = array();
        $query = "SELECT * FROM admin_navigation";
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
         
    
        $rows = executeQuery($query);
        $id_parent = getParentid($accessRightString);

        foreach ($rows->result_array() as $row) {
            if ($row['parent'] == 0 ) {
                $data[] = $row['id'];
            }
                
        
        }
        $a = array_diff($data, $id_parent);

      return $a;

}

function get_admin_sidemenu($role_id)
{
    $sidemenu = "";
    $ci =& get_instance();

    /*Ambil data role */
    $ci->db->where('id', $role_id);
    $userGroupData = $ci->db->get('user_access_role')->result_array();
    foreach ($userGroupData as $row) {
        $userGroupData = $row;
    }

    /*Ubah User access right menjadi array*/
    $accessRightString = $userGroupData['access_right'];
    $userAccess = explode(",", $userGroupData['access_right']);

   

       $parent_id = getParentid($accessRightString);
       $no_parent = getNoparent($accessRightString);
       
    /* Query penambah untuk menampilkan data navigasi berdasarkan hakases yang di perbolehkan */

    $categoryQuery = " AND(";
        foreach($parent_id as $key=>$val){

          if($key != 0){
                $categoryQuery .= " OR";
            }
          $categoryQuery .= " id = ".$val;
        }
        $categoryQuery .= " ) ORDER BY sort ASC";

    $independentQuery = " AND(";
        foreach($no_parent as $key=>$val){

          if($key != 0){
                $independentQuery .= " OR";
            }
          $independentQuery .= " id = ".$val;
        }
        $independentQuery .= " ) ORDER BY sort ASC";    

     /*Cek Menu aktif yang ada pada navigasi berdasarkan link saat ini dengan rout yg ada di db*/

    $current_route = $ci->uri->segment_array();
    $route = implode('/', $current_route);
    $ci->db->where('link', $route);
    $userGroupData = $ci->db->get('admin_navigation')->result_array();
    foreach ($userGroupData as $row) {
        $activeMenu = $row;
    }
   $activeRoute = isset($activeMenu['parent']) ? $activeMenu['parent'] : 0;
 
   /*Tampilkan seluruh Prent dan submenu berdasarkan acces right pada role */
        
        
        $parent_sub = runQuery($categoryQuery, 'admin_navigation');
        $independentMenu = runQuery($independentQuery, 'admin_navigation');
    /*Tampilkan menu yang idependent*/
        foreach ($independentMenu as $menu_in) {
            if ($menu_in['is_active'] == 0) {
                
            } else {
                $active = $menu_in['id'] == $activeRoute ? "active" : "";
                 $menu_link = $menu_in['link'] != "" ? base_url($menu_in['link']) : "javascript:;";
                 $menusQuery = " AND(";
                    foreach($parent_id as $key=>$val){

                      if($key != 0){
                            $menusQuery .= " OR";
                        }
                      $menusQuery .= " id = ".$val;
                      $menusQuery .= "  AND display = 1";
                    }
                    $menusQuery .= " ) ORDER BY sort ASC";
                
                   
                  $menus = runQuery($menusQuery, 'admin_navigation');
                  $sidemenu .= "<li class='$active'>";
                    $sidemenu .= "<a href='$menu_link'>";
                      $sidemenu .= "<i class='fa fa-".$menu_in['icon']."'></i>";
                      $sidemenu .= "<span class='title'>".$menu_in['label']."</span>";
                      $sidemenu .= "<span class='arrow open'></span><span class='selected'></span>";
                    $sidemenu .= "</a>";
                    if(count($menus) != 0){
                        foreach($parent_sub as $category){ 
                        if($category["is_active"] == 0){

                         } else {
                            
                             $active = $category['id'] == $activeRoute ? "active" : "";
                              $category_link = $category['link'] != "" ? base_url($category['link']) : "javascript:;";
                               $menusQuery = " AND parent = ".$category['id']." AND display = 1 ORDER BY sort ASC";
                              /*Menampilkan Menu parent berdasarkan category id dan status dispalay true*/
                                $data = array();
                                $where = " WHERE 1 ";
                                $where .= $menusQuery != "" ? $menusQuery : "";
                                $query = "SELECT * FROM admin_navigation". $where;
                                
                                $rows = executeQuery($query);
                                foreach ($rows->result_array() as $row) {
                                    foreach($row as $key=>$val){
                                            $row[$key] = $val;
                                    }
                                    $data[] = $row;

                                }
                                $menus = $data;
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
                                    }
                                  }
                                $sidemenu .= "</ul>";
                              }
                              $sidemenu .= "</li>";
                         }
                    }
                    }
                  $sidemenu .= "</li>";
            }
        }
        
        // foreach($parent_sub as $category){ 
        //     if($category["is_active"] == 0){

        //      } else {
                
        //          $active = $category['id'] == $activeRoute ? "active" : "";
        //           $category_link = $category['link'] != "" ? base_url($category['link']) : "javascript:;";
        //            $menusQuery = " AND parent = ".$category['id']." AND display = 1 ORDER BY sort ASC";
        //           /*Menampilkan Menu parent berdasarkan category id dan status dispalay true*/
        //             $data = array();
        //             $where = " WHERE 1 ";
        //             $where .= $menusQuery != "" ? $menusQuery : "";
        //             $query = "SELECT * FROM admin_navigation". $where;
                    
        //             $rows = executeQuery($query);
        //             foreach ($rows->result_array() as $row) {
        //                 foreach($row as $key=>$val){
        //                         $row[$key] = $val;
        //                 }
        //                 $data[] = $row;

        //             }
        //             $menus = $data;
        //           $sidemenu .= "<li class='$active'>";
        //             $sidemenu .= "<a href='$category_link'>";
        //               $sidemenu .= "<i class='fa fa-".$category['icon']."'></i>";
        //               $sidemenu .= "<span class='title'>".$category['label']."</span>";
        //               $sidemenu .= "<span class='arrow open'></span><span class='selected'></span>";
        //           $sidemenu .= "</a>";
        //           if(count($menus) != 0){
        //             $sidemenu .= "<ul class='sub-menu'>";
        //               foreach($menus as $menu){
        //                 if(in_array($menu['id'], $userAccess)){
        //                     $sidemenu .= "<li>";
        //                       $sidemenu .= "<a href='".base_url($menu['link'])."'>".$menu['label']."</a>";
        //                     $sidemenu .= "</li>";
        //                 }
        //               }
        //             $sidemenu .= "</ul>";
        //           }
        //           $sidemenu .= "</li>";
        //      }
        //}

        
         return $sidemenu;

}




function set_active_plugin()
{
    $ci =& get_instance();
    $ci->db->where('active', 1);
    $plugin_array = $ci->db->get('si_plugins')->result_array();
    $data= [];
    foreach ($plugin_array as $plugins) {
       if (is_file(PLUGPATH.$plugins['plugin_name'].'/config.php')) {
           require_once PLUGPATH.$plugins['plugin_name'].'/config.php';
           foreach ($plugin as $config) {
               $data = [
                    'dir_plugin'    => PLUGPATH.$plugins['plugin_name'].DIRECTORY_SEPARATOR,
                    'style'         => PLUGPATH.$plugins['plugin_name'].DIRECTORY_SEPARATOR.$config['css'],
                    'javascript'    => PLUGPATH.$plugins['plugin_name'].DIRECTORY_SEPARATOR.$config['js'],
                    'plugin_name'   => $plugins['plugin_name'],
               ];
           }
       }
    }
    return $data;
}

function get_plugin($plugin_name = null, $id)
{
    $data = set_active_plugin();
    if ($data['plugin_name'] == $plugin_name) {
        if ( (is_file($data['style'])) && (is_file($data['javascript'])) ) {
            if ($id == 'editor') {
                print_r($data);
                return html_editor();
            }
        } 
    } else if ($plugin_name == null && $id == 'stylejs') {
        
    }
    
}

function inject_style()
{
    $data = set_active_plugin();
    echo $data['style'];

}

function inject_js()
{
    # code...
}

function html_editor()
{
    return $html = '<textarea name="editor_value" id="editor" class="from-control"></textarea>';

}

function getParent() {
    $ci =& get_instance();
        $main_menu = $ci->db->get_where('si_menu', array('parent' => 0));
       return $main_menu->result(); 
}

function getRole() {
    $ci =& get_instance();
        $main_menu = $ci->db->get('si_role');
       return $main_menu->result(); 
}