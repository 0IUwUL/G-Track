<?php

class Changepass_model extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }

    private $errors = array();

    public function get_user($email){
        $query = $this->db->get_where("user",array("email"=>email));

        return $querry->row_array()['name'];
    }

    function checkEmail($email){
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        if($query->num_rows()>0){
            return true;
        }
        return false;
    }

    public function check_password($email,$hashed_pass){
        $this->db->select('*');
        $this->db->where('email', $email);

        $query = $this->db->get('user');
        if($query->num_rows()>0){
            $q = $query->row_array();
            $result = $q['password'];
        }
        else{
            if(!password_verify($hashed_pass,$result)){
                return true;
            }
            else{
                return false;
            }
        }
        return false;
    }

    public function change_password($email,$data){
        $query = $this->db->where('email', $email);
        return $this->db->update('user', $data);
    }

}