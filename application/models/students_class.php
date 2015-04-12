<?php

class Students_Class extends DataMapper {

	var $table = 'Students_Classes';
	var $has_one = array('course','student');
	var $has_many = array();

	var $default_order_by = array('student_id' => 'asc');
    function __construct($id = NULL){
		parent::__construct($id);
    }
    
	// mengembalikan status suatu ID murid tertentu
	function get_status($id){
		 $this->where('student_id = ', $id);
		 return $this->get('isActive');

	}
	
	//menampilkan partisipan didalam suatu kelas
	function get_list_partisipan_active(){
		$query = "class_id ='id' AND isActive = '1'"; 
		return $this->where($query);
	}

	//menampilkan calon partisipan
	function get_list_partisipan_nonactive(){
		$this->where('isActive =',0);
		return $this->get();
	}

	// mengaktifkan calon partisipan
	function set_active_partisipan($id){
		$query = "student_id ='id' AND isActive = '0'"; 
		$this->where($query);
		$this->update('isActive',1);
	}

	//menonaktifkan partisipan kelas
	function set_nonactive_partisipan($id){
		$query = "student_id ='id' AND isActive = '1'"; 
		$this->where($query);
		$this->update('isActive',0);
	}	

	//mendaftar kelas
	function mendaftar($data){
		$this->insert('partisipan_kelas', $data);
	}
	// --------------------------------------------------------------------
	// Custom Validation Rules
	//   Add custom validation rules for this model here.
	// --------------------------------------------------------------------

	/* Example Rule
	function _convert_written_numbers($field, $parameter)
	{
	 	$nums = array('one' => 1, 'two' => 2, 'three' => 3);
	 	if(in_array($this->{$field}, $nums))
		{
			$this->{$field} = $nums[$this->{$field}];
	 	}
	}
	*/
}

/* End of file guru.php */
/* Location: ./application/models/guru.php */
