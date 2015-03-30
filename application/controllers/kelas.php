<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('detil_kelas');
		$this->load->view('layout/footer');
	}
}