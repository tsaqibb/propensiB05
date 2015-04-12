<?php

class Resources extends DataMapper {

	var $has_one = array('topic');
	//var $has_many = array('topic', 'feedback');

	var $default_order_by = array('id' => 'desc');
    
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }

    function get_list_materi()
	{
		return $this->get();
	}

}

/* End of file kelas.php */
/* Location: ./application/models/kelas.php */
