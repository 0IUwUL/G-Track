<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function input()
    {
        $category_data = array(
            'user_id'  => $this->session->userdata('user_id'),
            'title'  =>  $this->input->post('title'),
            'budget'  =>  $this->input->post('budget'),
        );

        $status = $this->category->C_category($category_data);
        
        if($status)
            redirect("dashboard");
        else
            show_error("Database error", 0, $heading = 'An Error Was Encountered');
    }
    public function edit(){
        $Cupdate_data = array(
            'user_id' => $this->session->userdata('user_id'),
            'title'  =>  $this->input->post('title'),
            'budget'  =>  $this->input->post('budget'),
        );

        $status = $this->category->update($this->input->post('CId'), $Cupdate_data);

        if($status)
            redirect("dashboard");
        else
            show_error("Update Error in Database", 0, $heading = 'An Error Was Encountered');

    }

    public function delete($id){
        $status = $this->category->delete($id);

        if($status)
            redirect('dashboard');
        else
            show_error("Error in Database", 0, $heading = 'An Error Was Encountered');
    }
}
