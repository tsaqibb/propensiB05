<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function lama()
	{
		$this->load->view('layout/header');
		$this->load->view('admin/kelas');
		$this->load->view('layout/footer');
	}

	public function index()
	{
		$this->load->view('layout/header-admin');
		$this->load->view('admin/new_class');
		$this->load->view('layout/footer-admin');
	}

	public function calonpartisipan()
	{
		$this->load->view('layout/header-admin');
		$this->load->view('admin/calon_partisipan_kelas');
		$this->load->view('layout/footer-admin');
	}
	public function galerikelas()
	{
		$this->load->view('layout/header');
		$this->load->view('admin/galeri_kelas_admin');
		$this->load->view('layout/footer');
	}
	public function detilkelas()
	{
		$this->load->view('layout/header');
		$this->load->view('admin/detil_kelas_admin');
		$this->load->view('layout/footer');
	}
	public function contoh()
	{
		$this->load->view('layout/header-admin');
		$this->load->view('admin/contoh');
		$this->load->view('layout/footer-admin');
	}	
}