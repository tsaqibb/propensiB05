<?php

class Student extends DataMapper {

	var $has_one = array();
	var $has_many = array('class', 'resource');
	var $default_order_by = array('id' => 'asc');

    function __construct($id = NULL)
	{
		parent::__construct($nama);
    }
	
}

/* End of file guru.php */
/* Location: ./application/models/guru.php */
