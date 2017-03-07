<?php

class Zones extends CI_Controller {

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
        $this->load->library('Datatables');
        $this->load->library('table');


//        $this->load->library('form_validation');
//        $this->load->model('recycle_model', 'web');
        error_reporting(E_ALL);
        ini_set('display_errors', true);
    }

    function index($id = 0) {
//        echo '<pre> ';
//$eid = $this->session->all_userdata();
//print_r($eid);exit;
//        if()
        {
            
        }
        $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
        $data['active_link'] = 'zones';
        $data['table_text'] = 'Companies';
        $data['page_text'] = 'Companies<small>List of Couriers\' Companies</small>';
        $data['active_sub_link'] = 'zones';
        $data['table_url'] = base_url() . 'admin/zones/datatable/' . $id;

        $data['add_button'] = array('url' => base_url() . 'admin/zones/add_comp', 'btn_title' => 'Add New Courior Company');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Name', 'Description', 'Created Date', 'Categories', 'Action','Package Type');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                , '<input type="text" name="description" placeholder="Description" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Created Date" class="search_init" />'
        );

        if ($id != 0) {
            $this->table->set_heading('id', 'Name', 'Description', 'Margin', 'Created Date', 'Action');

            $this->table->set_footer(
                    '<input type="text" name="id" placeholder="Id" class="search_init" />'
                    , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                    , '<input type="text" name="description" placeholder="Description" class="search_init" />'
                    , '<input type="text" name="margin" placeholder="Margin" class="search_init" />'
                    , '<input type="text" name="creates" placeholder="Created Date" class="search_init" />'
            );
            unset($data['add_button']);
            $data['back_button'] = array('url' => base_url() . 'admin/companies', 'btn_title' => 'Back');
            $data['active_link'] = 'companies';
        }

        $this->load->view('admin/list', $data);
    }

    function datatable($id = 0) {
//      $select= array('customer.id as cus_id,customer.name,customer.phone,appointment.*', false);
//        $joins = array();
//        $joins[] = array('customer','customer.id = appointment.customer_id','inner');
//        
//        echo 'asdf';exit;
        $eid = $this->session->userdata('user_id');
//       $data['appointment'] = $this->web->get_data('','appointment',array('customer.create_employee_id' => $eid),$select,'','','',$joins);

        $select = 'id, name, description, created_at,margin,parent_id';
        $where = "client_company_id = 0";
        if ($id != 0) {
            $where = "client_company_id = $id";
        }

        $generate = $this->web->get_dt_data('', 'company', $where, $select);
//        print_r($generate);
        $generate['aaData'] = $this->admin_prepare_zones($generate['aaData'], $id);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_zones($datas, $id = 0) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();

                $sub = '<a href="' . base_url() . 'admin/zones/sub_comp/' . $data[0] . '">View</a>';
                $edit = '<a href="' . base_url() . 'admin/zones/edit_comp/' . $data[0] . '">Edit</a>';
                $carrier_packges = '<a href="' . base_url() . 'admin/carrier_packges/index/' . $data[0] . '">Add</a>';


                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];

                $rs[] = date("jS F Y", strtotime($data[3]));
                $rs[] = $sub;
                $rs[] = $edit;
                $rs[] = $carrier_packges;

                if ($id != 0) {
                    $rs = array();

                    $edit = '<a href="' . base_url() . 'admin/zones/edit_comp/' . $data[0] .'/'.$id. '">Edit</a>';
                    $sub = '<a href="' . base_url() . 'admin/zones/sub_comp/' . $data[5] . '/' . $id . '">View</a>';

                    $rs[] = $data[0];
                    $rs[] = $data[1];
                    $rs[] = $data[2];
                    $rs[] = $data[4];

                    $rs[] = date("jS F Y", strtotime($data[3]));
                    $rs[] = $edit.'|'.$sub;
//                    $rs[] = $sub;
                }

                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function sub_comp($comp_id, $cli_comp = 0) {
        if (empty($comp_id))
            show_404();
        $data['active_link'] = 'zones';
//        $data['active_sub_link'] = 'contact';
        $com_data = $this->web->get_data($comp_id, 'company');

        if (!empty($com_data)) {
            $data['table_text'] = $com_data[0]->name;
            $data['page_text'] = 'Categories<small>Categories of "' . $com_data[0]->name . '"</small>';
        }


        $data['table_url'] = base_url() . 'admin/zones/datatable_sub_comp/' . $comp_id . '/' . $cli_comp;
        $data['add_button'] = array('url' => base_url() . 'admin/zones/add_sub_comp/' . $comp_id, 'btn_title' => 'Add New Category');

        $data['back_button'] = array('url' => base_url() . 'admin/zones', 'btn_title' => 'Back');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Name', 'Description', 'Created At', 'Action', 'Zones');

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                , '<input type="text" name="name" placeholder="Description" class="search_init" />'
                , '<input type="text" name="name" placeholder="Margin" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Created Date" class="search_init" />'
        );

        if ($cli_comp != 0) {
            $data['back_button'] = array('url' => base_url() . 'admin/zones/index/' . $cli_comp, 'btn_title' => 'Back');
            $this->table->set_heading('id', 'Name', 'Description', 'Margin', 'Created At', 'Action');
            $data['active_link'] = 'companies';
            unset($data['add_button']);
        }

        $this->load->view('admin/list', $data);
    }

    function datatable_sub_comp($comp_id, $cli_comp = 0) {

        $eid = $this->session->userdata('user_id');

        $select = 'id, category_name, description, created_at, parent_id, margin';
        $where = array();
        $where['client_company_id'] = 0;
        $where['company_id'] = $comp_id;
        if ($cli_comp != 0) {
            $where = array();
            $where['client_company_id'] = $cli_comp;
            $where['company_id'] = $comp_id;
        }

        $generate = $this->web->get_dt_data('', 'category', $where, $select);
        $generate['aaData'] = $this->admin_prepare_sub_zones($generate['aaData'], $comp_id, $cli_comp);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare_sub_zones($datas, $comp_id, $cli_comp = 0) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();
                $edit = '<a href="' . base_url() . 'admin/zones/edit_sub_comp/' . $comp_id . '/' . $data[0] . '">Edit</a>';
                $delete = '<a href="' . base_url() . 'admin/zones/delete_category/' . $comp_id . '/' . $data[0] . '" onclick="return confirm(\'Are you sure you want to delete this category?\');">Delete</a>';
                $zones = '<a href="' . base_url() . 'admin/zones/zone/' . $comp_id . '/' . $data[0] . '">View</a>';

                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = date("jS F Y", strtotime($data[3]));
                $rs[] = $edit . '|' . $delete;
                $rs[] = $zones;


                if ($cli_comp != 0) {
                    $rs = array();
                    $edit = '<a href="' . base_url() . 'admin/zones/edit_sub_comp/' . $comp_id . '/' . $data[0] . '/' . $cli_comp . '">Edit</a>';
                    $delete = '<a href="' . base_url() . 'admin/zones/employees/' . $comp_id . '/' . $data[0] . '" onclick="return confirm(\'Are you sure you want to delete this category?\');">Delete</a>';
                    $zones = '<a href="' . base_url() . 'admin/zones/zone/' . $comp_id . '/' . $data[4] . '/' . $cli_comp . '">View</a>';

                    $rs[] = $data[0];
                    $rs[] = $data[1];
                    $rs[] = $data[2];
                    $rs[] = $data[5];
                    $rs[] = date("jS F Y", strtotime($data[3]));
                    $rs[] = $edit.'|'.$zones;
                    $rs[] = $zones;
                }
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function add_comp() {

        $eid = $this->session->userdata('user_id');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'zones';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Add New Courier Company';
            $data['page_text'] = 'Courier Company';

            $eid = $this->session->userdata('user_id');
            $this->load->view('admin/zones/add', $data);
        } else {
            $data['name'] = $this->input->post('title');
            $data['description'] = $this->input->post('desc');
            $this->web->insert_data($data, 'company');

            redirect(base_url() . 'index.php/admin/zones');
        }
    }

    function edit_comp($comp_id,$cli_comp=0) {
        if ($comp_id == '')
            show_404();
        $eid = $this->session->userdata('user_id');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'zones';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Edit Courier Company';
            $data['page_text'] = 'Zones';
            $data['cli_comp'] = $cli_comp;

            $eid = $this->session->userdata('user_id');
            
            
//            $select = array('employees.*', false);
//            $joins = array();
//            $joins[] = array('zone', 'zone.id = category.zone_id', 'inner');
//            $data['zones'] = $this->web->get_data('', 'employees', array('employees.master_id' => $eid, 'employees.zone_id' => 0, 'employees.franchise_id' => 0), $select, '', '', '', $joins);
            $data['zones'] = $this->web->get_data($comp_id, 'company');
            $this->load->view('admin/zones/edit', $data);
            
        } else {
            $data['name'] = $this->input->post('title');
            $data['description'] = $this->input->post('desc');
            
            $where['client_company_id'] = 0;
            
//            $data['master_id'] = $eid;
//            $data['type'] = 'zone';
            if ($cli_comp != 0) {
                
                $where['client_company_id'] = $cli_comp;
                
                $com_data = $this->web->get_data('','company',$where);
                $data['margin'] = $this->input->post('margin');
            }

            
            $this->web->update_data($comp_id, 'company', $data);
            
            
            
//            echo '<pre>';
//            print_r($com_data);exit;

            if ($cli_comp != 0 && !empty($com_data)) {
                
                $prev_margin = $com_data[0]->margin;
                
                $margin = $this->input->post('margin');
                
                
                if ($prev_margin != $margin) {
                    $new_margin = $margin - $prev_margin;
//                    echo '<pre>';
//                    print_r($com_data);exit;
                    $company_id = $com_data[0]->parent_id;
                    
                    $com_data = $this->web->get_data('', 'category', array('client_company_id' => $cli_comp,
                        'company_id'=>$company_id));
                    
//                    echo '<pre>';
//                    print_r($com_data);exit;
                    
                    $data = array();
//                    print_r($margin);exit;
                    foreach ($com_data as $fav) {
                        $data['margin'] = $margin;
                        $this->web->update_data($fav->id,'category',$data);
                    }
                    
                    
                    
                    
                    
                    $com_data = $this->web->get_data('', 'zones', array('client_company_id' => $cli_comp,
                        'company_id'=>$company_id));
                    
                    $data = array();
                    
                    foreach ($com_data as $fav) {
                        $data['margin'] = $margin;
                        $data['price'] = $fav->parent_price - (($margin / 100) * $fav->parent_price);
                        $this->web->update_data($fav->id,'zones',$data);
                    
                    }
                    
                    
                    
                    
                    
                    
                }
                
            }
            
            
            
            
            

            redirect(base_url() . 'index.php/admin/zones/index/'.$cli_comp);
            
        }
    }

    function add_sub_comp($comp_id) {

        $this->form_validation->set_rules('title', 'Title', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'zones';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Add New Category';
            $data['page_text'] = 'Category';

            $eid = $this->session->userdata('user_id');
            $this->load->view('admin/zones/add', $data);
        } else {
            $data['category_name'] = $this->input->post('title');
            $data['description'] = $this->input->post('desc');
            $data['company_id'] = $comp_id;
            $this->web->insert_data($data, 'category');

            redirect(base_url() . 'index.php/admin/zones/sub_comp/' . $comp_id);
        }
    }

    function edit_sub_comp($comp_id, $sub_comp_id, $cli_comp = 0) {
        if ($comp_id == '')
            show_404();
        if ($sub_comp_id == '')
            show_404();

        $eid = $this->session->userdata('user_id');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'zones';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Edit Category';
            $data['page_text'] = 'Category';
            $data['cli_comp'] = $cli_comp;

            $eid = $this->session->userdata('user_id');
            $data['zones'] = $this->web->get_data('', 'category', array('company_id' => $comp_id, 'id' => $sub_comp_id));

            $this->load->view('admin/zones/sub_edit', $data);
        } else {
            $data['category_name'] = $this->input->post('title');
            $data['description'] = $this->input->post('desc');
            
            $where = array('company_id' => $comp_id, 'id' => $sub_comp_id);
            $where['client_company_id'] = 0;
            
            if ($cli_comp != 0) {
                $where['client_company_id'] = $cli_comp;
                $com_data = $this->web->get_data('','category',$where);
                $data['margin'] = $this->input->post('margin');
            }

            $this->web->update_data('', 'category', $data, $where);
            
//            echo '<pre>';
//            print_r($com_data);exit;

            if ($cli_comp != 0 && !empty($com_data)) {
                
                $prev_margin = $com_data[0]->margin;
                
                $margin = $this->input->post('margin');
                
                
                if ($prev_margin != $margin) {
                    $new_margin = $margin - $prev_margin;
//                    echo '<pre>';
//                    print_r($com_data);exit;
                    $company_id = $com_data[0]->company_id;
                    $category_id = $com_data[0]->parent_id;
                    
                    $com_data = $this->web->get_data('', 'zones', array('client_company_id' => $cli_comp,
                        'company_id'=>$company_id,'category_id'=>$category_id));
                    
                    $data = array();
                    
                    foreach ($com_data as $fav) {
                        $data['margin'] = $margin;
                        $data['price'] = $fav->parent_price - (($margin / 100) * $fav->parent_price);
                        $this->web->update_data($fav->id,'zones',$data);

                    }
                    
                }
                
            }


            if ($cli_comp != 0) {
                redirect(base_url() . 'index.php/admin/zones/sub_comp/' . $comp_id . '/' . $cli_comp);
            } else {
                redirect(base_url() . 'index.php/admin/zones/sub_comp/' . $comp_id);
            }
            
        }
    }

    function zone($comp_id, $cat_id, $cli_comp_id = 0) {
        if (empty($comp_id))
            show_404();
        $data['active_link'] = 'zones';
//        $data['active_sub_link'] = 'contact';

        $com_data = $this->web->get_data($cat_id, 'category');
        $company_name = $this->web->get_data('', 'company', array('company.id' => $comp_id));

        if (!empty($com_data)) {
            $data['table_text'] = $company_name[0]->name . ' ' . $com_data[0]->category_name;
            $data['page_text'] = 'Zones<small>Zones of "' . $company_name[0]->name . ' ' . $com_data[0]->category_name . '"</small>';
        }



        $data['table_url'] = base_url() . 'admin/zones/datatable_zone/' . $comp_id . '/' . $cat_id . '/' . $cli_comp_id;
        $data['add_button'] = array('url' => base_url() . 'admin/zones/add_zone/' . $comp_id . '/' . $cat_id, 'btn_title' => 'Add New Zone');

        $data['back_button'] = array('url' => base_url() . 'admin/zones', 'btn_title' => 'Back');

        $tmpl = array('table_open' => '<table class="display table table-striped table-hover" id="table-4">');

        $this->table->set_template($tmpl);

        $this->table->set_heading('id', 'Name', 'Additional Notes', 'Weight', 'Price', 'Created At', 'Action');

        if ($cli_comp_id != 0) {
            $this->table->set_heading('id', 'Name', 'Additional Notes', 'Weight', 'Price', 'Created At');
            unset($data['add_button']);
            $data['back_button'] = array('url' => base_url() . 'admin/zones/sub_comp/' . $comp_id . '/' . $cli_comp_id, 'btn_title' => 'Back');
            $data['active_link'] = 'companies';
        }

        $this->table->set_footer(
                '<input type="text" name="id" placeholder="Id" class="search_init" />'
                , '<input type="text" name="name" placeholder="Name" class="search_init" />'
                , '<input type="text" name="name" placeholder="Additional Notes" class="search_init" />'
                , '<input type="text" name="name" placeholder="Weight" class="search_init" />'
                , '<input type="text" name="name" placeholder="Price" class="search_init" />'
                , '<input type="text" name="creates" placeholder="Created Date" class="search_init" />'
        );

        $this->load->view('admin/list', $data);
    }

    function datatable_zone($comp_id, $cat_id, $cli_comp_id = 0) {
        $select = 'zones.id, zone.name, zones.description, zones.weight, zones.price, zones.created_at';
        $where = array('company_id' => $comp_id, 'category_id' => $cat_id, 'client_company_id' => 0);
        if ($cli_comp_id != 0) {
            $where['client_company_id'] = $cli_comp_id;
        }
        $joins = array();
        $joins[] = array('zone','zones.zone = zone.id','left');
        
        $generate = $this->web->get_dt_data('', 'zones', $where, $select,'','','',$joins);
        $generate['aaData'] = $this->admin_prepare($generate['aaData'], $comp_id, $cat_id, $cli_comp_id);
        echo json_encode($generate);
        exit;
    }

    function admin_prepare($datas, $comp_id, $cat_id, $cli_comp_id = 0) {
        $re = array();

        if (is_array($datas)) {

            foreach ($datas as $data) {
                $rs = array();
                $edit = '<a href="' . base_url() . 'admin/zones/edit_zone/' . $data[0] . '/' . $comp_id . '/' . $cat_id . '">Edit</a>';
                $delete = '<a href="' . base_url() . 'admin/zones/delete_zones/' . $data[0] . '/' . $comp_id . '/' . $cat_id . '" onclick="return confirm(\'Are you sure you want to delete this Zone?\');">Delete</a>';
                $zones = '<a href="' . base_url() . 'admin/zones/employees/' . $comp_id . '/' . $data[0] . '">View</a>';

                $rs[] = $data[0];
                $rs[] = $data[1];
                $rs[] = $data[2];
                $rs[] = $data[3];
                $rs[] = $data[4];
                $rs[] = date("jS F Y", strtotime($data[5]));
                if ($cli_comp_id == 0) {
                    $rs[] = $edit . '|' . $delete;
                }
                array_push($re, $rs);
            }
        } else {
            $re = '';
        }
        return $re;
    }

    function add_zone($comp_id, $cat_id) {
        if (empty($comp_id))
            show_404();
        if (empty($cat_id))
            show_404();

        $this->form_validation->set_rules('zone', 'Zone', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'zones';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Add New Zone';
            $data['page_text'] = 'Zones';

            $eid = $this->session->userdata('user_id');
            $this->load->view('admin/zones/add_zones', $data);
        } else {
            $data['zone'] = $this->input->post('zone');
            $data['price'] = $this->input->post('price');
            $data['weight'] = $this->input->post('weight');
            $data['description'] = $this->input->post('desc');
            $data['company_id'] = $comp_id;
            $data['category_id'] = $cat_id;
            $zones_id = $this->web->insert_data($data, 'zones');
            
//            $company_data = $this->web->get_data('','employees',array('type'=>'company'));
//            $zone = $data['zone'];
//            $description = $data['description'];
//            $weight = $data['weight'];
//            $parent_price = $data['price'];
//            $data = array();
//            $i = 0;
//            
//            foreach($company_data as $datas){
//                $data[$i]['parent_id'] = $zones_id;
//                $data[$i]['client_company_id'] = $datas->id;
//                $data[$i]['company_id'] = $comp_id;
//                $data[$i]['category_id'] = $cat_id;
//                $data[$i]['zone'] = $zone;
//                $data[$i]['description'] = $description;
//                $data[$i]['margin'] = $datas->margin;
//                $data[$i]['weight'] = $weight;
//                $data[$i]['price'] = $parent_price - (($datas->margin / 100) * $parent_price);
//                $data[$i]['parent_price'] = $parent_price;
//                $i++;
//
//            }
//            
//            $this->web->group_insert_data($data,'zones');
            
            redirect(base_url() . 'index.php/admin/zones/zone/' . $comp_id . '/' . $cat_id);
        }
    }

    function edit_zone($id, $comp_id, $cat_id) {
        if (empty($comp_id))
            show_404();
        if (empty($cat_id))
            show_404();

        $this->form_validation->set_rules('zone', 'Zone', 'required');
        $data = array();
        if ($this->form_validation->run() == FALSE) {
            $data['back_button'] = array('url' => 'javascript:void(0)', 'btn_title' => 'Back', 'onclick' => 'history.go(-1);');
            $data['active_link'] = 'zones';
            $data['active_sub_link'] = 'contact';
            $data['table_text'] = 'Edit Zone';
            $data['page_text'] = 'Zones';

            $eid = $this->session->userdata('user_id');
            $data['zones'] = $this->web->get_data($id, 'zones');
            $this->load->view('admin/zones/edit_zones', $data);
        } else {
            $data['zone'] = $this->input->post('zone');
            $data['price'] = $this->input->post('price');
            $data['weight'] = $this->input->post('weight');
            $data['description'] = $this->input->post('desc');
//            $data['company_id'] = $comp_id;
//            $data['category_id'] = $cat_id;
            $this->web->update_data($id, 'zones', $data);
            
            
            
            
            $zones_data = $this->web->get_data('','zones',array('parent_id'=>$id));
            $zone = $data['zone'];
            $description = $data['description'];
            $weight = $data['weight'];
            $parent_price = $data['price'];
            $data = array();
            
            foreach($zones_data as $datas){
                $data['zone'] = $zone;
                $data['description'] = $description;
                $data['margin'] = $datas->margin;
                $data['weight'] = $weight;
                $data['price'] = $parent_price - (($datas->margin / 100) * $parent_price);
                $data['parent_price'] = $parent_price;
                $this->web->update_data($datas->id, 'zones', $data);
            }


            redirect(base_url() . 'index.php/admin/zones/zone/' . $comp_id . '/' . $cat_id);
        }
    }

    function delete_zones($id = 0, $comp_id = 0, $cat_id = 0) {
        if ($id == 0)
            show_404();
        $this->data = new stdClass();
        $this->web->delete_data($id, 'zones');
        
        $this->web->delete_data('', 'zones',array('parent_id'=>$id));
//        echo 'asdf';exit;
        
        redirect(base_url() . 'admin/zones/zone/' . $comp_id . '/' . $cat_id);

        $this->output->enable_profiler(FALSE);
    }

    function delete_category($comp_id = 0, $cat_id = 0) {
        if ($comp_id == 0)
            show_404();
        if ($cat_id == 0)
            show_404();
        $this->data = new stdClass();
        $this->web->delete_data($cat_id, 'category');
        $this->web->delete_data('', 'category',array('parent_id'=>$cat_id));
        
        $this->web->delete_data('', 'zones',array('company_id'=>$comp_id,'category_id'=>$cat_id));
//        echo 'asdf';exit;
        
        redirect(base_url() . 'admin/zones/sub_comp/' . $comp_id );

        $this->output->enable_profiler(FALSE);
    }

    function delete_company($comp_id = 0) {
        if ($comp_id == 0)
            show_404();
        $this->data = new stdClass();
        
        $this->web->delete_data($comp_id, 'company');
        $this->web->delete_data('', 'company',array('parent_id'=>$comp_id));
        
        $this->web->delete_data('', 'category',array('company_id'=>$comp_id));
        
        $this->web->delete_data('', 'zones',array('company_id'=>$comp_id));
//        echo 'asdf';exit;
        
        redirect(base_url() . 'admin/zones' );

        $this->output->enable_profiler(FALSE);
    }

    
    
    function ChangeStatus() {
        $id = $this->input->post('id');
        $status_data = $this->web->get_data($id, 'employees');
        if ($status_data[0]->is_active == 0) {
            $this->web->update_data($id, 'employees', array('is_active' => 1));
            echo '1';
            exit;
        }
        if ($status_data[0]->is_active == 1) {
            $this->web->update_data($id, 'employees', array('is_active' => 0));
            echo '0';
            exit;
        }
    }
    
}
