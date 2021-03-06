<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('access_note');
		$this->load->library('unit_test');
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
		/*$par = new courses_student();*/
		$data_kelas = $kelas_model->get_by_id($id);
		if(empty($data_kelas->id)) {
			show_404();
			return;
		}
		$partisipan_all = $data_kelas->courses_student->get();
		$list_partisipan = $data_kelas->courses_student->get_list_partisipan_active();

		$data_topik = $data_kelas->topic->get();


		$list_feedback = $data_kelas->feedback->get();

		/*$list_review = $data_kelas->review->get();*/

		$data_topik = $data_kelas->topic->get();
		
		$this->load->view('layout/header');
		$this->load->view('detil_kelas',
			array(
				'data_kelas'=>$data_kelas,
				'list_feedback'=>$list_feedback,
				'data_topik' => $data_topik,
				'list_partisipan' => $list_partisipan,
				'partisipan_all' => $partisipan_all,
				/*'list_review'=> $list_review*/
				)
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
		
		$access_note = new Access_note();
		$topik = $open_materi->topic->get();
		$kelas = $topik->course->get();			
		$teacher_id = $open_materi->teacher_id;
		$user_id =  $this->session->userdata['user_id'];
		

		if($this->session->userdata['user_type'] == 'admin'){			
			$this->load->view('layout/header'); 
			$this->load->view('murid/akses_materi', array('kelas' => $kelas, 
				'topik' => $topik ,
				'open_materi' => $open_materi										
				));
			$this->load->view('layout/footer');
		}		


		if($this->session->userdata['user_type'] == 'guru'){			
			if($this->session->userdata['user_id'] != $teacher_id){
				echo "kesi"; 
				redirect();
				return;
			}

			$this->load->view('layout/header'); 
			$this->load->view('murid/akses_materi', array('kelas' => $kelas, 
				'topik' => $topik ,
				'open_materi' => $open_materi										
				));
			$this->load->view('layout/footer');
		}				
		
		if($this->session->userdata['user_type'] == 'murid'){
			$courses_student_model = new Courses_student();
			$data = $courses_student_model->isHaveCourse($kelas->id,$user_id);
			
			if($data === FALSE){							
				redirect();
				return;
			}

			if($this->cekAksesMateri($id,$user_id) === FALSE) {			
				$access_note->topic_id = $topik->id;			
				$access_note->resource_id = $id;			
				$access_note->course_id =  $kelas->id;			
				$access_note->teacher_id = $teacher_id;			
				$access_note->student_id = $this->session->userdata['user_id'];		
				$access_note->save_as_new();
			}
			$getAccessNote = $this->access_note->getData($user_id);


			$this->load->view('layout/header'); 
			$this->load->view('murid/akses_materi', array('kelas' => $kelas, 
				'topik' => $topik ,
				'open_materi' => $open_materi,
				'viewed' => $getAccessNote								
				));
			$this->load->view('layout/footer');
		}
		
		
		

		
		
	}

	public function cekAksesMateri ($materi_id, $student_id){
		$materi_model = new Resource();
		//var_dump( $materi_model->isAkses($materi_id,$student_id));
		return $materi_model->isAkses($materi_id,$student_id);
	}

	public function request($id)
	{	
		$kelas_model = new Course();
		$status_kelas = $kelas_model->get_by_id($id)->status_kelas;
		if($status_kelas % 2 == 1)
			redirect('/guru/kelas', 'refresh');
		$status_kelas_new = $status_kelas + 1;
		$kelas_model->where('id =', $id)->update('status_kelas', $status_kelas_new);
		$this->session->set_flashdata('status.notice','Request anda sedang diproses.');
		redirect('/guru/kelas', 'refresh');
	}

	public function publish($id)
	{	
		$kelas_model = new Course();
		$status_kelas = $kelas_model->get_by_id($id)->status_kelas;
		if($status_kelas != 1)
			redirect('/guru/kelas', 'refresh');
		$kelas_model->where('id =', $id)->update('status_kelas', 2);
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
	public function setActive($id, $id_kelas)
	{
		$this->load->model('courses_student');
		$this->courses_student->set_active_participant($id, $id_kelas);
		/*if($success_active) {
			$this->session->set_flashdata('status.notice','Murid berhasil diaktifkan');
		}*/
		$this->session->set_flashdata('status.notice','Murid berhasil diaktifkan');
		$murid = new Student($id);
		$kelas = new Course($id_kelas);
		
		$this->_send_smtp_email(array(
			"sender" => "online.ruangguru@gmail.com",
			"sender_name" => "Kelas Online ruangguru.com",
			"receiver" => $murid->email,
			"subject" => "Status Member Kelas $kelas->nama Sudah Aktif",
			"message" => "Hai $murid->nama, Selamat sekarang kamu sudah terdaftar di kelas $kelas->nama. Selamat Belajar",
			));
		redirect('/admin/calon_partisipan/');
	}
	public function setAllActive()
	{
		$data=$this->input->post('id');
		$this->load->model('courses_student');
		foreach ($data as $cek) {
			$this->courses_student->set_active_all_participant($cek);

			$this->session->set_flashdata('status.notice','Semua murid berhasil diaktifkan');
			$murid = new Student($id);
			$kelas = new Course($id_kelas);
			
			$this->_send_smtp_email(array(
				"sender" => "online.ruangguru@gmail.com",
				"sender_name" => "Kelas Online ruangguru.com",
				"receiver" => $murid->email,
				"subject" => "Status Member Kelas $kelas->nama Sudah Aktif",
				"message" => "Hai $murid->nama, Selamat sekarang kamu sudah terdaftar di kelas $kelas->nama. Selamat Belajar",
				));
		}
		redirect('/admin/calon_partisipan/');
	}
	
	public function add_feedback($id) 
	{
		$feedback_model = new Feedback();
		
		//Save pesan & course_id
		$feedback_model->pesan = $this->test_input($this->input->post('pesan'));
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
		else {
			redirect();
		}
		

		//  UNIT TESTTING
	/*	$test = $this->test_input($this->input->post('pesan'));
		
		$expected_result = "&lt;script&gt;location.href('http://www.hacked.com')&lt;/script&gt;" ; 
		echo $this->unit->run($test,$expected_result);

		exit;*/
		
		$success = $feedback_model->save_as_new();		
		redirect('kelas/detail/'.$id.'#feedback', 'refresh');
	}

	
	

	public function create_topik($id) {
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id);

		$topik_model = new Topic();
		
		$topik_model->judul = $this->test_input($this->input->post('judul_topik'));		
		$topik_model->course_id = $id;
		$topik_model->teacher_id = $data_kelas->teacher_id;	

		$success = $topik_model->save_as_new();
		if($success) {
			$this->session->set_flashdata('status.notice','Berhasil membuat topik!');
		}
		else{
			$this->session->set_flashdata('status.error','Gagal membuat topik!');
		}
		redirect('/guru/edit_kelas/'.$data_kelas->id.'#materi', 'refresh');
	}

	public function create_materi($id){
		$materi_model = new Resource();
		$topik_model = new Topic();
		$data_topik = $topik_model->get_by_id($id);
		$data_kelas = $data_topik->course->get();
		ini_set('upload_max_filesize','40M');
		if(isset($_FILES['myFile']['name']) && $_FILES['myFile']['name'] != '') {

			unset($config);
			$config['upload_path'] ='./_materi/';
			$config['allowed_types'] = 'pdf|mp4';
			$config['upload_max_filesize'] = "40M";
			$videoName = $_FILES['myFile']['name'];
			$config['file_name'] = $videoName;

			$this->load->library('upload' , $config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('myFile')){
				$error = array('error' => $this->upload->display_errors());			
				$this->session->set_flashdata('status.error','Format file tidak sesuai!');
				redirect('/guru/edit_kelas/'.$data_kelas->id.'#materi','refresh');					
			}
			else{
				
				$materi_model->judul = $this->input->post('namamateri');
				$materi_model->notes = $this->input->post('notemateri');			
				$upload_file = $_FILES['myFile']['name'];	

				$extension = pathinfo($upload_file, PATHINFO_EXTENSION);		
				
				$materi_model->teacher_id = $data_kelas->teacher_id;			
				$materi_model->topic_id = $data_topik->id;
				$materi_model->course_id = $data_kelas->id;	
				$materi_model->url = 'materi/'.$upload_file;
				$materi_model->tipe = $extension;

				/*var_dump($materi_model->judul);
				var_dump($materi_model->notes);
				var_dump($materi_model->teacher_id);
				var_dump($materi_model->topic_id);
				var_dump($materi_model->course_id);
				var_dump($materi_model->url);
				var_dump($materi_model->tipe);
				exit;*/

				$success = $materi_model->save_as_new();


				if($success) {
					$this->session->set_flashdata('status.notice','Berhasil membuat materi!');
				}
				else{
					$this->session->set_flashdata('status.error','Gagal membuat materi!');
				}

				redirect('/guru/edit_kelas/'.$data_kelas->id.'#materi','refresh');
				
			}

		} else {
			$this->session->set_flashdata('status.error','Ukuran file terlalu besar!' );
			redirect('/guru/edit_kelas/'.$data_kelas->id.'#materi', 'refresh');
		}
		
	}
	public function delete($id)
	{
		$kelas_model = new Course();
		$kelas = $kelas_model->get_by_id($id);
		$kelas_tag = new Classes_tag();
		$kelas_tags = $kelas_tag->where('course_id', $id)->get();
		foreach ($kelas_tags as $tag) {
			$tag->delete();
		}
		try {
			$success = $kelas->delete();
		} catch (Exception $e) {
			echo "waw"; exit;
		}
		
		if($success) {
			$this->session->set_flashdata('status.notice','Berhasil memnghapus kelas!');
		}
		else{
			$this->session->set_flashdata('status.error','Gagal menghapus kelas!');
		}
		redirect('guru/kelas');
	}

	public function delete_topik($id){
		
		
		$topik_model = new Topic();
		$data_topik  = $topik_model->get_by_id($id);
		$judul_topik = $data_topik->judul;

		$id_kelas = $data_topik->course->get();
		$this->load->database();
		$this->db->delete('topics',array('id' => $id));

		$success = $topik_model->delete();
		if($success) {
			$this->session->set_flashdata('status.notice','Berhasil menghapus topik!');
		}
		else{
			$this->session->set_flashdata('status.error','Gagal menghapus topik!');
		}


		redirect('/guru/edit_kelas/'.$id_kelas->id.'#materi','refresh');
	}


	public function delete_materi($id){
		$materi_model = new Resource();
		$data_materi  = $materi_model->get_by_id($id);
		
		$id_topik = $data_materi->topic->get();
		$id_kelas = $id_topik->course->get();

		$this->load->database();
		$this->db->delete('resources',array('id' => $id));

		$success = $materi_model->delete();
		if($success) {
			$this->session->set_flashdata('status.notice','Berhasil menghapus materi!');
		}
		else{
			$this->session->set_flashdata('status.error','Gagal menghapus materi!');
		}
		redirect('/guru/edit_kelas/'.$id_kelas->id.'#materi','refresh');
	}

  	public function add_review($id) {
  		$murid_kelas_model = new Courses_student();
		$murid_kelas = $murid_kelas_model->get_by_id($id);
		$id_kelas = $murid_kelas->course_id;
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id_kelas);
		$list_course_student = $data_kelas->courses_student->get();

  		$session_role = $this->session->userdata('user_type');
  		$session_id = $this->session->userdata('user_id');

  		if($session_role == "murid") {

  			$registered_student = false;
	  		foreach ($list_course_student as $course_students) :
	            if($session_id == $course_students->student_id) :
	                $registered_student=true;
	                break;
	            endif;
	        endforeach;
	  		
	  		if($registered_student == true) {

		  		$review_model = new Review();
				
				$review_model->courses_student_id = $id;
				$review_model->status = 0;
				$review_model->komentar = $this->input->post('comment-review');
				$success = $review_model->save_as_new(); 
				$success1 = $list_course_student->where('id', $id)->update(array('rating' => $this->input->post('rating-input-1')));
				
				if($success && $success1) {
					$this->session->set_flashdata('status.notice','Berhasil menambah rating, review anda menunggu moderasi');
				}
				else{
					$this->session->set_flashdata('status.error','Gagal menambah review.');
				}
				redirect('/kelas/detail/'.$id_kelas.'#review','refresh');
			}

			else{
				$this->session->set_flashdata('status.error','Anda tidak terdaftar pada kelas ini.');
				redirect('/kelas/detail/'.$id_kelas.'#review','refresh');
			}
  		}
  	}

	// fungsi untuk mengirim email

	function _send_smtp_email($data)
	{
    // $data: sender, sender_name, receiver, receiver_name, subject, message
		extract($data);
		require_once('application/libraries/mailer/PHPMailerAutoload.php');
		$mail = new PHPMailer();
    $mail->IsSMTP();                       // telling the class to use SMTP
    $mail->SMTPDebug = 0;                  // 0 = no output, 1 = errors and messages, 2 = messages only.
    $mail->SMTPAuth = true;                // enable SMTP authentication 
    $mail->SMTPSecure = "tls";             // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com";        // sets Gmail as the SMTP server
    $mail->Port = 587;                     // set the SMTP port for the GMAIL 

    $mail->Username = "online.ruangguru";         // Gmail username
    $mail->Password = "kelasonlineruangguru";      // Gmail password

    // $mail->CharSet = 'windows-1250';
    $mail->SetFrom (@$sender, @$sender_name);
    $mail->Subject = @$subject;
    $mail->ContentType = 'text/html';
    $mail->IsHTML(TRUE);
    $mail->Body = @$message; 
    // you may also use $mail->Body = file_get_contents('your_mail_template.html');
    $mail->AddAddress ($receiver, @$receiver_name);
    // you may also use this format $mail->AddAddress ($recipient);
    return $mail->Send();
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

}