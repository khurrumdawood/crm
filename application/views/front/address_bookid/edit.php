<script src="<?php echo base_url() ?>js/jquery.js"></script>
<script>

    function get_sender_state(country_id) {
        $.ajax({
            type: 'GET',
            data: {'id': 'sender_state', 'name': 'state'},
            url: "<?php echo base_url(); ?>front/comp_accounts/get_state/" + country_id,
            dataType: 'text',
            success: function (data)
            {
                $('#sender_state').replaceWith(data);
                loader_close();
            },
            error: function (xhr, textStatus, errorThrown) {
                loader_close();
            }
        });

    }

    function get_sender_city(state_id) {
        $.ajax({
            type: 'GET',
            data: {'id': 'sender_city', 'name': 'city'},
            url: "<?php echo base_url(); ?>front/comp_accounts/get_city/" + state_id,
            dataType: 'text',
            success: function (data)
            {
                $('#sender_city').replaceWith(data);
                loader_close();
            },
            error: function (xhr, textStatus, errorThrown) {
                loader_close();
            }
        });
    }

    $(document).ready(function () {

        $('body').change(function (event)
        {
            if ($(event.target).is('#sender_country')) {
                chk = event.target;
                country_id = $(chk).val();
                $.ajax({
                    type: 'GET',
                    data: {},
                    url: "<?php echo base_url(); ?>front/comp_accounts/set_sender_zone_country/" + country_id,
                    dataType: 'text',
                    success: function (data)
                    {
                        $('#zone_country').replaceWith(data);
                        loader_close();
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        loader_close();
                    }
                });
                get_sender_state(country_id);
            }

            if ($(event.target).is('#sender_state')) {
                chk = event.target;
                state_id = $(chk).val();
                get_sender_city(state_id);
            }


        });
    });
</script>        
<div class="page-header">
    <style>
        h4 :after{
            content: "|";

        }
        .no-displays {
            display: none;   
        }
        .displays {
            display: block;   
        }
    </style>

    <h1>            </h1>
</div>

<!-- Widget Row Start grid -->
<form action="" method="post" id="comp-form" enctype="multipart/form-data" >
    <div class="row" id="powerwidgets">

        <div class="col-md-11 bootstrap-grid">

            <!-- New widget -->

            <div class="powerwidget " id="checkout-form-validation-widget" data-widget-editbutton="false">
                <header>
                    <strong><h2> </h2> </strong>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <header> Please Provide Info</header>
                        <div style="color: red"> 
                        <?php
                            echo validation_errors();
                            if (isset($errors)) {
                                echo $errors;
                            }
                            ?>
                        </div>
                        <fieldset>


                            <div class="row">
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-navicon"></i>
                                        <input type="text" name="company" placeholder="Company" value="<?php echo $address_bookid_data[0]->company; ?>"  >
                                    </label>
                                </section>

                            </div>
                            
                            
                            
                            <div class="row">
                                <section class="col col-6">

                                    <label class="select">
                                        <!--<input type="text" name="country" placeholder="Country" value="<?php // echo $address_bookid_data[0]->country; ?>"  >-->
                                        <?php echo countryDropdown('country', 'sender_country', $address_bookid_data[0]->country , '', 'Select Country'); ?>
                                        <i></i>
                                    </label>
                                </section>

                            </div>
                            
                            <div class="row">
                                <section class="col col-6">

                                    <label class="select">
                                        <!--<input type="text" name="state" placeholder="State/Province" value="<?php // echo $address_bookid_data[0]->state; ?>"  >-->
                                        <?php echo stateDropdown($address_bookid_data[0]->country,"state","sender_state",$address_bookid_data[0]->state); ?>
                                        <i></i>
                                    </label>
                                </section>

                            </div>

                            <div class="row">
                                <section class="col col-6">

                                    <label class="select">
                                        <!--<input type="text" name="city" placeholder="City" value="<?php echo $address_bookid_data[0]->city; ?>"  >-->
                                        <?php echo cityDropdown($address_bookid_data[0]->state,"city","sender_city",$address_bookid_data[0]->city); ?>
                                        <i></i>
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-navicon"></i>
                                        <input type="text" name="postal_code" placeholder="Postal Code" value="<?php echo $address_bookid_data[0]->postal_code; ?>"  >
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-navicon"></i>
                                        <input type="text" name="address" placeholder="Address" value="<?php echo $address_bookid_data[0]->address; ?>"  >
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-navicon"></i>
                                        <input type="text" name="address2" placeholder="Address2" value="<?php echo $address_bookid_data[0]->address2; ?>"  >
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-navicon"></i>
                                        <input type="text" name="phone" placeholder="Phone" value="<?php echo $address_bookid_data[0]->phone; ?>"  >
                                    </label>
                                </section>

                            </div>


                    </div>
                    </fieldset>
                    <div  class="cus_sub_btn">
                        <footer>
                            <!--<button type="submit" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">SAVE</button>-->
                            <button type="submit" class="btn btn-default" style="">Save</button>
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

