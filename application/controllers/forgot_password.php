<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class forgot_password extends CI_Controller{
    public function index(){
        $this->load->view('template/header');
        $this->load->view('forgot_pass');
        $this->load->view('template/footer');
    }
    public function forgotpass(){
        $this->form_validation->set_rules('email','email','required|callback_checkEmail');
        $this->form_validation->set_rules('password_1','Password','required|min_length[3]|max_length[25]|callback_check_strong_password');
        $this->form_validation->set_rules('password_2', 'Confirm Password', 'required|matches[password_1]');

        if($this->form_validation->run()===false){
            $data["error"] =  validation_errors();
            $this->load->view("template/header");
            $this->load->view("pages/view/forgot_pass");
            $this->load->view("template/footer");
        }
        else{
            $password = $this->input->post("password_1");
            $email = $this->input->post("email");
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);
            //verification code
            $length=10;
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $CLength = strlen($characters);
            $code = '';
            for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, $charactersLength - 1)];
            }          
        }
    }
}