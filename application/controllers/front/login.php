<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    private $api_key = 'AIzaSyDQ6Jqxmx65xizNCqCBCg0O0DqMP1hHjBE';

    function __construct() {
        parent::__construct();
//        parent::CI_Controller();
//        $this->load->library('session');
        $this->layout = 'front_admin_inner';
        $this->load->model('admin_model');
        if ($this->session->userdata('customer_id')) {
//            echo $this->session->userdata('customer_id');
//            exit;
//            $user_type = $this->session->userdata('user_type');
//            
//            if(!$user_type){
//                redirect('admin/login');
//            }
            
//            redirect('admin/dashboard');
            
        }
    }

    function index() {
            $data['no_left'] = 1;
//        $this->layout = 'admin';
        $this->load->view('front/login',$data);
    }

    function auth() {
        $data = array();
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');

        $query = $this->admin_model->login_cus($email, $pass);
//        print_r($query->row());
//        echo 'vndsknk';
//        echo $email;
//        echo $pass;
//        exit;
        if ($query->num_rows() > 0) {
            $row = $query->row();
            
            $customerSignInData = array('customer_id' => $row->id, 'customerName' => $row->name);
            $this->session->set_userdata($customerSignInData);
//            echo $this->session->userdata('customer_id');exit;
            
            //if($row->type=='simple'){
                redirect(base_url() . 'index.php/front/comp_accounts/add_customer');
              //  }
        } else {
            redirect(base_url() . 'index.php/front/login');
        }
    }

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */