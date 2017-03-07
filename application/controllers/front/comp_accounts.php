<?php

class Comp_accounts extends CI_Controller {

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
        $this->layout = 'front_admin_inner';
        $this->load->library('table');
        $this->load->library('Datatables');

//        $this->load->library('form_validation');
//        $this->load->model('recycle_model', 'web');
        error_reporting(E_ALL);
        ini_set('display_errors', true);
    }

//    function index($id='') {
//        if($id=='')
//            show_404 ();
//        
//        $data['active_link'] = 'comp_accounts';
//        $data['active_sub_link'] = 'base_rates';
//        $data['is_edit_customer'] = 1;
//        
//        $data['customer_id'] = $id;
//
//        $eid = $this->session->userdata('customer_id');
////        echo $eid;exit;
//
//        $this->form_validation->set_rules('margin', 'Margin', 'required');
//
//        if ($this->form_validation->run() == FALSE) {
//            $data['base_rates'] = $this->web->get_data('', 'employees', array('employees.id' => $eid));
//            $select = array('company.*,category.*,company.id as company_id,category.id as category_id', false);
//            $joins = array();
//            $joins[] = array('company', 'company.id = category.company_id', 'inner');
////            $data['appointment'] = $this->web->get_data('','appointment',array('customer.create_employee_id' => $eid),$select,'','','',$joins);
//
//
//            $data['companies'] = $this->web->get_data('', 'company', array('client_company_id' => $eid));
//            $data['client_id'] = $eid;
//
//            
//            $data['employees'] = $this->web->get_data('', 'employees', array('employees.id' => $eid), '', '', '', '', '');
//            
//            if($id!=''){
//                $data['customer_rates'] = $this->web->get_data('', 'customer_base_rates', array('customer_id' => $id));
//            }
////            echo '<pre>';
////            print_r($data);
////            exit;
//
//
//            $this->load->view('admin/comp_accounts/base_rates', $data);
//        } else {
//            $data = array();
//            $data['base_rate'] = $this->input->post('margin');
////                        print_r($data);exit;
//
//            $this->web->update_data($eid, 'employees', $data);
//            redirect(base_url() . 'index.php/admin/comp_accounts/');
//        }
//      $this->load->view('admin/comp_accounts/base_rates',$data);
//    }



    function add_customer($address_id=0) {
        
        $data['active_link'] = 'ship';
        $customer_id = $this->session->userdata('customer_id');

        if (!$customer_id)
            redirect(base_url());

        $data['customer_datas'] = $this->web->get_data($customer_id, 'customer');

        if (empty($data['customer_datas']))
            redirect(base_url());

        $this->form_validation->set_rules('ship_submit_date', 'Submit date', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['no_left'] = 1;
            $data['customer_id'] = $this->session->userdata('customer_id');

            if ($address_id != 0) {
                $address_book_data = $this->web->get_data($address_id, 'address_book');
                if (!empty($address_book_data)) {
//                $data['address_id'] = $address_id;
                    $data['address_book_data'] = $address_book_data;
                }
            }
//        $data['note'] = $this->web->get_data('', 'note', array('note.customer_id = '=>$customer_id,'note.followup_date'=>date('Y-m-d')),'');
//        $data['previous_note'] = $this->web->get_data('', 'note', array('note.customer_id = '=>$customer_id,'note.followup_date <='=>date('Y-m-d')),'');



            $this->load->view('front/address', $data);
        } else {

                        $data = array();

            $data['sender_company'] = $this->input->post('sender_company');
            $data['sender_phone'] = $this->input->post('sender_phone');
            $data['sender_name'] = $this->input->post('sender_contact_name');
            $data['sender_email'] = $this->input->post('sender_email');
            $data['sender_country'] = $this->input->post('sender_country');
            $data['sender_state'] = $this->input->post('sender_state');
            $data['sender_city'] = $this->input->post('sender_city');
            $data['sender_postal'] = $this->input->post('sender_postal_code');
            $data['sender_address'] = $this->input->post('sender_address');
            $data['sender_address2'] = $this->input->post('sender_address2');

            $data['recipient_company'] = $this->input->post('receiver_company');
            $data['recipient_phone'] = $this->input->post('receiver_phone');
            $data['recipient_name'] = $this->input->post('receiver_contact_name');
            $data['recipient_email'] = $this->input->post('receiver_receiver_email');
            $data['recipient_country'] = $this->input->post('receiver_country');
            $data['recipient_state'] = $this->input->post('receiver_state');
            $data['recipient_city'] = $this->input->post('receiver_city');
            $data['recipient_postal'] = $this->input->post('receiver_postal_code');
            $data['recipient_address'] = $this->input->post('receiver_address');
            $recipient_is_address = $this->input->post('receiver_is_address');
            if ($recipient_is_address == false) {
                $data['recipient_is_address'] = 0;
            } else {
                $data['recipient_is_address'] = 1;
            }
            
            $data['recipient_address2'] = $this->input->post('receiver_is_address2');
            $recipient_is_address2 = $this->input->post('recipient_is_address2');
            if ($recipient_is_address2 == false) {
                $data['recipient_is_address2'] = 0;
            } else {
                $data['recipient_is_address2'] = 1;
            }
            
            $submit_date = $this->input->post('ship_submit_date');
            $data['submit_date'] = date('Y-m-d', strtotime($submit_date));
            
//            $data['submit_date'] = $this->input->post('submit_date');
            
            $data['services'] = $this->input->post('ship_zone_country');
//            $data['services'] = $this->input->post('services');
            $data['package_type'] = $this->input->post('ship_package');

//            $data['contents'] = $this->input->post('contents');
            $data['contents'] = $this->input->post('ship_contact');

            $data['weight_unit'] = $this->input->post('ship_weight_unit');
//            $data['weight_unit'] = $this->input->post('weight_unit');
            $data['dimension_unit'] = $this->input->post('ship_length_unit');
//            $data['dimension_unit'] = $this->input->post('dimension_unit');
            $data['currency_unit'] = $this->input->post('currency');
//            $data['currency_unit'] = $this->input->post('currency_unit');

//            $weights = $this->input->post('weight');
//            $lengths = $this->input->post('length');
//            $widths = $this->input->post('width');
//            $heights = $this->input->post('height');
//            $customs = $this->input->post('custom');
//            $data = array();
//            $i = 0;
//            if (is_array($weights)) {
//                foreach ($weights as $weight) {
//                    $length = $lengths[$i];
//                    $width = $widths[$i];
//                    $height = $heights[$i];
//                    $custom = $customs[$i];
//                    $data[$i]['shipment_id'] = $id;
//                    $data[$i]['weight'] = $weight;
//                    $data[$i]['length'] = $length;
//                    $data[$i]['width'] = $width;
//                    $data[$i]['height'] = $height;
//                    $data[$i]['custom'] = $custom;
//                    $i++;
//                }
//                $this->web->group_insert_data($data, 'shipment_unit');
//            }

            $insurance = $this->input->post('insurance');
            if ($insurance == false) {
                $data['insurance'] = 0;
            } else {
                $data['insurance'] = 1;
            }
            
            
            $data['content_description'] = $this->input->post('content_description');
            $content_is_desc = $this->input->post('content_is_desc');
            if ($content_is_desc == false) {
                $data['content_is_desc'] = 0;
            } else {
                $data['content_is_desc'] = 1;
            }

            $data['shipment_reference'] = $this->input->post('shipment_reference');
            $shipment_is_ref = $this->input->post('shipment_is_ref');
            if ($shipment_is_ref == false) {
                $data['shipment_is_ref'] = 0;
            } else {
                $data['shipment_is_ref'] = 1;
            }
            
            $data['total_customes_values'] = $this->input->post('total_customes_values');
            $data['commercial_invoice'] = $this->input->post('commercial_invoice');
            if($this->input->post('commercial_invoice')=='Help me generate a commercial invoice'){
                $data['receiver_tax'] = $this->input->post('receiver_tax');
                $data['terms_of_trade'] = $this->input->post('terms_of_trade');
                $data['reasons_for_export'] = $this->input->post('reasons_for_export');
            }
            
            
            $data['transport_charges'] = $this->input->post('transport_charges');
            $data['account'] = $this->input->post('account');
            $data['duties'] = $this->input->post('duties');
            $data['amount'] = $this->input->post('amount');
            $data['collection_option'] = $this->input->post('collection_option');
            if($this->input->post('collection_option')=='I need help to schedule a collection'){
                $data['dates'] = $this->input->post('dates');
                $data['ready_time'] = $this->input->post('ready_time');
                $data['close_time'] = $this->input->post('close_time');
                $data['location_code'] = $this->input->post('location_code');
                $data['location_description'] = $this->input->post('location_description');
                
            }
                $data['customer_id'] = $this->session->userdata('customer_id');
                if($address_id!=0){
                $data['address_book_id'] = $address_id;
                }
                $data['grand_total'] = $this->input->post('grand_total');
                $shipment_id = $this->web->insert_data($data,'shippments');
            
            $goods_for_descriptions = $this->input->post('goods_for_description');
            $htss                   = $this->input->post('hts');
            $country_of_origins     = $this->input->post('country_of_origin');
            $qtys                   = $this->input->post('qty');
            $unit_values            = $this->input->post('unit_value');
            array_shift($goods_for_descriptions);
            array_shift($htss);
            array_shift($country_of_origins);
            array_shift($qtys);
            array_shift($unit_values);
            $data2 = array();
            $i = 0;
            if (is_array($goods_for_descriptions)) {
                foreach ($goods_for_descriptions as $goods_for_description) {
                    $hts               = $htss[$i];
                    $country_of_origin = $country_of_origins[$i];
                    $qty               = $qtys[$i];
                    $unit_value        = $unit_values[$i];
                    $data2[$i]['shipment_id']           = $shipment_id;
                    $data2[$i]['goods_for_description'] = $goods_for_description;
                    $data2[$i]['hts']                   = $hts;
                    $data2[$i]['country_of_origin']     = $country_of_origin;
                    $data2[$i]['qty']                   = $qty;
                    $data2[$i]['unit_value']            = $unit_value;
                    $data2[$i]['row_total']            = $unit_value*$qty;
                    $i++;
                }
                $this->web->group_insert_data($data2, 'shipment_goods');
            }
            
            
            $weights = $this->input->post('weight');
            $lengths = $this->input->post('length');
            $widths = $this->input->post('width');
            $heights = $this->input->post('height');
            $customs = $this->input->post('custom');
            array_shift($weights);
            array_shift($lengths);
            array_shift($widths);
            array_shift($heights);
            array_shift($customs);
            $data2 = array();
            $i = 0;
            if (is_array($weights)) {
                foreach ($weights as $weight) {
                    $length = $lengths[$i];
                    $width = $widths[$i];
                    $height = $heights[$i];
                    $custom = $customs[$i];
                    $data2[$i]['shipment_id'] = $shipment_id;
                    $data2[$i]['weight'] = $weight;
                    $data2[$i]['length'] = $length;
                    $data2[$i]['width'] = $width;
                    $data2[$i]['height'] = $height;
                    $data2[$i]['custom'] = $custom;
                    $i++;
                }
                $this->web->group_insert_data($data2, 'shipment_unit');
            }

//            $data['customer_no'] = $this->input->post('customer_no');
//
//            $this->web->insert_data($data, 'customer');

            $this->session->set_userdata('notify_message', 'you have been shipped successfully.');
            $this->session->set_userdata('notify_type', 'jSuccess');
//            $this->session->set_userdata('notify_type', 'jNotify');

//            redirect(base_url() . 'index.php/front/comp_accounts/add_customer/');
            redirect(base_url() . 'index.php/front/address_bookid/');
        }
    }

    function get_carrier_category() {
        $carrier_id = $this->input->post('carrier_id');
        echo carrierCategoryDropdown($carrier_id, 'carrier', 'carrier');
            exit;
    }
        
    function get_carrier_package() {
        $carrier_id = $this->input->post('carrier_id');
        $zones_data = $this->web->get_data($carrier_id,'zones');
        if(empty($zones_data)){
            echo carrierPackageDropdown(0, 'carrier', 'carrier');
            exit;
        }
//        echo $zones_data[0]->company_id;

        echo carrierPackageDropdown($zones_data[0]->company_id, 'package', 'package');
        exit;
    }

    function zone_country() {
        $sender_country = $this->session->userdata('sender_country');
        $receiver_country = $this->session->userdata('receiver_country');

        $zone_country_ids = '';
        if ($sender_country)
            $zone_country_ids[] = $sender_country;

        if ($receiver_country)
            $zone_country_ids[] = $receiver_country;

        return zoneCountryDropdown($zone_country_ids, 'zone_country', 'zone_country');
    }

    function set_sender_zone_country($sender_country = 0) {
        if ($sender_country != 0)
            $this->session->set_userdata(array('sender_country' => $sender_country));
        echo $this->zone_country();
        exit;
    }

    function set_receiver_zone_country($receiver_country = 0) {
        if ($receiver_country != 0)
            $this->session->set_userdata(array('receiver_country' => $receiver_country));
        echo $this->zone_country();
        exit;
    }

    function set_location() {




        echo '<pre>';
        $i = 0;
        $states_subdivisions_data = $this->web->get_data('', 'states_subdivisions');
        foreach ($states_subdivisions_data as $states) {

            $country_name_id = $this->get_state_country($states);
            $country_name = $country_name_id['country_name'];
            $country_id_for_city = $country_name_id['country_id'];

            $country_id = $this->get_meta_country_id($country_name);
            $state_name = $states->state_subdivision_name;
            $state_id = $states->state_subdivision_id;

            $meta_location_data = $this->web->get_data('', 'meta_location', '(`local_name` LIKE "%' . $state_name . '%" OR'
                    . ' `local_name` LIKE "%' . $state_name . '%") ' . 'AND ' . "in_location = '$country_id' AND type='RE'");
//                echo $state_name.'<br>';    
//                print_r($meta_location_data);
            foreach ($meta_location_data as $meta) {
                $cities_data = $this->web->get_data('', 'meta_location', array('in_location' => $meta->id, 'type' => 'CI'));
                foreach ($cities_data as $cities) {
                    echo $country_name . ' ' . $state_name . ' ' . $cities->local_name . '<br>';
                    $city_data = array();
                    $city_data['countries_id'] = $country_id_for_city;
                    $city_data['states_subdivisions_id'] = $state_id;
                    $city_data['name'] = $cities->local_name;
                    $city_data['latitude'] = $cities->geo_lat;
                    $city_data['longitude'] = $cities->geo_lng;

                    $this->web->insert_data($city_data, 'cities');
                }
            }
//                exit;

            $i++;
        }
        exit;
    }

    private function get_state_country($states) {
        $countries_data = $this->web->get_data('', 'countries', '`country_code_char2` LIKE "%' . $states->country_code_char2 . '%"');
        if (!empty($countries_data))
            return array('country_name' => $countries_data[0]->country_name, 'country_id' => $countries_data[0]->country_id);
        return '';
    }

    private function get_meta_country_id($country_name) {
        $countries_data = $this->web->get_data('', 'meta_location', '`local_name` LIKE "%' . $country_name . '%" AND in_location IS NULL');
        if (!empty($countries_data))
            return $countries_data[0]->id;
        return '';
    }

    function get_state($country_id) {
//        $country_id = $this->input->post('country_id');
        $id = 'state';
        $name = 'state';
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }
        if ($this->input->get('name')) {
            $name = $this->input->get('name');
        }
        echo stateDropdown($country_id, $name, $id);
        exit;
    }

    function get_city($state_id) {
//        $state_id = $this->input->post('state_id');
        $id = 'city';
        $name = 'city';
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->input->get('name')) {
            $name = $this->input->get('name');
        }
        echo cityDropdown($state_id, $name, $id);
        exit;
    }

    function logout() {
//        
//        if(!$customer_id)
        $this->session->unset_userdata('customer_id');

        redirect(base_url());
    }

}
