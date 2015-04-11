<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('mendaftar_kelas');
		$this->load->view('layout/footer');
	}
}