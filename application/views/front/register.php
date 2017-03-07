        
<div class="page-header">
    <style>
        h4 :after{
            content: "|";

        }
        .no-displays {
            display: none;   
        }
        .displays {
            display: block;   
        }
    </style>

    <h1><?php echo (isset($page_text)) ? $page_text : ''; ?>
        <?php if (isset($back_button)) { ?>
            <a style="float: right;" href="<?php echo $back_button['url']; ?>" <?php echo isset($back_button['onclick']) ? 'onclick="' . $back_button['onclick'] . '"' : ''; ?> style="margin-bottom: 10px;" class="btn btn-default"><?php echo $back_button['btn_title']; ?></a>
        <?php } ?>
    </h1>
</div>

<!-- Widget Row Start grid -->
<!--<form action="" method="post" id="add_customer-form" enctype="multipart/form-data" >-->
    <div class="row" id="powerwidgets">

        <div class="col-md-12 bootstrap-grid"> 

            <!-- New widget -->
            <div class="powerwidget cold-grey" id="available-validations-methods" data-widget-editbutton="false">
            </div>
            <!-- /End Widget --> 

        </div>

       

        <!-- /Inner Row Col-md-12 -->
        <div class="col-md-12 bootstrap-grid billings">


            <div class="powerwidget" id="checkout-form-validation-widget" data-widget-editbutton="false" style=" width: 40%; margin: 0px auto;">
                <header>
                    <h2>Register
                    </h2>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <header> Please Provide Info</header>
                        <div style="color: red"><?php echo validation_errors(); ?> </div>
                        <form action="<?php echo base_url(); ?>front/register/" id="register-form" class="orb-form" method="post">
                            <fieldset>
                                <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="username" placeholder="User Name" value="">
                                </label>
                            </section>

                        </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="email_1" placeholder="Email" value="">
                                </label>
                            </section>

                        </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="pass" placeholder="Password" value="">
                                </label>
                            </section>

                        </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="address" placeholder="Address" value="">
                                </label>
                            </section>

                        </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="select"> 
                                    <?php echo countryDropdown('coun', 'coun','',''); ?>
                                    <i></i>
                                </label>
                            </section>

                        </div>
                            </fieldset> 
        <footer>
            <button type="submit" class="btn btn-default">Register</button>
            <a href="<?php echo base_url(); ?>" class="btn btn-default">Cancel</a>

        </footer>
</form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Inner Row Col-md-12 -->
        
    </div>
<!--</form>-->
<!-- /Widgets Row End Grid--> 
</div>
<!-- / Content Wrapper --> 
