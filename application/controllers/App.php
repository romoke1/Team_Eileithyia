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
    public function about() {
        $this->load->view("about_us");
    }
//------------------------------------------------------------------------------
    
//------------------------------------------------------------------------------
    public function teacher_signup(){
        $data["title"] = "Teacher Signup | Thyia E-Learning Classroom";
        $data["status"] = "";
        
        $this->form_validation->set_rules('txtFname', 'FullName', 'required|trim');
        $this->form_validation->set_rules('txtEmail', 'Email', 'required|is_unique[teachers.email]');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim|min_length[6]');
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
        if($this->session->userdata('teacher_email')){
            redirect(base_url()."teacher_dashboard");
        }
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
        $data["title"] = $data["teacher"]["fullname"]." | Teacher Dashboard";

        $data['class'] = $this->model_getvalues->getTableRows("class", "teacher_id", $data["teacher"]["id"], 'class_id', 'desc');
        
        $this->load->view('teacher/header', $data);
        $this->load->view('teacher/dashboard', $data);
        $this->load->view('teacher/footer', $data);
    }
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
    public function add_class(){
        $this->teacher_init();
        $data["status"] = "";
        $data["teacher"] = $this->model_getvalues->getDetails("teachers", "email", $this->session->userdata('teacher_email'));
        $data["title"] = $data["teacher"]["fullname"]." | Teacher Dashboard";

        $this->form_validation->set_rules('txtCName', 'Class Name', 'required|trim');
        $this->form_validation->set_rules('txtCDesp', 'Class Description', 'required|trim');
        
        if ($this->form_validation->run() == TRUE) {
//            echo "<script>alert('okay')</script>";

            $array = array(
                'name' => $this->input->post('txtCName'),
                'description' => $this->input->post('txtCDesp'),
                "teacher_id" => $data["teacher"]["id"]
            );
            
            $this->load->model('model_insertvalues');
            $confirm = $this->model_insertvalues->addItem($array, 'class');

            //--------------- Confirm if values has been inserted into the database ---//
            if ($confirm) {

                $data["status"] = $this->model_htmldata->successMsg2("Class Added Successfully.");

                //------- After the success message has show, redirect to Techer Dashboard ----------//
                header('Refresh: 2; url=' . base_url() . 'teacher_dashboard');
            } else {

                $data["status"] = $this->model_htmldata->errorMsg2("An error occured, please try again");
            }
        }else{
            if(validation_errors()){
            $error = validation_errors();
            $data["status"] = $this->model_htmldata->errorMsg2(str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())));
            }
        }
        
        $this->load->view('teacher/header', $data);
        $this->load->view('teacher/add_class', $data);
        $this->load->view('teacher/footer', $data);
    }
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
    public function edit_class($id){
        $this->teacher_init();
        $data["status"] = "";
        $data["teacher"] = $this->model_getvalues->getDetails("teachers", "email", $this->session->userdata('teacher_email'));
        $data["class_del"] = $this->model_getvalues->getDetails("class", "class_id", $id);
        $data["title"] = $data["teacher"]["fullname"]." | Teacher Dashboard";

        $this->form_validation->set_rules('txtCName', 'Class Name', 'required|trim');
        $this->form_validation->set_rules('txtCDesp', 'Class Description', 'required|trim');
        
        if ($this->form_validation->run() == TRUE) {
//            echo "<script>alert('okay')</script>";

            $array = array(
                'name' => $this->input->post('txtCName'),
                'description' => $this->input->post('txtCDesp')
            );
            
            $this->load->model('model_updatevalues');
            $confirm = $this->model_updatevalues->updateVal('class', $array, "class_id", $id);

            //--------------- Confirm if values has been upadated ---//
            if ($confirm) {

                $data["status"] = $this->model_htmldata->successMsg2("Class Updated Successfully.");

                //------- After the success message has show, redirect to Techer Dashboard ----------//
                header('Refresh: 2; url=' . base_url() . 'edit_class/'.$id);
            } else {

                $data["status"] = $this->model_htmldata->errorMsg2("An error occured, please try again");
            }
        }else{
            if(validation_errors()){
            $error = validation_errors();
            $data["status"] = $this->model_htmldata->errorMsg2(str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())));
            }
        }
        
        $this->load->view('teacher/header', $data);
        $this->load->view('teacher/edit_class', $data);
        $this->load->view('teacher/footer', $data);
    }
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
     public function delete_item($x) {
        $this->load->model("model_deletevalues");
        $data = array("id" => $x);
        $this->model_deletevalues->delItem($data, "items");

        redirect(base_url().'items/success');
    }
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
    public function add_item(){
        $this->teacher_init();
        $data["status"] = "";
        $data["teacher"] = $this->model_getvalues->getDetails("teachers", "email", $this->session->userdata('teacher_email'));
        $data["title"] = $data["teacher"]["fullname"]." | Teacher Dashboard";
        
        $data['class'] = $this->model_getvalues->getTableRows("class", "teacher_id", $data["teacher"]["id"], 'class_id', 'desc');

        $this->form_validation->set_rules('txtClass', 'Class Name', 'required|trim');
        $this->form_validation->set_rules('txtName', 'Item Name', 'required|trim');
        $this->form_validation->set_rules('txtDesp', 'Item Description', 'required|trim');
        
        if ($this->form_validation->run() == TRUE) {
//            echo "<script>alert('okay')</script>";
            $config['upload_path'] = "./assets/uploads/";
            $config['allowed_types'] = "jpg|jpeg|gif|png|JPG|JPEG|PNG|png|PDF|pdf|docs|docx|doc";
            $config['overwrite'] = true;
            $config['file_name'] = $this->input->post('txtClass').'-' . rand(376544, 1005679732132031);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data["status"] = $this->model_htmldata->errorMsg2(str_replace(array("\r", "\n"), '\n', strip_tags($this->upload->display_errors())));
                
                 $array = array("class_id" => $this->input->post('txtClass'),
                    "teacher_id" => $data["teacher"]['id'],
                    "name" => $this->input->post('txtName'),
                    "description" => $this->input->post('txtDesp')
                );

                if($this->model_insertvalues->addItem($array, 'items')){
                    $data["status"] = $this->model_htmldata->successMsg2("Item Added Successfully.");

                    //------- After the success message has show, redirect to Techer Dashboard ----------//
                    header('Refresh: 2; url=' . base_url() . 'teacher_dashboard');
                }
            } else {
                $file_data = $this->upload->data();

                $array = array("class_id" => $this->input->post('txtClass'),
                    "teacher_id" => $data["teacher"]['id'],
                    "name" => $this->input->post('txtName'),
                    "description" => $this->input->post('txtDesp'),
                    "file" => $file_data["file_name"]
                );

                if($this->model_insertvalues->addItem($array, 'items')){
                    $data["status"] = $this->model_htmldata->successMsg2("Item Added Successfully.");

                    //------- After the success message has show, redirect to Techer Dashboard ----------//
                    header('Refresh: 2; url=' . base_url() . 'teacher_dashboard');
                }

                $config['image_library'] = 'gd2';
                $config['source_image'] = "./assets/uploads/" . $file_data["file_name"] . "";
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 1020;
                $config['height'] = 700;

                $this->image_lib->initialize($config);


                $this->load->library('image_lib', $config);


                $this->image_lib->resize();

            }
        }else{
            if(validation_errors()){
            $error = validation_errors();
            $data["status"] = $this->model_htmldata->errorMsg2(str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())));
            }
        }
        
        $this->load->view('teacher/header', $data);
        $this->load->view('teacher/add_item', $data);
        $this->load->view('teacher/footer', $data);
    }
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
     public function all_items($stat = ""){
        $this->teacher_init();
        $data["status"] = "";
        if($stat == "success"){
            $data["status"] = $this->model_htmldata->successMsg2("Item Deleted.");
        }
        $data["teacher"] = $this->model_getvalues->getDetails("teachers", "email", $this->session->userdata('teacher_email'));
        $data["title"] = $data["teacher"]["fullname"]." | Teacher Dashboard";

        $data['items'] = $this->model_getvalues->getTableRows("items", "teacher_id", $data["teacher"]["id"], 'id', 'desc');
        
        $this->load->view('teacher/header', $data);
        $this->load->view('teacher/items', $data);
        $this->load->view('teacher/footer', $data);
    }
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
     public function all_student(){
        $this->teacher_init();
        $data["teacher"] = $this->model_getvalues->getDetails("teachers", "email", $this->session->userdata('teacher_email'));
        $data["title"] = $data["teacher"]["fullname"]." | Teacher Dashboard";

        $data['student'] = $this->model_getvalues->getTableRows("student", "id !=", 0, 'id', 'desc');
        
        $this->load->view('teacher/header', $data);
        $this->load->view('teacher/students', $data);
        $this->load->view('teacher/footer', $data);
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
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim|min_length[6]');
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
        if($this->session->userdata('student_email')){
            redirect(base_url()."student_dashboard");
        }
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
        $data["class"] = $this->model_getvalues->getDetails("class", "class_id", $data["student"]["class_id"]);
        $data["title"] = $data["student"]["fullname"]." | Student Dashboard";

        $data['item'] = $this->model_getvalues->getTableRows("items", "class_id", $data["student"]["class_id"], 'id', 'desc');
        
        $this->load->view('student/header', $data);
        $this->load->view('student/dashboard', $data);
        $this->load->view('student/footer', $data);
    }
//------------------------------------------------------------------------------
    
//------------------------------------------------------------------------------
    public function item_details($clas_name, $item_id){
        $this->student_init();
        $data["student"] = $this->model_getvalues->getDetails("student", "email", $this->session->userdata('student_email'));
        $data["class"] = $this->model_getvalues->getDetails("class", "class_id", $data["student"]["class_id"]);
        $data["title"] = $data["student"]["fullname"]." | Student Dashboard";

        $data['item_del'] = $this->model_getvalues->getDetails("items", "id", $item_id);
        
        $data['items'] = $this->model_getvalues->getTableRows("items", "class_id", $data["student"]["class_id"], 'id', 'desc');
                
        $this->load->view('student/header', $data);
        $this->load->view('student/item_details', $data);
        $this->load->view('student/footer', $data);
    }
//------------------------------------------------------------------------------

    function download($id) {
        
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->model_getvalues->getDetails("items", "id", $id);
            
            //file path
            $file = 'assets/uploads/'.$fileInfo['file'];
            
            //download file from directory
            $download = force_download($file, NULL);
            
        }
        
    }
    
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
