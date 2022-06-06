<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    
    public function view(){
       
        $query = $this->category->get();
       
        $reports = array(['Category', 'Expense']); // Header for the array
        foreach($query as $arr){
            // Store the category and expense as pair
            $pair[0] = $arr['title'];
            $pair[1] = (int)$arr['expensed'];
            
            // Store the collection of pairs for pie chart
            array_push($reports, $pair);
        }
        $data['reports'] = $reports;

        $this->load->view("template/header");
        $this->load->view("pages/report", $data);
        $this->load->view("template/footer");
    }
}