<?php

class Classes_Tag extends DataMapper {

	var $has_one = array('tag', 'course');
	var $has_many = array();
	
    function __construct($id = NULL){
		parent::__construct($id);
    }
}