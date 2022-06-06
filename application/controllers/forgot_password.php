<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class forgot_password extends CI_Controller{
    public function index(){
        $this->load->view('template/header');
        $this->load->view('forgot_pass');
        $this->load->view('template/footer');
    }
    private $data = array();
    
    public function forgot(){
        if(is_null($this->input->post('email'))){
            redirect('pages/forgot_pass');
        }
        else{
            $this->form_validation->set_rules('email','Email','required|callback_email_verif');
            if($this->form_validation->run()===false){
            $this->load->view("pages/forgot_pass",$this->data);
            }
            else{
                $passcode = random_int(0,999999);
                $passcode = str_pad($passcode, 6, 0, STR_PAD_LEFT);

                $email = $this->input->post('email');
                $this->forgot_password->passcode($email, $passcode); 
                $user = $this->forgot_password->get_user($email);
                $data = array(
                'header' => 'Account Password Reset:',
                'user' => $user,
               'passcode' => $passcode,
                'body' => ' You have 15 minutes before your pc self destructs. jokes aside, please submit the code beforehand.'
                 );
                $this->send($email,'template/changePass_Email',$data);
                // if(($this->session->userdata('lock_id') != 1)){
                //     $this->session->unset_userdata(array('username','user_id','email','success','logged_in'));
                // }
            }
        }
    }

    public function send($email,$template,$data){
        $to = $email;
        $subject = "You Forgot Your Password";
        $from = "thinklikblog@gmail.com";
        $password = 'qavmcxnyieabusoz';

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_timeout' => '60',
            'smtp_user' => 'thinklikblog@gmail.com',
            'smtp_pass' => $password,
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'mailtype' => 'html',
            'validation' => TRUE
        );

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);

        $message=$this->email->message($this->load->view($template, $data, true));
        $status=$this->email->send();
    }

    function email_verif($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->form_validation->set_message('email_verif', 'Invalid email format');
            return false;
        }
        if ($this->forgot_password->checkEmail($email) == false) {
             $this->form_validation->set_message('email_verif', 'Email does not exist');
             return false;
        } 
        else {
         $this->form_validation->set_message('email_verif', 'Change password link sent to your email');
            return true;
        }
    }

    public function verify(){
        $username = $this->uri->segment(3);
        $code = $this->uri->segment(4);
        $data['verified'] = 1;
        $query= $this->registration->activate_acc($username, $passcode, $data);
        
        // If true, inform the user in verify.php
        if ($query){
        $this->load->view("pages/forgot_pass_verify");
        $this->load->view("template/footer");  
        
        }else {
            echo "Invalid URL";
        }
    }

    public function pass_verify(){
        $email = $this->session->userdata('email');
        if($this->session->userdata('email') == NULL){ //if user forces to visit
            redirect("pages/forgot_pass");
        }
        else{
            $passcode = $this->input->post('passcode');
            //check if same passcode
            $query= $this->forgot_password->check_passcode($email, $passcode); 

            // If true, direct to change password
            if ($query){
                $this->session->set_userdata(array('lock_id'=>1));
               
                $this->load->view("pages/forgot_pass_change");
              
            }
            else{
                // $this->data["title"] = "Wrong passcode";
                // 
                $this->form_validation->set_rules("forgot_pass_verify","Code","callback_checkCode");
                if($this->form_validation->run() == false){
                    
                    $this->load->view("pages/forgot_pass",$this->data);
                    
                }
                else{
                    redirect("forgot_password/pass_verify");
                }
               
            }
        }
        
    }
    public function checkcode($passcode){
        if(is_null($this->ResetPassword->get_code($passcode))){
            $this->form_validation->set_message('checkcode', 'Wrong passcode');
            return false;
        }
        else{
            return true;
        }
    }
    public function forgotpass(){
        $email = $this->session->userdata('email');
        $this->form_validation->set_rules('password_1','Password','required');
        $this->form_validation->set_rules('password_2', 'Confirm Password', 'required|matches[password_1]');
            if($this->form_validation->run()===false){       
                    $this->load->view("pages/forgot_pass");     
                }
            else{
                $hashed_pass = password_hash($this->input->post("password_1"), PASSWORD_DEFAULT);
                $data = array(
                              'password' => $hashed_pass,
                            );
                $query = $this->forgot_password->change_pass($email,$data);
                if ($query){    
                    $this->load->view("pages/passwordverified");   
                        $this->session->sess_destroy();
                        }
                }
    }
}