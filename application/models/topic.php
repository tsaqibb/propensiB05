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
	/*var $validation = array(
	    'judul' => array(
	        'label' => 'Nama Topik',
	        'rules' => array('required', 'unique_pair'=>'course_id' ,'min_length' => 3, 'max_length' => 100)
	    ),
	);*/
	

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
