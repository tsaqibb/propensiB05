<?php

class Partisipan_Kelas extends DataMapper {

	// Uncomment and edit these two if the class has a model name that
	//   doesn't convert properly using the inflector_helper.
	var $model = 'partisipan_Kelas';
	var $table = 'partisipan_Kelas';

	// You can override the database connections with this option
	// var $db_params = 'db_config_name';

	// --------------------------------------------------------------------
	// Relationships
	//   Configure your relationships below
	// --------------------------------------------------------------------

	// Insert related models that Kelas can have just one of.
	var $has_one = array('kelas');

	// Insert related models that Kelas can have more than one of.
	var $has_many = array();

	// --------------------------------------------------------------------
	// Default Ordering
	//   Uncomment this to always sort by 'name', then by
	//   id descending (unless overridden)
	// --------------------------------------------------------------------

	var $default_order_by = array('id_murid' => 'asc');

	// --------------------------------------------------------------------

	/**
	 * Constructor: calls parent constructor
	 */
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }

	// --------------------------------------------------------------------
	// Post Model Initialisation
	//   Add your own custom initialisation code to the Model
	// The parameter indicates if the current config was loaded from cache or not
	// --------------------------------------------------------------------
	function post_model_init($from_cache = FALSE)
	{
	}

	// --------------------------------------------------------------------
	// Custom Methods
	//   Add your own custom methods here to enhance the model.
	// --------------------------------------------------------------------

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
