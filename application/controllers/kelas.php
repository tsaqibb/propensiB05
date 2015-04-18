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
		
		$this->load->helper('text');
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
		//melihat list partisipan yang aktid pada suatu kelas
		$list_partisipan = $data_kelas->students_class->get_list_partisipan_active();


		$list_feedback = $data_kelas->feedback->get();

		$data_topik = $data_kelas->topic->get();
		
		$this->load->view('layout/header');

		$this->load->view('detil_kelas',
			array(
				'data_kelas'=>$data_kelas,
				'list_feedback'=>$list_feedback,
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
		$this->load->view('murid/akses_materi', array('kelas' => $kelas, 
			'topik' => $topik ,
			'open_materi' => $open_materi));
		$this->load->view('layout/footer');
	}

	public function request($id)
	{	

		$kelas_model = new Course();
		$status_kelas = $kelas_model->get_by_id($id)->status_kelas;
		$status_kelas_new = $status_kelas + 1;
		$kelas_model->where('id =', $id)->update('status_kelas', $status_kelas_new);
		redirect('/kelas/detil_kelas', 'refresh');
	}

	public function approve($id)
	{	

		$kelas_model = new Course();
		$kelas_model->where('id =', $id)->update('status_kelas', 2);
		redirect('/admin/pendingclasses/', 'refresh');
	}

	public function publish($id)
	{	

		$kelas_model = new Course();
		$kelas_model->where('id =', $id)->update('status_kelas', 4);
		redirect('/admin/pendingclasses/', 'refresh');
	}

	public function reject($id)
	{	

		$kelas_model = new Course();
		$status_kelas = $kelas_model->get_by_id($id)->status_kelas;
		$status_kelas_new = $status_kelas - 1;
		$kelas_model->where('id =', $id)->update('status_kelas', $status_kelas_new);
		redirect('/admin/pendingclasses/', 'refresh');
	}

	public function unpublish($id)
	{	

		$kelas_model = new Course();
		$kelas_model->where('id =', $id)->update('status_kelas', 0);
		redirect('/admin/pendingclasses/', 'refresh');
	}
	public function setAktif($id)
	{
		$this->load->model('students_class');
		$this->students_class->set_active_partisipan($id);
		redirect('/admin/calonpartisipan/', 'refresh');
	}
	public function setAllAktif()
	{
		$data=$this->input->post('id');
		$this->load->model('students_class');
		foreach ($data as $cek) {
			$this->students_class->set_active_partisipan($cek);
		}
		redirect('/admin/calonpartisipan/', 'refresh');
	}
	public function setNonAktif($id)
	{
		$data=explode("_", $id);
		$id=$data[0];
		$course=$data[1];

		$this->load->model('students_class');
		$this->students_class->set_nonactive_partisipan($id);

		redirect('/kelas/detail/'.$course, 'refresh');
	}
	public function setAllNonAktif()
	{
		//$data=explode("_", $id);
		//$id=$data[0];
		//$course=$data[1];
		$this->load->model('students_class');
		$this->students_class->set_nonactive_all_partisipan();
		redirect('/kelas/', 'refresh');
		//redirect('/kelas/detail/'.$course, 'refresh');
	}

	public function add_feedback($id) 
	{
		$feedback_model = new Feedback();
		$feedback_model->pesan = $this->input->post('pesan');
		$feedback_model->course_id = $id;

		$kelas_model = new Course();
		$teacher_id = $kelas_model->get_by_id($id)->teacher_id;
		$feedback_model->teacher_id = $teacher_id;
		$session_role = $this->session->userdata('user_type');
		
		if($session_role = 'guru') {
			$feedback_model->role = 1;
		}
		else {
			$feedback_model->role = 0;
		}
		
		$success = $feedback_model->save_as_new();
		redirect('kelas/detail/'.$id, 'refresh');
	}

	public function update_kelas($id)
	{
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id);
		$sucses = $data_kelas->update(array(
			'nama' => $this->input->post('nama_kelas'),
			'deskripsi'=>$this->input->post('deskripsi_kelas'),
			'harga'=>$this->input->post('harga'),
			));
		redirect('/guru/edit_kelas', 'refresh');
	}

	public function create_kelas()
	{
		$kelas_model = new Course();
		$kelas_model->nama = $this->input->post('nama_kelas');
		$kelas_model->deskripsi = $this->input->post('deskripsi_kelas');
		$kelas_model->harga = $this->input->post('harga');
		$kelas_model->teacher_id = $this->session->userdata('user_id');
		$kelas_model->status_kelas = 1;
		$sucses = $kelas_model->save_as_new();
		redirect('/guru/kelas', 'refresh');

	}

}