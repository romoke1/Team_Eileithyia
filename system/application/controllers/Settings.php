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
class Settings extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function remove_search($value) {
        $bred = $this->session->userdata('sess_res');
        $arr = array_merge(array_diff($bred, array($value)));
        $imp = implode('-', $arr);
        redirect('search/index/0/?keyword='.$imp.'');
    }
    
    public function remove_key($value) {
        
        $bred = $this->session->userdata('url');
        $bred_exp = explode('&', $bred);
        
        $key_exp = explode("=", $bred_exp[0]);
        
        $words = explode("-", $key_exp[1]);
        
        $arr = array_merge(array_diff($words, array($value)));
        
        $words_imp = implode('-', $arr);
       
        
        $new = array("keyword=$words_imp");
        array_splice($bred_exp,0,1,$new);
        $imp = implode('&', $bred_exp);
        redirect('search/index/?'.$imp.'');
    }
    
    public function remove_year() {
        $bred = $this->session->userdata('url');
        $bred_exp = explode('&', $bred);
        $new = array("year=");
        array_splice($bred_exp,3,1,$new);
        $imp = implode('&', $bred_exp);
        redirect('search/index/?'.$imp.'');
    }
    
    public function remove_amt() {
        $bred = $this->session->userdata('url');
        $bred_exp = explode('&', $bred);
        $new = array("amount=");
        array_splice($bred_exp,4,1,$new);
        $imp = implode('&', $bred_exp);
        redirect('search/index/?'.$imp.'');
    }
    
    public function remove_make() {
        $bred = $this->session->userdata('url');
        $bred_exp = explode('&', $bred);
        $new = array("make=");
        array_splice($bred_exp,1,1,$new);
        $imp = implode('&', $bred_exp);
        redirect('search/index/?'.$imp.'');
    }
    
    public function remove_type() {
        $bred = $this->session->userdata('url');
        $bred_exp = explode('&', $bred);
        $new = array("type=");
        array_splice($bred_exp,5,1,$new);
        $imp = implode('&', $bred_exp);
        redirect('search/index/?'.$imp.'');
    }
    
    public function remove_model() {
        $bred = $this->session->userdata('url');
        $bred_exp = explode('&', $bred);
        $new = array("model=");
        array_splice($bred_exp,2,1,$new);
        $imp = implode('&', $bred_exp);
        redirect('search/index/?'.$imp.'');
    }
    
    public function add_search($type, $value) {
        $bred = $this->session->userdata('sess_res');
        $imp = implode('-', $bred);
        $both = $type."+".$value;
        redirect('cars/search/'.$both.'/'.$imp.'');
    }
    
}