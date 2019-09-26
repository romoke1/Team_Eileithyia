<?php

/**
 * Model_insertValues
 * 
 * @package hrapp
 * @author Ayodeji Adesola
 * @copyright 2014
 * @version 1.0
 * @access public
 */
class Model_insertValues extends CI_Model {

    function addItem($array, $table) {
        //echo 'ins';
        $query = $this->db->insert($table, $array);
        if ($query) {
            return true;
        } 
    }

    function addItem2($array, $table) {
        //echo 'ins';
        $query = $this->db->insert_batch($table, $array);
        if ($query) {
            return true;
        } 
    }
    
    function insert_batch($data){
        //Get No of course checked
        $count = count($data['txtCheck']);
        
        for($i = 0; $i< $count; $i++){
            $course_val = explode(",", $data['txtCheck'][$i]);
            
            $datas[] = array(
                'user_id' => $this->session->userdata('user_id'),
                'course_code' => $course_val[0],
                'course_unit' => $course_val[1]
            ); 
        }
        $query = $this->db->insert_batch('course_registered', $datas);
        if ($query) {
            return true;
        } 
    }
    

}

?>