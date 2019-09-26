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

class Emails extends CI_Controller {

    public function reg_email(){
        
    }
    
    public function create_invoice($email, $name, $amount, $due_date, $subject, $title)
    {
        $message = '<p>Welcome to Nigeria\'s Biggest online US direct car purchase platform. We are exicted you joined.</p>';
                $message .= '<p>Your account has been created using this email.</p>';
                $message .= '<p>Login Details: <br>Email: ' . $this->input->post('txtEmail') . ' <br> Password: ' . $this->input->post('passwd') . '</p>';
                $message .= '<p><a href="' . base_url() . 'users/activate/' . $key . '"><button type="button" style="padding: 5px 20px; background-color: #2a80b9; color: #FFF; font-weight: bold; border: #FFF solid 1px">Please Click here to activate your account</button></a></p>';

                $this->model_htmldata->senderMail($this->input->post('txtEmail'), $message, "Welcome On Board", $this->input->post("fullname"), "TokunboCars.NG Account Activation");

    }

    }







