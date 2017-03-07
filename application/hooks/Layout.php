<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 */
class Layout {

    function render() {
    global $OUT;
  
    $CI =& get_instance();
    $output = $CI->output->get_output();
    
    if (isset($CI->layout))
    {
      if (!preg_match('/(.+).php$/', $CI->layout))
      {
        $CI->layout .= '.php';
      }

     $l = explode("_",$CI->layout);
	  $requested = BASEPATH . '../application/views/layouts/' . $CI->layout;
	  
	  if(in_array('admin',$l))
	  {
            $default = BASEPATH . '../application/views/layouts/default.php';
	  }
	  else
	  {
		  $default = BASEPATH . '../application/views/layouts/default_admin.php';
	  }
      
      if (file_exists($requested))
      {
        $layout = $CI->load->file($requested, true);
        $view = str_replace("{yield}", $output, $layout);
      }
      else
      {
        $layout = $CI->load->file($default, true);
        $view = str_replace("{yield}", $output, $layout);
      }
    }
    else
    {
      $view = $output;
    }
    
    $OUT->_display($view);
    }

}

?> 