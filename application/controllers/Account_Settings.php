<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Settings extends CI_Controller {
    private $user = null;

    public function index()
    {
        $this->load->view('upload_form', array('error' => ' ' ));
    }
    // public function updatephoto()
    // {
    //     $this->load->helper(array('form','file','url'));
    //     $this->load->library('form_validation');
    //     $config_image = array(
    //         'upload_path'   => './uploads/',
    //         'allowed_types' => 'gif|jpg|png',
    //         'max_size'      => '1024',
    //         'overwrite'     => true
    //     );
    //     $this->load->library('upload', $image);
    
    //     if($this->form_validation->run()==false and empty($_FILES['userfile']['name'][0]))
    //     {
    //         $id = $this->session->userdata('id');
    //         $userinfo = array(
    //             'error_image' => ''
    //         );
    //         $this->session->set_flashdata('flashError', 'Oops no photo selected', $userinfo);         
    //         redirect('/');
    //     }else{           
    //         $this->upload->do_upload();
    //         $data = array('upload_data' => $this->upload->data());
    //         $this->image_resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
    //         $id = $this->session->userdata('id');
    //         $this->db->where('id', $id);
    //         $query = $this->db->get('user'); 
    //         $data = array(
    //             'profile_picture' => $data['upload_data']['file_name']    
    //         );
    //         $this->db->update('user',$data,array('id'=>$id));          
    //         $this->session->set_userdata($data); 
    //         $this->session->set_flashdata('flashSuccess', 'Your photo has been updated.');
    //         redirect('/');       
    //     }       
    //     }    
    public function edit_profile(){
        // $data = $this->input->post('image');
        

        $config['upload_path'] ='./assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '500000';
        $config['max_width'] = '500000';
        $config['max_height'] = '500000';
        // $config['file_name'] = $this->session->userdata('user_id'). '_'. $_FILES['image']['name'];
        $this->load->library('upload',$config);

    if(!$this->upload->do_upload('image')){
        $errors = array('error' => $this->upload->display_errors());
        $image = 'no_image.png';
    }else{
        $image = $config['file_name'];
    }
    exit();
    $this->editaccount->update_profile($data, $image);
    redirect('Account_Settings/view');
    }
    // Edit User_Data
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
        print_r($para);
		$this->load->view('pages/account_settings',$para);
		$this->load->view('template/footer');
    }
}