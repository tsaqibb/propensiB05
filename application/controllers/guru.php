<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index($guru_id='1001')
	{
		$guru_model = new Teacher();
		$data_guru = $guru_model->get_by_id($guru_id);
		$data_kelas = $data_guru->course->get();
		$this->load->view('layout/header');
		$this->load->view('guru/kelas', array('data_guru'=>$data_guru, 'data_kelas'=>$data_kelas));
		$this->load->view('layout/footer');
	}

	public function kelas($guru_id='1001')
	{
		$guru_model = new Teacher();
		$data_guru = $guru_model->get_by_id($guru_id);
		$data_kelas = $data_guru->course->get();
		$this->load->view('layout/header');
		$this->load->view('guru/kelas', array('data_guru'=>$data_guru, 'data_kelas'=>$data_kelas));
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