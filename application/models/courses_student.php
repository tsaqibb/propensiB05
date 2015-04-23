<?php

class Courses_Student extends DataMapper {

	var $table = 'Courses_Students';
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
		$this->where('isActive =', 1);
		return $this->get();
	}

	//menampilkan calon partisipan
	function get_list_partisipan_nonactive(){
		$this->where('isActive =',0);
		return $this->get();
	}

	// mengaktifkan calon partisipan
	function set_active_participant($id, $id_kelas){
		$this->where('student_id =', $id);
		$this->where('course_id =', $id_kelas);
		$this->update('isActive',1);
	}

	//menonaktifkan partisipan kelas
	function set_nonactive_participant($id, $id_kelas){
		$this->where('student_id =', $id);
		$this->where('course_id =', $id_kelas);
		$this->update('isActive',0);
	}
	
	//mengaktifkan semua partisipan kelas
	function set_active_all_participant(){
		$this->where('isActive =',0);
		$this->update('isActive',1);
	}

	//menonaktifkan semua partisipan kelas
	function set_nonactive_all_participant(){
		$this->where('isActive =',1);
		$this->update('isActive',0);
	}

	function get_student_class($var) {
		return $this->where($var)->get();
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
