<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('prepare_base_rates_data')) {

    function prepare_base_rates_data($data) {
        $CI = &get_instance();
        $headings = array();


        if ($data['is_company_display'])
            $headings[] = 'Company Name';

        if ($data['is_category_display'])
            $headings[] = 'Category Name';

        $headings[] = 'weight';
        foreach ($data['zones'] as $zone) {
            $headings[] = $zone->zone;
        }


        $re = array();
//        $price = array();
        foreach ($data['weights'] as $weight) {
            $rs = array();
            $i = 0;
            $weight_zones = $CI->web->get_data('', 'zones', $data['where'] . ' AND weight = ' . $weight->weight);
            foreach ($data['zones'] as $zone) {
                if ($i == 0) {
                    if ($data['is_company_display'])
                        $rs[] = $data['company_category'][0]->name;

                    if ($data['is_category_display'])
                        $rs[] = $data['company_category'][0]->category_name;

                    $rs[] = $weight->weight;
                }
//                echo '<pre>';
//                print_r($weight_zones);
//                exit;
                $price = search_array_and_return_value($weight_zones, 'zone', $zone->zone,'price');
                
//                echo '<pre>';
//                print_r($price);exit;

                if ($price) {

                    if ($data['margin_change'] < $data['employees'][0]->base_rate) {
                        $base_price = $data['employees'][0]->base_rate;
                    } else {
                        $base_price = $data['margin_change'];
                    }

                    if (isset($data['is_margin'])) {
                        $margin = array();
                        $F = $price + ($price * $data['employees'][0]->base_rate / 100);
                        $M = ($price * $data['employees'][0]->base_rate / 100 ) + ($price * $base_price / 100);
                        $C = $F + $M;
                        $margin['F'] = $F;
                        $margin['M'] = $M;
                        $margin['C'] = $C;
                        $rs[] = $margin;
                    } else {
                        $F = $price + ($price * $data['employees'][0]->base_rate / 100);
                        $M = ($price * $data['employees'][0]->base_rate / 100 ) + ($price * $base_price / 100); //$price + ($price * $employees[0]->base_rate / 100 ) + ($price * $base_price / 100);
                        $C = $F + $M;
                        $rs[] = $C;
                    }
//                            echo $zone->price;
                } else {
                    $rs[] = '';
                }
                //echo $employees['base_rate'];

                $i++;
            }
            array_push($re, $rs);
        }
        $data = array();
        $data['headings'] = $headings;
        $data['rows'] = $re;
        return $data;
    }

}



if (!function_exists('get_data_for_base_rates')) {

    function get_data_for_base_rates($comp_id = '', $cat_id = '', $margin = '') {
        $CI = &get_instance();
        $CI->load->model('admin_model', 'web');

//        echo $margin;
        if (empty($comp_id)) {
            return;
        }
        if (empty($cat_id)) {
            return;
        }
        if (empty($margin)) {
//            return;
        }

        $data['margin_change'] = $margin;
        $data['comp_id'] = $comp_id;
        $data['cat_id'] = $cat_id;


        $data['margin_change'] = $CI->input->post('margin_change');
        $data['comp_id'] = $comp_id;
        $data['cat_id'] = $cat_id;

        $eid = $CI->session->userdata('user_id');
//        print_r($eid);exit;


        $where = array('employees.id' => $eid);
        $data['employees'] = $CI->web->get_data('', 'employees', $where, '', '', "", "", '', "");
        $where = array('category.company_id' => $comp_id, 'category.id' => $cat_id);
        $joins = array();
        $joins[] = array('company', 'company.id =category.company_id', 'inner');
        $select = array('company.name,category.category_name', false);
        $data['company_category'] = $CI->web->get_data('', 'category', $where, $select, "", "", "", $joins, "");


        $select = array('distinct(zones.zone)', false);
        $where = 'client_company_id =' . $eid . ' And company_id = ' . $comp_id . ' AND category_id = ' . $cat_id;
        $data['zones'] = $CI->web->get_data('', 'zones', $where, $select);

        $select = array('distinct(zones.weight)', false);

        $data['weights'] = $CI->web->get_data('', 'zones', $where, $select);

        $data['where'] = $where;

        $data['is_company_display'] = true;
        $data['is_category_display'] = true;

        return $data;
    }

}




if (!function_exists('csv_print')) {

    function csv_print($r, $file_name = 'print.csv') {
        $fileName = $file_name;
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename={$fileName}");
        header("Expires: 0");
        header("Pragma: public");

        $fh = @fopen('php://output', 'w');

        foreach ($r as $results) {
            fputcsv($fh, $results['headings']);
            foreach ($results['rows'] as $data) {
                fputcsv($fh, $data);
            }
        }
        fclose($fh);
        exit;
    }

}



if (!function_exists('search_array_and_return_value')) {

    function search_array_and_return_value($input_array,$_1st_element,$search_element,$value,$type='value') {
//        echo '<pre>';
//        print_r($_1st_element);exit;
        $_2nd_array = array();
        if(is_array($input_array)){
            if (is_object($input_array[0])) {
                $_2nd_array = fetch_single_element_from_array($input_array, $_1st_element);
            }
        }
        $is_found = in_array($search_element, $_2nd_array);
        $key = array_search($search_element, $_2nd_array);
        
        

        if ($is_found) {
            if($type == 'value'){
                $output = $input_array[$key]->$value;
            }
            if($type == 'key'){
                $output = $key;
            }
            return $output;
        } else {
            return false;
        }
        return false;
    }

}









