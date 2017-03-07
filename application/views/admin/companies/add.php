        
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

<script>
    var base_url = '<?php echo base_url(); ?>';
</script>
<script src="<?php echo base_url() . 'plugins/facebox/' ?>facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
<link href="<?php echo base_url() . 'plugins/facebox/' ?>facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url() . 'plugins/facebox/' ?>facefiles/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('a[rel*=facebox]').facebox();
    });
    function close_frame()
    {
        $('.close').trigger('click');
        $('.close_image').trigger('click');
//        alert('asdf');
        $.ajax({
            type: 'GET',
            data: {},
            url: base_url+"admin/companies/get_add_location/<?php echo $cachy_id ?>",
            dataType: 'text',
            success: function(data)
            {
                $('#map_location').val(data);
                loader_close();
            },
            error: function(xhr, textStatus, errorThrown){
                loader_close();
            }
        });
    }
    
</script>


<div id="mydiv" style="display:none">
    <?php 
        $map_data['url'] = base_url().'admin/companies/save_cachy_location';
        $map_data['company_id'] = $cachy_id;
        $url = http_build_query($map_data, '', '&amp;')
    ?>
    <iframe  style="width:600px;height:1000px" src="<?php echo base_url() . 'maps.php?'.$url ?>"></iframe>
</div>

<!-- Widget Row Start grid -->
<form action="" method="post" id="comp-form" enctype="multipart/form-data" >
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
                <header>
                    <strong><h2><?php echo (isset($table_text)) ? $table_text : ''; ?> </h2> </strong>
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
                                        <input type="text" name="title" placeholder="Title" value=""  >
                                    </label>
                                </section>
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-navicon"></i>
                                        <input type="text" name="owner_name" placeholder="Owner" value=""  >
                                    </label>
                                </section>
<!--                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                          <input type="text" name="status" placeholder="Status*">
                      </label>-->
                                <!--</section>-->

                            </div>

                            <div class="row">
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa entypo-mail"></i>
                                        <input type="text" name="email" placeholder="Email" value=""  >
                                    </label>
                                </section>
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-phone"></i>
                                        <input type="tel" name="tel" placeholder="Phone" value=""  >
                                    </label>
                                </section>

                            </div>

                            <div class="row">
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-fax"></i>
                                        <input type="text" name="fax" placeholder="fax" value=""  >
                                    </label>
                                </section>
                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa entypo-address"></i>
                                        <input type="text" name="address" placeholder="Address" value=""  >
                                    </label>
                                </section>

                            </div>
                            <?php // Add View page  ?>
<script src="<?php echo base_url() ?>js/jquery.js"></script>
<script>

    function get_c_state(country_id) {
        $.ajax({
            type: 'GET',
            data: {'id': 'state_c', 'name': 'state'},
            url: "<?php echo base_url(); ?>admin/admin_countries/get_state/" + country_id,
            dataType: 'text',
            success: function (data)
            {
                $('#state_c').replaceWith(data);
                loader_close();
            },
            error: function (xhr, textStatus, errorThrown) {
                loader_close();
            }
        });

    }

    function get_c_city(state_id) {
        $.ajax({
            type: 'GET',
            data: {'id': 'city_c', 'name': 'city'},
            url: "<?php echo base_url(); ?>admin/admin_countries/get_city/" + state_id,
            dataType: 'text',
            success: function (data)
            {
                $('#city_c').replaceWith(data);
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
            if ($(event.target).is('#country_c')) {
                chk = event.target;
                country_id = $(chk).val();
                
                get_c_state(country_id);
            }

            if ($(event.target).is('#state_c')) {
                chk = event.target;
                state_id = $(chk).val();
                get_c_city(state_id);
            }


        });
    });
</script>
<div class="row">
    <section class="col col-6">

        <label class="select">
            <?php echo countryDropdown('country', 'country_c', '', '', 'Select Country'); ?>
            <i></i>
        </label>
    </section>

</div>
<div class="row">
    <section class="col col-6">

        <label class="select">
            <select id="state_c" name="state">
                <option value="">Select State</option>
            </select><i></i>
        </label>
    </section>
</div>
<div class="row">
    <section class="col col-6">

        <label class="select">
            <select id="city_c" name="city">
                <option value="">Select City</option>
            </select>
            <i></i>
        </label>
    </section>
</div>
<?php //END Add View page END ?>


                            <!--<div class="row">-->
                                
<!--                                <section class="col col-6">

                                    <label class="input"><i class="icon-prepend fa fa-cit"></i>
                                        <input type="text" name="city" placeholder="city" value=""  >
                                    </label>
                                </section>
                                <section class="col col-6">

                                    <label class="select">
                                        <?php // echo countryDropdowns('country_c', 'country_c', '', '', 'Select Country', ' data-placeholder="Select Country" '); ?>
                                        <i></i>
                                    </label>
                                </section>-->

                            <!--</div>-->

                            <div class="row">
                                <section class="col col-6">
                                    <label class="textarea">
                                        <textarea rows="5" name="desc" placeholder="Description"></textarea>
                                    </label>
                                    <div style="clear:both"></div>
                                </section>
                                <section class="col col-6">
                                    <label class="input"><i class="icon-prepend fa fa-navicon"></i>
                                        <input type="text" name="margin" placeholder="Percentage Margin" value=""  >
                                    </label>
                                    <label class="input" style="margin-top: 10px;"><i class="icon-prepend fa fa-navicon"></i>
                                        <input type="text" readonly="" id="map_location" placeholder="Location" value=""  >
                                    </label>
                                    <label style="margin-top: 10px;" >
                                        <a class="btn btn-default" style="color:white" href="#mydiv" rel="facebox">Set Location of company.</a>
                                        <input type="hidden" name="cachy_id" value="<?php echo $cachy_id; ?>" />
                                    </label>
                                </section>
                            </div>


                            <script>
                                function comp_check_2() {
                                    var all_sel_2 = document.getElementById('all_sel_2').value;
//    alert(all_sel_2);
                                    if (all_sel_2) {
                                        $('#selected').show();
                                        document.getElementById("selected").className = "inner-spacer displays col-md-4";

                                    }

                                }
                                function comp_check_1() {
                                    var all_sel_1 = document.getElementById('all_sel_1').value;
//    alert(all_sel_1);
                                    if (all_sel_1) {
                                        $('#selected').hide();
                                        document.getElementById("selected").className = "inner-spacer no-displays";
                                    }

                                }
                            </script>


                            <div class="row">
                                <section class="col col-6">
                                    Select Couriers :
                                    <div class="inline-group">
                                        <label class="radio">
                                            <input type="radio" name="all_sel" id="all_sel_1" checked="" onclick="comp_check_1();" value="all">
                                            <i></i>
                                            All
                                        </label>
                                        <label class="radio">
                                            <input type="radio"  name="all_sel" id="all_sel_2" onclick="comp_check_2();" value="sel">
                                            <i></i>
                                            Only Selected
                                        </label>
                                        <div style="clear:both"></div>

                                </section>
                            </div>




                            <div class="row">
                                <div class="inner-spacer no-displays col-md-4" id="selected">

                                    <table class="display table table-striped table-hover" id="">

                                        <?php foreach ($companies as $comp) { ?>
                                            <thead><tr><th>
                                                        <!--<input type="checkbox"  name="comp_com[]" value="<?php echo $comp->id; ?>" />-->

                                                        <?php echo $comp->name; ?></th></tr></thead>
                                                        <?php
                                            $select = array('category.*', false);
                                            $eid = $this->session->userdata('user_id');
                                            $sub_comp = $this->web->get_data('', 'category', array('client_company_id' => 0, 'parent_id' => 0, 'company_id' => $comp->id), $select);
                                            foreach ($sub_comp as $sub_com) {
                                                ?>
                                                <tbody><tr><td>
                                                            <input type="checkbox"  name="comp_sub_com[]" value="<?php echo $sub_com->id; ?>" />            
                                                            <?php echo $sub_com->category_name; ?></td></tr></tbody>
                                                            <?php
                                            }
                                            ?>
                                        <?php } ?>



                                    </table>
                                </div>
                            </div>






                    </div>
                    </fieldset>
                    <div  class="cus_sub_btn">
                        <footer>
                            <!--<button type="submit" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">SAVE</button>-->
                            <button type="submit" class="btn btn-default" style="">Add</button>
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
