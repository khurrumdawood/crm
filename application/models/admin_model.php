<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
//    function index(){
//return $query = $this->db->get('address_book');
//    /*
//    Here you should note i am returning 
//    the query object instead of 
//    $query->result() or $query->result_array()
//    */
//}    


    public function get_all_data($table) {
        $this->db->where('application_id', admin_application_id());
        $result = $this->db->get($table);
        return $result;
    }

    function login($email, $pass) {
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $this->db->where('is_active', 1);
        $query = $this->db->get("employees");

        return $query;
    }
    
    function login_cus($email, $pass) {
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
//        $this->db->where('is_active', 1);
        $query = $this->db->get("customer");

        return $query;
    }

    function edit_profile($user_id) {
        $this->db->where('id', $user_id);
        $result = $this->db->get('gamnification_user');
        return $result;
    }

    function update_profile($data, $user_id) {
        $this->db->where('id', $user_id);
        $this->db->update('gamnification_user', $data);
    }

    function insert_data($data, $table) {
//        $data['application_id'] = admin_application_id();
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function group_insert_data($data, $table) {
//        $data['application_id'] = admin_application_id();
        $this->db->insert_batch($table, $data);
//        return $this->db->insert_id();
    }

    public function update_data($id, $table, $data, $where = "") {

        if ($where != "") {
            $this->db->where($where);
//            $this->db->where(array('application_id' => admin_application_id()));
        } 
        if ($id != "") {
            $this->db->where('id', $id);
        }
        $this->db->update($table, $data);
    }

    public function delete_data($id, $table, $where = "") {
        if ($where != "") {
            $this->db->where($where);
        } 
        if ($id != "") {
            $this->db->where('id', $id);
        }
        $this->db->delete($table);
    }

    public function get_data($id, $table, $where = "", $select = '', $limit = '', $order_by = "", $order = "", $joins = '', $group_by = "") {
        if ($group_by != "") {
            $this->db->group_by($group_by);
        }

        if ($limit != "") {
            $this->db->limit($limit[0], $limit[1]);
        }

        if (!is_array($order_by)) {
            if ($order_by != "") {
                if ($order != "") {
                    $this->db->order_by($order_by, $order);
                } else {
                    $this->db->order_by($order_by, "desc");
                }
            }
        } else {
//            print_r($order_by);exit;
            foreach ($order_by as $key => $orders) {
                $this->db->order_by($orders[0], $orders[1]);
//                print_r($orders);
            }
//            exit;
        }


        if ($joins != "") {
            foreach ($joins as $join) {
                $this->db->join($join[0], $join[1], $join[2]);
            }
        }

        //$this->db->where(array($table . '.application_id' => admin_application_id()));

        if ($where != "") {
            $this->db->where($where);
        }


        if ($id != "") {
            $this->db->where('id', $id);
        }

        if (is_array($select)) {
            $this->db->select($select[0], $select[1]);
        } else {
            $this->db->select($select);
        }

        $result = $this->db->get($table)->result();
//        if (count($result)) {
//            return $result;
//        }
//        return 0;
        return $result;
    }
    public function get_data_export($id, $table, $where = "", $select = '', $limit = '', $order_by = "", $order = "", $joins = '', $group_by = "") {
        if ($group_by != "") {
            $this->db->group_by($group_by);
        }

        if ($limit != "") {
            $this->db->limit($limit[0], $limit[1]);
        }

        if (!is_array($order_by)) {
            if ($order_by != "") {
                if ($order != "") {
                    $this->db->order_by($order_by, $order);
                } else {
                    $this->db->order_by($order_by, "desc");
                }
            }
        } else {
//            print_r($order_by);exit;
            foreach ($order_by as $key => $orders) {
                $this->db->order_by($orders[0], $orders[1]);
//                print_r($orders);
            }
//            exit;
        }


        if ($joins != "") {
            foreach ($joins as $join) {
                $this->db->join($join[0], $join[1], $join[2]);
            }
        }

        //$this->db->where(array($table . '.application_id' => admin_application_id()));

        if ($where != "") {
            $this->db->where($where);
        }


        if ($id != "") {
            $this->db->where('id', $id);
        }

        if (is_array($select)) {
            $this->db->select($select[0], $select[1]);
        } else {
            $this->db->select($select);
        }

        return $query = $this->db->get($table);

//        $result = $this->db->get($table)->result();
//        if (count($result)) {
//            return $result;
//        }
//        return 0;
//        return $result;
    }

    public function get_dt_data($id, $table, $where = "", $select = '', $limit = '', $order_by= "", $order = "", $joins = '', $group_by = "",$distinct = '') {
        $this->load->library('Datatables');
        if ($distinct != "") {
            $this->datatables->distinct($distinct);
        }

        if ($group_by != "") {
            $this->datatables->group_by($group_by);
        }

        if ($limit != "") {
            $this->datatables->limit($limit[0], $limit[1]);
        }

        if (!is_array($order_by)) {
            if ($order_by != "") {
                if ($order != "") {
                    $this->datatables->order_by($order_by, $order);
                } else {
                    $this->datatables->order_by($order_by, "desc");
                }
            }
        } else {
//            print_r($order_by);exit;
            foreach ($order_by as $key => $orders) {
                $this->datatables->order_by($orders[0], $orders[1]);
//                print_r($orders);
            }
//            exit;
        }


        if ($joins != "") {
            foreach ($joins as $join) {
                $this->datatables->join($join[0], $join[1], $join[2]);
            }
        }

        

        if ($where != "") {
            $this->datatables->where($where);
        }


        if ($id != "") {
            $this->datatables->where('id', $id);
        }

        if (is_array($select)) {
            $this->datatables->select($select[0], $select[1]);
        } else {
            $this->datatables->select($select);
        }

        $this->datatables->from($table);

        $result = $this->datatables->generate();

        return $result;
    }

//    public function get_all_data($table) {
//        $this->db->where(array('application_id' => admin_application_id()));
//        $result = $this->db->get($table)->result();
//        if (count($result)) {
//            return $result;
//        }
//        return 0;
//    }

    public function check_data($id, $table, $where = "", $order_by = "") {
        $this->db->where(array('application_id' => admin_application_id()));
        if ($where != "") {
            $this->db->where($where);
        } else {
            $this->db->where('id', $id);
        }
        $result = $this->db->get($table)->result();
        if (count($result)) {
            return true;
        }
        return false;
    }

    public function get_id($table, $where) {
        $this->db->where(array('application_id' => admin_application_id()));
        $this->db->where($where);
        $result = $this->db->get($table)->result();
        if ($result) {
            return $result[0]->id;
        }
        return 0;
    }

    public function show_data($table, $where) {
        $this->db->where(array('application_id' => admin_application_id()));
        $this->db->where($where);
        $result = $this->db->get($table)->result();
        if ($result) {
            return $result;
        }
        return false;
    }

}