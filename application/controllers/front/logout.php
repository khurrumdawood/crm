<?php
class Logout extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('admin_model');
        $this->layout = 'front_admin_inner';
	}
	
	function index()
	{
		$this->session->unset_userdata('customer_id');		
		$this->session->sess_destroy();
		//$this->layout='admin';
		$this->load->view('front/login');
	}
}
?>