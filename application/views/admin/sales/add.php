
      
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
                <h2>Customer Details
                
                </h2>
              </header>
              <div class="inner-spacer">
                  <div action="" id="checkout-form" class="orb-form">
                    <header> Please Provide Info</header>
                    <div style="color: red"><?php echo validation_errors(); ?> </div>
                  <fieldset>
                    <div class="row">
                      <section class="col col-11">
                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                            <input type="text" name="fname" placeholder="Name*">
                        </label>
                      </section>
<!--                      <section class="col col-11">
                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                          <input type="text" name="lname" placeholder="Last name">
                        </label>
                      </section>-->
                    </div>
                    <div class="row">
                        <section class="col col-11">
                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                          <input type="tel" name="phone" placeholder="Phone">
                        </label>
                      </section>
                      <section class="col col-11">
                        <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                          <input type="email" name="email" placeholder="E-mail">
                        </label>
                      </section>
                    </div>
                  </fieldset>
                  <fieldset>
                      <?php // Add View page  ?>
<script src="<?php echo base_url() ?>js/jquery.js"></script>
<script>

    function get_a_state(country_id) {
        $.ajax({
            type: 'GET',
            data: {'id': 'state_a', 'name': 'state_a'},
            url: "<?php echo base_url(); ?>admin/admin_countries/get_state/" + country_id,
            dataType: 'text',
            success: function (data)
            {
                $('#state_a').replaceWith(data);
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
            data: {'id': 'city_a', 'name': 'city_a'},
            url: "<?php echo base_url(); ?>admin/admin_countries/get_city/" + state_id,
            dataType: 'text',
            success: function (data)
            {
                $('#city_a').replaceWith(data);
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
            if ($(event.target).is('#country_a')) {
                chk = event.target;
                country_id = $(chk).val();
                
                get_a_state(country_id);
            }

            if ($(event.target).is('#state_a')) {
                chk = event.target;
                state_id = $(chk).val();
                get_a_city(state_id);
            }


        });
    });
</script>

<div class="row">
    <section class="col col-5">

        <label class="select">
            <?php echo countryDropdown('country_a', 'country_a', '', '', 'Select Country'); ?>
            <i></i>
        </label>
    </section>

    <section class="col col-4">

        <label class="select">
            <select id="state_a" name="state_a">
                <option value="">Select State</option>
            </select><i></i>
        </label>
    </section>
 <section class="col col-3">

        <label class="select">
            <select id="city_a" name="city_a">
                <option value="">Select City</option>
            </select>
            <i></i>
        </label>
    </section>
</div>



<?php //END Add View page END ?>
                      
                      
                      
                      
                    <div class="row">
<!--                        <section class="col col-5">
                        <label class="select">
                          <?php 
//                          echo countryDropdown('country_a','country_a','','', 'Select Country' ,' data-placeholder="Select Country" '); ?>
                          <i></i> </label>
                      </section>-->
<!--                      <section class="col col-5">
                        <label class="select">
                          <?php 
//                          echo countryDropdown('country','country','','', 'Select Country' ,' data-placeholder="Select Country" '); ?>
                          <i></i> </label>
                      </section>-->
<!--                      <section class="col col-4">
                        <label class="input">
                          <input type="text" name="city" placeholder="City*">
                        </label>
                      </section>-->
                      <section class="col col-3">
                        <label class="input">
                          <input type="text" name="code" placeholder="Post code">
                        </label>
                      </section>
                    </div>
<!--                    <section>
                      <label for="file" class="input">
                        <input type="text" name="address" placeholder="Address">
                      </label>
                    </section>-->
                    <section>
                      <label class="textarea">
                        <textarea rows="1" name="address" placeholder="Address*"></textarea>
                      </label>
                    </section>
                  </fieldset>
<!--                  <fieldset>
                    <section>
                      <div class="inline-group">
                        <label class="radio">
                          <input type="radio" name="radio-inline" checked>
                          <i></i>Visa</label>
                        <label class="radio">
                          <input type="radio" name="radio-inline">
                          <i></i>MasterCard</label>
                        <label class="radio">
                          <input type="radio" name="radio-inline">
                          <i></i>PayPal</label>
                      </div>
                    </section>
                    <section>
                      <label class="input">
                        <input type="text" name="name" placeholder="Name on card">
                      </label>
                    </section>
                    <div class="row">
                      <section class="col col-10">
                        <label class="input">
                          <input type="text" name="card" id="card" placeholder="Card number">
                        </label>
                      </section>
                      <section class="col col-2">
                        <label class="input">
                          <input type="text" name="cvv" id="cvv" placeholder="CVV2">
                        </label>
                      </section>
                    </div>
                    <div class="row">
                      <label class="label col col-4">Expiration date</label>
                      <section class="col col-5">
                        <label class="select">
                          <select name="month">
                            <option value="0" selected disabled>Month</option>
                            <option value="1">January</option>
                            <option value="1">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                          </select>
                          <i></i> </label>
                      </section>
                      <section class="col col-3">
                        <label class="input">
                          <input type="text" name="year" id="year" placeholder="Year">
                        </label>
                      </section>
                    </div>
                  </fieldset>-->
<script>
    $( document ).ready(function() {
        billing_check();
    });
    function billing_check(){
        bill_check = $('#bill_check').is(":checked");
        if(bill_check){
            $('.cus_sub_btn').html('<footer><button type="submit" class="btn btn-default">Submit</button></footer>');
            $('.bil_sub_btn').html('');
        }else{
            $('.cus_sub_btn').html('');
            $('.bil_sub_btn').html('<footer><button type="submit" class="btn btn-default">Submit</button></footer>');
            


        }
                   
    }
</script>
                  <fieldset>
                    <section>
                      <div class="row">
                        <div class="col col-4">
                          <label class="checkbox">
                            <input type="checkbox" id="bill_check" name="checkbox" checked onclick="billing_check()">
                            <i></i>Same Billing Address</label>
                        </div>
                      </div>
                    </section>
                  </fieldset>
<div  class="cus_sub_btn">
                  <footer>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </footer>
</div>
                </div>
              </div>
            </div>
            <!-- /End Widget --> 
            
            <!-- New widget -->
            
           
            <!-- /End Widget --> 
          </div>
          <div class="col-md-6 bootstrap-grid"> 
            
            <!-- New widget -->
            
            <div class="powerwidget " id="registration-form-validation-widget" data-widget-editbutton="false">
              <header>
                <h2>Billing Address
                </h2>
              </header>
              <div class="inner-spacer">
                <div id="registration-form" class="orb-form">
<header> Billing Detail</header>

 <fieldset>
                           <?php // Add View page  ?>
<!--<script src="<?php echo base_url() ?>js/jquery.js"></script>-->
<script>

    function get_b_state(country_id) {
        $.ajax({
            type: 'GET',
            data: {'id': 'b_state', 'name': 'b_state'},
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
            data: {'id': 'b_city', 'name': 'b_city'},
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
    <section class="col col-8">

        <label class="select">
            <?php echo countryDropdown('b_country', 'b_country', '', '', 'Select Country'); ?>
            <i></i>
        </label>
    </section>

</div>
<div class="row">
    <section class="col col-8">

        <label class="select">
            <select id="b_state" name="b_state">
                <option value="">Select State</option>
            </select><i></i>
        </label>
    </section>
</div>
<div class="row">
    <section class="col col-8">

        <label class="select">
            <select id="b_city" name="b_city">
                <option value="">Select City</option>
            </select>
            <i></i>
        </label>
    </section>

</div>


<?php //END Add View page END ?>
                      
                      
                    <div class="row">
<!--                      <section class="col col-8">
                        <label class="select">
                          <?php 
//                          echo countryDropdown('b_country','b_country','','', 'Select Country' ,' data-placeholder="Select Country" '); ?>
                          <i></i> </label>
                      </section>
                      <section class="col col-8">
                        <label class="input">
                          <input type="text" name="b_city" placeholder="City">
                        </label>
                      </section>-->
                      <section class="col col-8">
                        <label class="input">
                          <input type="text" name="b_code" placeholder="Post code">
                        </label>
                      </section>
                    </div>
<!--                    <section>
                      <label for="file" class="input">
                        <input type="text" name="address" placeholder="Address">
                      </label>
                    </section>-->
     <section>
                      <label class="textarea">
                        <textarea rows="1" name="b_address" placeholder="b_Address"></textarea>
                      </label>
                    </section>

                  </fieldset>

<div class="bil_sub_btn">
<!--                  <footer>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </footer>-->
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
