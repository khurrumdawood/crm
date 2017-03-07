        
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

    <h1>            </h1>
</div>

<!-- Widget Row Start grid -->
<form action="" method="post" id="note-form" enctype="multipart/form-data" >
    <div class="row" id="powerwidgets">

        <div class="col-md-11 bootstrap-grid">

            <!-- New widget -->

            <div class="powerwidget " id="checkout-form-validation-widget" data-widget-editbutton="false">
                <header>
                    <strong><h2> </h2> </strong>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <header> Please Provide Info</header>
                        <div style="color: red"> </div>
                        <fieldset>

                                                    <div class="row">
                                <section class="col col-6">

                                    <!--<label class="input"><i class="icon-prepend fa fa-navicon"></i>-->
                                    <label class="select">
                                        
                                        <?php echo customerDropdownNote('customer_id','customer_id','','','Customer',''); ?>
<!--                                        <input type="text" name="customer_id" placeholder="Customer #" value=""  >-->
                                    <i></i>
                                    </label>
                                </section>
                                
                            </div>
                                                    <div class="row">
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-calendar"></i>
                                        <input type="text" name="followup_date" id="" placeholder="Follow UP Date" value=""  >
                                    </label>
                                </section>
                                
                            </div>
                                                    
                                                    <div class="row">
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-navicon"></i>
                                        <input type="text" name="note" placeholder="Note" value=""  >
                                    </label>
                                </section>
                                
                            </div>
                                                    

                    </div>
                    </fieldset>
                    <div  class="cus_sub_btn">
                        <footer>
                            <!--<button type="submit" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">SAVE</button>-->
                            <button type="submit" class="btn btn-default" style="">Save</button>
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