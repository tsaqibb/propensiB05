<?php

class Topic extends DataMapper {

	// Insert related models that Kelas can have just one of.
	var $has_one = array('course');

	// Insert related models that Kelas can have more than one of.
	var $has_many = array('resource');

	// --------------------------------------------------------------------
	// Default Ordering
	//   Uncomment this to always sort by 'name', then by
	//   id descending (unless overridden)
	// --------------------------------------------------------------------

	

	// --------------------------------------------------------------------

	/**
	 * Constructor: calls parent constructor
	 */
    function __construct($id = NULL){
		parent::__construct($id);
    }

    function get_list_topic(){
		return $this->get();
	}
}

/* End of file topic.php */
/* Location: ./application/models/guru.php */
