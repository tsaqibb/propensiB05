<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function index()
	{
		$this->load->view('guru_dashboard');
	}
	public function admin()
	{
		$this->load->view('admin_dashboard');
	}
}