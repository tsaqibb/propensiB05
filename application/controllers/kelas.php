<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$kelas_model = new Course();
		$list_kelas = $kelas_model->get_published_list_kelas();
		$this->load->view('layout/header');
		$this->load->view('murid/galeri_kelas', array('list_kelas' => $list_kelas));
		$this->load->view('layout/footer');
	}
	public function detail($id)
	{
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_class(array('id_kelas' => $id));
		if(empty($data_kelas->id_kelas)) {
			show_404();
			return;
		}
//		var_dump($data_kelas->guru_model); exit;
		$this->load->view('layout/header');
		$this->load->view('detil_kelas', array('data_kelas'=>$data_kelas));
		$this->load->view('layout/footer');
	}
}