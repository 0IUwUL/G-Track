<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign_Up extends CI_Controller {


	public function index()
	{
		$this->load->view('pages/sign_up');
		$this->load->view('template/footer');
	}

	public function register()
    {
        // Rules for forms
        $this->form_validation->set_rules('username','Username','required|callback_checkUserName');
        $this->form_validation->set_rules('email','Email','required|callback_checkEmail');
        $this->form_validation->set_rules('password_1','Password','required|min_length[3]|max_length[25]|callback_check_strong_password');
        $this->form_validation->set_rules('password_2', 'Confirm Password', 'required|matches[password_1]');
        $this->form_validation->set_error_delimiters('','');
        if($this->form_validation->run()===false) {
            $data["error"] =  validation_errors();
            $this->load->view("pages/sign_up");
            $this->load->view("template/footer");
        }else { // If the is forms filled up correctly
            // Get form input
            $password = $this->input->post("password_1");
            $email = $this->input->post("email");
            $username = $this->input->post("username");

            $hashedPass = password_hash($password, PASSWORD_DEFAULT); // hash the password

            // Code Generation fo email verification
            $hash = md5(rand(0,1000));  // Generate hash value
            $code = substr(str_shuffle($hash), 0, 12); // Transform it to 12 key code
            $bgColor = "rgba(255, 255, 255, 1)";
            // Place all input values from the form in an array
            $userData = array(
                'email' => $email,
				'name' => $username,
                'password' => $hashedPass,
                'code' => $code,
                'income' => 0,
                'verified' => 0,
                'image' => 'no_image.png'
              );
            $this->registration->insert_user($userData); // Pass the data and update the database
            
            // Content to be passed on email format
            $emailData = array(
            'header' => 'Verify your account',
            'username' => $username,
            'body' => 'Verify',
            'button' => 'Verify',
            'link' => base_url()."sign_up/verify/".$username."/".$code
            );
            $this->send($email, 'template/email_format', $emailData); // Call email setup function
          
            // Load email sent html to notify the user
            $this->load->view("pages/checkemail");
            $this->load->view("template/footer");
        }
    }

	public function checkUserName($username)
    {
        if ($this->registration->checkUserExist($username) == false) {
             return true;
        }else {
         $this->form_validation->set_message('checkUserName', 'Username already exists');
            return false;
        }
	}

    public function checkEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->form_validation->set_message('checkEmail', 'Invalid email format');
            return false;
        } 
       
        if ($this->registration->checkEmail($email) == false) {
             return true;
        }else {
         $this->form_validation->set_message('checkEmail', 'Email already exists');
            return false;
        }
    }

	public function check_strong_password($password){
        $this->form_validation->set_message('check_strong_password', 'The password field must be contains at least one digit, one capital and small letter.');
        if (preg_match('#[0-9]#', $password) && preg_match('#[a-z]#', $password)  && preg_match('#[A-Z]#', $password)) {
            return TRUE;
        }
        return FALSE;
    }

	// EMAIL MESSAGE SETUP
    public function send($email, $template, $emailData)
    {
        $to =  $email;
        $subject = 'Email verification';
        $from = 'thinklikblog@gmail.com';
        $password = 'qavmcxnyieabusoz'; // make it env file in the future

        // Config setup
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

        // Setup email from autoload['helper']
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);

        // Load the format and content of email
        $message=$this->email->message($this->load->view($template, $emailData, true));

        $status=$this->email->send(); // Send the email
     
    }

     // VERIFICATON OF DATA IN THE LINK
    public function verify(){
    
        //Get data from URL
        $username = $this->uri->segment(3); //get email from url
        $code = $this->uri->segment(4); //get code from url
        $data['verified'] = 1;
        $query= $this->registration->activate_acc($username, $code, $data); //check in the database
        
        // If true, inform the user in verify.php
        if ($query){
            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'title' => 'Default transaction',
                'set_default' => 1
            );
            $this->transaction->add($data);
        $this->load->view("pages/verified");
        $this->load->view("template/footer");  
        
        }else {
            echo "Invalid URL";
        }
    }
}

