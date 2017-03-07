        
<div class="page-header">
    <style>
        h4 :after{
            content: "|";

        }
    </style>

    <h1><?php echo (isset($page_text)) ? $page_text : ''; ?>
        <?php if (isset($back_button)) { ?>
            <a style="float: right;" href="<?php echo $back_button['url']; ?>" <?php echo isset($back_button['onclick']) ? 'onclick="' . $back_button['onclick'] . '"' : ''; ?> style="margin-bottom: 10px;" class="btn btn-default"><?php echo $back_button['btn_title']; ?></a>
        <?php } ?>
    </h1>
</div>
<script src="<?php echo base_url() ?>js/jquery.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!--<script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>

</script>

  
<script>
    


//    $(".phone_mask").on("blur", function() {
//        
//    });
    
    
    
    function commercial_invoice()
    {
        val = $('#commercial_invoice').val();
        if(val=='Help me generate a commercial invoice'){
            $('.help_comer').show();
        }else{
            $('.help_comer').hide();
        }
    }
    
    
    function collection_option()
    {
        val = $('#collection_option').val();
        if(val=='I need help to schedule a collection'){
            $('.help_schedule').show();
        }else{
            $('.help_schedule').hide();
        }
    }
    
    function set_field_height()
    {
        $("li").each(function(){
                aria_check = $(this).attr('aria-selected');
                if(aria_check == 'true'){
                    anc = $(this).children().first();
                    field_id = $(anc).attr('aria-controls');
                    height = $('#'+field_id).height();
                    $('.content').css('min-height',height+20);
//                    alert($('#wizard-p-0').height());
//                    alert($(this).attr('class'));
                }
            });
    }
    
    
    
    function get_sender_state(country_id){
        $.ajax({
            type: 'GET',
            data: {'id':'sender_state','name':'sender_state'},
            url: "<?php echo base_url(); ?>front/comp_accounts/get_state/"+country_id,
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
    
    function get_sender_city(state_id){
        $.ajax({
            type: 'GET',
            data: {'id':'sender_city','name':'sender_city'},
            url: "<?php echo base_url(); ?>front/comp_accounts/get_city/"+state_id,
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
    
    function get_receiver_state(country_id){
        $.ajax({
            type: 'GET',
            data: {'id':'receiver_state','name':'receiver_state'},
            url: "<?php echo base_url(); ?>front/comp_accounts/get_state/"+country_id,
            dataType: 'text',
            success: function (data)
            {
                $('#receiver_state').replaceWith(data);
                loader_close();
            },
            error: function (xhr, textStatus, errorThrown) {
                loader_close();
            }
        });
    }
    
    function get_receiver_city(state_id){
        $.ajax({
            type: 'GET',
            data: {id:'receiver_city',name:'receiver_city'},
            url: "<?php echo base_url(); ?>front/comp_accounts/get_city/"+state_id,
            dataType: 'text',
            success: function (data)
            {
                $('#receiver_city').replaceWith(data);
                loader_close();
            },
            error: function (xhr, textStatus, errorThrown) {
                loader_close();
            }
        });
    }
    
    
    $(document).ready(function () {
    
    
        
    
        commercial_invoice();
        collection_option();
        set_field_height();
        
        
        
        
        $('body').change(function (event)
        {
            if ($(event.target).is('#datepicker')) {
                $('#submit_date').val($('#datepicker').val());
            }
            if ($(event.target).is('#datepicker1')) {
                $('#ready_date').val($('#datepicker1').val());
            }
            if ($(event.target).is('#service')) {
                chk = event.target;
                carrier_id = $(chk).val();
                $.ajax({
                    type: 'POST',
                    data: {'carrier_id': carrier_id},
                    url: "<?php echo base_url(); ?>front/comp_accounts/get_carrier_category",
                    dataType: 'text',
                    success: function (data)
                    {
                        $('#carrier').replaceWith(data);
                        loader_close();
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        loader_close();
                    }
                });
//                $.ajax({
//                    type: 'POST',
//                    data: {'carrier_id': carrier_id},
//                    url: "<?php echo base_url(); ?>front/comp_accounts/get_carrier_package",
//                    dataType: 'text',
//                    success: function (data)
//                    {
//                        $('#package').replaceWith(data);
//                        loader_close();
//                    },
//                    error: function (xhr, textStatus, errorThrown) {
//                        loader_close();
//                    }
//                });
            }
            
            if ($(event.target).is('#zone_country')) {
                chk = event.target;
                carrier_id = $(chk).val();
                $.ajax({
                    type: 'POST',
                    data: {'carrier_id': carrier_id},
                    url: "<?php echo base_url(); ?>front/comp_accounts/get_carrier_package",
                    dataType: 'text',
                    success: function (data)
                    {
                        $('#package').replaceWith(data);
                        loader_close();
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        loader_close();
                    }
                });
            }
            
            if ($(event.target).is('#sender_country')) {
                chk = event.target;
                country_id = $(chk).val();
                $.ajax({
                    type: 'GET',
                    data: {},
                    url: "<?php echo base_url(); ?>front/comp_accounts/set_sender_zone_country/"+country_id,
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
            

            if ($(event.target).is('#receiver_country')) {
                chk = event.target;
                country_id = $(chk).val();
                $.ajax({
                    type: 'GET',
                    data: {},
                    url: "<?php echo base_url(); ?>front/comp_accounts/set_receiver_zone_country/"+country_id,
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
                
                get_receiver_state(country_id);
                

            }
            
            if ($(event.target).is('#receiver_state')) {
                chk = event.target;
                state_id = $(chk).val();
                get_receiver_city(state_id);
            }
            

            
            if ($(event.target).is('#commercial_invoice')) {
                commercial_invoice();
            }

            if ($(event.target).is('#collection_option')) {
                collection_option();
            }
            


        });
        $('body').focusout(function (event)
        {
//            if ($(event.target).is('a')) {
//                alert('asdf');
//            }
//            $('#submit_date').val($('#datepicker').val());
            if ($(event.target).is('.custom_value')) {
                chk = event.target;
                total_custom = 0;
                $(".custom_value").each(function(){
                    total_custom -= $(this).val();
                });
                total_custom = total_custom*-1;
                $('#total_customes_values').val(total_custom);
//                alert(total_custom);
            }
            if ($(event.target).is('.ship_quantity')||$(event.target).is('.ship_unit_value')) {
                chk = event.target;
                
                if($(event.target).is('.ship_quantity')){
                    ship_quantity = $(chk).val();

                    ship_unit_value = $(chk).parent().parent().next().children().first().children().first().val();
//                    alert(ship_unit_value);
                    total_value = ship_quantity * ship_unit_value;
                    $(chk).parent().parent().next().next().children().first().children().first().html(total_value);
                }
                if($(event.target).is('.ship_unit_value')){
                    ship_quantity = $(chk).parent().parent().prev().children().first().children().first().val();
                    ship_unit_value = $(chk).val();
                    total_value = ship_quantity * ship_unit_value;
                    $(chk).parent().parent().next().children().first().children().first().html(total_value);
                }
//                total_custom = 0;
                ship_value = [];
                ship_quantitys = [];
                i=0;
                $(".ship_unit_value").each(function(){
                    ship_value[i] = $(this).val();
                    i++;
                });
                i=0;
                $(".ship_quantity").each(function(){
                    ship_quantitys[i] = $(this).val();
                    i++;
                });
                total_value = 0;
                for (i = 0; i < ship_value.length; i++) 
                {
                    total = ship_value[i]*ship_quantitys[i];
                    total_value = total_value +total;
                }
                $('#total_unit_value').html(total_value);
                $('#total_unit_value').next().val(total_value);
                
            }



        });
    });
</script>

<script>
    $(document).ready(function () {

        var inputs = 1;
        var inputs1 = 1;

        $('body').click(function (event)
        {
            if ($(event.target).is('.addPieceBtnAdd')) {
//                alert('asdf');
                thi = event.target;
                input_class = $(thi).attr('AddPiece_INPUT_CLASS');
                source_class = $(thi).attr('AddPiece_SOURCE_CLASS');
//                alert(input_class);
                $('.' + input_class + '_del:disabled').removeAttr('disabled');
                var c = $('.' + source_class + ':first').clone(true);
                c.show();
                c.removeClass(source_class);
                c.addClass(input_class);
                $('.' + input_class + ':last').after(c);
            }


            if ($(event.target).is('.addPieceBtnDel')) {
//                alert('asdf');
                thi = event.target;
                input_class = $(thi).attr('AddPiece_INPUT_CLASS');
                if (confirm('continue delete?')) {
                    --inputs;
                    $(thi).closest('.' + input_class).remove();
                    $('.' + input_class + '_del').attr('disabled', ($('.' + input_class).length < 2));
                }
            }


            if ($(event.target).is('.goodsBtnAdd')) {
//                alert('asdf');
                thi = event.target;
                input_class = $(thi).attr('Goods_INPUT_CLASS');
                source_class = $(thi).attr('Goods_SOURCE_CLASS');
                $('.' + input_class + '_del:disabled').removeAttr('disabled');
                var c = $('.' + source_class + ':first').clone(true);
//                    console.log(source_class);
                c.show();
                c.removeClass(source_class);
                c.addClass(input_class);
                $('.' + input_class + ':last').after(c);
            }


            if ($(event.target).is('.goodsBtnDel')) {
//                alert('asdf');
                thi = event.target;
                input_class = $(thi).attr('Goods_INPUT_CLASS');
                if (confirm('continue delete?')) {
                    --inputs1;
                    $(thi).closest('.' + input_class).remove();
                    $('.' + input_class + '_del').attr('disabled', ($('.' + input_class).length < 2));
                }

            }
            
            
            set_field_height();

        });



    });
$(window).load(function(){
    set_field_height();
    
<?php 
    $add_company_name = '';
    $add_address = '';
    $add_address2 = '';
    $add_city = 0;
    $add_state = 0;
    $add_postal_code = '';
    $add_country = 0;
    $add_phone = '';
    
    if(isset($address_book_data))
    {
        $add_company_name = $address_book_data[0]->company;
        $add_address = $address_book_data[0]->address;
        $add_address2 = $address_book_data[0]->address2;
        $add_city = $address_book_data[0]->city;
        $add_state = $address_book_data[0]->state;
        $add_postal_code = $address_book_data[0]->postal_code;
        $add_country = $address_book_data[0]->country;
        $add_phone = $address_book_data[0]->phone;
        echo 'go_next();go_next();';
    }
?>
}); 
$(function() {
    $( "#datepicker" ).datepicker();
  });
$(function() {
    $( "#datepicker1" ).datepicker();
  });
</script>










<!--<div class="smooth-overflow">-->
<!--MainWrapper-->
<!--<div class="main-wrap">--> 
<!--<div class="content-wrapper">--> 
<!-- Widget Row Start grid -->
<div class="row" id="powerwidgets">
    <div class="col-md-12 bootstrap-grid"> 
        <!-- New widget -->
        <div class="powerwidget green" id="form-wizard" data-widget-editbutton="false" style="height: 100%">
            <header>
                <h2>Shipment Information</h2>
            </header>
            <div class="inner-spacer">
                <!--<form action="<?php echo base_url(); ?>front/comp_accounts/add_customer/" method="post" id="steps-wizard" class="orb-form">-->
                <form action="" method="post" id="steps-wizard" class="orb-form">
                    <div id="wizard">


                                
                        
          


                        <h1>Sender Info</h1>
                        <fieldset class="step-1" >
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="sender_company" placeholder="Company">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                        <input type="tel" id='phone' value='<?php echo $customer_datas[0]->phone; ?>'  name="sender_phone" placeholder="Phone">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" value='<?php echo $customer_datas[0]->name; ?>' name="sender_contact_name" placeholder="Contact Name">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                        <input type="email" value='<?php echo $customer_datas[0]->email; ?>' name="sender_email" placeholder="E-mail">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="select"> 
                                    <?php echo countryDropdown('sender_country', 'sender_country', $customer_datas[0]->country_id, '', 'Country'); ?>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="select"> 
                                        <select id="sender_state" name="sender_state">
                                            <option value="">Select State</option>
                                        </select>
                                        <i></i>
                                        <!--<input type="text" name="fname" placeholder="Province">-->
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select id="sender_city" name="sender_city">
                                            <option value="">Select City</option>
                                        </select>
                                        <i></i>
                                        <!--<input type="text" value='<?php echo $customer_datas[0]->a_city; ?>' name="fname" placeholder="City">-->
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" value='<?php echo $customer_datas[0]->postal_code; ?>' name="sender_postal_code" placeholder="Postal">
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="textarea">
                                        <textarea name="sender_address" placeholder="Address"><?php echo $customer_datas[0]->a_address; ?></textarea>
                                    </label>
<!--                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text"  value='<?php echo $customer_datas[0]->a_address; ?>' name="sender_address" placeholder="Address">
                                    </label>-->
                                </section>
                                <section class="col col-6">
                                      <label class="textarea">
                                        <textarea name="sender_address2" placeholder="Address2"><?php echo $customer_datas[0]->a_address_2; ?></textarea>
                                      </label>
<!--                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text"  value='<?php echo $customer_datas[0]->a_address_2; ?>' name="sender_address2" placeholder="Address2">
                                    </label>-->
                                </section>                        
                            </div>
                        </fieldset>
                        <h1>Recipient Info</h1>
                        <fieldset class="step-2">
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" value="<?php echo $add_company_name; ?>" name="receiver_company" placeholder="Company">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                        <input type="tel" value="<?php echo $add_phone; ?>" name="receiver_phone" placeholder="Phone">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="receiver_contact_name" placeholder="Contact Name">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                        <input type="email" name="receiver_receiver_email" placeholder="E-mail">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-3">
                                    <label class="select"> 
                                        <?php echo countryDropdown('receiver_country', 'receiver_country', $add_country, '', 'Country'); ?>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="select" id="div_states_1"> 
                                        <?php echo stateDropdown($add_country,"receiver_state","receiver_state",$add_state); ?>
<!--                                        <select id="receiver_state" name="receiver_state">
                                            <option value="">Select State</option>
                                        </select>-->
                                        <i></i>
                                        <!--<input type="text" name="province" placeholder="Province">-->
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <?php echo cityDropdown($add_state,"receiver_city","receiver_city",$add_city); ?>
<!--                                        <select id="receiver_city" name="receiver_city">
                                            <option value="">Select City</option>
                                        </select>-->
                                        <i></i>
                                        <!--<input type="text" name="city" placeholder="City">-->
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" value="<?php echo $add_postal_code; ?>" name="receiver_postal_code" placeholder="Postal">
                                    </label>
                                </section>

                            </div>


                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text"  value="<?php echo $add_address; ?>" name="receiver_address" placeholder="Address">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="checkbox">
                                        <input type="checkbox" name="receiver_is_address">
                                        <i></i>Check me!</label>
                                </section>                        
                            </div>

                            <div class="row">

                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" value="<?php echo $add_address2; ?>" name="receiver_address2" placeholder="Address2">
                                    </label>
                                </section>                        
                                <section class="col col-6">
                                    <label class="checkbox">
                                        <input type="checkbox" name="receiver_is_address2">
                                        <i></i>Check me!</label>
                                </section>                            
                            </div>

                        </fieldset>
                        
                        <h1>Shipment Details</h1>
                        <fieldset class="step-3">
                            
                            <div class="row">
                                <section>
                                    <label class="input">
                                        <i class="icon-prepend fa fa-calendar"></i>
                                        <input type="text" name="ship_submit_date" readonly="" onclick="shu()" onblur="date_out()" id="submit_date" placeholder="Submit Date">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
<!--                                <section class="col col-3">
                                    <label class="select"> 
                                        <?php // echo carrierDropdown('service', 'service'); ?>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="select"> 
                                        <?php // echo carrierCategoryDropdown('', 'carrier', 'carrier'); ?>
                                        <i></i>
                                    </label>
                                </section>-->

                                <section class="col col-6">
                                    <label class="select"> 
                                        <?php echo zoneCountryDropdown('', 'ship_zone_country', 'zone_country'); ?>
                                        <i></i>
                                    </label>
                                </section>

                                <section class="col col-6">
                                    <label class="select"> 
                                        <?php echo carrierPackageDropdown('', 'ship_package', 'package'); ?>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                    
                            <div class="row">
                                <label class="label col col-4">  Contents   </label>
                            </div>
                            <div class="row">
                                <section>
                                    <div class="inline-group">
                                        <label class="radio">
                                            <input type="radio" value="documents" name="ship_contact" checked>
                                            <i></i>Documents</label>
                                        <label class="radio">
                                            <input type="radio" value="products/commodities" name="ship_contact">
                                            <i></i>Products/Commodities</label>
                                    </div>
                                </section>
                            </div>
                            <div class="row">
                                <label class="label col col-2">  WEIGHT UNIT  </label>
                                <label class="label col col-2">Dimensions UNIT  </label>
                                <label class="label col col-3">  Currency UNIT </label>
                            </div>   
                            <div class="row">
                                <section class="col col-2">
                                    <label class="select">
                                        <select name="ship_weight_unit">
                                            <option value="kg" selected >KG</option>
                                            <option value="gram">Gram</option>
                                            <option value="pound">Pound</option>
                                            <option value="milligram">Milligram</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="select">
                                        <select name="ship_length_unit">
                                            <option value="0" selected >CM</option>
                                            <option value="1">M</option>
                                            <option value="1">MM</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>

                                <section class="col col-3">
                                    <label class="select">
                                        <select name="currency">
                                            <option value="british_pounds" selected >British Pounds</option>
                                            <option value="canadian_dollor">Canadian Dollar</option>
                                            <option value="aed">United Arab Emirates Dirham</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <label class="label col col-4">  WEIGHT   </label>
                                <label class="label col col-4">Dimensions  </label>
                                <label class="label col col-4">  Custom Value </label>
                            </div>












                            <div class="row addPieceHtml"  style="display: none">

                                <section class="col col-3">
                                    <label class="input">
                                        <input type="text" name="weight[]" id="weight" placeholder="weight(Kgs)">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="input">
                                        <input type="text" name="length[]" id="length" placeholder="Length">
                                    </label>
                                </section>
                                <section class="col col-1">
                                    <label class="input">
                                        <input type="text" name="width[]" id="width" placeholder="Width">
                                    </label>
                                </section>
                                <section class="col col-1">
                                    <label class="input">
                                        <input type="text" name="height[]" id="height" placeholder="Height">
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="input">
                                        <input type="text" name="custom[]" class="custom_value" id="custom" placeholder="Custom Value">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="">
                                        <input type="button" class="btn btn-primary addPieceBtnDel addPieceInput_del" value="Delete" AddPiece_INPUT_CLASS="addPieceInput" disabled="disabled" />
                                    </label>
                                </section>
                            </div>

                            <div class="row addPieceInput">
                                <section class="col col-3">
                                    <label class="input">
                                        <input type="text" name="weight[]" id="weight" placeholder="weight(Kgs)">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="input">
                                        <input type="text" name="length[]" id="length" placeholder="Length">
                                    </label>
                                </section>
                                <section class="col col-1">
                                    <label class="input">
                                        <input type="text" name="width[]" id="width" placeholder="Width">
                                    </label>
                                </section>
                                <section class="col col-1">
                                    <label class="input">
                                        <input type="text" name="height[]" id="height" placeholder="Height">
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="input">
                                        <input type="text" name="custom[]" class="custom_value" id="custom" placeholder="Custom Value">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="">
                                        <input type="button" class="btn btn-primary addPieceBtnDel addPieceInput_del" value="Delete" AddPiece_INPUT_CLASS="addPieceInput"  />
                                    </label>
                                </section>
                            </div>


                            <div class="row">
                                <button type="button" class="btn btn-primary addPieceBtnAdd" name="add_piece" AddPiece_INPUT_CLASS="addPieceInput" AddPiece_SOURCE_CLASS="addPieceHtml">Add Piece</button>
                            </div>

                            <div class="row">
                                <label class="checkbox">
                                    <input type="checkbox" name="insurance">
                                    <i></i>Insurance</label>
                            </div>
                            <!--                      <div class="row">
                                                    <label class="label col col-4">Expiration date</label>
                                                  </div>-->
                        </fieldset>

                   <h1>Ship</h1>
                        <fieldset class="step-4" >
                            <div class="row">
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="content_description" placeholder="Content Description">
                                    </label>
                                </section>

                                <section class="col col-1">
                                    <label class="checkbox">
                                        <input type="checkbox" name="content_is_desc">
                                        <i></i>Save</label>
                                </section>  
                            </div>
                            <div class="row">

                                <section class="col col-3">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="shipment_reference" placeholder="Shipment Reference">
                                    </label>
                                </section>

                                <section class="col col-1">
                                    <label class="checkbox">
                                        <input type="checkbox" name="shipment_is_ref">
                                        <i></i>Save</label>
                                </section>    
                            </div>
                            <div class="row">

                                <section class="col col-3">
                                    <label class="input"> <i class="icon-prepend fa fa-bar-chart-o"></i>
                                        <input type="text" id="total_customes_values" name="total_customes_values" placeholder="Total Customs values">
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="select"> 
                                        <select id="commercial_invoice" name="commercial_invoice">
                                            <option value="" selected disabled>Commercial Invoice</option>
                                            <option value="I don't need a commercial invoice">I don't need a commercial invoice</option>
                                            <option value="I already have a commercial invoice">I already have a commercial invoice</option>
                                            <option value="Help me generate a commercial invoice">Help me generate a commercial invoice</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <div class="row help_comer">

                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                        <input type="receiver_tax" name="receiver_tax" placeholder="Receiver Tax Id/VAT">
                                    </label>
                                </section>
                            </div>
                            <div class="row help_comer">
                                <section class="col col-6">
                                    <label class="select"> 
                                        <select name="terms_of_trade">
                                            <option value="0" selected disabled>Terms Of Trade</option>
                                            <option value="244">DAP - deliver at place</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                            </div>
                            <div class="row help_comer">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="reasons_for_export" placeholder="Reasons for Export">
                                    </label>
                                </section>
                            </div>



                            <div class="row goodsHtml" style="display: none;" >

                                <section class="col col-2">
                                    <label class="input"> 
                                        <input type="text" name="goods_for_description[]" placeholder="Goods for description">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="input"> 
                                        <input type="text" name="hts[]" placeholder="HTS#/B#">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="select">
                                        <?php echo countryDropdowns('country_of_origin[]', 'country_of_origin[]', '', '', 'Country Of Origin'); ?>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-1">
                                    <label class="input"> 
                                        <input type="text" class="ship_quantity" name="qty[]" placeholder="Qty">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="input"> 
                                        <input type="text" class="ship_unit_value" name="unit_value[]" placeholder="Unit value">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="input">
                                        Sub Total:   <p class="sub_total_unit_value" style="font-weight:normal">0</p>  
                                    </label>
                                </section>
                                <section class="col col-1">
                                    <label class=""> 
                                        <input type="button" class="button red goodsBtnDel goodsInput_del" value="Delete" Goods_INPUT_CLASS="goodsInput" disabled="disabled" />
                                    </label>
                                </section>
                            </div>

                            <div class="row goodsInput" style="" class="">

                                <section class="col col-2">
                                    <label class="input"> 
                                        <input type="text" name="goods_for_description[]" placeholder="Goods for description">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="input"> 
                                        <input type="text" name="hts[]" placeholder="HTS#/B#">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="select">
                                        <?php echo countryDropdowns('country_of_origin[]', 'country_of_origin[]', '', '', 'Country Of Origin'); ?>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-1">
                                    <label class="input"> 
                                        <input type="text" class="ship_quantity"  name="qty[]" placeholder="Qty">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="input"> 
                                        <input type="text" class="ship_unit_value" name="unit_value[]" placeholder="Unit value">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="input">
                                    Row Total:   <p class="sub_total_unit_value" style="font-weight:normal">0</p>                                 
                                    </label>
                                </section>
                                
                                <section class="col col-1">
                                    <label class=""> 
                                        <input type="button" disabled="" class="disabled button red goodsBtnDel goodsInput_del" value="Delete" Goods_INPUT_CLASS="goodsInput"  />
                                    </label>
                                </section>
                            </div>

                            <div class="row">
                                <section class="col col-9">
                                    <label class="">
                                        <label class="input">
                                        </label>
                                    </label>
                                </section>
                                <section class="col col-1">
                                    <label class=""> 
                                        Total:   <p id="total_unit_value" style="font-weight:normal">0</p>                                 
                                        <input type="hidden" name="grand_total" value="">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-3">
                                    <label class=""> 
                                        <input type="button" class="button red goodsBtnAdd" value="add another Item" Goods_INPUT_CLASS="goodsInput" Goods_SOURCE_CLASS="goodsHtml"/>
                                    </label>
                                </section>
                            </div>
                            
                            
                            <hr>
                            
                            
                            <h2 style="margin-top: 20px;">Billing Details</h2>

                            <div class="row">
                                <section class="col col-6">
                                    <label class="select"> 
                                        <select name="transport_charges">
                                            <option value="0" selected disabled>Transport Charges</option>
                                            <option value="244">Sender</option>
                                            <option value="1">Receiver</option>
                                            <option value="2">Third Party</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="account" placeholder="Account">
                                    </label>
                                </section>
                                                       
                            </div>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="select"> 
                                        <select name="duties">
                                            <option value="0" selected disabled>Duties/Taxes/Fees</option>
                                            <option value="1">Duties To Be Paid By Receiver</option>
                                            <option value="2">Duties To Be Paid By Sender</option>
                                            <option value="3">Duties To Be Paid By Third Party</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>

                            </div>
                            <div class="row">
                                <section class="col col-4">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="amount" placeholder="Amount">
                                    </label>
                                </section>
                                

                            </div>
                            <hr>
                            <h2 style="margin-top: 20px;">Collection Option</h2>
                            <div style="margin-top: 20px;" class="row">
                                <section class="col col-6">
                                    <label class="select"> 
                                        <select id="collection_option" name="collection_option">
                                            <option value="" selected disabled>Select a Collection Option</option>
                                            <option value="I need help to schedule a collection">I need help to schedule a collection</option>
                                            <option value="I already have a collection scheduled">I already have a collection scheduled</option>
                                            <option value="I will book my collection later">I will book my collection later</option>
                                            <option value="I have daily collection">I have daily collection</option>
                                            <option value="I am going to drop off my package(s)">I am going to drop off my package(s)</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>

                            </div>
                            <div  class="row help_schedule">
                                <section class="col col-6">
                                <!--<label class="label">Select single date</label>-->
                                <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                                    <input type="text" readonly="" name="dates" onclick="shu1()" onblur="date_out1()"  id="ready_date" placeholder="Ready Date">
                                </label>
                              </section>

                            </div>
                            
                            <div  class="row help_schedule">
                                <section class="col col-6">
                                <!--<label class="label">Select single date</label>-->
                                <label class="select"> 
                                   <?php echo timeValue($name = 'ready_time', $id = 'ready_time', $class='', $check = '','Ready Time') ?>
                                    <i></i> 
                                </label>
                              </section>

                            </div>
                            
                            <div  class="row help_schedule">
                                <section class="col col-6">
                                <!--<label class="label">Select single date</label>-->
                                <label class="select"> 
                                   <?php echo timeValue($name = 'close_time', $id = 'close_time', $class='', $check = '','Close Time') ?>
                                    <i></i> 
                                </label>
                              </section>

                            </div>
                            
                            <div  class="row help_schedule">
                                <section class="col col-6">
                                <!--<label class="label">Select single date</label>-->
                                <label class="input"> <i class="icon-prepend fa fa-code"></i>
                                    <input type="text" name="location_code"  placeholder="Location Code">
                                </label>
                              </section>

                            </div>
                            
                            <div  class="row help_schedule">
                                <section class="col col-6">
                                <!--<label class="label">Select single date</label>-->
                                <label class="input"> <i class="icon-prepend fa fa-text-width"></i>
                                    <input type="text" name="location_description" placeholder="Location Description">
                                </label>
                              </section>

                            </div>

                            
                            
                        </fieldset>

           
                                      
         
                        
                               

                        <!--<h1>Step 4</h1>-->
                        <!--                    <fieldset>
                                              <section>
                                                <label class="textarea">
                                                  <textarea rows="3" name="info" placeholder="Additional info"></textarea>
                                                </label>
                                              </section>
                                              <label class="checkbox">
                                                <input type="checkbox" name="checkbox">
                                                <i></i>Check me!</label>
                                            </fieldset>-->
                    </div>
                </form>
            </div>
        </div>
        <!-- End .powerwidget --> 

    </div>
    <!-- /Inner Row Col-md-12 --> 
<!--    <input type="text" name="submit_date" id="datepickers" placeholder="Submit Date">-->
     
</div>

<script>
    function go_next()
    {
//        i=0;
        $('li a').each(function (){
            href = $(this).attr('href');
//            console.log(href);
            if(href=='#next')
            {
                role = $(this).attr('role');
                if(role=='menuitem')
                {
//                    alert('asd');
//                    $(this).html( "click" );
                    $(this).trigger( "click" );
                }
            }
//            console.log(i);
//            i++;
        });
//        $( "#foo" ).trigger( "click" );
    }
</script>
<!--<input type="button" onclick="go_next()" value="test"/>-->


<!--<div class="row">
                                <section>
                                    <label class="input">
                                        <i class="icon-prepend fa fa-calendar"></i>
                                        <input type="text" name="submit_date" id="date_temp" placeholder="Submit Date"/>
                                        <script type="text/javascript" src="<?php echo base_url() ?>plugins/dpick/jquery.simple-dtpicker.js" ></script>
                                        <link type="text/css" href="<?php echo base_url() ?>plugins/dpick/jquery.simple-dtpicker.css" rel="stylesheet" />

                                        <script type="text/javascript">
                                            
                                            $(function(){
                                                    $('#date_temp').appendDtpicker({
                                                            "onShow": function(handler){
                                                                    window.alert('Picker is shown!');
                                                            },
                                                            "onHide": function(handler){
                                                                    window.alert('Picker is hidden!');
                                                            }
                                                    });
                                            });
                                        </script>
                                    </label>
                                </section>
                            </div>-->
    
<!-- /Widgets Row End Grid--> 
<!--      </div>-->
<!-- / Content Wrapper --> 
<!--</div>-->
<!--/MainWrapper--> 
<!--</div>-->

<div id="dp" style="display:none">
<input type="text" id="datepicker" />
<input type="text" id="datepicker1" />
</div>
<!--<p>Date:</p>
<button onclick="shu()">asdf</button>-->
<script>

function shu()
{
    $("#dp").show();
    $('#datepicker').trigger('focus');
    offset = $("#submit_date").offset();
    $("#dp").hide();
    $("#ui-datepicker-div").offset({ top: offset.top, left: offset.left});
//    $("#datepicker").clone().appendTo("#datepickership");
//    $("#datepickers").remove();
//    $(".rdate").remove();
//   $('#datepickers').replaceWith($('#datepicker').clone());
//   $('#datepicker').remove();
}
function shu1()
{
    $("#dp").show();
    $('#datepicker1').trigger('focus');
    offset = $("#ready_date").offset();
    $("#dp").hide();
    $("#ui-datepicker-div").offset({ top: offset.top, left: offset.left});
//    $("#datepicker").clone().appendTo("#datepickership");
//    $("#datepickers").remove();
//    $(".rdate").remove();
//   $('#datepickers').replaceWith($('#datepicker').clone());
//   $('#datepicker').remove();
}

function date_out()
{
    $('#datepicker').trigger('focusout');
}
function date_out1()
{
    $('#datepicker1').trigger('focusout');
}

</script>

  
  
  
