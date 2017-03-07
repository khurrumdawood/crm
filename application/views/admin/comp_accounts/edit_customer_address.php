        
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

    <h1><?php echo (isset($page_text)) ? $page_text : ''; ?>
        <?php if (isset($back_button)) { ?>
            <a style="float: right;" href="<?php echo $back_button['url']; ?>" <?php echo isset($back_button['onclick']) ? 'onclick="' . $back_button['onclick'] . '"' : ''; ?> style="margin-bottom: 10px;" class="btn btn-default"><?php echo $back_button['btn_title']; ?></a>
        <?php } ?>
    </h1>
</div>

<!-- Widget Row Start grid -->
<form action="" method="post" id="add_customer-form" enctype="multipart/form-data" >
    <div class="row" id="powerwidgets">

        <div class="col-md-12 bootstrap-grid"> 

            <!-- New widget -->
            <div class="powerwidget cold-grey" id="available-validations-methods" data-widget-editbutton="false">
            </div>
            <!-- /End Widget --> 

        </div>

        <!-- /Inner Row Col-md-12 -->
        <div class="col-md-4 bootstrap-grid">

            <!-- New widget -->

            <div class="powerwidget" id="checkout-form-validation-widget" data-widget-editbutton="false">
                <header>
                    <h2>Address
                    </h2>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <!--<header> Please Provide Info</header>-->
                        <div style="color: red"><?php echo validation_errors(); ?> </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_customer_name" placeholder="Customer Name" value="<?php echo $customer[0]->a_customer_name; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_contact_name" placeholder="Contact Name" value="<?php echo $customer[0]->a_contact_name; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_contact_title" placeholder="Contact Title" value="<?php echo $customer[0]->a_contact_title; ?>">
                                </label>
                            </section>

                        </div>

<?php //Edit View Page ?>
<script src="<?php echo base_url() ?>js/jquery.js"></script>
<script>

    function get_a_state(country_id) {
        $.ajax({
            type: 'GET',
            data: {'id': 'a_state', 'name': 'state'},
            url: "<?php echo base_url(); ?>admin/admin_countries/get_state/" + country_id,
            dataType: 'text',
            success: function (data)
            {
                $('#a_state').replaceWith(data);
                loader_close();
            },
            error: function (xhr, textStatus, errorThrown) {
                loader_close();
            }
        });

    }

    function get_a_city(state_id) {
        $.ajax({
            type: 'GET',
            data: {'id': 'a_city', 'name': 'city'},
            url: "<?php echo base_url(); ?>admin/admin_countries/get_city/" + state_id,
            dataType: 'text',
            success: function (data)
            {
                $('#a_city').replaceWith(data);
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
            if ($(event.target).is('#a_country')) {
                chk = event.target;
                country_id = $(chk).val();
//                $.ajax({
//                    type: 'GET',
//                    data: {},
//                    url: "<?php echo base_url(); ?>front/comp_accounts/set_a_zone_country/" + country_id,
//                    dataType: 'text',
//                    success: function (data)
//                    {
//                        $('#zone_country').replaceWith(data);
//                        loader_close();
//                    },
//                    error: function (xhr, textStatus, errorThrown) {
//                        loader_close();
//                    }
//                });
                get_a_state(country_id);
            }

            if ($(event.target).is('#a_state')) {
                chk = event.target;
                state_id = $(chk).val();
                get_a_city(state_id);
            }


        });
    });
</script>     

<div class="row">
    <section class="col col-11">

        <label class="select">
            <?php echo countryDropdown('country', 'a_country',$customer[0]->a_country, '', 'Select Country'); ?>
            <i></i>
        </label>
    </section>

</div>

<div class="row">
    <section class="col col-11">

        <label class="select">
            <?php echo stateDropdown($customer[0]->a_country, "state", "a_state", $customer[0]->a_state); ?>
            <i></i>
        </label>
    </section>

</div>

<div class="row">
    <section class="col col-11">

        <label class="select">
            <?php echo cityDropdown($customer[0]->a_state, "city", "a_city", $customer[0]->city); ?>
            <i></i>
        </label>
    </section>

</div>


<?php
//END Edit View Page ?>                        
                        
                        
                        
                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_address" placeholder="Address" value="<?php echo $customer[0]->a_address; ?>">
                                </label>
                            </section>

                        </div>


                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_address_2" placeholder="Address 2" value="<?php echo $customer[0]->a_address_2; ?>">
                                </label>
                            </section>

                        </div>

<!--                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_city" placeholder="City" value="<?php echo $customer[0]->a_city; ?>">
                                </label>
                            </section>

                        </div>-->



<!--                        <div class="row">
                            <section class="col col-11">
                                <label class="select">
                                    <?php // echo countryDropdown('a_country', 'a_country', $customer[0]->a_country, '', 'Country', ' data-placeholder="Country" '); ?>
                                    <i></i> </label>
                            </section>

                        </div>-->

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_postal_code" placeholder="Postal Code" value="<?php echo $customer[0]->a_postal_code; ?>">
                                </label>
                            </section>

                        </div>


<!--                        <div class="row">
                            <section class="col col-11">
                                <label class="select">
                                    <?php // echo countryDropdown('a_country_2', 'a_country_2', $customer[0]->a_country_2, '', 'Country', ' data-placeholder="Country" '); ?>
                                    <i></i> </label>
                            </section>

                        </div>-->

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_phone" placeholder="Phone" value="<?php echo $customer[0]->a_phone; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_fax" placeholder="Fax" value="<?php echo $customer[0]->a_fax; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_email" placeholder="Email" value="<?php echo $customer[0]->a_email; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_mobile" placeholder="Mobile" value="<?php echo $customer[0]->a_mobile; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="a_alt_contact_phone" placeholder="Alt Contact Phone" value="<?php echo $customer[0]->a_alt_contact_phone; ?>">
                                </label>
                            </section>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                check_bill_address();
            });
            function check_bill_address()
            {
                if ($('#b_same_a').is(":checked"))
                {
                    $('.billings input[type=text]').attr('disabled', 'disabled');
                    $('.billings select').attr('disabled', 'disabled');
                    $('.billings input[type=text]').parent().addClass('state-disabled');
                    $('.billings select').parent().addClass('state-disabled');
                } else {
                    $('.billings input[type=text]').removeAttr('disabled');
                    $('.billings select').removeAttr('disabled');
                    $('.billings input[type=text]').parent().removeClass('state-disabled');
                    $('.billings select').parent().removeClass('state-disabled');
                }
            }
        </script>

        <!-- /Inner Row Col-md-12 -->
        <div class="col-md-4 bootstrap-grid billings">

            <!-- New widget -->

            <div class="powerwidget" id="checkout-form-validation-widget" data-widget-editbutton="false">
                <header>
                    <h2>Billing Address
                    </h2>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <!--<header> Please Provide Info</header>-->
                        <div style="color: red"><?php echo validation_errors(); ?> </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="checkbox">
                                    <input type="checkbox"  onclick="check_bill_address()" placeholder="Same as customer address" name="b_same_a" id="b_same_a"
                                    <?php if ($customer[0]->b_same_a == 1) echo "checked"; ?>
                                           >
                                    <i></i>
                                    Same as customer address
                                </label>
                            </section>
                        </div>
                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_customer_name" placeholder="Customer Name" value="<?php echo $customer[0]->b_customer_name; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_contact_name" placeholder="Contact Name" value="<?php echo $customer[0]->b_contact_name; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_contact_title" placeholder="Contact Title" value="<?php echo $customer[0]->b_contact_title; ?>">
                                </label>
                            </section>

                        </div>
<?php //Edit View Page ?>
<!--<script src="<?php echo base_url() ?>js/jquery.js"></script>-->
<script>

    function get_b_state(country_id) {
        $.ajax({
            type: 'GET',
            data: {'id': 'b_state', 'name': 'state'},
            url: "<?php echo base_url(); ?>admin/admin_countries/get_state/" + country_id,
            dataType: 'text',
            success: function (data)
            {
                $('#b_state').replaceWith(data);
                loader_close();
            },
            error: function (xhr, textStatus, errorThrown) {
                loader_close();
            }
        });

    }

    function get_b_city(state_id) {
        $.ajax({
            type: 'GET',
            data: {'id': 'b_city', 'name': 'city'},
            url: "<?php echo base_url(); ?>admin/admin_countries/get_city/" + state_id,
            dataType: 'text',
            success: function (data)
            {
                $('#b_city').replaceWith(data);
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
            if ($(event.target).is('#b_country')) {
                chk = event.target;
                country_id = $(chk).val();
//                $.ajax({
//                    type: 'GET',
//                    data: {},
//                    url: "<?php echo base_url(); ?>front/comp_accounts/set_b_zone_country/" + country_id,
//                    dataType: 'text',
//                    success: function (data)
//                    {
//                        $('#zone_country').replaceWith(data);
//                        loader_close();
//                    },
//                    error: function (xhr, textStatus, errorThrown) {
//                        loader_close();
//                    }
//                });
                get_b_state(country_id);
            }

            if ($(event.target).is('#b_state')) {
                chk = event.target;
                state_id = $(chk).val();
                get_b_city(state_id);
            }


        });
    });
</script>     

<div class="row">
    <section class="col col-11">

        <label class="select">
            <?php echo countryDropdown('country', 'b_country', $customer[0]->b_country, '', 'Select Country'); ?>
            <i></i>
        </label>
    </section>

</div>

<div class="row">
    <section class="col col-11">

        <label class="select">
            <?php echo stateDropdown($customer[0]->b_country, "state", "b_state",$customer[0]->b_state); ?>
            <i></i>
        </label>
    </section>

</div>

<div class="row">
    <section class="col col-11">

        <label class="select">
            <?php echo cityDropdown($customer[0]->b_state, "city", "b_city", $customer[0]->b_city); ?>
            <i></i>
        </label>
    </section>

</div>


<?php
//END Edit View Page ?>
                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_address" placeholder="Address" value="<?php echo $customer[0]->b_address; ?>">
                                </label>
                            </section>

                        </div>


                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_address_2" placeholder="Address 2" value="<?php echo $customer[0]->b_address_2; ?>">
                                </label>
                            </section>

                        </div>

<!--                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_city" placeholder="City" value="<?php // echo $customer[0]->b_city; ?>">
                                </label>
                            </section>

                        </div>



                        <div class="row">
                            <section class="col col-11">
                                <label class="select">
                                    <?php // echo countryDropdown('b_country', 'b_country', $customer[0]->b_country, '', 'Country', ' data-placeholder="Country" '); ?>
                                    <i></i> </label>
                            </section>

                        </div>-->

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_postal_code" placeholder="Postal Code" value="<?php echo $customer[0]->b_postal_code; ?>">
                                </label>
                            </section>

                        </div>


<!--                        <div class="row">
                            <section class="col col-11">
                                <label class="select">
                                    <?php // echo countryDropdown('b_country_2', 'b_country_2', $customer[0]->b_country_2, '', 'Country', ' data-placeholder="Country" '); ?>
                                    <i></i> </label>
                            </section>

                        </div>-->

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_phone" placeholder="Phone" value="<?php echo $customer[0]->b_phone; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_fax" placeholder="Fax" value="<?php echo $customer[0]->b_fax; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_email" placeholder="Email" value="<?php echo $customer[0]->b_email; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_mobile" placeholder="Mobile" value="<?php echo $customer[0]->b_mobile; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="b_alt_contact_phone" placeholder="Alt Contact Phone" value="<?php echo $customer[0]->b_alt_contact_phone; ?>">
                                </label>
                            </section>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- /Inner Row Col-md-12 -->
        <div class="col-md-4 bootstrap-grid">

            <!-- New widget -->

            <div class="powerwidget" id="checkout-form-validation-widget" data-widget-editbutton="false">
                <header>
                    <h2>Other Contacts
                    </h2>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <!--<header> Please Provide Info</header>-->
                        <div style="color: red"><?php echo validation_errors(); ?> </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="o_owner" placeholder="Owner" value="<?php echo $customer[0]->o_owner; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="o_phone" placeholder="Phone" value="<?php echo $customer[0]->o_phone; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="o_ap_contact" placeholder="AP Contact" value="<?php echo $customer[0]->o_ap_contact; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="o_phone_2" placeholder="Phone" value="<?php echo $customer[0]->o_phone_2; ?>">
                                </label>
                            </section>

                        </div>


                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="o_other_contact" placeholder="Other Contact" value="<?php echo $customer[0]->o_other_contact; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="o_other_phone" placeholder="Other Phone" value="<?php echo $customer[0]->o_other_phone; ?>">
                                </label>
                            </section>

                        </div>


                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="o_other_2_contact" placeholder="Other 2 Contact" value="<?php echo $customer[0]->o_other_2_contact; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="row">
                            <section class="col col-11">
                                <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                    <input type="text" name="o_other_2_phone" placeholder="Other 2 Phone" value="<?php echo $customer[0]->o_other_2_phone; ?>">
                                </label>
                            </section>

                        </div>

                        <div class="bil_sub_btn">
                            <footer>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </footer>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- /Inner Row Col-md-6 --> 

    </div>
</form>
<!-- /Widgets Row End Grid--> 
</div>
<!-- / Content Wrapper --> 
