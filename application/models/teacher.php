<?php

class Teacher extends DataMapper {

	var $has_one = array();
	var $has_many = array('course');
	
    function __construct($id = NULL){
		parent::__construct($id);
    }
}

/* End of file guru.php */
/* Location: ./application/models/guru.php */
