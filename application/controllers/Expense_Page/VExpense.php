<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VExpense extends CI_Controller {
	public function view()
	{
		$this->load->view('template/header');
		$this->load->view('pages/expense');
		$this->load->view('template/footer');
	}

}
