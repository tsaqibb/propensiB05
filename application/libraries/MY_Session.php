<?php
class MY_Session extends CI_Session {

    public function __construct() {
        
    }

    function MY_Session() {
        parent::CI_Session();
        $userid = $this->userdata['logged_in'];
        if(!empty($userid)) {
            $this->logged_in_user = new User($userid);
            $CI =& get_instance();
            if($this->logged_in_user->language != $CI->config->item('language')) {
                // override default language
                $CI->config->config['language'] = $this->logged_in_user->language;
                // reload the user model
                $this->logged_in_user->reinitialize_model();
            }
        }
    }
}