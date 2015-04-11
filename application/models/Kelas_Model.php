<?php

class Kelas_Model extends DataMapper {

	// Uncomment and edit these two if the class has a model name that
	//   doesn't convert properly using the inflector_helper.
	var $model = 'kelas';
	var $table = 'kelas';

	// You can override the database connections with this option
	// var $db_params = 'db_config_name';

	// --------------------------------------------------------------------
	// Relationships
	//   Configure your relationships below
	// --------------------------------------------------------------------

	// Insert related models that Kelas can have just one of.
	var $has_one = array('guru');

	// Insert related models that Kelas can have more than one of.
	var $has_many = array('topik', 'feedback');

	// --------------------------------------------------------------------
	// Default Ordering
	//   Uncomment this to always sort by 'name', then by
	//   id descending (unless overridden)
	// --------------------------------------------------------------------

	var $default_order_by = array('id_kelas' => 'desc');

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

	function get_list_kelas()
	{
		return $this->get();
	}

	function get_published_list_kelas()
	{
		//return $this->where('status_kelas =', 4)->get();
		$this->where('status_kelas =', 4);
		return $this->order_by('tgl_mulai desc')->get();
	}

	function get_new_list_kelas()
	{
		return $this->where('status_kelas =', 1)->get();
	}

	function get_created_list_kelas($id_guru)
	{
		return $this->where('id_guru =', $id_guru)->get();
	}

	function get_class($var)
	{
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

/* End of file kelas.php */
/* Location: ./application/models/kelas.php */
