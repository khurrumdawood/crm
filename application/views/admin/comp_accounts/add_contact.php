        
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
<form action="" method="post" id="add_contact-form" enctype="multipart/form-data" >
    <div class="row" id="powerwidgets">

        <!--          <div class="col-md-12 bootstrap-grid"> 
                    
                     New widget 
                    <div class="powerwidget cold-grey" id="available-validations-methods" data-widget-editbutton="false">
                      </div>
                     /End Widget  
                    
                  </div>-->

        <!-- /Inner Row Col-md-12 -->
        <div class="col-md-11 bootstrap-grid">

            <!-- New widget -->

            <div class="powerwidget " id="checkout-form-validation-widget" data-widget-editbutton="false">
                <header>
                    <strong><h2><?php echo (isset($table_text)) ? $table_text : ''; ?> </h2> </strong>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <header> Please Provide Info</header>
                        <div style="color: red">
                            <?php
                            echo validation_errors();
                            if (isset($errors)) {
                                echo $errors;
                            }
                            ?>

                        </div>
                        <fieldset>
            <div class="row">
                <section class="col col-6">
<!--                    Potential Customer:-->
                    <div class="inline-group">
                        <label class="checkbox">
                            <input type="checkbox" name="potential" id="potential" value="potential">
                            <i></i>
                            Potential Customer
                        </label>
                </section>
            </div>
                                    
                            
                            <div class="row">
                                
                                <section class="col col-6">

                                    <label class="input">
                                        <input type="text" name="area" id="area" placeholder="Area">
                                    <i></i>
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                
                                <section class="col col-6">

                                    <label class="select">
                                <?php 
                          echo salesDropdown('sales_rep','sales_rep','','', 'Sales_rep' ,' data-placeholder="Sales_rep"'); ?>
                                    <i></i>
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                
                                <section class="col col-6">

                                    <label class="select">
                                <?php 
                          echo countryDropdowns('collector','collector','','', 'Collector' ,' data-placeholder="Collector" disabled="" '); ?>
                                    <i></i>
                                    </label>
                                </section>

                            </div>
                            
                    </div>
                    </fieldset>
                    <div  class="cus_sub_btn">
                        <footer>
                            <button type="submit" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">SAVE</button>
                            <!--<button type="submit" class="btn btn-default" style="">Add</button>-->
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
