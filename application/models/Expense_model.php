<?php

class Expense_model extends CI_Model{

    // Create category
    public function C_expense($data) {
        if ($this->db->insert('expense', $data)) {
            // return $this->db->insert_id(); returns last id generated
            return true;
        } else {
            return false;
        }
    }

    public function get($id){
        $this->db->select('*');
        $this->db->from('expense');
        if($this->db->where('user_id =', $this->session->userdata('user_id')) && $this->db->where('cat_id =', $id)){
            $objQuery = $this->db->get();
            return $objQuery->result_array();
        }
    }

    public function get_row($id){
        $this->db->select('*');
        $this->db->from('expense');
        if($this->db->where('id =', $id)){
            $objQuery = $this->db->get();
            return $objQuery->result_array();
        }
    }

    public function update($id, $data){
        $this->db->where('id =', $id);
        if($this->db->update('expense', $data))
            return true;
        else
          return false;
    }

    public function delete($id){
        if ($this->db->delete('expense', array('id' => $id))) {
            return true;
        }else{
            return false;
        }
    }
}

?>