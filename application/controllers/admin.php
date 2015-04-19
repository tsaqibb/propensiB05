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
		$partisipan_kelas = new courses_student();
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