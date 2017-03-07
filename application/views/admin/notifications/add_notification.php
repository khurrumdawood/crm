        
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
    <h1>Home<small>Home beta</small></h1>

</div>

<!-- Widget Row Start grid -->
<form action="" method="post" id="notification-form" enctype="multipart/form-data" >
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
                    <h2>Add notification</h2>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <header> Please Provide Info</header>
                        <div style="color: red"><?php echo validation_errors(); ?> </div>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                   
                                                <label class="input"><i class="icon-prepend fa fa-navicon"></i>
                                                    <input type="text" name="title" placeholder="Title" value=""  >
                                                  </label>
                                              </section>
<!--                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="status" placeholder="Status*">
                                    </label>-->
                                <!--</section>-->
                                
                            </div>
                            
                            <div class="row">
                                <section class="col col-6">
                                    <label class="textarea">
                                        <textarea rows="5" name="desc" placeholder="Description"></textarea>
                                    </label>
                                    <div style="clear:both"></div>
                                </section>
                            </div>
<script>
    function comp_check_2(){
    var all_sel_2 = document.getElementById('all_sel_2').value;
//    alert(all_sel_2);
        if(all_sel_2){
            $('#selected').show();
        document.getElementById("selected").className = "inner-spacer displays col-md-4";            

        }

    }
    function comp_check_1(){
    var all_sel_1 = document.getElementById('all_sel_1').value;
//    alert(all_sel_1);
        if(all_sel_1){
            $('#selected').hide();
        document.getElementById("selected").className = "inner-spacer no-displays";            
        }

    }
</script>
                            <div class="row">
                                <section class="col col-6">
                                    Send this notification to:
                                <div class="inline-group">
                                    <label class="radio">
                                        <input type="radio" name="all_sel" id="all_sel_1" onclick="comp_check_1();" value="all">
                                        <i></i>
                                        All
                                    </label>
                                    <label class="radio">
                                        <input type="radio"  name="all_sel" id="all_sel_2" onclick="comp_check_2();" value="sel">
                                        <i></i>
                                        Only Selected
                                    </label>
                                    <div style="clear:both"></div>
                                    
                                </section>
                                </div>
                                    
                                    <div class="row">
                                        <div class="inner-spacer no-displays col-md-4" id="selected">

                <table class="display table table-striped table-hover" id="">
                  
                        <?php foreach ($companies as $comp){?>
                  <thead><tr><th>
                              <input type="checkbox"  name="comp_com[]" value="<?php echo $comp->id; ?>" />
                              
                      <?php echo $comp->full_name;?></th></tr></thead>
                        <?php 
$select = array('employees.*', false);
$eid=$this->session->userdata('user_id');
$sub_comp = $this->web->get_data('', 'employees', array('employees.master_id' => $eid,'employees.company_id' => $comp->id,'employees.franchise_id' => 0), $select);
foreach($sub_comp as $sub_com){ ?>
<tbody><tr><td>
<input type="checkbox"  name="comp_sub_com[]" value="<?php echo $sub_com->id; ?>" />            
    <?php 
echo $sub_com->full_name; ?></td></tr></tbody>
<?php
}
?>
                        <?php } ?>
                  
                  
                  
                </table>
              </div>
                                </div>
                            </div>
                        </fieldset>
                        <div  class="cus_sub_btn">
                            <footer>
                                <!--<button type="submit" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">SAVE</button>-->
                                <button type="submit" class="btn btn-default" style="">Add</button>
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
