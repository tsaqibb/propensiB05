<?php

class Review extends DataMapper {

	var $has_one = array('courses_student');
	
	/*var $validation = array(
        'komentar' => array(
	        'label' => 'Komentar',
	        'rules' => array('max_length' => 600)
    	),
    );*/

	function __construct($id = NULL){
		parent::__construct($id);
    }


    function get_list_pending_comment() {
    	return $this->where('status =', 0)->get();
    }
}
