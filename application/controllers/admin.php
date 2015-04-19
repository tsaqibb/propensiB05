<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('user_type') != 'admin') {
			redirect();
			return;
		}
	}
	
	public function lama()
	{
		$this->load->view('layout/header');
		$this->load->view('admin/kelas');
		$this->load->view('layout/footer');
	}

	public function login()
	{
		$this->load->view('layout/header-admin');
		$this->load->view('admin/login');
		$this->load->view('layout/footer-admin');
	}

	public function index()
	{
		$kelas_model = new Course();
		$list_kelas = $kelas_model->get_list_kelas_pending();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/pending_classes', array('list_kelas_pending' => $list_kelas));
		$this->load->view('layout/footer-admin');
	}

	public function calonpartisipan()
	{
		$partisipan_kelas = new Students_Class();
		$list_partisipan = $partisipan_kelas->get_list_partisipan_nonactive();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/calon_partisipan', array('list_partisipan' => $list_partisipan));
		$this->load->view('layout/footer-admin');
	}

	public function pendingclasses()
	{
		$kelas_pending = new Course();
		$list_kelas_pending = $kelas_pending->get_list_kelas_pending();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/pending_classes', array('list_kelas_pending' => $list_kelas_pending));
		$this->load->view('layout/footer-admin');
	}

	public function publishedclasses()
	{
		$kelas_published = new Course();
		$list_kelas_published = $kelas_published->get_published_list_kelas();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/published_classes', array('list_kelas_published' => $list_kelas_published));
		$this->load->view('layout/footer-admin');
	}
	
	public function requestunpublish()
	{
		$kelas_unpublish= new Course();
		$list_kelas_request_unpublish = $kelas_unpublish->get_list_kelas_request_unpublish();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/request_unpublish', array('list_kelas_request_unpublish' => $list_kelas_request_unpublish));
		$this->load->view('layout/footer-admin');
	}

	public function feedback()
	{
		$model = new feedback();
		$this->load->view('layout/header');
		$this->load->view('admin/detil_kelas_admin');
		$this->load->view('layout/footer');
	}	
}