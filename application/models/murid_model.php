<?php

class Murid_Model extends DataMapper {

	// Uncomment and edit these two if the class has a model name that
	//   doesn't convert properly using the inflector_helper.
	var $model = 'murid_model';
	var $table = 'murid';

	// You can override the database connections with this option
	// var $db_params = 'db_config_name';

	// --------------------------------------------------------------------
	// Relationships
	//   Configure your relationships below
	// --------------------------------------------------------------------

	// Insert related models that Kelas can have just one of.
	var $has_one = array();

	// Insert related models that Kelas can have more than one of.
	var $has_many = array('kelas', 'materi');

	// --------------------------------------------------------------------
	// Default Ordering
	//   Uncomment this to always sort by 'name', then by
	//   id descending (unless overridden)
	// --------------------------------------------------------------------

	var $default_order_by = array('nama' => 'asc');

	// --------------------------------------------------------------------

	/**
	 * Constructor: calls parent constructor
	 */
    function __construct($id = NULL)
	{
		parent::__construct($nama);
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

	function get_murid($id)
	{
		return $this->where('id =', $id)->get();
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
