        
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
                                    <input type="text" name="customer_no" placeholder="Customer #" value="<?php echo $customer[0]->customer_no; ?>">
                                </label>
                            </section>
      
                        </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="name" placeholder="Customer Name" value="<?php echo $customer[0]->name; ?>">
                                </label>
                            </section>
      
                        </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="input">
                                <i class="icon-prepend fa fa-calendar"></i>
                          <input type="text" name="submit_date" id="date" placeholder="Submit Date" value="<?php echo date('d.m.Y', strtotime($customer[0]->submit_date)); ?>">
                      </label>
                    </section>
                            <section class="col col-11">
                                <label class="input">
                                <i class="icon-prepend fa fa-calendar"></i>
                          <input type="text" name="activation_date" id="start" placeholder="Activation Date" value="<?php echo date('d.m.Y', strtotime($customer[0]->activation_date)); ?>">
                      </label>
                    </section>
                            </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="checkbox">
                                    <input type="checkbox" name="active_inactive" placeholder="Inactive"
                                           <?php if($customer[0]->active_inactive==1) echo "checked"; ?>
                                           >
                                    <i></i>
                                    Inactive ?
                                </label>
                                </section>
                        </div>

                            <div class="row">
                                <section class="col col-11">
                                    <label class="select">
                                        <?php echo previousCarrierDropdown($customer[0]->id,'previous_carrier', 'previous_carrier',$customer[0]->previous_carrier, '', 'Previous Carrier'); ?>
                                        <i></i> </label>
                                </section>

                                <section class="col col-11">
                                    <label class="select">
                                        <?php
                                        echo customerTypeDropdown('customer_group','customer_group',$customer[0]->customer_group,'chzn-select', 'Select Customer Group' ,' data-placeholder="Select Customer Group" ');
                                        ?>
                                        <i></i> </label>
                                </section>

                            </div>
                            <div class="row">

                                <section class="col col-11">

                                    <label class="input">
                                        <input type="text" name="area" id="area" placeholder="Area" value="<?php echo $customer[0]->area; ?>">
                                        <i></i>
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                <section class="col col-11">

                                    <label class="select">
<?php echo salesDropdown('industry', 'industry',$customer[0]->industry, '', 'Industry', ' data-placeholder="Industry"'); ?>
                                        <i></i>
                                    </label>
                                </section>                                
                                <section class="col col-11">

                                    <label class="select">
<?php echo salesDropdown('sales_rep', 'sales_rep',$customer[0]->create_employee_id, '', 'Sales_rep', ' data-placeholder="Sales_rep"'); ?>
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
                                    <input type="text" name="registration" placeholder="Registration #" value="<?php echo $customer[0]->registrotion; ?>">
                                </label>
                            </section>
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                    <input type="text" name="vat" placeholder="VAT #" value="<?php echo $customer[0]->vat; ?>">
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
                                    <input type="text" name="dhl_account_no" placeholder="DHL Account #" value="<?php echo $customer[0]->dhl_account_no; ?>">
                                </label>
                            </section>
                                <section class="col col-5">
                                <label class="checkbox">
                                    <input type="checkbox" name="req_new_dhl" placeholder="Request New Account" 
                                           <?php if( $customer[0]->req_new_dhl==1) echo "checked"; ?>
                                           >
                                    <i></i>
                                    Request New Account
                                </label>
                                </section>
                            </div>
                            <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                    <input type="text" name="dhl_inbound_account_no" placeholder="DHL Inbound Account #" value="<?php echo $customer[0]->dhl_inbound_account_no; ?>" >
                                </label>
                            </section>
                        </div>
                            <div class="row">
                            <section class="col col-7">
                                <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                    <input type="text" name="fedex_outbound" placeholder="Fedex Outbound Account #" value="<?php echo $customer[0]->fedex_outbound; ?>">
                                </label>
                            </section>
                                
                                <section class="col col-5">
                                <label class="checkbox">
                                    <input type="checkbox" name="req_new_fedex_outbound" placeholder="Request New Account" 
                                           <?php if($customer[0]->req_new_fedex_outbound == 1) echo "checked"; ?>
                                           >
                                    <i></i>
                                    Request New Account
                                </label>
                            </section>
                            </div>
                            <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                    <input type="text" name="fedex_inbound" placeholder="fedex_Inbound Account #" value="<?php echo $customer[0]->fedex_inbound; ?>">
                                </label>
                            </section>
                        </div>
                            <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                    <input type="text" name="ups_account" placeholder="UPS Account #" value="<?php echo $customer[0]->ups_account; ?>">
                                </label>
                            </section>
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                    <input type="text" name="associated_ups_zip" placeholder="Associated UPS Zip Code" value="<?php echo $customer[0]->associated_ups_zip; ?>">
                                </label>
                            </section>
                        </div>
                            <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                    <input type="text" name="other_ups_account" placeholder="Other UPS Account #" value="<?php echo $customer[0]->other_ups_account; ?>">
                                </label>
                            </section>
                            </div>
                            <div class="row">
                            <section class="col col-7">
                                <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                    <input type="text" name="uk_mail_account" placeholder="UK Mail Account #" value="<?php echo $customer[0]->uk_mail_account; ?>">
                                </label>
                            </section>
                                <section class="col col-5">
                                <label class="checkbox">
                                    <input type="checkbox" name="req_uk_mail_account" placeholder="Request New Account"
                                           <?php if($customer[0]->req_uk_mail_account==1) echo "checked"; ?>
                                           >
                                    <i></i>
                                    Request New Account
                                </label>
                            </section>
                        </div>
        
                            <section>
                                <label class="checkbox">
                                    <input type="checkbox" name="enable_uk_mail" placeholder="Enable UK Mail"
                                           <?php if($customer[0]->enable_uk_mail==1) echo "checked"; ?>
                                           >
                                    <i></i>
                                    Enable UK Mail
                                </label>
                            </section>
                            <section>
                                <label class="textarea">
                                    <textarea rows="5" name="rejection_note" placeholder="Rejection Note"><?php echo $customer[0]->rejection_note; ?></textarea>
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
