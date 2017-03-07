<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller {

    private $api_key = 'AIzaSyDQ6Jqxmx65xizNCqCBCg0O0DqMP1hHjBE';

    function __construct() {
        parent::__construct();
                $this->layout = 'front_admin_inner';
//        parent::CI_Controller();
//        $this->load->library('session');
        $this->load->model('admin_model');
//        if ($this->session->userdata('customer_id')) {
//            
//            redirect('admin/dashboard');
//            
//        }
    }

    function index() {
        //$this->load->view('front/register');
        
        $this->form_validation->set_rules('email_1', 'Email', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['no_left'] = 1;

            $this->load->view('front/register',$data);
        } else {

            $data['name'] = $this->input->post('username');
            $data['email'] = $this->input->post('email_1');
            $data['password'] = $this->input->post('pass');
            $data['country_id'] = $this->input->post('country');
            $data['a_address'] = $this->input->post('address');

            $result= $this->admin_model->insert_data($data, 'customer');
            $customerSignInData = array('customer_id' => $result, 'customerName' => $data['name']);
            $this->session->set_userdata($customerSignInData);

            redirect(base_url() . 'index.php/front/comp_accounts/add_customer/');
        }
    }


}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */