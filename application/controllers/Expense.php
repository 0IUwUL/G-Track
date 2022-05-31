<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {

    public function view($id){
        //echo $this->input->post('EId');
        $infoCat['cat_details'] = $this->category->get_row($id);
        $this->load->view("template/header");
        $this->load->view("pages/expense_page", $infoCat);
        $this->load->view("template/footer");
    }

    public function Cedit(){
        $Cupdate_data = array(
            'user_id' => $this->session->userdata('user_id'),
            'title'  =>  $this->input->post('title'),
            'budget'  =>  $this->input->post('budget'),
        );
        $status = $this->category->update($this->input->post('CId'), $Cupdate_data);
    
        $infoCat['cat_details'] = $this->category->get_row($this->input->post('CId'));
        if($status)
            redirect('expense_page/'.$this->input->post('CId'));
        else
            show_error("Update Error in Database", 0, $heading = 'An Error Was Encountered');

    }

    public function Cdelete($id){
        $status = $this->category->delete($id);

        if($status)
            redirect('dashboard');
        else
            show_error("Error in Database", 0, $heading = 'An Error Was Encountered');
    }
}
