<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Plugin jNotify v2.0</title>
        <meta http-equiv="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="jquery/jNotify.jquery.css" type="text/css" />
        <script type="text/javascript" src="jquery/jquery.js"></script>
        <script type="text/javascript" src="jquery/jNotify.jquery.min.js"></script>

///////////////////////////This is metod call 
<?php
$this->session->set_userdata('notify_message', 'you have been registered successfully.');
$this->session->set_userdata('notify_type', 'jSuccess');
$this->session->set_userdata('notify_type', 'jNotify');
$this->session->set_userdata('notify_type', 'jError');
?>
///////////////////////////This is metod call END 

///////////////////////////This is controller where method will run   
<script>
        <?php 
        $notify_message = $this->session->userdata('notify_message'); 
        $notify_type    = $this->session->userdata('notify_type'); 
        if($notify_message){
            $this->session->unset_userdata('notify_message');
            $this->session->unset_userdata('notify_type');
            if($notify_type == 'jNotify'){ ?>
                
      <?php
            }
    ?>
    $(document).ready(function(){
                <?php echo $notify_type; ?>('<?php echo $notify_message; ?>',
                    {
                        TimeShown : 3000,
                         MinWidth : 250,
                         VerticalPosition : 'top',
                         HorizontalPosition : 'center'
                    }
                    );	
                
                /** success **/
            });
    <?php } ?>
</script>
///////////////////////////This is controller where method will run END
    </head>
    <body>
    </body>
</html>
