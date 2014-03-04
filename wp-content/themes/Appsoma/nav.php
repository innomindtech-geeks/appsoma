  <!--start Nav -->
  
  
  <nav id="headerNavArea">
                <?php 
            if(function_exists('wp_nav_menu')) {
             wp_nav_menu( array('menu' => 'Main Menu' )); ?> 
             
             <?php global $current_user;
               get_currentuserinfo(); 
			        
      if($current_user->user_login !="admin" && $current_user->user_login !="")
	  { ?>
		<!--  <p style="float:right;">Welcome, <?php //echo $current_user->user_login; ?>|<a href="<?php //echo wp_logout_url(get_option('siteurl')); ?>">Logout</a></p>-->
        <?php }
		else { ?>
                  
			 <a href="https://appsoma.com/login"  class="login" <?php //data-toggle="modal" data-target="#login"?>>Login</a>
             
              <?php 
		}
            }?>
              
            </nav>
   
   