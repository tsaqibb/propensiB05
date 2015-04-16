<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index($guru_id='1001')
	{
		$guru_model = new Teacher();
		$data_guru = $guru_model->get_by_id($guru_id);
		$list_kelas = $data_guru->course->get();
		$list_published_kelas = array();
		$list_draft_kelas = array();

		foreach ($list_kelas as $kelas) {
			if($kelas->status_kelas < 4) {
				array_push($list_draft_kelas, $kelas);
			} else {
				array_push($list_published_kelas, $kelas);
			}
		}

		$this->load->view('layout/header');
		$this->load->view('guru/kelas',
			array(
				'data_guru'=>$data_guru,
				'list_published_kelas'=>$list_published_kelas,
				'list_draft_kelas'=>$list_draft_kelas
			)
		);
		$this->load->view('layout/footer');
	}

	public function kelas($guru_id='1001')
	{
		$guru_model = new Teacher();
		$data_guru = $guru_model->get_by_id($guru_id);
		$list_kelas = $data_guru->course->get();
		$list_published_kelas = array();
		$list_draft_kelas = array();

		foreach ($list_kelas as $kelas) {
			if($kelas->status_kelas < 4) {
				array_push($list_draft_kelas, $kelas);
			} else {
				array_push($list_published_kelas, $kelas);
			}
		}

		$this->load->view('layout/header');
		$this->load->view('guru/kelas',
			array(
				'data_guru'=>$data_guru,
				'list_published_kelas'=>$list_published_kelas,
				'list_draft_kelas'=>$list_draft_kelas
			)
		);
		$this->load->view('layout/footer');
	}
	
	public function tambahkelas($guru_id='1001')
	{
		$guru_model = new Teacher();
		$data_guru = $guru_model->get_by_id($guru_id);
		$this->load->view('layout/header');
		$this->load->view('guru/tambah_kelas');
		$this->load->view('layout/footer');
	}

	public function tambahmateri(){
		$this->load->view('layout/header');
		$this->load->view('guru/tambah_materi');
		$this->load->view('layout/footer');

	}

	public function edit_kelas($kelas_id='3002')
	{
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($kelas_id);
		$data_guru = $data_kelas->teacher->get();
		$this->load->view('layout/header');
		$this->load->view('guru/edit_kelas',
			array(
				'data_guru'=>$data_guru,
				'data_kelas'=>$data_kelas
			)
		);
		$this->load->view('layout/footer');
	}

	/** login */
	public function login(){
        $this->load->view('layout/header');
        $this->load->view('guru/login');
		$this->load->view('layout/footer');
    }
    
    public function login_submit(){
        $input['email'] = $this->input->post('email');
        $input['password'] = $this->input->post('password');
        $guru_model = new Teacher();
		$guru = $guru_model->check_login($input);
        if(empty($guru)){
            $this->session->set_flashdata('login_guru_notif','Kombinasi email dan password yang Anda masukkan salah, silahkan coba lagi.');
            redirect('guru/login');
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
    }

    public function logout(){
	    $this->session->sess_destroy();
        redirect('kelas');
    }
}