<?php

class Resource extends DataMapper {

	var $has_one = array('topic');
	var $has_many = array('access_note');

	var $default_order_by = array('id' => 'asc');
    
	var $validation = array(
	    'judul' => array(
	        'label' => 'Judul Materi',
	        'rules' => array('required', 'min_length' => 3, 'max_length' => 100)
	    ),
	    'url' => array(
	        'label' => 'url',
	        'rules' => array('required', 'unique', 'min_length' => 3, 'max_length' => 200)
	    ),
	    'notes' => array(
	        'label' => 'Judul Materi',
	        'rules' => array('required', 'min_length' => 3, 'max_length' => 600)
	    ),
	);

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
