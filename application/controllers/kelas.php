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
		redirect('/guru/kelas', 'refresh');
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
		redirect('/admin/calonpartisipan/');
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
		else {
			redirect();
		}
		
		$success = $feedback_model->save_as_new();
		redirect('kelas/detail/'.$id.'#feedback', 'refresh');
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

	public function create_materi($id){
		$materi_model = new Resource();
		$topik_model = new Topic();
		$data_topik = $topik_model->get_by_id($id);
		$data_kelas = $data_topik->course->get();
		ini_set('upload_max_filesize','50M');
	if(isset($_FILES['myFile']['name']) && $_FILES['myFile']['name'] != '') {
			unset($config);
			$config['upload_path'] ='./_materi/';
			$config['allowed_types'] = 'pdf|mp4';
			$videoName = $_FILES['myFile']['name'];
			$config['file_name'] = $videoName;

			$this->load->library('upload' , $config);
			$this->upload->initialize($config);

		if(!$this->upload->do_upload('myFile')){
			$error = array('error' => $this->upload->display_errors());
			/*var_dump($error);
			var_dump(ini_get('upload_max_filesize'));
			var_dump($_FILES['myFile']);
			exit;*/
			$this->session->set_flashdata('status.error','Format file tidak sesuai!');
			redirect('/guru/edit_kelas/'.$data_kelas->id,'refresh');					
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
			$success = $materi_model->save_as_new();

		

				if($success) {
					$this->session->set_flashdata('status.notice','Berhasil membuat materi!');
				}
				else{
					$this->session->set_flashdata('status.error','Gagal membuat materi!');
				}

			redirect('/guru/edit_kelas/'.$data_kelas->id,'refresh');
			
			}

	} else {
		$this->session->set_flashdata('status.error','Ukuran file terlalu besar!' );
		redirect('/guru/edit_kelas/'.$data_kelas->id, 'refresh');
	}
		
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

		$success = $topik_model->delete();
		if($success) {
			$this->session->set_flashdata('status.notice','Berhasil menghapus topik!');
		}
		else{
			$this->session->set_flashdata('status.error','Gagal menghapus topik!');
		}


		redirect('/guru/edit_kelas/'.$id_kelas->id,'refresh');
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
		redirect('/guru/edit_kelas/'.$id_kelas->id,'refresh');
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


 	/* public function aksesmateri($id)
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
	}*/
}