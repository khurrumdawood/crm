<section class="grid_12">
    <div class="box">
        <div class="title">
            <span class="icon16_sprite i_spreadsheet"></span>
             Add Company (<a href="javascript:void(0);" onclick="history.go(-1);" style="color:white"><u>Back</u></a>)
        </div>

        <div class="inside">
            </body>
            </html>	

            <form id="form_id1" class="formee" method="post" action="" enctype="multipart/form-data">
                    <div class="in">
                                        <!-- ====================== -->

                    <?php echo validation_errors(); ?>
                                        
                    <div class="grid-3-12"><label>Title: <em class="formee-req">*</em></label></div>
                    <div class="grid-9-12">
                        <input type="text" name="title" id="field2" class="validate[required]" value="" />
                        <span class="subtip">Type title</span>
                    </div>
                    <div class="clear"></div>
                    <hr />

                    <!-- ====================== -->
                    <div class="grid-3-12"><label>Logo:</label></div>
                    <div class="grid-9-12">
                        <input type="file" name="company_image" id="field15" class="" value="" />
                        <span class="subtip">upload image</span>
                    </div>
                    <div class="clear"></div>
                    <hr />


                    <!-- ====================== -->

                       <div class="grid-3-12"><label>Company Detail: </label></div>
                    <div class="grid-9-12">
                        <textarea type="text" name="description" id="field3" class="" ></textarea>
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
                        <input type="submit" class="right button green" value="Add"  />
                    </div>
                    <div class="clear"></div>
                </section>
                <!--Form footer end-->


            </form>