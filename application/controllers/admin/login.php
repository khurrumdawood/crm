<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    private $api_key = 'AIzaSyDQ6Jqxmx65xizNCqCBCg0O0DqMP1hHjBE';

    function __construct() {
        parent::__construct();
//        parent::CI_Controller();
//        $this->load->library('session');
        $this->load->model('admin_model');
        if ($this->session->userdata('user_id')) {
//            echo $this->session->userdata('user_id');
//            exit;
//            $user_type = $this->session->userdata('user_type');
//            
//            if(!$user_type){
//                redirect('admin/login');
//            }
            
            redirect('admin/dashboard');
            
        }
    }

    function index() {
        
//        $this->layout = 'admin';
        $this->load->view('admin/login');
    }

    function auth() {
        $data = array();
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');

        $query = $this->admin_model->login($email, $pass);
//        print_r($query->row());
//        echo 'vndsknk';
//        echo $email;
//        echo $pass;
//        exit;
        if ($query->num_rows() > 0) {
            $row = $query->row();
            
            $adminSignInData = array('user_id' => $row->id,'master_id' => $row->master_id, 'adminName' => $row->username,'franchise_id' => $row->franchise_id,'company_id' => $row->company_id,'city_id' => $row->city_id,'country_id' => $row->country_id,'user_type'=> $row->type);
            $this->session->set_userdata($adminSignInData);
//            echo $this->session->userdata('user_id');exit;
            
            //if($row->type=='simple'){
                redirect(base_url() . 'index.php/admin/dashboard');
              //  }
        } else {
            redirect(base_url() . 'index.php/admin/login');
        }
    }

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */