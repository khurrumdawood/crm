<?php

class Admin_countries extends CI_Controller {

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

//        $this->load->library('form_validation');
//        $this->load->model('recycle_model', 'web');
        error_reporting(E_ALL);
        ini_set('display_errors', true);
    }

    function get_state($country_id) {
//        $country_id = $this->input->post('country_id');
        $id = 'state';
        $name = 'state';
        if($this->input->get('id')){
            $id = $this->input->get('id');
        }
        if($this->input->get('name')){
            $name = $this->input->get('name');
        }
        echo stateDropdown($country_id,$name,$id);
        exit;
    }

    function get_city($state_id) {
//        $state_id = $this->input->post('state_id');
        $id = 'city';
        $name = 'city';
        if($this->input->get('id')){
            $id = $this->input->get('id');
        }
        
        if($this->input->get('name')){
            $name = $this->input->get('name');
        }
        echo cityDropdown($state_id,$name,$id);
        exit;
    }


}