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
 * @access publicor
 */
class Cars extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function all() {
        $data['title'] = "All Cars";
        $this->load->view('header', $data);
        $this->load->view('all');
        $this->load->view('footer');
    }

    public function buy_now($stat = "") {
        redirect('search/index/?keyword=&make=&model=&year=&amount=&type=1');

        $data['title'] = "Buy Now (Cheapest Cars)";
        $this->load->view('header', $data);

        $data['count'] = $this->model_getvalues->getCount("cars", "status", 1);
        $data["make"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "name", "asc");
        $data["model"] = $this->model_getvalues->getDetails("model", "model_id !=", "0");
        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", "");

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'cars/buy_now';
        $config['total_rows'] = $data["count"];

        if ($this->session->userdata('per_page')) {
            $config['per_page'] = $this->session->userdata('per_page');
        } else {
            $config['per_page'] = 20;
        }
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

        $this->db->limit($config['per_page'], $stat);

        $data['header'] = "Buy Now Cars";
        $data['sub'] = $data['count'] . " Cars on sale now!";

        if ($this->session->userdata('per_sort')) {

            switch ($this->session->userdata('per_sort')) {
                case '1':
                    $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 1, "car_status", 1, "car_id", "desc");
                    break;

                case '2':
                    $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 1, "car_status", 1, "amount", "asc");
                    break;

                case '3':
                    $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 1, "car_status", 1, "amount", "desc");
                    break;

                default :
                    break;
            }
        } else {
            $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 1, "car_status", 1, "car_id", "desc");
        }



        $this->load->library("form_validation");
        $this->form_validation->set_rules('hd', 'hd', 'required');
        if ($this->form_validation->run() == true) {
            $make = $this->input->post('make');
            $model = $this->input->post('model');
            $year = $this->input->post('year');
            $run = $this->input->post('run');
            //$body = $this->input->post('type');
            $amt = $this->input->post('amt');
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
            /* if ($body != "") {
              array_push($arr, "body+$body");
              } */
            if ($amt != "") {
                array_push($arr, "amount+$amt");
            }

            $cc = urlencode(implode('*', $arr));

            redirect('cars/search/1/' . $cc);
        }
        $this->load->view('list', $data);
        $this->load->view('footer');
    }

    public function sail($stat = "") {
        
        redirect('search/index/?keyword=&make=&model=&year=&amount=&type=2');

        $data['title'] = "On Sail Cars";
        $this->load->view('header', $data);

        $data['count'] = $this->model_getvalues->getCount("cars", "status", 2);
        $data["make"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "name", "asc");
        $data["model"] = $this->model_getvalues->getDetails("model", "model_id !=", "0");
        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", "");

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'cars/sail';
        $config['total_rows'] = $data["count"];

        if ($this->session->userdata('per_page')) {
            $config['per_page'] = $this->session->userdata('per_page');
        } else {
            $config['per_page'] = 20;
        }
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

        $this->db->limit($config['per_page'], $stat);

        $data['header'] = "On Sail Cars";
        $data['sub'] = $data['count'] . " Cars on sale now!";

        if ($this->session->userdata('per_sort')) {

            switch ($this->session->userdata('per_sort')) {
                case '1':
                    $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 2, "car_status", 1, "car_id", "desc");
                    break;

                case '2':
                    $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 2, "car_status", 1, "amount", "asc");
                    break;

                case '3':
                    $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 2, "car_status", 1, "amount", "desc");
                    break;

                default :
                    break;
            }
        } else {
            $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 2, "car_status", 1, "car_id", "desc");
        }

        $this->load->library("form_validation");
        $this->form_validation->set_rules('hd', 'hd', 'required');
        if ($this->form_validation->run() == true) {
            $make = $this->input->post('ddlMake');
            $model = $this->input->post('ddlModel');
            $year = $this->input->post('ddlYear');
            $run = $this->input->post('ddlRun');
            //$body = $this->input->post('type');
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
            /* if ($body != "") {
              array_push($arr, "body+$body");
              } */
            if ($amt != "") {
                array_push($arr, "amount+$amt");
            }

            $cc = urlencode(implode('*', $arr));

            redirect('cars/search/2/' . $cc);
        }
        $this->load->view('list_sail', $data);
        $this->load->view('footer');
    }

    public function ground($stat = "") {
        
        redirect('search/index/?keyword=&make=&model=&year=&amount=&type=3');

        $data['title'] = "On Ground Cars";
        $this->load->view('header', $data);

        $data['count'] = $this->model_getvalues->getCount("cars", "status", 3);
        $data["make"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "name", "asc");
        $data["model"] = $this->model_getvalues->getDetails("model", "model_id !=", "0");
        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", "");

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'cars/ground';
        $config['total_rows'] = $data["count"];

        if ($this->session->userdata('per_page')) {
            $config['per_page'] = $this->session->userdata('per_page');
        } else {
            $config['per_page'] = 20;
        }
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

        $this->db->limit($config['per_page'], $stat);

        $data['header'] = "On Ground Cars";

        if ($this->session->userdata('per_sort')) {

            switch ($this->session->userdata('per_sort')) {
                case '1':
                    $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 3, "car_status", 1, "car_id", "desc");
                    break;

                case '2':
                    $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 3, "car_status", 1, "amount", "asc");
                    break;

                case '3':
                    $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 3, "car_status", 1, "amount", "desc");
                    break;

                default :
                    break;
            }
        } else {
            $data["list"] = $this->model_getvalues->getTableRows2("cars", "status", 3, "car_status", 1, "car_id", "desc");
        }

        $data['sub'] = count($data['list']) . " Cars on sale now!";

        $this->load->library("form_validation");
        $this->form_validation->set_rules('hd', 'hd', 'required');
        if ($this->form_validation->run() == true) {
            $make = $this->input->post('ddlMake');
            $model = $this->input->post('ddlModel');
            $year = $this->input->post('ddlYear');
            $run = $this->input->post('ddlRun');
            //$body = $this->input->post('type');
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
            /* if ($body != "") {
              array_push($arr, "body+$body");
              } */
            if ($amt != "") {
                array_push($arr, "amount+$amt");
            }

            $cc = urlencode(implode('*', $arr));

            redirect('cars/search/2/' . $cc);
        }
        $this->load->view('list_ground', $data);
        $this->load->view('footer');
    }

    public function item($id) {

        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", $id);
        $data["make_detail"] = $this->model_getvalues->getDetails("make", "make_id", $data["car_detail"]['make']);
        $data["model_detail"] = $this->model_getvalues->getDetails("model", "model_id", $data["car_detail"]['model']);
        $data['title'] = $data['car_detail']['year'] . " " . $data['make_detail']['name'] . " " . $data['model_detail']['name'] . " " . $data['car_detail']['others'];
        $this->load->view('header', $data);
        $data["lists"] = $this->model_getvalues->getTableRows("cars", "car_id !=", "0", "car_id", "desc", 4);

        $amount = $data['car_detail']['amount'];
         switch ($data['car_detail']['status']) {
            case 1:
                
                if($amount < 2000000){
                    $data['first'] = number_format(($data['car_detail']['amount'] * 0.4), 0);
                    $data['second'] = number_format(($data['car_detail']['amount'] * 0.3), 0);
                    $data['third'] = number_format(($data['car_detail']['amount'] * 0.3), 0);
                    
                    $data['p1'] = "40%";
                    $data['p2'] = "30%";
                    $data['p3'] = "30%";
                    
                }elseif(($amount >= 2000000) && ($amount < 4000000)){
                    $data['first'] = number_format(($data['car_detail']['amount'] * 0.5), 0);
                    $data['second'] = number_format(($data['car_detail']['amount'] * 0.3), 0);
                    $data['third'] = number_format(($data['car_detail']['amount'] * 0.2), 0);
                    
                    $data['p1'] = "50%";
                    $data['p2'] = "30%";
                    $data['p3'] = "20%";
                }else{
                    $data['first'] = number_format(($data['car_detail']['amount'] * 0.6), 0);
                    $data['second'] = number_format(($data['car_detail']['amount'] * 0.2), 0);
                    $data['third'] = number_format(($data['car_detail']['amount'] * 0.2), 0);
                    
                    $data['p1'] = "60%";
                    $data['p2'] = "20%";
                    $data['p3'] = "20%";
                }
                
               
                
                $data['small'] = number_format(($data['car_detail']['amount'] * 0.5), 0);

                $data['charge3'] = (($data['car_detail']['amount'] * 0.5) + (0.02 * $data['car_detail']['amount'])) / 3;
                $data['charge4'] = (($data['car_detail']['amount'] * 0.5) + (0.045 * $data['car_detail']['amount'])) / 4;
                $data['charge5'] = (($data['car_detail']['amount'] * 0.5) + (0.08 * $data['car_detail']['amount'])) / 5;
                $data['charge6'] = (($data['car_detail']['amount'] * 0.5) + (0.12 * $data['car_detail']['amount'])) / 6;

                break;

            case 2:
                $data['first'] = number_format(($data['car_detail']['amount'] * 0.7), 0);
                $data['second'] = number_format(($data['car_detail']['amount'] * 0.3), 0);
                break;

            case 3:
                $data['first'] = number_format($data['car_detail']['amount'], 0);
                break;
        }


        $this->load->view('detail', $data);
        $this->load->view('footer');
    }

    public function images($id) {

        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", $id);
        $data["make_detail"] = $this->model_getvalues->getDetails("make", "make_id", $data["car_detail"]['make']);
        $data["model_detail"] = $this->model_getvalues->getDetails("model", "model_id", $data["car_detail"]['model']);



        $this->load->view('images', $data);
    }

   
    public function insert_order($id, $car_name) {
        $new_car = str_replace("%20", " ", $car_name);
        if ($this->session->userdata('user_id') != NULL) {
            $array = array(
                'user_id' => $this->session->userdata('user_id'),
                'stock_id' => $id,
                'car_name' => $new_car
            );

            $this->model_insertvalues->addItem($array, 'orders');
            $lid = $this->db->insert_id();
            redirect('cars/order/' . $lid . '');
        } else {
            redirect('users/login/?redirect=insert_order/' . $id . '');
        }
    }

    public function insert_order2($id, $plan, $car_name, $month = "") {
        $new_car = str_replace("%20", " ", $car_name);
        if ($this->session->userdata('user_id') != NULL) {
            $array = array(
                'user_id' => $this->session->userdata('user_id'),
                'stock_id' => $id,
                'payment_plan' => $plan,
                'months' => $month,
                'car_name' => $new_car
            );

            $this->model_insertvalues->addItem($array, 'orders');
            $lid = $this->db->insert_id();
            redirect('cars/order/' . $lid . '');
        } else {
            redirect('users/login/?redirect=insert_order/' . $id . '');
        }
    }
   
   
    public function mobile_order($last_id, $user_id) {
        // Note that $last_id is the last insert ID
        $data["list"] = $this->model_getvalues->getTableRows("cars", "car_id !=", "0", "car_id", "desc");
        $data["order"] = $this->model_getvalues->getDetails("orders", "order_id", $last_id);
        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", $data["order"]['stock_id']);
        $data['user'] = $this->model_getvalues->getDetails("users", "user_id", $user_id);
        $make_id = $data["car_detail"]['make'];
        $model_id = $data["car_detail"]['model'];
        $data['deadline'] = date('Y-m-d', strtotime("+1 days", strtotime(date('Y-m-d'))));
        $data["make_detail"] = $this->model_getvalues->getDetails("make", "make_id", $make_id);
        $data["model_detail"] = $this->model_getvalues->getDetails("model", "model_id", $model_id);
        
        switch ($data['car_detail']['status']) {
            //Buy Now - Pay As You Go
            case 1:
                if ($data['order']['payment_plan'] === 'one') {
                    $data['first'] = $data['car_detail']['amount'] * 0.95;
                    $data['plan'] = "One Time Payment";
                    $plan = "One Time Payment";
                } elseif ($data['order']['payment_plan'] === 'two') {
                    $data['plan'] = "Pay As You Go";
                    $plan = "Pay As You Go";
                    $data['first'] = $data['car_detail']['amount'] * 0.4;
                    $data['second'] = $data['car_detail']['amount'] * 0.3;
                } else {
                    $data['plan'] = "Pay Small Small";
                    $data['first'] = $data['car_detail']['amount'] * 0.5;
                    if ($data['order']['payment_plan'] === '3') {
                        $data['second'] = number_format((($data['car_detail']['amount'] * 0.5) + (0.02 * $data['car_detail']['amount'])) / 3);
                    } elseif ($data['order']['payment_plan'] === '4') {
                        $data['second'] = number_format((($data['car_detail']['amount'] * 0.5) + (0.045 * $data['car_detail']['amount'])) / 4);
                    } elseif ($data['order']['payment_plan'] === '5') {
                        $data['second'] = number_format((($data['car_detail']['amount'] * 0.5) + (0.08 * $data['car_detail']['amount'])) / 5);
                    } else {
                        $data['second'] = number_format((($data['car_detail']['amount'] * 0.5) + (0.12 * $data['car_detail']['amount'])) / 6);
                    }
                }

                break;

            //On Sail
            case 2:
                $data['first'] = $data['car_detail']['amount'] * 0.7;
                $data['second'] = $data['car_detail']['amount'] * 0.3;
                $data['plan'] = "Pay As You Go";
                $plan = "Pay As You Go";
                break;

            //On Ground
            case 3:
                $data['first'] = $data['car_detail']['amount'];
                $data['plan'] = "One Time Payment";
                $plan = "One Time Payment";
                break;
        }

        // $this->load->library('parser');

        //Load the library
        $this->load->library('html2pdf');
        
         // Folder where PDF file will be saved
        $this->html2pdf->folder('./assets/pdf/');
        
        $invoice_name = 'invoice_'.$data['order']['order_id'].'.pdf';
        
        // Name of the PDF file
        $this->html2pdf->filename($invoice_name);
        
        // Papper Orientation
        $this->html2pdf->paper('a4', 'portrait');
        
        //Load html view
        $this->html2pdf->html($this->load->view('mypdf', $data, true));


         if($path = $this->html2pdf->create('save')){
            
            $message = '<p>You have successfully purchased the following vehicle:</p>';
            $message .= '<p>Stock ID: ' . $data["car_detail"]["car_id"] . '</p>';
            $message .= '<p>Car: ' . $data["car_detail"]["year"] . ' ' . $data["make_detail"]["name"] . ' ' . $data["model_detail"]["name"] . '  ' . $data["car_detail"]["others"] . '</p>';
            $message .= '<p>Purchase Date: ' . date("Y-m-d") . '</p>';

            $message .= '<p>Payment Plan: ' . $plan . '</p>';
            $message .= '<p>Amount: ' . number_format($data['car_detail']['amount'], 0) . '</p>';
            $message .= '<p><a href="' . base_url() . 'users/purchases"><button type="button" style="padding: 5px 20px; background-color: #2a80b9; color: #FFF; font-weight: bold; border: #FFF solid 1px">Please Click here to view your purchase</button></a></p>';

            $this->model_htmldata->senderMailAttachPDF($data['user']['email'], $message, "Purchase Notification - " . $data['car_detail']['year'] . " " . $data['make_detail']['name'] . " " . $data['model_detail']['name'] . " " . $data['car_detail']['others'] . " ", $data['user']['fullname'], "Your Purchase for " . $data['car_detail']['year'] . " " . $data['make_detail']['name'] . " " . $data['model_detail']['name'] . " " . $data['car_detail']['others'] . "", $path);
            
        }else{
            echo 'Null';
        }

    }



    public function order($id) {

        $data['title'] = "Order Details";
        $this->load->view('header', $data);
        $data["list"] = $this->model_getvalues->getTableRows("cars", "car_id !=", "0", "car_id", "desc");
        $data["order"] = $this->model_getvalues->getDetails("orders", "order_id", $id);
        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", $data["order"]['stock_id']);
        $data['user'] = $this->model_getvalues->getDetails("users", "email", $_SESSION['email']);
        $make_id = $data["car_detail"]['make'];
        $model_id = $data["car_detail"]['model'];
        $data['deadline'] = date('Y-m-d', strtotime("+1 days", strtotime(date('Y-m-d'))));
        $data["make_detail"] = $this->model_getvalues->getDetails("make", "make_id", $make_id);
        $data["model_detail"] = $this->model_getvalues->getDetails("model", "model_id", $model_id);
        
        switch ($data['car_detail']['status']) {
            //Buy Now - Pay As You Go
            case 1:
                if ($data['order']['payment_plan'] === 'one') {
                    $data['first'] = $data['car_detail']['amount'] * 0.95;
                    $data['plan'] = "One Time Payment";
                    $plan = "One Time Payment";
                } elseif ($data['order']['payment_plan'] === 'two') {
                    $data['plan'] = "Pay As You Go";
                    $plan = "Pay As You Go";
                    $data['first'] = $data['car_detail']['amount'] * 0.4;
                    $data['second'] = $data['car_detail']['amount'] * 0.3;
                } else {
                    $data['plan'] = "Pay Small Small";
                    $plan = "Pay Small Small";
                    $data['first'] = $data['car_detail']['amount'] * 0.5;
                    if ($data['order']['payment_plan'] === '3') {
                        $data['second'] = number_format((($data['car_detail']['amount'] * 0.5) + (0.02 * $data['car_detail']['amount'])) / 3);
                    } elseif ($data['order']['payment_plan'] === '4') {
                        $data['second'] = number_format((($data['car_detail']['amount'] * 0.5) + (0.045 * $data['car_detail']['amount'])) / 4);
                    } elseif ($data['order']['payment_plan'] === '5') {
                        $data['second'] = number_format((($data['car_detail']['amount'] * 0.5) + (0.08 * $data['car_detail']['amount'])) / 5);
                    } else {
                        $data['second'] = number_format((($data['car_detail']['amount'] * 0.5) + (0.12 * $data['car_detail']['amount'])) / 6);
                    }
                }

                break;

            //On Sail
            case 2:
                $data['first'] = $data['car_detail']['amount'] * 0.7;
                $data['second'] = $data['car_detail']['amount'] * 0.3;
                $data['plan'] = "Pay As You Go";
                $plan = "Pay As You Go";
                break;

            //On Ground
            case 3:
                $data['first'] = $data['car_detail']['amount'];
                $data['plan'] = "One Time Payment";
                $plan = "One Time Payment";
                break;
        }

        // $this->load->library('parser');

        //Load the library
        $this->load->library('html2pdf');
        
         // Folder where PDF file will be saved
        $this->html2pdf->folder('./assets/pdf/');
        
        $invoice_name = 'invoice_'.$data['order']['order_id'].'.pdf';
        
        // Name of the PDF file
        $this->html2pdf->filename($invoice_name);
        
        // Papper Orientation
        $this->html2pdf->paper('a4', 'portrait');
        
        //Load html view
        $this->html2pdf->html($this->load->view('mypdf', $data, true));


         if($path = $this->html2pdf->create('save')){
            
            $message = '<p>You have successfully purchased the following vehicle:</p>';
            $message .= '<p>Stock ID: ' . $data["car_detail"]["car_id"] . '</p>';
            $message .= '<p>Car: ' . $data["car_detail"]["year"] . ' ' . $data["make_detail"]["name"] . ' ' . $data["model_detail"]["name"] . '  ' . $data["car_detail"]["others"] . '</p>';
            $message .= '<p>Purchase Date: ' . date("Y-m-d") . '</p>';

            $message .= '<p>Payment Plan: ' . $plan . '</p>';
            $message .= '<p>Amount: ' . number_format($data['car_detail']['amount'], 0) . '</p>';
            $message .= '<p><a href="' . base_url() . 'users/purchases"><button type="button" style="padding: 5px 20px; background-color: #2a80b9; color: #FFF; font-weight: bold; border: #FFF solid 1px">Please Click here to view your purchase</button></a></p>';

            $this->model_htmldata->senderMailAttachPDF($data['user']['email'], $message, "Purchase Notification - " . $data['car_detail']['year'] . " " . $data['make_detail']['name'] . " " . $data['model_detail']['name'] . " " . $data['car_detail']['others'] . " ", $data['user']['fullname'], "Your Purchase for " . $data['car_detail']['year'] . " " . $data['make_detail']['name'] . " " . $data['model_detail']['name'] . " " . $data['car_detail']['others'] . "", $path);

        }else{
            echo 'Null';
        }

        $this->form_validation->set_rules('hd', 'hd', 'required');
        if ($this->form_validation->run()) {
            $note = $this->input->post('txtNote');
            $arr = array("order_note" => $note, "uploader" => $data['car_detail']['uploader'], "car_name" => $data['car_detail']['year'] . " " . $data['make_detail']['name'] . " " . $data['model_detail']['name'] . " " . $data['car_detail']['others']);
            $this->model_updatevalues->updateVal("orders", $arr, "order_id", $id);

            $array = array(
                'user_id' => $this->session->userdata('user_id'),
                'order_id' => $id,
                'payment_amount' => $data['first'],
                'payment_details' => $data['car_detail']['year'] . " " . $data['make_detail']['name'] . " " . $data['model_detail']['name']
            );

            $this->model_insertvalues->addItem($array, 'invoices');
            $lid = $this->db->insert_id();


            redirect('cars/payment/' . $lid . '');
        }

        $this->load->view('buy', $data);
        $this->load->view('footer');
    }

    public function payment($id) {

        $data['title'] = "Make Payment";
        $this->load->view('header', $data);
        $data["list"] = $this->model_getvalues->getTableRows("cars", "car_id !=", "0", "car_id", "desc");
        $data["order"] = $this->model_getvalues->getDetails("orders", "order_id", $id);
        $data["payment_detail"] = $this->model_getvalues->getDetails("invoices", "invoice_id", $id);
        $data['user'] = $this->model_getvalues->getDetails("users", "email", $_SESSION['email']);
        $data['order_id'] = $id;


        $this->load->view('payment', $data);
        $this->load->view('footer');
    }
    
     public function payment_status($ref, $id) {

        $data['title'] = "Make Payment";
        $this->load->view('header', $data);
        $data["list"] = $this->model_getvalues->getTableRows("cars", "car_id !=", "0", "car_id", "desc");
        $data["order"] = $this->model_getvalues->getDetails("orders", "order_id", $id);
        $data["payment_detail"] = $this->model_getvalues->getDetails("invoices", "invoice_id", $id);
        $data['user'] = $this->model_getvalues->getDetails("users", "email", $_SESSION['email']);
        $data['order_id'] = $id;
        $data['ref'] = $ref;


        $this->load->view('payment_status', $data);
        $this->load->view('footer');
    }

    public function search($status, $param, $page = 0) {

        $data['title'] = "Cars Search";
        $this->load->view('header', $data);

        $this->load->library("form_validation");



        if ($status == 0) {
            $paras = explode("-", $param);
            //echo $paras[1];
            foreach($paras as $val)
            {
                $dot[] = $val;
            }
            $dat = array("sess_res" => $dot);
            $this->session->set_userdata($dat);
            $bred = $this->session->userdata('sess_res');
            $data["list"] = $this->model_getvalues->searchValLikeArr("cars", $bred, "car_id", "desc");
        } else {
            $url = urldecode($param);
            $arr = explode('*', $url);
            $arr_count = count($arr);

            $search_arr = array();

            for ($x = 0; $x < $arr_count; $x++) {

                $f_explode = explode('+', $arr[$x]);
                $key = $f_explode[0];


                if ($key === "amount") {
                    $amt_exp = explode('-', $f_explode[1]);
                    $search_arr["amount >"] = $amt_exp[0];

                    $search_arr["amount <"] = $amt_exp[1];
                } else {
                    $search_arr["$key"] = $f_explode[1];
                }
            }

            $search_arr["status"] = $status;
            $data["list"] = $this->model_getvalues->searchVal2("cars", $search_arr, "car_id", "desc");
        }

        $data["make"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "make_id", "desc");
        $data["model"] = $this->model_getvalues->getDetails("model", "model_id !=", "0");
        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", "");

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'cars/search/' . $status . '/' . $param;
        $config['total_rows'] = count($data["list"]);

        if ($this->session->userdata('per_page')) {
            $config['per_page'] = $this->session->userdata('per_page');
        } else {
            $config['per_page'] = 20;
        }
        echo $this->session->userdata('per_page');
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


        switch ($status) {
            case 1:
                $data['header'] = "Search Result For 'Buy Now' Cars";
                $view = "list";
                break;


            case 2:
                $data['header'] = "Search Result For 'On Sail' Cars";
                $view = "list_sail";
                break;


            case 3:
                $data['header'] = "Search Result For 'On Ground' Cars";
                $view = "list_ground";
                break;

            default:
                $data['header'] = "Search Result";
                $view = "list";
                break;
        }

        $data['header'] = "Search Result";
        $data['sub'] = " Your search returned " . count($data["list"]) . " results";

        $this->form_validation->set_rules('hd', 'hd', 'required');
        if ($this->form_validation->run()) {
            $make = $this->input->post('make');
            $model = $this->input->post('model');
            $year = $this->input->post('year');
            $run = $this->input->post('run');
            //$body = $this->input->post('type');
            $amt = $this->input->post('amt');
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
            /* if ($body != "") {
              array_push($arr, "body+$body");
              } */
            if ($amt != "") {
                array_push($arr, "amount+$amt");
            }

            $cc = urlencode(implode('*', $arr));

            redirect('cars/search/' . $status . '/' . $cc);
        }

        $this->load->view($view, $data);
        $this->load->view('footer');
    }

    public function header_search($stat = "") {


        $query = url_title($this->input->post('txtSearch'));


        redirect('cars/search/0/' . $query);
    }

    public function fetchmodel($id) {
        $model = $this->model_getvalues->getTableRows("model", "make_id", $id, "name", "asc");


        $v = '          <label>SELECT A MODEL</label>

                                  <div>
                                                
                                               
                                <select name="select1" id class="m-select">
                                                    <option value="" selected="">Any Model</option>
                                                ';

        foreach ($model as $model) {

            $v .= '<option value="' . $model->model_id . '">' . $model->name . '</option>';
        }

        $v .= '</select>
        <span class="fa fa-caret-down"></span>
                                            </div>';

        echo $v;
    }

    public function fetchmodel2($id) {
        $model = $this->model_getvalues->getTableRows("model", "make_id", $id, "name", "asc");


        $v = '         

                                  <div>
                                                
                                               
                                <select name="ddlModel">
                                                    <option value="" selected="">Select Model</option>
                                                ';

        foreach ($model as $model) {

            $v .= '<option value="' . $model->model_id . '">' . $model->name . '</option>';
        }

        $v .= '</select>
        <span class="fa fa-caret-down"></span>
                                            </div>';

        echo $v;
    }

    public function page($stat = "") {

        $data['title'] = "Cars";
        $this->load->view('header', $data);

        $data['count'] = $this->model_getvalues->getCount("cars", "car_id !=", "0");
        $data["make"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "make_id", "desc");
        $data["model"] = $this->model_getvalues->getDetails("model", "model_id !=", "0");
        $data["car_detail"] = $this->model_getvalues->getDetails("cars", "car_id", "");

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'cars/page';
        $config['total_rows'] = $data['count'];
        $config['per_page'] = 1;
        $config['full_tag_open'] = '<div class="b-items__pagination-main">';
        $config['full_tag_close'] = '</div>';
        $config['prev_link'] = '<span class="fa fa-angle-left"></span>';
        $config['next_link'] = '<span class="fa fa-angle-right"></span>';

        $this->pagination->initialize($config);

        $data["pagi"] = $this->pagination->create_links();

        $this->db->limit($config['per_page'], $stat);

        $data['header'] = "All Cars";
        $data['sub'] = $data['count'] . " Cars on sale now!";

        $this->load->library("form_validation");
        $this->form_validation->set_rules('hd', 'hd', 'required');
        if ($this->form_validation->run() == true) {
            $make = $this->input->post('ddlMake');
            $model = $this->input->post('ddlModel');
            $year = $this->input->post('ddlYear');
            $run = $this->input->post('ddlRun');

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

            $cc = urlencode(implode('*', $arr));

            redirect('cars/search/' . $cc);
        }

        $data["list"] = $this->model_getvalues->getTableRows("cars", "car_id !=", "0", "car_id", "desc");
        $this->load->view('list', $data);
        $this->load->view('footer');
    }

    public function per_page($type, $num) {
        $data = array('per_page' => $num);
        $this->session->set_userdata($data);
        switch ($type) {
            case '1':
                redirect('cars/buy_now');
                break;

            case '2':
                redirect('cars/sail');
                break;

            case '3':
                redirect('cars/ground');
                break;
        }
    }

    public function per_sort($type, $num) {
        $data = array('per_sort' => $num);
        $this->session->set_userdata($data);
        switch ($type) {
            case '1':
                redirect('cars/buy_now');
                break;

            case '2':
                redirect('cars/sail');
                break;

            case '3':
                redirect('cars/ground');
                break;
        }
    }

    public function new_search() {
        echo $_GET['year'] . "dd";
    }

}
