<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	
	var $data = array();
	var $is_admin = FALSE;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('utility');
		$this->load->library('session');
		
		$this->load->helper('cookie');
			
		$user['type'] = $this->session->userdata('user_type');
		$user['name'] = $this->session->userdata('user_name');
		$user['email'] = $this->session->userdata('user_email');
		$user['id'] = $this->session->userdata('user_id');

		$this->data['is_logged_in'] = FALSE;
		$this->data['user'] = array();
		if( TRUE 
				&& !empty($user['type']) 
				&& !empty($user['name']) 
				&& !empty($user['email']) 
				&& !empty($user['id']) 
		){
			$this->data['is_logged_in'] = TRUE;
			$this->data['user'] = $user;
		}
	}
	
	protected function exec_login($data) {
		$this->exec_logout(FALSE);
		$this->session->set_userdata('user_type', $data['type']);
		$this->session->set_userdata('user_name', $data['name']);
		$this->session->set_userdata('user_email', $data['email']);
		$this->session->set_userdata('user_id', $data['id']);
	}
	
	protected function exec_logout($force = TRUE){
		$this->session->set_userdata('user_type', FALSE);
		$this->session->set_userdata('user_name', FALSE);
		$this->session->set_userdata('user_email', FALSE);
		$this->session->set_userdata('user_id', FALSE);
		$this->session->unset_userdata('user_type');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_email');
		$this->session->unset_userdata('user_id');
		if($force) $this->session->sess_destroy();
	}
	
	protected function _login() {
		
	}
}

class Admin_Controller extends MY_Controller {
	var $admin_id;
	public function __construct(){
		parent::__construct();
		$this->is_admin = TRUE;
	}
}

class Guru_Controller extends MY_Controller {
	
}

class Murid_Controller extends MY_Controller {
	
}