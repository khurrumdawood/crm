<?php

if (!function_exists('salesDropdown')) {

    function salesDropdown($name = 'sales_rep', $id = 'sales_rep', $check = '', $class = '', $select = '', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();
        $comp_id = $ci->session->userdata('user_id');
        $sql='';
        if($ci->session->userdata('user_type')=='employee'){

            $sql2 = "select * from employees where type= 'employee' and id = $comp_id";
            $query2 = $ci->db->query($sql2);
            $row2 = $query2->result();

            $sql = "select * from employees where type= 'employee' and company_id=".$row2[0]->company_id;    
        }
        else{
            $sql = "select * from employees where type= 'employee' and company_id= $comp_id ";
        }
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfEmployees = '';
        $listOfEmployees .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfEmployees .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $employees) {

            if ($check == $employees->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfEmployees .= '<option value="' . $employees->id . '" ' . $selected . '>' . $employees->firstname . ' ' . $employees->lastname . '</option>';
        }
        $listOfEmployees .= '</select>';

        return $listOfEmployees;
    }

}

if (!function_exists('countryDropdowns')) {

    function countryDropdowns($name = 'country_c', $id = 'country_c', $check = '', $class = '', $select = '', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();

        $sql = "select * from meta_location where type='CO'";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfCountrys = '';
        $listOfCountrys .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfCountrys .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $countrys) {

            if ($check == $countrys->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfCountrys .= '<option value="' . $countrys->id . '" ' . $selected . '>' . $countrys->name . '</option>';
        }
        $listOfCountrys .= '</select>';

        return $listOfCountrys;
    }

}
if (!function_exists('b_countryDropdown')) {

    function b_countryDropdown($name = 'b_country', $id = 'b_country', $check = '', $class = '', $select = '', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();

        $sql = "select * from meta_location where type='CO'";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfCountrys = '';
        $listOfCountrys .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfCountrys .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $b_countrys) {

            if ($check == $b_countrys->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfCountrys .= '<option value="' . $b_countrys->id . '" ' . $selected . '>' . $b_countrys->name . '</option>';
        }
        $listOfCountrys .= '</select>';

        return $listOfCountrys;
    }

}


if (!function_exists('dropDropdown')) {

    function dropDropdown($row, $name = 'drop', $id = 'drop', $class = '', $check = '', $display = 'Select', $style) {
        $listofdrops = '';
        $listofdrops .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '"' . $style . ' >';
        $listofdrops .= '<option value = "" disabled = "" selected = "" style="color:#A3B1B8;" >' . $display . '</option>';
        foreach ($row as $drop) {

            if ($check == $drop['value'])
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listofdrops .= '<option value="' . $drop['value'] . '" ' . $selected . '>' . $drop['display_value'] . '</option>';
        }
        $listofdrops .= '</select>';

        return $listofdrops;
    }

}



if (!function_exists('timeValue')) {

    function timeValue($name = 'time', $id = 'time', $class = '', $check = '', $display, $style = '') {
        $time = array();
        $times = array();

        $time['value'] = '12:00';
        $time['display_value'] = '12:00';
        $times[] = $time;

        $time['value'] = '12:30';
        $time['display_value'] = '12:30';
        $times[] = $time;

        $time['value'] = '01:00';
        $time['display_value'] = '01:00';
        $times[] = $time;

        $time['value'] = '01:30';
        $time['display_value'] = '01:30';
        $times[] = $time;

        $time['value'] = '02:00';
        $time['display_value'] = '02:00';
        $times[] = $time;

        $time['value'] = '02:30';
        $time['display_value'] = '02:30';
        $times[] = $time;

        $time['value'] = '03:00';
        $time['display_value'] = '03:00';
        $times[] = $time;

        $time['value'] = '03:30';
        $time['display_value'] = '03:30';
        $times[] = $time;

        return dropDropdown($times, $name, $id, $class, $check, $display, $style);
    }

}



if (!function_exists('sales_repDropdown')) {

    function sales_repDropdown($name = 'sales_rep', $id = 'sales_rep', $check = '', $class = '', $select = '', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();
        $fran_id = $ci->session->userdata('franchise_id');
        $sql = "select * from employees where franchise_id=" . $fran_id;
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfSales_reps = '';
        $listOfSales_reps .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfSales_reps .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $sales_reps) {

            if ($check == $sales_reps->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfSales_reps .= '<option value="' . $sales_reps->id . '" ' . $selected . '>' . $sales_reps->firstname . ' ' . $sales_reps->lastname . '</option>';
        }
        $listOfSales_reps .= '</select>';

        return $listOfSales_reps;
    }

}



if (!function_exists('carrierDropdown')) {

    function carrierDropdown($name = 'carrier', $id = 'carrier', $check = '', $class = '', $select = 'Select Carrier', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();

        $sql = "select * from company where parent_id='0' and client_company_id=0";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfCarriers = '';
        $listOfCarriers .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfCarriers .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $carriers) {

            if ($check == $carriers->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfCarriers .= '<option value="' . $carriers->id . '" ' . $selected . '>' . $carriers->name . '</option>';
        }
        $listOfCarriers .= '</select>';

        return $listOfCarriers;
    }

}

if (!function_exists('carrierCategoryDropdown')) {

    function carrierCategoryDropdown($carrier_id, $name = 'carrierCategory', $id = 'carrierCategory', $check = '', $class = '', $select = 'Select Category', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();

        $sql = "select * from category where parent_id=0 and client_company_id = 0 and company_id='$carrier_id'";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfCarrierCategorys = '';
        $listOfCarrierCategorys .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfCarrierCategorys .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $carrierCategorys) {

            if ($check == $carrierCategorys->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfCarrierCategorys .= '<option value="' . $carrierCategorys->id . '" ' . $selected . '>' . $carrierCategorys->category_name . '</option>';
        }
        $listOfCarrierCategorys .= '</select>';

        return $listOfCarrierCategorys;
    }

}


if (!function_exists('carrierPackageDropdown')) {

    function carrierPackageDropdown($carrier_id, $name = 'carrierPackage', $id = 'carrierPackage', $check = '', $class = '', $select = 'Select Package Type', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();

        $sql = "select * from carrier_packges where company_id = '$carrier_id'";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfCarrierPackages = '';
        $listOfCarrierPackages .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfCarrierPackages .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $carrierPackages) {

            if ($check == $carrierPackages->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfCarrierPackages .= '<option value="' . $carrierPackages->id . '" ' . $selected . '>' . $carrierPackages->name . '</option>';
        }
        $listOfCarrierPackages .= '</select>';

        return $listOfCarrierPackages;
    }

}

//echo carrierPackageDropdown('carrierPackage','carrierPackage','','chzn-select', 'Select CarrierPackage' ,' data-placeholder="Select CarrierPackage" style="max-width:250px; height:37px;"');





if (!function_exists('customerTypeDropdown')) {

    function customerTypeDropdown($name = 'customerType', $id = 'customerType', $check = '', $class = '', $select = '', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();

        $sql = "select * from customer_type";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfCustomerTypes = '';
        $listOfCustomerTypes .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfCustomerTypes .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $customerTypes) {

            if ($check == $customerTypes->type)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfCustomerTypes .= '<option value="' . $customerTypes->type . '" ' . $selected . '>' . $customerTypes->type . '</option>';
        }
        $listOfCustomerTypes .= '</select>';

        return $listOfCustomerTypes;
    }

}



if (!function_exists('previousCarrierDropdown')) {

    function previousCarrierDropdown($customer_id, $name = 'previousCarrier', $id = 'previousCarrier', $check = '', $class = '', $select = '', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();

        $sql = "select c.id, company.name, c.is_current from customer_o_carrior as c "
                . " INNER JOIN company ON c.carrier_id = company.id"
                . " where c.customer_id = '$customer_id'";
        $query = $ci->db->query($sql);
        $row = $query->result();
//        echo '<pre>';
//        var_dump($row);exit;
        $listOfPreviousCarriers = '';
        $listOfPreviousCarriers .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfPreviousCarriers .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $previousCarriers) {

            if ($previousCarriers->is_current == "1")
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfPreviousCarriers .= '<option value="' . $previousCarriers->id . '" ' . $selected . '>' . $previousCarriers->name . '</option>';
        }
        $listOfPreviousCarriers .= '</select>';

        return $listOfPreviousCarriers;
    }

}



if (!function_exists('zoneListDropdown')) {

    function zoneListDropdown($name = 'zoneList', $id = 'zoneList', $check = '', $class = '', $select = '', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();

        $sql = "select * from zone";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfZoneLists = '';
        $listOfZoneLists .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfZoneLists .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $zoneLists) {

            if ($check == $zoneLists->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfZoneLists .= '<option value="' . $zoneLists->id . '" ' . $selected . '>' . $zoneLists->name . '</option>';
        }
        $listOfZoneLists .= '</select>';

        return $listOfZoneLists;
    }

}



if (!function_exists('zoneCountryDropdown')) {

    function zoneCountryDropdown($country_ids, $name = 'zoneCountry', $id = 'zoneCountry', $check = '', $class = '', $select = 'Select Services', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();

        $customer_id = $ci->session->userdata('customer_id');

        if (!is_array($country_ids)) {
            $listOfZoneCountrys = '';
            $listOfZoneCountrys .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
            if ($select) {
                $listOfZoneCountrys .= '<option value="">' . $select . '</option>';
            }
            $listOfZoneCountrys .= '</select>';
            return $listOfZoneCountrys;
        }

        $country_id = implode("','", $country_ids);


        $ci->load->model('admin_model', 'web');

        $zone_countries_data = $ci->web->get_data('', 'zone_countries', "country_id in ('$country_id')");

        if (empty($zone_countries_data)) {
            $listOfZoneCountrys = '';
            $listOfZoneCountrys .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
            if ($select) {
                $listOfZoneCountrys .= '<option value="">' . $select . '</option>';
            }
            $listOfZoneCountrys .= '</select>';
            return $listOfZoneCountrys;
        }


        $zone_ids = fetch_single_element_from_array($zone_countries_data, 'zone_id');


        $zone_id = implode("','", $zone_ids);

        $sql = "select zones.id,company.name,category.category_name from zones "
                . "inner join company "
                . "on zones.company_id = company.id   "
                . "inner join category "
                . "on zones.category_id = category.id   "
                . " where zones.parent_id=0 and zones.client_company_id=0 and zones.zone in ('$zone_id')";

        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfZoneCountrys = '';
        $listOfZoneCountrys .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfZoneCountrys .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $zoneCountrys) {

            if ($check == $zoneCountrys->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfZoneCountrys .= '<option value="' . $zoneCountrys->id . '" ' . $selected . '>' . $zoneCountrys->name . ' ' . $zoneCountrys->category_name . '</option>';
        }
        $listOfZoneCountrys .= '</select>';

        return $listOfZoneCountrys;
    }

}


if(!function_exists('metaLocationDropdown')) {
    function metaLocationDropdown($parent_id, $name='metaLocation',$id='metaLocation',$check='',$class ='', $select='' ,$extra='') {
        $ci=& get_instance();
        $ci->load->database();

        $sql = "select * from meta_location where in_location = '$parent_id'";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfMetaLocations = '';
        $listOfMetaLocations .= '<select name="'.$name.'" id="'.$id.'" class="'.$class.'" '.$extra.' >';
        if($select){
            $listOfMetaLocations .= '<option value="">'.$select.'</option>';
        }
        foreach($row as $metaLocations) {

            if($check==$metaLocations->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfMetaLocations .= '<option value="'.$metaLocations->id.'" '.$selected.'>'.$metaLocations->local_name.'</option>';
        }
        $listOfMetaLocations .= '</select>';

        return $listOfMetaLocations ;

    }
}



if(!function_exists('countryDropdown')) {
    function countryDropdown($name='country',$id='country',$check='',$class ='', $select='Select Country' ,$extra='') {
        $ci=& get_instance();
        $ci->load->database();

        $sql = "select * from meta_location where type='CO'";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfCountrys = '';
        $listOfCountrys .= '<select name="'.$name.'" id="'.$id.'" class="'.$class.'" '.$extra.' >';
        if($select){
            $listOfCountrys .= '<option value="">'.$select.'</option>';
        }
        foreach($row as $countrys) {

            if($check==$countrys->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfCountrys .= '<option value="'.$countrys->id.'" '.$selected.'>'.$countrys->name.'</option>';
        }
        $listOfCountrys .= '</select>';

        return $listOfCountrys ;

    }
}



if(!function_exists('stateDropdown')) {
    function stateDropdown($country_id,$name='state',$id='state',$check='',$class ='', $select='Select State' ,$extra='') {
        $ci=& get_instance();
        $ci->load->database();

        $sql = "select * from meta_location where type='RE' and in_location = '$country_id'";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfStates = '';
        $listOfStates .= '<select name="'.$name.'" id="'.$id.'" class="'.$class.'" '.$extra.' >';
        if($select){
            $listOfStates .= '<option value="">'.$select.'</option>';
        }
        foreach($row as $states) {

            if($check==$states->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfStates .= '<option value="'.$states->id.'" '.$selected.'>'.$states->name.'</option>';
        }
        $listOfStates .= '</select>';

        return $listOfStates ;

    }
}



if(!function_exists('cityDropdown')) {
    function cityDropdown($state_id,$name='city',$id='city',$check='',$class ='', $select='Select City' ,$extra='') {
        $ci=& get_instance();
        $ci->load->database();

        $sql = "select * from meta_location where type='CI' and in_location = '$state_id'";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfCitys = '';
        $listOfCitys .= '<select name="'.$name.'" id="'.$id.'" class="'.$class.'" '.$extra.' >';
        if($select){
            $listOfCitys .= '<option value="">'.$select.'</option>';
        }
        foreach($row as $citys) {

            if($check==$citys->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfCitys .= '<option value="'.$citys->id.'" '.$selected.'>'.$citys->name.'</option>';
        }
        $listOfCitys .= '</select>';

        return $listOfCitys ;

    }
}







if (!function_exists('customerDropdownNote')) {

    function customerDropdownNote($name = 'country', $id = 'country', $check = '', $class = '', $select = '', $extra = '') {
        $ci = & get_instance();
        $ci->load->database();
        $sql = '';
        if ($ci->session->userdata('user_type') == 'master') {
            $sql = "select * from customer";
        } elseif ($ci->session->userdata('user_type') == 'company') {
            
            $sql = "select * from customer where company_id = ". $ci->session->userdata('user_id');
        } elseif ($ci->session->userdata('user_type') == 'employee') {
            $sql = "select * from customer where employee_id = ". $ci->session->userdata('user_id');
        }
//        $sql = "select * from customer";
        $query = $ci->db->query($sql);
        $row = $query->result();
        $listOfCustomerNote = '';
        $listOfCustomerNote .= '<select name="' . $name . '" id="' . $id . '" class="' . $class . '" ' . $extra . ' >';
        if ($select) {
            $listOfCustomerNote .= '<option value="">' . $select . '</option>';
        }
        foreach ($row as $customerNote) {

            if ($check == $customerNote->id)
                $selected = 'selected="selected"';
            else
                $selected = '';
            $listOfCustomerNote .= '<option value="' . $customerNote->id . '" ' . $selected . '>' . $customerNote->name . '</option>';
        }
        $listOfCustomerNote .= '</select>';

        return $listOfCustomerNote;
    }

}



if(!function_exists('notification')) {
    function notification() {
        $ci=& get_instance();
        $ci->load->database();
        $data2 = array();
        $data2['customer_id'] = $ci->session->userdata('customer_id');
        $customer_id = $ci->session->userdata('customer_id');
//        $data['note'] = $this->web->get_data('', 'note', array('note.customer_id = '=>$customer_id,'note.followup_date'=>date('Y-m-d')),'');
//        $data['previous_note'] = $this->web->get_data('', 'note', array('note.customer_id = '=>$customer_id,'note.followup_date <='=>date('Y-m-d')),'');
        $sql1 = "select * from note where note.customer_id = '$customer_id' And note.followup_date = '". date('Y-m-d')."'";
        $sql2 = "select * from note where note.customer_id = '$customer_id' And note.followup_date <='". date('Y-m-d')."'";
//        $sql = "select * from meta_location where type='CI' and in_location = '$state_id'";
        $query1 = $ci->db->query($sql1);
        $query2 = $ci->db->query($sql2);
        $data2['note'] = $query1->result();
        $data2['previous_note'] = $query2->result();
//        $note = '';
        
        return $data2;

    }
}

if(!function_exists('fetch_single_element_from_array')) {
            function fetch_single_element_from_array($datas,$element,$post_string='') {
                $re = array();
                foreach($datas as $data){
                    $rs = array();
                    $rs = $data->$element.$post_string;
                    array_push($re,$rs);
                }

                return $re;
            }
        }
        
        
        if(!function_exists('get_country_name')) {
    function get_country_name($country_id) {
        $ci=& get_instance();
        $ci->load->database();
        $data2 = array();
//        $data2['customer_id'] = $ci->session->userdata('customer_id');
        $customer_id = $ci->session->userdata('customer_id');
        $sql1 = "select * from countries where countries.country_id = '$country_id' ";
        $query1 = $ci->db->query($sql1);
        $country_data = $query1->result();
        if($country_data){
            $country_name = $country_data[0]->country_name;
            return $country_name;
        }
        else {
            return '';
        }
//        $note = '';
        
        

    }
}
        if(!function_exists('get_state_or_city_name')) {
    function get_state_or_city_name($id) {
        $ci=& get_instance();
        $ci->load->database();
        $data2 = array();
        $customer_id = $ci->session->userdata('customer_id');
        $sql1 = "select * from meta_location where meta_location.id = '$id' ";
        $query1 = $ci->db->query($sql1);
        $state_data = $query1->result();
        if($state_data){
            $state_name = $state_data[0]->name;;
            return $state_name;
        }
        else {
            return '';
        }
        

    }
}
        if(!function_exists('get_name')) {
    function get_name($table,$id) {
        $ci=& get_instance();
        $ci->load->database();
        $data2 = array();
//        $sql1 = "select * from '$table' where id = '$id' ";
        $sql1 = "select * from $table where id = '$id' ";
        $query1 = $ci->db->query($sql1);
        $query_data = $query1->result();
        if($query_data){
            $query_name = $query_data[0]->name;;
            return $query_name;
        }
        else {
            return '';
        }        

    }
}

?>
