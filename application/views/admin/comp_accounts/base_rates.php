        
<div class="page-header">
    <style>
        h4 :after{
            content: "|";

        }
        .btn-primary:hover{
            background: #3071a9 !important;
        }
    </style>
    <h1><?php echo (isset($page_text)) ? $page_text:''; ?></h1>

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
            <div class="row" style="padding-top:15px">
                <div class="col-md-3 bootstrap-grid"> 
                    <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-success btn-xs" style="" onclick="check_checkedbox();">Print Csv </button>        

                    <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-warning btn-xs" style="" onclick="check_checkedbox1();">Print Pdf </button>        
                </div>
            </div>

            <div class="inner-spacer">
                <div class="user-profile-info">
                    <div class="tabs-white">
                        <ul id="myTab" class="nav nav-tabs nav-justified purple" >
                            <li class="active"><a href="#home" data-toggle="tab">General</a></li>
                            <?php
                            foreach ($companies as $company) {
                                ?>
                                <li><a href="#courier_<?php echo $company->id; ?>" data-toggle="tab"><?php echo $company->name; ?></a></li>
                            <?php } ?>
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
                                                        ?>" value="" name="margin" id="margin" style="width:37px; float: right;"/>
                                                    </label>
  <!--                                    <p style="margin-right:64px; text-align: right; font-weight: bold;">Minimum Customer Base Charge Margin </p>-->

                                                    <div style="float: right; margin-right: -69px; margin-top: -4px; font-size: xx-large;">%</div>
                                                </section>

                                            </div>
                                        </fieldset>

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

                            <?php
                            $comp_companies = $companies;
                            foreach ($comp_companies as $comp_company) {
                                ?>

                                <div class="tab-pane" id="courier_<?php echo $comp_company->id; ?>">
                                    <div class="profile-header"><?php echo $comp_company->name; ?>

                                    </div>


                                    <div class="row" style="padding-top:15px">
                                        <div class="col-md-5 bootstrap-grid"> 
                                        </div>
                                        <!--                                        <div class="col-md-3 bootstrap-grid"> 
                                                                                    <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-success btn-xs" style="" onclick="check_checkedbox();">Print Csv </button>        
                                        
                                                                                    <button type="submit" name="Print" value="Print Checked Rate Sheet" class="btn btn-warning btn-xs" style="" onclick="check_checkedbox1();">Print Pdf </button>        
                                                                                </div>-->
                                        <?php
                                        $companies = $this->web->get_data('', 'category', array('client_company_id' => $client_id, 'company_id' => $comp_company->parent_id));

                                        foreach ($companies as $company) {
                                            ?>

                                            <div class="col-md-9 bootstrap-grid"> 

                                                <div id="items" class="items-view-list items-switcher" style="background-color: #F1F1F1;">
                                                    <form action="<?php echo base_url(); ?>admin/comp_accounts/rate_sheet/<?php echo $company->company_id; ?>/<?php echo $company->parent_id; ?>/<?php echo $company->id; ?>" method="post" id="followers<?php echo $company->company_id; ?><?php echo $company->id; ?>" enctype="multipart/form-data" >
                                                        <ul>
                                                            <li>
                                                                <div class="items-inner clearfix">
                                                                    <h6 class="">
                                                                        <?php
                                                                        echo $company->category_name;
//                                                                echo ' &nbsp; &nbsp;';
                                                                        ?>


                                                                        <input type="checkbox"  name="company" id="company" class="check_csv" company_id="<?php echo $company->company_id; ?>" category_id="<?php echo $company->parent_id; ?>" category_child_id="<?php echo $company->id; ?>"  /> &nbsp; &nbsp;
                                                                        <b>>></b>&nbsp; &nbsp;
                                                                        <select>
                                                                            <option >
                                                                                % Margin
                                                                            </option>
                                                                        </select>&nbsp; &nbsp;
                                                                        <?php if(!isset($customer_rates)||(isset($customer_rates) && empty($customer_rates))){ ?>
                                                                            <input type="text"  name="margin_change" style="width: 30px;" value="<?php echo $employees[0]->base_rate; ?>"/>    %   
                                                                        <?php }else{
                                                                                $percentage_margin = search_array_and_return_value($customer_rates, 'category_id', $company->id, 'percentage_margin');
                                                                            ?>
                                                                            
                                                                            <input type="text"  name="margin_change" style="width: 30px;" value="<?php echo $percentage_margin; ?>"/>    %   
                                                                        <?php } ?>
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

                            <?php } ?>


                        </div>

                    </div>
                </div>



                <div  class="cus_sub_btn" style='margin-top: 10px;'>
                    <footer>
                        <button type="reset" class="btn btn-default" style="float:right;">Reset</button>
                        <button type="button" onclick='check_checkedbox2()' class="btn btn-default" style="float:right; margin-right: 20px;">SAVE</button>
                    </footer>
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
        window.location = '<?php echo base_url(); ?>admin/comp_accounts/print_csv?' + url;
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
        window.location = '<?php echo base_url(); ?>admin/comp_accounts/pdf?' + url;
    }

    function check_checkedbox2() {
        
        min_base_margin = $('#margin').val();

        url = 'min_base_margin='+min_base_margin;
        $(".check_csv").each(function () {

                if (url != '')
                    url += '&';
                company_id = $(this).attr('company_id');
                parent_id = $(this).attr('category_id');
                category_id = $(this).attr('category_child_id');
                margin_change = $(this).next().next().next().val();
                url = url + 'company_id[]=' + company_id + '&parent_id[]=' + parent_id 
                        + '&margin_change[]=' + margin_change+
                        '&category_id[]=' + category_id;
//                alert(parent_id);
//                                                    alert(url);
        });
//                                            alert(url);
        window.location = '<?php echo base_url(); ?>admin/comp_accounts/save_customer_base_rates/<?php echo $customer_id ?>?' + url;
    }

</script>
