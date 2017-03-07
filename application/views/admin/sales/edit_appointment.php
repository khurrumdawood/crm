        
<div class="page-header">
    <style>
        h4 :after{
            content: "|";

        }
    </style>
    <h1>Home<small>Home beta</small></h1>

</div>

<!-- Widget Row Start grid -->
<form action="" method="post" id="checkout-form-my" enctype="multipart/form-data" >
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
                    <h2>Edit An Appointment

                    </h2>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <header> Edit Info</header>
                        <div style="color: red"><?php echo validation_errors(); ?> </div>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                   
                                                <label class="select">
                                                    <select name="status">
                                                    <option value="0" selected disabled>Status</option>
                                                    <option <?php if ($appointment[0]->status == 1) echo 'selected="selected"' ?> value="1">Completed</option>
                                                    <option <?php if ($appointment[0]->status == 2) echo 'selected="selected"' ?> value="2">Incomplete</option>
                                                  </select>
                                                  <i></i> </label>
                                              </section>
<!--                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="status" placeholder="Status*">
                                    </label>-->
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="assigned_to" readonly="" placeholder="Assigned To" value="<?php echo $customer[0]->name;  ?>">
                                    </label>
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
                    <section class="col col-6">
                      <!--<label class="label">Select single date</label>-->
                      <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                          
                          <input type="text" name="dates" id="date" placeholder="Date" value="<?php echo date('d.m.Y', strtotime($appointment[0]->date_time)); ?>">
                      </label>
                    </section>
                  <!--</fieldset>-->
                <!--</form>-->
              <!--</div>-->
<!--            </div>-->

                                <section class="col col-6">
                                    <label class="select"> 
                                        <!--<i class="icon-append fa fa-times"></i>-->
                                <?php 
                                echo timeValue($name = 'time', $id = 'time', $class='',$appointment[0]->timet,'Time') ?>
                                    <i></i> 
                                    </label>
                                    
                                </section>
                  
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="select"> 
                                <?php 
                                echo timeValue($name = 'reminder', $id = 'reminder', $class='', $appointment[0]->reminder,'Reminder') ?>
                                        <i></i> 
                                    </label>

                                    
                                </section>
                                <section class="col col-6">
                                    <label class="select">
                                                    <select name="appointment_type">
                                                    <option value="0" selected disabled>Appointment Type</option>
                                                    <option <?php if ($appointment[0]->appointment_type == 'Call') echo 'selected="selected"' ?> value="Call">Call</option>
                                                    <option <?php if ($appointment[0]->appointment_type == 'Meeting') echo 'selected="selected"' ?> value="Meeting">Meeting</option>
                                                  </select>
                                                  <i></i> </label>
                                </section>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <script>
                                        function abc() {
                                            
                                            $('#file_attach').parent().next().val($('#file_attach').val());
                                        }
                                    </script>
                                    <label for="file" class="input input-file">
                                    <div class="button">
                                        <input type="file" id="file_attach" name="file_attach" onchange="abc()">
                                      Attach File</div>
                                        <input type="text" readonly >
                                        <i class="icon-prepend fa" style="left: 0; padding-right: 0;"><img height="35px" width="32px" src="<?php echo base_url(); ?>uploads/appointment/u_<?php echo $appointment[0]->file; ?>" /></i>
                                    </label>
                    <!--<input id="filebutton" class="input-file" type="file" name="filebutton">-->
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-tasks"></i>
                                        <input type="text" name="aa_task" placeholder="Add Task" value="<?php echo $appointment[0]->aa_task; ?>">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section>
                                    <label class="textarea col col-6">
                                        <textarea rows="1" name="venue_add" placeholder="Appointment Venue/Address"><?php echo $appointment[0]->venue_add; ?></textarea>
                                    </label>
                                    <div style="clear:both"></div>
                                </section>
                            </div>
                            <div class="row">
                                <section>
                                    <label class="textarea col col-6">
                                        <textarea rows="1" name="comment" placeholder="Comment"><?php echo $appointment[0]->comment; ?></textarea>
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
                                <button type="submit" class="btn btn-default">SAVE</button>
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
