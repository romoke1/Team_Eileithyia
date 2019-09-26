<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * App
 * 
 * @package   
 * @copyright Ademuyiwa Adetunji
 * @version 2014
 * @access public
 */
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->data = [];
    }

    /**
     * App::index()
     * 
     * @return
     */
    public function index() {
        
        $this->data['meta'] = array('status'=>200, 'message'=>'successful'); 

        $jsonresponse = json_encode($this->data);

        $this->output->set_output($jsonresponse);

        return;
    }
    
    
    public function authenticate() {
        
        $this->data['meta'] = array('status'=>200, 'message'=>'trying to authenticate you...'); 

        $jsonresponse = json_encode($this->data);

        $this->output->set_output($jsonresponse);

        return;
    }
    
}