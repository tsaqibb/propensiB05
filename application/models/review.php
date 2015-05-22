<?php

class Review extends DataMapper {

	var $has_one = array('course','student');
	var $has_many = array('comment');

	function __construct($id = NULL){
		parent::__construct($id);
    }

    function get_by_user_id($id) {

    	return $this->where('student_id =', $id);
    }
}
