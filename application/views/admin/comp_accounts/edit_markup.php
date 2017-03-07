

<!--Content Wrapper--><!--Horisontal Dropdown-->


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
<form action="" method="post" id="checkout-form">
    <div class="row" id="powerwidgets">

        <div class="col-md-12 bootstrap-grid"> 

            <!-- New widget -->
            <div class="powerwidget cold-grey" id="available-validations-methods" data-widget-editbutton="false">
            </div>
            <!-- /End Widget --> 

        </div>

        <!-- /Inner Row Col-md-12 -->
        <div class="col-md-6 bootstrap-grid">

            <!-- New widget -->

            <div class="powerwidget" id="checkout-form-validation-widget" data-widget-editbutton="false">
                <header>
                    <h2>Customer Markups

                    </h2>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <header> Please Provide Info</header>
                        <div style="color: red"><?php echo validation_errors(); ?> </div>
                        <fieldset>

                            <div class="row">
                                <section class="col col-11">
                                    <label class="input"> <i class="icon-prepend fa fa-bars"></i>
                                        <input type="text" name="description" placeholder="Description*" value="<?php echo $customer_markups_data[0]->description; ?>">
                                    </label>
                                </section>

                            </div>

<!--                            <div class="row">
                                <section class="col col-11">
                                    <label class="input"> <i class="icon-prepend fa fa-archive"></i>
                                        <input type="text" name="title" placeholder="ID*" value="<?php echo $customer_markups_data[0]->title; ?>">
                                    </label>
                                </section>

                            </div>-->

                            <div class="row">
                                <section class="col col-11">
                                    <label class="select"> 
                                        <!--<input type="text" name="markup_type" placeholder="Markup Type" value="<?php echo $customer_markups_data[0]->markup_type; ?>">-->
                                        <select name="markup_type" >
                                            <option disabled="">Select Markup Type</option>
                                            <option <?php echo ($customer_markups_data[0]->markup_type=='fixed')?'selected':''; ?> value="fixed">Fixed</option>
                                            <option <?php echo ($customer_markups_data[0]->markup_type=='percentage')?'selected':''; ?> value="percentage">Percentage</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>

                            <div class="row">
                                <section class="col col-11">
                                    <label class="input"> <i class="icon-prepend fa fa-briefcase"></i>
                                        <input type="text" name="amount" placeholder="Amount" value="<?php echo $customer_markups_data[0]->amount; ?>">
                                    </label>
                                </section>
                            </div>

                            <div class="row">
                            <section class="col col-11">
                                <label class="select">
                                    <?php echo carrierDropdown('carrier_id','carrier_id',$customer_markups_data[0]->carrier_id,'','Select Carrier'); ?>
                                    <i></i> </label>
                            </section>

                        </div>

                        </fieldset>
                        <div class="bil_sub_btn">
                            <footer>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </footer>

                        </div>                  


                        <div  class="cus_sub_btn">

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
