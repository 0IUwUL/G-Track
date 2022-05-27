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
        if($page == 'dashboard'){
            $val["display"] = $this->category->get();
            $this->load->view("pages/".$page, $val);
        }
        $this->load->view("template/footer.php");
    }
}
