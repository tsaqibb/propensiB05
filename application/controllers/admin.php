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
	
	public function index()
	{
		$kelas_model = new Course();
		$list_kelas = $kelas_model->get_list_kelas_pending();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/pending_classes', array('list_kelas_pending' => $list_kelas));
		$this->load->view('layout/footer-admin');
	}

	public function calon_partisipan()
	{
		$partisipan_pending = new courses_student();
		$list_partisipan = $partisipan_pending->get_list_partisipan_nonactive();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/calon_partisipan', array('list_partisipan' => $list_partisipan));
		$this->load->view('layout/footer-admin');
	}

	public function daftarmurid($id)
	{
		$this->session->set_userdata('course_id', $id);
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id);
		if(empty($data_kelas->id)) {
			show_404();
			return;
		}
		$list_partisipan = $data_kelas->courses_student->get_list_partisipan_active();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/daftarmurid', array('data_kelas'=>$data_kelas,'list_partisipan' => $list_partisipan));
		$this->load->view('layout/footer-admin');
	}

	public function setNonActive($id, $id_kelas)
	{

		$this->load->model('courses_student');
		$this->courses_student->set_nonactive_participant($id, $id_kelas);
		$this->session->set_flashdata('status.notice','Murid berhasil dinonaktifkan');
		$murid = new Student($id);
		$kelas = new Course($id_kelas);

		$this->_send_smtp_email(array(
			"sender" => "online.ruangguru@gmail.com",
			"sender_name" => "Kelas Online ruangguru.com",
			"receiver" => $murid->email,
			"subject" => "Status Member Kelas $kelas->nama dinonaktifkan",
			"message" => "Kepada $murid->nama, Mohon maaf karena kami harus menonaktifkan hak akses Anda pada kelas $kelas->nama . Untuk meminta activate kembali, Anda dapat menghubungi Admin ruangguru pada info@ruangguru.com",
			));

		redirect('/admin/daftarmurid/'.$id_kelas);
	}
	public function setAllNonActive($id_kelas)
	{
		$data=$this->input->post('id');
		$this->load->model('courses_student');
		foreach ($data as $cek) {
			$this->courses_student->set_nonactive_all_participant($cek);
			$this->session->set_flashdata('status.notice','Semua murid berhasil dinonaktifkan');
			/*$kelas_model = new Course();
			$data_kelas = $kelas_model->get_by_id($id);*/
			$murid = new Student($id);
			$kelas = new Course($id_kelas);

		$this->_send_smtp_email(array(
			"sender" => "online.ruangguru@gmail.com",
			"sender_name" => "Kelas Online ruangguru.com",
			"receiver" => $murid->email,
			"subject" => "Status Member Kelas $kelas->nama dinonaktifkan",
			"message" => "Kepada $murid->nama, Mohon maaf karena kami harus menonaktifkan hak akses Anda pada kelas $kelas->nama . Untuk meminta activate kembali, Anda dapat menghubungi Admin ruangguru pada info@ruangguru.com",
			));
	}
		redirect('/admin/daftarmurid/'.$id_kelas);
	}

	public function pending_classes()
	{
		$kelas_pending = new Course();
		$list_kelas_pending = $kelas_pending->get_list_kelas_pending();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/pending_classes', array('list_kelas_pending' => $list_kelas_pending));
		$this->load->view('layout/footer-admin');
	}

	public function pending_review()
	{
		$komentar_pending = new Review();
		$list_pending_comment = $komentar_pending->get_list_pending_comment();
		$this->load->view('layout/header-admin');
		$this->load->view('admin/pending_review', array('list_pending_comment' => $list_pending_comment));
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


	public function approve($id)
	{	
		$kelas_model = new Course();
		$status_kelas = $kelas_model->get_by_id($id)->status_kelas;
		if ($status_kelas == 1) {
			$kelas_model->where('id =', $id)->update('status_kelas', 2);
			$this->session->set_flashdata('status.notice','Kelas berhasil dikonfirmasi.');
			redirect('/admin/pending_classes/', 'refresh');
		}
		else {
			$this->session->set_flashdata('status.notice','Status kelas tidak dapat diubah.');
			redirect('/admin/pending_classes/', 'refresh');
		}
	}

	public function approve_review($id)
	{	
		$komentar_model = new Review();
		$status = $komentar_model->get_by_id($id)->status;
		if ($status == 0) {
			$komentar_model->where('id =', $id)->update('status', 1);
			$this->session->set_flashdata('status.notice','Review berhasil dikonfirmasi.');
			redirect('/admin/pending_review/', 'refresh');
		}
		else {
			$this->session->set_flashdata('status.error','Review tidak dapat dikonfitmasi.');
			redirect('/admin/pending_review/', 'refresh');
		}
	}

	public function publish($id)
	{
		$kelas_model = new Course();
		$status_kelas = $kelas_model->get_by_id($id)->status_kelas;
		if ($status_kelas == 3) {
			$kelas_model->where('id =', $id)->update('status_kelas', 4);
			$this->session->set_flashdata('status.notice','Kelas berhasil dipublish');
			redirect('/admin/pending_classes/', 'refresh');
		}
		else {
			$this->session->set_flashdata('status.notice','Status kelas tidak dapat diubah.');
			redirect('/admin/pending_classes/', 'refresh');
		}
	}

	public function reject($id)
	{	
		$kelas_model = new Course();
		$status_kelas = $kelas_model->get_by_id($id)->status_kelas;
		if($status_kelas == 1 || 3 || 5) {
			$status_kelas_new = $status_kelas - 1;
			$kelas_model->where('id =', $id)->update('status_kelas', $status_kelas_new);
			$this->session->set_flashdata('status.notice','Kelas berhasil dikonfirmasi.');
			redirect('/admin/pending_classes/', 'refresh');
		}
		else {
			$this->session->set_flashdata('status.error','Status kelas tidak dapat diubah.');
			redirect('/admin/pending_classes/', 'refresh');
		}
	}

	public function reject_review($id)
	{	
		$komentar_model = new Review();
		$status = $komentar_model->get_by_id($id)->status;
		$komentar_model->where('id =', $id)->update('status', -1);
		$this->session->set_flashdata('status.error','Review berhasil ditolak.');
		redirect('/admin/pending_review/', 'refresh');
	}

	public function unpublish($id)
	{	
		$kelas_model = new Course();
		$status_kelas = $kelas_model->get_by_id($id)->status_kelas;
		if ($status_kelas ==  5) {
			$kelas_model->where('id =', $id)->update('status_kelas', 0);
			$this->session->set_flashdata('status.notice','Kelas berhasil dikonfirmasi.');
			redirect('/admin/pending_classes/', 'refresh');
		}
		else {
			$this->session->set_flashdata('status.error','Status kelas tidak dapat diubah.');
			redirect('/admin/pending_classes/', 'refresh');
		}
	}

	public function feedback()
	{
		$model = new feedback();
		$this->load->view('layout/header');
		$this->load->view('admin/detil_kelas_admin');
		$this->load->view('layout/footer');
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
    $mail->SetFrom ($sender, @$sender_name);
    $mail->Subject = @$subject;
    $mail->ContentType = 'text/html';
    $mail->IsHTML(TRUE);
    $mail->Body = @$message; 
    // you may also use $mail->Body = file_get_contents('your_mail_template.html');
    $mail->AddAddress ($receiver, @$receiver_name);
    // you may also use this format $mail->AddAddress ($recipient);
    return $mail->Send();
  }
}