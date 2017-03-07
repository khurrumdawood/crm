<?php

class Gene extends CI_Controller {

    private $rules = array(
        array(
            'field' => 'name',
            'label' => 'Artist Name',
            'rules' => 'trim|required'
        ),
    );

    function __construct() {
        parent::__construct();
//        $this->require_admin_login();
        $this->load->model('admin_model', 'web');
        $this->layout = 'admin_inner';
        $this->load->library('Datatables');
        $this->load->library('table');


//        $this->load->library('form_validation');
//        $this->load->model('recycle_model', 'web');
    }

    function index(){
        $this->form_validation->set_rules('table', 'Table', 'required');
        $data = array();
        $data['active_link'] = 'zones';
        $data['active_sub_link'] = 'zones';
        $data['no_left'] = 1;
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('prepare_crud', $data);
        } else {
            unset($this->layout);
            $data['table'] = $this->input->post('table');
            $data['ops'] = $this->input->post('op');
            $data['ops1'] = $this->input->post('op1');
            array_shift($data['ops']);
            array_shift($data['ops1']);
            
//            $this->load->view('view_o',$data);
            
            $html = $this->load->view('prepare_crud_edit',$data,TRUE);
            $html = str_replace('<', '&lt;', $html);
            $html = str_replace('>', '&gt;', $html);
            echo '<pre><code>'.$html.'</code></pre>';
        }
        
//        exit;
    }
    
}
