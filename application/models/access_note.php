<?php

class Access_note extends DataMapper {

	var $has_one = array('resource');
	var $has_many = array('student');
	
    
    function __construct($id = NULL){
		parent::__construct($id);
    }
 	

 	


 	function getData($student_id){
 		
 		$this->db->where('student_id',$student_id);
 		 $data =  $this->db->get('access_notes');
 		return $data->result();
 	}

 	
	
}