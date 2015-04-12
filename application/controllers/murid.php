<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Murid extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$kelas_model = new Course();
		$list_kelas = $kelas_model->get_published_list_kelas();
		$this->load->view('layout/header');
		$this->load->view('murid/galeri_kelas', array('list_kelas' => $list_kelas));
		$this->load->view('layout/footer');
	}

	public function kelasanda()
	{
		$this->load->view('layout/header');
		$this->load->view('murid/kelas_anda');
		$this->load->view('layout/footer');
	}

	public function galerikelas()
	{
		$kelas_model = new Course();
		$list_kelas = $kelas_model->get_published_list_kelas();
		$this->load->view('layout/header');
		$this->load->view('murid/galeri_kelas', array('list_kelas' => $list_kelas));
		$this->load->view('layout/footer');
	}

	public function aksesmateri()
	{	
		$materi_model = new Resources();
		$list_materi = $materi_model->get_list_materi();
		$this->load->view('layout/header'); 
		$this->load->view('murid/akses_materi', array('list_materi' => $list_materi));
		$this->load->view('layout/footer');
	}
}