<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('guru/kelas');
		$this->load->view('layout/footer');
	}

	public function kelas()
	{
		$this->load->view('layout/header');
		$this->load->view('guru/kelas');
		$this->load->view('layout/footer');
	}
	
	public function tambahkelas()
	{
		$this->load->view('layout/header');
		$this->load->view('guru/tambah_kelas');
		$this->load->view('layout/footer');
	}

	public function tambahmateri(){
		$this->load->view('layout/header');
		$this->load->view('guru/tambah_materi');
		$this->load->view('layout/footer');

	}
}