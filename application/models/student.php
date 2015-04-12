<?php

class Student extends DataMapper {

	var $has_one = array();
	var $has_many = array('course', 'resource', 'students_class');
	var $default_order_by = array('id' => 'asc');

    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
    function get_student()
	{
		return $this->get();
	}
	
}

/* End of file guru.php */
/* Location: ./application/models/guru.php */
