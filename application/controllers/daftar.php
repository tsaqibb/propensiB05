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
			$daftar_model = new Students_Class();
			$id_kelas=$this->session->userdata('course_id');
			$kelas_model = new Course();
			$data_kelas = $kelas_model->get_by_id($id_kelas);
			$harga = $data_kelas->harga;
			$id_guru = $data_kelas->teacher_id;

			// die("harga: $harga, id_guru: $id_guru");
			
			if ($harga==0){	
				$daftar_model->student_id = $id_murid;
				$daftar_model->course_id = $id_kelas;
				$daftar_model->teacher_id = $id_guru;
				$daftar_model->isActive =1;

				$daftar_model->save_as_new();
				redirect('/kelas/detail/'.$id_kelas );
			}
			else{
				$daftar_model->student_id = $id_murid;
				$daftar_model->course_id = $id_kelas;
				$daftar_model->teacher_id = $id_guru;
				$daftar_model->isActive =0;

				$daftar_model->save_as_new();
				redirect('/kelas/');
			}
		}
		$this->load->view('layout/header');
		$this->load->view('mendaftar_kelas');
		$this->load->view('layout/footer');
	}
}