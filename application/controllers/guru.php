<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('guru_dashboard');
		$this->load->view('layout/footer');
	}
	public function kelas()
	{
		$this->load->view('layout/header');
		$this->load->view('guru_dashboard');
		$this->load->view('layout/footer');
	}
	public function tambahkelas()
	{
		$this->load->view('layout/header');
		$this->load->view('tambah_kelas');
		$this->load->view('layout/footer');
	}
}