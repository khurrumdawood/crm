        
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
       

        <!-- /Inner Row Col-md-12 -->
        <div class="col-md-4 bootstrap-grid billings">

            <!-- New widget -->

            <div class="powerwidget" id="checkout-form-validation-widget" data-widget-editbutton="false">
                <header>
                    <h2>Invoice Options
                    </h2>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <!--<header> Please Provide Info</header>-->
                        <div style="color: red"><?php echo validation_errors(); ?> </div>
                        
                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="i_invoice_sorting" placeholder="Invoice Sorting" value="<?php echo $customer[0]->i_invoice_sorting; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="i_invoice_terms" placeholder="Invoice Terms" value="<?php echo $customer[0]->i_invoice_terms; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="i_invoice_to_customer" placeholder="Invoice To Customer" value="<?php echo $customer[0]->i_invoice_to_customer; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="i_pick_up_fee" placeholder="Pickup Fee" value="<?php echo $customer[0]->i_pick_up_fee; ?>">
                                </label>
                            </section>

                        </div>


                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="i_invoice_late_fee" placeholder="Invoice Late Fee" value="<?php echo $customer[0]->i_invoice_late_fee; ?>">
                                </label>
                            </section>

                        </div>
                        
                        <div class="row">
                            <section class="col col-11">
                                <label class="checkbox">
                                    <input type="checkbox"  placeholder="Email Invoice" name="i_email_invoice" id="i_email_invoice"
                                    <?php if ($customer[0]->i_email_invoice == 1) echo "checked"; ?>
                                           >
                                    <i></i>
                                    Email Invoice
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="checkbox">
                                    <input type="checkbox"  placeholder="Customer is on Debit Card" name="i_customer_in_on_debit_card" id="i_customer_in_on_debit_card"
                                    <?php if ($customer[0]->i_customer_in_on_debit_card == 1) echo "checked"; ?>
                                           >
                                    <i></i>
                                    Customer is on Debit Card
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="checkbox">
                                    <input type="checkbox"  placeholder="Show PCO (if available)" name="i_show_pco" id="i_show_pco"
                                    <?php if ($customer[0]->i_show_pco == 1) echo "checked"; ?>
                                           >
                                    <i></i>
                                    Show PCO (if available)
                                </label>
                            </section>
                        </div>

                        <div class="bil_sub_btn">
                            <footer>
                                <button type="submit" class="btn btn-default">SAVE</button>
                            </footer>
                        </div>

                        

                    </div>
                </div>
            </div>

        </div>
        <!-- /Inner Row Col-md-12 -->
      
        <!-- /Inner Row Col-md-6 --> 

    </div>
</form>
<!-- /Widgets Row End Grid--> 
</div>
<!-- / Content Wrapper --> 
