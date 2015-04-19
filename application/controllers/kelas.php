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
		redirect('/guru/edit_kelas', 'refresh');
	}

	public function approve($id)
	{	

		$kelas_model = new Course();
		$kelas_model->where('id =', $id)->update('status_kelas', 2);

		$this->load->library('email');

		$this->email->from('saqib.abud@gmail.com', 'Ruangguru');
		//$this->email->reply_to('info@ruangguru.com', 'Ruangguru');
		$this->email->to('pravitasari.m@gmail.com'); 

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');	

		$this->email->send();

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
		
		//Save pesan & course_id
		$feedback_model->pesan = $this->input->post('pesan');
		$feedback_model->course_id = $id;

		//Save teacher_id
		$kelas_model = new Course();
		$teacher_id = $kelas_model->get_by_id($id)->teacher_id;
		$feedback_model->teacher_id = $teacher_id;
		
		//Save role
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

		$list_tag = explode(',', $this->input->post('class_tags'));
		foreach ($list_tag as $tag_name) {
			$tag = new Tag();
			$tag = $tag->where('subjek', $tag_name)->get();
			if(empty($tag->id)) {
				$tag = new Tag();
				$tag->subjek = $tag_name;
				$success = $tag->save_as_new();
				$tag = $tag->where('subjek', $tag_name)->get();
			}
			$classes_tag = new Classes_tag();
			$classes_tag = $classes_tag->where('tag_id', $tag->id)->get();
			if(empty($classes_tag->id)) {
				$classes_tag = new Classes_tag();
				$classes_tag->tag_id = $tag->id;
				$classes_tag->course_id = $kelas_model->id;
				$classes_tag->teacher_id = $kelas_model->teacher_id;
				$classes_tag->save_as_new();
			}
		}
		$sucses = $data_kelas->update(array(
			'nama' => $this->input->post('nama_kelas'),
			'deskripsi'=>$this->input->post('deskripsi_kelas'),
			'harga'=>$this->input->post('harga'),
			));
		redirect('/guru/edit_kelas/'.$id, 'refresh');
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
		
		$list_tag = explode(',', $this->input->post('class_tags'));
		foreach ($list_tag as $tag_name) {
			$tag = new Tag();
			$tag = $tag->where('subjek', $tag_name)->get();
			if(empty($tag)) {
				$tag = new Tag();
				$tag->subjek = $tag_name;
				$success = $tag->save_as_new();
				$tag = $tag->where('subjek', $tag_name)->get();
			}
			$classes_tag = new Classes_tag();
			$classes_tag = $classes_tag->where('tag_id', $tag->id)->get();
			if(empty($classes_tag)) {
				$classes_tag = new Classes_tag();
				$classes_tag->tag_id = $tag->id;
				$classes_tag->course_id = $kelas_model->id;
				$classes_tag->teacher_id = $kelas_model->teacher_id;
				//$classes_tag->save_as_new();
			}	
		}
		redirect('/guru/kelas', 'refresh');
	}

	public function create_topik($id) {
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id);

		$topik_model = new Topic();
		$topik_model->judul = $this->input->post('judul_topik');		
		$topik_model->course_id = $id;
		$topik_model->teacher_id = $data_kelas->teacher_id;

		$success = $topik_model->save_as_new();
		redirect('/guru/edit_kelas', 'refresh');
	}



	

	/*public function aksesmateri($id)
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
*/
	public function create_materi($id){
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id);

		$topik_model = new Topic();


		$materi_model = new Resource();
		$materi_model->judul = $this->input->post('namamateri');
		$materi_model->notes = $this->input->post('notemateri');
		$materi_model->teacher_id = $data_kelas->teacher_id;
		$materi_model->topic_id = $topik_model->topic_id;
		
		
		$success = $materi_model->save_as_new();
	
		redirect('/guru/edit_kelas', 'refresh');
}

	public function delete($id) {
		$kelas_model = new Course();
		$kelas_model = $kelas_model->get_by_id($id);
		$kelas_model = $kelas_model->delete();

	}




}