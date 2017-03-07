        
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
<form action="" method="post" id="zones-form" enctype="multipart/form-data" >
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
                        <div style="color: red"><?php echo validation_errors(); ?> </div>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">

                                    <label class="select">
                                        <?php echo zoneListDropdown('zone','zone',$zones[0]->zone); ?><i></i>
                                        <!--<input type="text" name="zone" placeholder="Zone" value="<?php echo $zones[0]->zone; ?>"  >-->
                                    </label>
                                </section>
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-navicon"></i>
                                        <input type="text" name="weight" placeholder="weight in Kg" value="<?php echo $zones[0]->weight; ?>"  >
                                    </label>
                                </section>



                            </div>

                            <div class="row">
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-dollar"></i>
                                        <input type="text" name="price" placeholder="price" value="<?php echo $zones[0]->price; ?>"  >
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="textarea">
                                        <textarea rows="5" name="desc" placeholder="Description"><?php echo $zones[0]->description; ?></textarea>
                                    </label>
                                    <div style="clear:both"></div>
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
