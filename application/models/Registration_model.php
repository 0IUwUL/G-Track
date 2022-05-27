<?php

class Registration_model extends CI_Model{

    // REGISTER USER
    public function insert_user($user_data) {
        $this->db->insert('user',$user_data); // Insert the data in the database
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

    // CHECK IF EMAIL EXISTS
    function checkEmail($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
        return true;
        }
        return false; 
    }

    // UPDATE ACTIVE STATUS OF USER
    public function activate_acc($username,$code,$data){
        $this->db->select('*');
        $this->db->where('name', $username);    
        $this->db->where('code', $code);  
        $query = $this->db->get('user');
    
        if ($query->num_rows() > 0) {
            $this->db->where('name', $username);    
            $this->db->where('code', $code);   

            // Set the session
            $q = $query->row_array();
            $user_data = array(
            'user_id' => $q["id"],
            'username' => $q["name"],
            'email' => $q["email"],
            'success' => "You are now logged in",
            'logged_in'=> true
            );
            $this->session->set_userdata($user_data);
            
            return $this->db->update('user', $data);
        }
    }
}

?>