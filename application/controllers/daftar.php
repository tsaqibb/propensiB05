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
		$id_kelas=$this->session->userdata('course_id');
		$kelas_model = new Course();
		$data_kelas = $kelas_model->get_by_id($id_kelas);
		// jika user yang mendaftar belom login, maka akan di redirect ke halaman login
		if($type_user != "murid") redirect('user/login');
		
		// jika murid melakukan persetujuan term dan klik tombol daftar
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

			// akan dicek jika harga kelas = Rp 0,- maka murid dapat langsung aktif
			if ($harga==0){
				$data_email["subject"] = "Registrasi Kelas Berhasil";
				$data_email["message"] = "Hai $murr->nama, selamat datang di kelas $data_kelas->nama . Kamu sudah terdaftar sebagai peserta resmi kelas ini dan dapat mengakses kelas kapan saja. Selamat Belajar.";
					
					$daftar_model->student_id = $id_murid;
					$daftar_model->course_id = $id_kelas;
					$daftar_model->teacher_id = $id_guru;
					$daftar_model->isActive =1;

					$daftar_model->save_as_new();

				/*if($this->_send_smtp_email($data_email))
				{*/
					$this->session->set_flashdata('status.notice','Daftar kelas berhasil!');
					$this->_send_smtp_email($data_email);
					redirect('/kelas/detail/'.$id_kelas );
				/*} else
					redirect('/daftar/');*/
			}

			//jika harga kelas tidak gratis maka status murid masih pending dan notifikasi email berisi perintah untuk membayar kelas terlebih dahulu agar admin mengaktifkan status murid
			else{
				$data_email["subject"] = "Registrasi Kelas Pending";
				$data_email["message"] = "Hai $murr->nama, jika kamu ingin terdaftar di dalam kelas $data_kelas->nama, Silahkan lunasi pembayaran terlebih dahulu melalui transfer maupun langsung ke kantor kami. Terima kasih.";
				//if($this->_send_smtp_email($data_email))
				//{
					$daftar_model->student_id = $id_murid;
					$daftar_model->course_id = $id_kelas;
					$daftar_model->teacher_id = $id_guru;
					$daftar_model->isActive =0;

					$daftar_model->save_as_new();
					$this->session->set_flashdata('status.notice','Daftar kelas berhasil!');
					$this->_send_smtp_email($data_email);
					redirect('/kelas/');
				//} else
				//	redirect('/kelas/');
			}
		}
		$this->load->view('layout/header');
		$this->load->view('mendaftar_kelas');
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