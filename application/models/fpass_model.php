<?php
class fpass_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    private $errors = array(); 

    public function passcode($email, $passcode) {
        $this->db->select('*');
        $this->db->where('email', $email); 
    
        $query = $this->db->get('user'); 
        if ($query->num_rows() > 0){
          $this->db->where('email', $email); 
          $hashed_pass['passcode'] = password_hash($passcode, PASSWORD_DEFAULT); // hash the password
          $this->db->update('user', $hashed_pass);  // Insert the 2FA code
    
          $this->db->where('email', $email); //find user in db
          $datetoday['codetime'] = date('Y-m-d H:i:s', time());
          $this->db->update('user', $datetoday);  // insert date today
        } 
    }

      public function get_user($email){
        $query = $this->db->get_where("user",array("email"=>$email));
        return $query->row_array()['name'];
    }

      function checkemail($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
          return true;
        }
        return false;
    }

    public function check_passcode($email, $passcode){
        $this->db->select('*');
        $this->db->where('email', $email);
      
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) { // find user email in db
          $q = $query->row_array();
          $result2 = $q['code'];
          $result3 = $q['codetime'];
          $datetimetoday = date('Y-m-d H:i:s', time());
    
          if(strtotime($datetimetoday) > strtotime($q['codetime'])+900) { //if forgot code has reached 15 minutes, return to forgot pass page
                redirect("pages/forgot");
          }
          else{
            if (password_verify($passcode, $result2)) {
              return true;
            }
            else{
              return false;
            }
          } 
        }
        else
          return false; // not in db
      }
}