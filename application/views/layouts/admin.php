<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <title>CRM - Admin </title>
                <?php $this->load->view('base/header'); ?>
                </head>
                <body>
                    <section id="layout">
                        <div class="logo_profile container_12">
                            <div class="grid_6 logo_img">
<!--                                <img src="<?php echo base_url(); ?>images/logo.png" alt="Logo" />-->
                            </div>
                            <?php
                            if ($this->session->userdata('user_id')) {
                                ?>
                                <div class="grid_6 profile_meta">
                                    <div class="user_meta">

                                        <div class="name">
                                            Welcome Admin <br />
                                            <a href="<?php echo base_url(); ?>index.php/admin/edit_profile" class="submeta">Profile</a>
                                            <a href="<?php echo base_url(); ?>index.php/admin/logout" class="submeta">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="clear"></div>
                        </div>
                        <?php
                        if ($this->session->userdata('user_id')) {
                            ?>

<?php } ?>
                        <section id="container" class="container_12">
{yield}

    <?php	$this->load->view('base/footer');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryui_init.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bottom_scripts.js"></script>
	</body>
</html>
		
