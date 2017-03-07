<section class="grid_12">
    <div class="box">
        <div class="title">
            <span class="icon16_sprite i_spreadsheet"></span>
             Update Company (<a href="javascript:void(0);" onclick="history.go(-1);" style="color:white"><u>Back</u></a>)
        </div>

        <div class="inside">
            </body>
            </html>	

            <form id="form_id1" class="formee" method="post" action="" enctype="multipart/form-data">
                    <div class="in">
                                        <!-- ====================== -->
     
                        <?php 
                        if(isset($companies)){
                            foreach ($companies as $companies){
                                ?>
   
                                        
                    <?php echo validation_errors(); ?>
                                        
                    <div class="grid-3-12"><label>Title: <em class="formee-req">*</em></label></div>
                    <div class="grid-9-12">
                        <input type="text" name="title" id="field2" class="validate[required]" value="<?php echo $companies->title ?>" />
                        <span class="subtip">Type title</span>
                    </div>
                    <div class="clear"></div>
                    <hr />

                    <!-- ====================== -->
                     <div class="grid-3-12"><label>Logo:</label></div>
                    <div class="grid-9-12">
                                                        <?php
                            if ($companies->company_image) {
                                $company_image = base_url() . 'uploads/company/u_' . $companies->company_image;
                                ?>
                                <img src="<?php echo $company_image; ?>" />
<?php                             } else {
                                $company_image = '';
                            } ?>

                        <input type="file" name="company_image" id="field10" class="" value="<?php echo $companies->company_image; ?>" />
                        <span class="subtip">upload image</span>
                    </div>
                    <div class="clear"></div>
                    <hr />


                    <!-- ====================== -->


                       <div class="grid-3-12"><label>Company Detail: </label></div>
                    <div class="grid-9-12">
                        <textarea type="text" name="description" id="field3" class="" ><?php echo $companies->description ?></textarea>
                        <span class="subtip">Give short description.</span>
                    </div>
                    <div class="clear"></div>
                    <hr />


                    <!-- ====================== -->
                    
                    
                </div> <!-- End .in class -->


                <!--Form footer begin-->
                <section class="box_footer">
                    <div class="grid-12-12" style="margin-bottom: 2px;">
                        <div class="clear" style="margin-top: 11px;"></div>
                        <input type="reset" class="right button red" value="Reset" />
                        <input type="submit" class="right button green" value="Update"  />
                    </div>
                    <div class="clear"></div>
                </section>
                <!--Form footer end-->
                        <?php } 
                        
                            } ?>

            </form>