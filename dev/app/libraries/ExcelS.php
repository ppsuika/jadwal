<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once APPPATH."/libraries/PhpSpreadsheet/PhpSpreadsheet/Spreadsheet.php";
class Spreadsheet extends Spreadsheet {
    public function __construct() {
        parent::__construct();
    }
}