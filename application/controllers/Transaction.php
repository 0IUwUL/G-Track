<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function input()
    {
        $category_data = array(
            'user_id'  => $this->session->userdata('user_id'),
            'title'  =>  $this->input->post('title'),
            'set_default' => $this->input->post('radio'),
        );
        $status = $this->transaction->add($category_data);
        if($status){
            //if changing default transaction
            if($this->input->post('radio')){
                $val['tran'] = $this->transaction->get($this->session->userdata('user_id'));
                $change = $this->order($val['tran'], $status);
                $data = array(
                    'set_default' => 0
                );
                $stat = $this->transaction->update($this->session->userdata('user_id'), $change, $data);
                if($stat)
                    $this->change($status);
                else
                    show_error("Database error", 0, $heading = 'An Error Was Encountered');
            }
                redirect("dashboard");
        }
        else
            show_error("Database error", 0, $heading = 'An Error Was Encountered');
    }

    public function edit(){
        $transaction_data = array(
            'user_id'  => $this->session->userdata('user_id'),
            'title'  =>  $this->input->post('title_transaction'),
            'set_default' => $this->input->post('radio'),
        );
        $val['tran'] = $this->transaction->get($this->session->userdata('user_id'));
        if($this->input->post('radio')){
            
            $change = $this->order($val['tran'], $this->input->post('transaction'));
            $data = array(
                'set_default' => 0
            );
            $stat = $this->transaction->update($this->session->userdata('user_id'), $change, $data);
            if($stat){
                $Sstat = $this->transaction->update($this->session->userdata('user_id'), $this->input->post('transaction'), $transaction_data);
                if ($Sstat)
                    $this->change($this->input->post('transaction'));
                else
                show_error("Database error", 0, $heading = 'An Error Was Encountered');
            }else
                show_error("Database error", 0, $heading = 'An Error Was Encountered');
        }else{
            if($this->check($val['tran'], 'edit')){
                $stat = $this->transaction->update($this->session->userdata('user_id'), $this->input->post('transaction'), $transaction_data);
                if($stat)
                    redirect("dashboard");
                else
                    show_error("Database error", 0, $heading = 'An Error Was Encountered');
            }else{
                $this->load->view('template/header');
                $this->load->view('pages/error');
                $this->load->view('template/footer');
            }
            
        }
            
    }

    public function delete(){
        $val['tran'] = $this->transaction->get($this->session->userdata('user_id'));
        $val['check'] = $this->input->post('transaction');
        if($this->check($val, 'delete')){
            $status = $this->transaction->delete($this->input->post('transaction'));

            if($status)
                redirect('dashboard');
            else
                show_error("Error in Database", 0, $heading = 'An Error had Encountered');
        }else{
            $this->load->view('template/header');
            $this->load->view('pages/error');
            $this->load->view('template/footer');
        }
        
    }

    public function change($id){
        if($id){
            $this->session->set_userdata('trans_id', $id);
            redirect('dashboard');
        }else
            show_error("Error in Database", 0, $heading = 'An Error had Encountered');
        
    }

    public function order($arr ,$id){
        foreach ($arr as $key => $value){
            if ($value['set_default'] == 1 && $value['id'] != $id){
                $sub = $value['id'];
                break;
            }
        }
        return $sub;
    }

    public function order_check($arr, $mode){
        if($mode =='edit'){
            foreach ($arr as $list){
                if($list['set_default'] == 1){
                    break;
                    return true;
                }
            return false;
            }
        }else{
            foreach ($arr['tran'] as $list){
                if($list['set_default'] == 1 && $list['id'] == $arr['check']){
                    return true;
                }
                return false;
            }
        }
        
    }

    public function check($arr, $mode){
        if($mode == 'delete'){
            if(count($arr)==1)
                return false;
            elseif ($this->order_check($arr, 'delete'))
                return false;
            else
                return true;
        }else{
            if($this->order_check($arr, 'edit'))
                return true;
            else
                return false;
        }
        
    }

    
}
