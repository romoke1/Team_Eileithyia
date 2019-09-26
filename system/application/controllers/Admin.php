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
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('image_lib');
    }

    /**
     * App::index()
     * 
     * @return
     */
    public function index() {
        redirect('admin/dashboard');
    }

    /**
     * App::chkLog()
     * 
     * @return
     */
    public function chkLog() {
        if ($this->session->userdata('is_logged_in')) {
            
        } else {
            redirect("admin/login");
        }
    }

    /**
     * App::init()
     * 
     * @return void
     */
    private function init() {
        $this->chkLog();
        $data["status"] = "";
        $this->load->helper('date');
    }

    /**
     * App::login()
     * 
     * @return
     */
    public function login() {
        $this->load->library("form_validation");
        //$this->load->view('login');

        $this->form_validation->set_rules('txtAdminUsername', 'Email', 'required|trim|callback_validate_credentials');
        $this->form_validation->set_rules('txtAdminPasswd', 'Password', 'required|trim');

        if ($this->form_validation->run()) {


            $adm = $this->model_getvalues->getDetails("admin", "email", $this->input->post('txtAdminUsername'));

            $data = array(
                'is_logged_in' => 1,
                'acct_type' => 'admin',
                'name' => $adm['name'],
                'a_id' => $adm['id'],
                'level' => $adm['level']
            );
            $this->session->set_userdata($data);
            redirect('admin/dashboard');
        } else {
            $this->load->view('admin/login.php');
        }
    }

    /**
     * App::logout()
     * 
     * @return
     */
    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    /**
     * App::validate_credentials()
     * 
     * @return
     */
    public function validate_credentials() {
        if ($this->model_getvalues->admin_can_login()) {
            return true;
        } else {
            $this->form_validation->set_message("validate_credentials", "Incorrect Username/Password");
            return false;
        }
    }

    /**
     * App::change_password()
     * 
     * @return
     */
    public function change_password($id) {
        $this->init();
        $this->load->view("change_password");

        $this->form_validation->set_rules('txtOldPass', 'Old Password', 'required');
        $this->form_validation->set_rules('txtNewPass', 'New Password', 'required');

        if ($this->form_validation->run()) {
            if ($this->model_updatevalues->updatePassword($id)) {

                $data["status"] = $this->model_htmldata->successMsg("You succesfully updated your password");
            }
        }
    }

    /**
     * App::dashboard()
     * 
     * @return
     */
    public function dashboard() {
        $this->init();
        $data['title'] = "Blockgator Admin";
        $this->load->view("admin/header", $data);
        $data["status"] = "";
        $d = date("2018-06-01");
        $data["activeCoys"] = $this->model_getvalues->getCount("users", "status", "1");
        $data["inActiveCoys"] = $this->model_getvalues->getCount("users", "status", "0");
        $data["orders"] = $this->model_getvalues->getCount("orders", "order_id !=", "0");
        //$data["sold"] = $this->model_getvalues->getDetails("admin", "id", $this->session->userdata("a_id"));
        $data["ups"] = $this->model_getvalues->getTableRows("admin", "level !=", 'super', 'id', 'desc');
        $data["week"] = $this->model_getvalues->getCount2("cars", array("week" => date('W'), "uploader" => $this->session->userdata("a_id")));
        $data["month"] = $this->model_getvalues->getCount2("cars", array("month" => date('m'), "uploader" => $this->session->userdata("a_id")));
        $data["month2"] = $this->model_getvalues->getCount2("cars", array("month" => date('m'), "car_status !=" => 0, "uploader" => $this->session->userdata("a_id")));
        $data["sold"] = $this->model_getvalues->getCount2("orders", array("created_at >" => $d, "created_at <" => date("Y-m-d"), "status !=" => "Awaiting First Payment"));
        $data["sold2"] = $this->model_getvalues->getCount2("orders", array("created_at >" => $d, "created_at <" => date("Y-m-d"), "status !=" => "Awaiting First Payment", "uploader" => $this->session->userdata("a_id")));
        $this->load->view("admin/dashboard", $data);
    }

    public function users($stat = "") {

        $this->init();
        $data['title'] = "All Users | Blockgator Admin";
        $this->load->view("admin/header", $data);
        if ($stat == "deactivated") {
            $data["status"] = $this->model_htmldata->successMsg("User Deactivated succesfully");
            
        } elseif ($stat == "activated") {
            $data["status"] = $this->model_htmldata->successMsg("User Activated succesfully");
            
        } elseif ($stat == "edited") {
            $data["status"] = $this->model_htmldata->successMsg("Changes made succesfully");
            
        } else {
            $data["status"] = "";
            $data["cj"] = true;
        }
        $data["s"] = 0;
        $data['users_num'] = $this->model_getvalues->getCount("users", "status !=", "9");
        $data["coys"] = $this->model_getvalues->getTableRows("users", "status !=", '9', 'user_id', 'desc');
        $this->load->view("admin/users", $data);
    }
    
     public function dealers($stat = ""){
        
        $this->init();
        $data['title'] = "All Dealers | TokunboCars.NG Admin";
        $this->load->view("admin/header", $data);
        if ($stat == "deactivated") {
            $data["status"] = $this->model_htmldata->successMsg("Dealer Deactivated succesfully");
            
        } elseif ($stat == "activated") {
            $data["status"] = $this->model_htmldata->successMsg("Dealer Activated succesfully");
            
        } elseif ($stat == "edited") {
            $data["status"] = $this->model_htmldata->successMsg("Changes made succesfully");
            
        } else {
            $data["status"] = "";
            $data["cj"] = true;
        }
        $data["s"] = 0;
        $data['dealer_num'] = $this->model_getvalues->getCount("dealers", "status !=", "9");
        $data["coys"] = $this->model_getvalues->getTableRows("dealers", "status !=", '9', 'dealer_id', 'desc');
        $this->load->view("admin/dealers", $data);
    }
    
    
    // Export Email and Phone Number in CSV format 
    public function exportEmailPhone() {
        // file name 
        $filename = 'TKC_Email&Phone_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $usersData = $this->model_getvalues->exportEmailPhone();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("Email", "Phone");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

    // Export Email only in CSV format 
    public function exportEmail() {
        // file name 
        $filename = 'TKC_Emails_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $usersData = $this->model_getvalues->exportEmail();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("Email");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

    // Export Phone Numbers only in CSV format 
    public function exportPhone() {
        // file name 
        $filename = 'TKC_Phones_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $usersData = $this->model_getvalues->exportPhone();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("Phone");
        fputcsv($file, $header);
        foreach ($usersData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

    
    public function partners($stat = "") {

        $this->init();
        $data['title'] = "All Partners | Blockgator Admin";
        $this->load->view("admin/header", $data);
        if ($stat == "deactivated") {
            $data["status"] = $this->model_htmldata->successMsg("User Deactivated succesfully");
            
        } elseif ($stat == "activated") {
            $data["status"] = $this->model_htmldata->successMsg("User Activated succesfully");
            
        } elseif ($stat == "edited") {
            $data["status"] = $this->model_htmldata->successMsg("Changes made succesfully");
            
        } else {
            $data["status"] = "";
            $data["cj"] = true;
        }
        $data["s"] = 0;
        $data['users_num'] = $this->model_getvalues->getCount("partners", "id !=", "0");
        $data["partners"] = $this->model_getvalues->getTableRows("partners", "id !=", '0', 'id', 'asc');
        $this->load->view("admin/partners", $data);
    }
    
    
    public function agents($stat = "") {

        $this->init();
        $data['title'] = "All Agents | Blockgator Admin";
        $this->load->view("admin/header", $data);
        if ($stat == "deactivated") {
            $data["status"] = $this->model_htmldata->successMsg("User Deactivated succesfully");
            
        } elseif ($stat == "activated") {
            $data["status"] = $this->model_htmldata->successMsg("User Activated succesfully");
            
        } elseif ($stat == "edited") {
            $data["status"] = $this->model_htmldata->successMsg("Changes made succesfully");
            
        } else {
            $data["status"] = "";
            $data["cj"] = true;
        }
        $data["s"] = 0;
        $data['users_num'] = $this->model_getvalues->getCount("agents", "id !=", "0");
        $data["partners"] = $this->model_getvalues->getTableRows("agents", "id !=", '0', 'id', 'asc');
        $this->load->view("admin/agents", $data);
    }

    public function cars1($stat = "", $search = "") {

        $this->init();
        $data['title'] = "Products | Blockgator Admin";
        $this->load->library('pagination');
        $this->load->view("admin/header", $data);
        if ($stat == "disapproved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Disapproved succesfully");
        } elseif ($stat == "approved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Approved succesfully");
        } elseif ($stat == "deleted") {
            $data["status"] = $this->model_htmldata->successMsg("Car delete succesfully");
        } else {
            $data["status"] = "";
        }

        $this->form_validation->set_rules('txtSearch', 'Search', 'required');

        if ($this->form_validation->run()) {
            redirect('admin/cars1/search/' . $this->input->post("txtSearch"));
        }

        if ($search == "") {

            $config['base_url'] = base_url() . 'admin/cars1/';
            $config['total_rows'] = $this->model_getvalues->getCount("cars", "status", 1);
            $config['per_page'] = 20;
            $config['full_tag_open'] = '<div class="pagination_cust">';
            $config['full_tag_close'] = '</div>';
            $config['next_link'] = '&gt;';
            $config['prev_link'] = '&lt;';

            if ($stat == "") {
                $data["s"] = 0;
            } else {
                $data["s"] = $stat;
            }





            $this->pagination->initialize($config);

            $data["pagi"] = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $stat);

            $data["products"] = $this->model_getvalues->getTableRows("cars", "status", 1, 'car_id', 'desc');
        } else {


            $data["s"] = 0;
            $data["pagi"] = "";
            $data["products"] = $this->model_getvalues->searchValWhere("cars", "search_all", $search, "status", 1, "car_id", "desc");
        }



        $data['h'] = 'Buy Now Cars';


        $data['product_num'] = $this->model_getvalues->getCount("cars", "status", 1);

        $this->load->view("admin/products", $data);
    }
    
    
    
    
    public function cars2($stat = "", $search = "") {

        $this->init();
        $data['title'] = "Products | Blockgator Admin";
        $this->load->library('pagination');
        $this->load->view("admin/header", $data);
        if ($stat == "disapproved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Disapproved succesfully");
        } elseif ($stat == "approved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Approved succesfully");
        } elseif ($stat == "deleted") {
            $data["status"] = $this->model_htmldata->successMsg("Car delete succesfully");
        } else {
            $data["status"] = "";
        }

        $this->form_validation->set_rules('txtSearch', 'Search', 'required');

        if ($this->form_validation->run()) {
            redirect('admin/cars2/search/' . $this->input->post("txtSearch"));
        }

        if ($search == "") {

            $config['base_url'] = base_url() . 'admin/cars2/';
            $config['total_rows'] = $this->model_getvalues->getCount("cars", "status", 2);
            $config['per_page'] = 20;
            $config['full_tag_open'] = '<div class="pagination_cust">';
            $config['full_tag_close'] = '</div>';
            $config['next_link'] = '&gt;';
            $config['prev_link'] = '&lt;';

            if ($stat == "") {
                $data["s"] = 0;
            } else {
                $data["s"] = $stat;
            }





            $this->pagination->initialize($config);

            $data["pagi"] = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $stat);

            $data["products"] = $this->model_getvalues->getTableRows("cars", "status", 2, 'car_id', 'desc');
        } else {


            $data["s"] = 0;
            $data["pagi"] = "";
            $data["products"] = $this->model_getvalues->searchValWhere("cars", "search_all", $search, "status", 2, "car_id", "desc");
        }

        $data['h'] = 'On Sail Cars';
        $data['product_num'] = $this->model_getvalues->getCount("cars", "status", 2);

        $this->load->view("admin/products", $data);
    }
    
    
    public function cars3($stat = "", $search = "") {

        $this->init();
        $data['title'] = "Products | Blockgator Admin";
        $this->load->library('pagination');
        $this->load->view("admin/header", $data);
        if ($stat == "disapproved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Disapproved succesfully");
        } elseif ($stat == "approved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Approved succesfully");
        } elseif ($stat == "deleted") {
            $data["status"] = $this->model_htmldata->successMsg("Car delete succesfully");
        } else {
            $data["status"] = "";
        }

        $this->form_validation->set_rules('txtSearch', 'Search', 'required');

        if ($this->form_validation->run()) {
            redirect('admin/cars3/search/' . $this->input->post("txtSearch"));
        }

        if ($search == "") {

            $config['base_url'] = base_url() . 'admin/cars3/';
            $config['total_rows'] = $this->model_getvalues->getCount("cars", "status", 3);
            $config['per_page'] = 20;
            $config['full_tag_open'] = '<div class="pagination_cust">';
            $config['full_tag_close'] = '</div>';
            $config['next_link'] = '&gt;';
            $config['prev_link'] = '&lt;';

            if ($stat == "") {
                $data["s"] = 0;
            } else {
                $data["s"] = $stat;
            }





            $this->pagination->initialize($config);

            $data["pagi"] = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $stat);

            $data["products"] = $this->model_getvalues->getTableRows("cars", "status", 3, 'car_id', 'desc');
        } else {


            $data["s"] = 0;
            $data["pagi"] = "";
            $data["products"] = $this->model_getvalues->searchValWhere("cars", "search_all", $search, "status", 3, "car_id", "desc");
        }
        
        $data['h'] = 'On Ground Cars';
        
        $data['product_num'] = $this->model_getvalues->getCount("cars", "status", 3);

        $this->load->view("admin/products", $data);
    }
    
    public function cars4($stat = "", $search = "") {

        $this->init();
        $data['title'] = "Products | Blockgator Admin";
        $this->load->library('pagination');
        $this->load->view("admin/header", $data);
        if ($stat == "disapproved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Disapproved succesfully");
        } elseif ($stat == "approved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Approved succesfully");
        } elseif ($stat == "deleted") {
            $data["status"] = $this->model_htmldata->successMsg("Car delete succesfully");
        } else {
            $data["status"] = "";
        }

        $this->form_validation->set_rules('txtSearch', 'Search', 'required');

        if ($this->form_validation->run()) {
            redirect('admin/cars4/search/' . $this->input->post("txtSearch"));
        }

        if ($search == "") {

            $config['base_url'] = base_url() . 'admin/cars4/';
            $config['total_rows'] = $this->model_getvalues->getCount("cars", "status", 4);
            $config['per_page'] = 20;
            $config['full_tag_open'] = '<div class="pagination_cust">';
            $config['full_tag_close'] = '</div>';
            $config['next_link'] = '&gt;';
            $config['prev_link'] = '&lt;';

            if ($stat == "") {
                $data["s"] = 0;
            } else {
                $data["s"] = $stat;
            }





            $this->pagination->initialize($config);

            $data["pagi"] = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $stat);

            $data["products"] = $this->model_getvalues->getTableRows("cars", "status", 4, 'car_id', 'desc');
        } else {


            $data["s"] = 0;
            $data["pagi"] = "";
            $data["products"] = $this->model_getvalues->searchValWhere("cars", "search_all", $search, "status", 4, "car_id", "desc");
        }
        
        $data['h'] = 'Sold Cars';
        
        $data['product_num'] = $this->model_getvalues->getCount("cars", "status", 4);

        $this->load->view("admin/products", $data);
    }

    public function orders($stat = "", $search = "") {

        $this->init();
        $data['title'] = "Products | Blockgator Admin";
        $this->load->view("admin/header", $data);
        if ($stat == "disapproved") {
            $data["status"] = $this->model_htmldata->successMsg("This order status has been changed");
            
        } elseif ($stat == "deleted") {
            $data["status"] = $this->model_htmldata->successMsg("Orer has been Deleted succesfully");
            
        } elseif ($stat == "edited") {
            $data["status"] = $this->model_htmldata->successMsg("Changes made succesfully");
        } else {
            $data["status"] = "";
            $data["cj"] = true;
        }
        $data["s"] = 0;

        $this->form_validation->set_rules('txtSearch', 'Search', 'required');

        if ($this->form_validation->run()) {
            redirect('admin/orders/search/' . $this->input->post("txtSearch"));
        }

        if ($search == "") {
            $data["products"] = $this->model_getvalues->getTableRows("orders", "status !=", '9', 'order_id', 'asc');
        } else {
            $data["products"] = $this->model_getvalues->getTableRows("orders", "order_id", $search, 'order_id', 'asc');
        }


        $data['product_num'] = $this->model_getvalues->getCount("orders", "status !=", "9");

        //$data["sub_cat"] = $this->model_getvalues->getTableRows("sub_categories", "s_id !=", '0', 's_id', 'asc');
        $this->load->view("admin/orders", $data);
    }

    public function invoices($stat = "", $search = "") {

        $this->init();
        $data['title'] = "Products | Blockgator Admin";
        $this->load->view("admin/header", $data);
        if ($stat == "disapproved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Disapproved succesfully");
            
        } elseif ($stat == "approved") {
            $data["status"] = $this->model_htmldata->successMsg("Payment has been Approved succesfully");
            
        } elseif ($stat == "deleted") {
            $data["status"] = $this->model_htmldata->successMsg("Invoice deleted succesfully");
            
        } else {
            $data["status"] = "";
            $data["cj"] = true;
        }
        $data["s"] = 0;

        $this->form_validation->set_rules('txtSearch', 'Search', 'required');

        if ($this->form_validation->run()) {
            redirect('admin/invoices/search/' . $this->input->post("txtSearch"));
        }

        if ($search == "") {
            $data["products"] = $this->model_getvalues->getTableRows("invoices", "payment_status !=", '9', 'invoice_id', 'asc');
        } else {
            $data["products"] = $this->model_getvalues->getTableRows("invoices", "invoice_id", $search, 'invoice_id', 'asc');
        }


        $data['product_num'] = $this->model_getvalues->getCount("invoices", "payment_status !=", "9");

        //$data["sub_cat"] = $this->model_getvalues->getTableRows("sub_categories", "s_id !=", '0', 's_id', 'asc');
        $this->load->view("admin/invoices", $data);
    }

    public function tickets($stat = "", $search = "") {

        $this->init();
        $data['title'] = "Products | Blockgator Admin";
        $this->load->view("admin/header", $data);
        if ($stat == "disapproved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Disapproved succesfully");
        } elseif ($stat == "approved") {
            $data["status"] = $this->model_htmldata->successMsg("Payment has been Approved succesfully");
        } elseif ($stat == "edited") {
            $data["status"] = $this->model_htmldata->successMsg("Changes made succesfully");
        } else {
            $data["status"] = "";
        }
        $data["s"] = 0;

        $this->form_validation->set_rules('txtSearch', 'Search', 'required');

        if ($this->form_validation->run()) {
            redirect('admin/tickets/search/' . $this->input->post("txtSearch"));
        }

        if ($search == "") {
            $data["products"] = $this->model_getvalues->getTableRows("tickets", "t_id !=", '0', 'datee', 'desc');
        } else {
            $data["products"] = $this->model_getvalues->getTableRows("tickets", "t_id", $search, 'datee', 'desc');
        }


        $data['product_num'] = $this->model_getvalues->getCount("tickets", "t_id !=", '0');

        //$data["sub_cat"] = $this->model_getvalues->getTableRows("sub_categories", "s_id !=", '0', 's_id', 'asc');
        $this->load->view("admin/tickets", $data);
    }

    public function ticket($tid, $stat = "") {
        $this->init();
        $data['title'] = "Ticket";
        $this->load->view("admin/header", $data);
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Ticket has been Updated succesfully");
        } else {
            $data["status"] = "";
        }
        $data["s"] = 0;
        $data["ticket"] = $this->model_getvalues->getDetails("tickets", "t_id", $tid);
        $data['user'] = $this->model_getvalues->getDetails("users", "user_id", $data["ticket"]["t_user"]);
        $this->form_validation->set_rules('txtContent', 'Message Body', 'required');

        if ($this->form_validation->run()) {

            $array = array(
                't_content' => $data["ticket"]["t_content"] . "*|||*" . "Admin*~" . $this->input->post('txtContent') . "*~" . date('Y-m-d h:i A')
            );
            $this->load->model('model_insertvalues');
            if ($this->model_updatevalues->updateVal("tickets", $array, "t_id", $tid)) {
                
                $message = '<p>You have a response for your ticket</p>';
                $message .= '<p>Kindly login to view.</p>';
                $message .= '<p><a href="' . base_url() . 'users/ticket/'.$tid.'"><button type="button" style="padding: 5px 20px; background-color: #2a80b9; color: #FFF; font-weight: bold; border: #FFF solid 1px">Please Click here to open ticket</button></a></p>';

                $this->model_htmldata->senderMail($data['user']['email'], $message, "Ticket Response", $data['user']['fullname'], "Ticket Response");

                
                redirect('admin/ticket/' . $tid . '/success');
            }
        }
        $this->load->view("admin/ticket_details", $data);
    }

    
    public function accept_pay($id) {
        $ref = "ref_".$id;
        $arr = array("payment_status" => "Paid", "payment_ref" => urldecode($ref));
        if ($this->model_updatevalues->updateVal2($id, $arr, 'invoices', 'invoice_id')) {

            $data['invoice'] = $this->model_getvalues->getDetails("invoices", "invoice_id", $id);
            $data['user'] = $this->model_getvalues->getDetails("users", "user_id", $data['invoice']['user_id']);
            $data['order'] = $this->model_getvalues->getDetails("orders", "order_id", $data['invoice']['order_id']);
            $data['car'] = $this->model_getvalues->getDetails("cars", "car_id", $data['order']['stock_id']);

            $this->model_updatevalues->updateVal2($data['order']['stock_id'], array("status" => 4), 'cars', 'car_id');
            
            $balance = $data['car']['amount'] - $data['invoice']['payment_amount'];
            $data['bal'] = $data['car']['amount'] - $data['invoice']['payment_amount'];
            $data['ref'] = $ref;

            $data['status'] = "Paid";
            //Load the library
            $this->load->library('html2pdf');

            // Folder where PDF file will be saved
            $this->html2pdf->folder('./assets/pdf/');

            $invoice_name = 'invoice_' . $data['order']['order_id'] . '.pdf';

            // Name of the PDF file
            $this->html2pdf->filename($invoice_name);

            // Papper Orientation
            $this->html2pdf->paper('a4', 'portrait');

            //Load html view
            $this->html2pdf->html($this->load->view('admin/mypdf3', $data, true));

            

            if ($path = $this->html2pdf->create('save')) {

                $message = '<p>This is a payment receipt for Invoice #' . $id . ' sent on ' . date('jS M Y', strtotime($data['invoice']['datee'])) . '.</p>';
                $message .= '<p><strong>Car Bought:</strong> ' . $data['order']["car_name"] . ' </p>';


                $message .= '<p><hr /><br /><strong>Car Amount</strong>: N' . number_format($data['car']['amount'], 2) . ''
                        . '<br /><strong>Amount Paid</strong>: N' . number_format($data['invoice']["payment_amount"], 2) . ''
                        . '<br /><strong>Credit</strong>: N0.00'
                        . '<br /><strong>Remaining Balance</strong>: N' . number_format($balance, 2) . ''
                        . '<br /><strong>Status</strong>: Paid'
                        . '<br /><strong>Payment Reference</strong>: ' . $ref . ''
                        . '<br /><hr /></p>';

                $message .= '<p>You may review your invoice history at any time by logging in to your dashboard area.</p>';
                $message .= '<p>Note: This email will serve as an official receipt for this payment.</p>';

                $this->model_htmldata->senderMailAttachPDF($data['user']['email'], $message, "Invoice Payment Confirmation - " . $data['order']['car_name'] . " ", $data['user']['fullname'], "Invoice Payment Confirmation - " . $data['order']['car_name'] . "", $path);


                redirect('/admin/invoices/approved');
            } else {
                echo "NULL";
            }
        }
    }


    public function change_status($id) {


        $this->load->library("form_validation");
        $this->form_validation->set_rules('ddlStat' . $id . '', 'Status', 'required');
        if ($this->form_validation->run()) {
            $arr = array("status" => $this->input->post("ddlStat" . $id . ""));
            if ($this->model_updatevalues->updateVal2($id, $arr, 'orders', 'order_id')) {
                
                switch ($this->input->post("ddlStat" . $id . "")) {
                    case "Car Bought, Awaiting Trucking":
                        $stat = "Your Car has been fully paid for in the US. We are now awaiting a trucker to take your Car to the port";

                        break;
                    
                    case "Car Trucked to Port, Awaiting Dock on Ship":
                        $stat = "Your Car has been taken to the port by a trucker. All documentations are being made for the processing of the shipment. Once this is done, your car will be docked on the ship.";

                        break;
                    
                    case "Car Docked on Ship, Awaiting Sail of Ship":
                        $stat = "All documentations for the shipment of your car has been done. Your Car has been docked on the ship and we are awaiting its sail.";

                        break;
                    
                    case "Ship Sailed":
                        $stat = "The ship carrying your car has left the port. You will be contacted soon by our staff as regards the ETA (Estimated Time of Arrival)";

                        break;
                    
                    case "Ship About to Sail, Awaiting Second Payment":
                        $stat = "The ship carrying your car is about sailing in 24hrs. Kindly ensure you make your second payment to avoid delay of the arrival of your car.";

                        break;

                    case "Awaiting Ship Arrival":
                        $stat = "The ship carrying your car is yet to arrive at its destination port (Lagos, Nigeria). You will be notified 1 week before the ship arrives.";

                        break;
                    
                    case "Ship Arrives in 3 Days":
                        $stat = "The ship carrying your car will at its destination port (Lagos, Nigeria) in Three (3) days from now. Kindly ensure your payment balance is ready to avoid delay in the delivery of your car.";

                        break;
                    
                    case "Transaction Completed":
                        $stat = "Thanks for your patronage. This is to confirm your car has been delivered.";

                        break;
                    
                    default:
                        break;
                }
                
                $order = $this->model_getvalues->getDetails("orders", "order_id", $id);
            $data['user'] = $this->model_getvalues->getDetails("users", "user_id", $order["user_id"]);
                
                $message = '<p>This is to inform you that the status of your order for '.$order["car_name"].' has changed to <strong>'.$this->input->post("ddlStat" . $id . "").'.</strong></p>';
                $message .= '<p><h4>What Does This Mean?</h4> '.$stat.'</p>';
                $message .= '<p>Please feel free to contact us for any question</p>';

                $this->model_htmldata->senderMail($data['user']['email'], $message, "Your Order #".$id." Status Update", $data['user']['fullname'], "Your Order #".$id." Status Update");
                
                redirect('admin/orders/approved');
            }
        }
    }

    public function disapprove_product($id) {
        $arr = array("status" => "0");
        if ($this->model_updatevalues->updateVal2($id, $arr, 'products', 'product_id')) {
            redirect('/admin/products/disapproved');
        }
    }

    public function deactivate_coy($id) {
        $arr = array("status" => "0");
        if ($this->model_updatevalues->updateVal2($id, $arr, 'users', 'user_id')) {
            redirect('/admin/users/deactivated');
        }
    }

    public function activate_coy($id) {
        $arr = array("status" => "1");
        if ($this->model_updatevalues->updateVal2($id, $arr, 'users', 'user_id')) {
            redirect('/admin/users/activated');
        }
    }

    public function deactivate_dealer($id) {
        $arr = array("status" => "0");
        if ($this->model_updatevalues->updateVal2($id, $arr, 'dealers', 'dealer_id')) {
            redirect('/admin/dealers/deactivated');
        }
    }

    public function activate_dealer($id) {
        $arr = array("status" => "1");
        if ($this->model_updatevalues->updateVal2($id, $arr, 'dealers', 'dealer_id')) {
            redirect('/admin/dealers/activated');
        }
    }

    public function deactivate_plan($id) {
        $arr = array("status" => "0");
        if ($this->model_updatevalues->updateVal2($id, $arr, 'plans', 'id')) {
            redirect('admin/edit_plans/deactivated');
        }
    }

    public function activate_plan($id) {
        $arr = array("status" => "1");
        if ($this->model_updatevalues->updateVal2($id, $arr, 'plans', 'id')) {
            redirect('admin/edit_plans/activated');
        }
    }

    public function make($stat = "") {
        $this->init();
        $data['title'] = "Make | Blockgator Admin";
        $this->load->view("admin/header", $data);
        ////$this->check_access('Settings');
        $data["status"] = "";
        $data["token"] = "";
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Make Type Edited Successfully");
        } elseif ($stat == "delete") {
            $data["status"] = $this->model_htmldata->successMsg("Make Type Action Deleted Successfully");
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules('txtCategory', 'Level Type', 'required');

        $this->form_validation->set_message('is_unique', 'This Level Type already exist');

        if ($this->form_validation->run()) {
            $array = array("name" => $this->input->post("txtCategory"));
            if ($this->model_insertvalues->addItem($array, 'make')) {
                $data["status"] = $this->model_htmldata->successMsg("New Make Type created");
                $data["results"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "make_id");
            }
        } else {
            $data["results"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "name", "asc");
        }
        $this->load->view("admin/make", $data);
    }

    public function edit_make($a) {
        $this->init();
        $data['title'] = "Edit Make | Blockgator Admin";
        $this->load->view("admin/header", $data);
        $data["status"] = "";
        $this->load->library("form_validation");
        $this->form_validation->set_rules('txtCategory1', 'Category Type', 'required');


        if ($this->form_validation->run()) {
            $array = array("name" => $this->input->post("txtCategory1"));
            if ($this->model_updatevalues->updateVal2($a, $array, "make", "make_id")) {
                redirect('admin/make/success');
            }
        } else {
            $data["results"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "make_id");
            $data["token"] = $a;
            $this->load->view("admin/make", $data);
        }
    }

    public function model($stat = "") {
        $this->init();
        $data['title'] = "Model | Blockgator Admin";
        $this->load->view("admin/header", $data);
        // //$this->check_access('Settings');
        $data["status"] = "";
        $data["token"] = "";
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Model Added Successfully");
        } elseif ($stat == "delete") {
            $data["status"] = $this->model_htmldata->successMsg("Model Deleted Successfully");
        }

        $data["cat"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "make_id");
        //   $data["sub"] = $this->model_getvalues->getTableRows("model", "model_id !=", "0", "model_id");
        $this->load->library("form_validation");
        $this->form_validation->set_rules('sub_name', 'Model Type', 'required');

        $this->form_validation->set_message('is_unique', 'This make already exist');

        if ($this->form_validation->run()) {
            $array = array(
                "name" => $this->input->post("sub_name"),
                "make_id" => $this->input->post("make")
            );
            if ($this->model_insertvalues->addItem($array, 'model')) {
                $data["status"] = $this->model_htmldata->successMsg("New Model created");
            }
        }
        $data["model"] = $this->model_getvalues->getTableRows("model", "model_id !=", "0", "name", 'asc');
        $this->load->view("admin/model", $data);
    }

    public function editmodel($a) {
        $this->init();
        $data['title'] = "Model | Blockgator Admin";
        $this->load->view("admin/header", $data);
        $data["status"] = "";
        $this->load->library("form_validation");

        $data["make"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "make_id");
        $data["ddl"] = "";
        $this->form_validation->set_rules('category1', 'Sub-Category Type', 'required');
        $data["token"] = $a;

        $this->form_validation->set_message('is_unique', 'This model Type already exist');

        if ($this->form_validation->run()) {
            $array = array(
                "name" => $this->input->post("category1"),
                "make_id" => $this->input->post("level1")
            );
            if ($this->model_updatevalues->updateVal2($a, $array, "model", "model_id")) {
                redirect('admin/model/success');
            }
        }
        $data["model"] = $this->model_getvalues->getTableRows("model", "model_id !=", "0", "model_id");
        $this->load->view("admin/model", $data);
    }

    public function edit_car($id, $stat = "") {
        $this->init();
        $data['title'] = "Add Car | Blockgator Admin";
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Car Edited Successfully");
        } else {
            $data["status"] = "";
        }
        $this->load->view("admin/header", $data);
        $data["cat"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "make_id");
        $data["model"] = $this->model_getvalues->getTableRows("model", "model_id !=", "0", "model_id");
        $data["car_det"] = $this->model_getvalues->getDetails("cars", "car_id", $id);
        $data["model_det"] = $this->model_getvalues->getDetails("model", "model_id", $data["car_det"]["model"]);
        $this->load->library("form_validation");
        $this->form_validation->set_rules('vin', 'VIN', 'required');


        if ($this->form_validation->run()) {

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
                "status" => $this->input->post("status"),
                "year" => $this->input->post("year"),
                "erc" => $this->input->post("erc"),
                "ctv" => $this->input->post("ctv"),
                "ecc" => $this->input->post("ecc"),
                "cylinder" => $this->input->post("cylinder"),
                "others" => $this->input->post("others"),
                "ead" => $this->input->post("ead"),
                "search_all" => $id . " " . $this->input->post("vin") . " " . $this->input->post("year") . " " . $make_det['name'] . " " . $model_det['name'] . " " . $this->input->post("others")
            );
            if ($this->model_updatevalues->updateVal2($id, $array, 'cars', 'car_id')) {
                redirect("admin/edit_car/" . $id . "/success");
            }
        }
        $this->load->view("admin/edit_car", $data);
    }

      public function add_cars($stat = "") {
        $this->init();
        $data['title'] = "Edit Car | Blockgator Admin";
        $this->load->view("admin/header", $data);
        $data["status"] = "";
        $data["token"] = "";
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Car  Added Successfully");
        } elseif ($stat == "delete") {
            $data["status"] = $this->model_htmldata->successMsg("Car Deleted Successfully");
        }
        $data["cat"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "name", "asc");
        $data["model"] = $this->model_getvalues->getTableRows("model", "model_id !=", "0", "name", "asc");
        //$this->load->library("form_validation");
        //$this->load->helper("form");
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('vin', 'VIN', 'required|is_unique[cars.vin]');


        $this->form_validation->set_message('is_unique', 'This Car already exist - Duplicate VIN');
        if ($this->form_validation->run() == TRUE) {
            
            $data['level'] = $this->model_getvalues->getDetails("admin", "level", $this->session->userdata('level'));
            
            if($data['level']['level'] == 'super'){

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
                    "status" => $this->input->post("status"),
                    "car_status" => 1,
                    "others" => $this->input->post("others"),
                    "cylinder" => $this->input->post("cylinder"),
                    "link" => $this->input->post("link"),
                    "uploader" => $this->session->userdata("a_id"),
                    "datee" => date("Y-m-d"),
                    "week" => date('W'),
                    "month" => date('m'),
                    "ead" => $this->input->post("ead"),
                    "search_all" => $this->input->post("vin") . " " . $this->input->post("year") . " " . $make_det['name'] . " " . $model_det['name'] . " " . $this->input->post("others")
                );

                if ($this->model_insertvalues->addItem($array, 'cars')) {
                    $lid = $this->db->insert_id();
                    $array_up = array(
                        "search_all" => $lid . " " .$this->input->post("vin") . " " . $this->input->post("year") . " " . $make_det['name'] . " " . $model_det['name'] . " " . $this->input->post("others")
                        );
                    if($this->model_updatevalues->updateVal2($lid, $array_up, 'cars', 'car_id')){
                        //  $data["status"] = $this->model_htmldata->successMsg("New Car Added");
                    redirect('admin/add_image/' . $lid);
                    }
                    
                }
            }else{

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
                    "status" => $this->input->post("status"),
                    "car_status" => 0,
                    "others" => $this->input->post("others"),
                    "cylinder" => $this->input->post("cylinder"),
                    "link" => $this->input->post("link"),
                    "uploader" => $this->session->userdata("a_id"),
                    "datee" => date("Y-m-d"),
                    "week" => date('W'),
                    "month" => date('m'),
                    "ead" => $this->input->post("ead"),
                    "search_all" => $this->input->post("vin") . " " . $this->input->post("year") . " " . $make_det['name'] . " " . $model_det['name'] . " " . $this->input->post("others")
                );

                if ($this->model_insertvalues->addItem($array, 'cars')) {
                    // $lid = $this->db->insert_id();
                    //  $data["status"] = $this->model_htmldata->successMsg("New Car Added");
                    // redirect('admin/add_image/' . $lid);
                    
                    $lid = $this->db->insert_id();
                    $array_up = array(
                        "search_all" => $lid . " " .$this->input->post("vin") . " " . $this->input->post("year") . " " . $make_det['name'] . " " . $model_det['name'] . " " . $this->input->post("others")
                        );
                    if($this->model_updatevalues->updateVal2($lid, $array_up, 'cars', 'car_id')){
                        //  $data["status"] = $this->model_htmldata->successMsg("New Car Added");
                    redirect('admin/add_image/' . $lid);
                    }
                }
            }
            
        }
        $this->load->view("admin/add_car", $data);
    }

    // public function add_cars($stat = "") {
    //     $this->init();
    //     $data['title'] = "Edit Car | Blockgator Admin";
    //     $this->load->view("admin/header", $data);
    //     $data["status"] = "";
    //     $data["token"] = "";
    //     if ($stat == "success") {
    //         $data["status"] = $this->model_htmldata->successMsg("Car  Added Successfully");
    //     } elseif ($stat == "delete") {
    //         $data["status"] = $this->model_htmldata->successMsg("Car Deleted Successfully");
    //     }
    //     $data["cat"] = $this->model_getvalues->getTableRows("make", "make_id !=", "0", "name", "asc");
    //     $data["model"] = $this->model_getvalues->getTableRows("model", "model_id !=", "0", "name", "asc");
    //     //$this->load->library("form_validation");
    //     //$this->load->helper("form");
    //     $this->form_validation->set_rules('model', 'Model', 'required');
    //     $this->form_validation->set_rules('vin', 'VIN', 'required|is_unique[cars.vin]');
        

    //     $this->form_validation->set_message('is_unique', 'This Car already exist - Duplicate VIN');
    //     if ($this->form_validation->run() == TRUE) {

    //         $make_det = $this->model_getvalues->getDetails("make", "make_id", $this->input->post("make"));
    //         $model_det = $this->model_getvalues->getDetails("model", "model_id", $this->input->post("model"));

    //         $array = array(
    //             "make" => $this->input->post("make"),
    //             "model" => $this->input->post("model"),
    //             "vin" => $this->input->post("vin"),
    //             "amount" => $this->input->post("amount"),
    //             "damage" => $this->input->post("damage"),
    //             "odometer" => $this->input->post("odometer"),
    //             "run" => $this->input->post("run"),
    //             "car_keys" => $this->input->post("key"),
    //             "airbags" => implode(',', $this->input->post("airbags")),
    //             "body" => $this->input->post("body"),
    //             "fuel" => $this->input->post("fuel"),
    //             "transmission" => $this->input->post("transmission"),
    //             //  "images" => $file_data["file_name"],
    //             "year" => $this->input->post("year"),
    //             "erc" => $this->input->post("erc"),
    //             "ctv" => $this->input->post("ctv"),
    //             "ecc" => $this->input->post("ecc"),
    //             "status" => $this->input->post("status"),
    //             "car_status" => 0,
    //             "others" => $this->input->post("others"),
    //             "cylinder" => $this->input->post("cylinder"),
    //             "link" => $this->input->post("link"),
    //             "uploader" => $this->session->userdata("a_id"),
    //             "datee" => date("Y-m-d"),
    //             "week" => date('W'),
    //             "month" => date('m'),
    //             "search_all" => $this->input->post("vin") . " " . $this->input->post("year") . " " . $make_det['name'] . " " . $model_det['name'] . " " . $this->input->post("others")
    //         );

    //         if ($this->model_insertvalues->addItem($array, 'cars')) {
    //             $lid = $this->db->insert_id();
    //                 $last_car = $this->model_getvalues->getDetails("cars", "car_id", $lid);
    //                 $new_search = $last_car['search_all']." ".$lid;
    //                 $this->model_updatevalues->updateVal2($lid, array("search_all" => $new_search), 'cars', 'car_id');
    //             redirect('admin/add_image/' . $lid);
    //         }
    //     }
    //     $this->load->view("admin/add_car", $data);
    // }
    
    
        
    public function published_car($stat = "", $search = "") {
        $this->init();
        $data['title'] = "Published Car | TCN Admin";
        $this->load->library('pagination');
        $this->load->view("admin/header", $data);
       
       if ($stat == "published") {
            $data["status"] = $this->model_htmldata->successMsg("Car has been Published succesfully");
        } elseif ($stat == "approved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Approved succesfully");
        } elseif ($stat == "deleted") {
            $data["status"] = $this->model_htmldata->successMsg("Car has been deleted succesfully");
        } else {
            $data["status"] = "";
        }
        
         $this->form_validation->set_rules('txtSearch', 'Search', 'required');

        if ($this->form_validation->run()) {
            redirect('admin/published_car/search/' . $this->input->post("txtSearch"));
        }

        
        if ($search == "") {

            $config['base_url'] = base_url() . 'admin/published_car/';
            $config['total_rows'] = $this->model_getvalues->getCount("cars", "car_status", 1);
            $config['per_page'] = 20;
            $config['full_tag_open'] = '<div class="pagination_cust">';
            $config['full_tag_close'] = '</div>';
            $config['next_link'] = '&gt;';
            $config['prev_link'] = '&lt;';

            // if ($stat == "") {
            //     $data["s"] = 0;
            // } else {
            //     $data["s"] = $stat;
            // }





            $this->pagination->initialize($config);

            $data["pagi"] = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $stat);

            $data["products"] = $this->model_getvalues->getTableRows("cars", "car_status", 1, 'car_id', 'desc');
        } else {


            $data["s"] = 0;
            $data["pagi"] = "";
            $data["products"] = $this->model_getvalues->searchValWhere("cars", "search_all", $search, "car_status", 1, "car_id", "desc");
        }

         $data['h'] = 'Published Cars';


        $data['product_num'] = $this->model_getvalues->getCount("cars", "car_status", 1);


        $this->load->view("admin/publish_car", $data);
    }
    
    

    
    public function unpublished_car($stat = "", $search = "") {

        $this->init();
        $data['title'] = "Published Car | TCN Admin";
        $this->load->library('pagination');
        $this->load->view("admin/header", $data);
        if ($stat == "unpublished") {
            $data["status"] = $this->model_htmldata->successMsg("This Car has been Unpublished succesfully");
        } elseif ($stat == "approved") {
            $data["status"] = $this->model_htmldata->successMsg("Product has been Approved succesfully");
        } elseif ($stat == "deleted") {
            $data["status"] = $this->model_htmldata->successMsg("Car has been deleted succesfully");
        } else {
            $data["status"] = "";
        }

        $this->form_validation->set_rules('txtSearch', 'Search', 'required');

        if ($this->form_validation->run()) {
            redirect('admin/unpublished_car/search/' . $this->input->post("txtSearch"));
        }

        if ($search == "") {

            $config['base_url'] = base_url() . 'admin/unpublished_car/';
            $config['total_rows'] = $this->model_getvalues->getCount("cars", "car_status", 0);
            $config['per_page'] = 20;
            $config['full_tag_open'] = '<div class="pagination_cust">';
            $config['full_tag_close'] = '</div>';
            $config['next_link'] = '&gt;';
            $config['prev_link'] = '&lt;';

            // if ($stat == "") {
            //     $data["s"] = 0;
            // } else {
            //     $data["s"] = $stat;
            // }





            $this->pagination->initialize($config);

            $data["pagi"] = $this->pagination->create_links();

            $this->db->limit($config['per_page'], $stat);

            $data["products"] = $this->model_getvalues->getTableRows("cars", "car_status", 0, 'car_id', 'desc');
        } else {


            $data["s"] = 0;
            $data["pagi"] = "";
            $data["products"] = $this->model_getvalues->searchValWhere("cars", "search_all", $search, "car_status", 0, "car_id", "desc");
        }



        $data['h'] = 'Unpublished Cars';


        $data['product_num'] = $this->model_getvalues->getCount("cars", "car_status", 0);

        $this->load->view("admin/unpublish_car", $data);
    }
    
    
    

    public function fetchModel($a) {
        $model = $this->model_getvalues->getTableRows("model", "make_id", $a, "name", "asc");

        // $teacher_courses = explode("`|", $teacher['courses']);

        $v = '
                                <div>


                                 <label>Model</label>
                                     
                                    
                                    <select class="form-control" name="model" id="Model"  required>
                                    <option value="">Select Model</option>

                                    ';

        foreach ($model as $model) {

            $v .= '<option value="' . $model->model_id . '">' . $model->name . '</option>';
        }

        $v .= '</select>
                                </div>';

        echo $v;
    }

    public function add_image($a, $stat = "") {
        $this->init();
        $data['title'] = "Add Images | Blockgator Admin";
        $this->load->view("admin/header", $data);
        $data["status"] = "";
        $data["token"] = "";
        $data["a"] = $a;
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Image  Added Successfully");
        } elseif ($stat == "delete") {
            $data["status"] = $this->model_htmldata->successMsg("Car Deleted Successfully");
        }


        $data["car_det"] = $this->model_getvalues->getDetails("cars", "car_id", $a);
        $data["model_det"] = $this->model_getvalues->getDetails("model", "model_id", $data["car_det"]["model"]);
        $data["make_det"] = $this->model_getvalues->getDetails("make", "make_id", $data["car_det"]["make"]);

        $data["car_image"] = $this->model_getvalues->getDetails("cars", "car_id", $a);

        $this->load->view('admin/add_images', $data);
    }

    public function upload_img($a, $x) {

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

            redirect('admin/add_image/' . $a . '/success');
            //}
        }
    }

    public function add_plan($stat = "") {
        $this->init();
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("New Plan Added");
        } else {
            $data["status"] = "";
        }
        $this->load->library("form_validation");
        $this->form_validation->set_rules('txtPlan', 'Plan', 'required|trim|xxx_clean|is_unique[plans.name]');
        if ($this->form_validation->run()) {
            $arr = array("name" => $this->input->post("txtPlan"),
                "max_emp" => $this->input->post("txtNum"),
                "months" => $this->input->post("txtMonths"),
                "price" => $this->input->post("txtPrice"));

            $this->model_insertvalues->addItem($arr, "plans");
            redirect('admin/add_plan/success');
        }
        $this->load->view("admin/add_plan", $data);
    }

    public function edit_plans($stat = "") {
        $this->init();
        $this->load->file(FCPATH . 'ajaxfw.php');
        $ajax = ajax();
        if ($stat == "edited") {
            $data["status"] = $this->model_htmldata->successMsg("Plan has been edited");
            
        } elseif ($stat == "deleted") {
            $data["status"] = $this->model_htmldata->successMsg("Plan Deleted");
            
        } elseif ($stat == "activated") {
            $data["status"] = $this->model_htmldata->successMsg("Plan has been Activated");
            
        } elseif ($stat == "deactivated") {
            $data["status"] = $this->model_htmldata->successMsg("Plan has been Deactivated");
            
        } else {
            $data["status"] = "";
            $data["cj"] = true;
        }

        $data["s"] = 0;
        $data["plans"] = $this->model_getvalues->getTableRows("plans", "id !=", '0', 'id');
        $this->load->view("admin/edit_plans", $data);
    }

    public function save_plan($id) {
        $arr = array("name" => $this->input->post("txtPlan"),
            "price" => $this->input->post("txtPrice"),
            "months" => $this->input->post("txtMonths"),
            "max_emp" => $this->input->post("txtNum"));
        if ($this->model_updatevalues->updateVal2($id, $arr, 'plans', 'id')) {
            redirect('admin/edit_plans/edited');
        }
    }

    public function change_coy_plan($id) {
        $arr = array("plan" => $this->input->post("ddlPlan"));
        if ($this->model_updatevalues->updateVal2($id, $arr, 'company', 'id')) {
            redirect('admin/companies/edited');
        }
    }

    public function change_coy_exp($id) {
        $arr = array("exp_date" => $this->input->post("txtDate"));
        if ($this->model_updatevalues->updateVal2($id, $arr, 'company', 'id')) {
            redirect('admin/companies/edited/');
        }
    }

    public function delete_make($x) {
        $this->load->model("model_deletevalues");
        $data = array("make_id" => $x);
        $this->model_deletevalues->delItem($data, "make");

        redirect('admin/make/delete');
    }

    public function delete_model($x) {
        $this->load->model("model_deletevalues");
        $data = array("model_id" => $x);
        $this->model_deletevalues->delItem($data, "model");

        redirect('admin/model/delete');
    }
    
     public function delete_car($x) {
        $this->load->model("model_deletevalues");
        $data = array("car_id" => $x);
        $this->model_deletevalues->delItem($data, "cars");

        redirect('admin/published_car/deleted');
    }

    public function delete_car2($x) {
        $this->load->model("model_deletevalues");
        $data = array("car_id" => $x);
        $this->model_deletevalues->delItem($data, "cars");

        redirect('admin/unpublished_car/deleted');
    }

    public function delete_order($x) {
        $this->load->model("model_deletevalues");
        $data = array("order_id" => $x);
        $this->model_deletevalues->delItem($data, "orders");

        redirect('admin/orders/deleted');
    }
    
    public function delete_invoice($x) {
        $this->load->model("model_deletevalues");
        $data = array("invoice_id" => $x);
        $this->model_deletevalues->delItem($data, "invoices");

        redirect('admin/invoices/deleted');
    }

    public function delCar($x) {
        $this->load->model("model_deletevalues");
        $data = array("car_id" => $x);
        $this->model_deletevalues->delItem($data, "cars");

        redirect('admin/cars/deleted');
    }

    public function settings($stat = "") {
        $this->init();
        $data['s'] = 0;
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Activation Successful");
        } elseif ($stat == "deactivated") {
            $data["status"] = $this->model_htmldata->successMsg("Deactivation Successful");
        } elseif ($stat == "updated") {
            $data["status"] = $this->model_htmldata->successMsg("Bank Details Updated");
        } else {
            $data["status"] = "";
        }
        $data["gateways"] = $this->model_getvalues->getTableRows("payment_gateway", "id !=", '0', 'id', 'desc');
        $data["bank"] = $this->model_getvalues->getDetails("payment_gateway", "id", '1', "id");
        $data["cash"] = $this->model_getvalues->getDetails("payment_gateway", "id", '2', "id");
        $data["inter"] = $this->model_getvalues->getDetails("payment_gateway", "id", '3', "id");

        $this->load->library("form_validation");
        $this->form_validation->set_rules('txtBankDetails', 'Bank Details', 'required');
        if ($this->form_validation->run()) {
            $arr = array("details" => $this->input->post('txtBankDetails'));
            $this->model_updatevalues->updateVal2('1', $arr, "payment_gateway", "id");
            redirect('admin/settings/updated');
        }

        $this->load->view("admin/settings", $data);
    }

    public function deactivate_payment($id) {
        $arr = array("status" => 'Inactive');
        if ($this->model_updatevalues->updateVal2($id, $arr, 'payment_gateway', 'id')) {
            redirect('admin/settings/deactivated');
        }
    }

    public function activate_payment($id) {
        $arr = array("status" => 'Active');
        if ($this->model_updatevalues->updateVal2($id, $arr, 'payment_gateway', 'id')) {
            redirect('admin/settings/success');
        }
    }

    public function email_templates($stat = "") {
        $this->init();
        $data["d"] = "";
        if ($stat == "updated") {
            $data["status"] = $this->model_htmldata->successMsg("Email template updated");
        } else {
            $data["status"] = "";
        }
        $this->load->file(FCPATH . 'ajaxfw.php');
        $ajax = ajax();
        $ajax->change('ddlTemplate', $ajax->call('../ajax.php?response/admin_template/|ddlTemplate|'));

        $this->load->library("form_validation");
        $this->form_validation->set_rules('txtBody', 'Email Body', 'required|xxx_clean');
        if ($this->form_validation->run()) {
            $array = array("body" => $this->input->post('txtBody'));
            if ($this->model_updatevalues->updateVal2($this->session->userdata('temp_id'), $array, 'admin_email_templates', 'id')) {
                redirect('admin/email_templates/updated');
            }
        }

        $this->load->view('email_template', $data);
    }

    public function payments($stat = "") {
        $this->init();
        if ($stat == "confirmed") {
            $data["status"] = $this->model_htmldata->successMsg("Bank Payment confirmed");
        } elseif ($stat == "deleted") {
            $data["status"] = $this->model_htmldata->successMsg("Plan Deleted");
        } else {
            $data["status"] = "";
        }

        $data["s"] = 0;
        $data["bank_payments"] = $this->model_getvalues->getTableRows("payments", "type", 'Bank Transfer', 'id');
        $data["ce_payments"] = $this->model_getvalues->getTableRows("payments", "type", 'Cashenvoy', 'id');
        $this->load->view("admin/payments", $data);
    }

    public function confirm_payment($id) {
        $date = date("Y-m-d");
        $arr = array("status" => 'Successful', "confirmed_date" => $date);

        $pay_det = $this->model_getvalues->getDetails("payments", "id", $id, "id");
        $coy = $this->model_getvalues->getDetails("company", "id", $pay_det['coy_id'], "id");
        if ($this->model_updatevalues->updateVal2($id, $arr, 'payments', 'id')) {
            $msg = '<p>Hello, your payment for company plan upgrade was successful and your company plan has been upgraded succesfully</p>';
            $this->model_htmldata->sendMail($coy['email'], $msg, 'Company plan change');
            $arr1 = array("plan" => $pay_det['requested_plan']);
            $this->model_updatevalues->updateVal2($pay_det['coy_id'], $arr1, 'company', 'id');
            redirect('admin/payments/confirmed');
        }
    }

    public function courses($stat = "") {
        $this->init();
        $data["status"] = "";
        $data["s"] = 0;
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Course Edited Successfully");
        } elseif ($stat == "deleted") {
            $data["status"] = $this->model_htmldata->successMsg("Course Deleted Successfully");
        }
        $data["cats"] = $this->model_getvalues->getTableRows("categories", "category_id !=", "0", "level_id");
        $data["courses"] = $this->model_getvalues->getTableRows("courses", "course_id !=", "0", "course_name");
        $this->load->library("form_validation");
        $this->form_validation->set_rules('txtCourseName', 'Course Name', 'required|xxx_clean');

        $this->form_validation->set_message('is_unique', 'This Category already exist');

        if ($this->form_validation->run()) {
            $level = $this->model_getvalues->getDetails("categories", "category_id", $this->input->post("ddlCategory"));
            $array = array("course_name" => $this->input->post("txtCourseName"), "category_id" => $this->input->post("ddlCategory"), "details" => $this->input->post("txtCourseDetails"), "level_id" => $level['level_id']);
            if ($this->model_insertvalues->addItem($array, 'courses')) {
                $data["status"] = $this->model_htmldata->successMsg("New course created");
            }
        }
        $data['course_count'] = $this->model_getvalues->getCount("courses", "course_id !=", "0");
        $this->load->view("admin/courses", $data);
    }

    public function upload_image($stat = "") {
        $data['title'] = "Edit Slider Image";
        $this->load->view('header', $data);
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Slider Image Edited");
        } else {
            $data["status"] = "";
        }

        $data["slider"] = $this->model_getvalues->getTableRows("slider", "id !=", "0", "id", "asc");
        $data["cats"] = $this->model_getvalues->getTableRows("portfolio_category", "id !=", "0", "id", "asc");
        $data["port_det"] = $this->model_getvalues->getDetails("cars", "car_id !=", "1", "car_id", "desc");
        $this->form_validation->set_rules('usr_files', 'Image Form', 'required');

        if ($this->form_validation->run()) {


            $array = array(
                "images" => $file_data["file_name"]
            );

            $this->model_updatevalues->updateVal('slider', $array, "id", $a);

            $config['upload_path'] = "../images/";
            $config['allowed_types'] = "jpg|jpeg|gif|JPG|JPEG|png|PNG";
            $config['overwrite'] = true;
            $config['file_name'] = rand();
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect('admin/add_images/' . $a . '/success');
            } else {
                $file_data = $this->upload->data();



                $array2 = array(
                    "first_slogan" => $this->input->post("txtTopic"),
                    "second_slogan" => $this->input->post("txtSlogan"),
                    "image" => $file_data["file_name"]
                );


                $config['image_library'] = 'gd2';
                $config['source_image'] = "../images/" . $file_data["file_name"];
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 1250;
                $config['height'] = 449;

                $this->load->library('image_lib', $config);


                $this->image_lib->resize();
            }

            if ($this->model_updatevalues->updateVal('slider', $array2, "id", $a)) {

                $data["status"] = $this->model_htmldata->successMsg("Edit succesful");
                redirect('admin/add_images' . $a . '/success');
            }
        }
        $this->load->view('admin/add_images', $data);
        $this->load->view('footer');
    }

    public function create_invoice($stat = "") {
        $this->init();
        $data['title'] = "Add Invoice | Blockgator Admin";
        $this->load->view("admin/header", $data);
        if ($stat == "success") {
            $data["status"] = $this->model_htmldata->successMsg("Invoice Created Successfully");
        } elseif ($stat == "") {
            $data["status"] = "";
        }
        $data["users"] = $this->model_getvalues->getTableRows("users", "user_id !=", "0", "fullname", "asc");
        $this->form_validation->set_rules('ddlUser', 'User', 'required');

        if ($this->form_validation->run() == TRUE) {

            $array = array(
                "user_id" => $this->input->post("ddlUser"),
                "order_id" => $this->input->post("ddlOrder"),
                "payment_amount" => $this->input->post("amount"),
                "payment_method" => $this->input->post("ddlPay"),
                "due_date" => $this->input->post("ddlDate"),
                "payment_details" => $this->input->post("txtDet")
            );
            $data['user'] = $this->model_getvalues->getDetails("users", "user_id", $this->input->post("ddlUser"));
            $order = $this->model_getvalues->getDetails("orders", "order_id", $this->input->post("ddlOrder"));

            if ($this->model_insertvalues->addItem($array, 'invoices')) {
                
                
                $res = $this->db->insert_id();

                $data['invoice'] = $this->model_getvalues->getDetails("invoices", "order_id", $this->input->post("ddlOrder"));
                $data['order'] = $this->model_getvalues->getDetails("orders", "order_id", $this->input->post("ddlOrder"));

                //Load the library
                $this->load->library('html2pdf');

                // Folder where PDF file will be saved
                $this->html2pdf->folder('./assets/pdf/');

                $invoice_name = 'invoice_' . $data['order']['order_id'] . '.pdf';

                // Name of the PDF file
                $this->html2pdf->filename($invoice_name);

                // Papper Orientation
                $this->html2pdf->paper('a4', 'portrait');

                //Load html view
                $this->html2pdf->html($this->load->view('admin/mypdf2', $data, true));

                if ($path = $this->html2pdf->create('save')) {

                    $message = '<p>This is a notice that an invoice has been generated on ' . date('jS M Y', strtotime($order['created_at'])) . '.</p>';
                    $message .= '<p>Your payment method is: ' . $this->input->post("ddlPay") . '</p>';
                    $message .= '<p>Invoice: #' . $res . ' <br />
                    Amount Due: N' . number_format($this->input->post("amount"), 2) . '<br /></p>';

                    $message .= '<p><h3>Invoice Item:</h3>' . $this->input->post("txtDet") . ' for - ' . $order["car_name"] . '</p>';

                    $message .= '<p><hr /><br />Sub Total: N' . number_format($this->input->post("amount"), 2) . ''
                            . '<br />Credit: N0.00'
                            . '<br />Sub Total: N' . number_format($this->input->post("amount"), 2) . '<br /><br /></p>';
                    $message .= '<p><a href="' . base_url() . 'users/invoices/' . $this->input->post("ddlOrder") . '"><button type="button" style="padding: 5px 20px; background-color: #2a80b9; color: #FFF; font-weight: bold; border: #FFF solid 1px">Please Click here to login and pay the Invoice</button></a></p>';

                    $this->model_htmldata->senderMailAttachPDF($data['user']['email'], $message, "Customer Invoice - " . $order['car_name'] . " ", $data['user']['fullname'], "Customer Invoice - " . $order['car_name'] . "", $path);

                    
                } else {
                    echo "NULL";
                }
                
                redirect('admin/create_invoice/success');
                
            }
        }
        $this->load->view("admin/create_invoice", $data);
    }

    public function fetchOrders($a) {
        $model = $this->model_getvalues->getTableRows("orders", "user_id", $a, "created_at", "asc");

        // $teacher_courses = explode("`|", $teacher['courses']);

        $v = '
                                <div>


                                 <label>User Orders</label>
                                     
                                    
                                    <select class="form-control" name="ddlOrder" id="Model"  required>
                                    <option value="">Select Order</option>

                                    ';

        foreach ($model as $model) {

            $v .= '<option value="' . $model->order_id . '">' . $model->order_id . '  </option>';
        }

        $v .= '</select>
                                </div>';

        echo $v;
    }
    
    public function user_profile($id) {
        $this->init();
        $data['title'] = "User Details | Blockgator Admin";
        $this->load->view("admin/header", $data);
        $data["id"] = $id;
        $data["status"] = "";
        $data["user"] = $this->model_getvalues->getDetails("users", "user_id", $id, "id");
        
        
        
        
        $this->load->view("admin/user_details", $data);
        
        
    }
    
    
    public function user_login($id) {
        $data['user'] = $this->model_getvalues->getDetails("users", "user_id", $id);
        $array = array('email' => $data['user']['email'], 'user_id' => $data['user']['user_id']);
        $data['user_login'] = $this->model_getvalues->getDetails2("users", $array);


        if($data['user_login']){
            $data = array(
            'email' => $data['user']['email'],
            'is_logged_in' => 1,
            'user_id' => $data['user']['user_id']
            );
            
            $this->session->set_userdata($data);

            redirect('users/dashboard');
            
            
        }else{
            return "NULL";
        }
        
    }
    
    
    public function publish_this_car($id) {
        $arr = array("car_status" => "1");
        if ($this->model_updatevalues->updateVal2($id, $arr, 'cars', 'car_id')) {
            redirect('/admin/published_car/published');
        }
    }

    public function unpublish_this_car($id) {
        $arr = array("car_status" => "0");
        if ($this->model_updatevalues->updateVal2($id, $arr, 'cars', 'car_id')) {
            redirect('/admin/unpublished_car/unpublished');
        }
    }

}
