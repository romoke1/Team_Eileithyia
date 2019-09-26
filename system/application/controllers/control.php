<?php 
class Control extends CI_Controller{
	public function __construct(){
		parent::__construct();
		// if (!isset($_SESSION['username'])) {
		// 	$this->session->set_flashdata("error","<div class='alert alert-danger'><h4>You Have to login to view this page</h4></div>");
		// 	redirect("control/index");
		// }
	$this->load->model('user_model');
	// $data['userData']=$this->user_model->fetch($this->session->userdata('username'));
	$this->load->view('headerS');

}
public function dashboard(){

	$this->load->view('dashboard');
}
public function profile(){
	$data['userData'] = $this->user_model->fetch($this->session->userdata('email'));
	$this->load->view('profile',$data);
}

// public function edit_profile(){
// 	$data['userData']=$this->user_model->fetch($this->session->userdata('username'));
// 	$this->load->view('edit_profile', $data);
// }


// public function changeprofile(){
// 	$this->form_validation->set_rules('firstname','Firstname', 'required|trim');
// 	$this->form_validation->set_rules('lastname','Lastname','required|trim');
// 	$this->form_validation->set_rules('number','Phone Number', 'required|trim');

// 	if ($this->form_validation->run() == TRUE) {
// 		$data = array(
// 			'firstname'=>$this->input->post('firstname'),
// 			'lastname'=>$this->input->post('lastname'),
// 			'number'=>$this->input->post('number'),
// 			'gender'=>$this->input->post('gender'),
// 			'dob'=>$this->input->post('dob'),
// 			);
// 		 $this->user_model->updateusers($data);
// 		 $correct = $this->db->update("users",$data);
// 		if ($correct) {
// 			$this->session->set_flashdata("success","<div class='alert alert-success'><h4> Profile Successfully Updated.</h4></div>");
// 			redirect("users/profile","refresh");
// 		}
// 	}
// 	else {
// 		$this->load->view('edit_profile');
// 	}
// }










public function logout(){
	unset($_SESSION);
	session_destroy();
	redirect("users/index");
}

}