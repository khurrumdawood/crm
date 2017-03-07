<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('adminImageUrl')) {

    function adminImageUrl() {
        $CI = & get_instance();
        return $CI->config->slash_item('base_url_admin_images');
    }

}


//////DROP DOWN FOR MONTHS////////////////
if (!function_exists('monthDropdown')) {

    function monthDropdown($name = "month", $selected = null, $extra = null) {
        if ($extra == null) {
            $dd = '<select name="' . $name . '" id="' . $name . '" style="width:34%">';
            $dd .= '<option value="" >Month';
        }
        else
            $dd = '<select name="' . $name . '" id="' . $name . '" onChange="' . $extra . '" class="validate[required]">';

        $months = array(
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December');
        /*         * * the current month ** */
        //$selected = is_null($selected) ? date('n', time()) : $selected;
        $selected = is_null($selected) ? '' : $selected;

        for ($i = 1; $i <= 12; $i++) {
            $dd .= '<option value="' . $i . '"';
            if ($i == $selected) {
                $dd .= ' selected';
            }
            /*             * * get the month ** */
            $dd .= '>' . $months[$i] . '</option>';
        }
        $dd .= '</select>';
        return $dd;
    }

}
if (!function_exists('dateDropdown')) {

    function dateDropdown($name = "date", $selected = null, $extra = null) {
        if ($extra == null) {
            $dd = '<select name="' . $name . '" id="' . $name . '" style="width:32%" class="validate[required]">';
            $dd .= '<option value="" style="width:77px" >Date';
        }
        else
            $dd = '<select name="' . $name . '" id="' . $name . '" onChange="' . $extra . '">';

        $date = array(
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
            10 => 10,
            11 => 11,
            12 => 12,
            13 => 13,
            14 => 14,
            15 => 15,
            16 => 16,
            17 => 17,
            18 => 18,
            19 => 19,
            20 => 20,
            21 => 21,
            22 => 22,
            23 => 23,
            24 => 24,
            25 => 25,
            26 => 26,
            27 => 27,
            28 => 28,
            29 => 29,
            30 => 30,
            31 => 31,
        );
        /*         * * the current date ** */
        //$selected = is_null($selected) ? date('n', time()) : $selected;
        $selected = is_null($selected) ? '' : $selected;

        for ($i = 1; $i <= 31; $i++) {
            $dd .= '<option value="' . $i . '"';
            if ($i == $selected) {
                $dd .= ' selected';
            }
            /*             * * get the month ** */
            $dd .= '>' . $date[$i] . '</option>';
        }
        $dd .= '</select>';
        return $dd;
    }

}
//////////////////////////////////////////
/////////////DROP DOWN FOR YEARS///////////
if (!function_exists('createYears')) {

    function createYears($start_year, $end_year, $id = 'year_select', $selected = null) {

        /*         * * the current year ** */
        $selected = is_null($selected) ? '' : $selected;
        //$selected = is_null($selected) ? date('Y') : $selected;

        /*         * * range of years ** */
        $r = range($start_year, $end_year);

        /*         * * create the select ** */
        $select = '<select name="' . $id . '" id="' . $id . '" style="width:33%" class="validate[required]">';
        $select .= '<option name="" id="" style="width:77px" >Year';
        foreach ($r as $year) {
            $select .= "<option value=\"$year\"";
            $select .= ($year == $selected) ? ' selected="selected"' : '';
            $select .= ">$year</option>\n";
        }
        $select .= '</select>';
        return $select;
    }

}
/////////////////////////////////////////////////////


if (!function_exists('set_value')) {

    function set_value($field = '', $default = '') {
        if (FALSE === ($OBJ = & _get_validation_object())) {
            if (!isset($_POST[$field])) {
                return $default;
            }

            return form_prep($_POST[$field], $field);
        }

        return form_prep($OBJ->set_value($field, $default), $field);
    }

}

if (!function_exists('_get_validation_object')) {

    function &_get_validation_object() {
        $CI = & get_instance();

        // We set this as a variable since we're returning by reference.
        $return = FALSE;

        if (FALSE !== ($object = $CI->load->is_loaded('form_validation'))) {
            if (!isset($CI->$object) OR !is_object($CI->$object)) {
                return $return;
            }

            return $CI->$object;
        }

        return $return;
    }

}

if (!function_exists('form_error')) {

    function form_error($field = '', $prefix = '', $suffix = '') {
        if (FALSE === ($OBJ = & _get_validation_object())) {
            return '';
        }

        return $OBJ->error($field, $prefix, $suffix);
    }

}

function link_js($file) {
    //$version = '';
    //$filepath = get_root_folder() . 'js/' . $file;
    //if (strpos($filepath,'?')===false && file_exists($filepath)) $version = '?v='.filemtime($filepath);
    //$file .= $version;
    return '<script type="text/javascript" src="' . base_url() . 'js/' . $file . '"></script>';
}

if (!function_exists('base_url_front_images')) {

    function frontImageUrl() {
        $CI = & get_instance();
        return $CI->config->slash_item('base_url_front_images');
    }

}





/*
 * _getCompanyInfo
 *
 */
if (!function_exists('getCompanyInfo')) {

    function getCompanyInfo() {
        //	$CI =& get_instance();
        //$CI->load->model('admin/settings_model', 'Setting_Model');
        //	$data= $CI->Setting_Model->viewSettings();

        $companyInfo = array(
            '{COMPANY_NAME}' => 'recyclebeacon',
            '{COMPANY_LOGO_URL}' => adminImageUrl() . 'logo.png',
            '{COMPANY_WEB}' => '#',
            '{COMPANY_ADDRESS}' => '',
            '{COMPANY_EMAIL}' => '',
            '{COMPANY_PHONE}' => '',
            '{COMPANY_ABOUTUS}' => '',
            '{COMPANY_ADMIN_EMAIL}' => 'support@recyclebeacon.com',
        );

        return $companyInfo;
    }

}


if (!function_exists('create_thumbs_new')) {

    function create_thumbs_new($path, $source, $destination, $inputwidth, $inputheight) {

        $CI = & get_instance();
//        $sizeArr = array('thumb' => '62', 'small' => '180', 'large' => '245');

        $CI->load->library('image_lib');
        //$path = "path/to/image/";

        $source_image = $source;
        $medium_image = $destination;


        $size = getimagesize($path . $source);
//        print_r($size);exit;
        $width = $size[0];
        $height = $size[1];


// So then if the image is wider rather than taller, set the width and figure out the height
        if (($width / $height) > ($inputwidth / $inputheight)) {
            $outputwidth = $inputwidth;
            $outputheight = ($inputwidth * $height) / $width;
        }
// And if the image is taller rather than wider, then set the height and figure out the width
        elseif (($width / $height) < ($inputwidth / $inputheight)) {
            $outputwidth = ($inputheight * $width) / $height;
            $outputheight = $inputheight;
        }
// And because it is entirely possible that the image could be the exact same size/aspect ratio of the desired area, so we have that covered as well
        elseif (($width / $height) == ($inputwidth / $inputheight)) {
            $outputwidth = $inputwidth;
            $outputheight = $inputheight;
        }


//        $medium_image = strtolower(str_replace(' ', '_', $medium_image));
//        $medium_image = str_replace('/', '', $medium_image);
//        $medium_image = str_replace('(', '', $medium_image);
//        $medium_image = str_replace(')', '', $medium_image);
//print_r($medium_image);exit;

        $config['image_library'] = 'gd2';
        $config['source_image'] = $path . $source_image;
        $config['new_image'] = $path . $medium_image;
        $config['width'] = $outputwidth;
        $config['height'] = $outputheight;
        $config['maintain_ratio'] = FALSE;
//        echo '<pre>';
//        print_r($config);exit;
        $CI->image_lib->initialize($config);
//        $CI->load->library('image_lib', $config);

        if (!$CI->image_lib->resize()) {
            // an error occured
            echo $CI->image_lib->display_errors();
        }

        // Keep the same source image
    }

}



if (!function_exists('generateImageWiththumbs')) {

    function generateImageWiththumbs($file_name, $image_name, $path, $sizes) {
        $file = $_FILES[$file_name];
        $tmp_name = $file['tmp_name'];
        if ($tmp_name) {
            $filename = $file['name'];
            $ext = get_file_extension($filename);
            $pat = strtolower(str_replace(' ', '_', $image_name));
            $pat = str_replace('/', '', $pat);
            $pat = str_replace('(', '', $pat);
            $pat = str_replace(')', '', $pat);
            $uploadPath = dirname(BASEPATH) . "/uploads/$path/";
            $file_name = $pat;
            $upfile = $file_name . ".$ext";
            move_uploaded_file($tmp_name, $uploadPath . $upfile);
            foreach ($sizes as $size) {
                create_thumbs_new($uploadPath, $upfile, "$size[title]/" . $file_name . $size['post_fix'] . '.' . $ext, $size['width'], $size['height']);
            }
            return $upfile;
        }
        return '';
    }

}



if (!function_exists('get_file_extension')) {

    function get_file_extension($file_name) {
        return substr(strrchr($file_name, '.'), 1);
    }

}








if (!function_exists('generateProfileImageSize')) {

    function generateProfileImageSize($file_name, $image_name, $path) {
        $size = array();

        $size[0]['width'] = 72;
        $size[0]['height'] = 72;
        $size[0]['title'] = 'thumb';
        $size[0]['post_fix'] = '_72';

        $name = generateImageWiththumbs($file_name, $image_name, $path, $size);
        return $name;
    }

}



if (!function_exists('unlinkProfileImages')) {

    function unlinkProfileImages($file_name, $path) {

        $ext = substr(strrchr($file_name, '.'), 1);
        $file = str_replace('.' . $ext, '', $file_name);
        @unlink("uploads/$path/thumb/" . $file . '_72.' . $ext);
        @unlink("uploads/$path/" . $file . '.' . $ext);
    }

}



if (!function_exists('getProfileImageSize')) {

    function getProfileImageSize($file_name, $type) {
        $ext = substr(strrchr($file_name, '.'), 1);
        $file = str_replace('.' . $ext, '', $file_name);
        if ($type == 'profile') {
            return 'profile/' . $file . '_72.' . $ext;
        }
    }

}


if (!function_exists('getApplicationId')) {

    function getApplicationId() {
        return 1;
    }

}


if (!function_exists('get_point_data')) {

    function get_point_data($user_id) {
        $CI = & get_instance();

        $res = $CI->db->query("SELECT rb_points, xp_points,points, total_points, spends_points
                                FROM user
                                    WHERE is_active = 1
                                    AND id = '$user_id'
                                    AND application_id = " . getApplicationId()
                )->result();

        $points_data = array();

//        echo '<pre>';
//        print_r($res);exit;
        $points_data[0]['rb_points'] = $res[0]->rb_points;

        $points_data[0]['xp_points'] = $res[0]->xp_points;

        $points_data[0]['points'] = $res[0]->points;

        $points_data[0]['total_points'] = $res[0]->total_points;
        
        $points_data[0]['purchased_points'] = $res[0]->total_points - $res[0]->spends_points;


        return $points_data;
    }

}





if (!function_exists('get_top_rank')) {

    function get_top_rank($user_id) {
        $CI = & get_instance();

        $res = $CI->db->query("SELECT id, firstname, lastname, rb_points, xp_points, points
                                FROM user
                                    WHERE is_active = 1
                                    AND user_id = '$user_id'
                                    AND application_id = " . getApplicationId() .
                        "order by total_points limit 10"
                )->result();

        print_r($res);
        exit;

        $points_data = array();

        $points_data[0]['rb_points'] = $res[0]->rb_points;

        $points_data[0]['xp_points'] = $res[0]->xp_points;

        $points_data[0]['points'] = $res[0]->points;

        $points_data[0]['total_points'] = $res[0]->total_points;


        return $points_data;
    }

}








if (!function_exists('get_user_deposit_bin')) {

    function get_user_deposit_bin($user_id) {
        $CI = & get_instance();
        $CI->load->model('recycle_model', 'web');

        $res = $CI->db->query("SELECT sum(deposit_weight) as sum_deposit_weight 
                        FROM user_bin_deposit
                            WHERE is_active = 1
                             AND user_id = '$user_id'
                             AND application_id = " . getApplicationId()
                )->result();


        $bin_deposit_data = array();

        if (isset($res[0]->sum_deposit_weight)) {
            $bin_deposit_data[0]['total_deposit_weight'] = $res[0]->sum_deposit_weight;
        } else {
            $bin_deposit_data[0]['total_deposit_weight'] = 0;
        }

        return $bin_deposit_data;
    }

}



if (!function_exists('get_user_rank')) {

    function get_user_rank($user_id) {
        $CI = & get_instance();

        $res = $CI->db->query("SELECT  FIND_IN_SET( total_points, (    
                    SELECT GROUP_CONCAT( total_points
                    ORDER BY total_points DESC ) 
                    FROM user 
			where application_id = " . getApplicationId() . " and is_active = 1)
                   ) AS rank
                    FROM user
            
                WHERE id = " . $user_id)->result();
        if (is_array($res))
            return $res[0]->rank;
        else
            return 0;
    }

}








if (!function_exists('get_user_community')) {

    function get_user_community($user_id) {
        $CI = & get_instance();
        $res = $CI->db->query("SELECT community_id FROM user WHERE id='$user_id'")->result();
        if (count($res)) {
            return $res[0]->community_id;
        } else {
            return '';
        }
    }

}



if (!function_exists('get_admin_super')) {

    function get_admin_super($user_id) {

        $CI = & get_instance();
        $res = $CI->db->query("SELECT is_super FROM gamnification_user WHERE id='$user_id'")->result();
        if (count($res)) {
            return $res[0]->is_super;
        } else {
            return 0;
        }
    }

}






if (!function_exists('fetch_single_element_from_array')) {

    function fetch_single_element_from_array($datas, $element, $post_string = '') {
        $re = array();
        foreach ($datas as $data) {
            $rs = array();
            $rs = $data->$element . $post_string;
            array_push($re, $rs);
        }

        return $re;
    }

}






if (!function_exists('array_merge_native')) {

    function array_merge_native($arrs) {
        $list = array();

        foreach ($arrs as $arr) {
            if (is_array($arr)) {
                $list = array_merge($list, $arr);
            }
        }

        return $list;
    }

}

















if (!function_exists('data_structure')) {

    function data_structure($datas, $data_strucs) {
        $re = array();
        foreach ($datas as $data) {
            $rs = array();
            $key = array_search('combine', $data_strucs);

//            $data[$key];
//            print_r($data[$key]);

            if (!isset($b)) {
                $b = $data[$key];
                $flag = 1;
            }


            if ($b == $data[$key]) {
                $b == $data[$key];
            } else {
                $flag = 1;
            }



            if ($flag == 1) {
//                foreach($data_strucs as $data_struc)
//                {
//                    if($data_struc!='combine'){
//                        print_r($data_struc);echo ' .. ';
//                    }else{
//                        $record_key = array_search('combine', $data_strucs);
//                        print_r($data[$record_key]);echo ' .. ';
//                        
//                    }
//                }
//                echo '<br>';
//                $flag = 0;
            }
            foreach ($data_strucs as $data_struc) {
                
            }
//            if($data[$key])
//            {
//                
//            }
//            
//            exit;
//            
//            
//            if (array_key_exists('first', $search_array)) {
//                echo "The 'first' element is in the array";
//            }
//            $rs = $data->$element.$post_string;
            array_push($re, $rs);
        }
        exit;
        return $re;
    }

}






if (!function_exists('record_not_exist_error')) {

    function record_not_exist_error($return_obj, $datas, $message) {
        if ($datas == 0) {
            $return_obj->success = false;
            $return_obj->message = $message;
            echo json_encode($return_obj);
            exit;
        }
    }

}


if (!function_exists('duplicate_record_error')) {

    function duplicate_record_error($return_obj, $datas, $message) {
        if ($datas != 0) {
            $return_obj->success = false;
            $return_obj->message = $message;
            echo json_encode($return_obj);
            exit;
        }
    }

}


















/*
/* End of file hbm_helper.php */
/* Location: ./system/helpers/hbm_helper.php */



