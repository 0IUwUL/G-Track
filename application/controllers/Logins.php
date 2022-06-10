<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logins extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('pages/login');
		$this->load->view('template/footer');
	}

	public function login()
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        // para mawala yung tag sa validation_error()
        $this->form_validation->set_error_delimiters('','');
        if($this->form_validation->run()===false) {
            $data["error"] =  validation_errors();
            $this->load->view("pages/login", $data);// Load body
        }else {
            // Get user login input
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Login validation 
            $data["error"]= $this->login->login_user($username,$password);
            
			if($data["error"]== "Login Success"){
				$val['tran'] = $this->transaction->get($this->session->userdata('user_id'));
				$val['default'] = $this->deft($val['tran']);
				$this->session->set_userdata('trans_id', $val['default']['id']);
				redirect("dashboard");
			}

			// Load login forms again
			$this->load->view("pages/login", $data);
			
        }
		$this->load->view("template/footer");
    }

	public function deft($arr){
        foreach ($arr as $key => $value){
            if ($value['set_default'] == 1){
                return $value;
            }
        }
    }
}
