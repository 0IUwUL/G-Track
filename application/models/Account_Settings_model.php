<?php

class Account_Settings_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    private $errors = array();

    public function get_user($id){
        $this->db->select('*');
        $this->db->from('user');
        if($this->db->where('id =', $id)){
            $objQuery = $this->db->get();
            return $objQuery->result_array();
        }
    }

    public function get_name($id){
        $this->db->select('name');
        $this->db->from('user');
        if($this->db->where('id =', $id)){
            $objQuery = $this->db->get();
            return $objQuery->result_array();
        }
    }
    // CHECK USERNAME IN THE DATABASE
    function checkUserExist($username) {
        $this->db->select('*');
        $this->db->where('name', $username);
        $query = $this->db->get('user'); // Get username in database
        if ($query->num_rows() > 0) {
        return true;
        }
        return false; 
    }
    public function changeName($id,$data){
        $this->db->where('id =', $id );
        if( $this->db->update('user', $data))
            return true;
        else
          return false;
    }
    public function update_profile($data, $image){
        $data2 = array(
            "image" => $image
        );
        $this->db->where('id', $this->session->userdata('user_id'));
        return $this->db->update('user',$data2);
    }

}

?>