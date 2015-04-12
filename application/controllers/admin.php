<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function lama()
	{
		$this->load->view('layout/header');
		$this->load->view('admin/kelas');
		$this->load->view('layout/footer');
	}

	public function index()
	{
		$kelas_model = new Kelas_Model();
		$list_kelas = $kelas_model->get_new_list_kelas();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/new_class', array('list_kelas' => $list_kelas));
		$this->load->view('layout/footer-admin');
	}

	public function calonpartisipan()
	{
		$partisipan_kelas = new Partisipan_Kelas();
		$list_partisipan = $partisipan_kelas->get_list_partisipan_nonactive();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/calon_partisipan_kelas', array('list_partisipan' => $list_partisipan));
		$this->load->view('layout/footer-admin');
	}
	public function galerikelas()
	{
		$kelas_model = new Kelas_Model();
		$list_kelas = $kelas_model->get_published_list_kelas();
		$this->load->view('layout/header');
		$this->load->view('admin/galeri_kelas_admin', array('list_kelas' => $list_kelas));
		$this->load->view('layout/footer');
	}
	public function detilkelas()
	{
		$this->load->view('layout/header');
		$this->load->view('admin/detil_kelas_admin');
		$this->load->view('layout/footer');
	}
	public function partisipan()
	{
		$partisipan_kelas = new Partisipan_Kelas();
		$list_partisipan = $partisipan_kelas->get_list_partisipan_active();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/partisipan_kelas', array('list_partisipan' => $list_partisipan));
		$this->load->view('layout/footer-admin');
	}
	public function contoh()
	{
		$this->load->view('layout/header-admin');
		$this->load->view('admin/contoh');
		$this->load->view('layout/footer-admin');
	}	
}