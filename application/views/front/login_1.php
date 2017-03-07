<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ORB | Locked</title>
<link href="<?php echo base_url() ?>orb-plugins/css/styles.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<script type="text/javascript" src="<?php echo base_url() ?>orb-plugins/js/vendors/horisontal/modernizr.custom.js"></script>
</head>

<body>
<div class="colorful-page-wrapper">
  <!--<div class="center-block">-->
  <div class="col-md-3" style="margin-top: 6%;">
    <div class="lock-block">
        <form action="<?php echo base_url(); ?>front/login/auth" id="login-form" class="orb-form" method="post">
        <header>
<!--          <div class="image-block"><img src="http://placehold.it/150x150" alt="User" /></div>-->
          Login 
          <!--<small>Unclock Screen &#8212; Type Your Password</small>-->
        </header>
        <fieldset>
          <section>
            <div class="row">
              <label class="label col col-4">Email</label>
              <div class="col col-8">
                <label class="input"> 
                  <input type="text" name="email" id="field3" class="validate[required,custom[email]]" />
                </label>
                <div class="note"></div>
              </div>
              <label class="label col col-4">Password</label>
              <div class="col col-8">
                <label class="input"> <i class="icon-append fa fa-lock"></i>
                  <!--<input type="password" name="password">-->
                <input value="" class="validate[required,custom[passwordLogin]]" type="password" name="pass" id="field24" />
                </label>
                <div class="note"><a href="#">Forgot password?</a></div>
              </div>
            </div>
          </section>
          <section>
            <div class="row">
              <div class="col col-4"></div>
              <div class="col col-8">
                <label class="checkbox">
                  <input type="checkbox" name="remember" checked>
                  <i></i>Keep me logged in</label>
              </div>
            </div>
          </section>
        </fieldset>
        <footer>
            <a class="btn btn-default" href="http://localhost/orb/front/register" style="color:white; margin-left:3px;">Register</a>
            <button type="submit" class="btn btn-default">Log in</button>
            
        </footer>
      </form>
    </div>
<!--    <div class="copyrights"> ORB Power Admin Dashboard Template <br>
      Created by DazeinCreative &copy; 2014 </div>-->
  </div>
</div>

<!--Scripts--> 
<!--JQuery--> 
<script type="text/javascript" src="<?php echo base_url() ?>orb-plugins/js/vendors/jquery/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>orb-plugins/js/vendors/jquery/jquery-ui.min.js"></script> 

<!--Forms--> 
<script type="text/javascript" src="<?php echo base_url() ?>orb-plugins/js/vendors/forms/jquery.form.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>orb-plugins/js/vendors/forms/jquery.validate.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>orb-plugins/js/vendors/forms/jquery.maskedinput.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>orb-plugins/js/vendors/jquery-steps/jquery.steps.min.js"></script> 

<!--NanoScroller--> 
<script type="text/javascript" src="<?php echo base_url() ?>orb-plugins/js/vendors/nanoscroller/jquery.nanoscroller.min.js"></script> 

<!--Sparkline--> 
<script type="text/javascript" src="<?php echo base_url() ?>orb-plugins/js/vendors/sparkline/jquery.sparkline.min.js"></script> 

<!--Main App--> 
<script type="text/javascript" src="<?php echo base_url() ?>orb-plugins/js/scripts.js"></script>



<!--/Scripts-->

</body>
</html>