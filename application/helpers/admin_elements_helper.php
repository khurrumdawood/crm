<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('send_email_to_company')) {

    function send_email_to_company($data) {
        $CI = & get_instance();
        $CI->load->library('email');
        
        $config = array();
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.smtpcorp.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'fahadhero007@hotmail.com';
        $config['smtp_pass']    = 'fahad123';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE;
        
        $CI->email->initialize($config);
        try{
        $CI->email->from('abc@partnership.com', 'PartnerShip');
        $CI->email->to($data['email']);
        
        $CI->email->subject("Account Verification");
        $email_data['desc'] = "Dear “$data[full_name]”,
            
        This is your new username and password<br>
        url: ".base_url()."admin/login<br>
        UserName: $data[email]<br>
        Password: $data[password]<br>
        Note: Try to login with in one hour and change your password once you logged in.";
        
        $CI->email->message($email_data['desc']);

        $CI->email->send();
        }catch(Exception $e){
            echo $e;exit;
        }
    }

}


if (!function_exists('send_email_to_customer')) {

    function send_email_to_customer($data) {
        $CI = & get_instance();
        $CI->load->library('email');
        
        $config = array();
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.smtpcorp.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'fahadhero007@hotmail.com';
        $config['smtp_pass']    = 'fahad123';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE;
        
        $CI->email->initialize($config);
        try{
        $CI->email->from('abc@partnership.com', 'PartnerShip');
        $CI->email->to($data['email']);
        
        $CI->email->subject("Account Verification");
        $email_data['desc'] = "Dear User,
            
        This is your new username and password<br>
        url: ".base_url()."admin/login<br>
        UserName: $data[email]<br>
        Password: $data[password]<br>
        Note: Try to login with in one day and change your password once you logged in.";
        
        $CI->email->message($email_data['desc']);

        $CI->email->send();
        }catch(Exception $e){
            echo $e;exit;
        }
    }

}


if (!function_exists('get_sub_company_id')) {

    function get_sub_company_id($company_id) {
        $CI = & get_instance();
        $res = $CI->db->query("SELECT id FROM employees WHERE company_id='$company_id' AND type='sub_company'")->result();
        return $res[0]->id;
    }

}


if (!function_exists('get_company_id')) {

    function get_company_id($sub_company_id) {
        $CI = & get_instance();
        $res = $CI->db->query("SELECT company_id FROM employees WHERE id='$sub_company_id' AND type='sub_company'")->result();
        return $res[0]->company_id;
    }

}
if (!function_exists('get_companyof_employee')) {

    function get_companyof_employee($eid) {
        $CI = & get_instance();
        $res = $CI->db->query("SELECT company_id FROM employees WHERE id='$eid' AND type='employee'")->result();
        return $res[0]->company_id;
    }

}
if (!function_exists('get_subcompanyof_employee')) {

    function get_subcompanyof_employee($eid) {
        $CI = & get_instance();
        $res = $CI->db->query("SELECT franchise_id FROM employees WHERE id='$eid' AND type='employee'")->result();
        return $res[0]->franchise_id;
    }

}




