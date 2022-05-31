<?php

class Category_model extends CI_Model{

    // Create category
    public function C_category($data) {
        if ($this->db->insert('categories', $data)) {
            // return $this->db->insert_id(); returns last id generated
            return true;
        } else {
            return false;
        }
    }

    public function get(){
        $this->db->select('*');
        $this->db->from('categories');
        if($this->db->where('user_id =', $this->session->userdata('user_id'))){
            $objQuery = $this->db->get();
            return $objQuery->result_array();
        }
    }

    public function get_row($id){
        $this->db->select('*');
        $this->db->from('categories');
        if($this->db->where('id =', $id)){
            $objQuery = $this->db->get();
            return $objQuery->result_array();
        }
    }

    public function update($id, $data){
        $this->db->where('id =', $id );
        if( $this->db->update('categories', $data))
            return true;
        else
          return false;
    }

    public function delete($id){
        if ($this->db->delete('categories', array('id' => $id))) {
            return true;
        }else{
            return false;
        }
    }
}

?>