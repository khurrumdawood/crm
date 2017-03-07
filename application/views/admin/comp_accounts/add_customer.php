        
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
<form action="" method="post" id="add_customer-form" enctype="multipart/form-data" >
    <div class="row" id="powerwidgets">

        <div class="col-md-12 bootstrap-grid"> 

            <!-- New widget -->
            <div class="powerwidget cold-grey" id="available-validations-methods" data-widget-editbutton="false">
            </div>
            <!-- /End Widget --> 

        </div>

        <!-- /Inner Row Col-md-12 -->
        <div class="col-md-6 bootstrap-grid">

            <!-- New widget -->

            <div class="powerwidget" id="checkout-form-validation-widget" data-widget-editbutton="false">
                <header>
                    <h2>Account Setup
                    </h2>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <!--<header> Please Provide Info</header>-->
                        <div style="color: red"><?php echo validation_errors(); ?> </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="customer_no" placeholder="Customer #">
                                </label>
                            </section>
      
                        </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="name" placeholder="Customer Name">
                                </label>
                            </section>
      
                        </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="email" placeholder="Customer Email">
                                </label>
                            </section>
      
                        </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="input">
                                <i class="icon-prepend fa fa-calendar"></i>
                          <input type="text" name="submit_date" id="date" placeholder="Submit Date">
                      </label>
                    </section>
                            <section class="col col-11">
                                <label class="input">
                                <i class="icon-prepend fa fa-calendar"></i>
                          <input type="text" name="activation_date" id="start" placeholder="Activation Date">
                      </label>
                    </section>
                            </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="checkbox">
                                    <input type="checkbox" name="active_inactive" placeholder="Inactive">
                                    <i></i>
                                    Inactive ?
                                </label>
                                </section>
                        </div>

                            <div class="row">
<!--                                <section class="col col-11">
                                    <label class="select">
                                        <?php echo previousCarrierDropdown('','previous_carrier', 'previous_carrier', '', 'Previous Carrier'); ?>
                                        <i></i> </label>
                                </section>-->

                                <section class="col col-11">
                                    <label class="select">
                                        <?php
                                        echo customerTypeDropdown('customer_group','customer_group','','chzn-select', 'Select Customer Group' ,' data-placeholder="Select Customer Group" ');
                                        ?>
                                        <i></i> </label>
                                </section>

                            </div>
                            <div class="row">

                                <section class="col col-11">

                                    <label class="input">
                                        <input type="text" name="area" id="area" placeholder="Area">
                                        <i></i>
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                <section class="col col-11">

                                    <label class="select">
<?php echo salesDropdown('industry', 'industry', '', '', 'Industry', ' data-placeholder="Industry"'); ?>
                                        <i></i>
                                    </label>
                                </section>                                
                                <section class="col col-11">

                                    <label class="select">
<?php echo salesDropdown('sales_rep', 'sales_rep', '', '', 'Sales_rep', ' data-placeholder="Sales_rep"'); ?>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                            <section class="col col-6">
                                <label class="select">
<?php echo countryDropdowns('collector', 'collector', '', '', 'Collector', ' data-placeholder="Collector" disabled="" '); ?>
                                    <i></i>
                                </label>
                            </section>
                            </div>
                            <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                    <input type="text" name="registration" placeholder="Registration #">
                                </label>
                            </section>
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                    <input type="text" name="vat" placeholder="VAT #">
                                </label>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End Widget --> 

            <!-- New widget -->


            <!-- /End Widget --> 
        </div>
        <div class="col-md-6 bootstrap-grid"> 

            <!-- New widget -->

            <div class="powerwidget " id="registration-form-validation-widget" data-widget-editbutton="false">
                <header>
                    <h2>Carrier Setup
                    </h2>
                </header>
                <div class="inner-spacer">
                    <div id="registration-form" class="orb-form">
                        <!--<header> Billing Detail</header>-->

                            <div class="row">
                            <section class="col col-7">
                                <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                    <input type="text" name="dhl_account_no" placeholder="DHL Account #">
                                </label>
                            </section>
                                <section class="col col-5">
                                <label class="checkbox">
                                    <input type="checkbox" name="req_new_dhl" placeholder="Request New Account">
                                    <i></i>
                                    Request New Account
                                </label>
                                </section>
                            </div>
                            <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                    <input type="text" name="dhl_inbound_account_no" placeholder="DHL Inbound Account #">
                                </label>
                            </section>
                        </div>
                            <div class="row">
                            <section class="col col-7">
                                <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                    <input type="text" name="fedex_outbound" placeholder="Fedex Outbound Account #">
                                </label>
                            </section>
                                
                                <section class="col col-5">
                                <label class="checkbox">
                                    <input type="checkbox" name="req_new_fedex_outbound" placeholder="Request New Account">
                                    <i></i>
                                    Request New Account
                                </label>
                            </section>
                            </div>
                            <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                    <input type="text" name="fedex_inbound" placeholder="fedex_Inbound Account #">
                                </label>
                            </section>
                        </div>
                            <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                    <input type="text" name="ups_account" placeholder="UPS Account #">
                                </label>
                            </section>
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                    <input type="text" name="associated_ups_zip" placeholder="Associated UPS Zip Code">
                                </label>
                            </section>
                        </div>
                            <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                    <input type="text" name="other_ups_account" placeholder="Other UPS Account #">
                                </label>
                            </section>
                            </div>
                            <div class="row">
                            <section class="col col-7">
                                <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                    <input type="text" name="uk_mail_account" placeholder="UK Mail Account #">
                                </label>
                            </section>
                                <section class="col col-5">
                                <label class="checkbox">
                                    <input type="checkbox" name="req_uk_mail_account" placeholder="Request New Account">
                                    <i></i>
                                    Request New Account
                                </label>
                            </section>
                        </div>
        
                            <section>
                                <label class="checkbox">
                                    <input type="checkbox" name="enable_uk_mail" placeholder="Enable UK Mail">
                                    <i></i>
                                    Enable UK Mail
                                </label>
                            </section>
                            <section>
                                <label class="textarea">
                                    <textarea rows="5" name="rejection_note" placeholder="Rejection Note"></textarea>
                                </label>
                            </section>

                        

                        <div class="bil_sub_btn">
                            <footer>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End Widget --> 

            <!-- New widget -->


            <!-- /End Widget --> 

        </div>
        <!-- /Inner Row Col-md-6 --> 
    </div>
</form>
<!-- /Widgets Row End Grid--> 
</div>
<!-- / Content Wrapper --> 
