<?php

class Teacher extends DataMapper {

	var $has_one = array();
	var $has_many = array('course');
	
    function __construct($id = NULL){
		parent::__construct($id);
    }

    function check_login($input){
        $this->where('email',$input['email']);
        $this->where('password',md5($input['password']));
        $result = $this->get();
		return $result;
    }
}

/* End of file guru.php */
/* Location: ./application/models/guru.php */
