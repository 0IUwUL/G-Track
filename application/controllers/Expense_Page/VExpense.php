<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VExpense extends CI_Controller {
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('pages/login');
		$this->load->view('template/footer');
	}

}
