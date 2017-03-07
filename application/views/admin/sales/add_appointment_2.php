        
<div class="page-header">
    <style>
        h4 :after{
            content: "|";

        }
    </style>
    <h1>Home<small>Home beta</small></h1>

</div>




            <!-- New widget -->
            
<div class="powerwidget " id="forms-6" data-widget-editbutton="false">
              <header>
                <h2>Set Appointment</h2>
              </header>
              <div class="inner-spacer">
                  <form id="checkout-form-my" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                  <fieldset>
                      <style>
                          .form-horizontal .state-error input,
                          .form-horizontal .state-error select,
                          .form-horizontal .state-error textarea,
                          .form-horizontal .radio.state-error i,
                          .form-horizontal .checkbox.state-error i,
                          .form-horizontal .toggle.state-error i{
                              
                            background: none repeat scroll 0 0 #f0c6bd;
                            border-color: #e9a89a;
                              
                          }               
                          .form-horizontal .input input:focus,
                          .form-horizontal .select select:focus,
                          .form-horizontal .textarea textarea:focus,
                          .form-horizontal .radio input:focus + i,
                          .form-horizontal .checkbox input:focus + i,
                          .form-horizontal .toggle input:focus + i {
                              border-color: #969fa1;
                          }
                          .form-horizontal .input input,
                          .form-horizontal .select select,
                          .form-horizontal .textarea textarea,
                          .form-horizontal .radio i,
                          .form-horizontal .checkbox i,
                          .form-horizontal .toggle i,
                          .form-horizontal .icon-append,
                          .form-horizontal .icon-prepend{
                              transition: border-color 0.3s ease 0s;
                              
                          }
                          .form-horizontal .input input,
                          .form-horizontal .select select,
                          .form-horizontal .textarea textarea {
                        -moz-appearance: none;
                        background: none repeat scroll 0 0 #fff;
                        border-radius: 3px;
                        border-style: solid;
                        border-width: 2px;
                        box-sizing: border-box;
                        display: block;
                        font-weight: 600;
                        height: 38px;
                        outline: medium none;
                        padding: 8px 10px;
                        width: 100%;    
                          }
                      </style>
                    <!-- Form Name -->
                    
                    
                    <!-- Text input-->
                    <div class="col-md-6 bootstrap-grid">
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textinput">Select Status</label>
        
                      
                      <div class="col-md-7">
                        <select id="selectbasic" name="status" class="form-control">
                            <option value="0" selected disabled>Status</option>
                            <option value="1">Completed</option>
                            <option value="2">Incomplete</option>
                          </select>

                      </div>
                          
                    </div>
                    </div>
                        
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textinput">Date</label>
                      <div class="col-md-7">
                          <input type="text" name="dates" id="date" placeholder="Date"   class="form-control input-md" >
                      </div>
                    </div>
                    </div>
                        
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textinput">Reminder</label>
                      <div class="col-md-7">
        <?php 
                echo timeValue($name = 'reminder', $id = 'reminder', $class='form-control', $check = '','Reminder','') ?>

                      </div>
                    </div>
                    </div>
                        
                        
                        
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textinput"></label>
                      <div class="col-md-7">
            <textarea class="form-control" rows="2" name="venue_add" placeholder="  &nbsp;                        Appointment Venue/Address"></textarea>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textinput"></label>
                      <div class="col-md-7">
            <textarea class="form-control" rows="2" name="comment" placeholder="  &nbsp;&nbsp;&nbsp;&nbsp;                                  Comments"></textarea>
                      </div>
                    </div>
                    </div>
                        
                    
                    
                    
                    </div>
                    
                     <div class="col-md-6 bootstrap-grid">
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textinput">Type</label>
                      <div class="col-md-7">
                          <select name="appointment_type" class="form-control">
                            <option value="0" selected disabled>Appointment Type</option>
                            <option value="Call">Call</option>
                            <option value="Meeting">Meeting</option>
                          </select>
                      </div>
                    </div>
                    </div>

                         
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textinput">Assigned to</label>
                      <div class="col-md-7">
                        <input type="text" name="assigned_to" readonly="" placeholder="Assigned To" value="<?php echo $customer[0]->name;  ?>" class="form-control input-md">
                      </div>
                    </div>
                    </div>

                        
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textinput">Time</label>
                      <div class="col-md-7">
                          <?php 
                                echo timeValue($name = 'time', $id = 'time', $class='form-control', $check = '','Time','') ?>
                      </div>
                    </div>
                    </div>
                        
                        
                        
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textinput">Task</label>
                      <div class="col-md-7">
                          <input type="text" name="aa_task" placeholder="Add Task" class="form-control">
                      </div>
                    </div>
                    </div>                        
                         
                    <div class="row">
                    <div class="form-group">
                      <label class="col-md-3 " for="textinput">Attach</label>
                      <script>
                                        function abc() {
                                            
                                            $('#file_attach').parent().next().val($('#file_attach').val());
                                        }
                                    </script>
                      <div class="col-md-7">
<!--                        <input id="attach_file" name="attach_file" class="input-file" type="file">-->
                          <label for="file" class="input input-file">
                          <div class="button">
                                        <input type="file" id="file_attach" name="file_attach" onchange="abc()">
                                      Attach File</div>
                                    <input type="text" readonly>
                          </label>
                      </div>
                    </div>
                    </div>
                         
                    
                        <div class="row">
                         <div class="form-group">
                      <label class="col-md-8 control-label" for="button1id"></label>
                      <div class="col-md-4">
                          <div class="bil_sub_btn">
                  
                    <button type="submit" class="btn btn-default">Save</button>
                  
                            </div>
                    </div>
                    </div>
                    
                    </div>
                  </fieldset>
                </form>
              </div>
              </div>
            
            
                
            <!-- End .powerwidget --> 





</div>
<!-- / Content Wrapper --> 
