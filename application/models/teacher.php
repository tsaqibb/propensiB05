<?php

class Teacher extends DataMapper {

	var $has_one = array();
	var $has_many = array('course');
	var $default_order_by = array('id' => 'desc');

    function __construct($id = NULL)
	{
		parent::__construct($id);
    }

	function get_guru($id_guru)
	{
		return $this->where('id =', $id_guru)->get();
	}
}

/* End of file guru.php */
/* Location: ./application/models/guru.php */
