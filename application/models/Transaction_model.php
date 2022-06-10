<?php

class Transaction_model extends CI_Model{

    // Create category
    public function add($data) {
        if ($this->db->insert('transaction', $data)) {
            // return $this->db->insert_id(); returns last id generated
            return $this->db->insert_id();;
        } else {
            return false;
        }
    }

    public function get($id){
        $this->db->select('*');
        $this->db->from('transaction');
        if($this->db->where('user_id =', $id)){
            $objQuery = $this->db->get();
            return $objQuery->result_array();
        }
    }

    public function update($Uid, $id, $data){
        $this->db->select('set_default');
        $this->db->where('id =', $id );
        $this->db->where('user_id =', $Uid );
        if( $this->db->update('transaction', $data))
            return true;
        else
          return false;
    }

    public function delete($id){
        if ($this->db->delete('transaction', array('id' => $id))) {
            return true;
        }else{
            return false;
        }
    }
}

?>