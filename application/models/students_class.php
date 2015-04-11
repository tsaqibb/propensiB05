<?php

class Students_Class extends DataMapper {

	var $has_one = array('kelas');
	var $has_many = array();

	var $default_order_by = array('id_murid' => 'asc');
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
    
	// mengembalikan status suatu ID tertentu
	function get_status($id)
	{
		 $this->where('id_murid = ', $id);
		 return $this->get('isActive');

	}
	
	//menampilkan partisipan didalam suatu kelas
	function get_list_partisipan_active()
	{
		$query = "id_kelas ='id' AND isActive = '1'"; 
		return $this->where($query);
	}

	//menampilkan calon partisipan
	function get_list_partisipan_nonactive()
	{
		$query = "isActive = '0'"; 
		$this->where($query);
		return $this->get('isActive');
	}

	// mengaktifkan calon partisipan
	function set_active_partisipan($id)
	{
		$query = "id_murid ='id' AND isActive = '0'"; 
		$this->where($query);
		$this->update('isActive',1);
	}

	//menonaktifkan partisipan kelas
	function set_nonactive_partisipan($id)
	{
		$query = "id_murid ='id' AND isActive = '1'"; 
		$this->where($query);
		$this->update('isActive',0);
	}	

	//mendaftar kelas
	function mendaftar($data)
	{
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
