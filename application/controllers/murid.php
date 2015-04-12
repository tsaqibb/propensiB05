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

	public function aksesmateri($id)
	{	
		$materi_models = new Resources();
		$list_materi = $materi_models->get_list_materi();

		$materi_model = new Resources();
		$open_materi = $materi_model->get_by_id($id);
		$this->load->view('layout/header'); 
		$this->load->view('murid/akses_materi', array('list_materi' => $list_materi, 'open_materi' => $open_materi));
		$this->load->view('layout/footer');
	}
}