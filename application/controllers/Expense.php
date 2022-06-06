<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {

    public function view($id){
        //echo $this->input->post('EId');
        $infoCat['cat_details'] = $this->category->get_row($id);
        $infoCat['exp_details'] = $this->expense->get($id);
        $infoCat['total'] = $this->total($id, $infoCat);
        $infoCat['BudRem'] = $this->comp($infoCat);
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

    public function input($cat_id){
        $exp_data = array(
            'user_id'  => $this->session->userdata('user_id'),
            'cat_id' => $cat_id,
            'name'  =>  $this->input->post('title'),
            'cost'  =>  $this->input->post('budget'),
            'date'  =>  $this->input->post('date'),
        );

        $status = $this->expense->C_expense($exp_data);
        if($status)
            redirect('expense_page/'.$this->input->post('CId'));
        else
            show_error("Update Error in Database", 0, $heading = 'An Error Was Encountered');
    }

    public function Eedit($id){
        $Eupdate_data = array(
            'user_id' => $this->session->userdata('user_id'),
            'cat_id' => $this->input->post('CId'),
            'name'  =>  $this->input->post('title'),
            'cost'  =>  $this->input->post('budget'),
            'date' => $this->input->post('date')
        );
        
        $status = $this->expense->update($id, $Eupdate_data);
        echo $status;
        if($status)
           redirect('expense_page/'.$this->input->post('CId'));
        // else
        //     show_error("Update Error in Database", 0, $heading = 'An Error Was Encountered');

    }

    public function Ddelete($id){
        $status = $this->expense->delete($id);

        if($status)
            redirect('expense_page/'.$this->input->post('EId'));
        else
            show_error("Error in Database", 0, $heading = 'An Error Was Encountered');
    }

    public function total($cat_id, $arr){
        $sum = 0;
        foreach ($arr['exp_details'] as $counting){
            $sum+=$counting['cost'];
        }

        // Save total expense per category in the db
        $this->category->update_total($this->session->userdata('user_id'), $cat_id, $sum);

        return $sum;
    }

    public function comp($arr){
        $diff = $arr['cat_details'][0]['budget'] - $arr['total'];
        return $diff;
    }
}
