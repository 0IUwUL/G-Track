<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function input()
    {
        $this->load->view("template/header");

        $category_data = array(
            'user_id'  => $this->session->userdata('user_id'),
            'title'  =>  $this->input->post('title'),
            'budget'  =>  $this->input->post('budget'),
        );

        $status["success"] = $this->category->C_category($category_data);
        
        if($status)
            redirect("dashboard");
        else
            show_error("Database error", 0, $heading = 'An Error Was Encountered');
    }
}
