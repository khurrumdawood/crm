
<?php

class Zone extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->require_admin_login();
        $this->load->model('admin_model', 'web');
        $this->layout = 'admin_inner';
        $this->load->library('Datatables');
        $this->load->library('table');
    }

    function index() {

        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'zone_list';
        $data['table_text'] = 'Zones';
        $data['page_text'] = 'Zones<small>List of Zones</small>';
        $data['active_sub_link'] = 'zones';
        $data['no_left'] = 1;
        $data['table_url'] = base_url() . 'admin/zone/zonedatatable/';
        


        $data['add_button'] = array('url' => base_url() . 'admin/zone/add_zone', 'btn_title' => 'Add New Zone');
        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading("Id", "Name", "Edit", "Delete","Countries");

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />', '<input type="text" name="name" placeholder="Name" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function zonedatatable() {
        $select = 'id,name';
        $where = '';
        $generate = $this->web->get_dt_data('', 'zone', $where, $select);

        $generate['aaData'] = $this->admin_prepare_zone($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_zone($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $edit = '<a href="' . base_url() . 'admin/zone/edit_zone/' . $data[0] . '">Edit</a>';
                $delete = '<a href="' . base_url() . 'admin/zone/delete_zone/' . $data[0] . '" onclick="return confirm(\'Are you sure you want to delete this category?\');" >Delete</a>';
                $countries = '<a href="' . base_url() . 'admin/zone_countries/index/' . $data[0] . '" >View</a>';
                
                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $edit;
                $rs[] = $delete;
                $rs[] = $countries;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function add_zone() {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'zone_list';
            $data['active_sub_link'] = 'contact';
        $data['no_left'] = 1;

            $this->load->view('admin/zone/add', $data);
        } else {
            $data['name'] = $this->input->post('name');
            $this->web->insert_data($data, 'zone');

            redirect(base_url() . 'index.php/admin/zone');
        }
    }

    function edit_zone($id = 0) {
        if ($id == 0) {
            show_404();
        }
        $this->form_validation->set_rules('name', 'Name', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'zone_list';
            $data['active_sub_link'] = 'contact';
            $data['no_left'] = 1;

            $data['table_text'] = 'Edit Zone';
            $data['page_text'] = 'Zones';

            $data['zone_data'] = $this->web->get_data($id, 'zone');
            $this->load->view('admin/zone/edit', $data);
        } else {
            $data['name'] = $this->input->post('name');

            $this->web->update_data($id, 'zone', $data);

            redirect(base_url() . 'index.php/admin/zone');
        }
    }

    function delete_zone($id = 0) {
        if ($id == 0)
            show_404();
        $this->data = new stdClass();
        $this->web->delete_data($id, 'zone');

        redirect(base_url() . 'admin/zone/');

        $this->output->enable_profiler(FALSE);
    }

    
    function map()
    {
        $data = array('base_url'=>base_url(),
              'latitude'=>'',
              'longitude'=>'');

//echo http_build_query($data) . "\n";
echo http_build_query($data, '', '&amp;');
//        redirect(base_url() . 'maps.php');
    }
}
