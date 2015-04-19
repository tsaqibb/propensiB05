<?php

class Admin extends DataMapper {
	
    function __construct($id = NULL){
		parent::__construct($email);
    }

    function check_login($input){
        $this->where('email =',$input['email']);
        $result = $this->where('password =',md5($input['password']));
        return $result->get();
    }

    
}

/* End of file admin.php */
/* Location: ./application/models/admin.php */
