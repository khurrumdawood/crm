<?php

class Notifications extends CI_Controller {

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

        $data['active_link'] = 'notify';
        $data['active_sub_link'] = 'notification';
        $data['table_url'] = base_url() . 'admin/notifications/datatable';
        $data['add_button'] = array('url' => base_url() . 'admin/notifications/add_notification', 'btn_title' => 'Add Notification');
        
        $data['table_text'] = 'Notifications';
        $data['page_text'] = 'Notifications<small>Notifications for "Companies and Sub-companies"</small>';

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Subject', 'Description', 'Created Date', 'Detail');

        $this->table->set_footer(
                '<input type="text" name="name" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Subject" class="search_init" />'
                , '<input type="text" name="name" placeholder="Description" class="search_init" />'
                , '<input type="text" name="name" placeholder="Created Date" class="search_init" />'
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


        $select = 'id, title, description, created_at';

        $generate = $this->web->get_dt_data('', 'notifications_header', array('master_id' => $eid), $select);
        $generate['aaData'] = $this->admin_prepare_notification($generate['aaData']);
        echo json_encode($generate);
        exit;
//        print_r($generate['aaData']);exit;
    }

    function admin_prepare_notification($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $detail = '<a href="' . base_url() . 'admin/notifications/com_sub_com/' . $data[0] . '">Detail</a>';

                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = date("jS F Y", strtotime($data[3]));
                $rs[] = $detail;
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function com_sub_com($noti_id = '') {
        if ($noti_id == '')
            show_404();

        
        $data['table_text'] = 'Notifications';
        $data['page_text'] = 'Notifications<small>Notifications for "Companies and Sub-companies"</small>';

        $data['active_link'] = 'notify';
        $data['active_sub_link'] = 'appointment';
        $data['table_url'] = base_url() . 'admin/notifications/com_datatable/' . $noti_id;

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Company Name', 'Franchise Name', 'Created Date');

        $this->table->set_footer(
                '<input type="text" name="name" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Subject" class="search_init" />'
                , '<input type="text" name="name" placeholder="Description" class="search_init" />'
                , '<input type="text" name="name" placeholder="Created Date" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function com_datatable($noti_id = '') {
        if ($noti_id == '')
            show_404();
//      $select= array('customer.id as cus_id,customer.name,customer.phone,appointment.*', false);
//        $joins = array();
//        $joins[] = array('customer','customer.id = appointment.customer_id','inner');
//        
//        echo 'asdf';exit;
        $eid = $this->session->userdata('user_id');

//       $data['appointment'] = $this->web->get_data('','appointment',array('customer.create_employee_id' => $eid),$select,'','','',$joins);


        $select = 'notifications_detail.id, emp1.full_name as emp_name_1, emp2.full_name emp_name_2, notifications_detail.created_at';
        $joins = array();
        $joins[] = array('employees emp1', 'notifications_detail.company_id = emp1.id and emp1.type="company" ', 'left');
        $joins[] = array('employees emp2', 'notifications_detail.sub_company_id = emp2.id and emp2.type="sub_company" ', 'left');

        $generate = $this->web->get_dt_data('', 'notifications_detail', "notifications_detail.notifications_header_id = $noti_id", $select, '', '', '', $joins);

        $generate['aaData'] = $this->com_admin_prepare_notification($generate['aaData']);
        echo json_encode($generate);
        exit;
//        print_r($generate['aaData']);exit;
    }

    function com_admin_prepare_notification($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $detail = '<a href="' . base_url() . 'admin/user/index/community/' . $data[0] . '">Detail</a>';

                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = date("jS F Y", strtotime($data[3]));
                $rs[] = $detail;
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    public function add_notification() {
        $eid = $this->session->userdata('user_id');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'notify';
            $data['active_sub_link'] = 'notification';
            $eid = $this->session->userdata('user_id');
            $select = array('employees.*', false);
            $joins = array();
//            $joins[] = array('company', 'company.id = category.company_id', 'inner');
            $data['companies'] = $this->web->get_data('', 'employees', array('employees.master_id' => $eid, 'employees.company_id' => 0, 'employees.franchise_id' => 0), $select, '', '', '', $joins);


            $this->load->view('admin/notifications/add_notification', $data);
        } else {
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('desc');
            $data['master_id'] = $eid;
            $notification_header = $this->web->insert_data($data, 'notifications_header');


            $all_sel = $this->input->post('all_sel');
            if ($all_sel == 'all') {

                $select = array();
                $select = array('employees.*', false);
                $companies = $this->web->get_data('', 'employees', array('employees.master_id' => $eid), $select, '', '', '', '');
                foreach ($companies as $compan) {
                    $data2 = array();
                    if ($compan->type == 'company') {
                        //$data['notifications_header_id'] =2;
                        $data2['company_id'] = $compan->id;
                    }
                    if ($compan->type == 'sub_company') {
                        $data2['sub_company_id'] = $compan->id;
                    }
                    $data2['notifications_header_id'] = $notification_header;
                    $this->web->insert_data($data2, 'notifications_detail');
                }
            }

            if ($all_sel == 'sel') {
                $selected_companies = $this->input->post('comp_com');
                $selected_sub_companies = $this->input->post('comp_sub_com');
                if ($selected_companies) {
                    foreach ($selected_companies as $sel_com) {
                        $data3 = array();
                        $data3['company_id'] = $sel_com;
                        $data3['notifications_header_id'] = $notification_header;
                        $this->web->insert_data($data3, 'notifications_detail');
                    }
                }
                if ($selected_sub_companies) {
                    foreach ($selected_sub_companies as $sel_sub_com) {
                        $data3 = array();
                        $data3['sub_company_id'] = $sel_sub_com;
                        $data3['notifications_header_id'] = $notification_header;
                        $this->web->insert_data($data3, 'notifications_detail');
                    }
                }
            }



            redirect(base_url() . 'index.php/admin/notifications');
        }
    }

    public function send_notification($notify_id) {
        if (empty($notify_id)) {
            show_404();
        }
        $eid = $this->session->userdata('user_id');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'notify';
            $data['active_sub_link'] = 'notification';
            $this->load->view('admin/notifications/add_notification', $data);
        } else {
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('desc');
            $data['master_id'] = $eid;

            $this->web->insert_data($data, 'notifications_header');

            redirect(base_url() . 'index.php/admin/notifications');
        }
    }

}
