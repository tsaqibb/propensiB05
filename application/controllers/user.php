<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		if (!isset($_SESSION)) {
            session_start();
        }
	}

	/** login */
	public function login(){
        $this->load->view('layout/header');
        $this->load->view('login');
		$this->load->view('layout/footer');
    }
    
    public function login_submit($role){
        $input['email'] = $this->input->post('email');
        $input['password'] = $this->input->post('password');
        $user = array();
        if($role=="guru") {
	        $guru_model = new Teacher();
			$guru = $guru_model->check_login($input);
			if(empty($guru->id)){
	            $this->session->set_flashdata('login_guru_notif','Kombinasi email dan password yang Anda masukkan salah, silahkan coba lagi.');
	            redirect('user/login');
	        }else{
	            $user = array(
					'type'	=> 'guru',
					'name'	=> $guru->nama,
					'email'	=> $guru->email,
					'id'	=> $guru->id
				);
				//$this->exec_login($user);
				$this->session->set_userdata('user_type', $user['type']);
				$this->session->set_userdata('user_name', $user['name']);
				$this->session->set_userdata('user_email', $user['email']);
				$this->session->set_userdata('user_id', $user['id']);
				$this->session->set_userdata('is_logged_in',TRUE);
	            redirect('guru');
	        }
	    } elseif($role=="murid") {
	    	$murid_model = new Student();
			$murid = $murid_model->check_login($input);
	        if(empty($murid->id)){
	            $this->session->set_flashdata('login_murid_notif','Kombinasi email dan password yang Anda masukkan salah, silahkan coba lagi.');
	            redirect('user/login');
	        }else{
				$user = array(
					'type'	=> 'murid',
					'name'	=> $murid->nama,
					'email'	=> $murid->email,
					'id'	=> $murid->id
				);
				//$this->exec_login($user);
				$this->session->set_userdata('user_type', $user['type']);
				$this->session->set_userdata('user_name', $user['name']);
				$this->session->set_userdata('user_email', $user['email']);
				$this->session->set_userdata('user_id', $user['id']);
	            $this->session->set_userdata('is_logged_in',TRUE);
	            redirect('murid');
	        }
	    } elseif($role=="admin") {
	    	$admin_model = new Admin();
			$admin = $admin_model->check_login($input);
	        if(empty($admin->email)){
	            $this->session->set_flashdata('login_admin_notif','Kombinasi email dan password yang Anda masukkan salah, silahkan coba lagi.');
	            redirect('user/login');
	        }else{
				$user = array(
					'type'	=> 'admin',
					'name'	=> 'Admin',
					'email'	=> $admin->email
				);
				//$this->exec_login($user);
				$this->session->set_userdata('user_type', $user['type']);
				$this->session->set_userdata('user_name', $user['name']);
				$this->session->set_userdata('user_email', $user['email']);
				$this->session->set_userdata('user_id', $user['id']);
	            $this->session->set_userdata('is_logged_in',TRUE);
	            redirect('admin');
	        }
	    }
    }

    public function logout(){
	    $this->session->sess_destroy();
        redirect('user/login');
    }

}