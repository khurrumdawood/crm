<?php

class Csv extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->require_admin_login();
        $this->load->model('admin_model', 'web');
        $this->layout = 'front_inner';
        $this->load->library('Datatables');
        $this->load->library('table');
    }

    function index() {
        
    }

    function readExcel() {
        $this->load->library('csvreader');
        $csv_file = '';
        if (isset($_FILES['csv_file']['name']) != '') {
            $csv_file = $_FILES['csv_file']['name'];
//                print_r($csv_file);exit;
//                $csv_file = time() . '_' . $csv_file;
            $name_ext = end(explode(".", $_FILES['csv_file']['name']));
//            echo '<pre>';
//            print_r($_FILES);exit;
            $original_path = 'uploads_csv/';
            $path = $original_path . $csv_file;
            if (move_uploaded_file($_FILES['csv_file']['tmp_name'], $path)) {
                $source_image_path1 = $original_path;
                $source_image_name1 = $csv_file;
//                resize_crop_image_new(72, 72, $source_image_path1, $source_image_name1, 'u_', $name_ext, 72 * 2, 72 * 2, true);
//                    create_thumbs_new($source_image_path1, $source_image_name1, $csv_file, 1000, 1000);
//                @unlink($original_path . $csv_file);
//                $csv_file = $csv_file;
            }
            $result = $this->csvreader->parse_file($path);
//        $result =   $this->csvreader->parse_file('http://localhost/orb_crm1/uploads_csv/Test.csv');//path to csv file
            $data['csvData'] = $result;
            foreach ($result as $res) {
//                  echo '<pre>';
//                  print_r($res);
//                  exit;
                $this->web->insert_data($res, 'address_book');
            }
        }
//exit;
//        $this->load->view('front/address_bookid/view_csv', $data);  
        redirect(base_url() . 'index.php/front/address_bookid');
    }

    function get_report() {
//    $this->load->model('my_model');
        $this->load->dbutil();
        $this->load->helper('file');
        /* get the object   */
//    $report = $this->web->index();
        $customer_id = $this->session->userdata('customer_id');
        $report = $this->web->get_data_export('', 'address_book', array('address_book.contact_id' => $customer_id));
//    $report = $this->my_model->index();
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=address_book.csv");
        header("Expires: 0");
        header("Pragma: public");
//    $report = $this->web->get_data('','address_book');
        /*  pass it to db utility function  */
        $new_report = $this->dbutil->csv_from_result($report);
        echo $new_report;
        exit;
        /*  Now use it to write file. write_file helper function will do it */
//    $file_location='download/csv_file.csv';
//    write_file('download/csv_file.csv',$new_report);
//    write_file('csv_file.csv',$new_report);
        /*  Done    */
    }

}
