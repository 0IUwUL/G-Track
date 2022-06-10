<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function input()
    {
        $category_data = array(
            'user_id'  => $this->session->userdata('user_id'),
            'title'  =>  $this->input->post('title'),
            'set_default' => $this->input->post('radio'),
        );

        $status = $this->transaction->add($category_data);
        
        if($status)
            redirect("dashboard");
        else
            show_error("Database error", 0, $heading = 'An Error Was Encountered');
    }

    public function change($id){
        if($id){
            $this->session->set_userdata('trans_id', $id);
            redirect('dashboard');
        }else
            show_error("Error in Database", 0, $heading = 'An Error had Encountered');
        
    }
}
