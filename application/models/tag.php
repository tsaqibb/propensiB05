<?php

class Tag extends DataMapper {

	var $has_one = array();
	var $has_many = array('classes_tag');
	
    function __construct($id = NULL){
		parent::__construct($id);
    }
}