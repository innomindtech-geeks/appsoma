<?php 
/*
template Name: Plans
*/
get_header();
?> 
    
    <!-- Main Cont Area -->
	<section class="pricingTables">
    	 <div class="container">
          <div class="row">
          <?php  wp_reset_query(); ?>
             <?php 
	          $loopb = new WP_Query( array( 'category_name' => 'Plans', 'posts_per_page' => 10, 'order'=> 'ASC') );
			  if($loopb->have_posts()){
			  while ( $loopb->have_posts() ) : $loopb->the_post(); 
			  $postId = get_the_ID(); 
              $image1=wp_get_attachment_url(get_post_thumbnail_id($postId));			
			  $custom_fields = get_post_custom($postid1);			
			  foreach ($custom_fields as $field_key => $field_values) {
			  if (!isset($field_values[0]))
				continue;
			  if (in_array($field_key, array("_edit_lock", "_edit_last")))
				continue; 								
			  if($field_key=='price'){   
			 $price=$field_values[0];			 
			   }
			   $free=$price;
			    if($free=='FREE'){
					$price='<span class="free">'.$free.'</span>';
					$buttn= '<a href="javascript:;" class="cta yellow">Use Appsoma</a>';
				}
				else{
					$buttn= '<a href="javascript:;" class="cta blue">SIGN UP</a>';
				}
			  }			
					
			 ?>
          
            <div class="col-lg-4">
            	<div class="pricing">
                	<h4><?php the_title(); ?></h4>
                  	<div class="price"><?php echo $price;  ?></div>
                    <div class="spec">
                    	<?php the_content(); ?>
                       <?php echo $buttn;  ?>
                    </div>
                </div>
            </div>            
            <?php endwhile;
			}
			?>           
            
          </div>
          </div>
    </section>
    <section class="pricingBotSec">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-4 pricingBotCols">
                <?php dynamic_sidebar('Free Features'); ?>                	
                </div>
                <div class="col-sm-4 pricingBotCols">
                	 <?php dynamic_sidebar('Support'); ?>   
                </div>
                <div class="col-sm-4 pricingBotCols">
                	 <?php dynamic_sidebar('Early Access'); ?>   
                </div>
             </div>
         </div>
    </section>
     <?php get_footer(); ?>