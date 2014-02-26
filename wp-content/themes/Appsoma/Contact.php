<?php
/**
 * Template Name:Contact Us
 * 
 *
 *
 */
get_header();?>
<div id="map_canvas"></div>
<div class="main-wrapper">
	<div class="row main-content"><!-- Main Content -->

    	<div class="col-lg-12 columns def-mg">
               
                <div class="row">
			<div class="col-lg-3 columns">
				<h3 class="contact_title">Contact info</h3>
				<div class="divider"><span></span></div>
				<div class="contact_info">
					<?php  wp_reset_query(); ?>
					<?php while(have_posts()) :the_post();       
                    the_content();
                    endwhile;     
                    ?> 
				</div>
			</div>
            			<div class="col-lg-3 columns">
				
				<h3 class="contact_title">Hours of Operation</h3>
                <div class="divider"><span></span></div>
				 <?php
						$posttitle = "HOURS OF OPERATION";
						$postid = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '" . $posttitle . "'");
						$getpost = get_post($postid);		
						?>
                        
                        <?php echo $getpost->post_content; ?>   
                
			</div>

			<div class="col-lg-6 columns">
				<h3 class="contact_title">Send us a message</h3>
                <div class="divider"><span></span></div>
					<div id="status"></div>
					<div class="contact_form">
						<div class="row">
							 <?php
              if (function_exists(contact_mailer)) {				
                  contact_mailer();
               }
               ?>
						</div>
					</div>	
				</div>
			</div><!-- End Row -->
        
        </div>

	</div>
      
    
  <!-- End Main Content -->
    
 </div>
    
      <!-- /container -->   
 <?php get_footer(); ?>