<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lat_long extends CI_Controller {

    private $api_key = 'AIzaSyDQ6Jqxmx65xizNCqCBCg0O0DqMP1hHjBE';

    function __construct() {
        parent::__construct();
//        $this->layout = 'admin_inner';
//        parent::CI_Controller();
//        $this->load->library('session');
        $this->load->model('admin_model');
//        if ($this->session->userdata('customer_id')) {
//            
//            redirect('admin/dashboard');
//            
//        }
    }

    function index($lat,$long) {
        echo $lat;
        echo '<br>';
        echo $long;
        $data['lat']=$lat;
        $data['long']=$long;
        $eid=$this->session->userdata('user_id');
        $this->admin_model->update_data('', 'employees', $data, array('id'=>$eid));
        
        exit;
//        $this->load->view('front/lat_long');
        
    }
    function location($lat,$long) {
        
        $data['lat']=$lat;
        $data['long']=$long;
        
        $this->load->view('admin/lat_long',$data);
        
    }


}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */