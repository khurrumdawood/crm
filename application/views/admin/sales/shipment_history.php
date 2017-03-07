



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

<!--<div class="page-header">
    <style>
        h4 :after{
            content: "|";

        }
    </style>
    <h1>Contacts<small>My Contacts List</small></h1>

</div>-->

<!-- Widget Row Start grid -->
<div class="row" id="powerwidgets">
    <div class="col-md-12 bootstrap-grid"> 

        <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">

            

            <div class="inner-spacer">
                <div class="row">
                    <style>
                        .tiny-user-block h3 ,.tiny-user-block a{
                            margin: 0 auto;
                            display: table;
                        }
                        .tiny-user-block a{
                            margin-top: 10px;
                         
                        }
                    </style>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Customer name</h3>
                            <a class="btn btn-sm btn-success"><?php echo $customer[0]->name; ?></a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Customer Phone</h3>
                            <a class="btn btn-sm btn-success"><?php echo $customer[0]->phone; ?></a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Customer Email</h3>
                            <a class="btn btn-sm btn-success"><?php echo $customer[0]->email; ?></a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Meeting times</h3>
                            <a class="btn btn-sm btn-success"><?php echo $customer[0]->phone; ?> </a>
                        </div>
                    </div>

                
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Complete Address</h3>
                            <a class="btn btn-sm btn-success"><?php echo $customer[0]->shipping; ?></a>
                        </div>
                    </div>

                
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Customer Comments</h3>
                            <a class="btn btn-sm btn-success"><?php echo $customer[0]->coments; ?></a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Customer_type</h3>
                            <a class="btn btn-sm btn-success"><?php echo $customer[0]->customer_type; ?></a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Assigned Sales Rep</h3>
                            <a class="btn btn-sm btn-success"><?php echo $customer[0]->employee_id; ?></a>
                        </div>
                    </div>

                </div>



<header>
                <strong><h2>Customer Shipments </h2> </strong>
<!--                <h2>Datatable<small>Columns Filtering</small></h2>-->
            </header>
                <table class="display table table-striped table-hover" id="table-2">
                    <thead>
                        <tr>

                            <th>Sr</th>
                            <th>Date</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Weight</th>
                            <th>Delivered On</th>
                            <th>Price</th>
                            <th>Detail</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
//                      echo '<pre>';
//                      print_r($contact);exit;
                        foreach ($shipment_history as $shipment_histor) {
                            ?>
                            <tr>
                                <td><?php echo $shipment_histor->ship_id; ?></td>
                                <td>
                                    <?php
                                    $ship_id = $shipment_histor->created_at;
                                    echo date('d M.Y', strtotime($ship_id));
                                    ?>
                                </td>
                                <td><?php echo $shipment_histor->from; ?></td>
                                <td><?php echo $shipment_histor->to; ?></td>
                                <td><?php echo $shipment_histor->weight; ?></td>
                                <td><?php
                                    $deliver = $shipment_histor->delivered_on;
                                    echo date('d M.Y', strtotime($deliver));
                                    ?></td>
                                <td><?php echo $shipment_histor->price; ?></td>
                                <td><a href = "<?php echo base_url(); ?>admin/sales/customer_shipment_detail/<?php echo $shipment_histor->ship_id; ?>" >Detail</a></td>
          <!--                      <td>
                              <div class="<?php if ($shipment_histor->customer_type == 'gold') {
                                        echo 'label label-success ';
                                    } else {
                                        echo 'label label-default';
                                    } ?>">
    <?php echo $shipment_histor->customer_type; ?></div>
                                </td>
                              <td>
                              <a href="<?php echo base_url(); ?>admin/sales/shipment_history/<?php echo $shipment_histor->id; ?>">Detail</a>
                              </td>-->
                            </tr>

<?php } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th><input type="text" name="filter_name" placeholder="Sr" class="search_init" /></th>
                            <th><input type="text" name="filter_name" placeholder="Date Of Order" class="search_init" /></th>
                            <th><input type="text" name="filter_type" placeholder="From Address" class="search_init" /></th>
                            <th><input type="text" name="filter_phone" placeholder="To Address" class="search_init" /></th>
                            <th><input type="text" name="filter_phone" placeholder="Weight" class="search_init" /></th>
                            <th><input type="text" name="filter_phone" placeholder="Delivery Date" class="search_init" /></th>
                            <th><input type="text" name="filter_phone" placeholder="Price" class="search_init" /></th>
                        </tr>
                    </tfoot>
                </table>


                <div class="col-md-6 bootstrap-grid">
                    <header>
                        <strong><h2>Total </h2> </strong>
                    </header>
                    <table class="table table-condensed table-bordered margin-0px" id="">
                        <thead>
                            <tr>
                                <th>Total Deliveries</th>
                                <th>Total Weight</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="success">
                                <td><?php echo $deliveries[0]->deliver; ?></td>
                                <td><?php echo $weight[0]->weigh; ?></td>
                                <td><?php echo $prices[0]->price; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>



                <!--                  <div  class="cus_sub_btn">
                <footer>
                  <a href="<?php echo base_url() ?>admin/sales/add_lead/<?php ?>" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">Make a Lead</a>
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






