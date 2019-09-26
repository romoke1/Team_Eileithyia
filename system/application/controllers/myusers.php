<?php
class Users extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('header');
		$this->load->model('user_model');
		

	}

	public function index(){
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function about(){
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function service(){
		$this->load->view('service');
		$this->load->view('footer');
	}

	public function grid(){
		$this->load->view('list');
		$this->load->view('footer');
	}

	public function contact(){
		$this->load->view('contact');
		$this->load->view('footer');
	}


	public function register(){
	if (isset($_POST['submit'])) {
		$this->form_validation->set_rules('fullname','FullName','required|trim');
		$this->form_validation->set_rules('passwd','Password','required|trim|min_length[5]');
		$this->form_validation->set_rules('password2','Confirm Password','required|trim|matches[passwd]');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('phone','Phone Number','required|trim');
		$this->form_validation->set_rules('address','Contact Address','required|trim');
		$this->form_validation->set_rules('company','Your Company','required|trim');
	}
	if ($this->form_validation->run() == TRUE) {
		
		$data = array(

			'fullname'=>$this->input->post('fullname'),
			'email'=>$this->input->post('email'),
			'phone'=>$this->input->post('phone'),
			'address'=>$this->input->post('address'),
			'company'=>$this->input->post('company'),
			'passwd'=>md5($this->input->post('passwd')),
			'buyer_num' => rand(),
			);
		$correct = $this->user_model->reg($data);	
		if ($correct == TRUE) {	
		sendmail($data['email'], 'Verify Your Email', 'email_temp',$data);

		
	}
	else{
		echo validation_errors();
	}
	
	$this->load->view("home");

}

 function updateuser($email){
	$this->user_model->updateusers($email);
	$this->db->update("users",$email);
}

 function activate($email){
	$actiavated = $this->user_model->activate($email);

	if ($actiavated) {
		$this->session->set_flashdata("success","<div class='alert alert-success'><h4> Registration Successful. You can now Login</h4></div>");

		redirect("users/index");
		}
	}
}

public function login(){

	if (isset($_POST['send'])) {

			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('passwd','Password','required');
	
	if ($this->form_validation->run() == TRUE) {
 		$data = array(

			$email = $this->input->post('email'),
			$passwd = $this->input->post('passwd')
			);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('email'=>$email, 'passwd'=>$passwd, 'status'=> 1));
		$query = $this->db->get();
		$user = $query->row();

		if ($user > 0) {
			$_SESSION['user_logged'] = TRUE;
			$_SESSION['email'] = $user->email;
		redirect("control/dashboard");
		}
		else {

		
			$this->session->set_flashdata("error","<div class='alert alert-danger'><h4> Unable to Login <a 
				href='register'>Register Here</a></h4></div>");
			redirect("users/index");

		}
	}
	}
	$this->load->view('home');
}

}