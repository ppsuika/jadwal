<?php 
	/**
	 * 
	 */
	class SIConfig
	{
		var $site_url = '';
		var $app_dir = 'app';
		var $document_root = '';
		var $content_app = 'si-content';
		var $host_name = 'localhost';
		var $database_name = 'ci_jadwal';
		var $database_user = 'root';	
		var $database_password = '';
		var $table_prefix = '';
		var $backend_template = 'adminlte';	
		var $app_name = 'SI CMS - V1.0';
		var $backend_perpage = 5;
		var $frontend_perpage = 10;
		var $template_settings = true;

		public function __construct()
		{
			$this->site_url = $this->site_url();
			$this->document_root = $_SERVER["DOCUMENT_ROOT"].'/'.$this->app_dir;
		}

		public static function site_url()
		{
			$http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://';
			$fo = str_replace("index.php","", $_SERVER['SCRIPT_NAME']);
			$base = $base = "$http" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "" . $fo;

			return $base;
		}	

	}
?>