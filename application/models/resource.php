<?php

class Resource extends DataMapper {

	var $has_one = array('topic');
	var $has_many = array('access_note');

	var $default_order_by = array('id' => 'asc');
    
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }

    function get_list_materi()
	{
		return $this->get();
	}

	public function isAkses( $materi_id,$student_id ){
 		  $array = array('resource_id' => $materi_id,'student_id' => $student_id);
 		  $this->db->where($array);
 		  $data = $this->db->get('access_notes');
 		 
 		 if($data->num_rows() > 0){
 		 	return true;
 		 }
 		 else
 		 {
 		 	return false;
 		 }
 	}
	
    
    
}

/* End of file kelas.php */
/* Location: ./application/models/kelas.php */
