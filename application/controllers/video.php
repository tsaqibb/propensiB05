<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function _remap() {
		$file = $this->uri->rsegment(2);
		if($this->input->get('debug',TRUE) != 'wakuu') {
			show_404();
		}
		if(file_exists(FCPATH.'_video/'.$file)){
			header('Content-type: video/mp4');
			$x = file_get_contents(FCPATH.'_video/'.$file);
			echo $x;
		}
	}
}