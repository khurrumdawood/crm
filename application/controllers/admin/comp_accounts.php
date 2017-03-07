<?php

class Comp_accounts extends CI_Controller {

    private $rules = array(
        array(
            'field' => 'name',
            'label' => 'Artist Name',
            'rules' => 'trim|required'
        ),
    );

    function __construct() {
        parent::__construct();
        $this->require_admin_login();
        $this->load->model('admin_model', 'web');
        $this->layout = 'admin_inner';
        $this->load->library('table');
        $this->load->library('Datatables');

//        $this->load->library('form_validation');
//        $this->load->model('recycle_model', 'web');
        error_reporting(E_ALL);
        ini_set('display_errors', true);
    }

    function index($id = '') {
//        if($id=='')
//            show_404 ();

        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'base_rates';
        $data['is_edit_customer'] = 1;

        $data['customer_id'] = $id;

        $eid = $this->session->userdata('user_id');
//        echo $eid;exit;

        $this->form_validation->set_rules('margin', 'Margin', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['base_rates'] = $this->web->get_data('', 'employees', array('employees.id' => $eid));
            $select = array('company.*,category.*,company.id as company_id,category.id as category_id', false);
            $joins = array();
            $joins[] = array('company', 'company.id = category.company_id', 'inner');
//            $data['appointment'] = $this->web->get_data('','appointment',array('customer.create_employee_id' => $eid),$select,'','','',$joins);


            $data['companies'] = $this->web->get_data('', 'company', array('client_company_id' => $eid));
            $data['client_id'] = $eid;


            $data['employees'] = $this->web->get_data('', 'employees', array('employees.id' => $eid), '', '', '', '', '');

            if ($id != '') {
                $data['customer_rates'] = $this->web->get_data('', 'customer_base_rates', array('customer_id' => $id));

                $data['customer'] = $this->web->get_data('', 'customer', array('customer.id' => $id));


                if (empty($data['customer'])) {
                    show_404();
                }
                $data['page_text'] = 'Rates<small>Base Rates for "' . $data['customer'][0]->name . '"</small>';
            }
//            echo '<pre>';
//            print_r($data);
//            exit;


            $this->load->view('admin/comp_accounts/base_rates', $data);
        } else {
            $data = array();
            $data['base_rate'] = $this->input->post('margin');
//                        print_r($data);exit;

            $this->web->update_data($eid, 'employees', $data);
            redirect(base_url() . 'index.php/admin/comp_accounts/index/' . $id);
        }

//      $this->load->view('admin/comp_accounts/base_rates',$data);
    }

    function rate_sheet($comp_id = '', $cat_id = '', $id = '') {
        if (empty($comp_id)) {
            show_404();
        }
        if (empty($cat_id)) {
            show_404();
        }
        if (empty($id)) {
            show_404();
        }

        $data['comp_id'] = $comp_id;
        $data['cat_id'] = $cat_id;
        $data['active_link'] = 'rates';
        $data['active_sub_link'] = 'base_rates';
        $eid = $this->session->userdata('user_id');
//        echo $eid;exit;

        $where = array('employees.id' => $eid);
        $data['employees'] = $this->web->get_data('', 'employees', $where, '', '', "", "", '', "");
        $where = array('category.company_id' => $comp_id, 'category.id' => $cat_id);
        $joins = array();
        $joins[] = array('company', 'company.id =category.company_id', 'inner');
        $select = array('company.name,category.category_name', false);
        $data['company_category'] = $this->web->get_data('', 'category', $where, $select, "", "", "", $joins, "");


        $this->load->library('table');

        $margin = $this->input->post('margin_change');
        $data['margin_change'] = $margin;

        $rates = get_data_for_base_rates($comp_id, $cat_id, $margin);
        $rates['is_company_display'] = false;
        $rates['is_category_display'] = false;



        $data['data'] = prepare_base_rates_data($rates);

        $rates['is_margin'] = true;
        $data['margin_data'] = prepare_base_rates_data($rates);

//        echo '<pre>';
//        print_r($data);exit;
        $this->load->view('admin/comp_accounts/rate_sheet', $data);
    }

    function print_csv() {

        if (!$this->input->get('company_id')) {
            exit;
        }
        $comp_id = $this->input->get('company_id');
        if (!$this->input->get('category_id')) {
            exit;
        }
        $cat_id = $this->input->get('category_id');
        $margin_change = $this->input->get('margin_change');
        $i = 0;
        $results = array();
        foreach ($cat_id as $cat) {
            $company = $comp_id[$i];
            $margin = $margin_change[$i];

            $r[] = prepare_base_rates_data(get_data_for_base_rates($company, $cat, $margin));
        }

        csv_print($r);

        fclose($fh);
        exit;
    }

    function pdf() {
        $this->load->library('table');

        if (!$this->input->get('company_id')) {
            pdf_create('Empty Record', 'print');
            exit;
        }
        $comp_id = $this->input->get('company_id');
        if (!$this->input->get('category_id')) {
            pdf_create('Empty Record', 'print');
            exit;
        }
        $cat_id = $this->input->get('category_id');
        $margin_change = $this->input->get('margin_change');
//        print_r($html);exit;

        $i = 0;
        foreach ($cat_id as $cat) {
            $company = $comp_id[$i];
            $margin = $margin_change[$i];

            $r[] = prepare_base_rates_data(get_data_for_base_rates($company, $cat, $margin));
//        $results = array_merge($r,$results);
//        $i++;
        }

//        echo '<pre>';
//        print_r($r);
//        exit;
//        
        $data['r'] = $r;
        $html = $this->load->view('admin/comp_accounts/pdf_rates', $data, true);

//        echo $html;
//        exit;   
        pdf_create($html, 'print');
        exit;
    }

//    function contact() {
//        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
//        $data['active_link'] = 'comp_accounts';
//        $data['table_text'] = 'Contacts';
//        $data['page_text'] = 'Contacts<small>List of Contacts</small>';
//        $data['active_sub_link'] = 'manage_contacts';
//        $data['table_url'] = base_url() . 'admin/comp_accounts/datatable_contact';
//
//        $data['add_button'] = array('url' => base_url() . 'admin/comp_accounts/add_contact', 'btn_title' => 'Add New Contact');
//
//        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');
//
//        $this->table->set_template($tmpl);
//
//        $this->table->set_heading('id', 'Area', 'Sales Rep', 'Potential Customer', 'Actions');
//
//        $this->table->set_footer(
//                '<input type="text" name="id" placeholder="Id" class="search_init" />'
//                , '<input type="text" name="area" placeholder="Area" class="search_init" />'
//                , '<input type="text" name="sales_rep" placeholder="Sales Rep" class="search_init" />'
//                , '<input type="text" name="potential" placeholder="Potential Customer" class="search_init" />'
//        );
//
//        $this->load->view('admin/list', $data);
//    }
//
//    function datatable_contact() {
////      $select= array('customer.id as cus_id,customer.name,customer.phone,appointment.*', false);
////        $joins = array();
////        $joins[] = array('customer','customer.id = appointment.customer_id','inner');
////        
////        echo 'asdf';exit;
//        $eid = $this->session->userdata('user_id');
////       $data['appointment'] = $this->web->get_data('','appointment',array('customer.create_employee_id' => $eid),$select,'','','',$joins);
//
//
//        $select = 'id, area, employee_id, is_potential';
//
//        $generate = $this->web->get_dt_data('', 'customer', array('create_employee_id' => $eid, 'contact_customer' => 'contact'), $select);
////        print_r($generate);
//        $generate['aaData'] = $this->admin_prepare_contact($generate['aaData']);
//        echo json_encode($generate);
//        exit;
//    }
//
//    function admin_prepare_contact($datas) {
//        $re = array();
//
//        if (is_array($datas)) {
//
//            foreach ($datas as $data) {
//                $rs = array();
//
//                $action = '<a href="' . base_url() . 'admin/comp_accounts/edit_contact/' . $data[0] . '">Edit</a> &nbsp; |  &nbsp;';
//                $action .= '<a href="' . base_url() . 'admin/comp_accounts/delete_contact/' . $data[0] . '">Delete</a>';
//                $employee = $this->web->get_data('', 'employees', array('employees.id' => $data[2]));
//
//                $rs[] = $data[0];
//                $rs[] = $data[1];
//
//                $rs[] = $employee[0]->firstname . ' ' . $employee[0]->lastname;
//                if ($data[3] == 1) {
//                    $potential = '<div class="label label-success">Potential Customer </div>';
//                } else {
//                    $potential = ' ';
//                }
//                $rs[] = $potential;
////                $rs[] = date("jS F Y", strtotime($data[2]));
//                $rs[] = $action;
//
//                array_push($re, $rs);
//            }
//        } else {
//            $re = '';
//        }
//        return $re;
//    }
//
//    function add_contact() {
//        $data['active_link'] = 'comp_accounts';
//        $data['active_sub_link'] = 'manage_contacts';
//
//
//
//        $this->form_validation->set_rules('sales_rep', 'Sales Rep', 'required');
//        if ($this->form_validation->run() == FALSE) {
//            $data['active_link'] = 'comp_accounts';
//            $data['active_sub_link'] = 'manage_contacts';
//            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
//            $data['table_text'] = 'Add Contact';
//            $data['page_text'] = 'Contact';
//            $this->load->view('admin/comp_accounts/add_contact', $data);
//        } else {
//            $data = array();
//            $eid = $this->session->userdata('user_id');
//            $data['area'] = $this->input->post('area');
//            $data['employee_id'] = $this->input->post('sales_rep');
//            $data['create_employee_id'] = $eid;
//            if ($this->input->post('potential'))
//                $data['is_potential'] = 1;
//            $data['contact_customer'] = 'contact';
//
//            $this->web->insert_data($data, 'customer');
//
//            redirect(base_url() . 'index.php/admin/comp_accounts/contact/');
//        }
//    }
//
//    function edit_contact($id) {
//        $data['active_link'] = 'comp_accounts';
//        $data['active_sub_link'] = 'manage_contacts';
//
//
//        $this->form_validation->set_rules('sales_rep', 'Sales Rep', 'required');
//        if ($this->form_validation->run() == FALSE) {
//            $data['active_link'] = 'comp_accounts';
//            $data['active_sub_link'] = 'manage_contacts';
//            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
//            $data['table_text'] = 'Edit Contact';
//            $data['page_text'] = 'Contact';
//
//            $data['contact'] = $this->web->get_data('', 'customer', array('customer.id' => $id));
//            $this->load->view('admin/comp_accounts/edit_contact', $data);
//        } else {
//            $data = array();
//            $eid = $this->session->userdata('user_id');
//            $data['area'] = $this->input->post('area');
//            $data['employee_id'] = $this->input->post('sales_rep');
//            $data['create_employee_id'] = $eid;
//            if ($this->input->post('potential'))
//                $data['is_potential'] = 1;
//
//
//            $this->web->update_data($id, 'customer', $data);
//
//            redirect(base_url() . 'index.php/admin/comp_accounts/contact/');
//        }
//    }

    function customer() {
        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'comp_accounts';
        $data['table_text'] = 'Customers';
        $data['no_left'] = 1;
        $data['page_text'] = 'Customers<small>List of Customers</small>';
        $data['active_sub_link'] = 'manage_customers';
        $data['table_url'] = base_url() . 'admin/comp_accounts/datatable_customer';

        $data['add_button'] = array('url' => base_url() . 'admin/comp_accounts/add_customer', 'btn_title' => 'Add New Customer');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('Id', 'Customer_no', 'Submit Date', 'Activation Date', 'Reporting Setup', 'Carrier Setup', 'Actions');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="submit" placeholder="Submit Date" class="search_init" />'
                , '<input type="text" name="activation" placeholder="Activation Date" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function datatable_customer() {
        $eid = $this->session->userdata('user_id');
        $where = '';
        if ($this->session->userdata('user_type') == 'company') {
//            $employees_data = $this->web->get_data('', 'employees', array('company_id' => $eid, 'type' => 'employee'));
//            $employees_ids = fetch_single_element_from_array($employees_data, 'id');
//            $employees_ids = implode("','", $employees_ids);
//            $employees_ids = "'" . $employees_ids . "'";
//                    print_r($employees_ids);exit;

//            $where = "(company_id = $eid OR employee_id in ($employees_ids)) AND contact_customer = 'customer'";
            $where = "(company_id = $eid) AND contact_customer = 'customer'";
        }
        if ($this->session->userdata('user_type') == 'employee') {
            $where = array('employee_id' => $eid, 'contact_customer' => 'customer');
        }
        $select = 'id, customer_no, submit_date,activation_date';
        $generate = $this->web->get_dt_data('', 'customer', $where, $select);
//        print_r($generate);
        $generate['aaData'] = $this->admin_prepare_customer($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_customer($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $action = '<a href="' . base_url() . 'admin/comp_accounts/edit_customer/' . $data[0] . '">Edit</a> &nbsp; |&nbsp;';
                $action .= '<a href="' . base_url() . 'admin/comp_accounts/delete_customer/' . $data[0] . '">Delete</a>';
                $reporting = '<a href="' . base_url() . 'admin/comp_accounts/customer_reporting/' . $data[0] . '">view</a>';
                $carrier = '<a href="' . base_url() . 'admin/comp_accounts/customer_carrier/' . $data[0] . '">View</a>';

                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $reporting;
                $rs[] = $carrier;
//                $rs[] = date("jS F Y", strtotime($data[2]));
                $rs[] = $action;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function customer_reporting($id) {
        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'comp_accounts';
        $data['table_text'] = 'Customers';
        $data['page_text'] = 'Customers<small>Reporting Setup Detail</small>';
        $data['active_sub_link'] = 'manage_customers';
        $data['table_url'] = base_url() . 'admin/comp_accounts/datatable_customer_reporting/' . $id;

//        $data['add_button'] = array('url' => base_url() . 'admin/comp_accounts/add_customer', 'btn_title' => 'Add New Customer');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('Id', 'Registration #', 'VAT #', 'Previous Carrier', 'Customer Group', 'Area', 'Industry', 'Sales Rep');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="submit" placeholder="Registration" class="search_init" />'
                , '<input type="text" name="vat" placeholder="VAT" class="search_init" />'
                , '<input type="text" name="carrier" placeholder="Carrier" class="search_init" />'
                , '<input type="text" name="customer_group" placeholder="Customer Group" class="search_init" />'
                , '<input type="text" name="area" placeholder="Area" class="search_init" />'
                , '<input type="text" name="industry" placeholder="Industry" class="search_init" />'
                , '<input type="text" name="sales_rep" placeholder="Sales Rep" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function datatable_customer_reporting($id) {

        $eid = $this->session->userdata('user_id');

        $select = 'id, registrotion, vat,previous_carrier,customer_group,area,industry,employee_id';

        $generate = $this->web->get_dt_data('', 'customer', array('customer.id' => $id, 'contact_customer' => 'customer'), $select);
//        print_r($generate);
        $generate['aaData'] = $this->admin_prepare_customer_reporting($generate['aaData'], $id);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_customer_reporting($datas, $id) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();


                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];
                $rs[] = $data[5];
                $rs[] = $data[6];

                $employee = $this->web->get_data('', 'employees', array('employees.id' => $data[7]));
                $rs[] = $employee[0]->firstname . ' ' . $employee[0]->lastname;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function customer_carrier($id) {
        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'comp_accounts';
        $data['table_text'] = 'Customers';
        $data['page_text'] = 'Customers<small>Carrier Setup Detail</small>';
        $data['active_sub_link'] = 'manage_customers';
        $data['table_url'] = base_url() . 'admin/comp_accounts/datatable_customer_carrier/' . $id;

//        $data['add_button'] = array('url' => base_url() . 'admin/comp_accounts/add_customer', 'btn_title' => 'Add New Customer');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('Id', 'Dhl Account', 'DHL Inbound Account', 'FedEx Outbound ', 'FedEx Inbound', 'UPS Account', 'UPS Zip', 'Other UPS Account', 'UK Mail Account', 'Rejection Note');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="submit" placeholder="dhl" class="search_init" />'
                , '<input type="text" name="vat" placeholder="Inbound" class="search_init" />'
                , '<input type="text" name="carrier" placeholder="Fedex Outbound" class="search_init" />'
                , '<input type="text" name="customer_group" placeholder="Fedex Inbound" class="search_init" />'
                , '<input type="text" name="area" placeholder="Ups" class="search_init" />'
                , '<input type="text" name="industry" placeholder="UPS Zip" class="search_init" />'
                , '<input type="text" name="sales_rep" placeholder="Other UPS" class="search_init" />'
                , '<input type="text" name="sales_rep" placeholder="UK Mail" class="search_init" />'
                , '<input type="text" name="sales_rep" placeholder="Note" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function datatable_customer_carrier($id) {

        $eid = $this->session->userdata('user_id');

        $select = 'id, dhl_account_no,dhl_inbound_account_no,fedex_outbound, fedex_inbound,ups_account,associated_ups_zip,other_ups_account,uk_mail_account,rejection_note';

        $generate = $this->web->get_dt_data('', 'customer', array('customer.id' => $id, 'contact_customer' => 'customer'), $select);
//        print_r($generate);
        $generate['aaData'] = $this->admin_prepare_customer_carrier($generate['aaData'], $id);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_customer_carrier($datas, $id) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();


                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];
                $rs[] = $data[5];
                $rs[] = $data[6];
                $rs[] = $data[7];
                $rs[] = $data[8];
                $rs[] = $data[9];

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function add_customer() {
        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'manage_customer';


        $this->form_validation->set_rules('customer_no', 'Customer #', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'comp_accounts';
            $data['active_sub_link'] = 'manage_customer';
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['table_text'] = 'Add Customer';
            $data['page_text'] = 'Customer';
            $data['no_left'] = 1;

            $this->load->view('admin/comp_accounts/add_customer', $data);
        } else {
            $data = array();
            $eid = $this->session->userdata('user_id');

            $data['customer_no'] = $this->input->post('customer_no');
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['password'] = random_string('alnum', 10);

            $submit_date = $this->input->post('submit_date');
            $data['submit_date'] = date('Y-m-d', strtotime($submit_date));

            $activation_date = $this->input->post('activation_date');
            $data['activation_date'] = date('Y-m-d', strtotime($activation_date));

            if ($this->input->post('active_inactive'))
                $data['active_inactive'] = 1;

            $data['previous_carrier'] = $this->input->post('previous_carrier');
            $data['customer_group'] = $this->input->post('customer_group');

            $data['area'] = $this->input->post('area');
            $data['industry'] = $this->input->post('industry');
            if($this->input->post('sales_rep')){
                $data['employee_id'] = $this->input->post('sales_rep');
            }else{
                $data['employee_id'] = $eid;
            }
            $data['registrotion'] = $this->input->post('registration');

            $data['vat'] = $this->input->post('vat');
            $data['dhl_account_no'] = $this->input->post('dhl_account_no');

            if ($this->input->post('req_new_dhl'))
                $data['req_new_dhl'] = 1;

            $data['dhl_inbound_account_no'] = $this->input->post('dhl_inbound_account_no');

            $data['fedex_outbound'] = $this->input->post('fedex_outbound');

            if ($this->input->post('req_new_fedex_outbound'))
                $data['req_new_fedex_outbound'] = 1;

            $data['fedex_inbound'] = $this->input->post('fedex_inbound');
            $data['ups_account'] = $this->input->post('ups_account');
            $data['associated_ups_zip'] = $this->input->post('associated_ups_zip');
            $data['other_ups_account'] = $this->input->post('other_ups_account');
            $data['uk_mail_account'] = $this->input->post('uk_mail_account');

            if ($this->input->post('req_uk_mail_account'))
                $data['req_uk_mail_account'] = 1;

            if ($this->input->post('enable_uk_mail'))
                $data['enable_uk_mail'] = 1;

            $data['rejection_note'] = $this->input->post('rejection_note');

            $data['contact_customer'] = 'customer';
            if ($this->session->userdata('user_type') == 'company') {
                $data['create_employee_id'] = $eid;
                $data['company_id'] = $eid;
                $data['franchise_id'] = get_sub_company_id($eid);
            }
            if ($this->session->userdata('user_type') == 'employee') {
                $data['create_employee_id'] = $eid;
//                $data['employee_id'] = $eid;
                $data['company_id'] = get_companyof_employee($eid);
                $data['franchise_id'] = get_subcompanyof_employee($eid);
            }

            $this->web->insert_data($data, 'customer');

            send_email_to_customer($data);

            redirect(base_url() . 'index.php/admin/comp_accounts/customer/');
        }
    }

    function edit_customer($id) {
        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'account_setup';

        $data['is_edit_customer'] = 1;
        $data['customer_id'] = $id;


        $this->form_validation->set_rules('customer_no', 'Customer #', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['customer'] = $this->web->get_data('', 'customer', array('customer.id' => $id));
            if (empty($data['customer']))
                show_404();




            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['table_text'] = 'Edit Customer';
            $data['page_text'] = 'Setup<small>Account setup of "' . $data['customer'][0]->name . '"</small>';

            $this->load->view('admin/comp_accounts/edit_customer', $data);
        } else {
            $data = array();
            $data['customer_no'] = $this->input->post('customer_no');
            $data['name'] = $this->input->post('name');

            $submit_date = $this->input->post('submit_date');
            $data['submit_date'] = date('Y-m-d', strtotime($submit_date));

            $activation_date = $this->input->post('activation_date');
            $data['activation_date'] = date('Y-m-d', strtotime($activation_date));
            if ($this->input->post('active_inactive') == false) {
                $data['active_inactive'] = 0;
            } else {
                $data['active_inactive'] = 1;
            }

//            $data['previous_carrier'] = $this->input->post('previous_carrier');
            $data['customer_group'] = $this->input->post('customer_group');

            $data['area'] = $this->input->post('area');
            $data['industry'] = $this->input->post('industry');
            $data['employee_id'] = $this->input->post('sales_rep');
            $data['registrotion'] = $this->input->post('registration');

            $data['vat'] = $this->input->post('vat');
            $data['dhl_account_no'] = $this->input->post('dhl_account_no');

            if ($this->input->post('req_new_dhl') == false) {
                $data['req_new_dhl'] = 0;
            } else {
                $data['req_new_dhl'] = 1;
            }
            $data['dhl_inbound_account_no'] = $this->input->post('dhl_inbound_account_no');

            $data['fedex_outbound'] = $this->input->post('fedex_outbound');

            if ($this->input->post('req_new_fedex_outbound') == false) {
                $data['req_new_fedex_outbound'] = 0;
            } else {
                $data['req_new_fedex_outbound'] = 1;
            }

            $data['fedex_inbound'] = $this->input->post('fedex_inbound');
            $data['ups_account'] = $this->input->post('ups_account');
            $data['associated_ups_zip'] = $this->input->post('associated_ups_zip');
            $data['other_ups_account'] = $this->input->post('other_ups_account');
            $data['uk_mail_account'] = $this->input->post('uk_mail_account');

            if ($this->input->post('req_uk_mail_account') == false) {
                $data['req_uk_mail_account'] = 0;
            } else {
                $data['req_uk_mail_account'] = 1;
            }

            if ($this->input->post('enable_uk_mail') == false) {
                $data['enable_uk_mail'] = 0;
            } else {
                $data['enable_uk_mail'] = 1;
            }

            $data['rejection_note'] = $this->input->post('rejection_note');
//            $data['create_employee_id'] = $eid;

            $this->web->update_data($id, 'customer', $data);

            redirect(base_url() . 'index.php/admin/comp_accounts/edit_customer/' . $id);
        }
    }

    function edit_customer_address($id) {
        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'addresses';

        $data['is_edit_customer'] = 1;

        $data['customer_id'] = $id;


        $this->form_validation->set_rules('a_customer_name', 'Customer Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['table_text'] = 'Edit Customer';
            $data['customer'] = $this->web->get_data('', 'customer', array('customer.id' => $id));


            if (empty($data['customer'])) {
                show_404();
            }
            $data['page_text'] = 'Address<small>Addresses of "' . $data['customer'][0]->name . '"</small>';


            if (!empty($data['customer']))
                if ($data['customer'][0]->b_same_a == 1) {
                    $data['customer'][0]->b_customer_name = '';
                    $data['customer'][0]->b_contact_name = '';
                    $data['customer'][0]->b_contact_title = '';
                    $data['customer'][0]->b_address = '';
                    $data['customer'][0]->b_address_2 = '';
                    $data['customer'][0]->b_city = '';
                    $data['customer'][0]->b_country = '';
                    $data['customer'][0]->b_postal_code = '';
                    $data['customer'][0]->b_country_2 = '';
                    $data['customer'][0]->b_phone = '';
                    $data['customer'][0]->b_fax = '';
                    $data['customer'][0]->b_email = '';
                    $data['customer'][0]->b_mobile = '';
                    $data['customer'][0]->b_alt_contact_phone = '';
                }
            $this->load->view('admin/comp_accounts/edit_customer_address', $data);
        } else {
            $data = array();

            $data['a_customer_name'] = $this->input->post('a_customer_name');
            $data['a_contact_name'] = $this->input->post('a_contact_name');
            $data['a_contact_title'] = $this->input->post('a_contact_title');
            $data['a_address'] = $this->input->post('a_address');
            $data['a_address_2'] = $this->input->post('a_address_2');
            $data['a_city'] = $this->input->post('a_city');
            $data['a_state'] = $this->input->post('a_state');
            $data['a_country'] = $this->input->post('a_country');
            $data['a_postal_code'] = $this->input->post('a_postal_code');
            $data['a_country_2'] = $this->input->post('a_country_2');
            $data['a_phone'] = $this->input->post('a_phone');
            $data['a_fax'] = $this->input->post('a_fax');
            $data['a_email'] = $this->input->post('a_email');
            $data['a_mobile'] = $this->input->post('a_mobile');
            $data['a_alt_contact_phone'] = $this->input->post('a_alt_contact_phone');

            if ($this->input->post('b_same_a') == false) {
                $data['b_same_a'] = 0;
            } else {
                $data['b_same_a'] = 1;
            }

            if ($data['b_same_a'] == 1) {
                $data['b_customer_name'] = $this->input->post('a_customer_name');
                $data['b_contact_name'] = $this->input->post('a_contact_name');
                $data['b_contact_title'] = $this->input->post('a_contact_title');
                $data['b_address'] = $this->input->post('a_address');
                $data['b_address_2'] = $this->input->post('a_address_2');
                $data['b_city'] = $this->input->post('a_city');
                $data['b_state'] = $this->input->post('a_state');
                $data['b_country'] = $this->input->post('a_country');
                $data['b_postal_code'] = $this->input->post('a_postal_code');
                $data['b_country_2'] = $this->input->post('a_country_2');
                $data['b_phone'] = $this->input->post('a_phone');
                $data['b_fax'] = $this->input->post('a_fax');
                $data['b_email'] = $this->input->post('a_email');
                $data['b_mobile'] = $this->input->post('a_mobile');
                $data['b_alt_contact_phone'] = $this->input->post('a_alt_contact_phone');
            } else {
                $data['b_customer_name'] = $this->input->post('b_customer_name');
                $data['b_contact_name'] = $this->input->post('b_contact_name');
                $data['b_contact_title'] = $this->input->post('b_contact_title');
                $data['b_address'] = $this->input->post('b_address');
                $data['b_address_2'] = $this->input->post('b_address_2');
                $data['b_city'] = $this->input->post('b_city');
                $data['b_state'] = $this->input->post('b_state');
                $data['b_country'] = $this->input->post('b_country');
                $data['b_postal_code'] = $this->input->post('b_postal_code');
                $data['b_country_2'] = $this->input->post('b_country_2');
                $data['b_phone'] = $this->input->post('b_phone');
                $data['b_fax'] = $this->input->post('b_fax');
                $data['b_email'] = $this->input->post('b_email');
                $data['b_mobile'] = $this->input->post('b_mobile');
                $data['b_alt_contact_phone'] = $this->input->post('b_alt_contact_phone');
            }

            $data['o_owner'] = $this->input->post('o_owner');
            $data['o_phone'] = $this->input->post('o_phone');
            $data['o_ap_contact'] = $this->input->post('o_ap_contact');
            $data['o_phone_2'] = $this->input->post('o_phone_2');
            $data['o_other_contact'] = $this->input->post('o_other_contact');
            $data['o_other_phone'] = $this->input->post('o_other_phone');
            $data['o_other_2_contact'] = $this->input->post('o_other_2_contact');
            $data['o_other_2_phone'] = $this->input->post('o_other_2_phone');

            $this->web->update_data($id, 'customer', $data);
//            echo '<pre>';
//            print_r($data);exit;
            redirect(base_url() . 'index.php/admin/comp_accounts/edit_customer_address/' . $id);
        }
    }

    function save_customer_base_rates($id) {
        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'addresses';

        $data['is_edit_customer'] = 1;

        $data['customer_id'] = $id;

        if (!$this->input->get('company_id')) {
            show_404();
        }
        if (!$this->input->get('parent_id')) {
            show_404();
        }

        if (!$this->input->get('category_id')) {
            show_404();
        }

        if (!$this->input->get('margin_change')) {
            show_404();
        }
//        print_r($this->input->get('min_base_margin'));exit;

        if ($this->input->get('min_base_margin')) {
            $min_base_margin = $this->input->get('min_base_margin');
            $this->web->insert_data($id, 'customer', array('base_rates_min_margin' => $min_base_margin));
        }

        $parent_id = $this->input->get('parent_id');
        $cat_id = $this->input->get('category_id');
        $comp_id = $this->input->get('company_id');

        $margin_changes = $this->input->get('margin_change');
//        echo '<pre>';
//        print_r($_GET);exit;
        $i = 0;
        foreach ($margin_changes as $margin_change) {
            $data = array();
            $data['customer_id'] = $id;
            $data['company_id'] = $comp_id[$i];
            $data['parent_id'] = $parent_id[$i];
            $data['category_id'] = $cat_id[$i];

            $customer_base_rates_data = $this->web->get_data('', 'customer_base_rates', $data);
            $data['percentage_margin'] = $margin_changes[$i];
            if (!empty($customer_base_rates_data)) {
                $customer_base_rates_data = $this->web->update_data($customer_base_rates_data[0]->id, 'customer_base_rates', $data);
            } else {
                $this->web->insert_data($data, 'customer_base_rates');
            }
            $i++;
        }



        $this->index($id);
    }

    function edit_invoice_options($id) {
        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'invoices_options';

        $data['is_edit_customer'] = 1;

        $data['customer_id'] = $id;


        $this->form_validation->set_rules('i_invoice_sorting', 'Invoice Sorting', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['table_text'] = 'Edit Customer';
            $data['customer'] = $this->web->get_data('', 'customer', array('customer.id' => $id));


            if (empty($data['customer'])) {
                show_404();
            }

            $data['page_text'] = 'Options<small>Invoice Options for "' . $data['customer'][0]->name . '"</small>';


            $this->load->view('admin/comp_accounts/edit_invoice_options', $data);
        } else {
            $data = array();

            $data['i_invoice_sorting'] = $this->input->post('i_invoice_sorting');
            $data['i_invoice_terms'] = $this->input->post('i_invoice_terms');
            $data['i_invoice_to_customer'] = $this->input->post('i_invoice_to_customer');
            $data['i_pick_up_fee'] = $this->input->post('i_pick_up_fee');
            $data['i_invoice_late_fee'] = $this->input->post('i_invoice_late_fee');

            if ($this->input->post('i_email_invoice') == false) {
                $data['i_email_invoice'] = 0;
            } else {
                $data['i_email_invoice'] = 1;
            }


            if ($this->input->post('i_customer_in_on_debit_card') == false) {
                $data['i_customer_in_on_debit_card'] = 0;
            } else {
                $data['i_customer_in_on_debit_card'] = 1;
            }


            if ($this->input->post('i_show_pco') == false) {
                $data['i_show_pco'] = 0;
            } else {
                $data['i_show_pco'] = 1;
            }


            $this->web->update_data($id, 'customer', $data);
//            echo '<pre>';
//            print_r($data);exit;
            redirect(base_url() . 'index.php/admin/comp_accounts/edit_invoice_options/' . $id);
        }
    }

    function edit_collections($id) {
        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'collections';

        $data['is_edit_customer'] = 1;

        $data['customer_id'] = $id;


        $this->form_validation->set_rules('c_foreign_credit_limit', 'Freight Credit Limits', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['customer'] = $this->web->get_data('', 'customer', array('customer.id' => $id));

            if (empty($data['customer'])) {
                show_404();
            }

            $data['page_text'] = 'Collections<small>Collections for "' . $data['customer'][0]->name . '"</small>';
            $data['table_text'] = 'Edit Customer';



            $this->load->view('admin/comp_accounts/edit_collections', $data);
        } else {
            $data = array();

            $data['c_foreign_credit_limit'] = $this->input->post('c_foreign_credit_limit');



            $this->web->update_data($id, 'customer', $data);
//            echo '<pre>';
//            print_r($data);exit;
            redirect(base_url() . 'index.php/admin/comp_accounts/edit_collections/' . $id);
        }
    }

    function edit_notes($id) {
        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'notes';

        $data['is_edit_customer'] = 1;

        $data['customer_id'] = $id;


        $this->form_validation->set_rules('notes', 'Notes', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');

            $data['customer'] = $this->web->get_data('', 'customer', array('customer.id' => $id));

            if (empty($data['customer'])) {
                show_404();
            }

            $data['page_text'] = 'Notes<small>Notes for "' . $data['customer'][0]->name . '"</small>';
            $data['table_text'] = $data['customer'][0]->name . ' Notes';



            $this->load->view('admin/comp_accounts/edit_notes', $data);
        } else {
            $data = array();

            $data['notes'] = $this->input->post('notes');



            $this->web->update_data($id, 'customer', $data);
//            echo '<pre>';
//            print_r($data);exit;
            redirect(base_url() . 'index.php/admin/comp_accounts/edit_notes/' . $id);
        }
    }

    function markups($id = '') {
        if (empty($id))
            show_404();

        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');

        $data['customer'] = $this->web->get_data('', 'customer', array('customer.id' => $id));

        $data['add_button'] = array('url' => base_url() . 'admin/comp_accounts/add_markup/' . $id, 'btn_title' => 'Add New Markup');


        if (empty($data['customer'])) {
            show_404();
        }

        $data['page_text'] = 'Markups<small>Markups for "' . $data['customer'][0]->name . '"</small>';


        $data['table_text'] = $data['customer'][0]->name . "'s Markups List";

        $data['table_url'] = base_url() . 'admin/comp_accounts/datatable_markups/' . $id;

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('Description', 'Markup Type', 'Amount', 'Carrier', 'Last Modified', 'Edit');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="submit" placeholder="Submit Date" class="search_init" />'
                , '<input type="text" name="activation" placeholder="Activation Date" class="search_init" />'
                , '<input type="text" name="activation" placeholder="Activation Date" class="search_init" />'
        );


        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'markups';
        $data['is_edit_customer'] = 1;
        $data['customer_id'] = $id;

        $this->load->view('admin/list', $data);
    }

    function datatable_markups($id) {

        if (empty($id))
            show_404();

        $eid = $this->session->userdata('user_id');
        $where = array('customer_id' => $id);

//       $data['contact'] = $this->web->get_data('','customer',$where);
        $joins = array();
        $joins[] = array('company', 'company.id=customer_markups.carrier_id', 'left');

        $select = 'customer_markups.id, customer_markups.description, customer_markups.title, customer_markups.markup_type, customer_markups.amount, company.name, customer_markups.updated_at';
        $generate = $this->web->get_dt_data('', 'customer_markups', $where, $select, '', '', '', $joins);
//        print_r($generate);
        $generate['aaData'] = $this->admin_prepare_contact($generate['aaData'], $id);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_contact($datas, $id) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $edit = '<a href="' . base_url() . 'index.php/admin/comp_accounts/edit_markup/' . $data[0] . '/' . $id . '">Edit</a>';

                $rs[] = $data[1];
//                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];
                $rs[] = $data[5];
                if ($data[6]) {
                    $rs[] = date("jS F Y", strtotime($data[6]));
                } else {
                    $rs[] = '';
                }
                $rs[] = $edit;


                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function edit_markup($id = '', $customer_id = '') {
        if (!$id) {
            show_404();
            exit;
        }
        if (!$customer_id) {
            show_404();
            exit;
        }

        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'markups';
        $data['is_edit_customer'] = 1;
        $data['customer_id'] = $customer_id;

        $customer_markups_data = $this->web->get_data($id, 'customer_markups', array('customer_id' => $customer_id));

        if (empty($customer_markups_data)) {
            show_404();
            exit;
        }


        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['customer_markups_data'] = $customer_markups_data;
            $this->load->view('admin/comp_accounts/edit_markup', $data);
        } else {
            $data = array();
            $data['description'] = $this->input->post('description');
            $data['title'] = $this->input->post('title');
            $data['markup_type'] = $this->input->post('markup_type');
            $data['amount'] = $this->input->post('amount');
            $data['carrier_id'] = $this->input->post('carrier_id');
            $data['updated_at'] = date("Y-m-d H:i:s");

            $this->web->update_data($id, 'customer_markups', $data, array('customer_id' => $customer_id));

            redirect(base_url() . 'index.php/admin/comp_accounts/markups/' . $customer_id);
        }

//        $this->load->view('admin/sales/add',$data);
    }

    function add_markup($customer_id = '') {
        if (!$customer_id) {
            show_404();
            exit;
        }

        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'markups';
        $data['is_edit_customer'] = 1;
        $data['customer_id'] = $customer_id;

        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/comp_accounts/add_markup', $data);
        } else {
            $data = array();
            $data['description'] = $this->input->post('description');
            $data['title'] = $this->input->post('title');
            $data['markup_type'] = $this->input->post('markup_type');
            $data['amount'] = $this->input->post('amount');
            $data['carrier_id'] = $this->input->post('carrier_id');
            $data['customer_id'] = $customer_id;

            $this->web->insert_data($data, 'customer_markups');

            redirect(base_url() . 'index.php/admin/comp_accounts/markups/' . $customer_id);
        }

//        $this->load->view('admin/sales/add',$data);
    }

    function webship_user_account($id) {
        $data['active_link'] = 'comp_accounts';
        $data['active_sub_link'] = 'webships';


        $this->form_validation->set_rules('customer_no', 'Customer #', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'comp_accounts';
            $data['active_sub_link'] = 'webships';
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['table_text'] = 'WebShip User Accounts';
            $data['page_text'] = 'WebShip User';
            $data['is_edit_customer'] = 1;
            $data['customer_id'] = $id;


            $this->load->view('admin/comp_accounts/webship_user_accounts', $data);
        } else {
            $data = array();
            $eid = $this->session->userdata('user_id');

            $data['customer_no'] = $this->input->post('customer_no');

            $submit_date = $this->input->post('submit_date');
            $data['submit_date'] = date('Y-m-d', strtotime($submit_date));

            $activation_date = $this->input->post('activation_date');
            $data['activation_date'] = date('Y-m-d', strtotime($activation_date));

            if ($this->input->post('active_inactive'))
                $data['active_inactive'] = 1;

            $data['previous_carrier'] = $this->input->post('previous_carrier');
            $data['customer_group'] = $this->input->post('customer_group');

            $data['area'] = $this->input->post('area');
            $data['industry'] = $this->input->post('industry');
            $data['employee_id'] = $this->input->post('sales_rep');
            $data['registrotion'] = $this->input->post('registration');

            $data['vat'] = $this->input->post('vat');
            $data['dhl_account_no'] = $this->input->post('dhl_account_no');

            if ($this->input->post('req_new_dhl'))
                $data['req_new_dhl'] = 1;

            $data['dhl_inbound_account_no'] = $this->input->post('dhl_inbound_account_no');

            $data['fedex_outbound'] = $this->input->post('fedex_outbound');

            if ($this->input->post('req_new_fedex_outbound'))
                $data['req_new_fedex_outbound'] = 1;

            $data['fedex_inbound'] = $this->input->post('fedex_inbound');
            $data['ups_account'] = $this->input->post('ups_account');
            $data['associated_ups_zip'] = $this->input->post('associated_ups_zip');
            $data['other_ups_account'] = $this->input->post('other_ups_account');
            $data['uk_mail_account'] = $this->input->post('uk_mail_account');

            if ($this->input->post('req_uk_mail_account'))
                $data['req_uk_mail_account'] = 1;

            if ($this->input->post('enable_uk_mail'))
                $data['enable_uk_mail'] = 1;

            $data['rejection_note'] = $this->input->post('rejection_note');

            $data['contact_customer'] = 'customer';
            $data['create_employee_id'] = $eid;
            $data['company_id'] = $eid;
            $data['franchise_id'] = get_sub_company_id($eid);

            $this->web->insert_data($data, 'customer');

            redirect(base_url() . 'index.php/admin/comp_accounts/customer/');
        }
    }

    function employees() {
        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'employees';
        $data['table_text'] = 'Employees';
        $data['page_text'] = 'Employees<small>List of Employees</small>';
        $data['active_sub_link'] = 'manage_employees';
        $data['table_url'] = base_url() . 'admin/comp_accounts/datatable_employees';

        $data['add_button'] = array('url' => base_url() . 'admin/comp_accounts/add_employees', 'btn_title' => 'Add New Employees');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Name', 'Salary', 'Email', 'Designation', 'Address', 'Actions');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="first_name" placeholder="First name" class="search_init" />'
                , '<input type="text" name="last_name" placeholder="Last name" class="search_init" />'
                , '<input type="text" name="salary" placeholder="Salary" class="search_init" />'
                , '<input type="text" name="email" placeholder="Email" class="search_init" />'
                , '<input type="text" name="designation" placeholder="Designation" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function datatable_employees() {
        $eid = $this->session->userdata('user_id');
        $select = 'id,firstname,lastname,salary,email,designation,address';
        $where = array();
        $where['company_id'] = $eid;
        $where['type'] = 'employee';
        
        $generate = $this->web->get_dt_data('', 'employees', $where, $select);
        
        $generate['aaData'] = $this->admin_prepare_employees($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_employees($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

//                $address = '<a href="' . base_url() . 'admin/comp_accounts/address/' . $data[0] . '">Address</a>';
                $action = '<a href="' . base_url() . 'admin/comp_accounts/edit_employees/' . $data[0] . '">Edit</a> &nbsp; |  &nbsp;';
                $action .= '<a href="' . base_url() . 'admin/comp_accounts/delete_employees/' . $data[0] . '" onclick="return confirm(\'Are you sure you want to delete this Employee?\');" >Delete</a>';
                $rs[] = $data[0];
                $rs[] = $data[1] . ' ' . $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];
                $rs[] = $data[5];
                $rs[] = $data[6];
//                $rs[] = $address;
                $rs[] = $action;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function add_employees() {
        $data['active_link'] = 'employees';
        $data['active_sub_link'] = 'add_employees';

        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'employees';
            $data['active_sub_link'] = 'add_employees';
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['table_text'] = 'Add Employee';
            $data['page_text'] = 'Employees';
            $this->load->view('admin/comp_accounts/add_employees', $data);
        } else {
            $data = array();
            $eid = $this->session->userdata('user_id');
            $data['firstname'] = $this->input->post('firstname');
            $data['lastname'] = $this->input->post('lastname');
            $data['salary'] = $this->input->post('salary');
            $data['password'] = $this->input->post('password');
            $data['email'] = $this->input->post('email');
            $data['designation'] = $this->input->post('designation');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            $data['company_id'] = $eid;
            $data['franchise_id'] = get_sub_company_id($eid);
            $company_data = $this->web->get_data($eid, 'employees');
            if (!empty($company_data))
                $data['master_id'] = $company_data[0]->master_id;
            $data['type'] = 'employee';
            $this->web->insert_data($data, 'employees');

            redirect(base_url() . 'index.php/admin/comp_accounts/employees/');
        }
    }

    function edit_employees($id) {
        if ($id == 0) {
            show_404();
        }

        $data['active_link'] = 'employees';
        $data['active_sub_link'] = 'manage_employees';

        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'employees';
            $data['active_sub_link'] = 'manage_employees';
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['table_text'] = 'Edit Employee';
            $data['page_text'] = 'Employees';
            $data['employees_data'] = $this->web->get_data($id, 'employees');
            $this->load->view('admin/comp_accounts/edit_employees', $data);
        } else {
            $data = array();
            $eid = $this->session->userdata('user_id');
            $data['firstname'] = $this->input->post('firstname');
            $data['lastname'] = $this->input->post('lastname');
            $data['salary'] = $this->input->post('salary');
            $data['email'] = $this->input->post('email');
            $data['designation'] = $this->input->post('designation');
            $data['designation'] = $this->input->post('designation');
            $data['phone'] = $this->input->post('phone');
            $data['company_id'] = $eid;
//            $data['type'] = 'employee';
            $this->web->update_data($id, 'employees', $data);
            redirect(base_url() . 'index.php/admin/comp_accounts/employees/');
        }
    }

    function delete_employees($id = 0) {
        if ($id == 0)
            show_404();
        $this->data = new stdClass();
        $this->web->delete_data($id, 'employees');

        redirect(base_url() . 'index.php/admin/comp_accounts/employees/');

        $this->output->enable_profiler(FALSE);
    }

}
