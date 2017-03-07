        
<div class="page-header">
    <style>
        h4 :after{
            content: "|";

        }
        .btn-primary:hover{
            background: #3071a9 !important;
        }
    </style>
<!--    <h1>Home<small>Home beta</small></h1>-->

</div>

<!-- Widget Row Start grid -->
<!--<form action="" method="post" id="base_rates" enctype="multipart/form-data" >-->
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
            <!--                <header>
                                <h2>Make An Appointment
            
                                </h2>
                            </header>-->
            <div class="inner-spacer">
                <div class="user-profile-info">
                    <div class="tabs-white">
                        <ul id="myTab" class="nav nav-tabs nav-justified purple" >
                            <li class="active"><a href="#home" data-toggle="tab">General</a></li>
                            <li><a href="#dhl" data-toggle="tab">DHL</a></li>
                            <li><a href="#activity" data-toggle="tab">FedEx</a></li>
                            <li><a href="#blog" data-toggle="tab">BP</a></li>
                            <li><a href="#chat" data-toggle="tab">UPS</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane in active" id="home">
                                <!--<div class="profile-header">Fdk</div>-->
                                <div action="" id="checkout-form" class="orb-form">
                                    <form action="" method="post" id="base_rates" enctype="multipart/form-data" >
                                        <!--<header> Please Provide Info</header>-->
                                        <div style="color: red"><?php echo validation_errors(); ?> </div>
                                        <fieldset>

                                            <div class="row">

                                                <section class="col col-5">

                                                    <p style="margin-right:64px; text-align: right; font-weight: bold;">Minimum Customer Base Charge Margin </p>

                                                    <!--<div style="float: right; margin-right: -69px; margin-top: -19px; font-size: xx-large;">%</div>-->
                                                </section>
                                                <!--                            </div>
                                                                            <div class="row">-->
                                                <section class="col col-4">
                                                    <label class="input">

                                                        <input type="text" class="" placeholder="<?php
                                                        if ($base_rates[0]->base_rate != 0) {
                                                            echo $base_rates[0]->base_rate;
                                                        }
                                                        ?>" value="" name="margin" style="width:37px; float: right;"/>
                                                    </label>
  <!--                                    <p style="margin-right:64px; text-align: right; font-weight: bold;">Minimum Customer Base Charge Margin </p>-->

                                                    <div style="float: right; margin-right: -69px; margin-top: -4px; font-size: xx-large;">%</div>
                                                </section>

                                            </div>
                                        </fieldset>

                                        <div  class="cus_sub_btn">
                                            <footer>
                                                <button type="reset" class="btn btn-default" style="float:right;">Reset</button>
                                                <button type="submit" class="btn btn-default" style="float:right; margin-right: 20px;">SAVE</button>
                                            </footer>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <style>
                                .items-view-list li {
                                    display: table !important;
                                    float: right;
                                }
                                .row {
                                    background: #F1F1F1;
                                }
                                form ul li div.items-inner {
                                    /*margin: 0 56px !important;*/
                                }
                            </style>
                            <div class="tab-pane" id="dhl">
                                <div class="profile-header"> DHL

                                </div>
                                <script>
                                    function check_checkedbox() {

                                        url = '';

                                        $(".check_csv").each(function () {

                                            if ($(this).is(":checked"))
                                            {

                                                if (url != '')
                                                    url += '&';
                                                company_id = $(this).attr('company_id');
                                                category_id = $(this).attr('category_id');
                                                margin_change = $(this).next().next().next().val();
                                                url = url + 'company_id[]=' + company_id + '&category_id[]=' + category_id + '&margin_change[]=' + margin_change;
//                                                    alert(url);
                                            }
                                        });
//                                            alert(url);
                                        window.location = '<?php echo base_url(); ?>admin/accounts/print_csv?' + url;
                                    }

                                    function check_checkedbox1() {

                                        url = '';

                                        $(".check_csv").each(function () {

                                            if ($(this).is(":checked"))
                                            {

                                                if (url != '')
                                                    url += '&';
                                                company_id = $(this).attr('company_id');
                                                category_id = $(this).attr('category_id');
                                                margin_change = $(this).next().next().next().val();
                                                url = url + 'company_id[]=' + company_id + '&category_id[]=' + category_id + '&margin_change[]=' + margin_change;
//                                                    alert(url);
                                            }
                                        });
//                                            alert(url);
                                        window.location = '<?php echo base_url(); ?>admin/accounts/pdf?' + url;
                                    }

                                </script>

                                <div class="row" style="padding-top:15px">
                                    <div class="col-md-5 bootstrap-grid"> 
                                    </div>
                                    <div class="col-md-3 bootstrap-grid"> 
                                        <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-success btn-xs" style="" onclick="check_checkedbox();">Print Csv </button>        

                                        <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-warning btn-xs" style="" onclick="check_checkedbox1();">Print Pdf </button>        
                                    </div>
<?php foreach ($companies as $company) { ?>

                                        <div class="col-md-9 bootstrap-grid"> 

                                            <div id="items" class="items-view-list items-switcher" style="background-color: #F1F1F1;">
                                                <form action="<?php echo base_url(); ?>admin/accounts/rate_sheet/<?php echo $company->company_id; ?>/<?php echo $company->category_id; ?>" method="post" id="followers<?php echo $company->company_id; ?><?php echo $company->category_id; ?>" enctype="multipart/form-data" >
                                                    <ul>
                                                        <li>
                                                            <div class="items-inner clearfix">
                                                                <h6 class="">
                                                                    <?php
                                                                    echo $company->name . ' ' . $company->category_name;
//                                                                echo ' &nbsp; &nbsp;';
                                                                    ?>


                                                                    <input type="checkbox"  name="company" id="company" class="check_csv" company_id="<?php echo $company->company_id; ?>" category_id="<?php echo $company->category_id; ?>"/> &nbsp; &nbsp;
                                                                    <b>>></b>&nbsp; &nbsp;
                                                                    <select>
                                                                        <option >
                                                                            % Margin
                                                                        </option>
                                                                    </select>&nbsp; &nbsp;
                                                                    <input type="text"  name="margin_change" style="width: 30px;" value="<?php echo $employees[0]->base_rate; ?>"/>    %   
                                                                    &nbsp;
                                                                    <!--<a href="" >View</a>-->
                                                                    <input  type="submit" class="btn-primary btn btn-xs" name="View" value="View" />

                                                                </h6>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>

                                            </div>
                                            <!-- eND items -->
                                        </div>
<?php } ?> 
                                </div>
                                <!-- eND ROW -->


                            </div>
                            <div class="tab-pane" id="activity">




                                <div class="profile-header">FedEX</div>
                                <div class="row" style="padding-top:15px">
                                    <div class="col-md-5 bootstrap-grid"> 
                                    </div>
                                    <div class="col-md-3 bootstrap-grid"> 
                                        <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-success btn-xs" style="" onclick="check_checkedbox();">Print Csv </button>        

                                        <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-warning btn-xs" style="" onclick="check_checkedbox1();">Print Pdf </button>        
                                    </div>
<?php foreach ($companies_fedex as $company_fedex) { ?>

                                        <div class="col-md-9 bootstrap-grid"> 

                                            <div id="items" class="items-view-list items-switcher" style="background-color: #F1F1F1;">
                                                <form action="<?php echo base_url(); ?>admin/accounts/rate_sheet/<?php echo $company_fedex->company_id; ?>/<?php echo $company_fedex->category_id; ?>" method="post" id="followers<?php echo $company->company_id; ?><?php echo $company->category_id; ?>" enctype="multipart/form-data" >
                                                    <ul>
                                                        <li>
                                                            <div class="items-inner clearfix">
                                                                <h6 class="">
                                                                    <?php
                                                                    echo $company_fedex->name . ' ' . $company_fedex->category_name;
//                                                                echo ' &nbsp; &nbsp;';
                                                                    ?>


                                                                    <input type="checkbox"  name="company" id="company" class="check_csv" company_id="<?php echo $company_fedex->company_id; ?>" category_id="<?php echo $company_fedex->category_id; ?>"/> &nbsp; &nbsp;
                                                                    <b>>></b>&nbsp; &nbsp;
                                                                    <select>
                                                                        <option >
                                                                            % Margin
                                                                        </option>
                                                                    </select>&nbsp; &nbsp;
                                                                    <input type="text"  name="margin_change" style="width: 30px;" value="<?php echo $employees[0]->base_rate; ?>"/>    %   
                                                                    &nbsp;
                                                                    <!--<a href="" >View</a>-->
                                                                    <input  type="submit" class="btn-primary btn btn-xs" name="View" value="View" />

                                                                </h6>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>

                                            </div>
                                            <!-- eND items -->
                                        </div>
<?php } ?> 
                                </div>


                            </div>
                            <div class="tab-pane" id="blog">
                                <div class="profile-header">BP</div>

                                <div class="row" style="padding-top:15px">
                                    <div class="col-md-5 bootstrap-grid"> 
                                    </div>
                                    <div class="col-md-3 bootstrap-grid"> 
                                        <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-success btn-xs" style="" onclick="check_checkedbox();">Print Csv </button>        

                                        <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-warning btn-xs" style="" onclick="check_checkedbox1();">Print Pdf </button>        
                                    </div>
<?php foreach ($companies_bp as $company_bp) { ?>

                                        <div class="col-md-9 bootstrap-grid"> 

                                            <div id="items" class="items-view-list items-switcher" style="background-color: #F1F1F1;">
                                                <form action="<?php echo base_url(); ?>admin/accounts/rate_sheet/<?php echo $company_bp->company_id; ?>/<?php echo $company_bp->category_id; ?>" method="post" id="followers<?php echo $company->company_id; ?><?php echo $company->category_id; ?>" enctype="multipart/form-data" >
                                                    <ul>
                                                        <li>
                                                            <div class="items-inner clearfix">
                                                                <h6 class="">
                                                                    <?php
                                                                    echo $company_bp->name . ' ' . $company_bp->category_name;
//                                                                echo ' &nbsp; &nbsp;';
                                                                    ?>


                                                                    <input type="checkbox"  name="company" id="company" class="check_csv" company_id="<?php echo $company_bp->company_id; ?>" category_id="<?php echo $company_bp->category_id; ?>"/> &nbsp; &nbsp;
                                                                    <b>>></b>&nbsp; &nbsp;
                                                                    <select>
                                                                        <option >
                                                                            % Margin
                                                                        </option>
                                                                    </select>&nbsp; &nbsp;
                                                                    <input type="text"  name="margin_change" style="width: 30px;" value="<?php echo $employees[0]->base_rate; ?>"/>    %   
                                                                    &nbsp;
                                                                    <!--<a href="" >View</a>-->
                                                                    <input  type="submit" class="btn-primary btn btn-xs" name="View" value="View" />

                                                                </h6>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>

                                            </div>
                                            <!-- eND items -->
                                        </div>
<?php } ?> 
                                </div>






                            </div>
                            <!--Chat Tab-->
                            <div class="tab-pane in" id="chat">
                                <div class="profile-header">UPS</div>


                                <div class="row" style="padding-top:15px">
                                    <div class="col-md-5 bootstrap-grid"> 
                                    </div>
                                    <div class="col-md-3 bootstrap-grid"> 
                                        <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-success btn-xs" style="" onclick="check_checkedbox();">Print Csv </button>        

                                        <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-warning btn-xs" style="" onclick="check_checkedbox1();">Print Pdf </button>        
                                    </div>

<?php foreach ($companies_ups as $company_ups) { ?>

                                        <div class="col-md-9 bootstrap-grid"> 

                                            <div id="items" class="items-view-list items-switcher" style="background-color: #F1F1F1;">
                                                <form action="<?php echo base_url(); ?>admin/accounts/rate_sheet/<?php echo $company_ups->company_id; ?>/<?php echo $company_ups->category_id; ?>" method="post" id="followers<?php echo $company->company_id; ?><?php echo $company->category_id; ?>" enctype="multipart/form-data" >
                                                    <ul>
                                                        <li>
                                                            <div class="items-inner clearfix">
                                                                <h6 class="">
                                                                    <?php
                                                                    echo $company_ups->name . ' ' . $company_ups->category_name;
//                                                                echo ' &nbsp; &nbsp;';
                                                                    ?>


                                                                    <input type="checkbox"  name="company" id="company" class="check_csv" company_id="<?php echo $company_ups->company_id; ?>" category_id="<?php echo $company_ups->category_id; ?>"/> &nbsp; &nbsp;
                                                                    <b>>></b>&nbsp; &nbsp;
                                                                    <select>
                                                                        <option >
                                                                            % Margin
                                                                        </option>
                                                                    </select>&nbsp; &nbsp;
                                                                    <input type="text"  name="margin_change" style="width: 30px;" value="<?php echo $employees[0]->base_rate; ?>"/>    %   
                                                                    &nbsp;
                                                                    <!--<a href="" >View</a>-->
                                                                    <input  type="submit" class="btn-primary btn btn-xs" name="View" value="View" />

                                                                </h6>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>

                                            </div>
                                            <!-- eND items -->
                                        </div>
<?php } ?> 
                                </div>




                            </div>
                        </div>

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
<!--</form>-->
<!-- /Widgets Row End Grid--> 
</div>
<!-- / Content Wrapper --> 
