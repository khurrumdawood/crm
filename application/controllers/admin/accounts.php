<?php

class Accounts extends CI_Controller {

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

    function index() {
        $data['active_link'] = 'accounts';
        $data['active_sub_link'] = 'base_rates';
        $eid = $this->session->userdata('user_id');

        $this->form_validation->set_rules('margin', 'Margin', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'accounts';
            $data['active_sub_link'] = 'base_rates';
            $data['base_rates'] = $this->web->get_data('', 'employees', array('employees.id' => $eid));
            $select = array('company.*,category.*,company.id as company_id,category.id as category_id', false);
            $joins = array();
            $joins[] = array('company', 'company.id = category.company_id', 'inner');
//            $data['appointment'] = $this->web->get_data('','appointment',array('customer.create_employee_id' => $eid),$select,'','','',$joins);
            $data['companies'] = $this->web->get_data('', 'category', array('category.company_id' => 1), $select, '', '', '', $joins);
            $data['companies_fedex'] = $this->web->get_data('', 'category', array('category.company_id' => 2), $select, '', '', '', $joins);
            $data['companies_bp'] = $this->web->get_data('', 'category', array('category.company_id' => 3), $select, '', '', '', $joins);
            $data['companies_ups'] = $this->web->get_data('', 'category', array('category.company_id' => 4), $select, '', '', '', $joins);

            $data['employees'] = $this->web->get_data('', 'employees', array('employees.id' => $eid), '', '', '', '', '');

            $this->load->view('admin/accounts/base_rates', $data);
        } else {
            $data = array();
            $data['base_rate'] = $this->input->post('margin');
//                        print_r($data);exit;

            $this->web->update_data($eid, 'employees', $data);
            redirect(base_url() . 'index.php/admin/accounts/');
        }

//      $this->load->view('admin/accounts/base_rates',$data);
    }

    function rate_sheet($comp_id = '', $cat_id = '') {
        if (empty($comp_id)) {
            show_404();
        }
        if (empty($cat_id)) {
            show_404();
        }
        $data['margin_change'] = $this->input->post('margin_change');
        $data['comp_id'] = $comp_id;
        $data['cat_id'] = $cat_id;
        $data['active_link'] = 'accounts';
        $data['active_sub_link'] = 'base_rates';
        $eid = $this->session->userdata('user_id');
        $where = array('employees.id' => $eid);
        $data['employees'] = $this->web->get_data('', 'employees', $where, '', '', "", "", '', "");
        $where = array('category.company_id' => $comp_id, 'category.id' => $cat_id);
        $joins = array();
        $joins[] = array('company', 'company.id =category.company_id', 'inner');
        $select = array('company.name,category.category_name', false);
        $data['company_category'] = $this->web->get_data('', 'category', $where, $select, "", "", "", $joins, "");

        $select = array('distinct(zones.zone),zones.id', false);
        $joins = array();
        $joins[] = array('category', 'category.id =zones.category_id', 'inner');
        $joins[] = array('company', 'company.id =category.company_id', 'inner');
        $where = 'company.id =' . $comp_id . ' And category.id = ' . $cat_id;
        $data['rate_sheet'] = $this->web->get_data('', 'zones', $where, $select, '', "", "", $joins, "");

        $select = array('distinct(zones.weight)', false);
        $joins = array();
        $joins[] = array('category', 'category.id =zones.category_id', 'inner');
        $joins[] = array('company', 'company.id =category.company_id', 'inner');
        $where = 'company.id =' . $comp_id . ' And category.id = ' . $cat_id;
        $data['zones'] = $this->web->get_data('', 'zones', $where, $select, '', "", "", $joins, "");

        $this->load->view('admin/accounts/rate_sheet', $data);
    }

    function query_for_csv($comp_id = '', $cat_id = '', $margin = '') {
        if (empty($comp_id)) {
            exit;
        }
        if (empty($cat_id)) {
            exit;
        }
        if (empty($margin)) {
            exit;
        }
        $data['margin_change'] = $margin;
        $data['comp_id'] = $comp_id;
        $data['cat_id'] = $cat_id;

        $eid = $this->session->userdata('user_id');

        $where = array('employees.id' => $eid);
        $data['employees'] = $this->web->get_data('', 'employees', $where, '', '', "", "", '', "");

        $where = 'category.company_id In(' . $comp_id . ') And category.id In(' . $cat_id . ')';
        $joins = array();
        $joins[] = array('company', 'company.id =category.company_id', 'inner');
        $select = array('company.name,category.category_name', false);
        $data['company_category'] = $this->web->get_data('', 'category', $where, $select, "", "", "", $joins, "");

        $select = array('distinct(zones.zone),zones.id', false);
        $joins = array();
        $joins[] = array('category', 'category.id =zones.category_id', 'inner');
        $joins[] = array('company', 'company.id =category.company_id', 'inner');
        $where = 'company.id In(' . $comp_id . ') And category.id In(' . $cat_id . ')';
        $data['rate_sheet'] = $this->web->get_data('', 'zones', $where, $select, '', "", "", $joins, "");

        $select = array('distinct(zones.weight), company.name,category.category_name', false);
        $joins = array();
        $joins[] = array('category', 'category.id =zones.category_id', 'inner');
        $joins[] = array('company', 'company.id =category.company_id', 'inner');
        $where = 'company.id In (' . $comp_id . ') And category.id In (' . $cat_id . ')';
        $data['zones'] = $this->web->get_data('', 'zones', $where, $select, '', "", "", $joins, "");

        return prepare_csv_file_data($data);
    }

    function print_csv() {
        $fileName = 'print.csv';
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename={$fileName}");
        header("Expires: 0");
        header("Pragma: public");



        $fh = @fopen('php://output', 'w');

//        echo '<pre>';
//        print_r($_GET);
//        $comp_id=  implode(',', $this->input->get('company_id'));
//        $cat_id= implode(',', $this->input->get('category_id'));
        if (!$this->input->get('company_id')) {
            exit;
        }
        $comp_id = $this->input->get('company_id');
        if (!$this->input->get('category_id')) {
            exit;
        }
        $cat_id = $this->input->get('category_id');
        $margin_change = $this->input->get('margin_change');
        $i = 0;
        $results = array();
        foreach ($cat_id as $cat) {
            $company = $comp_id[$i];
            $margin = $margin_change[$i];

            $r[] = $this->query_for_csv($company, $cat, $margin);
//        $results = array_merge($r,$results);
//        $i++;
        }
//        echo '<pre>';
//        print_r($results);exit;

        foreach ($r as $results) {
            $headerDisplayed = false;
            foreach ($results as $data) {
// Add a header row if it hasn't been added yet
                if (!$headerDisplayed) {
// Use the keys from $data as the titles
//                print_r(array_keys($data));
                    fputcsv($fh, array_keys($data));
                    $headerDisplayed = true;
                }
// Put the data into the stream
                fputcsv($fh, $data);
            }
        }
// Close the file
        fclose($fh);
// Make sure nothing else is sent, our file is done
        exit;
    }

    function pdf() {

        if (!$this->input->get('company_id')) {
            pdf_create('Empty Record', 'print');
            exit;
        }
        $comp_id = $this->input->get('company_id');
        if (!$this->input->get('category_id')) {
            pdf_create('Empty Record', 'print');
            exit;
        }
        $cat_id = $this->input->get('category_id');
        $margin_change = $this->input->get('margin_change');
//        print_r($html);exit;
        
        $i = 0;
        foreach ($cat_id as $cat) {
            $company = $comp_id[$i];
            $margin = $margin_change[$i];

            $r[] = $this->query_for_csv($company, $cat, $margin);
//        $results = array_merge($r,$results);
//        $i++;
        }
        
//        echo '<pre>';
//        print_r($r);
//        exit;
//        
        $data['r'] = $r;
        $html = $this->load->view('admin/accounts/pdf_rates', $data,true);

//        echo $html;
//        exit;   
        pdf_create($html, 'print');
        exit;
    }

}
