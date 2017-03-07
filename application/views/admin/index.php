<section class="grid_12">
    <div class="box">
        <div class="title"><span class="icon16_sprite i_spreadsheet"></span>Login</div>
        
        <div class="inside">
    </body>
</html>	
<form id="form_id1" class="formee" method="post" action="<?php echo base_url(); ?>admin/login/auth">
    
    <div class="in">
    
        
        <!-- ====================== -->
        
        <div class="grid-3-12"><label>Email: <em class="formee-req">*</em></label></div>
        <div class="grid-9-12">
            <input type="text" name="email" id="field3" class="validate[required,custom[email]]" />
            <span class="subtip">Example: webmaster@domain.com</span>
        </div>
        <div class="clear"></div>
        <hr />
        
        <!-- ====================== -->
        
        <div class="grid-3-12"><label>Password: <em class="formee-req">*</em></label></div>
        <div class="grid-9-12">
            <input value="" class="validate[required,custom[passwordLogin]]" type="password" name="pass" id="field24" />
            <span class="subtip">Any character</span>
        </div>
        <div class="clear"></div>
        <hr />
        
        <!-- ====================== -->								
    
    </div> <!-- End .in class -->
    
    
    <!--Form footer begin-->
    <section class="box_footer">
        <div class="grid-12-12" style="margin: 5px;">
            <input type="reset" class="right button red" value="Clear" />
            <input type="submit" class="right button green" value="Login" />
        </div>
        <div class="clear"></div>
    </section>
    <!--Form footer end-->
    
                                    
</form>