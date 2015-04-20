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
		$this->session->set_userdata('course_id', $id);
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id);
		if(empty($data_kelas->id)) {
			show_404();
			return;
		}
		//melihat list partisipan yang aktid pada suatu kelas
		$partisipan_all = $data_kelas->courses_student->get();
		$list_partisipan = $data_kelas->courses_student->get_list_partisipan_active();

		$list_feedback = $data_kelas->feedback->get();
		
		$data_topik = $data_kelas->topic->get();
		
		$this->load->view('layout/header');

		$this->load->view('detil_kelas',
			array(
				'data_kelas'=>$data_kelas,
				'list_feedback'=>$list_feedback,
				'data_topik' => $data_topik,
				'list_partisipan' => $list_partisipan,
				'partisipan_all' => $partisipan_all)
		);

		$this->load->view('layout/footer');
	}

	public function aksesmateri($id)
	{	
		if($this->session->userdata('is_logged_in') == FALSE) {
			redirect();
			return;
		}
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
		$this->session->set_flashdata('status.notice','Request anda sedang diproses.');
		redirect('/guru/edit_kelas', 'refresh');
	}

	public function approve($id)
	{	
		$kelas_model = new Course();
		$kelas_model->where('id =', $id)->update('status_kelas', 2);
		$this->session->set_flashdata('status.notice','Kelas berhasil dikonfirmasi.');
		redirect('/admin/pendingclasses/', 'refresh');
	}

	public function publish($id)
	{	

		$kelas_model = new Course();
		$kelas_model->where('id =', $id)->update('status_kelas', 4);
		$this->session->set_flashdata('status.notice','Kelas berhasil dipublish');
		redirect('/admin/pendingclasses/', 'refresh');
	}

	public function reject($id)
	{	

		$kelas_model = new Course();
		$status_kelas = $kelas_model->get_by_id($id)->status_kelas;
		$status_kelas_new = $status_kelas - 1;
		$kelas_model->where('id =', $id)->update('status_kelas', $status_kelas_new);
		$this->session->set_flashdata('status.notice','Kelas berhasil dikonfirmasi.');
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
		$this->load->model('courses_student');
		$this->courses_student->set_active_partisipan($id);
		redirect('/admin/calonpartisipan/', 'refresh');
	}
	public function setAllAktif()
	{
		$data=$this->input->post('id');
		$this->load->model('courses_student');
		foreach ($data as $cek) {
			$this->courses_student->set_active_partisipan($cek);
		}
		redirect('/admin/calonpartisipan/', 'refresh');
	}
	public function setNonAktif($id)
	{
		$data=explode("_", $id);
		$id=$data[0];
		$course=$data[1];

		$this->load->model('courses_student');
		$this->courses_student->set_nonactive_partisipan($id);

		redirect('/kelas/detail/'.$course, 'refresh');
	}
	public function setAllNonAktif()
	{
		//$data=explode("_", $id);
		//$id=$data[0];
		//$course=$data[1];
		$this->load->model('courses_student');
		$this->courses_student->set_nonactive_all_partisipan();
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
		if($session_role == 'guru') {
			$feedback_model->role = 1;
		}
		elseif($session_role == 'admin') {
			$feedback_model->role = 0;
		}
		
		$success = $feedback_model->save_as_new();
		redirect('kelas/detail/'.$id.'#feedback', 'refresh');
	}

	public function update_kelas($id)
	{
		$kelas_model = new Course();
		$success_update = $kelas_model->where('id', $id)->update(array(
			'nama' => $this->input->post('nama_kelas'),
			'deskripsi'=>$this->input->post('deskripsi_kelas'),
			'harga'=>$this->input->post('harga'),
			));
		$data_kelas = $kelas_model->get_by_id($id);
		
		//list hasil input tag
		$input_list_tag = explode(',', $this->input->post('class_tags'));
		//list tag yang dimiliki
		$kelas_tags = $data_kelas->classes_tag->get();
		
		//loop untuk setiap tag yang sudah dimiliki kelas pada database
		foreach ($kelas_tags as $kelas_tag) {
			$tag = $kelas_tag->tag->get();
			$delete = true;
			foreach ($input_list_tag as $tag_name) {
				if($tag->subjek == $tag_name) {
					$delete = false;
				}
			}
			if($delete) {
				$classes_tag_model = new Classes_tag();
				$success_delete_tag = $kelas_tag->delete();
				if(!$success_delete_tag) {
					$this->session->set_flashdata('status.error','Gagal hapus tag kelas!');
				}
			}
		}

		//loop untuk setiap tag yg dimasukan
		foreach ($input_list_tag as $tag_name) {
			$tag = new Tag();
			$tag = $tag->where('subjek', $tag_name)->get();
			//membuat tag baru
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
				$success_add_tag = $classes_tag->save_as_new();
				if(!$success_add_tag) {
					$this->session->set_flashdata('status.error','Gagal tambah tag kelas!');
				}
			}
		}
		if($success_update) {
			$this->session->set_flashdata('status.notice','Berhasil update kelas!');
		}
		else{
			$this->session->set_flashdata('status.error','Gagal update kelas!');
		}
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
		$success = $kelas_model->save_as_new();
		if($success) {
			$new_class = new Course();
			$new_class->select_max('id');
			$new_class->get();
			$list_tag = explode(',', $this->input->post('class_tags'));
			foreach ($list_tag as $tag_name) {
				$tag = new Tag();
				$tag = $tag->where('subjek', $tag_name)->get();
				if(empty($tag->id)) {
					$tag = new Tag();
					$tag->subjek = $tag_name;
					$success_add_tag = $tag->save_as_new();
					if(!$success_add_tag) {
						$this->session->set_flashdata('status.error','Gagal menambahkan objek tag!');
					}
					$tag = $tag->where('subjek', $tag_name)->get();
				}
				$classes_tag = new Classes_tag();
				$tag_id = $tag->id;
				$new_class_id = $new_class->id;
				//$new_class_id = '3002';
				$classes_tag = $classes_tag->where(
					array('tag_id ='=> $tag_id, 'course_id ='=> $new_class_id))->get();
				if(empty($classes_tag->id)) {
					$classes_tag = new Classes_tag();
					$classes_tag->tag_id = $tag->id;
					$classes_tag->course_id = $new_class->id;
					//$classes_tag->course_id = '3002';
					$classes_tag->teacher_id = $kelas_model->teacher_id;
					$success_add_tag = $classes_tag->save_as_new();
					if(!$success_add_tag) {
						$this->session->set_flashdata('status.error','Gagal menambahkan tag kelas!');
					}
				}	
			}
			$this->session->set_flashdata('status.notice','Berhasil membuat kelas!');
			redirect('/guru/kelas', 'refresh');
		}
		else{
			$this->session->set_flashdata('status.error','Gagal membuat kelas!');
			redirect('/guru/tambahkelas');
		}
	}

	public function create_topik($id) {
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id);

		$topik_model = new Topic();
		$topik_model->judul = $this->input->post('judul_topik');		
		$topik_model->course_id = $id;
		$topik_model->teacher_id = $data_kelas->teacher_id;	

		$success = $topik_model->save_as_new();
		if($success) {
			$this->session->set_flashdata('status.notice','Berhasil membuat topik!');
		}
		else{
			$this->session->set_flashdata('status.error','Gagal membuat topik!');
		}
		redirect('/guru/edit_kelas/'.$data_kelas->id, 'refresh');
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
		//$kelas_model = new Course();
		//$data_kelas = $kelas_model->get_by_id($id);

		/*$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id);*/


		$topik_model = new Topic();
		$data_topik = $topik_model->get_by_id($id);
		$data_kelas = $data_topik->course->get();

		$type = explode('.', $_FILES["myFile"]["name"]);
		$type = $type[count($type) - 1];
		$url = "video/".uniqid(rand()).".".$type;
		if(in_array($type, array("mp4", "jpg", "png"))){
			if(is_uploaded_file($_FILES["myFile"]["tmp_name"])){
				if(! move_uploaded_file($_FILES["myFile"]["tmp_name"],$url)){
					$url="";
				}
				 
			}

		}
		$materi_model = new Resource();
		$materi_model->judul = $this->input->post('namamateri');
		$materi_model->notes = $this->input->post('notemateri');
		$materi_model->teacher_id = $data_kelas->teacher_id;			
		$materi_model->topic_id = $data_topik->id;
		$materi_model->course_id = $data_kelas->id;	
		$materi_model->url=$url;


		$config['upload_path'] ='./video/';
		$config['allowed_types'] = 'mp4|jpg|pdf';

		$this->load->library('upload',$config);	
		$success = $materi_model->save_as_new();	

		redirect('/guru/edit_kelas/'.$data_kelas->id, 'refresh');
	}
	public function delete($id)
	{
		$kelas_model = new Course();
		$kelas_model = $kelas_model->get_by_id($id);
		$kelas_tag = new Classes_tag();
		$kelas_tags = $kelas_tag->where('course_id', $id)->get();
		foreach ($kelas_tags as $kelas_tag) {
			$kelas_tag->delete();
		}
		$success = $kelas_model->delete();
		if($success) {
			$this->session->set_flashdata('status.notice','Berhasil memnghapus kelas!');
		}
		else{
			$this->session->set_flashdata('status.error','Gagal menghapus kelas!');
		}
		redirect('guru/kelas#draft');
	}


	public function delete_topik($id){
		 
		/*$topik_model  = new Topic();
		$data_topik  = $topik_model->get_by_id($id);
		$data_topik->where('id' , $data_topik->id)->get();
		$data_topik->delete();
		redirect('/guru/kelas#draft');	}
	public function delete_topik($id)
	{
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id);

		$id_kelas = $data_topik->course->get();*/
		$topik_model = new Topic();
		$data_topik  = $topik_model->get_by_id($id);
		$judul_topik = $data_topik->judul;

		$id_kelas = $data_topik->course->get();
		$this->load->database();
		$this->db->delete('topics',array('id' => $id));

		redirect('/guru/edit_kelas/'.$id_kelas->id,'refresh');
	}


	public function delete_materi($id){
		$materi_model = new Resource();
		$data_materi  = $materi_model->get_by_id($id);
		
		$id_topik = $data_materi->topic->get();
		$id_kelas = $id_topik->course->get();

		$this->load->database();
		$this->db->delete('resources',array('id' => $id));

		redirect('/guru/edit_kelas/'.$id_kelas->id,'refresh');
	}
}