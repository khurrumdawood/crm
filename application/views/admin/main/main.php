<section class="grid_12">
    <div class="box">
        <div class="title"><span class="icon16_sprite i_spreadsheet"></span>Profile</div>
        
        <div class="inside">
    </body>
</html>	
<?php 
//print_r($query);exit;
 $row = $query->row();  
?>
<form id="form_id1" class="formee" method="post" action="">
    
    <div class="in">
        <div class="grid-3-12"><label>Name: <em class="formee-req">*</em></label></div>
        <div class="grid-9-12">
            <input type="text" name="name" id="field1" class="validate[required]" value="<?php echo $row->username; ?>" />
            <span class="subtip">Type Name</span>
        </div>
        <div class="clear"></div>
        <hr />

        <!-- ====================== -->
        
        <div class="grid-3-12"><label>Email: <em class="formee-req">*</em></label></div>
        <div class="grid-9-12">
            <input type="text" name="email" id="field3" class="validate[required,custom[email]]" value="<?php echo $row->email; ?>" />
            <span class="subtip">Example: webmaster@domain.com</span>
        </div>
        <div class="clear"></div>
        <hr />
                
		<!-- ====================== -->
																			
        <div class="grid-3-12"><label>Password: <em class="formee-req">*</em></label></div>
        <div class="grid-9-12">
            <input value="<?php echo $row->password; ?>" class="validate[required]" type="password" name="pass" id="field25" />
            <span class="subtip">Any character</span>
        </div>
        <div class="clear"></div>
        <hr />
        
        <!-- ====================== -->
                                                
        <div class="grid-3-12"><label>Password (confirm): <em class="formee-req">*</em></label></div>
        <div class="grid-9-12">
            <input value="<?php echo $row->password; ?>" class="validate[required,equals[field25]]" type="password" name="field26" id="field26" />
            <span class="subtip">Any character</span>
        </div>
        <div class="clear"></div>        
        <!-- ====================== -->								
    
    </div> <!-- End .in class -->
    
    
    <!--Form footer begin-->
    <section class="box_footer">
        <div class="grid-12-12" style="margin-bottom: 2px;">
	        <div class="clear" style="margin-top: 11px;"></div>
            <input type="reset" class="right button red" value="Clear" />
            <input type="button" class="right button green" value="Update" />
        </div>
        <div class="clear"></div>
    </section>
    <!--Form footer end-->
    
                                    
</form>