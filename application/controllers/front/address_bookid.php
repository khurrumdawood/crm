<?php

class Address_bookid extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->require_admin_login();
        $this->load->model('admin_model', 'web');
        $this->layout = 'front_admin_inner';
        $this->load->library('Datatables');
        $this->load->library('table');
        $customer_id = $this->session->userdata('customer_id');
        
        if(!$customer_id)
            redirect (base_url());
    }

    function index() {

        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'address_book';
        $data['table_text'] = 'Address Book';
        $data['no_left'] = 1;
        $data['import_csv'] = 1;
        $data['export_csv'] = 1;
        
        $data['page_text'] = 'Address<small>List of Addresses</small>';
//        $data['active_sub_link'] = 'zones';
        $data['table_url'] = base_url() . 'front/address_bookid/address_bookiddatatable/';

        $data['add_button'] = array('url' => base_url() . 'front/address_bookid/add_address_bookid', 'btn_title' => 'Add New Address');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading("Id", "Company", "Address", "Address2", "Postal Code", "Phone","Ship To", "Edit", "Delete");

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />',
                '<input type="text" name="company" placeholder="Company" class="search_init" />',
                '<input type="text" name="address" placeholder="Address" class="search_init" />',
                '<input type="text" name="address2" placeholder="Address2" class="search_init" />',
                '<input type="text" name="postal_code" placeholder="Postal Code" class="search_init" />',
                '<input type="text" name="phone" placeholder="Phone" class="search_init" />'
        );

        $this->load->view('list', $data);
    }

    function address_bookiddatatable() {
        $select = 'id,company,address,address2,city,state,postal_code,country,phone';
        $where = 'contact_id = '.$this->session->userdata('customer_id');
        $generate = $this->web->get_dt_data('', 'address_book', $where, $select);
        $generate['aaData'] = $this->admin_prepare_address_bookid($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_address_bookid($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $edit = '<a href="' . base_url() . 'front/address_bookid/edit_address_bookid/' . $data[0] . '">Edit</a>';
                $delete = '<a href="' . base_url() . 'front/address_bookid/delete_address_bookid/' . $data[0] . '" onclick="return confirm(\'Are you sure you want to delete this category?\');" >Delete</a>';
                $ship_to = '<a href="' . base_url() . 'front/comp_accounts/add_customer/' . $data[0] . '" >Ship To</a>';
                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $data[6];
                $rs[] = $data[8];
                $rs[] = $ship_to;
                $rs[] = $edit;
                $rs[] = $delete;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function add_address_bookid() {

//                    $this->form_validation->set_rules('id', 'Id', 'required');
//                    $this->form_validation->set_rules('contact_id', 'Contact', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
//        $this->form_validation->set_rules('address', 'Address', 'required');
//                    $this->form_validation->set_rules('address2', 'Address2', 'required');
//                    $this->form_validation->set_rules('city', 'City', 'required');
//                    $this->form_validation->set_rules('state', 'State/Province', 'required');
//                    $this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
//                    $this->form_validation->set_rules('country', 'Country', 'required');
//                    $this->form_validation->set_rules('phone', 'Phone', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'Address_book';
//            $data['active_sub_link'] = 'contact';
            $data['no_left'] = 1;

            $this->load->view('front/address_bookid/add', $data);
        } else {
//                        $data['id'] = $this->input->post('id');
            $data['contact_id'] = $this->session->userdata('customer_id');
            $data['company'] = $this->input->post('company');
            $data['address'] = $this->input->post('address');
            $data['address2'] = $this->input->post('address2');
            $data['city'] = $this->input->post('city');
            $data['state'] = $this->input->post('state');
            $data['postal_code'] = $this->input->post('postal_code');
            $data['country'] = $this->input->post('country');
            $data['phone'] = $this->input->post('phone');
            
//            echo '<pre>';
//            print_r($data);exit;
            $this->web->insert_data($data, 'address_book');

            redirect(base_url() . 'front/address_bookid/index');
        }
    }

    function edit_address_bookid($id = 0) {
        if ($id == 0) {
            show_404();
        }
//                    $this->form_validation->set_rules('id', 'Id', 'required');
//                    $this->form_validation->set_rules('contact_id', 'Contact', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
//        $this->form_validation->set_rules('address', 'Address', 'required');
//                    $this->form_validation->set_rules('address2', 'Address2', 'required');
//                    $this->form_validation->set_rules('city', 'City', 'required');
//                    $this->form_validation->set_rules('state', 'State/Province', 'required');
//                    $this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
//                    $this->form_validation->set_rules('country', 'Country', 'required');
//                    $this->form_validation->set_rules('phone', 'Phone', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'address_book';
//            $data['active_sub_link'] = 'contact';
            $data['no_left'] = 1;
            $data['table_text'] = 'Address Book';
            $data['page_text'] = 'Address';

            $data['address_bookid_data'] = $this->web->get_data($id, 'address_book');
            $this->load->view('front/address_bookid/edit', $data);
        } else {
//                        $data['id'] = $this->input->post('id');
//                        $data['contact_id'] = $this->input->post('contact_id');
            $data['company'] = $this->input->post('company');
            $data['address'] = $this->input->post('address');
            $data['address2'] = $this->input->post('address2');
            $data['city'] = $this->input->post('city');
            $data['state'] = $this->input->post('state');
            $data['postal_code'] = $this->input->post('postal_code');
            $data['country'] = $this->input->post('country');
            $data['phone'] = $this->input->post('phone');

            $this->web->update_data($id, 'address_book', $data);

            redirect(base_url() . 'front/address_bookid');
        }
    }

    function delete_address_bookid($id = 0) {
        if ($id == 0)
            show_404();
        $this->data = new stdClass();
        $this->web->delete_data($id, 'address_book');

        redirect(base_url() . 'front/address_bookid/');

        $this->output->enable_profiler(FALSE);
    }

}
