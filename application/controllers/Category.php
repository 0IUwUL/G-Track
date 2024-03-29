<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function input()
    {
        $category_data = array(
            'user_id'  => $this->session->userdata('user_id'),
            'title'  =>  $this->input->post('title'),
            'budget'  =>  $this->input->post('budget'),
            'trans_id' => $this->session->userdata('trans_id'),
        );

        $status = $this->category->C_category($category_data);
        
        if($status)
            redirect("dashboard");
        else
            show_error("Database error", 0, $heading = 'An Error Was Encountered');
    }
}
