<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['admin'] = 'auth';
$route['administrator/login'] = 'auth';
$route['administrator'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
