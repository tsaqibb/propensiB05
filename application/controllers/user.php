<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
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
	            $this->session->set_userdata('guru_id',$guru->id);
	            $this->session->set_userdata('guru_nama',$guru->nama);
	            $this->session->set_userdata('is_logged_in',TRUE);
				$user = array(
					'type'	=> 'guru',
					'name'	=> $guru->nama,
					'email'	=> $guru->email,
					'id'	=> $guru->id
				);
				//$this->exec_login($user);
	            redirect('guru');
	        }
	    } elseif($role=="murid") {
	    	$murid_model = new Student();
			$murid = $murid_model->check_login($input);
	        if(empty($murid->id)){
	            $this->session->set_flashdata('login_murid_notif','Kombinasi email dan password yang Anda masukkan salah, silahkan coba lagi.');
	            redirect('user/login');
	        }else{
	            $this->session->set_userdata('murid_id',$murid->id);
	            $this->session->set_userdata('murid_nama',$murid->nama);
	            $this->session->set_userdata('is_logged_in',TRUE);
				$user = array(
					'type'	=> 'murid',
					'name'	=> $murid->nama,
					'email'	=> $murid->email,
					'id'	=> $murid->id
				);
				//$this->exec_login($user);
	            redirect('murid');
	        }
	    }
	    $this->session->set_userdata('user_type', $user['type']);
		$this->session->set_userdata('user_name', $user['name']);
		$this->session->set_userdata('user_email', $user['email']);
		$this->session->set_userdata('user_id', $user['id']);
    }

    public function logout(){
	    $this->session->sess_destroy();
        redirect('kelas');
    }

}