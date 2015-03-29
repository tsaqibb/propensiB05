<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function index()
	{
		$this->load->view('guru_dashboard');
	}
	public function kelas()
	{
		$this->load->view('guru_dashboard');
	}
	public function tambahkelas()
	{
		$this->load->view('tambah_kelas');
	}
}