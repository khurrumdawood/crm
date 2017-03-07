        
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
<!--<form action="" method="post" id="add_customer-form" enctype="multipart/form-data" >-->
    <div class="row" id="powerwidgets">

        <div class="col-md-12 bootstrap-grid"> 

            <!-- New widget -->
            <div class="powerwidget cold-grey" id="available-validations-methods" data-widget-editbutton="false">
            </div>
            <!-- /End Widget --> 

        </div>

        <!-- /Inner Row Col-md-12 -->
        <div class="col-md-12 bootstrap-grid">

            <!-- New widget -->

            <div class="powerwidget"  id="checkout-form-validation-widget" data-widget-editbutton="false" style=" width: 40%; margin: 0px auto;">
                <header>
                    <h2>Login
                    </h2>
                </header>
                <div class="inner-spacer">
                    <div action="" id="checkout-form" class="orb-form">
                        <!--<header> Please Provide Info</header>-->
                        <div style="color: red"><?php echo validation_errors(); ?> </div>

<form action="<?php echo base_url(); ?>front/login/auth" id="login-form" class="orb-form" method="post">
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
            <button type="submit" class="btn btn-default">Log in</button>
            <!--<a href="<?php echo base_url(); ?>front/register" class="btn btn-default">Register</a>-->
            
        </footer>
      </form>
                    </div>
                </div>
            </div>

        </div>
        

        <!-- /Inner Row Col-md-12 -->
    </div>
<!--</form>-->
<!-- /Widgets Row End Grid--> 
</div>
<!-- / Content Wrapper --> 
