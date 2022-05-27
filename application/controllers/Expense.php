<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {

    public function view(){
        echo $this->input->post('EId');
        $this->load->view("template/header");
        $this->load->view("pages/expense_page");
        $this->load->view("template/footer");
    }
}
