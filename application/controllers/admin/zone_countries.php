<?php

class Zone_countries extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->require_admin_login();
        $this->load->model('admin_model', 'web');
        $this->layout = 'admin_inner';
        $this->load->library('Datatables');
        $this->load->library('table');
    }

    function index($zone_id=0) {
        if($zone_id==0)
            show_404();
        
        $zone_data = $this->web->get_data($zone_id,'zone');
        if(empty($zone_data))
            show_404 ();
        
        $zone_name = $zone_data[0]->name;
        
        $data['back_button'] = array('url' => base_url() . 'admin/zone', 'btn_title' => 'Back');
        $data['active_link'] = 'zone_list';
        $data['table_text'] = "$zone_name Zone's Country";
        $data['page_text'] = "Companies<small>List of Counties of '$zone_name' Zone</small>";
        $data['active_sub_link'] = 'zones';
        $data['no_left'] = 1;

        $data['table_url'] = base_url() . 'admin/zone_countries/zone_countriesdatatable/'.$zone_id;

        $data['add_button'] = array('url' => base_url() . 'admin/zone_countries/add_zone_countries/'.$zone_id, 'btn_title' => "Add New Country In '$zone_name' zone");

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading("Id", "Name", "Edit", "Delete");

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />', '<input type="text" name="name" placeholder="Name" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function zone_countriesdatatable($zone_id=0) {
        if($zone_id==0)
            show_404 ();
        $select = 'zone_countries.id,meta_location.name';
        
        $joins = array();
        $joins[] = array('meta_location','zone_countries.country_id = meta_location.id','inner');

        
        $where = array();
        $where['zone_countries.zone_id'] = $zone_id;
        
        
        $generate = $this->web->get_dt_data('', 'zone_countries', $where, $select,'','','',$joins);

        $generate['aaData'] = $this->admin_prepare_zone_countries($generate['aaData'],$zone_id);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_zone_countries($datas,$zone_id) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $edit = '<a href="' . base_url() . 'admin/zone_countries/edit_zone_countries/' . $data[0] .'/'.$zone_id. '">Edit</a>';
                $delete = '<a href="' . base_url() . 'admin/zone_countries/delete_zone_countries/' . $data[0] . '" onclick="return confirm(\'Are you sure you want to delete this category?\');" >Delete</a>';
                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $edit;
                $rs[] = $delete;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function add_zone_countries($zone_id=0) {
        
        if($zone_id==0)
            show_404 ();
        
        $this->form_validation->set_rules('country_id', 'Name', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'zone_list';
            $data['active_sub_link'] = 'contact';
            $data['no_left'] = 1;


            $this->load->view('admin/zone_countries/add', $data);
        } else {
            $data['zone_id'] = $zone_id;
            $data['country_id'] = $this->input->post('country_id');
            $this->web->insert_data($data, 'zone_countries');

            redirect(base_url() . 'index.php/admin/zone_countries/index/'.$zone_id);
        }
    }

    function edit_zone_countries($id = 0, $zone_id=0) {
        if ($id == 0) {
            show_404();
        }
        
        if($zone_id==0)
            show_404 ();
        
        $this->form_validation->set_rules('country_id', 'Name', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'zone_list';
            $data['active_sub_link'] = 'contact';
            $data['no_left'] = 1;

            $data['table_text'] = 'Edit Courier Company';
            $data['page_text'] = 'Zones';

            $data['zone_countries_data'] = $this->web->get_data($id, 'zone_countries');
            $this->load->view('admin/zone_countries/edit', $data);
        } else {
            
            $data['country_id'] = $this->input->post('country_id');
            $this->web->update_data($id, 'zone_countries', $data);

            redirect(base_url() . 'index.php/admin/zone_countries/index/'.$zone_id);
        }
    }

    function delete_zone_countries($id = 0) {
        if ($id == 0)
            show_404();
        $this->data = new stdClass();
        $this->web->delete_data($id, 'zone_countries');

        redirect(base_url() . 'admin/zone_countries/');

        $this->output->enable_profiler(FALSE);
    }

}
