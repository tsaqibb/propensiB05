<?php

class Comment extends DataMapper {

	var $has_one = array('review');
	
	function __construct($id = NULL){
		parent::__construct($id);
    }

    function get_list_pending_comment() {
    	return $this->where('status =', '0')->get();
    }
}
