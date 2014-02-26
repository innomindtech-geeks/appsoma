  <!--start Nav -->
  <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
           <?php 
            if(function_exists('wp_nav_menu')) {
             wp_nav_menu( array('menu' => 'Menu 1' ));
            }?>
               
              </ul>
           
          
        </div>
        <!-- <aside class="side_nav">
            
      </aside>-->
        <!--end Nav -->           
        
   