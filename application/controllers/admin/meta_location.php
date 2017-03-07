<?php

class Meta_location extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->require_admin_login();
        $this->load->model('admin_model', 'web');
        $this->layout = 'admin_inner';
        $this->load->library('Datatables');
        $this->load->library('table');
    }

    function index($country_id=0,$state_id=0) {

        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'countries';
        $data['table_text'] = 'Countries';
        $data['page_text'] = 'Countries<small>List of Countries</small>';
        $data['no_left'] = 1;
        $data['table_url'] = base_url() . 'admin/meta_location/meta_locationdatatable/';

        $data['add_button'] = array('url' => base_url() . 'admin/meta_location/add_meta_location', 'btn_title' => 'Add New Country');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading("ID", "Name" ,"States" , "Edit", "Delete");

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="ID" class="search_init" />', '<input type="text" name="name" placeholder="Name" class="search_init" />', '<input type="text" name="type" placeholder="type" class="search_init" />'
        );
        
        if($country_id!=0)
        {
            $country_data = $this->web->get_data($country_id,'meta_location');
            
            if(empty($country_data))
                show_404 ();
            
            $data['back_button'] = array('url' =>  base_url().'admin/meta_location', 'btn_title' => 'Back');
            
            $country_name = $country_data[0]->name;
            $data['table_text'] = 'States';
            $data['page_text'] = "States<small>States of <q>$country_name</q></small>";
            $data['add_button'] = array('url' => base_url() . 'admin/meta_location/add_meta_location/'.$country_id, 'btn_title' => 'Add New State');
            $data['table_url'] = base_url() . 'admin/meta_location/meta_locationdatatable/'.$country_id;
            $this->table->set_heading("ID", "Name" ,"Cities" , "Edit", "Delete");

        }
        if($state_id!=0)
        {
            $state_data = $this->web->get_data($state_id,'meta_location');
            
            if(empty($state_data))
                show_404 ();
            
            $data['back_button'] = array('url' =>  base_url().'admin/meta_location/index/'.$state_data[0]->in_location, 'btn_title' => 'Back');
            $state_name = $state_data[0]->name;
            $data['table_text'] = 'Cities';
            $data['page_text'] = "Cities<small>Cities of <q>$state_name</q></small>";
            $data['add_button'] = array('url' => base_url() . 'admin/meta_location/add_meta_location/0/'.$state_id, 'btn_title' => 'Add New City');
            
            $data['table_url'] = base_url() . 'admin/meta_location/meta_locationdatatable/0/'.$state_id;

            $this->table->set_heading("ID", "Name" , "Edit", "Delete");

        }

        $this->load->view('admin/list', $data);
    }

    function meta_locationdatatable($country_id=0,$state_id=0) {
        $select = 'id,name,type';
        $where = array();
        $where['type'] = 'CO';
        if($country_id!=0)
        {
            $where['type'] = 'RE';
            $where['in_location'] = $country_id;
        }
        if($state_id!=0)
        {
            $where['type'] = 'CI';
            $where['in_location'] = $state_id;
        }
        $generate = $this->web->get_dt_data('', 'meta_location', $where, $select);

        $generate['aaData'] = $this->admin_prepare_meta_location($generate['aaData'],$country_id,$state_id);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_meta_location($datas,$country_id=0,$state_id=0) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();
                
                $edit = '<a href="' . base_url() . 'admin/meta_location/edit_meta_location/' . $data[0] . '">Edit</a>';
                $delete = '<a href="' . base_url() . 'admin/meta_location/delete_meta_location/' . $data[0] . '" onclick="return confirm(\'Are you sure you want to delete this category?\');" >Delete</a>';
                $sub_list = '<a href="' . base_url() . 'admin/meta_location/index/' . $data[0] . '">View</a>';
                if($country_id!=0)
                {
                    $sub_list = '<a href="' . base_url() . 'admin/meta_location/index/0/' . $data[0] . '">View</a>';
                    $delete = '<a href="' . base_url() . 'admin/meta_location/delete_meta_location/' . $data[0].'/'.$country_id . '" onclick="return confirm(\'Are you sure you want to delete this category?\');" >Delete</a>';
                    $edit = '<a href="' . base_url() . 'admin/meta_location/edit_meta_location/' . $data[0].'/'.$country_id . '">Edit</a>';
                }
                if($state_id!=0)
                {
                    $delete = '<a href="' . base_url() . 'admin/meta_location/delete_meta_location/' . $data[0].'/0/'.$state_id . '" onclick="return confirm(\'Are you sure you want to delete this category?\');" >Delete</a>';
                    $edit = '<a href="' . base_url() . 'admin/meta_location/edit_meta_location/' . $data[0].'/0/'.$state_id . '">Edit</a>';
                }
                $rs[] = $data[0];
                $rs[] = $data[1];
                if($state_id==0){
                    $rs[] = $sub_list;
                }
                $rs[] = $edit;
                $rs[] = $delete;
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function add_meta_location($country_id=0,$state_id=0) {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'countries';
            $data['no_left'] = 1;
            $this->load->view('admin/meta_location/add', $data);
        } else {
            $data['name'] = $this->input->post('name');
            $data['type'] = 'CO';
            if($country_id!=0){
                $data['in_location'] = $country_id;
                $data['type'] = 'RE';
            }

            if($state_id!=0){
                $data['in_location'] = $state_id;
                $data['type'] = 'CI';
            }

            $this->web->insert_data($data, 'meta_location');
            
            if($country_id==0&&$state_id==0){
                redirect(base_url() . 'index.php/admin/meta_location');
            }
            if($country_id!=0){
                $country_data = $this->web->get_data($country_id,'meta_location');
                redirect(base_url() . 'index.php/admin/meta_location/index/'.$country_data[0]->id);
            }

            if($state_id!=0){
                $state_data = $this->web->get_data($state_id,'meta_location');
                redirect(base_url() . 'index.php/admin/meta_location/index/0/'.$state_data[0]->id);
            }

        }
    }

    function edit_meta_location($id = 0,$country_id=0,$state_id=0) {
        if ($id == 0) {
            show_404();
        }
        $this->form_validation->set_rules('name', 'Name', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'countries';
            $data['no_left'] = 1;
            $data['table_text'] = 'Edit Courier Company';
            $data['page_text'] = 'Zones';

            $data['meta_location_data'] = $this->web->get_data($id, 'meta_location');
            $this->load->view('admin/meta_location/edit', $data);
        } else {
            $data['name'] = $this->input->post('name');

            $this->web->update_data($id, 'meta_location', $data);
            
            
            if($country_id==0&&$state_id==0){
                redirect(base_url() . 'index.php/admin/meta_location');
            }
            if($country_id!=0){
                $country_data = $this->web->get_data($country_id,'meta_location');
                redirect(base_url() . 'index.php/admin/meta_location/index/'.$country_data[0]->id);
            }

            if($state_id!=0){
                $state_data = $this->web->get_data($state_id,'meta_location');
                redirect(base_url() . 'index.php/admin/meta_location/index/0/'.$state_data[0]->id);
            }
            redirect(base_url() . 'index.php/admin/meta_location');
        }
    }

    function delete_meta_location($id = 0,$country_id=0,$state_id=0) {
        if ($id == 0)
            show_404();
        $this->data = new stdClass();
        $this->web->delete_data($id, 'meta_location');
        
        if($country_id==0&&$state_id==0){
                redirect(base_url() . 'index.php/admin/meta_location');
            }
            if($country_id!=0){
                $country_data = $this->web->get_data($country_id,'meta_location');
                redirect(base_url() . 'index.php/admin/meta_location/index/'.$country_data[0]->id);
            }

            if($state_id!=0){
                $state_data = $this->web->get_data($state_id,'meta_location');
                redirect(base_url() . 'index.php/admin/meta_location/index/0/'.$state_data[0]->id);
            }

        redirect(base_url() . 'admin/meta_location/');

        $this->output->enable_profiler(FALSE);
    }

}
