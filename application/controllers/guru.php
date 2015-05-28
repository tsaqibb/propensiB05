<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		if($this->session->userdata('user_type') != 'guru') {
			redirect();
			return;
		}
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

	public function edit_materi($kelas_id){
		/*$this->load->view('layout/header');
		$this->load->view('guru/tambah_materi');
		$this->load->view('layout/footer');*/
		$kelas_model = new Course();		
		$data_kelas = $kelas_model->get_by_id($kelas_id);
		if($data_kelas->status_kelas % 2 == 1) {
			redirect();
			return;
		}
		$data_topik = $data_kelas->topic->get();
		$data_guru = $data_kelas->teacher->get();
		$this->load->view('layout/header');
		$this->load->view('guru/edit_materi',
			array(
				'data_guru'=>$data_guru,
				'data_kelas'=>$data_kelas,
				'data_topik'=>$data_topik
			)
		);
		$this->load->view('layout/footer');


	}

	public function edit_kelas($kelas_id)
	{
		$kelas_model = new Course();		
		$data_kelas = $kelas_model->get_by_id($kelas_id);
		if($data_kelas->status_kelas % 2 == 1 || $data_kelas->teacher_id != $this->session->userdata('user_id')) {
			redirect();
			return;
		}
		$data_topik = $data_kelas->topic->get();
		$data_guru = $data_kelas->teacher->get();
		$this->load->view('layout/header');
		$this->load->view('guru/edit_kelas',
			array(
				'data_guru'=>$data_guru,
				'data_kelas'=>$data_kelas,
				'data_topik'=>$data_topik
			)
		);
		$this->load->view('layout/footer');
	}

	public function update_kelas($id)
	{
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id);
		if($this->session->userdata('user_id') != $data_kelas->teacher_id) {
			redirect();
			return;
		}
		try {
			$success_update = $kelas_model->where('id', $id)->update(array(
				'nama' => $this->input->post('nama_kelas'),
				'deskripsi'=>$this->input->post('deskripsi_kelas'),
				'harga'=>$this->input->post('harga'),
				));
		} catch (Exception $e) {
			$this->session->set_flashdata('status.error','Gagal update kelas! Masukan yang anda masukan salah');
			redirect('/guru/edit_kelas/'.$id, 'refresh');
		}
		
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
			if(empty($tag_name))
				continue;
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
					redirect('/guru/edit_kelas/'.$id);
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
		$kelas_model->status_kelas = 0;
		try {
			$success = $kelas_model->save_as_new();
		} catch (Exception $e) {
			$this->session->set_flashdata('status.error','Gagal membuat kelas! Masukan yang anda masukan salah');
			redirect('/guru/tambahkelas');
		}
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
				$classes_tag = $classes_tag->where(
					array('tag_id ='=> $tag_id, 'course_id ='=> $new_class->id))->get();
				if(empty($classes_tag->id)) {
					$classes_tag = new Classes_tag();
					$classes_tag->tag_id = $tag->id;
					$classes_tag->course_id = $new_class->id;
					$classes_tag->teacher_id = $kelas_model->teacher_id;
					$success_add_tag = $classes_tag->save_as_new();
					if(!$success_add_tag) {
						$this->session->set_flashdata('status.error','Gagal menambahkan tag kelas!');
					}
				}	
			}
			$this->session->set_flashdata('status.notice','Berhasil membuat kelas!');
			redirect('/guru/edit_kelas/'.$new_class->id.'#materi', 'refresh');
		}
		else{
			$this->session->set_flashdata('status.error','Gagal membuat kelas! Masukan yang anda masukan salah');
			redirect('/guru/tambahkelas');
		}
	}

	public function delete($id)
	{
		$kelas_model = new Course();
		$kelas = $kelas_model->get_by_id($id);
		$teacher = $kelas->teacher->get();
		
		if($teacher->id != $this->session->userdata('user_id'))
			redirect();
		$topik = $kelas->topic->get();
		if(!empty($topik->id)) {
			$this->session->set_flashdata('status.error','Tolong hapus topik yang ada terlebih dahulu!');
			redirect('guru/kelas');
		}

		$kelas_tag = new Classes_tag();
		$kelas_tags = $kelas_tag->where('course_id', $id)->get();
		foreach ($kelas_tags as $tag) {
			$tag->delete();
		}
		//echo method_exists($kelas, 'delete')?'ok':'ko';
		//var_dump($kelas); exit;
		try {
			$success = $kelas->delete();
		} catch (Exception $e) {
			echo"waw";_idt;
		}
		
		if($success) {
			$this->session->set_flashdata('status.notice','Berhasil memnghapus kelas!');
		}
		else{
			$this->session->set_flashdata('status.error','Gagal menghapus kelas!');
		}
		redirect('guru/kelas');
	}

	public function respond_comment($comment_id) {
		$komentar_model = new Review();
		$komentar = $komentar_model->get_by_id($comment_id);
		$courses_student = $komentar->courses_student->get();
		$course = $courses_student->course->get();
		$teacher = $course->teacher->get();
		if($teacher->id != $this->session->userdata('user_id'))
			return;
		try {
			$success = $komentar_model->where('id', $comment_id)->update(array('tanggapan' => $this->input->post('tanggapan')));
		} catch (Exception $e) {
			$this->session->set_flashdata('status.warning','Gagal menangapi komentar!');
			redirect('kelas/detail/'.$course->id);
		}
		if($success)
			$this->session->set_flashdata('status.notice','Berhasil menangapi komentar.');
		else
			$this->session->set_flashdata('status.warning','Gagal menangapi komentar!');
		redirect('kelas/detail/'.$course->id);
	}
}