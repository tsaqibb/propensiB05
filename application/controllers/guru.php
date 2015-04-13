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
		$list_kelas = $data_guru->course->get();
		$list_published_kelas = array();
		$list_draft_kelas = array();

		foreach ($list_kelas as $kelas) {
			if($kelas->status_kelas < 4) {
				array_push($list_draft_kelas, $kelas);
			} else {
				array_push($list_published_kelas, $kelas);
			}
		}

		$this->load->view('layout/header');
		$this->load->view('guru/kelas',
			array(
				'data_guru'=>$data_guru,
				'list_published_kelas'=>$list_published_kelas,
				'list_draft_kelas'=>$list_draft_kelas
			)
		);
		$this->load->view('layout/footer');
	}

	public function kelas($guru_id='1001')
	{
		$guru_model = new Teacher();
		$data_guru = $guru_model->get_by_id($guru_id);
		$list_kelas = $data_guru->course->get();
		$list_published_kelas = array();
		$list_draft_kelas = array();

		foreach ($list_kelas as $kelas) {
			if($kelas->status_kelas < 4) {
				array_push($list_draft_kelas, $kelas);
			} else {
				array_push($list_published_kelas, $kelas);
			}
		}

		$this->load->view('layout/header');
		$this->load->view('guru/kelas',
			array(
				'data_guru'=>$data_guru,
				'list_published_kelas'=>$list_published_kelas,
				'list_draft_kelas'=>$list_draft_kelas
			)
		);
		$this->load->view('layout/footer');
	}
	
	public function tambahkelas($guru_id='1001')
	{
		$guru_model = new Teacher();
		$data_guru = $guru_model->get_by_id($guru_id);
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