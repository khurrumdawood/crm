<?php

class Sales extends CI_Controller {

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

    function index($contact = '') {
        $where = '';
        $franchise_id = $this->session->userdata('franchise_id');
        $city_id = $this->session->userdata('city_id');
        $country_id = $this->session->userdata('country_id');
        if ($contact == 1) {
            $where = 'franchise_id = ' . $franchise_id . ' AND ';
        }
        if ($contact == 2) {
            $where = 'city_id = ' . $city_id . ' AND ';
        }
        if ($contact == 3) {
            $where = 'country_id = ' . $country_id . ' AND ';
        }

//      $eid= $this->session->userdata('user_id');
//      $where.='customer.create_employee_id = '.$eid;
//      
//       $data['contact'] = $this->web->get_data('','customer',$where);

        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['table_text'] = 'Customers';
        $data['page_text'] = 'Customers<small>List of Customers</small>';
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'manage_contacts';
        $data['table_url'] = base_url() . 'admin/sales/datatable_contact';
        $data['is_contact'] = 1;

        $data['add_button'] = array('url' => base_url() . 'admin/sales/add_contact', 'btn_title' => 'Add New Contact');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('Id', 'Name', 'Type', 'Phone', 'Actions', 'Edit');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="submit" placeholder="Submit Date" class="search_init" />'
                , '<input type="text" name="activation" placeholder="Activation Date" class="search_init" />'
                , '<input type="text" name="activation" placeholder="Activation Date" class="search_init" />'
        );

        
        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['active_sub_link'] = 'contact';
            $data['is_contact'] = 1;
        }

        $this->load->view('admin/list', $data);
    }

    function datatable_contact() {

        $eid = $this->session->userdata('user_id');
        $where = 'customer.employee_id = ' . $eid.' AND (contact_customer = "contact OR is_created_contact = 1")';
        if ($this->session->userdata('user_type') == 'company') {
            $where = 'customer.company_id = ' . $eid.' AND (contact_customer = "contact" OR is_created_contact = 1)';
        }

//       $data['contact'] = $this->web->get_data('','customer',$where);
        $select = 'id, name, type,phone';
        $generate = $this->web->get_dt_data('', 'customer', $where, $select);
//        print_r($generate);
        $generate['aaData'] = $this->admin_prepare_contact($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_contact($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $action = '<a href="' . base_url() . 'index.php/admin/sales/set_appointment/' . $data[0] . '">Set Appointment</a> ';
                $edit = '<a href="' . base_url() . 'index.php/admin/sales/edit_contact/' . $data[0] .'/'.$data[2]. '">Edit</a>';

                $rs[] = $data[0];
                $rs[] = $data[1];
                if ($data[2] == 'open') {
                    $class = 'label label-success';
                } else {
                    $class = 'label label-default';
                }
                $type = '<div class="' . $class . '">' . $data[2] . '</div>';
                $rs[] = $type;

                $rs[] = $data[3];
                $rs[] = $action;
                $rs[] = $edit;


                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

//    function index($contact='') {
//        $where='';
//        $franchise_id=$this->session->userdata('franchise_id');
//        $city_id=$this->session->userdata('city_id');
//        $country_id=$this->session->userdata('country_id');
//        if($contact==1){
//            $where ='franchise_id = '.$franchise_id.' AND ' ;
//        }
//        if($contact==2){
//            $where ='city_id = '.$city_id.' AND ' ;
//        }
//        if($contact==3){
//            $where ='country_id = '.$country_id.' AND ' ;
//        }
//      $data['active_link']='sales';
//      $data['active_sub_link']='contact';
//      $eid= $this->session->userdata('user_id');
//      $where.='customer.create_employee_id = '.$eid;
//      
//       $data['contact'] = $this->web->get_data('','customer',$where);
//       //echo '<pre>';print_r($data['contact']);exit;
//        $this->load->view('admin/sales/contact',$data);
//    }
    function add_contact() {
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'add_contact';
        
        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['is_contact'] = 1;
        }


        $this->form_validation->set_rules('fname', 'name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('country_a', 'Country', 'required');
//        $this->form_validation->set_rules('city', 'City', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/sales/add', $data);
        } else {
            $data = array();
            $data['name'] = $this->input->post('fname');
            $data['phone'] = $this->input->post('phone');
            $data['email'] = $this->input->post('email');
            $data['country'] = $this->input->post('country_a');
            $data['state'] = $this->input->post('state_a');
            $data['city'] = $this->input->post('city_a');
            $data['postal_code'] = $this->input->post('code');
            $data['shipping'] = $this->input->post('address');
            $eid = $this->session->userdata('user_id');
            $data['create_employee_id'] = $eid;
            $data['employee_id'] = $eid;
            $data['contact_customer'] = 'contact';
            $data['is_created_contact'] = 1;
            
            $data['type'] = 'open';


            $checkbox = $this->input->post('checkbox');
            
            if ($checkbox == false) {
                $data['b_country'] = $this->input->post('b_country');
                $data['b_state'] = $this->input->post('b_state');
                $data['b_city'] = $this->input->post('b_city');
                $data['b_postal_code'] = $this->input->post('b_code');
                $data['b_shipping'] = $this->input->post('b_address');
            } else {
                $data['b_country'] = $this->input->post('country_a');
                $data['b_state'] = $this->input->post('state_a');
                $data['b_city'] = $this->input->post('city_a');
                $data['b_postal_code'] = $this->input->post('code');
                $data['b_shipping'] = $this->input->post('shipping');
            }
            
            if ($this->session->userdata('user_type') == 'company') {
                $data['company_id'] = $eid;
                $data['franchise_id'] = get_sub_company_id($eid);
                $data['employee_id'] = 0;
            }
            $this->web->insert_data($data, 'customer');

            redirect(base_url() . 'index.php/admin/sales/');
        }

//        $this->load->view('admin/sales/add',$data);
    }

    function edit_contact($id, $type='') {
        if (!$id) {
            show_404();
            exit;
        }
        if ($type != 'open') {
            show_404();
        }
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'edit_contact';

        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['is_contact'] = 1;
        }


        $this->form_validation->set_rules('fname', 'name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('country_a', 'Country', 'required');
//        $this->form_validation->set_rules('city', 'City', 'required');
        if ($this->form_validation->run() == FALSE) {
//            $data['active_link'] = 'sales';
//            $data['active_sub_link'] = 'add_contact';
            $data['contact'] = $this->web->get_data('', 'customer', array('customer.id' => $id));
            $this->load->view('admin/sales/edit', $data);
        } else {
            $data = array();
            $data['name'] = $this->input->post('fname');
            $data['phone'] = $this->input->post('phone');
            $data['email'] = $this->input->post('email');
            $data['country'] = $this->input->post('country_a');
            $data['state'] = $this->input->post('state_a');
            $data['city'] = $this->input->post('city_a');
            $data['postal_code'] = $this->input->post('code');
            $data['shipping'] = $this->input->post('address');
            $eid = $this->session->userdata('user_id');
            $data['create_employee_id'] = $eid;
            $data['type'] = 'open';


            $checkbox = $this->input->post('checkbox');
            
            if ($checkbox == false) {
                $data['b_country'] = $this->input->post('b_country');
                $data['b_state'] = $this->input->post('b_state');
                $data['b_city'] = $this->input->post('b_city');
                $data['b_postal_code'] = $this->input->post('b_code');
                $data['b_shipping'] = $this->input->post('b_address');
            } else {
                $data['b_country'] = $this->input->post('country_a');
                $data['b_state'] = $this->input->post('state_a');
                $data['b_city'] = $this->input->post('city_a');
                $data['b_postal_code'] = $this->input->post('code');
                $data['b_shipping'] = $this->input->post('shipping');
            }
            $this->web->update_data('', 'customer', $data, array('type' => $type, 'id' => $id));

            redirect(base_url() . 'index.php/admin/sales/');
        }

//        $this->load->view('admin/sales/add',$data);
    }

    function appointment() {
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'appointment';
        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['is_contact'] = 1;
        }
        $eid = $this->session->userdata('user_id');
        $select = array('customer.id as cus_id,customer.name,customer.phone,appointment.*', false);
        $joins = array();
        $joins[] = array('customer', 'customer.id = appointment.customer_id', 'inner');
        $where = array('customer.employee_id' => $eid);
        if ($this->session->userdata('user_type') == 'company') {
            $where = array('customer.company_id' => $eid);
        }

        $data['appointment'] = $this->web->get_data('', 'appointment',$where , $select, '', '', '', $joins);
        $this->load->view('admin/sales/appointment', $data);
    }

    function set_appointment($id = '') {
        if ($id == "") {
            show_404();
        }
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'appointment';
        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['is_contact'] = 1;
        }

        $this->form_validation->set_rules('assigned_to', 'Assigned to', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['customer'] = $this->web->get_data($id, 'customer');
            if (empty($data['customer'])) {
                show_404();
            }
            $this->load->view('admin/sales/add_appointment', $data);
        } else {
            
            $customer_data = $this->web->get_data($id, 'customer');
            if(empty($customer_data)){
                show_404();
            }
            $data = array();
            if (isset($_FILES['file_attach']['name']) != '') {
                $image = $_FILES['file_attach']['name'];
//                print_r($image);exit;
                $image = time() . '_' . $image;
                $name_ext = end(explode(".", basename($_FILES['file_attach']['name'])));
                $original_path = 'uploads/appointment/';
                $path = $original_path . $image;
                if (move_uploaded_file($_FILES['file_attach']['tmp_name'], $path)) {
                    $source_image_path1 = $original_path;
                    $source_image_name1 = $image;
//                resize_crop_image_new(72, 72, $source_image_path1, $source_image_name1, 'u_', $name_ext, 72 * 2, 72 * 2, true);
                    create_thumbs_new($source_image_path1, $source_image_name1, 'u_' . $image, 300, 300);
//                @unlink($original_path . $image);
                    $data['file'] = $image;
                }
            }
            

            $data['status'] = $this->input->post('status');
            $data['assigned_to'] = $this->input->post('assigned_to');
            $date_time = $this->input->post('dates');
            $data['date_time'] = date('Y-m-d', strtotime($date_time));

            $data['timet'] = $this->input->post('time');
            $data['reminder'] = $this->input->post('reminder');
            $data['aa_task'] = $this->input->post('aa_task');
            $data['venue_add'] = $this->input->post('venue_add');
            $data['comment'] = $this->input->post('comment');
            $data['appointment_type'] = $this->input->post('appointment_type');
            $data['customer_id'] = $id;

//            print_r($data);exit;

            $data2 = array();
            if($customer_data[0]->type!='lead')
            $data2['type'] = 'prospect';
            $this->web->insert_data($data, 'appointment');
            $this->web->update_data('', 'customer', $data2, array('type' => 'open', 'id' => $id));

            redirect(base_url() . 'index.php/admin/sales/appointment');
        }
    }

    function edit_appointment($id, $ap_id) {
        if ($id == "") {
            show_404();
        }
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'appointment';
        
        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['is_contact'] = 1;
        }

        $this->form_validation->set_rules('assigned_to', 'Assigned to', 'required');
        if ($this->form_validation->run() == FALSE) {

            $data['customer'] = $this->web->get_data($id, 'customer');
            if (empty($data['customer'])) {
                show_404();
            }
            $data['appointment'] = $this->web->get_data($ap_id, 'appointment');
            if (empty($data['appointment'])) {
                show_404();
            }
            $this->load->view('admin/sales/edit_appointment', $data);
        } else {
            $data = array();
            if (isset($_FILES['file_attach']['name']) != '') {
                $image = $_FILES['file_attach']['name'];
//                print_r($image);exit;
                $image = time() . '_' . $image;

                $name_ext = end(explode(".", basename($_FILES['file_attach']['name'])));
                $original_path = 'uploads/appointment/';
                $path = $original_path . $image;
                if (move_uploaded_file($_FILES['file_attach']['tmp_name'], $path)) {
                    $source_image_path1 = $original_path;
                    $source_image_name1 = $image;
//                resize_crop_image_new(72, 72, $source_image_path1, $source_image_name1, 'u_', $name_ext, 72 * 2, 72 * 2, true);
                    create_thumbs_new($source_image_path1, $source_image_name1, 'u_' . $image, 300, 300);
//                @unlink($original_path . $image);
                    $data['file'] = $image;
                }
//                echo $image;exit;
            }

            $data['status'] = $this->input->post('status');
            $data['assigned_to'] = $this->input->post('assigned_to');
            $date_time = $this->input->post('dates');
            $data['date_time'] = date('Y-m-d', strtotime($date_time));

            $data['timet'] = $this->input->post('time');
            $data['reminder'] = $this->input->post('reminder');
            $data['aa_task'] = $this->input->post('aa_task');
            $data['venue_add'] = $this->input->post('venue_add');
            $data['comment'] = $this->input->post('comment');
            $data['appointment_type'] = $this->input->post('appointment_type');
            $data['customer_id'] = $id;
            //print_r($data);exit;
            $this->web->update_data($ap_id, 'appointment', $data);

            redirect(base_url() . 'index.php/admin/sales/appointment');
        }
    }

    function leads() {
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'leads';
        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['is_contact'] = 1;
        }

        $eid = $this->session->userdata('user_id');
        $select = 'customer.*,employees.firstname,employees.lastname';
        $joins[] = array('employees', 'employees.id =customer.create_employee_id', 'left');
        $where = 'employees.id =' . $eid . ' And lead_status != "completed" And lead_status != ""';
        $data['leads'] = $this->web->get_data('', 'customer', $where, $select, '', "", "", $joins, "");

        //echo '<pre>';print_r($data['contact']);exit;
        $this->load->view('admin/sales/leads', $data);
    }

    function add_lead($cus_id = '') {
        if (empty($cus_id)) {
            show_404();
        }
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'add_lead';
        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['is_contact'] = 1;
        }


        $this->form_validation->set_rules('lead_status', 'Lead Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $fran_id = $this->session->userdata('franchise_id');
            $data['customer'] = $this->web->get_data('', 'customer', array('id' => $cus_id), '', '', "", "", '', "");
            $data['employee'] = $this->web->get_data('', 'employees', array('franchise_id' => $fran_id), '', '', "", "", '', "");
//            print_r($data);exit;
            $this->load->view('admin/sales/add_leads', $data);
        } else {
            $data = array();
//            $data['name'] = $this->input->post('name');
            $data['lead_contact'] = $this->input->post('phone');
            $data['employee_id'] = $this->input->post('sales_rep');
            $data['lead_status'] = $this->input->post('lead_status');
            $data['coments'] = $this->input->post('comments');
//            $data['customer_id']= $cus_id;
            $data['customer_type'] = $this->input->post('customer_type');
            $data['type'] = 'lead';
//            $this->web->insert_data($data, 'lead');
            $this->web->update_data($cus_id, 'customer', $data);


            redirect(base_url() . 'index.php/admin/sales/leads');
        }
    }

    function edit_lead($cus_id = '') {
        if (empty($cus_id)) {
            show_404();
        }
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'leads';
        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['is_contact'] = 1;
        }

        $fran_id = $this->session->userdata('franchise_id');
        $this->form_validation->set_rules('lead_status', 'Lead Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['customer'] = $this->web->get_data('', 'customer', array('id' => $cus_id), '', '', "", "", '', "");
            $data['employee'] = $this->web->get_data('', 'employees', array('franchise_id' => $fran_id), '', '', "", "", '', "");
            $eid = $this->session->userdata('user_id');
            $select = 'customer.*,employees.firstname,employees.lastname';
            $joins[] = array('employees', 'employees.id =customer.create_employee_id', 'left');
            $data['lead'] = $this->web->get_data('', 'customer', array('customer.id' => $cus_id), $select, '', "", "", $joins, "");
            $this->load->view('admin/sales/edit_leads', $data);
        } else {
            $data = array();
//            $data['name'] = $this->input->post('name');
            $data['lead_contact'] = $this->input->post('phone');
            $data['employee_id'] = $this->input->post('sales_rep');
            $data['lead_status'] = $this->input->post('lead_status');
            $data['coments'] = $this->input->post('comments');
//            $data['customer_id']= $cus_id;
            $data['customer_type'] = $this->input->post('customer_type');
            $where = 'lead_status != "completed" And customer.id=' . $cus_id;
            $this->web->update_data('', 'customer', $data, $where);

            redirect(base_url() . 'index.php/admin/sales/leads');
        }
    }

    function cus_sales() {
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'sales';
        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['is_contact'] = 1;
        }
        
        $eid = $this->session->userdata('user_id');
        $where = 'employees.company_id =' . $eid . ' And employees.type = "employee"';
        $employees_array= $this->web->get_data('', 'employees', $where,'employees.id', '', "", "",'', "");
        $employees_array = fetch_single_element_from_array($employees_array,'id');
        $employees_array = implode($employees_array, "' , '");
        $employees_array = "'" . $employees_array . "'";

//        print_r($employees_array);exit;
        $select = 'customer.*,employees.firstname,employees.lastname';
        $joins[] = array('employees', 'employees.id =customer.create_employee_id', 'left');
//        $where = 'employees.id =' . $eid . ' And lead_status = "completed"';
        $where = 'employees.id =' . $eid . ' ';
        $where .= ' OR employees.id in (' . $employees_array . ') ';
        $data['sales'] = $this->web->get_data('', 'customer', $where, $select, '', "", "", $joins, "");
//    echo '<pre>';
//        print_r($data['sales']);exit;
        $this->load->view('admin/sales/sales', $data);
    }

    function shipment_history($cus_id) {
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'sales';
        $eid = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['is_contact'] = 1;
        }

        $select = 'customer.*';
        $where = 'customer.id =' . $cus_id;
        $data['customer'] = $this->web->get_data('', 'customer', $where, $select, '', "", "", "", "");

        $select = 'customer.*,shippments.*,shippments.id as ship_id';
        $joins[] = array('customer', 'customer.id =shippments.customer_id', 'inner');
        $where = 'customer.id =' . $cus_id;
        $data['shipment_history'] = $this->web->get_data('', 'shippments', $where, $select, '', "", "", $joins, "");

        $select = array('count(shippments.delivered_on)as deliver', false);
        $data['deliveries'] = $this->web->get_data('', 'shippments', $where, $select, '', "", "", $joins, "");

        $select = array('sum(shippments.price)as price', false);
        $data['prices'] = $this->web->get_data('', 'shippments', $where, $select, '', "", "", $joins, "");

        $select = array('sum(shippments.weight)as weigh', false);
        $data['weight'] = $this->web->get_data('', 'shippments', $where, $select, '', "", "", $joins, "");

        $this->load->view('admin/sales/shipment_history', $data);
    }
    function customer_shipment_detail($ship_id=0) {
        if($ship_id==0)
        {
            show_404();
        }
        $data['active_link'] = 'sales';
        $data['active_sub_link'] = 'sales';
        $eid = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') == 'company') {
            $data['active_link'] = 'contacts';
            $data['is_contact'] = 1;
        }

//        $select = 'customer.*';
//        $where = 'customer.id =' . $cus_id;
//        $data['customer'] = $this->web->get_data('', 'customer', $where, $select, '', "", "", "", "");

        $select = 'customer.*,shippments.*,shippments.id as ship_id';
        $joins[] = array('customer', 'customer.id =shippments.customer_id', 'inner');
//        $where = 'customer.id =' . $cus_id;
        $where = 'shippments.id =' . $ship_id;
        $data['cus_shipment_detail'] = $this->web->get_data('', 'shippments', $where, $select, '', "", "", $joins, "");
        
        if(empty($data['cus_shipment_detail']))
            show_404 ();
        
        $select = 'shipment_unit.*,shippments.weight_unit,shippments.dimension_unit,shippments.currency_unit';
        $where = 'shipment_unit.shipment_id =' . $ship_id;
        $joins = array();
        $joins[] = array('shippments', 'shippments.id = shipment_unit.shipment_id', 'inner');
        $data['cus_shipment_unit'] = $this->web->get_data('', 'shipment_unit', $where, $select, '', "", "", $joins, "");
        
        $select = 'shipment_goods.*,shipment_goods.id as good_id';
        $where = 'shipment_goods.shipment_id =' . $ship_id;
        $joins = array();
        $joins[] = array('shippments', 'shippments.id = shipment_goods.shipment_id', 'inner');
        $data['cus_shipment_good'] = $this->web->get_data('', 'shipment_goods', $where, $select, '', "", "", $joins, "");

        $this->load->view('admin/sales/customer_shipment_detail', $data);
    }

}
