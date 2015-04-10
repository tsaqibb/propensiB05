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

	public function partisipan()
	{
		$this->load->view('layout/header-admin');
		$this->load->view('admin/calon_partisipan');
		$this->load->view('layout/footer-admin');
	}

	public function contoh()
	{
		$this->load->view('layout/header-admin');
		$this->load->view('admin/contoh');
		$this->load->view('layout/footer-admin');
	}	
}