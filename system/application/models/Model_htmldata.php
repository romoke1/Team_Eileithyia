<?php

class Model_htmlData extends CI_Model {

    function successMsg($msg) {
        return '<div class="alert alert-success"><strong><i class=" icon-ok-4"></i> Success!</strong> ' . $msg . '.</div>';
    }

    function errorMsg($msg) {
        return '<div class="alert alert-danger"><strong><i class=" icon-mic"></i> Oops!</strong> ' . $msg . '.</div>';
    }
    
    

    function successMsg2($msg) {
        
        return "<script>"
        ."$(document).ready(function(){ toastr.success('$msg', 'Success!')})"
        . "</script>";
        
    }

    function errorMsg2($msg) {
        return "<script>"
        ."$(document).ready(function(){ toastr.error('$msg', 'Ooooops!')})"
        . "</script>";
    }
    
    function verifyMsg($msg) {
        return '<div class="alert alert-danger" style="margin-bottom:0px"><strong><i class=" icon-tag"></i></strong> ' . $msg . '.</div>';
    }

    function infoMsg($msg) {
        return '<div class="alert alert-info"><strong>Oops!</strong> ' . $msg . '.</div>';
    }
    

    function adminMail($message, $subject) {
        $this->load->library("email", array('mailtype' => 'html'));
        $this->email->from('admin@learnnownow.com', 'LNN System');
        $this->email->to('support@learnnownow.com');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }
    
    
    function senderMailAttachPDF($email, $message, $subject, $name="", $title="", $path) {
        if($title === ""){
            $title = $subject;
        }else{
            $title = $title;
        }
        $email_msg = $this->message_body($title, $name, $message);
        $this->load->library("email", array('mailtype' => 'html'));
        $this->email->from('support@tokunbocars.ng', 'TokunboCars.NG');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($email_msg);
        $this->email->attach($path);
        $this->email->send();
    }

    function senderMail($email, $message, $subject, $name="", $title="") {
        if($title === ""){
            $title = $subject;
        }else{
            $title = $title;
        }
        $email_msg = $this->message_body($title, $name, $message);
        $this->load->library("email", array('mailtype' => 'html'));
        $this->email->from('support@tokunbocars.ng', 'TokunboCars.NG');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($email_msg);
        $this->email->send();
    }
    
    function senderMail2($email, $message, $subject) {
        $email_msg = $this->message_body($title, $name, $message);
        $this->load->library("email", array('mailtype' => 'html'));
        //$this->email->from($site_email, $site);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($email_msg);
        $this->email->send();
    }
    
    
    function message_body($title, $name, $msg) {
        $bdy = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>'.$title.'</title>
  </head>
  <body>
  <div style="margin: 20px auto 20px auto; width: 90%">
  <img src="https://tokunbocars.ng/images/tokunbo-cars-logo2.jpg" style="width: 250px">
  <h3>Hello, '.$name.'</h3>
  <p>'.$msg.'</p>
      <p> </p>
      <p><a href="https://tokunbocars.ng">visit our website</a> | <a href="https://tokunbocars.ng/users/login">log in to your account</a> | <a href="https://tokunbocars.ng/request">request a car</a><br/> 
Copyright © CarsNowNow Services Limited (RC: 1354982), All rights reserved.</p>
      </div>
    </body>
</html>
';
        return $bdy;
    }

}

?>