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
            
            foreach ($val['display'] as $items){
                $hold = $this->category->get_expense($items['id']);
                array_push($val['display'][$j], $hold);
                $j+=1;
            }
            $this->load->view("pages/".$page, $val);
        }else
            $this->load->view("pages/".$page); 
        $this->load->view("template/footer.php");
    }

// Can be used for settings and report page
    public function Nav($hold){
        $this->load->view("template/header");
        $para['saur'] = $this->editaccount->get_user($this->session->userdata('user_id'));
        $this->load->view("pages/".$hold,$para);
        $this->load->view("template/footer");
    }
}
