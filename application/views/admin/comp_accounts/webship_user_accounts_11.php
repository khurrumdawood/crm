<div id="contactdiv">
            <form class="form" action="#" id="contact">
                <img src="button_cancel.png" class="img" id="cancel"/>
                <h3>User Details</h3>
                <label>Alternate User: <span>*</span></label>
                <input type="text" id="names" placeholder=""/>
                <label>Password: <span>*</span></label>
                <input type="password" id="passwordd" placeholder=""/>
                <label>Key: <span>*</span></label>
                <input type="text" id="key" placeholder=""/>
                <label>Security Code: <span>*</span></label>
                <input type="text" id="security" placeholder=""/>
                <label>Meter Number: <span>*</span></label>
                <input type="text" id="meter" placeholder=""/>
                <section class="col col-6" style="width:50%;">
                <div class="inline-group">
                    <label class="checkbox">
                        <input type="checkbox" name="ups" id="ups" value="ups" style="margin-top: -5px; margin-left: 9px;">
                        <i></i>
                        UPS:
                    </label>
                </div>
                </section>
                <input type="text" id="uk_mail_1" placeholder="" readonly=""/>
                <section class="col col-6" style="width:50%;">
                <div class="inline-group">
                    <label class="checkbox">
                        <input type="checkbox" name="uk_mail" id="uk_mail" value="uk_mail" style="margin-top: -5px; margin-left: 9px;">
                        <i></i>
                        UK Mail:
                    </label>
                </div>
                </section>
                <input type="text" id="ups_1" placeholder="" readonly=""/>
                <!--<label>Message:</label>
                <textarea id="message" placeholder="Message......."></textarea>-->
                <input type="button" id="send" value="Send"/>
                <input type="button" id="cancel" value="Cancel"/>
                <br/>
            </form>
        </div>        


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        
        <link rel="stylesheet" href="css/jquery_popup.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>orb-plugins/css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>orb-plugins/css/bootstrap.min.css" />
        <script src="jquery_popup.js"></script>
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
<form action="" method="post" id="add_contact-form" enctype="multipart/form-data" >
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
                        <h5> Webship Account Settings:</h5>
                        
                        
               <div id="mainform">
            <div class="form" id="popup">

                <p id="onclick">Popup</p>
            </div>
        </div>

        
                        <div style="color: red">
                            <?php
                            echo validation_errors();
                            if (isset($errors)) {
                                echo $errors;
                            }
                            ?>

                        </div>


                        <div class="row">
                            <section class="col col-3">
                                <label class="checkbox"> 
                                    <input type="checkbox" name="functions" checked="" placeholder="Admin Functions" >
                                    <i></i>
                                    Admin Functions
                                </label>
                            </section>

                        </div>

                        <h5 style="padding-bottom:5px;">Webship Admin Settings:
                        </h5>


                        <div class="row">
                            <section class="col col-3">
                                <label class="select">
                                    <?php echo countryDropdown('admin', 'admin', '', '', 'Admin Name', ' data-placeholder="Admin Name" '); ?>
                                    <i></i> </label>
                            </section>
                        </div>                        

                    </div>
                    
<!--<div class="row" id="powerwidgets">
    
    <div class="col-md-12 bootstrap-grid"> 

        <div class="powerwidget" id="datatable-filter-column" data-widget-editbutton="false">

            <header>
                <strong><h2>Table</h2> </strong>
            </header>-->
                    
            <table class="display table table-striped table-hover" id="table-2" style="padding-top: 6px;">
                  <thead>
                    <tr>
                      <th>Game Name</th>
                      <th>Publisher</th>
                      <th>Platform</th>
                      <th>Genre</th>
                      <th>Sales</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Sengoku Basara 4</td>
                      <td>Capcom</td>
                      <td>PS3</td>
                      <td> Action</td>
                      <td>169732</td>
                    </tr>
                    <tr>
                      <td>Pokemon X/Y</td>
                      <td>Nintendo</td>
                      <td>3DS</td>
                      <td>Role Playing</td>
                      <td>70245</td>
                    </tr>
                    <tr>
                      <td>Minecraft</td>
                      <td>Microsoft Game Studios</td>
                      <td>XBOX360</td>
                      <td>Adventure</td>
                      <td>68514</td>
                    </tr>
                    <tr>
                      <td>Grand Theft Auto V</td>
                      <td>Take-Two Interactive</td>
                      <td>PS3</td>
                      <td>Action</td>
                      <td>68065</td>
                    </tr>
                    <tr>
                      <td>Dragon Ball Z: Battle of Z</td>
                      <td>Namco Bandai Games</td>
                      <td>PS3</td>
                      <td>Fighting</td>
                      <td>66189</td>
                    </tr>
                    <tr>
                      <td>Call of Duty: Ghosts</td>
                      <td>Activision</td>
                      <td>PS3</td>
                      <td>Shooter</td>
                      <td>62188</td>
                    </tr>
                    <tr>
                      <td>Call of Duty: Ghosts</td>
                      <td>Activision</td>
                      <td>XBOX360</td>
                      <td>Shooter</td>
                      <td>65731</td>
                    </tr>
                    <tr>
                      <td>Kirby: Triple Deluxe</td>
                      <td>Nintendo</td>
                      <td>3DS</td>
                      <td>Platform</td>
                      <td>59980</td>
                    </tr>
                    <tr>
                      <td>FIFA Soccer 14</td>
                      <td>Electronic Arts</td>
                      <td>PS3</td>
                      <td>Sport</td>
                      <td>51385</td>
                    </tr>
                    <tr>
                      <td>Gran Turismo 6 </td>
                      <td>Sony Computer Entertainment America</td>
                      <td>PS3</td>
                      <td>Racing</td>
                      <td>42422</td>
                    </tr>
                    <tr>
                      <td>Killzone: Shadow Fall</td>
                      <td>Sony Computer Entertainment</td>
                      <td>PS4</td>
                      <td>Action</td>
                      <td>38497</td>
                    </tr>
                    <tr>
                      <td>Battlefield 4 </td>
                      <td>Electronic Arts</td>
                      <td>PS4</td>
                      <td>Shooter</td>
                      <td>38428</td>
                    </tr>
                    <tr>
                      <td>Saints Row IV</td>
                      <td>Deep Silver</td>
                      <td>PS3</td>
                      <td>Action</td>
                      <td>38410</td>
                    </tr>
                    <tr>
                      <td>Super Mario 3D World</td>
                      <td>Nintendo</td>
                      <td>WiiU</td>
                      <td>Platform</td>
                      <td>37100</td>
                    </tr>
                    <tr>
                      <td>Assassin's Creed IV: Black Flag</td>
                      <td>Ubisoft</td>
                      <td>PS4</td>
                      <td>Action</td>
                      <td>35063</td>
                    </tr>
                    <tr>
                      <td>The Legend of Zelda: A Link Between Worlds</td>
                      <td>Nintendo</td>
                      <td>3DS</td>
                      <td>Action</td>
                      <td>31944</td>
                    </tr>
                    <tr>
                      <td>Puzzle &amp; Dragons Z</td>
                      <td>GungHo</td>
                      <td>3DS</td>
                      <td>Puzzle</td>
                      <td>31230</td>
                    </tr>
                    <tr>
                      <td>Animal Crossing: New Leaf</td>
                      <td>Nintendo</td>
                      <td>3DS</td>
                      <td>Action</td>
                      <td>27059</td>
                    </tr>
                    <tr>
                      <td>Just Dance 2014</td>
                      <td>Ubisoft</td>
                      <td>Wii</td>
                      <td>Dance</td>
                      <td>26612</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th><input type="text" name="filter_game_name" placeholder="Filter Game Name" class="search_init" /></th>
                      <th><input type="text" name="filter_publisher" placeholder="Filter Publisher" class="search_init" /></th>
                      <th><input type="text" name="filter_platform" placeholder="Filter Platform" class="search_init" /></th>
                      <th><input type="text" name="filter_genre" placeholder="Filter Genre" class="search_init" /></th>
                      <th><inpubt type="text" name="filter_sales" placeholder="Filter Sales" class="search_init" /></th>
                    </tr>
                  </tfoot>
                    </table>
                <!--</div></div></div>-->

                    <div  class="cus_sub_btn">
                        <footer>
                            <!--<button type="submit" class="btn btn-default" style="float: right; margin-top: 1%;margin-right: 3%;">SAVE</button>-->

                            <!--<a href="javascript:void(0)" class="btn btn-default" id="onclick" >Add User</a>-->
                            <a href="javascript:void(0)" type="button" class="btn btn-default" >Edit User</a>
                            <!--<button type="submit" class="btn btn-default" style="">Add</button>-->
                        </footer>
                        
                    </div>
                <!-- /Pop us Html --> 
                
                
                        <!-- /Pop us Html --> 

                        <script>
            $(document).ready(function() {
                //setTimeout(popup, 3000);
                //function popup() {
                //$("#logindiv").css("display", "block");
                //}
                //$("#login #cancel").click(function() {
                //$(this).parent().parent().hide();
                //});
                $("#onclick").click(function() {
                    $("#contactdiv").css("display", "block");
                    $("#contactdiv").css("z-index", "1000");
                });
                $("#contact #cancel").click(function() {
                    $(this).parent().parent().hide();
                });
                // Contact form popup send-button click event.
                $("#send").click(function() {
                    var names = $("#names").val();
                    var passwordd = $("#passwordd").val();
                    var key = $("#key").val();
                    var security = $("#security").val();
                    if (names == "" || passwordd == "" || key == "" || security == "") {
                        alert("Please Fill All Fields");
                    } else {
//                        if (validateEmail(email)) {
//                            $("#contactdiv").css("display", "none");
//                        }
//                        else {
//                            alert('Invalid Email Address');
//                        }
//                        function validateEmail(email) {
//                            var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
//                            if (filter.test(email)) {
//                                return true;
//                            } else {
//                                return false;
//                            }
//                        }
return true;
                    }
                });
                // Login form popup login-button click event.
                $("#loginbtn").click(function() {
                    var name = $("#username").val();
                    var password = $("#password").val();
                    if (username == "" || password == "") {
                        alert("Username or Password was Wrong");
                    } else {
                        $("#logindiv").css("display", "none");
                    }
                });
            });
        </script>
        <style>


            @import url(http://fonts.googleapis.com/css?family=Fauna+One|Muli);
            #mainform{
                width:960px;
                margin:20px auto;
                padding-top:20px;
                font-family: 'Fauna One', serif;
                display:block;
            }
            h2{
                margin-left: 65px;
                text-shadow:1px 0px 3px gray;
            }
            h3{
                font-size:18px;
                text-align:center;
                text-shadow:1px 0px 3px gray;
            }
            #onclick{
                padding:3px;
                color:green;
                cursor:pointer;
                padding:5px 5px 5px 15px;
                width:70px;
                color:white;
                background-color:#123456;
                box-shadow:1px 1px 5px grey;
                border-radius:3px;
            }
            b{
                font-size:18px;
                text-shadow:1px 0px 3px gray;
            }
            #popup{
                padding-top:80px;
            }
            .form{
                border-radius:2px;
                padding:20px 30px;
                box-shadow:0 0 15px;
                font-size:14px;
                font-weight:bold;
                width:350px;
                margin:20px 250px 0 35px;
                float:left;
            }
            input{
                width:100% !important ; 
                height:35px;
                margin-top:5px;
                border:1px solid #999;
                border-radius:3px;
                padding:5px;
            }
            input[type=button]{
                background-color:#123456;
                border:1px solid white;
                font-family: 'Fauna One', serif;
                font-Weight:bold;
                font-size:18px;
                color:white;
                width:49%;
            }
            textarea{
                width:100%;
                height:80px;
                margin-top:5px;
                border-radius:3px;
                padding:5px;
                resize:none;
            }
            #contactdiv{
                opacity:0.92;
                position: absolute;
                top: 0px;
                left: 0px;
                height: 100%;
                width: 100%;
                background: #000;
                display: none;
            }
            #logindiv{
                opacity:0.92;
                position: absolute;
                top: 0px;
                left: 0px;
                height: 100%;
                width: 100%;
                background: #000;
                display: none;
            }

            #login,#contact{
                width:350px;
                margin:0px;
                background-color:white;
                font-family: 'Fauna One', serif;
                position: relative;
                border: 5px solid rgb(90, 158, 181);
            }
            .img{
                float: right;
                margin-top: -35px;
                margin-right: -37px;
            }
            #contact{
                left: 50%;
                top: 50%;
                margin-left:-210px;
                margin-top:-255px;
            }
            #login{
                left: 50%;
                top: 50%;
                margin-left:-210px;
                margin-top:-158px;
            }


        </style>
                
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
