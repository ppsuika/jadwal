<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site {

	public $side;
	public $template;
	public $template_setting;
	public $website_setting;
	public $isHome = FALSE;
	public $isCategory = FALSE;
	public $isSearch = FALSE;
	public $isDetail = FALSE;
	public $template_set;
	public $modul;

	public function view($pages, $data = NULL)
	{
		$_this =& get_instance();

		$data ? 
			$_this->load->view($this->side.'/'.$this->template.'/'.$pages, $data)
				:
					$_this->load->view($this->side.'/'.$this->template.'/'.$pages);
	}


	public function set($name, $value)
    {
        $this->template_set[$name] = $value;
    }
    
    public function load($view = '' , $view_data = array(), $return = FALSE)
    {     
        
        $ci =& get_instance();
        if ($this->modul) {
        	$dir_modular = $this->side.'/'.$this->template.'/'.$this->modul;
        }

        if ($this->side == 'backend') {
			if ($this->template != null) {
				$this->set('contents', $ci->load->view($dir_modular.'/'.$view, $view_data, TRUE));
				return $ci->load->view($this->side.'/'.$this->template.'/index', $this->template_set, $return);
			}
		}
                 
        
    }

    public function is_loggedin()
    {
    	$_this =& get_instance();
    	$user_session = $_this->session->userdata;
    	if ($this->side == 'backend') {
    		if ($_this->uri->segment(1) == 'auth') {
    			if (isset($user_session['logged_in']) && $user_session['logged_in'] == TRUE && $user_session['role_id'] == 1) {
    				redirect('dashboard','refresh');
    			}
    		} else {
    			if (!isset($user_session['logged_in']) || isset($user_session['role_id']) != 1) {
    				redirect('auth','refresh');
    			}
    		}
    	} else {
    		if (!isset($user_session['logged_in'])) {
    			$_this->session->sess_destroy();
    			redirect(set_url('auth'));
    		}
    	}
    }

}

/* End of file Site.php */
/* Location: ./app/libraries/Site.php */