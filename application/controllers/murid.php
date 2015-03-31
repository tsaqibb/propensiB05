<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Murid extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('murid/galeri_kelas');
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
		$this->load->view('layout/header');
		$this->load->view('murid/galeri_kelas');
		$this->load->view('layout/footer');
	}

	public function aksesmateri()
	{
		$this->load->view('layout/header');
		$this->load->view('murid/akses_materi');
		$this->load->view('layout/footer');
	}



}