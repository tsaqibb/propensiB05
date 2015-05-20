<?php

class Student extends DataMapper {

	var $has_one = array();
	var $has_many = array('course', 'resource', 'courses_student','review','access_note');
	var $default_order_by = array('id' => 'asc');

    function __construct($id = NULL){
		parent::__construct($id);
    }
    
    function check_login($input){
        $this->where('email =',$input['email']);
        return $this->where('password =',md5($input['password']))->get();
    }
}

/* End of file guru.php */
/* Location: ./application/models/guru.php */
