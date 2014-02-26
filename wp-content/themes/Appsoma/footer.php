 <footer id="pageFooter">
    	<div class="container">
        	<div class="row">
                <div class="col-md-8 pull-right">
                	<nav>
                    
                    	<?php 
            if(function_exists('wp_nav_menu')) {
             wp_nav_menu( array('menu' => 'Footer Menu' ));
			 
			}?> 
             
                    </nav>
                </div>
            	<div class="col-md-4 pull-left">
                	<div class="copyright">
                    	&copy; 2013- 2014, Appsoma LLC.
                        <span>All rights reserved.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Modal -->
    <div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php bloginfo('template_url'); ?>/img/close.png" alt=""></button>
            <h4 class="modal-title" id="myModalLabel">Login</h4>
          </div>
          <div class="modal-body">
          
          <form name="loginform" id="loginform" method="post" >
            <div class="form-group">
                <div class="col-xs-12">
                  <input type="text" name="log" class="form-control validate[required]" id="user_login" placeholder="Username" data-prompt-position="bottomLeft">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="password" class="form-control validate[required]" name="pwd" id="user_pass" placeholder="Password" data-prompt-position="bottomLeft">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="rememberme" id="rememberme" value="forever"> Remember me
                    </label>
                    <input name="redirect_to" value="<?php echo get_option('siteurl'); ?>" type="hidden">
			        <input name="testcookie" value="1" type="hidden">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12 submitBut">
                <input type="submit" name="wp-submit" id="wp-submit" value="Log In" class="cta yellow" />
              </div>
              </div>
           </form>
         
          </div>
          <div class="modal-footer">
            <div class="col-md-6"><a href="javascript:;">Forgot password?</a></div>
            <div class="col-md-6 newuser">New user?  <a href="javascript:;" class="createAcc">Create account</a></div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    
        <!-- Modal -->
    <div class="modal fade signup" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php bloginfo('template_url'); ?>/img/close.png" alt=""></button>
            <h4 class="modal-title" id="myModalLabel">Create Account</h4>
          </div>
          <div class="modal-body">
            <form id="sign_up">
            <div class="form-group">
                <div class="col-xs-12">
                  <input type="name" class="form-control validate[required]" id="name" name="name"  placeholder="Username" data-prompt-position="bottomLeft" >
                  <p>User names can contain only letters and numbers. Names of ten characters or less are recommended.</p>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="email" class="form-control validate[required,custom[email]]" id="email" name="email" placeholder="Email" data-prompt-position="bottomLeft">
                  <p>Email is only used for password resets.</p>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="password" class="form-control validate[required]" id="password" name="password" placeholder="Password" data-prompt-position="bottomLeft">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="password" class="form-control validate[required,equals[password]] " id="password2" name="password2" placeholder="Password Confirmation" data-prompt-position="bottomLeft">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12 submitBut">
                  <input type="submit" value="Create Account" class="cta yellow" />
                </div>
              </div>
           </form>
          </div>
          <div class="modal-footer">
            <div class="col-md-6 existLogin pull-right">Existing user? <a href="javascript:;">Login</a></div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    
    <div class="modal fade reqdemo" id="reqdemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php bloginfo('template_url'); ?>/img/close.png" alt=""></button>
            <h4 class="modal-title" id="myModalLabel">Request Personal Demo</h4>
          </div>
          <div id="request">
          <div class="modal-body">
          	<div class="col-xs-12">
            	<p>Let us know your contacts and we will connect with you to figure out convinient time to organize presentation.</p>
            </div>
           <?php
  if (function_exists(request_mailer)) {
         request_mailer();
      }
 ?>
          
          
          </div>
          
          </div>
          
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    
    <!-- /.modal -->
<?php $url = network_home_url();
 $url = $url . "/wp-content/plugins/RequestDemo/request_save.php";
 ?>
<link href="<?php echo blogInfo('template_url'); ?>/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php //bloginfo('template_url'); ?>/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>-->

        <script src="<?php bloginfo('template_url'); ?>/js/vendor/bootstrap.min.js"></script>

        <script src="<?php bloginfo('template_url'); ?>/js/plugins.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        
       
<script src="<?php echo blogInfo('template_url'); ?>/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo blogInfo('template_url'); ?>/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script> 
        <script type="text/javascript">
		//$.noConflict();
		//jQuery.noConflict();
		
  /* $(document).ready(function(){
	   alert("test");
		
       
    });
	function myValidationName(field, rules, i, options){
                if(field.val()=='Name')
                return "Please Enter  "+field.val();
  }*/
	
</script>
     
    </body>
</html>
