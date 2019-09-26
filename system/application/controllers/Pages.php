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
class Pages extends CI_Controller {

    public function index() {

        $data['title'] = "Nigeria's No.1 Website for Foreign Used (Tokunbo) Car";

        $this->load->view('header', $data);

        $data["list"] = $this->model_getvalues->getTableRows("cars", "status", 1, "car_id", "desc", 6);
        $data['avail'] = $this->model_getvalues->getCount("cars", "status !=", 4);
        $data['sold'] = $this->model_getvalues->getCount("cars", "status", 4);
        $data['users'] = $this->model_getvalues->getCount("users", "status !=", 4);
        $data['dealers'] = $this->model_getvalues->getCount("users", "status", 4);
        $data["make"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "name", "asc");
        $data["model"] = $this->model_getvalues->getDetails("model", "model_id !=", "0");
        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", "");
        
        $this->load->view('home', $data);

        $this->load->view('footer');
    }
    
    public function partner($ref)
    {
         if($ref!=="")
        {
            if($this->model_getvalues->getCount("partners", "username", $ref) > 0 )
            {
                $data = array('refxyz' => $ref);
                $this->session->set_userdata($data);
            }
            
        }
        redirect(base_url());
    }

    public function cust() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules('ddlStatus', 'Car Status', 'required');
        if ($this->form_validation->run() == true) {
            $make = $this->input->post('ddlMake');
            $model = $this->input->post('ddlModel');
            $year = $this->input->post('ddlYear');
            $run = $this->input->post('ddlRun');
            $body = $this->input->post('type');
            $amt = $this->input->post('ddlAmt');

            $arr = array();
            if ($make != "") {
                array_push($arr, "make+$make");
            }
            if ($model != "") {
                array_push($arr, "model+$model");
            }
            if ($year != "") {
                array_push($arr, "year+$year");
            }
            if ($run != "") {
                array_push($arr, "run+$run");
            }
            if ($body != "") {
                array_push($arr, "body+$body");
            }
            if ($amt != "") {
                array_push($arr, "amount+$amt");
            }

            $cc = urlencode(implode('*', $arr));

            redirect('cars/search/' . $this->input->post('ddlStatus') . '/' . $cc);
        }
    }

    public function about() {
        $data['title'] = 'About Us';

        $this->load->view('header', $data);
        $this->load->view('about');
        $this->load->view('footer');
    }

    public function partners_join() {
        $data['title'] = 'Join Us';

        $this->load->view('header', $data);
        $this->load->view('partners_join');
        $this->load->view('footer');
    }

    public function car_request() {
        $this->load->view('header');
        $this->load->view('cars_request');
        $this->load->view('footer');
    }

    public function service() {
        $this->load->view('header');
        $this->load->view('service');
        $this->load->view('footer');
    }

    public function contact() {
        $data['title'] = 'Contact Us';

        $this->load->view('header', $data);
        $this->load->view('contact');
        $this->load->view('footer');
    }
    
    private function genVerifyCode() {
        $verify = 'TKC';
        for ($i = 0; $i < 9; $i++) {
            $verify .= mt_rand(0, 6);
        }
        return $verify;
    }

   
    public function request($stat = "", $tid = "") {
        $data['title'] = "Car Custom Request";
        $this->load->view('header', $data);

        

        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Your ticket has been opened. You will be responded to soonest. Ticket ID: <a href='" . base_url() . "users/ticket/" . $tid . "'>" . $tid . "</a>");
        } else {
            $data["status"] = "";
        }

        $this->form_validation->set_rules('txtFname', 'FullName', 'required|trim');
        $this->form_validation->set_rules('txtEmail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('txtPhone', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('txtDetails', 'Car Details', 'required|trim');
        $this->form_validation->set_rules('txtSubject', 'Car Subject', 'required|trim');

        $this->form_validation->set_message("is_unique", "The %s has already been taken");
        if ($this->form_validation->run()) {

            $password = $this->genVerifyCode();
            $encypt_password = md5($this->genVerifyCode());

            $array = array(
                'fullname' => $this->input->post('txtFname'),
                'email' => $this->input->post('txtEmail'),
                'phone' => $this->input->post('txtPhone'),
                'status' => 1,
                'passwd' => $encypt_password
            );
            $this->load->model('model_insertvalues');

            //----- Send Details to the database ---------------------//

            if ($this->model_insertvalues->addItem($array, 'users')) {
                //----- Send Details to user email ----------------------//
                $message = '<p>Welcome to Nigeria\'s Biggest online US direct car purchase platform. We are excited you joined.</p>';
                $message .= '<p>Your account has been created using the details below and a password was also generated. Note that you can change the password on your user dashboard.</p>';
                $message .= '<p>Login Details: <br>Email: ' . $this->input->post('txtEmail') . ' <br> Password: ' . $password . '</p>';
                $message .= '<p><a href="' . base_url() . '"><button type="button" style="padding: 5px 20px; background-color: #2a80b9; color: #FFF; font-weight: bold; border: #FFF solid 1px">Click Here to visit website</button></a></p>';

                $this->model_htmldata->senderMail($this->input->post('txtEmail'), $message, "Welcome On Board", $this->input->post("txtFname"), "TokunboCars.NG Account Created");

                $user = $this->model_getvalues->getDetails("users", "user_id", $this->db->insert_id());
                
                //------- Send Custom Request to ticket table ------------------//
                $array_t = array(
                    't_dept' => 'Custom Request',
                    't_subject' => $this->input->post('txtSubject'),
                    't_content' => $user['fullname'] . "*~" . $this->input->post('txtDetails') . "*~" . date('Y-m-d h:i A'),
                    't_user' => $user['user_id']
                );
                $this->model_insertvalues->addItem($array_t, 'tickets');

                $data["status"] = $this->model_htmldata->successMsg("Your request has been sent Successful, we will get back to you within 24 hours. A Password was generated and send to your email, Kindly check.");
            }

//            if ($this->model_insertvalues->addItem($array, 'tickets')) {
//                $lid = $this->db->insert_id();
//                redirect('users/open_ticket/success/' . $lid . '');
//            }
        }

        $this->load->view('custom', $data);
        $this->load->view('footer');
    }


    public function small() {
        $data['title'] = 'Payment Options';

        $this->load->view('header', $data);
        $this->load->view('small');
        $this->load->view('footer');
    }
    
     public function partners() {
        $data['title'] = 'Earn Money as a Reseller/Partner';

        $this->load->view('header', $data);
        $this->load->view('partner');
        $this->load->view('footer');
    }

    public function services() {
        $this->load->view('header');
        $this->load->view('services');
        $this->load->view('footer');
    }
    
    public function thanks() {
        $data['title'] = 'Get 100k Quick Cash';

        $this->load->view('header', $data);
        $this->load->view('100k');
        $this->load->view('footer');
    }
    
    public function terms() {
        $data['title'] = 'Terms and Conditions';

        $this->load->view('header', $data);
        $this->load->view('terms');
        $this->load->view('footer');
    }

}
