<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materi extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function _remap() {
		$file = $this->uri->rsegment(2);
		if($this->session->userdata('is_logged_in') == FALSE) { // Not logged in
			redirect();
			return;
		}
		if(file_exists(FCPATH.'_materi/'.$file)){
			$ext_arr = explode(".", $file);
			$ext = array_pop($ext_arr);
			if($ext=="mp4") {
				header('Content-type: video/mp4');
			}
			else if($ext=="pdf") {
				header('Content-type: application/pdf');
			}
			$x = file_get_contents(FCPATH.'_materi/'.$file);
			echo $x;
		}
	}
}