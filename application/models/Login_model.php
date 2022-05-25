<?php

class Login_model extends CI_Model{

    // LOGIN USER
    public function login_user($username,$password) {

        // Check the database
        $this->db->select('*');
        $this->db->where('name', $username); 
        $query = $this->db->get('user'); 

        // GUARD CLAUSE PRACTICE, no else, return in ifs

        // Check if username is in users
        if ($query->num_rows() == 0){ 
            return "Incorrect username";
        }

        // Store values from query
        $q = $query->row_array();
        $query_pass = $q['password'];
        $verified = $q['verified'];

        // Check if user is verified
        if($verified==="0"){ 
            return "Sorry your account is not verified";
        }

        // Check if password matched
        if (!password_verify($password, $query_pass)) { 
            return "Incorrect password";

        }

        // Set the session
        $user_data = array(
        'user_id' => $q["id"],
        'username' => $q["name"],
        'email' => $q["email"],
        'success' => "You are now logged in",
        'logged_in'=> true
        );

        $this->session->set_userdata($user_data);

        return "Login Success";
                    
    }
}

?>