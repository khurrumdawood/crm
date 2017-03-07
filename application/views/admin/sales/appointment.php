
      
      
        
        <!--Breadcrumb-->
<!--        <div class="breadcrumb clearfix">
            <style>
    .breadcrumb li a:before {
	border-width:0px;
}
.breadcrumb li a:after {
	
	right: 0px;
}
            </style>
          <ul>
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Invoicing</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Receivables</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Payable</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Reports</a></li>
            <li><a href="index.html"><i class="fa fa-home"></i> Admin</a></li>
            <li class="active">Data</li>
          </ul>
        </div>-->
        <!--/Breadcrumb-->
        
        <div class="page-header">
            <style>
                h4 :after{
                    content: "|";
                       
                }
            </style>
          <h1>Home<small>Home beta</small></h1>
          
        </div>
        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          <div class="col-md-12 bootstrap-grid"> 
            
          <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
              
              <header>
                  <strong><h2>Appointments </h2> </strong>
<!--                <h2>Datatable<small>Columns Filtering</small></h2>-->
              </header>

              <div class="inner-spacer">
                <table class="display table table-striped table-hover" id="table-2">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Contact</th>
                      <th>Date Time</th>
                      <th>Appointment Type</th>
                      <th>Edit</th>
                      <th>Lead</th>
                    </tr>
                  </thead>
                  <tbody>
                         
                      <?php
//                      echo '<pre>';
//                      print_r($contact);exit;
                      foreach($appointment as $appointment){ ?>
                    <tr>
                      <td><?php echo $appointment->name; ?></td>
                      <td><?php echo $appointment->phone; ?></td>
                    <td>
                        
                        <?php echo date('M-d-Y',  strtotime($appointment->date_time)); ?><br>
                        <?php echo $appointment->timet; ?>
                        
                    </td>
                    <td><?php echo $appointment->appointment_type; ?></td>
                    <td>
                    <a href="<?php echo base_url(); ?>admin/sales/edit_appointment/<?php echo $appointment->cus_id; ?>/<?php echo $appointment->id; ?>">Edit</a>
                    </td>
                    <td>
        <a href="<?php echo base_url()?>admin/sales/add_lead/<?php echo $appointment->cus_id; ?>" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">Make a Lead</a>
                    </td>
                    </tr>

                      <?php } ?>
                        
                  </tbody>
                  <tfoot>
                    <tr>
                      <th><input type="text" name="name" placeholder="Name" class="search_init" /></th>
                      <th><input type="text" name="phone" placeholder="Phone" class="search_init" /></th>
                      <th><input type="text" name="date_time" placeholder="Date Time" class="search_init" /></th>
                      <th><input type="text" name="appointment_type" placeholder="Type" class="search_init" /></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div> 
              
          </div>
          <!-- /Inner Row Col-md-12 --> 
        </div>
        <!-- /Widgets Row End Grid --> 
      </div>
      <!-- / Content Wrapper --> 
