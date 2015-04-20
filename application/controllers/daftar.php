<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$id_murid = $this->session->userdata('user_id');
		$type_user = $this->session->userdata('user_type');

		if($type_user != "murid") redirect('user/login');
		
		if ($this->input->SERVER('REQUEST_METHOD') == 'POST'){
			$daftar_model = new courses_student();
			$id_kelas=$this->session->userdata('course_id');
			$kelas_model = new Course();
			$data_kelas = $kelas_model->get_by_id($id_kelas);
			$harga = $data_kelas->harga;
			$id_guru = $data_kelas->teacher_id;

			
			/*die("harga: $harga, id_guru: $id_guru");*/
			$murr = (new Student($id_murid));
			$data_email = [
				"sender" => "online.ruangguru@gmail.com",
				"sender_name" => "Kelas Online ruangguru.com",
				"receiver" => $murr->email,
				"receiver_name" => $murr->nama,
			];

			if ($harga==0){
				$data_email["subject"] = "Registrasi Kelas Berhasil";
				$data_email["message"] = "Hai $murr->nama, selamat datang di kelas $data_kelas->nama . Kamu sudah terdaftar sebagai peserta resmi kelas ini.";
				if($this->_send_smtp_email($data_email))
				{
					$daftar_model->student_id = $id_murid;
					$daftar_model->course_id = $id_kelas;
					$daftar_model->teacher_id = $id_guru;
					$daftar_model->isActive =1;

					$daftar_model->save_as_new();
					redirect('/kelas/detail/'.$id_kelas );
				} else
					redirect('/daftar/');

			}

			else{
				$data_email["subject"] = "Registrasi Kelas Pending";
				$data_email["message"] = "Hai $murr->nama, kamu ingin mendaftar di kelas $data_kelas->nama Silakan lunasi pembayaran supaya terdaftar di kelas ini.";
				if($this->_send_smtp_email($data_email))
				{
					$daftar_model->student_id = $id_murid;
					$daftar_model->course_id = $id_kelas;
					$daftar_model->teacher_id = $id_guru;
					$daftar_model->isActive =0;

					$daftar_model->save_as_new();
					redirect('/kelas/');
				} else
					redirect('/kelas/');
			}
		}
		$this->load->view('layout/header');
		$this->load->view('mendaftar_kelas');
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