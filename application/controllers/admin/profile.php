<?php

class Profile extends CI_Controller {

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
        $this->load->model('simple_model', 'simple');
        $this->layout = 'admin_inner';
//        $this->load->library('form_validation');
//        $this->load->model('recycle_model', 'simple');
        $this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
        error_reporting(E_ALL);
        ini_set('display_errors', true);
    }

    function index() {
        $data['active_link'] = 'management';
        $data['active_sub_link'] = 'staff';
        $data['table_url'] = base_url() . 'index.php/admin/profile/datatable';
        $data['table_title'] = 'Profile (<a href="javascript:void(0);" onclick="history.go(-1);" style="color:white"><u>Back</u></a>)';
        $data['add_button'] = array('url' => base_url() . 'admin/profile/Add', 'btn_title' => 'Add New Profile');
        $tmpl = array('table_open' => '<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_2">');
        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Full Name', 'Email', 'Created at', 'Updated at', 'Status', 'Actions');

        $this->load->view('admin/list', $data);
    }

    function datatable() {
        $this->datatables->select('id, full_name, email, created_at, updated_at, is_active,is_super', false)
                ->from('gamnification_user');

        $generate = $this->datatables->generate();

        $generate['aaData'] = $this->admin_prepare_profile($generate['aaData']);
        echo json_encode($generate);
        exit;
//        print_r($generate['aaData']);exit;
    }

    function admin_prepare_profile($datas) {
        $re = array();
        $user_id = $this->session->userdata('user_id');
        $is_admin_super = get_admin_super($this->session->userdata('user_id'));
        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();
                if ($is_admin_super == 1) {
                    if ($data[6] == 0) {
                        $active = '<a class="status_activate" att_url="profile" att_id="' . $data[0] . '" href="javascript:void(0)">';
                        $active .= ($data[5] == 1) ? 'Active' : 'Reactivate';
                        $active .= '</a>';

                        $action = '<a href="' . base_url() . 'admin/profile/update/' . $data[0] . '">Edit</a> &nbsp; | &nbsp;';
                        $action .= '<a href="' . base_url() . 'admin/profile/delete/' . $data[0] . '" onclick="return confirm(\'Are you sure you want to delete this profile?\');">Delete</a>';
                    } else {
                        $active = '';

                        $action = '<a href="' . base_url() . 'admin/profile/update/' . $data[0] . '">Edit</a>';
                    }
                }else{
                    if ($data[0] == $user_id) {
                        $active = '<a class="status_activate" att_url="profile" att_id="' . $data[0] . '" href="javascript:void(0)">';
                        $active .= ($data[5] == 1) ? 'Active' : 'Reactivate';
                        $active .= '</a>';

                        $action = '<a href="' . base_url() . 'admin/profile/update/' . $data[0] . '">Edit</a> &nbsp; | &nbsp;';
                        $action .= '<a href="' . base_url() . 'admin/profile/delete/' . $data[0] . '" onclick="return confirm(\'Are you sure you want to delete this profile?\');">Delete</a>';
                    } else {
                        $active = '';
                        $action = '';
                    }
                    
                }

                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];
                $rs[] = $active;
                $rs[] = $action;
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function Delete($id = 0) {
        if ($id == 0)
            show_404();
        $this->data = new stdClass();
        $this->simple->delete_data($id, 'profile');
        redirect(base_url() . 'admin/profile');

        $this->output->enable_profiler(FALSE);
    }

    function ChangeStatus() {
        $id = $this->input->post('id');
        $status_data = $this->simple->get_data($id, 'gamnification_user');
        if ($status_data[0]->is_active == 0) {
            $this->simple->update_data($id, 'gamnification_user', array('is_active' => 1));
            echo '1';
            exit;
        }
        if ($status_data[0]->is_active == 1) {
            $this->simple->update_data($id, 'gamnification_user', array('is_active' => 0));
            echo '0';
            exit;
        }
    }

    function Detailview($id) {
        $this->data = new stdClass();
        $this->data->artists = $this->Artist->Edit($id);

        $this->load->view('admin/artist/detailview', $this->data);
    }

    public function update() {
        $id=$this->require_admin_login();
        if ($id == 0)
            show_404();
        $this->form_validation->set_rules('email', 'Email', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['profiles'] = $this->simple->get_data($id, 'employees');
            if ($data['profiles'] == 0)
                redirect(base_url() . 'index.php/admin/profile');

            $data['active_link'] = 'profile';
            $this->load->view('admin/profile/edit', $data);
        } else {
            $data['full_name'] = $this->input->post('full_name');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $data['updated_at'] = trim(date("Y-m-d H:i:s"));
            $this->simple->update_data($id, 'gamnification_user', $data);

            redirect(base_url() . 'index.php/admin/profile');
        }
    }

    public function Add() {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'profile';
            $this->load->view('admin/profile/add', $data);
        } else {
            $data['full_name'] = $this->input->post('full_name');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $this->simple->insert_data($data, 'gamnification_user');

            redirect(base_url() . 'index.php/admin/profile');
        }
    }
    
    
    

}
