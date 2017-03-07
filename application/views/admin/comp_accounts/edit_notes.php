        
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
        <div class="col-md-12 bootstrap-grid billings">

            <!-- New widget -->

            <div class="powerwidget" id="checkout-form-validation-widget" data-widget-editbutton="false">
                <header>
                    <h2>Notes
                    </h2>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <!--<header> Please Provide Info</header>-->
                        <div style="color: red"><?php echo validation_errors(); ?> </div>

                        <div class="row">
                            <section class="col-md-9">
                                <label class="label">Notes</label>
                                <label class="textarea"> <i class="icon-prepend fa fa-clipboard"></i>
                                    <textarea placeholder="Notes" name='notes' rows="5"><?php echo $customer[0]->notes; ?></textarea>
                                    <b class="tooltip tooltip-top-left">Notes</b> </label>
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
