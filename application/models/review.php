<?php

class Review extends DataMapper {

	var $has_one = array('course','student');
	var $has_many = array('comment');

	function __construct($id = NULL){
		parent::__construct($id);
    }
}
