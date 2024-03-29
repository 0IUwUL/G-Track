<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    
    public function view(){
       
        $query = $this->category->get($_SESSION['user_id'],$_SESSION['trans_id']);
       
        $reports = array(['Category', 'Expense']); // Header for the array
        foreach($query as $arr){
            // Store the category and expense as pair
            $pair[0] = $arr['title'];
            $pair[1] = (int)$arr['expensed'];
            
            // Store the collection of pairs for pie chart
            array_push($reports, $pair);
        }
        $data['reports'] = $reports;
        $header['name'] = $this->editaccount->get_name($this->session->userdata('user_id'));
        $this->load->view("template/header", $header);
        $this->load->view("pages/report", $data);
        $this->load->view("template/footer");
    }
}