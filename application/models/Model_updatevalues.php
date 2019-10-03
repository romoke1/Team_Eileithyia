<?php
	
	
	/**
	 * Model_updateValues
	 * 
	 * @package   
	 * @author hrapp
	 * @copyright Amah Gift
	 * @version 2019
	 * @access public
	 */
	class Model_updateValues extends CI_Model{
		
	
        function updatePassword($email)
        {
                $data = array(
                        "password"=>md5($this->input->post('txtNewPass'))
                );

                if($this->db->update("teachers", $data, "email = '".$email."'"))
                {
                        return true;
                }else{
                        return false;
                }
        }
	
        function updatePassword2($email)
        {
                $data = array(
                        "password"=> md5($this->input->post('txtNewPass'))
                );

                if($this->db->update("student", $data, "email = '".$email."'"))
                {
                        return true;
                }else{
                        return false;
                }
        }
		
	
        function updateVal($table, $array, $where, $id)
        {
            if($this->db->update($table, $array, "".$where." = '".$id."'"))
            {
		return true;
            }else{
		return false;
            }
        }
	
        function update_batch($data)
        {
           $count = count($data['txtCheck']);

           for($i = 0; $i< $count; $i++){
               $course_val = explode(",", $data['txtCheck'][$i]);
               $datas[] = array(
                   'user_id' => $this->session->userdata('user_id'),
                   'course_code' => $course_val[0],
                   'course_unit' => $course_val[1]
               ); 
           }
//           $this->db->where('user_id', $this->session->userdata('user_id'));
           $query = $this->db->update_batch('course_registered', $datas, 'user_id');
           if ($query) {
               return true;
           }
        }
        
        function updateVal2($id, $array, $table, $where) {
        if ($this->db->update($table, $array, "" . $where . " = " . $id . "")) {
            return true;
        } else {
            return false;
        }
    }
    
    function updateVal3($table, $array, $where, $id, $where2, $id2) {
        if ($this->db->update($table, $array, "" . $where . " = " . $id . " and " . $where2 . " = " . $id2 . "")) {
            return true;
        } else {
            return false;
        }
    }
        
       
		
		
	}
	
?>