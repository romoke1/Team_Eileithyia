<?php

/*
 * Created by Team Eileithyia
 * 
 * This file is where all the controller function 
 * That will be used for Mini Classroom will reside
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    
//------------------------------------------------------------------------------
    public function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->helper('url');
        $this->load->helper('text');
    }
    
    
    protected function teacher_init() {
        if ($this->session->userdata('teacher_email')) {
            $data['teacher'] = $this->model_getvalues->getDetails("teachers", "email", $this->session->userdata('teacher_email'));
        } else {
            redirect(base_url()."teacher/signin");
        }
    }
    
    protected function student_init() {
        if ($this->session->userdata('student_email')) {
            $data['student'] = $this->model_getvalues->getDetails("student", "email", $this->session->userdata('student_email'));
        } else {
            redirect(base_url()."student/signin");
        }
    }
//------------------------------------------------------------------------------
    
//------------------------------------------------------------------------------
// This function will show the first page, that is the landing page
    public function index() {
        $data['title'] = "Thyia E-Learning Classroom";
        $data['status'] = "";

        $this->load->view("layout/header", $data);
        $this->load->view('landing', $data);
    }
//------------------------------------------------------------------------------
    
//------------------------------------------------------------------------------
    public function teacher_signup(){
        $data["title"] = "Teacher Signup | Thyia E-Learning Classroom";
        $data["status"] = "";
        
        $this->form_validation->set_rules('txtFname', 'FullName', 'required|trim');
        $this->form_validation->set_rules('txtEmail', 'Email', 'required|is_unique[teachers.email]');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');
        $this->form_validation->set_rules('txtPassword2', 'Confirm Password', 'required|trim|matches[txtPassword]');
        $this->form_validation->set_message('is_unique', 'The %s is already taken');
        $this->form_validation->set_message('required', 'The %s field is required');
        
        
        if ($this->form_validation->run() == TRUE) {
//            echo "<script>alert('okay')</script>";

            $array = array(
                'fullname' => $this->input->post('txtFname'),
                'email' => $this->input->post('txtEmail'),
                'password' => md5($this->input->post('txtPassword'))
            );
            $this->load->model('model_insertvalues');
            $confirm = $this->model_insertvalues->addItem($array, 'teachers');

            //--------------- Confirm if values has been inserted into the database ---//
            if ($confirm) {

                $data["status"] = $this->model_htmldata->successMsg2("Registration Successful.");

                //------- After the success message has show, redirect to Techer Login Page ----------//
                header('Refresh: 2; url=' . base_url() . 'teacher/signin');
            } else {

                $data["status"] = $this->model_htmldata->errorMsg2("An error occured, please try again");
            }
        }else{
            if(validation_errors()){
            $error = validation_errors();
            $data["status"] = $this->model_htmldata->errorMsg2(str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())));
            }
        }
        
        $this->load->view('layout/header_auth', $data);
        $this->load->view('teacher/signup', $data);
    }
//------------------------------------------------------------------------------
    
//------------------------------------------------------------------------------
    public function teacher_signin(){
        $data["title"] = "Teacher Login | Thyia E-Learning Classroom";
        $data["status"] = "";
        
        $this->form_validation->set_rules('txtEmail', 'Email', 'required|trim');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == TRUE) {

            $email = $this->input->post('txtEmail');
            $this->load->model('model_getvalues');
            $user = $this->model_getvalues->getDetails("teachers", "email", $this->input->post("txtEmail"));
            $passwd = $this->input->post('txtPassword');
            $login = $this->model_getvalues->login_teacher($email, md5($passwd));

            if ($login) {


                $data = array(
                    'teacher_email' => $this->input->post("txtEmail")
                );
                $this->session->set_userdata($data);

                $data["status"] = $this->model_htmldata->successMsg2("Authentication Successful, Welcome!");

                header('Refresh: 1; url=' . base_url() . 'teacher_dashboard');
            } else {
                $data["status"] = $this->model_htmldata->errorMsg2("Oooops!, Authentication Fail, Please try again");
            }
        } else if (!empty($passwd) && !empty($email)) {
            $data["status"] = $this->model_htmldata->errorMsg2(str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())));
        }
        
        $this->load->view('layout/header_auth', $data);
        $this->load->view('teacher/signin', $data);
    }
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
    public function teacher_dashboard(){
        $this->teacher_init();
        $data["teacher"] = $this->model_getvalues->getDetails("teachers", "email", $this->session->userdata('teacher_email'));
        

        $this->load->view('teacher/dashboard', $data);
    }
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
    public function teacher_logout() {
        $this->session->sess_destroy();
        $this->session->unset_userdata('data');
        redirect(base_url()."teacher/signin");
    }
//------------------------------------------------------------------------------

        
//------------------------------------------------------------------------------
    public function student_signup(){
        $data["title"] = "Student Signup | Thyia E-Learning Classroom";
        $data["status"] = "";
        
        $data['class'] = $this->model_getvalues->getTableRows("class", "class_id !=", 0, 'class_id', 'desc');
        
        $this->form_validation->set_rules('txtFname', 'FullName', 'required|trim');
        $this->form_validation->set_rules('txtEmail', 'Email', 'required|is_unique[student.email]');
        $this->form_validation->set_rules('txtClass', 'Class', 'required|trim');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');
        $this->form_validation->set_rules('txtPassword2', 'Confirm Password', 'required|trim|matches[txtPassword]');
        $this->form_validation->set_message('is_unique', 'The %s is already taken');
        $this->form_validation->set_message('required', 'The %s field is required');
        
        
        if ($this->form_validation->run() == TRUE) {
//            echo "<script>alert('okay')</script>";

            $array = array(
                'fullname' => $this->input->post('txtFname'),
                'email' => $this->input->post('txtEmail'),
                'password' => md5($this->input->post('txtPassword')),
                'class_id' => $this->input->post('txtClass')
            );
            $this->load->model('model_insertvalues');
            $confirm = $this->model_insertvalues->addItem($array, 'student');

            //--------------- Confirm if values has been inserted into the database ---//
            if ($confirm) {

                $data["status"] = $this->model_htmldata->successMsg2("Registration Successful.");

                //------- After the success message has show, redirect to Techer Login Page ----------//
                header('Refresh: 2; url=' . base_url() . 'student/signin');
            } else {

                $data["status"] = $this->model_htmldata->errorMsg2("An error occured, please try again");
            }
        }else{
            if(validation_errors()){
            $error = validation_errors();
            $data["status"] = $this->model_htmldata->errorMsg2(str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())));
            }
        }
        
        $this->load->view('layout/header_auth', $data);
        $this->load->view('student/signup', $data);
    }
//------------------------------------------------------------------------------
    
//------------------------------------------------------------------------------
    public function student_signin(){
        $data["title"] = "Student Login | Thyia E-Learning Classroom";
        $data["status"] = "";
        
        $this->form_validation->set_rules('txtEmail', 'Email', 'required|trim');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == TRUE) {

            $email = $this->input->post('txtEmail');
            $this->load->model('model_getvalues');
            $user = $this->model_getvalues->getDetails("student", "email", $this->input->post("txtEmail"));
            $passwd = $this->input->post('txtPassword');
            $login = $this->model_getvalues->login_student($email, md5($passwd));

            if ($login) {

                $data = array(
                    'student_email' => $this->input->post("txtEmail")
                );
                $this->session->set_userdata($data);

                $data["status"] = $this->model_htmldata->successMsg2("Authentication Successful, Welcome!");

                header('Refresh: 1; url=' . base_url() . 'student_dashboard');
                
            } else {
                $data["status"] = $this->model_htmldata->errorMsg2("Oooops!, Authentication Fail, Please try again");
            }
        } else if (!empty($passwd) && !empty($email)) {
            $data["status"] = $this->model_htmldata->errorMsg2(str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())));
        }
        
        $this->load->view('layout/header_auth', $data);
        $this->load->view('student/signin', $data);
    }
//------------------------------------------------------------------------------
    
//------------------------------------------------------------------------------
    public function student_dashboard(){
        $this->student_init();
        $data["student"] = $this->model_getvalues->getDetails("student", "email", $this->session->userdata('student_email'));
        

        $this->load->view('student/dashboard', $data);
    }
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
    public function student_logout() {
        $this->session->sess_destroy();
        $this->session->unset_userdata('data');
        redirect(base_url()."student/signin");
    }
//------------------------------------------------------------------------------


//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
    

}
