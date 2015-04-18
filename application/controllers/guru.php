<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		/*if($this->session->userdata('user_type') != 'guru') {
			redirect();
			return;
		}*/
		$id_guru = $this->session->userdata('user_id');
		$guru_model = new Teacher();
		$this->data_guru = $guru_model->get_by_id($id_guru);
	}

	public function index()
	{
		redirect('guru/kelas');
	}

	public function kelas()
	{
		$list_kelas = $this->data_guru->course->get();
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
				'list_published_kelas'=>$list_published_kelas,
				'list_draft_kelas'=>$list_draft_kelas
			)
		);
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

	public function edit_kelas($kelas_id='3002')
	{
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($kelas_id);
		$data_guru = $data_kelas->teacher->get();
		$this->load->view('layout/header');
		$this->load->view('guru/edit_kelas',
			array(
				'data_guru'=>$data_guru,
				'data_kelas'=>$data_kelas
			)
		);
		$this->load->view('layout/footer');
	}
}