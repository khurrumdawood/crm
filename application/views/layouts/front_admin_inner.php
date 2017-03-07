<!DOCTYPE html>
<style>
    .powerwidget-delete-btn {
        display: none !important ;
    }
    .entypo-mail::before {
        display: none !important;
    }
    .new_message  {
        display: none !important;
    }

</style>
<?php
if (!isset($active_sub_link)) {
    $active_sub_link = '';
}

if (!isset($active_link)) {
    $active_link = '';
}
?>﻿<html>

    <head> 

        <style type="text/css">
            @import url("<?php echo base_url(); ?>orb-plugins/css/vendors/x-editable/address.css");
            @import url("<?php echo base_url(); ?>orb-plugins/css/vendors/x-editable/select2.css");
            @import url("<?php echo base_url(); ?>orb-plugins/css/vendors/x-editable/typeahead.js-bootstrap.css");
            @import url("<?php echo base_url(); ?>orb-plugins/css/vendors/x-editable/demo-bs3.css");
            @import url("<?php echo base_url(); ?>orb-plugins/css/vendors/x-editable/select2-bootstrap.css");
            @import url("<?php echo base_url(); ?>orb-plugins/css/vendors/x-editable/bootstrap-editable.css");
        </style>


        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta name="keywords" content="admin template, admin dashboard, inbox templte, calendar template, form validation">
        <meta name="author" content="DazeinCreative">
        <meta name="description" content="ORB - Powerfull and Massive Admin Dashboard Template with tonns of useful features">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ORB | Other Chart</title>

        <link href="<?php echo base_url(); ?>orb-plugins/css/styles.css" rel="stylesheet" type="text/css">

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>orb-plugins/favicon.ico" />
        <script>
<?php
if (isset($table_url)) {
    ?>
                table_url = '<?php echo $table_url; ?>';
    <?php
} else {
    echo "table_url = '';";
}
if (isset($table_url_5)) {
    ?>
                table_url_5 = '<?php echo $table_url_5; ?>';
    <?php
} else {
    echo "table_url_5 = '';";
}
?>


        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/modernizr/modernizr.custom.js"></script>
             
        
        
    </head>

    <body>



        <!--Smooth Scroll-->
        <div class="smooth-overflow" style="background: white">
            <!--Navigation-->
            <?php 
            if($this->session->userdata('customer_id')){
            ?>
            <nav class="main-header clearfix" role="navigation"> <a style="width: 238px" class="navbar-brand" href="index.html"><span class="text-blue">Partner&nbsp;Ship</span></a> 

                <!--Search-->
<!--                <div class="site-search">
                    <form action="#" id="inline-search">
                        <i class="fa fa-search"></i>
                        <input type="search" placeholder="Search">
                    </form>
                </div>-->

                <!--Navigation Itself-->

                <div class="navbar-content"> 

                    <!--Sidebar Toggler--> 
                    <!--<a href="#" class="btn btn-default left-toggler"><i class="fa fa-bars"></i></a>--> 

                    <!--Right Userbar Toggler--> 
                    <!--<a href="#" class="btn btn-user right-toggler pull-right"><i class="entypo-vcard"></i> <span class="logged-as hidden-xs">Logged as</span><span class="logged-as-name hidden-xs">Anton Durant</span></a>--> 

                    <!--Fullscreen Trigger-->
                    <button type="button" class="btn btn-default hidden-xs pull-right" id="toggle-fullscreen"> <i class=" entypo-popup"></i> </button>

                    <!--Settings Dropdown-->
<!--                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <i class="entypo-cog"></i></button>
                        <div id="settings-dropdown" class="dropdown-menu keep_open orb-form">
                            <div class="dropdown-header">Settings <span class="badge pull-right">6</span></div>
                            <div class="dropdown-container">
                                <div class="nano">
                                    <div class="nano-content">
                                        <ul class="settings-dropdown">
                                            <li>
                                                <label class="toggle">
                                                    <input type="checkbox" name="checkbox-toggle" checked>
                                                    <i></i>Prevent Midnblow</label>
                                            </li>
                                            <li>
                                                <label class="toggle">
                                                    <input type="checkbox" name="checkbox-toggle" checked>
                                                    <i></i>Sleep All nights</label>
                                            </li>
                                            <li>
                                                <label class="toggle">
                                                    <input type="checkbox" name="checkbox-toggle" checked>
                                                    <i></i>Drink more Coffee</label>
                                            </li>
                                            <li>
                                                <label class="toggle">
                                                    <input type="checkbox" name="checkbox-toggle" checked>
                                                    <i></i>Auto feed cat</label>
                                            </li>
                                            <li>
                                                <label class="toggle">
                                                    <input type="checkbox" name="checkbox-toggle" checked>
                                                    <i></i>Dummy Checkbox</label>
                                            </li>
                                            <li>
                                                <label class="toggle">
                                                    <input type="checkbox" name="checkbox-toggle" checked>
                                                    <i></i>Read More Books</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-footer"> <a class="btn btn-dark" href="#">Save</a> </div>
                        </div>
                    </div>-->

                    <!--Lock Screen--> 
                    <!--<a href="#" data-toggle="modal" class="btn btn-default hidden-xs pull-right lockme"> <i class="entypo-lock"></i> </a>--> 

                    <!--Notifications Dropdown-->

                    <div class="btn-group">
                            <?php
                            $notify_array = notification();
                            $note = $notify_array['note'] ;
                            $previous_note = $notify_array['previous_note'] ;
                            $customer_id = $notify_array['customer_id'] ;
//                                $customer_id = $this->session->userdata('customer_id');
//                                $note = $this->admin_model->get_data('', 'note', array('note.customer_id = '=>$customer_id,'note.followup_date'=>date('Y-m-d')),'');
                            ?>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="entypo-megaphone"></i>
                            <?php $coun = count($note); if ($coun>=1) { ?> 
                            <span class="new"></span>
                            <?php } else { }  ?>
                        </button>
                        <div id="notification-dropdown" class="dropdown-menu">
                        
                            <div class="dropdown-header">Notifications <span class="badge pull-right"><?php $coun = count($note); if ($coun>=1) {echo $coun;} else { }  ?></span></div>
                            <div class="dropdown-container">
                                <div class="nano">
                                    <div class="nano-content">
                                        <ul class="notification-dropdown">
<!--                                            <li class="bg-warning"><a href="#"> <span class="notification-icon"><i class="fa fa-bolt"></i></span>
                                                    <h4>Server Down</h4>
                                                    <p>Server #435 was shut down (Power loss)</p>
                                                    <span class="label label-default"><i class="entypo-clock"></i> 59 mins ago</span> </a> </li>-->
                                            <?php 
//                                            $where='';
//                                          
//                                            print_r($note);
                                            
                                            foreach ($note as $notification){
                                            ?>
                                            <li class="bg-warning"><a href="#"> <span class="notification-icon"><i class="fa fa-bolt"></i></span>
                                                    <h4>Notification</h4>
                                                    <p><?php echo $notification->note ?></p>
                                                    <span class="label label-default"><i class="entypo-clock"></i> 2 hours ago</span> </a> </li>
                                            <?php }
//                                            $customer_id = $this->session->userdata('customer_id');
//                                            $previous_note = $this->admin_model->get_data('', 'note', array('note.customer_id = '=>$customer_id,'note.followup_date <='=>date('Y-m-d')),'');
                                            foreach ($previous_note as $pre_notification){
                                            ?>
                                            <li class="bg-info"><a href="#"> <span class="notification-icon"><i class="fa fa-bolt"></i></span>
                                                    <h4>Notification</h4>
                                                    <p><?php echo $pre_notification->note;
//                                                    echo 303030;
                                                    ?></p>
                                                    <span class="label label-default"><i class="entypo-clock"></i> 2 hours ago</span> </a> </li>
                                                    <?php } ?>
<!--                                         <li class="bg-success"><a href="#"> <span class="notification-icon"><i class="fa fa-bolt"></i></span>
                                                    <h4>Defragmentation Completed</h4>
                                                    <p>Disc Defragmentation Completed on Server</p>
                                                    <span class="label label-default"><i class="entypo-clock"></i> 3 hours ago</span> </a> </li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-footer"><a class="btn btn-dark" href="#">See All</a></div>
                        </div>
                    </div>

                    <!--Inbox Dropdown-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="entypo-mail"></i><span class="new new_message"></span></button>
                        <div id="inbox-dropdown" class="dropdown-menu inbox">
                            <div class="dropdown-header">Inbox <span class="badge pull-right">32</span></div>
                            <div class="dropdown-container">
                                <div class="nano">
                                    <div class="nano-content">
                                        <ul class="inbox-dropdown">
                                            <li><a href="#"> <span class="user-image"><img src="http://placehold.it/150x150" alt="Gluck Dorris" /></span>
                                                    <h4>Why don't u answer calls?</h4>
                                                    <p>Listen, dude, time is off. I'll find you soon! Sounds good?...</p>
                                                    <span class="label label-default"><i class="entypo-clock"></i> 59 mins ago</span> <span class="delete"><i class="entypo-back"></i></span> </a> </li>
                                            <li><a href="#"> <span class="user-image"><img src="http://placehold.it/150x150" alt="Gluck Dorris" /></span>
                                                    <h4>Rawrr, rawrrr...</h4>
                                                    <p>Listen, dude, time is off. I'll find you soon! Sounds good?...</p>
                                                    <span class="label label-default"><i class="entypo-clock"></i> 2 hours ago</span> <span class="delete"><i class="entypo-back"></i></span> </a> </li>
                                            <li><a href="#"> <span class="user-image"><img src="http://placehold.it/150x150" alt="Gluck Dorris" /></span>
                                                    <h4>Why so serious?</h4>
                                                    <p>Listen, dude, time is off. I'll find you soon! Sounds good?...</p>
                                                    <span class="label label-default"><i class="entypo-clock"></i> 3 hours ago</span> <span class="delete"><i class="entypo-back"></i></span> </a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-footer"><a class="btn btn-dark" href="admin-inbox.html">Save All</a></div>
                        </div>
                    </div>
                </div>
            </nav>
            <?php } ?>
            <!--/Navigation--> 
            <!--MainWrapper-->
            <div class="main-wrap"> 

                <!--OffCanvas Menu -->
                <aside class="user-menu"> 

                    <!-- Tabs -->
                    <div class="tabs-offcanvas">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#userbar-one" data-toggle="tab">Main</a></li>
                            <li><a href="#userbar-two" data-toggle="tab">Users</a></li>
                            <li><a href="#userbar-three" data-toggle="tab">ToDo</a></li>
                        </ul>
                        <div class="tab-content"> 

                            <!--User Primary Panel-->
                            <div class="tab-pane active" id="userbar-one">
                                <div class="main-info">
                                    <div class="user-img"><img src="http://placehold.it/150x150" alt="User Picture" /></div>
                                    <h1><?php echo $this->session->userdata('adminName'); ?> <small>Administrator</small></h1>
                                </div>
                                <div class="list-group">
                                    <a href="<?php echo base_url(); ?>index.php/admin/profile/update/" class="list-group-item"><i class="fa fa-user"></i>Profile</a>
                                    <a href="#" class="list-group-item"><i class="fa fa-cog"></i>Settings</a> 
                                    <a href="#" class="list-group-item"><i class="fa fa-flask"></i>Projects<span class="badge">2</span></a>
                                    <div class="empthy"></div>
                                    <a href="#" class="list-group-item"><i class="fa fa-refresh"></i>Updates<span class="badge">5</span></a> <a href="#" class="list-group-item"><i class="fa fa-comment"></i>Messages<span class="badge">12</span></a> <a href="#" class="list-group-item"><i class="fa fa-comments"></i> Comments<span class="badge">45</span></a>
                                    <div class="empthy"></div>
                                    <a href="#" data-toggle="modal" class="list-group-item lockme"><i class="fa fa-lock"></i> Lock</a>
                                    <a data-toggle="modal" href="<?php echo base_url(); ?>index.php/front/logout" class="list-group-item goaway"><i class="fa fa-power-off"></i> Sign Out</a>
                                </div>
                            </div>

                            <!--User Chat Panel-->
                            <div class="tab-pane" id="userbar-two">
                                <div class="chat-users-menu"> 
                                    <!--Adding Some Scroll-->
                                    <div class="nano">
                                        <div class="nano-content">
                                            <div class="buttons">
                                                <div class="btn-group btn-group-xs">
                                                    <button type="button" class="btn btn-default">Friends</button>
                                                    <button type="button" class="btn btn-default">Work</button>
                                                    <button type="button" class="btn btn-default">Girls</button>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><a href="#"><span class="chat-name">Gluck Dorris</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span><span class="badge">5</span></a></li>
                                                <li><a href="#"><span class="chat-name">Anton Durant</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Spiderman</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Muchu</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-default">Offline</span></a></li>
                                                <li><a href="#"><span class="chat-name">Mr. Joker</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Chewbacca</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">The Piggy</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Anton Durant</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Spiderman</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Muchu</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Anton Durant</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Spiderman</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Muchu</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Anton Durant</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Spiderman</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Muchu</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Anton Durant</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-default">Offline</span></a></li>
                                                <li><a href="#"><span class="chat-name">Spiderman</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                                <li><a href="#"><span class="chat-name">Muchu</span><span class="user-img"><img src="http://placehold.it/150x150" alt="User"/></span><span class="label label-success">Online</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--User Tasks Panel-->
                            <div class="tab-pane" id="userbar-three">
                                <div class="nano"> 
                                    <!--Adding Some Scroll-->
                                    <div class="nano-content">
                                        <div class="small-todos">
                                            <div class="input-group input-group-sm">
                                                <input id="new-todo" placeholder="Add ToDo" type="text" class="form-control">
                                                <span class="input-group-btn">
                                                    <button id="add-todo" class="btn btn-default" type="button"><i class="fa fa-plus-circle"></i></button>
                                                </span> </div>
                                            <section id="task-list">
                                                <ul id="todo-list">
                                                </ul>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /tabs --> 

                </aside>
                <!-- /Offcanvas user menu--> 

                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main_menu.css" />
                <?php $user_type = $this->session->userdata('user_type');
                ?>

                <section id="main_menu">
                    <?php // $this->load->view('front'); ?>
                </section><!--
End of #main_menu -->
                <!--Main Menu-->
                <div class="responsive-admin-menu <?php echo (isset($no_left))? 'sidebar-toggle':''; ?>">
                    <div class="responsive-menu" style="margin: -36px">Partner&nbsp;Ship
                        <div class="menuicon"><i class="fa fa-angle-down"></i></div>
                    </div>


                    <?php //$this->load->view('submenu/' . $user_type . '_' . $active_link); ?>
<ul id="menu"> 

    <li>
        <a class="" href="" title="">
            <i class="entypo-briefcase"></i><span></span>
        </a>
    </li>


</ul>
                </div>
                
                <?php if($this->session->userdata('customer_id')){ ?>
                <section id="main_menu">
                    <?php $this->load->view('menu/front_menu'); ?>
                </section><!-- End of #main_menu -->
                <?php } ?>
                <div class="content-wrapper <?php echo (isset($no_left))? 'main-content-toggle-left':''; ?>"> 
                    
                <!--Content Wrapper--><!--Horisontal Dropdown-->
                <div style="display:none">
                    <?php $this->load->view('base/menu-wrapper'); ?>
                    <!--/MainMenu--> 
                </div>
                
<link rel="stylesheet" href="<?php echo base_url() ?>plugins/jnotify/jNotify.jquery.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url() ?>plugins/jnotify/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>plugins/jnotify/jNotify.jquery.min.js"></script>
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
                
                
                

                    {yield}
                </div>
                    <?php $this->load->view('base/footer');
                    ?>
                    
                    
                    
                    
                    
                    <!--Modals-->

                    <!--Power Widgets Modal-->
                    <div class="modal" id="delete-widget">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <i class="fa fa-lock"></i> </div>
                                <div class="modal-body text-center">
                                    <p>Are you sure to delete this widget?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" id="trigger-deletewidget-reset">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="trigger-deletewidget">Delete</button>
                                </div>
                            </div>
                            <!-- /.modal-content --> 
                        </div>
                        <!-- /.modal-dialog --> 
                    </div>
                    <!-- /.modal --> 

                    <!--Sign Out Dialog Modal-->
                    <div class="modal" id="signout">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <i class="fa fa-lock"></i> </div>
                                <div class="modal-body text-center">Are You Sure Want To Sign Out?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" id="yesigo">Ok</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content --> 
                        </div>
                        <!-- /.modal-dialog --> 
                    </div>
                    <!-- /.modal --> 

                    <!--Lock Screen Dialog Modal-->
                    <div class="modal" id="lockscreen">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <i class="fa fa-lock"></i> </div>
                                <div class="modal-body text-center">Are You Sure Want To Lock Screen?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" id="yesilock">Ok</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content --> 
                        </div>
                        <!-- /.modal-dialog --> 
                    </div>
                    <!-- /.modal --> 

                    <!--Scripts--> 
                    <!--JQuery--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/jquery/jquery.min.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/jquery/jquery-ui.min.js"></script> 

                    <!--EasyPieChart  Add sep --> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/easing/jquery.easing.1.3.min.js">
                    </script><script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/easypie/jquery.easypiechart.min.js"></script> 


                    <!--Fullscreen--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/fullscreen/screenfull.min.js"></script> 

                    <!--Forms--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/forms/jquery.form.min.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/forms/jquery.validate.min.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/forms/jquery.maskedinput.min.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/jquery-steps/jquery.steps.min.js"></script> 

                    <!--NanoScroller--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/nanoscroller/jquery.nanoscroller.min.js"></script> 

                    <!--Sparkline--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/sparkline/jquery.sparkline.min.js"></script> 

                    <!--Horizontal Dropdown--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/horisontal/cbpHorizontalSlideOutMenu.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/classie/classie.js"></script> 


                    <!--Datatables  Add sep --> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/datatables/jquery.dataTables.min.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/datatables/jquery.dataTables-bootstrap.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/datatables/dataTables.colVis.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/datatables/colvis.extras.js"></script> 


                    <!--PowerWidgets--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/powerwidgets/powerwidgets.min.js"></script> 

                    <!--Chart.js Add sep --> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/chartjs/chart.min.js"></script> 


                    <!--Bootstrap--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/bootstrap/bootstrap.min.js"></script> 

                    <!--Chat--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/todos/todos.js"></script> 


                    <!--Main App--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/scripts.js"></script>





                    <!--X-Editable--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/x-editable/bootstrap-editable.min.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/x-editable/demo.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/x-editable/demo-mock.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/x-editable/select2.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/x-editable/address.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/x-editable/jquery.mockjax.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/x-editable/moment.min.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/x-editable/select2-bootstrap.css"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/x-editable/typeahead.js"></script> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/x-editable/typeaheadjs.js"></script> 

                    <!--iOnRangeSlider--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/ionrangeslider/ion.rangeSlider.min.js"></script> 

                    <!--Todo--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/todos/todos.js"></script> 

                    <!--Knob--> 
                    <script type="text/javascript" src="<?php echo base_url(); ?>orb-plugins/js/vendors/knob/jquery.knob.js"></script> 

                    <!--/Scripts-->
<script>
        $(document).ready(function () {

                $('body').click(function (event)
                {
                    if ($(event.target).is('.status_activate')) {
//                        loader_open();
                        chk = event.target;
                        att_url = $(chk).attr('att_url');
                        att_id = $(chk).attr('att_id');
                        //                alert(att_val);
                        $.ajax({
                            type: 'POST',
                            data: {'id': att_id},
                            url:  '<?php echo base_url(); ?>admin/' + att_url + "/ChangeStatus",
                            dataType: 'text',
                            success: function (data)
                            {
                                $(chk).attr('att_val', data);
                                if (data == '0')
                                    $(chk).html('ReActivate');
                                else
                                    $(chk).html('Active');

//                                loader_close();
                            },
                            error: function (xhr, textStatus, errorThrown) {
//                                loader_close();
                            }
                        });
                    }


                });
            });
        </script>   

    </body>
                    </html>

