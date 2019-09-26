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
class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($page = 0) {
        $url = $_SERVER['REQUEST_URI'];

        $para = explode('?', $url);

        $this->session->set_userdata(array("url" => $para[1]));

        $data['title'] = "Cars Search";
        $this->load->view('header', $data);

        $this->load->library("form_validation");

        $keyword = $_GET['keyword'];

        $paras = explode("-", $keyword);
        //echo $paras[1];
        foreach ($paras as $val) {
            $dot[] = $val;
        }
        $dat = array("sess_res" => $dot);
        $this->session->set_userdata($dat);
        $bred = $this->session->userdata('sess_res');

        $where_arr = array();

        if ($_GET['year']) {
            $year = $_GET['year'];
            $years = explode("-", $year);
            $min = $years[0];
            $max = $years[1];

            $where_arr = array_merge($where_arr, array("year >= " => $min, "year <=" => $max));
        }

        if ($_GET['make']) {
            $where_arr = array_merge($where_arr, array("make" => $_GET['make']));
        }

        if ($_GET['model']) {
            $where_arr = array_merge($where_arr, array("model" => $_GET['model']));
        }
        
        if ($_GET['type']) {
            $where_arr = array_merge($where_arr, array("status" => $_GET['type']));
        }

        if ($_GET['amount']) {
            $amt = $_GET['amount'];
            $amts = explode("-", $amt);
            $min = $amts[0];
            $max = $amts[1];

            $where_arr = array_merge($where_arr, array("amount >= " => $min, "amount <=" => $max));
        }


        $data["makes"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "name", "asc");
        $data["model"] = $this->model_getvalues->getDetails("model", "model_id !=", "0");
        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", "");

        $this->load->library('pagination');

        $data["list"] = $this->model_getvalues->searchValLikeArr2("cars", $where_arr, $bred, "car_id", "desc");
        
        $config['base_url'] = base_url() ."search/index/?". $para[1];
        $config['total_rows'] = count($data["list"]);

        if ($this->session->userdata('per_page')) {
            $config['per_page'] = $this->session->userdata('per_page');
        } else {
            $config['per_page'] = 20;
        }
        
        
        
        //echo $this->session->userdata('per_page');
        $config['full_tag_open'] = '<div class="b-items__pagination wow zoomInUp" data-wow-delay="0.5s"><div class="b-items__pagination-main">';
        $config['full_tag_close'] = '</div></div>';
        $config['next_link'] = '<span class="fa fa-angle-right"></span>';
        $config['prev_link'] = '<span class="fa fa-angle-left"></span>';

        //$config['next_tag_open'] = '<span class="nextlink">';
        //$config['next_tag_close'] = '</span>';
        $config['attributes'] = array('class' => 'skyLink');
        $config['cur_tag_open'] = '<span class="m-active" style="margin-left: 15px"><a href="#">';
        $config['cur_tag_close'] = '</a></span>';
        $config['num_tag_open'] = '<span>';
        $config['num_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $data["pagi"] = $this->pagination->create_links();

        $this->db->limit($config['per_page'], $page);

      
         if (isset($_GET['type']) && $_GET['type'] !== "") {
                    switch ($_GET['type']) {
                        case 1:
                            $type = "Search Result for 'Buy Now' cars";
                            break;
                        
                        case 2:
                            $type = "Search Result for 'On Sail' cars";
                            break;
                        
                        case 3:
                            $type = "Search Result for 'On Ground' cars";
                            break;

                        default:
                            $type = "Search Result";
                            break;
                    }
                }else{
                    $type = "Search Result";
                }
                
                
        $data["list"] = $this->model_getvalues->searchValLikeArr2("cars", $where_arr, $bred, "car_id", "desc");

        $data['header'] = $type;
        $data['sub'] = " Your search returned " . count($data["list"]) . " results";


        $this->load->view('list', $data);
        $this->load->view('footer');
    }


    public function header_search() {


        $query = url_title($this->input->post('txtSearch'));


        redirect('search/index/?keyword=' . $query . '&make=&model=&year=&amount=&type=');
    }
    
    public function filter_year($from, $to) {
        $bred = $this->session->userdata('url');
        $bred_exp = explode('&', $bred);
        $year = $from."-".$to;
        $new = array("year=$year");
        array_splice($bred_exp,3,1,$new);
        $imp = implode('&', $bred_exp);
        redirect('search/index/?'.$imp.'');
    }
    
    public function filter_make($make) {
        $bred = $this->session->userdata('url');
        $bred_exp = explode('&', $bred);
        $new = array("make=$make");
        array_splice($bred_exp,1,1,$new);
        $imp = implode('&', $bred_exp);
        redirect('search/index/?'.$imp.'');
    }
    
    public function filter_model($model) {
        $bred = $this->session->userdata('url');
        $bred_exp = explode('&', $bred);
        $new = array("model=$model");
        array_splice($bred_exp,2,1,$new);
        $imp = implode('&', $bred_exp);
        redirect('search/index/?'.$imp.'');
    }
    
    public function filter_type($type) {
        $bred = $this->session->userdata('url');
        $bred_exp = explode('&', $bred);
        $new = array("type=$type");
        array_splice($bred_exp,5,1,$new);
        $imp = implode('&', $bred_exp);
        redirect('search/index/?'.$imp.'');
    }
    
    public function filter_price($from, $to) {
        $bred = $this->session->userdata('url');
        $bred_exp = explode('&', $bred);
        $year = $from."-".$to;
        $new = array("amount=$year");
        array_splice($bred_exp,4,1,$new);
        $imp = implode('&', $bred_exp);
        redirect('search/index/?'.$imp.'');
    }

}
