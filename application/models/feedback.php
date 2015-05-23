<?php

class Feedback extends DataMapper {

	var $has_one = array('course');
	var $default_order_by = array('waktu_kirim' => 'asc');

	var $validation = array(
	    'pesan' => array(
	        'label' => 'Pesan',
	        'rules' => array('required', 'min_length' => 3, 'max_length' => 20)
	    ),
	    'waktu_kirim' => array(
	        'label' => 'Waktu kirim',
	        'rules' => array('required')
	    ),
	    'role' => array(
	        'label' => 'Peran',
	        'rules' => array('required')
	    ),
	);

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
