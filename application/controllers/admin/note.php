<?php    class Note extends CI_Controller {
function __construct() {
        parent::__construct();
        $this->require_admin_login();
        $this->load->model('admin_model', 'web');
        $this->layout = 'admin_inner';
        $this->load->library('Datatables');
        $this->load->library('table');
    }
function index() {
        
        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'note';
        $data['table_text'] = 'Note';
        $data['page_text'] = 'Notes<small>Search Notes & Follow-Ups</small>';
//        $data['active_sub_link'] = 'zones';
        $data['no_left'] = 1;
        $data['table_url'] = base_url() . 'admin/note/notedatatable/';

        $data['add_button'] = array('url' => base_url() . 'admin/note/add_note', 'btn_title' => 'Add New Note');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading("ID","Customer #","Customer Name","Sales Rep","Follow UP Date","Date Added","Note","Edit","Delete");

        $this->table->set_footer(
                        '<input type="text" name=" id" placeholder="ID" class="search_init" />',                
                        '<input type="text" name="customer_id" placeholder="Customer #" class="search_init" />',                
                        '<input type="text" name="customer_name" placeholder="Customer Name" class="search_init" />',                
                        '<input type="text" name="sales_rep" placeholder="Sales Rep" class="search_init" />',                
                        '<input type="text" name="followup_date" placeholder="Follow UP Date" class="search_init" />',                
                        '<input type="text" name="date_created" placeholder="Date Added" class="search_init" />',                
                        '<input type="text" name="note" placeholder="Note" class="search_init" />'                
                );

        $this->load->view('admin/list', $data);
    }

    function notedatatable() {
        $select = ' id,customer_id,employee_id,followup_date,date_created,note';
        $where = '';
        if($this->session->userdata('user_type')=='master'){
                         
                        }
        elseif($this->session->userdata('user_type')=='company'){
            $master= $this->session->userdata('master_id');
            $company= $this->session->userdata('user_id');
        $where = 'master_id = '.$master.' And company_id = '. $company;
                        }
        elseif($this->session->userdata('user_type')=='employee'){
            $master = $this->session->userdata('master_id');
            $company = $this->session->userdata('company_id');
            $employee = $this->session->userdata('user_id');
        $where = 'master_id = '.$master.' And company_id = '. $company.' And employee_id = '.$employee;
                        }
        
        $generate = $this->web->get_dt_data('', 'note', $where, $select);
        
        $generate['aaData'] = $this->admin_prepare_note($generate['aaData']);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_note($datas) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();
        $select = ' id,customer_id,employee_id,followup_date,date_created,note';
                $edit = '<a href="' . base_url() . 'admin/note/edit_note/' . $data[0] . '">Edit</a>';
                $delete = '<a href="' . base_url() . 'admin/note/delete_note/' . $data[0] . '" onclick="return confirm(\'Are you sure you want to delete this category?\');" >Delete</a>';
                $rs[] = $data[0];
                $rs[] = $data[1];
                
                if($data[1]!=0){
                $customer_name = $this->web->get_data('', 'customer', array('customer.id'=>$data[1]));
                if(!empty($customer_name))
                    $rs[] = $customer_name[0]->name;
                else
                    $rs[] = ' ';
                }else{
                    $rs[] =' ';
                }
                if($data[2]!=0){
                $employee_name = $this->web->get_data('', 'employees', array('employees.id'=>$data[2]));
                $rs[] = $employee_name[0]->firstname.' '.$employee_name[0]->lastname;
                }else{
                    $rs[] =' ';
                }
                $rs[] = date('M-d-Y',  strtotime($data[3]));
//                $rs[] = $data[2];
//                $rs[] = $data[3];
                  $rs[] = date('M-d-Y',  strtotime($data[4]));
              
                $rs[] = $data[5];
                $rs[] = $edit;
    $rs[] = $delete;

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }
    
    function add_note() {
        
//                $this->form_validation->set_rules(' id', 'ID', 'required');
//                    $this->form_validation->set_rules('customer_id', 'Customer #', 'required');
//                    $this->form_validation->set_rules('followup_date', 'Follow UP Date', 'required');

                    $this->form_validation->set_rules('note', 'Note', 'required');
                    $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['active_link'] = 'note';
            $data['table_text'] = 'Note';
            $data['page_text'] = 'Note';
//            $data['active_sub_link'] = 'contact';
            $data['no_left'] = 1;

            $this->load->view('admin/note/add', $data);
        } else {
            
            
            
                        $data['customer_id'] = $this->input->post('customer_id');
                        $followup_date = $this->input->post('followup_date');
                        $data['followup_date'] = date('Y-m-d', strtotime($followup_date));
                        
                        $data['note'] = $this->input->post('note');
                        if($this->session->userdata('user_type')=='master'){
                            $data['master_id'] = $this->session->userdata('user_id');
                        }
                        elseif($this->session->userdata('user_type')=='company'){
                            $data['master_id'] = $this->session->userdata('master_id');
                            $data['company_id'] = $this->session->userdata('user_id');
                        }
                        elseif($this->session->userdata('user_type')=='employee'){
                            $data['master_id'] = $this->session->userdata('master_id');
                            $data['company_id'] = $this->session->userdata('company_id');
                            $data['employee_id'] = $this->session->userdata('user_id');
                        }
                        
                        $this->web->insert_data($data, 'note');

            redirect(base_url() . 'index.php/admin/note');
        }
    }
    
    
    function edit_note($id=0) {
        if($id==0)
        {
            show_404();
        }
//                $this->form_validation->set_rules(' id', 'ID', 'required');
//                    $this->form_validation->set_rules('customer_id', 'Customer #', 'required');
//                    $this->form_validation->set_rules('followup_date', 'Follow UP Date', 'required');
//                    $this->form_validation->set_rules('date_created', 'Date Added', 'required');
                    $this->form_validation->set_rules('note', 'Note', 'required');
                    $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'zones';
            $data['no_left'] = 1;
//            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Note';
            $data['page_text'] = 'Note';

            $data['note_data'] = $this->web->get_data($id, 'note');
            if(empty($data['note_data'])){
                show_404();
            }
            $this->load->view('admin/note/edit', $data);
            
        } else {
//                        $data[' id'] = $this->input->post(' id');
                        $data['customer_id'] = $this->input->post('customer_id');
                        $followup_date = $this->input->post('followup_date');
//                        echo date()
                        $data['followup_date'] = date('Y-m-d', strtotime($followup_date));
//                        $data['followup_date'] = $this->input->post('followup_date');
                        $data['note'] = $this->input->post('note');
                        
            $this->web->update_data($id, 'note', $data);

            redirect(base_url() . 'index.php/admin/note');
            
        }
    }
    
    
    function delete_note($id = 0) {
        if ($id == 0)
            show_404();
        $this->data = new stdClass();
        $this->web->delete_data($id, 'note');
        
        redirect(base_url() . 'admin/note/');

        $this->output->enable_profiler(FALSE);
    }
   
}