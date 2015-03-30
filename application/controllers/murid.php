<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Murid extends CI_Controller {
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('kelas_anda');
		$this->load->view('layout/footer');
	}


}