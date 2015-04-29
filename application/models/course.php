<?php

class Course extends DataMapper {

	var $has_one = array('teacher');
	var $has_many = array('topic', 'feedback', 'courses_student', 'student', 'classes_tag', 'admin');
	var $default_order_by = array('id' => 'tgl_mulai');
    
    function __construct($id = NULL){
		parent::__construct($id);
    }

	function get_new_list_kelas(){
		return $this->get();
	}

	function get_published_list_kelas(){
		$this->where('status_kelas =', 4);
		return $this->order_by('tgl_mulai desc')->get();
	}

	function get_list_kelas_pending(){
		$this->where('status_kelas =', 1)->or_where('status_kelas =', 3);
		return $this->order_by('status_kelas')->get();
	}

	function get_list_kelas_request_unpublish(){
		$this->where('status_kelas =', 5);
		return $this->order_by('tgl_mulai desc')->get();
	}

	function get_class($var){
		return $this->where($var)->get();
	}
}

/* End of file kelas.php */
/* Location: ./application/models/kelas.php */
