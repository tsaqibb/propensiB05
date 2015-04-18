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

	function insertMateri($namaTable,$data){
       $result = $this->db->insert($namaTable,$data);
       return result;

    }

}

/* End of file kelas.php */
/* Location: ./application/models/kelas.php */
