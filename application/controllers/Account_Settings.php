<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Settings extends CI_Controller {
    private $user = null;
    public function editname(){

    }
    public function edit_profile(){
        $data = $this->input->post();

        $config['upload_path'] = APPATH.'../images/profile_picture';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $config['file_name'] = $this->session->userdata('user')['id']. '_'. $_FILES['profile_picture']['name'];
        $this->load->library('upload',$config);

    if(!$this->upload->do_upload('profile_picture')){
        $errors = array('error' -> $this->upload->display_errors());
    }else{
        $profile_picture = $config['file_name'];
    }

    $this->user_model->update_profile($data. $profile_picture);
    redirect('pages/');
    }
    public function change(){
        $email = $this->input->post('email');
		$userName = $this->input->post("userName");
        $income = $this->input->post("income");
        echo $email; echo $userName; echo $income;
		$data = array(
            'id' => $this->session->userdata('user_id'),
			'name' => $userName,
            'income' => $income,
            'email' => $email,
		);
		$query = $this->editaccount->changeName($this->session->userdata('user_id'),$data);
		    if ($query){			
				redirect("/");
			}
    }
    public function view(){
        $this->load->view('template/header');
        $para['saur'] = $this->editaccount->get_user($this->session->userdata('user_id'));
		$this->load->view('account_settings',$para);
		$this->load->view('template/footer');
    }
}