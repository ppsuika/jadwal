<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config["menu_id"]               = 'id';
$config["menu_label"]            = 'title';
// $config["menu_parent"]           = 'parent_id';
// $config["menu_icon"] 			 = 'icon';
$config["menu_key"]              = 'url';
$config["menu_slug"]              = 'slug';
$config["menu_order"]            = 'id';

$config["nav_tag_open"]          = '<ul class="ml-menu">';
$config["nav_tag_close"]         = '</ul>';
$config["item_tag_open"]         = '<li>'; 
$config["item_tag_close"]        = '</li>';	
$config["parent_tag_open"]       = '<li class="menu-toggle">';	
$config["parent_tag_close"]      = '</li>';	
$config["parent_anchor_tag"]     = '<a href="%s">%s</a>';	
$config["children_tag_open"]     = '<ul class="nav nav-children">';	
$config["children_tag_close"]    = '</ul>';	
$config['icon_position']		 = 'left'; // 'left' or 'right'
$config['menu_icons_list']		 = array();
// these for the future version
$config['icon_img_base_url']	 = ''; 
$config["item_active_class"] = 'active';  
