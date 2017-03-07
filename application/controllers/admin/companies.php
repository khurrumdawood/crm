<?php

class Companies extends CI_Controller {

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
        $this->load->library('Datatables');
        $this->load->library('table');


//        $this->load->library('form_validation');
//        $this->load->model('recycle_model', 'web');
        error_reporting(E_ALL);
        ini_set('display_errors', true);
    }

    function index() {
//        echo '<pre> ';
//$eid = $this->session->all_userdata();
//print_r($eid);exit;
        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'companies';
        $data['table_text'] = 'Companies';
        $data['page_text'] = 'Companies<small>List of Companies</small>';
        $data['active_sub_link'] = 'companies';
        $data['table_url'] = base_url() . 'admin/companies/datatable';

        $data['add_button'] = array('url' => base_url() . 'admin/companies/add_comp', 'btn_title' => 'Add New Company');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Name', 'Created Date', 'Detail', 'Action', 'Couriers','Location');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Created Date" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function datatable() {
//      $select= array('customer.id as cus_id,customer.name,customer.phone,appointment.*', false);
//        $joins = array();
//        $joins[] = array('customer','customer.id = appointment.customer_id','inner');
//        
//        echo 'asdf';exit;
        $eid = $this->session->userdata('user_id');
//       $data['appointment'] = $this->web->get_data('','appointment',array('customer.create_employee_id' => $eid),$select,'','','',$joins);


        $select = 'id, full_name, joined_at, is_active,lat,long';

        $generate = $this->web->get_dt_data('', 'employees', array('master_id' => $eid, 'company_id' => 0, 'franchise_id' => 0), $select);
//        print_r($generate);
        $generate['aaData'] = $this->admin_prepare_companies($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_companies($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $sub = '<a href="' . base_url() . 'admin/companies/sub_comp/' . $data[0] . '">View</a>';
                $edit = '<a href="' . base_url() . 'admin/companies/edit_comp/' . $data[0] . '">Edit</a>';
                $companies = '<a href="' . base_url() . 'admin/zones/index/' . $data[0] . '">View</a>';
                    if($data[4] || $data[5]!=0){
//                $location = '<a href="' . base_url() . 'admin/lat_long/location/' . $data[0] .'/'.$data[4].'/'.$data[5]. '">View</a>';
                $location = '<a href="javascript:void(0)" onclick="popupB('.$data[4].','.$data[5].')">View</a>';
                    }
                    else {
                    $location ='';
                    }
                $active = '<a class="status_activate" att_url="companies" att_id="' . $data[0] . '" href="javascript:void(0)">';
                $active .= ($data[3] == 1) ? 'Active' : 'Reactivate';
                $active .= '</a>';



                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = date("jS F Y", strtotime($data[2]));
                $rs[] = $sub;
//                $rs[] = $active;
                $rs[] = $edit;
                $rs[] = $companies;
                $rs[] = $location;
                
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function sub_comp($comp_id = '') {
        $user_type = $this->session->userdata('user_type');
//        print_r($session_type);exit;
        if ($user_type == 'company') {
            $comp_id = $this->session->userdata('user_id');
        }
        if (empty($comp_id))
            show_404();
        $data['active_link'] = 'companies';
//        $data['active_sub_link'] = 'contact';
        $com_data = $this->web->get_data($comp_id, 'employees');
        if (!empty($com_data)) {
            $data['table_text'] = $com_data[0]->full_name;
            $data['page_text'] = 'Detail<small>Detail of "' . $com_data[0]->full_name . '"</small>';
        }



        $data['table_url'] = base_url() . 'admin/companies/datatable_sub_comp/' . $comp_id;
        

//        $data['add_button'] = array('url' => base_url() . 'admin/companies/add_sub_comp/' . $comp_id, 'btn_title' => 'Add Sub Company');

        $data['back_button'] = array('url' => base_url() . 'admin/companies', 'btn_title' => 'Back');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Name', 'Created Date', 'Customers', 'Employees', 'Actions');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Created At" class="search_init" />'
        );

        if ($user_type == 'company') {
            unset($data['back_button']);
        }
        
        $sub_data = $this->web->get_data('','employees',array('type'=>'sub_company','company_id'=>$comp_id));

        $sub_id = $sub_data[0]->id;
        
        $data['employee_data'] = $this->employees_1($comp_id, $sub_id);
        $data['customer_data'] = $this->customer_1($comp_id, $sub_id);
        
        
        
        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Name', 'Email', 'Customer Type', 'Created Date', 'Billing', 'Shipping');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Email" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Type" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Date Created" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Billings" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Shippings" class="search_init" />'
        );

        
        
        
        $data['table_url_5'] = base_url() . 'admin/companies/datatable_emp/' . $comp_id.'/'.$sub_id;
        $data['table_url'] = base_url() . 'admin/companies/datatable_cus/' . $comp_id.'/'.$sub_id;

        
        
        $this->load->view('admin/companies/sub_comp', $data);
    }

    function datatable_sub_comp($comp_id) {

        $eid = $this->session->userdata('user_id');

        $select = 'id, full_name, joined_at';

        $generate = $this->web->get_dt_data('', 'employees', array('master_id' => $eid, 'company_id' => $comp_id, 'franchise_id' => 0), $select);
        $generate['aaData'] = $this->admin_prepare_sub_companies($generate['aaData'], $comp_id);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_sub_companies($datas, $comp_id) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $cus = '<a href="' . base_url() . 'admin/companies/customer/' . $comp_id . '/' . $data[0] . '">Customers</a>';
                $emp = '<a href="' . base_url() . 'admin/companies/employees/' . $comp_id . '/' . $data[0] . '">Employees</a>';
                $act = '<a href="' . base_url() . 'admin/companies/edit_sub_comp/' . $comp_id . '/' . $data[0] . '">Edit</a>';

                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = date("jS F Y", strtotime($data[2]));
                $rs[] = $cus;
                $rs[] = $emp;
                $rs[] = $act;
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function employees($comp_id, $sub_comp_id) {
        if (empty($comp_id))
            show_404();
        if (empty($sub_comp_id))
            show_404();

        $com_data = $this->web->get_data($sub_comp_id, 'employees');


        if (!empty($com_data)) {
            $data['table_text'] = $com_data[0]->full_name;
            $data['page_text'] = 'Employees<small>Employees of "' . $com_data[0]->full_name . '"</small>';
        }

        $data['active_link'] = 'companies';
//        $data['active_sub_link'] = 'contact';
        $data['table_url'] = base_url() . 'admin/companies/datatable_emp/' . $comp_id . '/' . $sub_comp_id;
//        $data['add_button'] = array('url' => base_url() . 'admin/companies/add_sub_comp', 'btn_title' => 'Add Sub Company');
        $data['back_button'] = array('url' => base_url() . 'admin/companies/sub_comp/' . $comp_id, 'btn_title' => 'Back');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Name', 'Email', 'Territory', 'Salary', 'Designation', 'Created Date', 'Lists');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Email" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Territory" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Salary" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Designation" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Created Date" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function employees_1($comp_id, $sub_comp_id) {
        if (empty($comp_id))
            show_404();
        if (empty($sub_comp_id))
            show_404();

        $com_data = $this->web->get_data($sub_comp_id, 'employees');


        if (!empty($com_data)) {
            $data['table_text'] = $com_data[0]->full_name;
            $data['page_text'] = 'Employees<small>Employees of "' . $com_data[0]->full_name . '"</small>';
        }

        $data['active_link'] = 'companies';
//        $data['active_sub_link'] = 'contact';
        $data['table_url'] = base_url() . 'admin/companies/datatable_emp/' . $comp_id . '/' . $sub_comp_id;
//        $data['add_button'] = array('url' => base_url() . 'admin/companies/add_sub_comp', 'btn_title' => 'Add Sub Company');
        $data['back_button'] = array('url' => base_url() . 'admin/companies/sub_comp/' . $comp_id, 'btn_title' => 'Back');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-5">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Name', 'Email', 'Territory', 'Salary', 'Designation', 'Created Date', 'Lists');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Email" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Territory" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Salary" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Designation" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Created Date" class="search_init" />'
        );

        return $this->table->generate();
    }

    function datatable_emp($comp_id, $sub_comp_id) {

        $eid = $this->session->userdata('user_id');

        $select = 'id, firstname,lastname,email,territory,salary,designation, joined_at';

        $generate = $this->web->get_dt_data('', 'employees', array('master_id' => $eid, 'company_id' => $comp_id, 'franchise_id' => $sub_comp_id), $select);
        $generate['aaData'] = $this->admin_prepare_emp($generate['aaData'], $comp_id, $sub_comp_id);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_emp($datas, $comp_id, $sub_comp_id) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $cus = '<a href="' . base_url() . 'admin/companies/customer/' . $comp_id . '/' . $sub_comp_id . '/' . $data[0] . '/contacts">Contacts</a><br>';
                $cus .= '<a href="' . base_url() . 'admin/companies/customer/' . $comp_id . '/' . $sub_comp_id . '/' . $data[0] . '/appointments">Appointments</a><br>';
                $cus .= '<a href="' . base_url() . 'admin/companies/customer/' . $comp_id . '/' . $sub_comp_id . '/' . $data[0] . '/leads">Leads</a><br>';
                $cus .= '<a href="' . base_url() . 'admin/companies/customer/' . $comp_id . '/' . $sub_comp_id . '/' . $data[0] . '/sales">Sales</a><br>';
                $rs[] = $data[0];
                $rs[] = $data[1] . ' ' . $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];
                $rs[] = $data[5];
                $rs[] = $data[6];
                $rs[] = date("jS F Y", strtotime($data[2]));
                $rs[] = $cus;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function customer($comp_id, $sub_comp_id, $emp_id = 0, $type = '') {
        if (empty($comp_id))
            show_404();
        if (empty($sub_comp_id))
            show_404();

        if ($emp_id != 0) {
            $com_data = $this->web->get_data($emp_id, 'employees');
            if (!empty($com_data)) {
                $data['table_text'] = $com_data[0]->firstname . ' ' . $com_data[0]->lastname;
                $data['page_text'] = 'Customers<small>Customers of "' . $com_data[0]->firstname . ' ' . $com_data[0]->lastname . '"</small>';
            }
        } else {
            $com_data = $this->web->get_data($sub_comp_id, 'employees');
            if (!empty($com_data)) {
                $data['table_text'] = $com_data[0]->full_name;
                $data['page_text'] = 'Customers<small>Customers of "' . $com_data[0]->full_name . '"</small>';
            }
        }
        $data['active_link'] = 'comp_account';
        $data['active_sub_link'] = 'contact';
        $data['table_url'] = base_url() . 'admin/companies/datatable_cus/' . $comp_id . '/' . $sub_comp_id . '/' . $emp_id . '/' . $type;

//        $data['back_button'] = array('url' => base_url() . 'admin/companies/sub_comp/' . $comp_id, 'btn_title' => 'Back');
        $data['back_button'] = array('url' => 'javascript:void(0)' . $comp_id, 'btn_title' => 'Back', 'onclick' => 'history.go(-1)');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Name', 'Email', 'Customer Type', 'Created Date', 'Billing', 'Shipping');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Email" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Type" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Date Created" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Billings" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Shippings" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }


    function customer_1($comp_id, $sub_comp_id, $emp_id = 0, $type = '') {
        if (empty($comp_id))
            show_404();
        if (empty($sub_comp_id))
            show_404();

        if ($emp_id != 0) {
            $com_data = $this->web->get_data($emp_id, 'employees');
            if (!empty($com_data)) {
                $data['table_text'] = $com_data[0]->firstname . ' ' . $com_data[0]->lastname;
                $data['page_text'] = 'Customers<small>Customers of "' . $com_data[0]->firstname . ' ' . $com_data[0]->lastname . '"</small>';
            }
        } else {
            $com_data = $this->web->get_data($sub_comp_id, 'employees');
            if (!empty($com_data)) {
                $data['table_text'] = $com_data[0]->full_name;
                $data['page_text'] = 'Customers<small>Customers of "' . $com_data[0]->full_name . '"</small>';
            }
        }
//        $data['active_link'] = 'companies';
//        $data['active_sub_link'] = 'contact';
        $data['table_url'] = base_url() . 'admin/companies/datatable_cus/' . $comp_id . '/' . $sub_comp_id . '/' . $emp_id . '/' . $type;

//        $data['back_button'] = array('url' => base_url() . 'admin/companies/sub_comp/' . $comp_id, 'btn_title' => 'Back');
//        $data['back_button'] = array('url' => 'javascript:void(0)' . $comp_id, 'btn_title' => 'Back', 'onclick' => 'history.go(-1)');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Name', 'Email', 'Customer Type', 'Created Date', 'Billing', 'Shipping');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Email" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Type" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Date Created" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Billings" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Shippings" class="search_init" />'
        );

        return $this->table->generate();
    }

    function datatable_cus($comp_id, $sub_comp_id, $emp_id = 0, $type = '') {

        $eid = $this->session->userdata('user_id');

//        $this->web->get_data('','');

        $select = 'customer.id, customer.name, customer.email, customer.type, customer.created_at';

        $joins = array();
        $joins[] = array('employees', 'customer.employee_id=employees.id', 'inner');


        $where = array();
//        $where['employees.master_id'] = $eid;

        if ($emp_id != 0) {
            $where['customer.employee_id'] = $emp_id;
        } else {
            $where['customer.franchise_id'] = $sub_comp_id;
            if ($type == 'appointments') {
                $where['customer.type'] = 'prospect';
            }
            if ($type == 'leads') {
                $where['customer.lead_status'] = 'pending';
            }
            if ($type == 'sales') {
                $where['customer.lead_status'] = 'completed';
            }
        }

        $generate = $this->web->get_dt_data('', 'customer', $where, $select, '', '', '', $joins);
        $generate['aaData'] = $this->admin_prepare_cus($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_cus($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $billings = '<a href="' . base_url() . 'admin/companies/customers_bill/' . $data[0] . '/billing' . '">View</a>';
                $shippings = '<a href="' . base_url() . 'admin/companies/customers_bill/' . $data[0] . '/shipping' . '">View</a>';
                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = date("jS F Y", strtotime($data[2]));
                $rs[] = $billings;
                $rs[] = $shippings;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function customers_bill($id, $bil_ship) {
        if (empty($id))
            show_404();
        if (empty($bil_ship))
            show_404();

        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');


        $data['active_link'] = 'companies';
        $data['active_sub_link'] = 'contact';
        $data['table_url'] = base_url() . 'admin/companies/datatable_cus_bill/' . $id . '/' . $bil_ship;
        //$data['add_button'] = array('url' => base_url() . 'admin/companies/Customers', 'btn_title' => 'Add Sub Company');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Country', 'City', 'Address', 'Postal Code');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Email" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Type" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Type" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function datatable_cus_bill($id, $bil_ship) {

        $eid = $this->session->userdata('user_id');
        if ($bil_ship == 'billing') {
            $select = 'customer.id, customer.b_country,customer.b_city,customer.b_shipping,customer.b_postal_code';
        }
        if ($bil_ship == 'shipping') {
            $select = 'customer.id, customer.country,customer.city,customer.shipping,customer.postal_code';
        }

//        $joins = array();
//        $joins[] = array('employees','customer.employee_id=employees.id','inner');


        $generate = $this->web->get_dt_data($id, 'customer', '', $select, '', '', '', '');
        $generate['aaData'] = $this->admin_prepare_cus_bill($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_cus_bill($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function add_comp() {
//        echo 90 - (2/50)*100;exit;
        $eid = $this->session->userdata('user_id');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'companies';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Add Company';
            $data['page_text'] = 'Companies';

            $eid = $this->session->userdata('user_id');

            $data['companies'] = $this->web->get_data('', 'company', array('parent_id' => 0, 'client_company_id' => 0));
            $data['cachy_id'] = $this->web->insert_data(array('value'=>''),'cachy_location');
            $this->load->view('admin/companies/add', $data);
        } else {
            $cachy_id = $this->input->post('cachy_id');
            $email_data = $this->web->get_data('', 'employees', array('type' => 'company', 'email' => $this->input->post('email')));
            if (!empty($email_data)) {
                $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
                $data['active_link'] = 'companies';
                $data['active_sub_link'] = 'contact';
                $data['table_text'] = 'Add Company';
                $data['page_text'] = 'Companies';
                $data['errors'] = '<q>' . $this->input->post('email') . '</q> already exist';
                $data['cachy_id'] = $cachy_id;
                $this->load->view('admin/companies/add', $data);
            } else {
//                echo '<pre>';
//                print_r($_POST);exit;
                $data['full_name'] = $this->input->post('title');
                $data['email'] = $this->input->post('email');
                $data['description'] = $this->input->post('desc');
                $data['margin'] = $this->input->post('margin');
                $data['owner'] = $this->input->post('owner_name');
                $data['phone'] = $this->input->post('tel');
                $data['fax'] = $this->input->post('fax');
                $data['address'] = $this->input->post('address');
                $data['city'] = $this->input->post('city');
                $data['state'] = $this->input->post('state');
                $data['country'] = $this->input->post('country');
                $data['master_id'] = $eid;
                $data['type'] = 'company';
                $data['password'] = random_string('alnum', 10);
//                echo '<pre>';
//                print_r($data);exit;

                $client_company_id = $this->web->insert_data($data, 'employees');


                $sub_data['full_name'] = $this->input->post('title');
                $sub_data['description'] = $this->input->post('desc');
                $sub_data['master_id'] = $eid;
                $sub_data['company_id'] = $client_company_id;
                $sub_data['type'] = 'sub_company';
                $this->web->insert_data($sub_data, 'employees');
                
                
                $cachy_data = $this->web->get_data($cachy_id,'cachy_location');
                if(!empty($cachy_data)){
                    $location_data = array();
                    $location_data['lat'] = $cachy_data[0]->latitude;
                    $location_data['long'] = $cachy_data[0]->longitude;
                    $location_data['location_value'] = $cachy_data[0]->value;
                    $this->web->update_data($client_company_id,'employees',$location_data);
                    $this->web->delete_data($cachy_id,'cachy_location');
                }
                    
                
                
                
                $all_sel = $this->input->post('all_sel');

                $category_ids = '';
                if ($all_sel == 'sel') {
                    $selected_sub_companies = $this->input->post('comp_sub_com');
                    if ($selected_sub_companies) {
                        $category_ids = implode($selected_sub_companies, "' , '");
                        $category_ids = "'" . $category_ids . "'";
                    }
                }

                $zones_where = 'client_company_id = 0';
                
                if($category_ids!='')
                    $zones_where .= " AND category_id IN ($category_ids)";
                
                $com_data = $this->web->get_data('', 'zones', $zones_where);
                
                $margin = $data['margin'];


                send_email_to_company($data);




                $data = array();
                $i = 0;












//            print_r($margin);exit;


                    if (is_array($com_data)) {
                        foreach ($com_data as $fav) {
                            $data[$i]['parent_id'] = $fav->id;
                            $data[$i]['client_company_id'] = $client_company_id;
                            $data[$i]['company_id'] = $fav->company_id;
                            $data[$i]['category_id'] = $fav->category_id;
                            $data[$i]['zone'] = $fav->zone;
                            $data[$i]['description'] = $fav->description;
                            $data[$i]['weight'] = $fav->weight;
                            $data[$i]['margin'] = $margin;
//                    print_r(($margin/100)*$fav->price);exit;
                            $data[$i]['price'] = $fav->price - (($margin / 100) * $fav->price);
                            $data[$i]['parent_price'] = $fav->price;
                            $i++;
                        }
//                echo '<pre>';
//                print_r($data);exit;
                        $this->web->group_insert_data($data, 'zones');
                    }
                    
                    
                    
                    
                $category_where = 'client_company_id = 0';
                
                if($category_ids!=''){
                    $category_where .= " AND id IN ($category_ids)";
    
                    $select_user_data = array('distinct company_id', false);
                    $company_data = $this->web->get_data('', 'category', $category_where, $select_user_data);
                    if(!empty($company_data))
                    {
                            $company_ids = fetch_single_element_from_array($company_data, 'company_id');
                            $company_ids = implode($company_ids, "' , '");
                            $company_ids = "'" . $company_ids . "'";
                    }
                }
                    
                    
                    
                    
                $company_where = 'client_company_id = 0';
                if($category_ids!='')
                    $company_where .= " AND id IN ($company_ids)";

                    $com_data = $this->web->get_data('', 'company', $company_where);
//            echo '<pre>';
                    $data = array();
                    $i = 0;
//            print_r($margin);exit;
                    if (is_array($com_data)) {
                        foreach ($com_data as $fav) {
                            $data[$i]['parent_id'] = $fav->id;
                            $data[$i]['client_company_id'] = $client_company_id;
                            $data[$i]['name'] = $fav->name;
                            $data[$i]['description'] = $fav->description;
                            $data[$i]['margin'] = $margin;
                            $i++;
                        }
//                echo '<pre>';
//                print_r($data);exit;
                        $this->web->group_insert_data($data, 'company');
                    }


                $category_where = 'client_company_id = 0';
                if($category_ids!='')
                    $category_where .= " AND id IN ($category_ids)";
    
                    
                    
                    $com_data = $this->web->get_data('', 'category', $category_where);
//            echo '<pre>';
                    $data = array();
                    $i = 0;
//            print_r($margin);exit;
                    if (is_array($com_data)) {
                        foreach ($com_data as $fav) {
                            $data[$i]['parent_id'] = $fav->id;
                            $data[$i]['client_company_id'] = $client_company_id;
                            $data[$i]['category_name'] = $fav->category_name;
                            $data[$i]['company_id'] = $fav->company_id;
                            $data[$i]['description'] = $fav->description;
                            $data[$i]['margin'] = $margin;
                            $i++;
                        }
//                echo '<pre>';
//                print_r($data);exit;
                        $this->web->group_insert_data($data, 'category');
                    }

                
                
                redirect(base_url() . 'index.php/admin/companies');
            }
        }
    }

    function edit_comp($comp_id) {
        if ($comp_id == '')
            show_404();
        $eid = $this->session->userdata('user_id');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'companies';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Edit Company';
            $data['page_text'] = 'Companies';

            $eid = $this->session->userdata('user_id');
//            $select = array('employees.*', false);
//            $joins = array();
//            $joins[] = array('company', 'company.id = category.company_id', 'inner');
//            $data['companies'] = $this->web->get_data('', 'employees', array('employees.master_id' => $eid, 'employees.company_id' => 0, 'employees.franchise_id' => 0), $select, '', '', '', $joins);
            $data['companies'] = $this->web->get_data($comp_id, 'employees');
            $data['companies_select'] = $this->web->get_data('', 'company', array('parent_id' => 0, 'client_company_id' => 0));
            
            $data['category_select'] = $this->web->get_data('', 'category', array('client_company_id' => $comp_id));
            
            
//            $data['companies_select'] = $this->web->get_data('', 'category', array('parent_id' => 0, 'client_company_id' => 0));
            
//            echo '<pre>';
//            print_r($data);
//            exit;
            $this->load->view('admin/companies/edit', $data);
        } else {
//            echo '<pre>';
//            print_r($_POST);exit;
            $data['full_name'] = $this->input->post('title');
            $data['description'] = $this->input->post('desc');
            
            
                $data['owner'] = $this->input->post('owner_name');
                $data['phone'] = $this->input->post('tel');
                $data['fax'] = $this->input->post('fax');
                $data['address'] = $this->input->post('address');
                $data['city'] = $this->input->post('city');
                $data['state'] = $this->input->post('state');
                $data['country'] = $this->input->post('country');

            $margin = 0;
            if ($this->input->post('margin')) {
                $margin = $this->input->post('margin');
                $where = array();
                $where['client_company_id'] = $comp_id;
                $com_data = $this->web->get_data('', 'company', $where);
                $data['margin'] = $this->input->post('margin');
            }



//            $data['master_id'] = $eid;
//            $data['type'] = 'company';
            $this->web->update_data($comp_id, 'employees', $data);
            
            
            $this->web->delete_data('','zones',array('client_company_id'=>$comp_id));
            $this->web->delete_data('','company',array('client_company_id'=>$comp_id));
            $this->web->delete_data('','category',array('client_company_id'=>$comp_id));
            
            
            $all_sel = $this->input->post('all_sel');

                $category_ids = '';
                if ($all_sel == 'sel') {
                    $selected_sub_companies = $this->input->post('comp_sub_com');
                    if ($selected_sub_companies) {
                        $category_ids = implode($selected_sub_companies, "' , '");
                        $category_ids = "'" . $category_ids . "'";
                    }
                }

                $zones_where = 'client_company_id = 0';
                
                if($category_ids!='')
                    $zones_where .= " AND category_id IN ($category_ids)";
                
                $com_data = $this->web->get_data('', 'zones', $zones_where);
//                echo '<pre>';
//                print_r($com_data);exit;
//                $margin = $data['margin'];
                $client_company_id = $comp_id;

                $data = array();
                $i = 0;

                    if (is_array($com_data)) {
                        foreach ($com_data as $fav) {
                            $data[$i]['parent_id'] = $fav->id;
                            $data[$i]['client_company_id'] = $client_company_id;
                            $data[$i]['company_id'] = $fav->company_id;
                            $data[$i]['category_id'] = $fav->category_id;
                            $data[$i]['zone'] = $fav->zone;
                            $data[$i]['description'] = $fav->description;
                            $data[$i]['weight'] = $fav->weight;
                            $data[$i]['margin'] = $margin;
//                    print_r(($margin/100)*$fav->price);exit;
                            $data[$i]['price'] = $fav->price - (($margin / 100) * $fav->price);
                            $data[$i]['parent_price'] = $fav->price;
                            $i++;
                        }
//                echo '<pre>';
//                print_r($data);exit;
                        $this->web->group_insert_data($data, 'zones');
                    }
                    
                    
//                    echo 'asdf';exit;
                    
                $category_where = 'client_company_id = 0';
                
                if($category_ids!=''){
                    $category_where .= " AND id IN ($category_ids)";
    
                    $select_user_data = array('distinct company_id', false);
                    $company_data = $this->web->get_data('', 'category', $category_where, $select_user_data);
                    if(!empty($company_data))
                    {
                            $company_ids = fetch_single_element_from_array($company_data, 'company_id');
                            $company_ids = implode($company_ids, "' , '");
                            $company_ids = "'" . $company_ids . "'";
                    }
                }
                    
                    
                    
                    
                $company_where = 'client_company_id = 0';
                if($category_ids!='')
                    $company_where .= " AND id IN ($company_ids)";

                    $com_data = $this->web->get_data('', 'company', $company_where);
//            echo '<pre>';
                    $data = array();
                    $i = 0;
//            print_r($margin);exit;
                    if (is_array($com_data)) {
                        foreach ($com_data as $fav) {
                            $data[$i]['parent_id'] = $fav->id;
                            $data[$i]['client_company_id'] = $client_company_id;
                            $data[$i]['name'] = $fav->name;
                            $data[$i]['description'] = $fav->description;
                            $data[$i]['margin'] = $margin;
                            $i++;
                        }
//                echo '<pre>';
//                print_r($data);exit;
                        $this->web->group_insert_data($data, 'company');
                    }


                $category_where = 'client_company_id = 0';
                if($category_ids!='')
                    $category_where .= " AND id IN ($category_ids)";
    
                    
                    
                    $com_data = $this->web->get_data('', 'category', $category_where);
//            echo '<pre>';
                    $data = array();
                    $i = 0;
//            print_r($margin);exit;
                    if (is_array($com_data)) {
                        foreach ($com_data as $fav) {
                            $data[$i]['parent_id'] = $fav->id;
                            $data[$i]['client_company_id'] = $client_company_id;
                            $data[$i]['category_name'] = $fav->category_name;
                            $data[$i]['company_id'] = $fav->company_id;
                            $data[$i]['description'] = $fav->description;
                            $data[$i]['margin'] = $margin;
                            $i++;
                        }
//                echo '<pre>';
//                print_r($data);exit;
                        $this->web->group_insert_data($data, 'category');
                    }
            
            
            
            
            
            
            
            
            
            
            
            
//            echo '<pre>';
//            print_r($com_data);exit;
            
//            if ($this->input->post('margin') && !empty($com_data)) {
////                echo 'asdf';exit;
//                $prev_margin = $com_data[0]->margin;
//
//                $margin = $this->input->post('margin');
//
//
////                if ($prev_margin != $margin) {
//                $new_margin = $margin - $prev_margin;
////                    echo '<pre>';
////                    print_r($com_data);exit;
//                $com_data = $this->web->get_data('', 'company', array('client_company_id' => 0));
//
//                $data = array();
////                    print_r($margin);exit;
//                foreach ($com_data as $fav) {
//                    $data['margin'] = $margin;
//                    $check_com_data = $this->web->get_data('', 'company',array('parent_id'=>$fav->id,'client_company_id'=>$comp_id));
//                    if(!empty($check_com_data)){
//                        $this->web->update_data('', 'company', $data,array('parent_id'=>$fav->id,'client_company_id'=>$comp_id));
//                    }else{
//                        $data['parent_id'] = $fav->id;
//                        $data['client_company_id'] = $comp_id;
//                        $this->web->insert_data($data,'company');
//                    }
//                }
//
//
//                $com_data = $this->web->get_data('', 'category', array('client_company_id' => 0));
//
//                $data = array();
////                    print_r($margin);exit;
//                foreach ($com_data as $fav) {
//                    $data['margin'] = $margin;
//                    $check_cat_data = $this->web->get_data('', 'category',array('parent_id'=>$fav->id,'client_company_id'=>$comp_id));
//                    if(!empty($check_cat_data)){
//                        $this->web->update_data('', 'category', $data,array('parent_id'=>$fav->id,'client_company_id'=>$comp_id));
//                    }else{
//                        $data['parent_id'] = $fav->id;
//                        $data['client_company_id'] = $comp_id;
//                        $this->web->insert_data($data,'category');
//                        
//                    }
//                }
//
//                $com_data = $this->web->get_data('', 'zones', array('client_company_id' => 0));
////                    echo '<pre>';
////                    print_r($com_data);exit;
//
//                $data = array();
//
//                foreach ($com_data as $fav) {
//                    $data['margin'] = $margin;
//                    $data['price'] = $fav->parent_price - (($margin / 100) * $fav->parent_price);
//                    $check_zon_data = $this->web->get_data($fav->id, 'zones', array('parent_id'=>$fav->id,'client_company_id'=>$comp_id));
//                    if(!empty($check_zon_data)){
//                        $this->web->update_data($fav->id, 'zones', $data,array('parent_id'=>$fav->id,'client_company_id'=>$comp_id));
//                    }else{
//                        $data['parent_id'] = $fav->id;
//                        $data['client_company_id'] = $comp_id;
//                        $this->web->insert_data($data,'zones');
//                    }
//                }
////                }
//            }
//





            redirect(base_url() . 'index.php/admin/companies');
        }
    }

    function add_sub_comp($comp_id) {

        $eid = $this->session->userdata('user_id');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'companies';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Add Sub Company';
            $data['page_text'] = 'Companies';

            $eid = $this->session->userdata('user_id');
            $this->load->view('admin/companies/add', $data);
        } else {
            $data['full_name'] = $this->input->post('title');
            $data['description'] = $this->input->post('desc');
            $data['master_id'] = $eid;
            $data['company_id'] = $comp_id;
            $data['type'] = 'sub_company';
            $this->web->insert_data($data, 'employees');

            redirect(base_url() . 'index.php/admin/companies/sub_comp/' . $comp_id);
        }
    }

    function edit_sub_comp($comp_id, $sub_comp_id) {
        if ($comp_id == '')
            show_404();
        if ($sub_comp_id == '')
            show_404();
        $eid = $this->session->userdata('user_id');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'companies';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Edit Sub Company';
            $data['page_text'] = 'Companies';

            $eid = $this->session->userdata('user_id');
            $data['companies'] = $this->web->get_data('', 'employees', array('master_id' => $eid, 'company_id' => $comp_id, 'id' => $sub_comp_id));

            $this->load->view('admin/companies/edit', $data);
        } else {
            $data['full_name'] = $this->input->post('title');
            $data['description'] = $this->input->post('desc');
            $this->web->update_data('', 'employees', $data, array('master_id' => $eid, 'company_id' => $comp_id, 'id' => $sub_comp_id));

            redirect(base_url() . 'index.php/admin/companies/sub_comp/' . $comp_id);
        }
    }

    function ChangeStatus() {
        $id = $this->input->post('id');
        $status_data = $this->web->get_data($id, 'employees');
        if ($status_data[0]->is_active == 0) {
            $this->web->update_data($id, 'employees', array('is_active' => 1));
            echo '1';
            exit;
        }
        if ($status_data[0]->is_active == 1) {
            $this->web->update_data($id, 'employees', array('is_active' => 0));
            echo '0';
            exit;
        }
    }
    
    function save_cachy_location()
    {
        $data = array();
        $data['latitude'] = $this->input->get('lat');
        $data['longitude'] = $this->input->get('long');
        $data['value'] = $this->input->get('value');
        
        $id = $this->input->get('id');
        $this->web->update_data($id,'cachy_location',$data);
        exit;
        
    }

    function save_company_location()
    {
        $data = array();
        $data['lat'] = $this->input->get('lat');
        $data['long'] = $this->input->get('long');
        $data['location_value'] = $this->input->get('value');
        
        $id = $this->input->get('id');
        $this->web->update_data($id,'employees',$data);
        exit;
        
    }

    function get_add_location($id)
    {
        $cachy_location_data = $this->web->get_data($id,'cachy_location');
        if(!empty($cachy_location_data)){
            echo $cachy_location_data[0]->value;
        }
        exit;
    }

    function get_edit_location($id)
    {
        $employees_data = $this->web->get_data($id,'employees');
        if(!empty($employees_data)){
            echo $employees_data[0]->location_value;
        }
        exit;
    }

}
