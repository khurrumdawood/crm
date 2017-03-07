<section class="grid_12">
    <div class="box">
        <div class="title">
            <span class="icon16_sprite i_spreadsheet"></span>
            Profile Edit (<a href="javascript:void(0);" onclick="history.go(-1);" style="color:white"><u>Back</u></a>)
        </div>

        <div class="inside">
            </body>
            </html>	

            <form id="form_id1" class="formee" method="post" action="">
                <div class="in">
                    <?php
                    if (is_array($profiles)) {
                        foreach ($profiles as $profile) {
                            ?>
                            <div class="grid-3-12"><label>Full Name: <em class="formee-req">*</em></label></div>
                            <div class="grid-9-12">
                                <input type="text" name="full_name" id="field1" class="validate[required]" value="<?php echo $profile->full_name; ?>" />
                                <span class="subtip">Full Name</span>
                            </div>
                            <div class="clear"></div>
                            <hr />

                            <!-- ====================== -->
                            <div class="grid-3-12"><label>Email: <em class="formee-req">*</em></label></div>
                            <div class="grid-9-12">
                                <input type="text" name="email" id="field1" class="validate[required,email]" value="<?php echo $profile->email; ?>" />
                                <span class="subtip">Email</span>
                            </div>
                            <div class="clear"></div>
                            <hr />

                            <!-- ====================== -->
                            <div class="grid-3-12"><label>Password: <em class="formee-req">*</em></label></div>
                            <div class="grid-9-12">
                                <input type="text" name="password" id="field1" class="validate[required]" value="<?php echo $profile->password; ?>" />
                                <span class="subtip">Password</span>
                            </div>
                            <div class="clear"></div>
                            <hr />

                            <!-- ====================== -->
                        <?php 
                        }
                    }
                    ?>

                </div> <!-- End .in class -->


                <!--Form footer begin-->
                <section class="box_footer">
                    <div class="grid-12-12" style="margin-bottom: 2px;">
                        <div class="clear" style="margin-top: 11px;"></div>
                        <input type="reset" class="right button red" value="Reset" />
                        <input type="submit" class="right button green" value="Update" />
                    </div>
                    <div class="clear"></div>
                </section>
                <!--Form footer end-->


            </form>