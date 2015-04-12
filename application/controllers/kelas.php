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
		foreach ($list_kelas as &$data_kelas) {
			$data_kelas->teacher = $data_kelas->teacher->get();
		}
		$this->load->view('layout/header');
		$this->load->view('murid/galeri_kelas', array('list_kelas' => $list_kelas));
		$this->load->view('layout/footer');
	}

	public function detail($id)
	{
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id);
		if(empty($data_kelas->id)) {
			show_404();
			return;
		}
		$list_partisipan = $data_kelas->students_class->get();
		//var_dump($list_partisipan); exit;
		$data_kelas->teacher = $data_kelas->teacher->get();
		
		$feedback_model = new feedback();
		$data_feedback = $feedback_model->get_by_id($id);

		$data_topik = $data_kelas->topic->get();
		
		

		$this->load->view('layout/header');
		$this->load->view('detil_kelas',
			array(
				'data_kelas'=>$data_kelas,
				'data_feedback'=>$data_feedback,
				'data_topik' => $data_topik,
				'list_partisipan' => $list_partisipan)
		);
		$this->load->view('layout/footer');
		
	}

	public function aksesmateri($id)
	{	

		$materi_model = new Resource();
		$open_materi = $materi_model->get_by_id($id);

		$topik = $open_materi->topic->get();
		$kelas = $topik->course->get();
		
		$this->load->view('layout/header'); 
		$this->load->view('murid/akses_materi', array('kelas' => $kelas, 'topik' => $topik ,'open_materi' => $open_materi));
		$this->load->view('layout/footer');
	}
}