<?php

class Carrier_packges extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->require_admin_login();
        $this->load->model('admin_model', 'web');
        $this->layout = 'admin_inner';
        $this->load->library('Datatables');
        $this->load->library('table');
    }

    function index($company_id=0) {
        if($company_id==0)
            show_404 ();

        $data['back_button'] = array('url' => base_url().'index.php/admin/zones', 'btn_title' => 'Back', 'onclick' => '');
        $data['active_link'] = 'zones';
        $data['table_text'] = 'Companies';
        $data['page_text'] = 'Companies<small>List of Couriers\' Companies</small>';
        $data['active_sub_link'] = 'zones';
        $data['table_url'] = base_url() . 'admin/carrier_packges/carrier_packgesdatatable/'.$company_id;

        $data['add_button'] = array('url' => base_url() . 'admin/carrier_packges/add_carrier_packges/'.$company_id, 'btn_title' => 'Add New Carrier Packges');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading("Id", "name", "Edit", "Delete");

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />', '<input type="text" name="company_id" placeholder="company_id" class="search_init" />', '<input type="text" name="name" placeholder="name" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function carrier_packgesdatatable($company_id=0) {
        if($company_id==0)
            show_404 ();
        $select = 'id,company_id,name';
        $where = array();
        $where['company_id'] = $company_id;
        $generate = $this->web->get_dt_data('', 'carrier_packges', $where, $select);

        $generate['aaData'] = $this->admin_prepare_carrier_packges($generate['aaData'],$company_id);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_carrier_packges($datas,$company_id) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $edit = '<a href="' . base_url() . 'admin/carrier_packges/edit_carrier_packges/' . $data[0].'/'.$company_id . '">Edit</a>';
                $delete = '<a href="' . base_url() . 'admin/carrier_packges/delete_carrier_packges/' . $data[0].'/'.$company_id . '" onclick="return confirm(\'Are you sure you want to delete this category?\');" >Delete</a>';
                $rs[] = $data[0];
                $rs[] = $data[2];
                $rs[] = $edit;
                $rs[] = $delete;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function add_carrier_packges($company_id=0) {
        
        if($company_id==0)
        {
            show_404();
        }

        $this->form_validation->set_rules('name', 'name', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'zones';
            $data['active_sub_link'] = 'contact';

            $this->load->view('admin/carrier_packges/add', $data);
        } else {
            $data['company_id'] = $company_id;
            $data['name'] = $this->input->post('name');
            $this->web->insert_data($data, 'carrier_packges');

            redirect(base_url() . 'index.php/admin/carrier_packges/index/'.$company_id);
        }
    }

    function edit_carrier_packges($id = 0,$company_id=0) {
        if ($id == 0) {
            show_404();
        }
        if ($company_id == 0) {
            show_404();
        }
        $this->form_validation->set_rules('name', 'name', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'zones';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Edit Courier Company';
            $data['page_text'] = 'Zones';

            $data['carrier_packges_data'] = $this->web->get_data($id, 'carrier_packges');
            $this->load->view('admin/carrier_packges/edit', $data);
        } else {
            $data['name'] = $this->input->post('name');

            $this->web->update_data($id, 'carrier_packges', $data);

            redirect(base_url() . 'index.php/admin/carrier_packges/index/'.$company_id);
        }
    }

    function delete_carrier_packges($id = 0,$company_id=0) {
        if ($id == 0)
            show_404();
        if ($company_id == 0)
            show_404();
        $this->data = new stdClass();
        $this->web->delete_data($id, 'carrier_packges');

        redirect(base_url() . 'admin/carrier_packges/index/'.$company_id);

        $this->output->enable_profiler(FALSE);
    }

}
