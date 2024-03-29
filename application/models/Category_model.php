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

    public function get($id, $Tid){
        $this->db->select('*');
        $this->db->from('categories');
        if($this->db->where('user_id =', $id) && $this->db->where('trans_id =', $Tid)){
            $objQuery = $this->db->get();
            return $objQuery->result_array();
        }
    }

    public function get_row($id, $Tid){
        $this->db->select('*');
        $this->db->from('categories');
        if($this->db->where('id =', $id) && $this->db->where('trans_id =', $Tid)){
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

    public function update_total($user_id, $cat_id, $value){
        $this->db->set('expensed', $value)
                ->where('id', $cat_id)
                ->where('user_id', $user_id)
                ->update('categories');
    }

    public function get_expense($id, $Tid){
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->where('expense.cat_id', $id);
        $this->db->where('expense.trans_id', $Tid);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>