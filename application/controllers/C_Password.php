<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Password extends CI_Controller {

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

	private $data = array();

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('change_pass');
		$this->load->view('template/footer');
	}

	public function change_password()
	{
		$email = $this->session->userdata('email');
			$this->form_validation->set_rules('password_1','Password','required|min_length[3]|max_length[25]');
			$this->form_validation->set_rules('password_2', 'Confirm Password', 'required|matches[password_1]');
			if($this->form_validation->run()===false){
				$data["error"] = validation_errors();
				redirect("pages/view/change_pass");
				
			}
			else{
				$hashed_pass = password_hash($this->input->post("password_1"), PASSWORD_DEFAULT);
				$data = array(
							'password' => $hashed_pass,
						);
				$query = $this->changepass->change_password($email,$data);
					if ($query){
						
						redirect("/");
					
						$this->session->sess_destroy();
					}
			}
	}
}