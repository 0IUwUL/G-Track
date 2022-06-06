<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function view($page ='dashboard')
    {

        // APPPATH - ROOT FOLDER
        //THIS IF CHECK IF WE HAVE FOLDER PAGES IN THE VIEW AND IF IT HAS PAGES FOLDER THEN FIND A SPECIFIC
        // PHP FILE

        if(!file_exists(APPPATH."views/pages/".$page.".php")) {
           show_404();
        }

        $this->load->view("template/header.php");
        $hold = array();
        $j=0;
        if($page == 'dashboard'){
            $val["display"] = $this->category->get();

            // for displaying expenses per category
            foreach ($val['display'] as $items){
                $hold = $this->category->get_expense($items['id']);
                array_push($val['display'][$j], $hold);
                $j+=1;
            }
            $val['total'] = $this->total($val['display']);
            $val['budget'] = $this->remaining($val);
            // getting all expenses under the current user
            $val['transaction'] = $this->expense->get_transaction($this->session->userdata('user_id'));
            $this->load->view("pages/".$page, $val);
        }else
            $this->load->view("pages/".$page); 
        $this->load->view("template/footer.php");
    }

// Can be used for settings and report page
    public function Nav($hold){
        $this->load->view("template/header");
        $this->load->view("pages/".$hold);
        $this->load->view("template/footer");
    }

    public function total($arr){
        $sum = 0;
        foreach ($arr as $items){
            $sum += $items['expensed'];
        }
        return $sum;
    }

    public function remaining($arr){
        $bud = 0;
        foreach ($arr['display'] as $CBud){
            $bud += $CBud['budget'];
        }
        if ($bud < $arr['total']){
            $det['color'] = "danger";
            $det['status'] = "Over Expense!";
            $det['margin'] = 5;
        }elseif ($bud == $arr['total']){
            $det['color'] = "warning";
            $det['status'] = "No budget left";
            $det['margin'] = 5;
        }else{
            $det['color'] = "secondary";
            $det['status'] = "There is some budget left";
            $det['margin'] = 4;
        }
        return $det; 
    }
}
