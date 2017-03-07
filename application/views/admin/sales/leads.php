
      
     
        
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
          <h1>Contacts<small>My Contacts List</small></h1>
          
        </div>
        
        <!-- Widget Row Start grid -->
        <div class="row" id="powerwidgets">
          <div class="col-md-12 bootstrap-grid"> 
            
          <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">
              
              <header>
                  <strong><h2>Leads </h2> </strong>
<!--                <h2>Datatable<small>Columns Filtering</small></h2>-->
              </header>

              <div class="inner-spacer">
                <table class="display table table-striped table-hover" id="table-2">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Lead Status</th>
                      <th>Assigned Sales Rep</th>
                      <th>Edit</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                         
                      <?php
//                      echo '<pre>';
//                      print_r($contact);exit;
                      foreach($leads as $lead){ ?>
                    <tr>
                      <td><?php echo $lead->name; ?></td>
                      <td><?php echo $lead->lead_contact; ?></td>
                      <td>
                    <div class="<?php if($lead->lead_status=='completed'){echo 'label label-success';} else {echo 'label label-default';} ?>">
                     <?php echo $lead->lead_status; ?></div>
                      </td>
                    <td><?php echo $lead->firstname; ?>  <?php echo $lead->lastname; ?></td>
                    <td>
                <?php if($lead->lead_status!='completed'){ ?>                        
                    <a href="<?php echo base_url(); ?>admin/sales/edit_lead/<?php echo $lead->id; ?>">Edit</a>
                <?php } ?>
                    </td>
                    </tr>

                      <?php } ?>
                        
                  </tbody>
                  <tfoot>
                    <tr>
                      <th><input type="text" name="filter_name" placeholder="Name" class="search_init" /></th>
                      <th><input type="text" name="filter_type" placeholder="Phone" class="search_init" /></th>
                      <th><input type="text" name="filter_phone" placeholder="Lead Status" class="search_init" /></th>
                      <th><input type="text" name="filter_phone" placeholder="Sales Rep" class="search_init" /></th>
                    </tr>
                  </tfoot>
                </table>
<!--                  <div  class="cus_sub_btn">
                  <footer>
                    <a href="<?php echo base_url()?>admin/sales/add_lead/<?php  ?>" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">Make a Lead</a>
                  </footer>
                </div>-->
              </div>
            </div> 
              
          </div>
          <!-- /Inner Row Col-md-12 --> 
        </div>
        <!-- /Widgets Row End Grid--> 
      </div>
      <!-- / Content Wrapper --> 

      
      
      
      

