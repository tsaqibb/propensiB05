<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Murid extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('user_type') != 'murid') {
			redirect();
			return;
		}
	}

	public function index()
	{
		$kelas_model = new Course();
		$list_kelas = $kelas_model->get_published_list_kelas();
		$this->load->helper('text');
		$this->load->view('layout/header');
		$this->load->view('murid/galeri_kelas', array('list_kelas' => $list_kelas));
		$this->load->view('layout/footer');
	}

	public function kelasanda()
	{
		if($this->session->userdata('user_type') != 'murid') {
			redirect();
			return;
		}
		$murid_id = $this->session->userdata('user_id');
		$murid_model = new Student();
		$data_murid = $murid_model->get_by_id($murid_id);
		$this->load->view('layout/header');
		$this->load->view('murid/kelas_anda', array('data_murid' => $data_murid));
		$this->load->view('layout/footer');
	}

	public function galerikelas()
	{
		$kelas_model = new Course();
		$list_kelas = $kelas_model->get_published_list_kelas();
		
		$this->load->helper('text');
		$this->load->view('layout/header');
		$this->load->view('murid/galeri_kelas', array('list_kelas' => $list_kelas));
		$this->load->view('layout/footer');
	}

	public function aksesmateri($id)
	{	

		$materi_model = new Resource();
		$open_materi = $materi_model->get_by_id($id);

		$topik = $open_materi->topic->get();
		$kelas = $topik->course->get();
		
		$this->load->view('layout/header'); 
		$this->load->view('murid/akses_materi', array('kelas' => $kelas, 
			'topik' => $topik ,
			'open_materi' => $open_materi));
		$this->load->view('layout/footer');
	}
}