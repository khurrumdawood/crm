<?php
class Logout extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->library('session');
	}
	
	function index()
	{
		$this->session->unset_userdata('adminId');		
		$this->session->sess_destroy();
		//$this->layout='admin';
		$this->load->view('admin/login');
	}
}
?>