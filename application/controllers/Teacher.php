<?php

/*
 * Created by Team Eileithyia
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->helper('url');
        $this->load->helper('text');
    }

//    protected function init() {
//        if ($this->session->userdata('is_logged_in')) {
//            $data['user'] = $this->model_getvalues->getDetails("users", "email", $this->session->userdata('email'));
//        } else {
//            redirect(base_url());
//        }
//    }

    private function genStudentID() {
        $verify = 'Thyia-';
        for ($i = 0; $i < 5; $i++) {
            $verify .= mt_rand(0, 4);
        }
        return $verify;
    }

    public function index() {
        $data['title'] = "Thyia E-Learning Classroom";
        $data['status'] = "";

        $this->load->view('student/index', $data);
    }
    

}
