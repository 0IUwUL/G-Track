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
}

?>