        
<div class="page-header">
    <style>
        h4 :after{
            content: "|";

        }
    </style>
    <h1>Home<small>Home beta</small></h1>

</div>

<!-- Widget Row Start grid -->
<form action="" method="post" id="leads-form" enctype="multipart/form-data" >
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
                    <h2>Edit A Lead

                    </h2>
                </header>
                <div class="inner-spacer">
                    <table class="display table table-striped table-hover" id="">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Lead Status</th>
                      <th>Assigned Sales Rep</th>
                    </tr>
                  </thead>
                  <tbody>
                         
                      <?php
                      foreach($lead as $leads){ ?>
                    <tr>
                      <td><?php echo $leads->name; ?></td>
                      <td><?php echo $leads->lead_contact; ?></td>
                      <td>
                    <div class="<?php if($leads->lead_status=='completed'){echo 'label label-success';} else {echo 'label label-default';} ?>">
                     <?php echo $leads->lead_status; ?></div>
                      </td>
                    <td><?php echo $leads->firstname; ?>  <?php echo $leads->lastname; ?></td>
                    </tr>

                      <?php } ?>
                        
                  </tbody>
                </table>
                    <div action="" id="checkout-form" class="orb-form">
                        <header> Edit Info</header>
                        <div style="color: red"><?php echo validation_errors(); ?> </div>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                                                        <label class="select"> 
                                        <select name="lead_status">
                                        <option value="" >Lead Status</option>
                                        <option <?php if ($lead[0]->lead_status == 'pending') echo 'selected="selected"' ?> value="pending">Pending</option>
                                        <option <?php if ($lead[0]->lead_status == 'completed') echo 'selected="selected"' ?> value="completed">Completed</option>
                                        </select><i></i>
                                    </label>

                                   
<!--                                                <label class="input"><i class="icon-prepend fa fa-user"></i>
                                                    <input type="text" name="name" placeholder="Name" value="<?php echo $customer[0]->name; ?>" readonly="" >
                                                  </label>-->
                                              </section>

                                <section class="col col-4">
                                    <label class="select"> 
                                    <select name="customer_type">
                                        <option value="" >Customer Type</option>
                                        <option <?php if ($lead[0]->customer_type == 'platinum') echo 'selected="selected"' ?> value="platinum">Platinum</option>
                                        <option <?php if ($lead[0]->customer_type == 'bronze') echo 'selected="selected"' ?> value="bronze">Bronze</option>
                                        <option <?php if ($lead[0]->customer_type == 'gold') echo 'selected="selected"' ?> value="gold">Gold</option>
                                        </select>
                                    <i></i></label>
                                </section>
                            </div>
                            <div class="row">
<!--                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="dated" placeholder="Date">
                                    </label>
                                </section>-->
                                
                                
<!--<div class="powerwidget dark-blue" id="date-range" data-widget-editbutton="false">-->
              
<!--              <div class="inner-spacer">-->
<!--                <form action="" id="data-pickers" class="orb-form">-->
                  <!--<fieldset>-->
<!--                    <section class="col col-6">
                      <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                        <input type="text" name="phone" readonly="" placeholder="Phone" value="<?php echo $lead[0]->contact; ?>">
                        </label>
                    </section>-->
                  <!--</fieldset>-->
                <!--</form>-->
              <!--</div>-->
<!--            </div>-->

<!--                                <section class="col col-6">
                                    <label class="select"> 
                                        <i class="icon-append fa fa-times"></i>
                                <?php 
//                                echo timeValue($name = 'time', $id = 'time', $class='', $check = '','Time') ?>
                                    <i></i> 
                                    </label>
                                    
                                </section>-->
                  
                            </div>
                            <div class="row">
<!--                                <section class="col col-6">
                                        <label class="select"> 
                                <?php 
//                    echo sales_repDropdown($name='sales_rep',$id='sales_rep',$lead[0]->employee_id,$class ='', 'Sales Rep' ,$extra='')
                                        ?>
                                    <i></i> 
                                    </label>

                                    
                                </section>-->
<!--                                <section class="col col-6">
                                    <label class="select">
                                                    <select name="appointment_type">
                                                    <option value="0" selected disabled>Appointment Type</option>
                                                    <option value="Call">Call</option>
                                                    <option value="Meeting">Meeting</option>
                                                  </select>
                                                  <i></i> </label>
                                </section>-->
                            </div>
                        
                            <div class="row">
<!--                                <section class="col col-6">
                                    <label class="select"> 
                                        <select name="lead_status">
                                        <option value="" >Lead Status</option>
                                        <option <?php if ($lead[0]->status == 'open') echo 'selected="selected"' ?> value="open">Open</option>
                                        <option <?php if ($lead[0]->status == 'pending') echo 'selected="selected"' ?> value="pending">Pending</option>
                                        <option <?php if ($lead[0]->status == 'completed') echo 'selected="selected"' ?> value="completed">Completed</option>
                                        </select><i></i>
                                    </label>
                                </section>-->
                            </div>
                            
                            <div class="row">
                                <section>
                                    <label class="textarea col col-7">
                                        <textarea rows="5" name="comments" placeholder="Comments"><?php echo $lead[0]->coments; ?></textarea>
                                    </label>
                                    <div style="clear:both"></div>
                                </section>
                            </div>
                        </fieldset>

                        <!--                  <fieldset>
                                            <section>
                                              <div class="inline-group">
                                                <label class="radio">
                                                  <input type="radio" name="radio-inline" checked>
                                                  <i></i>Visa</label>
                                                <label class="radio">
                                                  <input type="radio" name="radio-inline">
                                                  <i></i>MasterCard</label>
                                                <label class="radio">
                                                  <input type="radio" name="radio-inline">
                                                  <i></i>PayPal</label>
                                              </div>
                                            </section>
                                            <section>
                                              <label class="input">
                                                <input type="text" name="name" placeholder="Name on card">
                                              </label>
                                            </section>
                                            <div class="row">
                                              <section class="col col-10">
                                                <label class="input">
                                                  <input type="text" name="card" id="card" placeholder="Card number">
                                                </label>
                                              </section>
                                              <section class="col col-2">
                                                <label class="input">
                                                  <input type="text" name="cvv" id="cvv" placeholder="CVV2">
                                                </label>
                                              </section>
                                            </div>
                                            <div class="row">
                                              <label class="label col col-4">Expiration date</label>
                                              <section class="col col-5">
                                                <label class="select">
                                                  <select name="month">
                                                    <option value="0" selected disabled>Month</option>
                                                    <option value="1">January</option>
                                                    <option value="1">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                  </select>
                                                  <i></i> </label>
                                              </section>
                                              <section class="col col-3">
                                                <label class="input">
                                                  <input type="text" name="year" id="year" placeholder="Year">
                                                </label>
                                              </section>
                                            </div>
                                          </fieldset>-->
                        <!--<script>
                            $( document ).ready(function() {
                                billing_check();
                            });
                            function billing_check(){
                                bill_check = $('#bill_check').is(":checked");
                                if(bill_check){
                                    $('.cus_sub_btn').html('<footer><button type="submit" class="btn btn-default">Submit</button></footer>');
                                    $('.bil_sub_btn').html('');
                                }else{
                                    $('.cus_sub_btn').html('');
                                    $('.bil_sub_btn').html('<footer><button type="submit" class="btn btn-default">Submit</button></footer>');
                                }
                            }
                        </script>-->
                        
                        <div  class="cus_sub_btn">
                            <footer>
                                <button type="submit" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">SAVE</button>
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
