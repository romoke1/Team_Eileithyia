<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Users
 *
 * @package
 * @author Ayodeji Niyi-Adesola
 * @copyright HostNowNow.com
 * @version 2016
 * @access public
 */

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
         

    }

    protected function init() {
        if ($this->session->userdata('is_logged_in')) {

            //$this->load->model('model_getvalues');
            $data['user'] = $this->model_getvalues->getDetails("users", "email", $this->session->userdata('email'));
        } else {
            redirect("users/login");
        }
    }

    // public function index(){
    //     echo "Duh!!";
    // }

    public function index2()
    {
        redirect('users/dashboard');
    }

    public function profile_pic($id) {
        if (file_exists("assets/user_images/" . $user["pic"] . "") == FALSE || $user["pic"] == null) {
            $img = '<img src="' . base_url() . '"assets/img/user2.png" alt="Teacher" style="height: 30px" class="img styled" />';
        } else {
            $img = '<img src="' . base_url() . '"assets/user_images/' . $user["pic"] . ' alt="Teacher" style="height: 30px" class="img styled" />';
        }
    }


    public function dashboard($stat = "") {

        $this->init();
        $data['title'] = "My Dashboard";
        $data['status'] = "";
        
        $data['countInv'] = $this->model_getvalues->getCount("invoices", "user_id", $this->session->userdata('user_id'));
        $data['countPur'] = $this->model_getvalues->getCount("orders", "user_id", $this->session->userdata('user_id'));
        $data['countTic'] = $this->model_getvalues->getCount("tickets", "t_user", $this->session->userdata('user_id'));
        //$data['countWat'] = $this->model_getvalues->getCount("invoices", "user_id", $this->session->userdata('user_id'));

        $data["user"] = $this->model_getvalues->getDetails("users", "email", $this->session->userdata('email'));
        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
        
    }
    
    public function partner_dashboard($stat = "") {

        $this->init();
        $data['title'] = "My Dashboard";
        $data['status'] = "";
        
        $data["ref"] = $this->model_getvalues->getDetails("partners", "user_id", $this->session->userdata('user_id'));
        $data['countRefs'] = $this->model_getvalues->getCount("users", "referral", $data["ref"]['username']);
        $data['sales'] = $this->model_getvalues->getCount("orders", "user_id", $this->session->userdata('user_id'));
        $data['sales2'] = $this->model_getvalues->getCount("tickets", "t_user", $this->session->userdata('user_id'));
        //$data['countWat'] = $this->model_getvalues->getCount("invoices", "user_id", $this->session->userdata('user_id'));

        $data["s"] = 0;
        $data["user"] = $this->model_getvalues->getDetails("users", "email", $this->session->userdata('email'));
        $data["refs"] = $this->model_getvalues->getTableRows("users", "referral", $data["ref"]['username'], "user_id", "desc");
        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('dashboard2', $data);
        $this->load->view('footer');
        
    }

    public function my_profile() {
        //App->init();
        $this->init();
        $data['title'] = "My Profile";
        $data["user"] = $this->model_getvalues->getDetails("users", "user_id", $this->session->userdata('user_id'));
        $this->load->view('header', $data);
        $data['status'] = "";
        $this->load->view('my_profile', $data);
        $this->load->view('footer');
    }

    private function chkVerified() {
        $user = $this->model_getvalues->getDetails("users", "user_id", $this->session->userdata('user_id'));
        if ($user['verified'] === '0') {
            return true;
        }
    }



    public function activate($x) {
        $data['title'] = "Account Activation";
        $this->load->view('header', $data);
        $data["status"] = "";
        $this->load->library("form_validation");
        $data["user"] = $this->model_getvalues->getDetails("users", "activate", $x);
        if ($data["user"]) {
            $arr = array("status" => '1');
            $this->model_updatevalues->updateVal("users", $arr, "user_id", $data["user"]["user_id"]);
            $data["status"] = $this->model_htmldata->successMsg("Hello " . $data["user"]["fullname"] . ", You have succesfully activated your account. <a style='text-decoration: underline' href='" . base_url() . "users/login'> Click here to Login</a>");
            $this->load->view('activate', $data);
        } else {
            $data["status"] = $this->model_htmldata->errorMsg("Invalid activation credentials");
            $this->load->view('activate', $data);
        }

        $this->load->view('footer');
    }



    public function validate_credentials() {
        $this->load->model('model_getvalues');
        if ($this->model_getvalues->can_login()) {
            return true;
        } else {
           $this->session->set_flashdata("eror","<div class='alert alert-danger'></h4>Invalid Email OR Password</h4></div>");
            return false;
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('users/login');
    }

    public function registration_complete() {
        $data['title'] = "Registration Complete";
        $this->load->view('header', $data);
        $this->load->view('registration_complete');
        $this->load->view('footer');
    }

    public function profile() {
        //App->init();
        $this->init();
        $data['title'] = "My Profile";
        $data['status'] = "";
        $data["user"] = $this->model_getvalues->getDetails("users", "email", $_SESSION['email']);
        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('profile', $data);
        $this->load->view('footer');
    }
    
    public function purchases() {
        //App->init();
        $this->init();
        $data['title'] = "My Purchases";
        $data['status'] = "";
        $data["user"] = $this->model_getvalues->getDetails("users", "email", $_SESSION['email']);
        $data["orders"] = $this->model_getvalues->getTableRows("orders", "user_id", $this->session->userdata('user_id'), "order_id", "desc");
        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('purchases', $data);
        $this->load->view('footer');
    }
    
    public function invoices($order) {
        $this->init();
        $data['title'] = "Order Invoices";
        $data['status'] = "";
        $data["user"] = $this->model_getvalues->getDetails("users", "email", $_SESSION['email']);
        $data["invoices"] = $this->model_getvalues->getTableRows("invoices", "order_id", $order, "order_id", "desc");
        
        $data["order"] = $this->model_getvalues->getDetails("orders", "order_id", $order);
        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", $data["order"]['stock_id']);
        $make_id = $data["car_detail"]['make'];
        $model_id = $data["car_detail"]['model'];
        $data["make_detail"] = $this->model_getvalues->getDetails("make", "make_id", $make_id);
        $data["model_detail"] = $this->model_getvalues->getDetails("model", "model_id", $model_id);
        
        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('invoices', $data);
        $this->load->view('footer');
    }
    
    public function my_invoices() {
        $this->init();
        $data['title'] = "My Invoices";
        $data['status'] = "";
        $data["user"] = $this->model_getvalues->getDetails("users", "user_id", $this->session->userdata('user_id'));
        $data["invoices"] = $this->model_getvalues->getTableRows("invoices", "user_id", $this->session->userdata('user_id'), "order_id", "desc");
        
        
        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('invoices_all', $data);
        $this->load->view('footer');
    }


    public function edit_contact($stat = "") {

        $this->init();
        $data['title'] = "Edit Profile";
        $this->load->view('header', $data);

       
        $data['user'] = $this->model_getvalues->getDetails("users", "email", $_SESSION['email']);
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Your profile has been updated");
        } else {
            $data['status'] = '';
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules('fullname', 'FullName', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone Number ', 'required|trim');
        $this->form_validation->set_rules('address', 'Address ', 'required|trim');
        $this->form_validation->set_rules('company', 'Company ', 'required|trim');


        if ($this->form_validation->run()) {
            $array = array(
                "fullname" => $this->input->post("fullname"),
                "phone" => $this->input->post("phone"),
                "address" => $this->input->post("address"),
                "company" => $this->input->post("company"),
               );

            // $array2 = array("email" => $this->input->post("txtEmail"),
            //     "fullname" => $this->input->post("txtName"),
            //     "business_name" => $this->input->post("txtBiz"),
            //     "color" => $this->input->post("txtColor"),
            //     "template" => $this->input->post("ddlTemplate"));

            $correct = $this->model_updatevalues->updateVal("users", $array, "email", $this->session->userdata('email'));

            if ($correct) {
                redirect('users/profile',"refresh");
            }
        }
        $this->load->view('nav',$data);
        $this->load->view('edit_profile', $data);
         $this->load->view('footer');
    }

    public function change_password() {
        $this->init();
        $data['status'] = '';

        $data['title'] = "Change Password";
        $this->load->view('header', $data);
        $this->form_validation->set_rules('txtOldPass', 'Old Password', 'required');
        $this->form_validation->set_rules('txtNewPass', 'New Password', 'required');
        $this->form_validation->set_rules('txtNewPass2', 'Confirm New Password', 'required|trim|matches[txtNewPass]');
        
        if ($this->form_validation->run()) {
            
                $passwd =md5($this->input->post('txtOldPass'));
                $user = $this->model_getvalues->getDetails("users", "passwd", $passwd);
                
            if ($passwd === $user['passwd']) {
                if ($this->model_updatevalues->updatePassword($this->session->userdata("user_id"))) {

                    $data["status"] = $this->model_htmldata->successMsg("You succesfully updated your password");
                }
            } else {
                $data["status"] = $this->model_htmldata->errorMsg("Your Old Password is incorrect");
            }
        }
        $this->load->view('nav',$data);
        $this->load->view("change_password", $data);
        $this->load->view('footer');
    }

    public function forgot_password() {

        $data['title'] = "Forgot Password";
        $this->load->view('header', $data);
        $this->load->library("form_validation");
        $data["status"] = "";

        $this->form_validation->set_rules('txtForgotEmail', 'Email', 'required|trim');

        if ($this->form_validation->run()) {
            
            $user = $this->model_getvalues->getDetails("users", "email", $this->input->post('txtForgotEmail'));
            if($user){
                $key = base64_encode($this->input->post('txtForgotEmail'));

                $message = '<p>This is a request for password recovery for your account on the TokunboCars.NG</p> <p>To reset your password, please click on the link below.</p>';
                $message .= '<a href="' . base_url() . 'users/reset_password/' . $key . '">Please Click here to reset password</a>';



              $this->model_htmldata->senderMail($this->input->post('txtForgotEmail'), $message, "Password Reset", $user['fullname'], "Password Reset");

            //$this->model_htmldata->senderMail($email, $message, "", $user['firstName'] . " " . $user['lastName'], "Reset your password");

            $data["status"] = $this->model_htmldata->successMsg("A Password Recovery has been sent to your Email address. Please check");
            }else{
                $data["status"] = $this->model_htmldata->errorMsg("I'm sorry I can't find this email in this system!");
            }
            

            
        }
        $this->load->view("forgot", $data);
        $this->load->view('footer');
    }

    public function validate_email() {
        if ($this->model_getvalues->check_email()) {
            return true;
        } else {
            $this->form_validation->set_message("validate_email", "This Email does not match any User");
            return false;
        }
    }

    public function reset_password($x) {
        $data['title'] = "Password Reset";
        $this->load->view("header", $data);
        $this->load->library("form_validation");
        $data["status"] = "";

        $data["status"] = "";
        $this->load->library("form_validation");
        $user = $this->model_getvalues->getDetails("users", "email", base64_decode($x));
        if ($user) {
            $data['valid'] = true;
            $data['user'] = $user;
            $this->form_validation->set_rules('txtNewPass', 'Password', 'required|trim');
            $this->form_validation->set_rules('txtNewPass2', 'Confirm Password', 'required|trim|matches[txtNewPass]');
            if ($this->form_validation->run()) {

                if ($this->model_updatevalues->updatePassword($user["user_id"])) {
                    $data["status"] = $this->model_htmldata->successMsg("You succesfully updated your password. <a style='color: blue; text-decoration: underline' href='" . base_url() . "users/login'> Click here to Login</a>");
                }
            }
        } else {
            $data['valid'] = false;
            $data["status"] = $this->model_htmldata->errorMsg("Sorry, you are not eligibe to view this page: Invalid Token!");
        }
        $this->load->view("reset_password", $data);
        $this->load->view('footer');
    }


    public function tickets() {
        $this->init();
        $data['title'] = "Tickets";
        $this->load->view('header', $data);
        $data['status'] = "";
        $data["tickets"] = $this->model_getvalues->getTableRows("tickets", "t_user", $this->session->userdata('user_id'), "datee", "desc");
        $this->load->view('nav', $data);
        $this->load->view('tickets', $data);
        $this->load->view('footer');
    }

    public function ticket($tid, $stat="") {
        $this->init();
        $data['title'] = "Ticket #".$tid."";
        $this->load->view('header', $data); 
        
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("This ticket has been updated");
        } else {
            $data["status"] = "";
        }
        
        $user = $this->model_getvalues->getDetails("users", "user_id", $this->session->userdata('user_id'));
        $data["ticket"] = $this->model_getvalues->getDetails("tickets", "t_id", $tid );
        $this->form_validation->set_rules('txtContent','Message Body','required');
    	
    	if ($this->form_validation->run()) {
    		
    		$array = array(

    			't_content'=>$data["ticket"]["t_content"]."*|||*".$user['fullname']."*~".$this->input->post('txtContent')."*~".date('Y-m-d h:i A')
    			);
    		 $this->load->model('model_insertvalues');
             if($this->model_updatevalues->updateVal("tickets", $array, "t_id", $tid)){
                 redirect('users/ticket/'.$tid.'/success');
             }
        }
        
        $this->load->view('nav', $data);
        $this->load->view('ticket',$data);
        $this->load->view('footer');
    }




    public function open_ticket($stat="", $tid="")
    {
        $this->init();
        $data['title'] = "Open Ticket";
        $this->load->view('header', $data); 
        
        $user = $this->model_getvalues->getDetails("users", "user_id", $this->session->userdata('user_id'));
        
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Your ticket has been opened. You will be responded to soonest. Ticket ID: <a href='".base_url()."users/ticket/".$tid."'>".$tid."</a>");
        } else {
            $data["status"] = "";
        }
        
        $this->form_validation->set_rules('txtContent','Ticket Body','required');
    	
    	if ($this->form_validation->run()) {
    		
    		$array = array(

    			't_dept'=>$this->input->post('ddlDepartment'),
    			't_subject'=>$this->input->post('txtSubject'),
    			't_content'=>$user['fullname']."*~".$this->input->post('txtContent')."*~".date('Y-m-d h:i A'),
    			't_user'=>$this->session->userdata('user_id')
    			);
    		 $this->load->model('model_insertvalues');
             if($this->model_insertvalues->addItem($array, 'tickets')){
                 $lid = $this->db->insert_id();
                 redirect('users/open_ticket/success/'.$lid.'');
             }
        }
        
        $this->load->view('nav', $data);
        $this->load->view('open_ticket',$data);
        $this->load->view('footer');
    }

    
    
    public function partner_join($stat="", $tid="")
    {
        $this->init();
        $data['title'] = "Open Ticket";
        $this->load->view('header', $data); 
        
        $user = $this->model_getvalues->getDetails("users", "user_id", $this->session->userdata('user_id'));
        
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Congratulations! You have now joined our team. <a href='".base_url()."users/partner_dashboard/'>Click here to Get Started</a>");
        } else {
            $data["status"] = "";
        }
        
        $this->form_validation->set_rules('txtUsername','Username','required|is_unique[partners.username]');
    	
    	if ($this->form_validation->run()) {
    		
    		$array = array(

    			'username'=>$this->input->post('txtUsername'),
    			'level'=>$this->input->post('ddlLevel'),
    			'bank'=>$this->input->post('ddlBank'),
    			'acct_name'=>$this->input->post('txtAcctName'),
    			'acct_num'=>$this->input->post('txtAcctNum'),
    			'user_id'=>$this->session->userdata('user_id')
    			);
    		 $this->load->model('model_insertvalues');
             if($this->model_insertvalues->addItem($array, 'partners')){
                 $lid = $this->db->insert_id();
                 
                 /*switch ($this->input->post('ddlLevel')){
                     case;
                 }
                 
                $message = '<p>Congratulations, You just became a '.$this->input->post('ddlLevel').' Partner. We are glad to have on board of the TokunboCars Club.</p>';
                $message .= '<p>Below are the Rewards/Promotions for this level</p>';
                $message .= '<p>Login Details: <br>Email: ' . $this->input->post('txtEmail') . ' <br> Password: ' . $this->input->post('passwd') . '</p>';
                $message .= '<p><a href="' . base_url() . 'users/activate/' . $key . '"><button type="button" style="padding: 5px 20px; background-color: #2a80b9; color: #FFF; font-weight: bold; border: #FFF solid 1px">Please Click here to activate your account</button></a></p>';

                $this->model_htmldata->senderMail($this->input->post('txtEmail'), $message, "Welcome On Board", $this->input->post("fullname"), "TokunboCars.NG Account Activation");

              */   redirect('users/partner_join/success');
             }
        }
        
        $this->load->view('nav', $data);
        $this->load->view('partner_join',$data);
        $this->load->view('footer');
    }

    



public function car_details($id){
       
        $data['title'] = "Car Details";
        $this->load->view('header', $data); 
        $data["list"] = $this->model_getvalues->getTableRows("cars", "car_id !=", "0", "car_id", "desc");
        $data["make"] = $this->model_getvalues->getDetails("make", "make_id !=", "0" );
        $data["model"] = $this->model_getvalues->getDetails("model", "model_id !=", "0" );
        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", $id );
        $make_id = $data["car_detail"]['make_id'];
        $model_id = $data["car_detail"]['model_id'];
        $data["make_detail"] = $this->model_getvalues->getDetails("make", "make_id", $make_id );
        $data["model_detail"] = $this->model_getvalues->getDetails("model", "model_id", $model_id );

		$this->load->view('detail',$data);
		$this->load->view('footer');
	}

	    
    public function tip(){
        $data['title'] = "TokunboCars.NG Investment Program (TIP)";
        $data["status"] = "";
        
        $this->load->view('header', $data);
        
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('txtPhone', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('txtEmail', 'Email', 'required|trim');
        $this->form_validation->set_rules('txtOccupation', 'Occupation', 'required|trim');
        $this->form_validation->set_rules('txtInvest', 'Investment Amaount', 'required|trim');
        $this->form_validation->set_rules('txtDuration', 'Duration', 'required|trim');
        $this->form_validation->set_rules('txtBank', 'Bank Details', 'required|trim');
        $this->form_validation->set_rules('txtKinName', 'Next of Kin Name', 'required|trim');
        $this->form_validation->set_rules('txtKinPhone', 'Next of Kin Phone', 'required|trim');
        $this->form_validation->set_rules('txtKinAddr', 'Next of Kin Address', 'required|trim');
        $this->form_validation->set_rules('txtAddr', 'Resident Address', 'required|trim');
        
        if($this->form_validation->run()){
            
            $array = array(
              'fullname' => $this->input->post('fullname'),  
              'phone' => $this->input->post('txtPhone'),  
              'email' => $this->input->post('txtEmail'),  
              'occupation' => $this->input->post('txtOccupation'),  
              'invest_amt' => $this->input->post('txtInvest'),  
              'duration' => $this->input->post('txtDuration'),  
              'bank' => $this->input->post('txtBank'),  
              'kin_name' => $this->input->post('txtKinName'),  
              'kin_phone' => $this->input->post('txtKinPhone'),  
              'kin_address' => $this->input->post('txtKinAddr'),  
              'address' => $this->input->post('txtKinAddr')
            );
            
            $this->load->model('model_insertvalues');
            $tip = $this->model_insertvalues->addItem($array, 'tip');
            
            if($tip){
                
                $path = base_url().'/assets/Investment.pdf';
                
                $message = '<p>Welcome to Nigeria\'s Biggest online US direct car purchase platform.</p>';
                $message .= '<p>We are exicted that you registered for the TokunboCars.NG Investment Program (TIP). Please kindly find the attach file below.</p>';

                $this->model_htmldata->senderMailAttachPDF($this->input->post('txtEmail'), $message, "Welcome to TokunboCars.NG Investment Program (TIP)", $this->input->post("fullname"), "TokunboCars.NG Investment Program (TIP)", $path);


                $data["status"] = $this->model_htmldata->successMsg("Registration Successful. A file has been send to your email, kindly check it");
                
                
            }else{
                $data["status"] = $this->model_htmldata->errorMsg("An error occured, please try again");
            }
        }
        
        $this->load->view('tip', $data);
        $this->load->view('footer', $data);
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
    


   public function register(){
       
       $data["status"] = "";

    		$this->form_validation->set_rules('fullname','FullName','required|trim');
    		$this->form_validation->set_rules('passwd','Password','required|trim|min_length[5]');
    		$this->form_validation->set_rules('password2','Confirm Password','required|trim|matches[passwd]');
    		$this->form_validation->set_rules('txtEmail','Email','required|valid_email|is_unique[users.email]');
    		$this->form_validation->set_rules('phone','Phone Number','required|trim');
    	
    	if ($this->form_validation->run()) {
            
            
    		
    		$array = array(

    			'fullname'=>$this->input->post('fullname'),
    			'company'=>$this->input->post('txtCoy'),
    			'email'=>$this->input->post('txtEmail'),
    			'phone'=>$this->input->post('phone'),
    			'passwd'=>md5($this->input->post('passwd')),
    			'referral'=>$this->session->userdata('refxyz'),
                "activate" => md5($this->input->post("txtEmail"))
    			);
    		 $this->load->model('model_insertvalues');
             $confirm=$this->model_insertvalues->addItem($array, 'users');

    		
            if ($confirm) {
                
                $key = md5($this->input->post('txtEmail'));
                
                
                //------ Send a SMS to dealer containing the verification code ---------------//
                
                 $sms_array = array(
                        'recipient' => $this->input->post('phone'),
                        'message' =>  "Welcome to Nigeria\'s Biggest online US direct car purchase platform. We are excited you joined."
                    );
                 
                 $this->sendsms_post($sms_array);
                 
                 //-- End of SMS API --------------

                $message = '<p>Welcome to Nigeria\'s Biggest online US direct car purchase platform. We are exicted you joined.</p>';
                $message .= '<p>Your account has been created using this email.</p>';
                $message .= '<p>Login Details: <br>Email: ' . $this->input->post('txtEmail') . ' <br> Password: ' . $this->input->post('passwd') . '</p>';
                $message .= '<p><a href="' . base_url() . 'users/activate/' . $key . '"><button type="button" style="padding: 5px 20px; background-color: #2a80b9; color: #FFF; font-weight: bold; border: #FFF solid 1px">Please Click here to activate your account</button></a></p>';

                $this->model_htmldata->senderMail($this->input->post('txtEmail'), $message, "Welcome On Board", $this->input->post("fullname"), "TokunboCars.NG Account Activation");

                
                $data["status"] = $this->model_htmldata->successMsg("Registration Successful. Please check your email for activation link");
                //redirect("users/login","refresh");
            }

            else{

                $data["status"] = $this->model_htmldata->errorMsg("An error occured, please try again");
            }

            
        }
        $data['title'] = 'Register';

        $this->load->view('header', $data);
        $this->load->view("register", $data);
        $this->load->view('footer');
    }


    public function login($redir = "", $func = "", $param = "") {



            $data['title'] = "Login";
            $this->load->view('header', $data);
            $this->load->library("form_validation");
            $data["status"] = "";
            
            
            
            $this->form_validation->set_rules('email', 'Email', 'required|trim');
            $this->form_validation->set_rules('passwd', 'Password', 'required|trim');

            if ($this->form_validation->run() == TRUE) {
               // echo "<script>alert('Waweu!!//');</script>";
                $email = $this->input->post('email');
                $passwd =md5($this->input->post('passwd'));
                $this->load->model('model_getvalues');
                $user = $this->model_getvalues->getDetails("users", "email", $this->input->post("email"));
                $login =   $this->model_getvalues->login_ad($email , $passwd);
                
              

                if ($login) {
                    

                    $data = array(
                        'email' => $this->input->post("email"),
                        'is_logged_in' => 1,
                        
                        'user_id' => $user['user_id']
                    );
                    $this->session->set_userdata($data);
                    
                    if(isset($_GET['redirect']))
            {
               redirect('cars/'.$_GET['redirect']);
            }else{
                 redirect('users/dashboard');
            }
            
                       
                      
                    }
                  
                      else {
                        $this->session->set_flashdata("eror","<div class='alert alert-danger'></h4>Login Failed! Please make sure that you enter the correct details and that you have activated your account.</h4></div>");
                        redirect("users/login","refresh");
                      }

            }
            else{
                echo validation_errors();
             }
            
            $this->load->view('login', $data);
            $this->load->view('footer.php');
        }



        public function send_mail() { 
            if (isset($_POST['mail'])) {
               
        $this->form_validation->set_rules('name','Name', 'required|trim');
        $this->form_validation->set_rules('email','Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone','Phone Number', 'required|trim');
        $this->form_validation->set_rules('subject','Subject', 'required|trim');
        $this->form_validation->set_rules('message','Message', 'required|trim');
    }
    if ($this->form_validation->run() == TRUE) {
        
    
        $name = $this->input->post('name');
        $from_email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $to_email = "support@tokunbocars.org";
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $mbody = 'From: '.$from_email."\r\n".
                'Phone Number: '.$phone."\r\n" . 
                'PMessage: '.$message."\r\n" .
                'X-Mailer: PHP/' . phpversion();      
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email); 
         $this->email->to($to_email);
         $this->email->subject($subject); 
         $this->email->message($mbody); 
         if($this->email->send()){ 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
         }
         else{ 
         $this->session->set_flashdata("email_sent","Error in sending Email."); 
         $this->load->view('email_form'); 
         }
             }
    else{

        echo validation_errors();
      } 
       $this->load->view('header');
        $this->load->view("contact");
        $this->load->view('footer');
   
         //Send mail 

        }



public function fetchmodel($id)
    {
        $model = $this->model_getvalues->getTableRows("model", "make_id", $id, "model_id");
   
        
        $v = '          <label>SELECT A MODEL</label>

                                  <div>
                                                
                                               
                                <select name="select1" id class="m-select">
                                                    <option value="" selected="">Any Model</option>
                                                ';
        
        foreach ($model as $model)
        {
            
                $v .= '<option value="'.$model->model_id.'">'.$model->name.'</option>';
           
        }
           
        $v .= '</select>
        <span class="fa fa-caret-down"></span>
                                            </div>';
        
        echo $v;
    }
    
    
    
   public function agent(){
       
       $data["status"] = "";

    		$this->form_validation->set_rules('fullname','FullName','required|trim');
    		$this->form_validation->set_rules('txtEmail','Email','required|valid_email|is_unique[agents.email]');
    		$this->form_validation->set_rules('phone','Phone Number','required|trim');
    	
    	if ($this->form_validation->run()) {
            
            
    		
    		$array = array(

    			'name'=>$this->input->post('fullname'),
    			'gender'=>$this->input->post('ddlSex'),
    			'email'=>$this->input->post('txtEmail'),
    			'phone'=>$this->input->post('phone'),
    			'state'=>$this->input->post('ddlState'),
    			'address'=>$this->input->post('txtLoc'),
    			);
    		 $this->load->model('model_insertvalues');
             $confirm=$this->model_insertvalues->addItem($array, 'agents');

    		
            if ($confirm) {
                

                $message = '<p>Welcome to Nigeria\'s Biggest online US direct car purchase platform. We are exicted you joined to become our Agent.</p>';
                $message .= '<p>You will be contacted soon via the phone number you provided ('.$this->input->post('phone').') </p>';

                $this->model_htmldata->senderMail($this->input->post('txtEmail'), $message, "Welcome On Board", $this->input->post("fullname"), "TokunboCars.NG Agent Registration");

                
                $data["status"] = $this->model_htmldata->successMsg("Registration Successful. Please check your email for more info");
                //redirect("users/login","refresh");
            }

            else{

                $data["status"] = $this->model_htmldata->errorMsg("An error occured, please try again");
            }

            
        }
        $data['title'] = 'Become an Agent';

        $this->load->view('header', $data);
        $this->load->view("agent", $data);
        $this->load->view('footer');
    }

    }







