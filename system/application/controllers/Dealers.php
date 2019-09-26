<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * App
 * 
 * @package   
 * @author hrapp
 * @copyright Ayodeji Adesola
 * @version 2014
 * @access public
 */
class Dealers extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
    }

    protected function init() {
        if ($this->session->userdata('is_logged_in')) {

            //$this->load->model('model_getvalues');
            $data['dealer'] = $this->model_getvalues->getDetails("dealers", "email", $this->session->userdata('email'));
        } else {
            redirect("dealers/login");
        }
    }

    public static function sendsms_post(array $params) {
        $sms_array = array(
            'username' => '40city',
            'password' => 'Multilevel1',
            //'api_key' => '170ab0cc8cc90a0cece2d7daf73f79bd:jyMUKeR9dcJDxDzhPOgjflYSTg8t1iG0',
            'sender' => 'TokunboCars.NG'
        );
        
        $result = array_merge($params, $sms_array);
        
        $params = http_build_query($result);
        $ch = curl_init();
        
        $url = "http://api.smartsmssolutions.com/smsapi.php ";
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    
    public function register() {
        $this->load->library("bcrypt");

        $data["status"] = "";

        $this->form_validation->set_rules('txtFullname', 'FullName', 'required|trim');
        $this->form_validation->set_rules('txtComp', 'Company Name', 'required|trim');
        $this->form_validation->set_rules('txtCompAddr', 'Company Address', 'required|trim');
        $this->form_validation->set_rules('txtPhone', 'Phone Number', 'required|trim|min_length[11]|is_unique[dealers.phone]');
        $this->form_validation->set_rules('txtEmail', 'Email', 'required|valid_email|is_unique[dealers.email]');
        $this->form_validation->set_rules('txtCity', 'City', 'required|trim');
        $this->form_validation->set_rules('txtPass', 'Password', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('txtConPass', 'Confirm Password', 'required|trim|matches[txtPass]');
        $this->form_validation->set_message('is_unique', 'The %s is already taken');
        $this->form_validation->set_message('required', 'The %s field is required');

        if ($this->form_validation->run()) {

            $array = array(
                'fullname' => $this->input->post('txtFullname'),
                'company_name' => $this->input->post('txtComp'),
                'company_address' => $this->input->post('txtCompAddr'),
                'phone' => $this->input->post('txtPhone'),
                'email' => $this->input->post('txtEmail'),
                'city' => $this->input->post('txtCity'),
                'password' => $this->bcrypt->hash_password($this->input->post('txtPass')),
                'verify_code' => $this->genVerifyCode(),
                'status' => 0
            );
            $this->load->model('model_insertvalues');
            $confirm = $this->model_insertvalues->addItem($array, 'dealers');

            //--------------- Confirm if values has been inserted into the database ---//
            if ($confirm) {
                //------------- Get the Last Inserted Id -----------------------//
                $last_id = $this->db->insert_id(); // get the last inserted id
                //-------- Query the database using the last inserted id ------//
                $check_data = $this->model_getvalues->getDetails("dealers", "dealer_id", $last_id);

                //------ Send a SMS to dealer containing the verification code ---------------//
                
                 $sms_array = array(
                        'recipient' => $check_data['phone'],
                        'message' =>  'Your Verification Code is ' . $check_data['verify_code'] . ''
                    );
                 
                 $this->sendsms_post($sms_array);
                
                //------ End of Sms API ------------------------------------------------//
                
                //-------- Send a email to dealer containing the verification code ----------------//
                $email = $this->input->post('txtEmail');

                $message = '<p>Welcome to Nigeria\'s Biggest online US direct car purchase platform. We are excited you joined.</p>';
                $message .= '<p>You are almost there, copy the verification code below.</p>';
                $message .= '<p>Verification Code:- <b>' . $check_data['verify_code'] . '</b></p>';
                $message .= '<p></p>';
                $message .= '<p><a href="' . base_url() . 'dealers/verification/' . $check_data['dealer_id'] . '"><button type="button" style="padding: 5px 20px; background-color: #2a80b9; color: #FFF; font-weight: bold; border: #FFF solid 1px">Click Here to continue</button></a></p>';

                $this->model_htmldata->senderMail($email, $message, "Verification Code", $this->input->post("txtFullname"), "TokunboCars.NG Verification Code");
                //------- End of sending the email to the registered dealer -----------------------//
                //--------- Send a SMS to the registered dealer containing the verification code ------//
                //-------- End of SMS sending --------------------------------------------------------//

                $data["status"] = $this->model_htmldata->successMsg2("Registration Successful. A SMS and Email Has been send to you, kindly check");

                //------- After the success message has show, redirect to verification Page ----------//
//                redirect('dealers/verification/'.$check_data['dealer_id'], 'refresh');
                header('Refresh: 4; url=' . base_url() . 'dealers/verification/' . $check_data['dealer_id'] . '');
            } else {

                $data["status"] = $this->model_htmldata->errorMsg2("An error occured, please try again");
            }
        }

        $this->load->view("dealers/register", $data);
    }

    private function genVerifyCode() {
        $verify = 'TKC';
        for ($i = 0; $i < 7; $i++) {
            $verify .= mt_rand(0, 6);
        }
        return $verify;
    }

    public function verification($last_id) {

        $data['status'] = "";

        $this->form_validation->set_rules('txtVerify', 'Verification Code', 'required|trim');

        if ($this->form_validation->run()) {
            // ------- Validate if verification code is correct ---------------//
            $check = $this->model_getvalues->verify_code($last_id);

            if ($check) {
                $array = array("status" => 0);
                $confirm = $this->model_updatevalues->updateVal2($last_id, $array, 'dealers', 'dealer_id');

                if ($confirm) {

                    $data["status"] = $this->model_htmldata->successMsg2("Congratulation!, you are almost done");

                    // redirect to ID Verification Page
                    header('Refresh: 3; url=' . base_url() . 'dealers/id_verification/' . $last_id . '');
                }
            } else {
                // Display error message if user enters a wrong verification code
                $data["status"] = $this->model_htmldata->errorMsg2("Ooooops!, Wrong Verification Code");
            }
        }

        $this->load->view("dealers/verification", $data);
    }

    public function id_verification($id) {
        $data['id'] = $id;

        $data['status'] = "";

        $this->form_validation->set_rules('id_verify', 'Id Verification Image', 'required');
        if ($this->form_validation->run() == TRUE) {

            $config['upload_path'] = "./dealers/upload/";
            $config['allowed_types'] = "jpg|jpeg|gif|png|JPG|JPEG|PNG";
            $config['overwrite'] = true;
            $config['file_name'] = 'TKC' . rand(376544, 1005679732132031);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $err = $this->upload->display_errors();
                $data["status"] = $this->model_htmldata->errorMsg2($err);
            } else {
                $file_data = $this->upload->data();
                $this->model_updatevalues->updateVal2($id, array("verify_image" => $file_data["file_name"]), 'dealers', 'dealer_id');
                //$this->model_updatevalues->updateVal("details", array("logo" => $file_data["file_name"]), "email", $this->session->userdata("email"));

                $config['image_library'] = 'gd2';
                $config['source_image'] = "./dealers/upload/" . $file_data["file_name"] . "";
                $config['maintain_ratio'] = TRUE;
                $config['height'] = 500;
                //$config['new_image'] = "./upload/" . $file_data["file_name"] . "";


                $this->image_lib->initialize($config);


                $this->load->library('image_lib', $config);


                $this->image_lib->resize();



                $config['image_library'] = 'gd2';
                $config['source_image'] = "./dealers/upload/" . $file_data["file_name"] . "";
                $config['maintain_ratio'] = TRUE;

                $config['wm_type'] = 'overlay';
                $config['wm_overlay_path'] = "./images/low2.jpg";
                //the overlay image
                $config['wm_opacity'] = 100;
                $config['wm_vrt_alignment'] = 'bottom';
                $config['wm_hor_alignment'] = 'center';

                $this->image_lib->initialize($config);

                $this->load->library('image_lib', $config);

                $this->image_lib->watermark();

                $data["status"] = $this->model_htmldata->successMsg2("Congratulation!, We will get back to you soon");

                header('Refresh: 3; url=' . base_url() . 'dealers/login');
            }
        }

        $this->load->view("dealers/id_verification", $data);
    }

    public function login() {

        $this->load->library("bcrypt");

        $data['title'] = "Login";
        $this->load->library("form_validation");
        $data["status"] = "";



        $this->form_validation->set_rules('txtEmail', 'Email', 'required|trim');
        $this->form_validation->set_rules('txtPassword', 'Password', 'required|trim');

        if ($this->form_validation->run() == TRUE) {
            // echo "<script>alert('Waweu!!//');</script>";
            $email = $this->input->post('txtEmail');
            $this->load->model('model_getvalues');
            $dealer = $this->model_getvalues->getDetails("dealers", "email", $this->input->post("txtEmail"));
            $stored_hash = $dealer['password'];
            $passwd = $this->bcrypt->check_password($this->input->post('txtPassword'), $stored_hash);
            $login = $this->model_getvalues->login_dealers($email, $passwd);




            if ($login) {


                $data = array(
                    'email' => $this->input->post("txtEmail"),
                    'is_logged_in' => 1,
                    'dealer_id' => $dealer['dealer_id']
                );
                $this->session->set_userdata($data);

                $data["status"] = $this->model_htmldata->successMsg2("Authentication Successful, Welcome!");

                header('Refresh: 1; url=' . base_url() . 'dealers/dashboard');
            } else {
                $data["status"] = $this->model_htmldata->errorMsg2("Oooops!, Authentication Fail, Please try again");
            }
        } else {
            echo validation_errors();
        }

        $this->load->view('dealers/login', $data);
    }

    public function dashboard($stat = "") {
        $this->init();
        $data['title'] = "My Dashboard - TokunboCars.Ng";
        $data['page'] = "dashboard";


        $this->load->view("dealers/aside", $data);
        $this->load->view("dealers/header", $data);
        $this->load->view("dealers/dashboard", $data);
        $this->load->view("dealers/footer");
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('dealers/login');
    }

    public function add_cars($stat = "") {
        $this->init();
        $data['title'] = "Add Cars - TokunboCars.NG";
        $data['page'] = "add_cars";
        $data['status'] = "";

        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg2("Car  Added Successfully");
        } elseif ($stat == "delete") {
            $data["status"] = $this->model_htmldata->successMsg2("Car Deleted Successfully");
        }
        $data["cat"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "name", "asc");
        $data["model"] = $this->model_getvalues->getTableRows("model", "model_id !=", "0", "name", "asc");

        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('vin', 'VIN', 'required|is_unique[cars.vin]');
        $this->form_validation->set_message('is_unique', 'This Car already exist - Duplicate VIN');

        if ($this->form_validation->run() == TRUE) {


            $make_det = $this->model_getvalues->getDetails("make", "make_id", $this->input->post("make"));
            $model_det = $this->model_getvalues->getDetails("model", "model_id", $this->input->post("model"));

            $array = array(
                "make" => $this->input->post("make"),
                "model" => $this->input->post("model"),
                "vin" => $this->input->post("vin"),
                "amount" => $this->input->post("amount"),
                "damage" => $this->input->post("damage"),
                "odometer" => $this->input->post("odometer"),
                "run" => $this->input->post("run"),
                "car_keys" => $this->input->post("key"),
                "airbags" => implode(',', $this->input->post("airbags")),
                "body" => $this->input->post("body"),
                "fuel" => $this->input->post("fuel"),
                "transmission" => $this->input->post("transmission"),
                //  "images" => $file_data["file_name"],
                "year" => $this->input->post("year"),
                "erc" => $this->input->post("erc"),
                "ctv" => $this->input->post("ctv"),
                "ecc" => $this->input->post("ecc"),
                "status" => 3,
                "car_status" => 0,
                "others" => $this->input->post("others"),
                "cylinder" => $this->input->post("cylinder"),
                "link" => $this->input->post("link"),
                "uploader" => 0,
                "dealer_id" => $this->session->userdata("dealer_id"),
                "datee" => date("Y-m-d"),
                "week" => date('W'),
                "month" => date('m'),
                "ead" => "",
                "search_all" => $this->input->post("vin") . " " . $this->input->post("year") . " " . $make_det['name'] . " " . $model_det['name'] . " " . $this->input->post("others")
            );

            if ($this->model_insertvalues->addItem($array, 'cars')) {
                $lid = $this->db->insert_id();
                $array_up = array(
                    "search_all" => $lid . " " . $this->input->post("vin") . " " . $this->input->post("year") . " " . $make_det['name'] . " " . $model_det['name'] . " " . $this->input->post("others")
                );
                if ($this->model_updatevalues->updateVal2($lid, $array_up, 'cars', 'car_id')) {
                    redirect('dealers/add_image/' . $lid);
                }
            }
        }

        $this->load->view('dealers/aside', $data);
        $this->load->view('dealers/header', $data);
        $this->load->view('dealers/add_cars', $data);
        $this->load->view('dealers/footer');
    }

    public function add_image($a, $stat = "") {
        $this->init();
        $data['title'] = "Add Images | TokunboCars.NG";
        $data["status"] = "";
        $data["token"] = "";
        $data["a"] = $a;
        $data['page'] = "add_image";

        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg2("Image  Added Successfully");
        } 
        elseif ($stat == "delete") {
            $data["status"] = $this->model_htmldata->successMsg2("Car Deleted Successfully");
        }elseif ($stat == "error"){
            $data['status'] = $this->model_htmldata->errorMsg2("Upload a copy of custom paper first");
        }


        $data["car_det"] = $this->model_getvalues->getDetails("cars", "car_id", $a);
        $data["model_det"] = $this->model_getvalues->getDetails("model", "model_id", $data["car_det"]["model"]);
        $data["make_det"] = $this->model_getvalues->getDetails("make", "make_id", $data["car_det"]["make"]);

        $data["car_image"] = $this->model_getvalues->getDetails("cars", "car_id", $a);

        $this->load->view('dealers/aside', $data);
        $this->load->view('dealers/header', $data);
        $this->load->view('dealers/add_images', $data);
        $this->load->view('dealers/footer');
    }

    public function upload_custom_paper_img($a) {

        $this->form_validation->set_rules('txtCC', 'CC Number', 'required|trim');
        if ($this->form_validation->run()) {

            //$res = $this->uploadImages($_FILES);
            //for ($x = 1; $x < 7; $x++) {
            //if ($_FILES["image_" . $x . ""]["name"] != "") {
            //echo $_FILES["image_" . $x . ""]["name"];
            $config['upload_path'] = "./dealers/upload/";
            $config['allowed_types'] = "jpg|jpeg|gif|png|JPG|JPEG|PNG";
            $config['overwrite'] = true;
            $config['file_name'] = rand(376544, 1005679732132031);
            //$config['height'] = 500;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $err = $this->upload->display_errors();
                $data["status"] = $this->model_htmldata->errorMsg($err);
            } else {
                $file_data = $this->upload->data();
                $this->model_updatevalues->updateVal2($a, array("custom_paper" => $file_data["file_name"]), 'cars', 'car_id');
                //$this->model_updatevalues->updateVal("details", array("logo" => $file_data["file_name"]), "email", $this->session->userdata("email"));

                $config['image_library'] = 'gd2';
                $config['source_image'] = "./dealers/upload/" . $file_data["file_name"] . "";
                $config['maintain_ratio'] = TRUE;
                $config['height'] = 500;
                //$config['new_image'] = "./upload/" . $file_data["file_name"] . "";


                $this->image_lib->initialize($config);


                $this->load->library('image_lib', $config);


                $this->image_lib->resize();



                $config['image_library'] = 'gd2';
                $config['source_image'] = "./dealers/upload/" . $file_data["file_name"] . "";
                $config['maintain_ratio'] = TRUE;

                $config['wm_type'] = 'overlay';
                $config['wm_overlay_path'] = "./images/low2.jpg";
                //the overlay image
                $config['wm_opacity'] = 100;
                $config['wm_vrt_alignment'] = 'bottom';
                $config['wm_hor_alignment'] = 'center';

                $this->image_lib->initialize($config);

                $this->load->library('image_lib', $config);

                $this->image_lib->watermark();

                /* $config['image_library'] = 'gd2';
                  $config['source_image'] = "./upload/" . $file_data["file_name"] . "";
                  $config['maintain_ratio'] = TRUE;
                  $config['width'] = 270;
                  $config['create_thumb'] = TRUE;
                  $config['new_image'] = "./upload/thumb_" . $file_data["file_name"] . "";

                  $this->image_lib->initialize($config);
                  $this->image_lib->resize(); */
            }
            //}

            redirect('dealers/add_image/' . $a . '/success');
            //}
        }
    }

    public function upload_img($a, $x) {
        $check = $this->model_getvalues->getDetails("cars", "car_id", $a);

        if ($check['custom_paper'] == NULL) {
            redirect('dealers/add_image/' . $a . '/error');
        } else {
            $this->form_validation->set_rules('joy', 'img', 'required');
            if ($this->form_validation->run()) {

                //$res = $this->uploadImages($_FILES);
                //for ($x = 1; $x < 7; $x++) {
                //if ($_FILES["image_" . $x . ""]["name"] != "") {
                //echo $_FILES["image_" . $x . ""]["name"];
                $config['upload_path'] = "./upload/";
                $config['allowed_types'] = "jpg|jpeg|gif|png|JPG|JPEG|PNG";
                $config['overwrite'] = true;
                $config['file_name'] = rand(376544, 1005679732132031);
                //$config['height'] = 500;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    $err = $this->upload->display_errors();
                    $data["status"] = $this->model_htmldata->errorMsg($err);
                } else {
                    $file_data = $this->upload->data();
                    $this->model_updatevalues->updateVal2($a, array("image_" . $x . "" => $file_data["file_name"]), 'cars', 'car_id');
                    //$this->model_updatevalues->updateVal("details", array("logo" => $file_data["file_name"]), "email", $this->session->userdata("email"));

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = "./upload/" . $file_data["file_name"] . "";
                    $config['maintain_ratio'] = TRUE;
                    $config['height'] = 500;
                    //$config['new_image'] = "./upload/" . $file_data["file_name"] . "";


                    $this->image_lib->initialize($config);


                    $this->load->library('image_lib', $config);


                    $this->image_lib->resize();



                    $config['image_library'] = 'gd2';
                    $config['source_image'] = "./upload/" . $file_data["file_name"] . "";
                    $config['maintain_ratio'] = TRUE;

                    $config['wm_type'] = 'overlay';
                    $config['wm_overlay_path'] = "./images/low2.jpg";
                    //the overlay image
                    $config['wm_opacity'] = 100;
                    $config['wm_vrt_alignment'] = 'bottom';
                    $config['wm_hor_alignment'] = 'center';

                    $this->image_lib->initialize($config);

                    $this->load->library('image_lib', $config);

                    $this->image_lib->watermark();

                    /* $config['image_library'] = 'gd2';
                      $config['source_image'] = "./upload/" . $file_data["file_name"] . "";
                      $config['maintain_ratio'] = TRUE;
                      $config['width'] = 270;
                      $config['create_thumb'] = TRUE;
                      $config['new_image'] = "./upload/thumb_" . $file_data["file_name"] . "";

                      $this->image_lib->initialize($config);
                      $this->image_lib->resize(); */
                }
                //}

                redirect('dealers/add_image/' . $a . '/success');
                //}
            }
        }
    }

    public function fetchModel($a) {
        $model = $this->model_getvalues->getTableRows("model", "make_id", $a, "name", "asc");

        // $teacher_courses = explode("`|", $teacher['courses']);

        $v = '
                                <div class="form-group">


                                 <label for="model">Model</label>
                                     
                                    <select class="select2 form-control select2-hidden-accessible" name="model" id="Model" tabindex="-1" aria-hidden="true">
                                    <option value="">Select Model</option>

                                    ';

        foreach ($model as $model) {

            $v .= '<option value="' . $model->model_id . '">' . $model->name . '</option>';
        }

        $v .= '</select>
                                </div>';

        echo $v;
    }

   
}
