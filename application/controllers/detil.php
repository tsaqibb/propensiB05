<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class detil extends CI_Controller {
		$this->load->view('layout/header');
		$this->load->view('detil_kelas');
		$this->load->view('layout/footer');
	}
}