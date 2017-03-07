
      
     
        
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
                  <strong><h2>Contacts </h2> </strong>
<!--                <h2>Datatable<small>Columns Filtering</small></h2>-->
              </header>
              <script>
                  function contacts_filter() {
                      val=$('#coun_fran_city').val();
                      vall="<?php echo base_url(); ?>admin/sales/index/"+val;
                      //alert($val);
//                      alert(vall);
//                      window.location = <?php echo base_url(); ?>+"admin/sales/contact/"+val;
                          window.location = vall;
                  }
                  </script>
              <div class="inner-spacer">
                  <div class="row">
                      <section class="col col-5" style="float: right; margin-right: 15px;">
                        <label class="select">
                            <select name="coun_fran_city" id="coun_fran_city" onchange="contacts_filter()">
                            <option value="" selected disabled>Filter for Contacts</option>
                            <option value="1">Franchise</option>
                            <option value="2">City</option>
                            <option value="3">Country</option>
                          </select>
                        </label>
                      </section>
                  </div>
                            
                <table class="display table table-striped table-hover" id="table-2">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Phone</th>
                      <th>Actions</th>
                      <th>Edit</th>
                      <!--<th>Lead</th>-->
                      
                    </tr>
                  </thead>
                  <tbody>
                         
                      <?php
//                      echo '<pre>';
//                      print_r($contact);exit;
                      foreach($contact as $con){ ?>
                    <tr>
                      <td><?php echo $con->id; ?></td>
                      <td><?php echo $con->name; ?></td>
                      <td>
                    <div class="<?php if($con->type=='open'){echo 'label label-success';} else {echo 'label label-default';} ?>">
                     <?php echo $con->type; ?></div>
                      </td>
                    <td><?php echo $con->phone; ?></td>
                    <td>
                    <a href="<?php echo base_url(); ?>index.php/admin/sales/set_appointment/<?php echo $con->id; ?>">
                        Set Appointment</a> 
                    </td>
                    <td>
                        <?php if($con->type=='open'){ ?>
                    
                    <a href="<?php echo base_url(); ?>index.php/admin/sales/edit_contact/<?php echo $con->id; ?>/<?php echo $con->type; ?>">
                        Edit </a>
                    <?php } ?>
                    
                    </td>
<!--                    <td>
        <a href="<?php //echo base_url()?>admin/sales/add_lead/<?php // echo $con->id; ?>" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">Make a Lead</a>
                    </td>-->
                    </tr>

                      <?php } ?>
                        
                  </tbody>
                  <tfoot>
                    <tr>
                      <th><input type="text" name="filter_id" placeholder="Id" class="search_init" /></th>
                      <th><input type="text" name="filter_name" placeholder="Name" class="search_init" /></th>
                      <th><input type="text" name="filter_type" placeholder="Type" class="search_init" /></th>
                      <th><input type="text" name="filter_phone" placeholder="Phone" class="search_init" /></th>
                    </tr>
                  </tfoot>
                </table>
                  <div  class="cus_sub_btn">
                  <footer>
                      <a href="<?php echo base_url()?>admin/sales/add_contact" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">Add New</a>
                  </footer>
                </div>
              </div>
            </div> 
              
          </div>
          <!-- /Inner Row Col-md-12 --> 
        </div>
        <!-- /Widgets Row End Grid--> 
      </div>
      <!-- / Content Wrapper --> 

      
      
      
      

