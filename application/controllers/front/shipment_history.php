<?php

class Shipment_history extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->require_admin_login();
        $this->load->model('admin_model', 'web');
        $this->layout = 'front_admin_inner';
        $this->load->library('Datatables');
        $this->load->library('table');
        $customer_id = $this->session->userdata('customer_id');
        
        if(!$customer_id)
            redirect (base_url());
    }

    function index() {

        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'history';
        $data['table_text'] = 'Shipment History';
        $data['no_left'] = 1;
//        $data['import_csv'] = 1;
//        $data['export_csv'] = 1;
        
        $data['page_text'] = 'History';
//        $data['active_sub_link'] = 'zones';
        $data['table_url'] = base_url() . 'front/shipment_history/shipment_historydatatable/';

//        $data['add_button'] = array('url' => base_url() . 'front/address_bookid/add_address_bookid', 'btn_title' => 'Add New Address');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading("Id", "Submit date", "Services", "Package type", "Contents", "Weight unit","Dimension unit", "Currency unit", "Content Desc", "Units", "Goods", "Sender Info", "Receiver Info");

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />',
                '<input type="text" name="date" placeholder="Date" class="search_init" />',
                '<input type="text" name="services" placeholder="Services" class="search_init" />',
                '<input type="text" name="package_type" placeholder="Package Type" class="search_init" />',
                '<input type="text" name="contents" placeholder="Products/Documents" class="search_init" />',
                '<input type="text" name="weight_unit" placeholder="weight Unit" class="search_init" />',
                '<input type="text" name="dimension_unit" placeholder="Dimenssion Unit" class="search_init" />',
                '<input type="text" name="currency_unit" placeholder="Currency Unit" class="search_init" />',
                '<input type="text" name="content_description" placeholder="Content Desc" class="search_init" />'
        );

        $this->load->view('list', $data);
    }

    function shipment_historydatatable() {
        $select = 'id,submit_date,services,package_type,contents,weight_unit,dimension_unit,currency_unit,content_description';
        $where = 'customer_id = '.$this->session->userdata('customer_id');
        $generate = $this->web->get_dt_data('', 'shippments', $where, $select);
        $generate['aaData'] = $this->admin_prepare_shipment_history($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_shipment_history($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                
                $ship_unit = '<a href="' . base_url() . 'front/shipment_history/shipment_unit/' . $data[0] . '" >Shippment Unit</a>';
                $ship_goods = '<a href="' . base_url() . 'front/shipment_history/shipment_goods/' . $data[0] . '" >Shippment Goods</a>';
                $sender_info = '<a href="' . base_url() . 'front/shipment_history/sender_info/' . $data[0] . '" >Sender Info</a>';
                $recipient_info = '<a href="' . base_url() . 'front/shipment_history/recipient_info/' . $data[0] . '" >Recipient Info</a>';
                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];
                $rs[] = $data[5];
                $rs[] = $data[6];
                $rs[] = $data[7];
                $rs[] = $data[8];
//                $rs[] = $data[9];
                $rs[] = $ship_unit;
                $rs[] = $ship_goods;
                $rs[] = $sender_info;
                $rs[] = $recipient_info;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function shipment_unit($shipment_id) {

        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'history';
        $data['table_text'] = 'Shipment Units';
        $data['no_left'] = 1;
//        $data['import_csv'] = 1;
//        $data['export_csv'] = 1;
        
        $data['page_text'] = 'Shipment History';
//        $data['active_sub_link'] = 'zones';
        $data['table_url'] = base_url() . 'front/shipment_history/shipment_unitdatatable/'.$shipment_id;

//        $data['add_button'] = array('url' => base_url() . 'front/address_bookid/add_address_bookid', 'btn_title' => 'Add New Address');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading("Id", "Weight", "Length", "Width", "Height", "Custom");

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />',
                '<input type="text" name="weight" placeholder="Weight" class="search_init" />',
                '<input type="text" name="length" placeholder="Length" class="search_init" />',
                '<input type="text" name="Width" placeholder="Width" class="search_init" />',
                '<input type="text" name="height" placeholder="Height" class="search_init" />',
                '<input type="text" name="custom" placeholder="Custom" class="search_init" />'
        );

        $this->load->view('list', $data);
    }

    function shipment_unitdatatable($shipment_id) {
        $select = 'id,weight,length,width,height,custom';
        $where = 'shipment_id = '.$shipment_id;
        $generate = $this->web->get_dt_data('', 'shipment_unit', $where, $select);
        $generate['aaData'] = $this->admin_prepare_shipment_unit($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_shipment_unit($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();
                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];
                $rs[] = $data[5];
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function shipment_goods($shipment_id) {

        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'history';
        $data['table_text'] = 'Shipment Goods';
        $data['no_left'] = 1;
//        $data['import_csv'] = 1;
//        $data['export_csv'] = 1;
        
        $data['page_text'] = 'Shipment History';
//        $data['active_sub_link'] = 'zones';
        $data['table_url'] = base_url() . 'front/shipment_history/shipment_goodsdatatable/'.$shipment_id;

//        $data['add_button'] = array('url' => base_url() . 'front/address_bookid/add_address_bookid', 'btn_title' => 'Add New Address');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading("Id", "Goods", "HTS", "Country Of Origin", "Quantity", "Unit Value","Row Total");

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />',
                '<input type="text" name="goods" placeholder="Goods" class="search_init" />',
                '<input type="text" name="hts" placeholder="HTS" class="search_init" />',
                '<input type="text" name="country_of_origin" placeholder="Country Of Origin" class="search_init" />',
                '<input type="text" name="quantity" placeholder="Quantity" class="search_init" />',
                '<input type="text" name="unit_value" placeholder="Unit Value" class="search_init" />',
                '<input type="text" name="row_total" placeholder="Row Total" class="search_init" />'
        );

        $this->load->view('list', $data);
    }

    function shipment_goodsdatatable($shipment_id) {
        $select = 'id,goods_for_description,hts,country_of_origin,qty,unit_value,row_total';
        $where = 'shipment_id = '.$shipment_id;
        $generate = $this->web->get_dt_data('', 'shipment_goods', $where, $select);
        $generate['aaData'] = $this->admin_prepare_shipment_goods($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_shipment_goods($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();
                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                
//                $rs[] = $data[3];
                $rs[] = get_country_name($data[3]);
                $rs[] = $data[4];
                $rs[] = $data[5];
                $rs[] = $data[6];
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }
    function sender_info($shipment_id) {

        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'history';
        $data['table_text'] = 'Sender Info';
        $data['no_left'] = 1;
//        $data['import_csv'] = 1;
//        $data['export_csv'] = 1;
        
        $data['page_text'] = 'Shipment History';
//        $data['active_sub_link'] = 'zones';
        $data['table_url'] = base_url() . 'front/shipment_history/sender_infodatatable/'.$shipment_id;

//        $data['add_button'] = array('url' => base_url() . 'front/address_bookid/add_address_bookid', 'btn_title' => 'Add New Address');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading("Id", "Company", "Phone", "Name", "Email", "Country","State","City","Postal","Address","Address2");

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />',
                '<input type="text" name="company" placeholder="Company" class="search_init" />',
                '<input type="text" name="phone" placeholder="Phone" class="search_init" />',
                '<input type="text" name="name" placeholder="Name" class="search_init" />',
                '<input type="text" name="email" placeholder="Email" class="search_init" />',
                '<input type="text" name="country" placeholder="Country" class="search_init" />',
                '<input type="text" name="state" placeholder="State" class="search_init" />',
                '<input type="text" name="city" placeholder="City" class="search_init" />',
                '<input type="text" name="postal" placeholder="Postal" class="search_init" />',
                '<input type="text" name="address" placeholder="Address" class="search_init" />',
                '<input type="text" name="address2" placeholder="Address2" class="search_init" />'
        );

        $this->load->view('list', $data);
    }

    function sender_infodatatable($shipment_id) {
        $select = 'id,sender_company,sender_phone,sender_name,sender_email,sender_country,sender_state,sender_city,sender_postal,sender_address,sender_address2';
        $where = 'shippments.id = '.$shipment_id;
        $generate = $this->web->get_dt_data('', 'shippments', $where, $select);
        $generate['aaData'] = $this->admin_prepare_sender_info($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_sender_info($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();
                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];
                
//                $rs[] = $data[5];
                $rs[] = get_country_name($data[5]);
                
//                $rs[] = $data[6];
                $rs[] = get_state_or_city_name($data[6]);
//                $rs[] = $data[7];
                $rs[] = get_state_or_city_name($data[7]);
                $rs[] = $data[8];
                $rs[] = $data[9];
                $rs[] = $data[10];
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }
    
    function recipient_info($shipment_id) {

        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'history';
        $data['table_text'] = 'Recipient Info';
        $data['no_left'] = 1;
//        $data['import_csv'] = 1;
//        $data['export_csv'] = 1;
        
        $data['page_text'] = 'Shipment History';
//        $data['active_sub_link'] = 'zones';
        $data['table_url'] = base_url() . 'front/shipment_history/recipient_infodatatable/'.$shipment_id;

//        $data['add_button'] = array('url' => base_url() . 'front/address_bookid/add_address_bookid', 'btn_title' => 'Add New Address');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading("Id", "Company", "Phone", "Name", "Email", "Country","State","City","Postal","Address","Address2");

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />',
                '<input type="text" name="company" placeholder="Company" class="search_init" />',
                '<input type="text" name="phone" placeholder="Phone" class="search_init" />',
                '<input type="text" name="name" placeholder="Name" class="search_init" />',
                '<input type="text" name="email" placeholder="Email" class="search_init" />',
                '<input type="text" name="country" placeholder="Country" class="search_init" />',
                '<input type="text" name="state" placeholder="State" class="search_init" />',
                '<input type="text" name="city" placeholder="City" class="search_init" />',
                '<input type="text" name="postal" placeholder="Postal" class="search_init" />',
                '<input type="text" name="address" placeholder="Address" class="search_init" />',
                '<input type="text" name="address2" placeholder="Address2" class="search_init" />'
        );

        $this->load->view('list', $data);
    }

    function recipient_infodatatable($shipment_id) {
        $select = 'id,recipient_company,recipient_phone,recipient_name,recipient_email,recipient_country,recipient_state,recipient_city,recipient_postal,recipient_address,recipient_address2';
        $where = 'shippments.id = '.$shipment_id;
        $generate = $this->web->get_dt_data('', 'shippments', $where, $select);
        $generate['aaData'] = $this->admin_prepare_recipient_info($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_recipient_info($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();
                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];
//                $rs[] = $data[5];
//                $rs[] = $data[6];
//                $rs[] = $data[7];
                $rs[] = get_country_name($data[5]);
                $rs[] = get_state_or_city_name($data[6]);
                $rs[] = get_state_or_city_name($data[7]);
                $rs[] = $data[8];
                $rs[] = $data[9];
                $rs[] = $data[10];
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }
    


}
