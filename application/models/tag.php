<?php

class Tag extends DataMapper {

	var $has_one = array();
	var $has_many = array('classes_tag');
	
	var $validation = array(
	    'subjek' => array(
	        'label' => 'Tag',
	        'rules' => array('required', 'unique', 'min_length' => 3, 'max_length' => 35)
	    ),
	);

    function __construct($id = NULL){
		parent::__construct($id);
    }
}