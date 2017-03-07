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
                <header>
                    <strong><h2>Sender Info </h2> </strong>
                </header>
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
                    <?php if($cus_shipment_detail[0]->sender_name){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Sender name</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->sender_name; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->sender_phone){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Sender Phone</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->sender_phone; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->sender_email){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Sender Email</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->sender_email; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->sender_company){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Sender Company</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->sender_company; ?> </a>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if($cus_shipment_detail[0]->sender_country){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Sender Country</h3>
                            <a class="btn btn-sm btn-success">
                                <?php if($cus_shipment_detail[0]->sender_country==0 ||$cus_shipment_detail[0]->sender_country==''){
                                    echo '  ';
                                }else {
                                    echo get_country_name($cus_shipment_detail[0]->sender_country);
                                }  ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if($cus_shipment_detail[0]->sender_state){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Sender State</h3>
                            <a class="btn btn-sm btn-success">
                            <?php if($cus_shipment_detail[0]->sender_state==0 ||$cus_shipment_detail[0]->sender_state==''){
                                    echo '  ';
                                }else {
                                    echo get_state_or_city_name($cus_shipment_detail[0]->sender_state);
                                }  ?>
                            
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->sender_city){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Sender City</h3>
                            <a class="btn btn-sm btn-success">
                            <?php if($cus_shipment_detail[0]->sender_city==0 ||$cus_shipment_detail[0]->sender_city==''){
                                    echo '  ';
                                }else {
                                    echo get_state_or_city_name($cus_shipment_detail[0]->sender_city);
                                }  ?>

                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->sender_postal){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Sender Postal</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->sender_postal; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->sender_address){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Sender Address</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->sender_address; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->sender_address2){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Sender Address2</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->sender_address2; ?></a>
                        </div>
                    </div>
                    <?php } ?>

                </div>

                <header>
                    <strong><h2>Recipient Info </h2> </strong>
                </header>
                <div class="row">
                    <?php if($cus_shipment_detail[0]->recipient_name){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Recipient name</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->recipient_name; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->recipient_phone){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Recipient Phone</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->recipient_phone; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->recipient_email){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Recipient Email</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->recipient_email; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->recipient_company){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Recipient Company</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->recipient_company; ?> </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->recipient_country){ ?>

                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Recipient Country</h3>
                            <a class="btn btn-sm btn-success">
                                <?php if($cus_shipment_detail[0]->recipient_country==0 ||$cus_shipment_detail[0]->recipient_country==''){
                                    echo '  ';
                                }else {
                                    echo get_country_name($cus_shipment_detail[0]->recipient_country);
                                }  ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if($cus_shipment_detail[0]->recipient_state){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Recipient State</h3>
                            <a class="btn btn-sm btn-success">
                            <?php if($cus_shipment_detail[0]->recipient_state==0 ||$cus_shipment_detail[0]->recipient_state==''){
                                    echo '  ';
                                }else {
                                    echo get_state_or_city_name($cus_shipment_detail[0]->recipient_state);
                                }  ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->recipient_city){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Recipient City</h3>
                            <a class="btn btn-sm btn-success">
                            <?php if($cus_shipment_detail[0]->recipient_city==0 ||$cus_shipment_detail[0]->recipient_city==''){
                                    echo '  ';
                                }else {
                                    echo get_state_or_city_name($cus_shipment_detail[0]->recipient_city);
                                }  ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->recipient_postal){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Recipient Postal</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->recipient_postal; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->recipient_address){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Recipient Address</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->recipient_address; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->recipient_address2){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Recipient Address2</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->recipient_address2; ?></a>
                        </div>
                    </div>
                    <?php } ?>

                </div>

                <header>
                    <strong><h2>Shipment Info </h2> </strong>
                </header>
                <div class="row">
                    <?php if($cus_shipment_detail[0]->submit_date){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Submit Date</h3>
                            <a class="btn btn-sm btn-success"><?php echo date('M-d-Y',  strtotime($cus_shipment_detail[0]->submit_date)); ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->services){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Services</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->services; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->package_type){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Package Type</h3>
                            <a class="btn btn-sm btn-success">
                                <?php // echo $cus_shipment_detail[0]->package_type; ?>
                                <?php if($cus_shipment_detail[0]->package_type==0 ||$cus_shipment_detail[0]->package_type==''){
                                    echo '  ';
                                }else {
                            echo get_name('carrier_packges',$cus_shipment_detail[0]->package_type);
                                    }  ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->contents){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Contents</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->contents; ?> </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->content_description){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Content Description</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->content_description; ?></a>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if($cus_shipment_detail[0]->shipment_reference){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Shipment Reference</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->shipment_reference; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->transport_charges!= 0){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Transport Charges</h3>
                            <a class="btn btn-sm btn-success">
                                <?php if($cus_shipment_detail[0]->transport_charges=='1'){
                                    echo 'Receiver';
                                }  ?>
                                <?php if($cus_shipment_detail[0]->transport_charges=='2'){
                                    echo 'Third Party';
                                }  ?>
                                <?php if($cus_shipment_detail[0]->transport_charges=='244'){
                                    echo 'Sender';
                                }  ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->account){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Account</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->account; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->duties!=0){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Duties To be Paid By</h3>
                            <a class="btn btn-sm btn-success">
                                <?php // echo $cus_shipment_detail[0]->duties; ?>
                                    <?php if($cus_shipment_detail[0]->duties=='1'){
                                    echo 'Duties To Be Paid By Receiver';
                                }  ?>
                                    <?php if($cus_shipment_detail[0]->duties=='2'){
                                    echo 'Duties To Be Paid By Sender';
                                }  ?>
                                    <?php if($cus_shipment_detail[0]->duties=='3'){
                                    echo 'Duties To Be Paid By Third Party';
                                }  ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($cus_shipment_detail[0]->amount){ ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="tiny-user-block clearfix" style="padding: 10px">
                            <h3>Amount</h3>
                            <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->amount; ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                    
                    
                    <?php if ($cus_shipment_detail[0]->commercial_invoice == "Help me generate a commercial invoice") { ?>
                    
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="tiny-user-block clearfix" style="padding: 10px">
                                <h3>Receiver Tax</h3>
                                <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->receiver_tax; ?></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="tiny-user-block clearfix" style="padding: 10px">
                                <h3>Terms Of Trade</h3>
                                <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->terms_of_trade; ?></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="tiny-user-block clearfix" style="padding: 10px">
                                <h3>Reasons For Export</h3>
                                <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->reasons_for_export; ?></a>
                            </div>
                        </div>
                        
                    </div>
                        
                    <?php } ?>
                    <?php if ($cus_shipment_detail[0]->collection_option == "I need help to schedule a coll") { ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="tiny-user-block clearfix" style="padding: 10px">
                                <h3>Ready date</h3>
                                <a class="btn btn-sm btn-success"><?php echo date('M-d-Y',  strtotime($cus_shipment_detail[0]->dates)); ?></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="tiny-user-block clearfix" style="padding: 10px">
                                <h3>Ready Time </h3>
                                <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->ready_time; ?></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="tiny-user-block clearfix" style="padding: 10px">
                                <h3>Close Time</h3>
                                <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->close_time; ?></a>
                            </div>
                        </div>
                    
                    <div class="col-md-3 col-sm-6">
                            <div class="tiny-user-block clearfix" style="padding: 10px">
                                <h3>Location Code</h3>
                                <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->location_code; ?></a>
                            </div>
                        </div>
                    
                        <div class="col-md-3 col-sm-6">
                            <div class="tiny-user-block clearfix" style="padding: 10px">
                                <h3>Location Description</h3>
                                <a class="btn btn-sm btn-success"><?php echo $cus_shipment_detail[0]->location_description; ?></a>
                            </div>
                        </div>
                    </div>
                        
                    <?php } ?>
                <table class="display table table-striped table-hover" id="table-2">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Weight</th>
                            <th>Length</th>
                            <th>Width</th>
                            <th>Height</th>
                            <th>Custom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cus_shipment_unit as $cus_ship_unit) {
                            ?>
                            <tr>
                            <td><?php echo $cus_ship_unit->id; ?></td>
                            <td><?php echo $cus_ship_unit->weight; ?></td>
                            <td><?php echo $cus_ship_unit->length; ?></td>
                            <td><?php echo $cus_ship_unit->width; ?></td>
                            <td><?php echo $cus_ship_unit->height; ?></td>
                            <td><?php echo $cus_ship_unit->custom; ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th><input type="text" name="id" placeholder="Sr" class="search_init" /></th>
                            <th><input type="text" name="weight" placeholder="Weight" class="search_init" /></th>
                            <th><input type="text" name="length" placeholder="Length" class="search_init" /></th>
                            <th><input type="text" name="width" placeholder="Width" class="search_init" /></th>
                            <th><input type="text" name="height" placeholder="Height" class="search_init" /></th>
                            <th><input type="text" name="custom" placeholder="Custom" class="search_init" /></th>
                        </tr>
                    </tfoot>
                </table>
                
                <table class="display table table-striped table-hover" id="table-4">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Goods For Desc</th>
                            <th>HTS</th>
                            <th>Country Of Origin</th>
                            <th>Quantity</th>
                            <th>Unit Value</th>
                            <th>Row Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cus_shipment_good as $cus_ship_good) {
                            ?>
                            <tr>
                            <td><?php echo $cus_ship_good->good_id; ?></td>
                            <td><?php echo $cus_ship_good->goods_for_description; ?></td>
                            <td><?php echo $cus_ship_good->hts; ?></td>
                            
                            <td>
                                <?php // echo $cus_ship_good->country_of_origin; ?>
                                <?php if($cus_ship_good->country_of_origin==0 ||$cus_ship_good->country_of_origin==''){
                                    echo '  ';
                                }else {
                                   echo get_country_name($cus_ship_good->country_of_origin);
                                }  ?>
                            </td>
                            <td><?php echo $cus_ship_good->qty; ?></td>
                            <td><?php echo $cus_ship_good->unit_value; ?></td>
                            <td><?php echo $cus_ship_good->row_total; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th><input type="text" name="id" placeholder="Sr" class="search_init" /></th>
                            <th><input type="text" name="goods_for_description" placeholder="Goods" class="search_init" /></th>
                            <th><input type="text" name="hts" placeholder="Hts" class="search_init" /></th>
                            <th><input type="text" name="country_of_origin" placeholder="Country Of Origin" class="search_init" /></th>
                            <th><input type="text" name="qty" placeholder="Quantity" class="search_init" /></th>
                            <th><input type="text" name="unit_value" placeholder="Unit Value" class="search_init" /></th>
                            <th><input type="text" name="row_total" placeholder="Row Total" class="search_init" /></th>
                        </tr>
                    </tfoot>
                </table>
                    
                




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






