<?php
class User_model extends CI_Model{


public function reg($data){
	$this->db->insert('users', $data);
}



public function fetch($email = null ){

		if ($email) {
			$sql = "SELECT * FROM users WHERE email = ?";
			$query = $this->db->query($sql,array($email));
			if ($query->num_rows() > 0) {
				return  $query->row_array();
			}

		}

	}
	
	
	public function updateUsers($email){
		$this->db->where('email',$email);
	}

	public function activate($email){
		$mail = base64_decode($email);
		$data['status'] = 1 ;
		$this->db->update('user', $data, array('email'=> $mail) );
	}
}