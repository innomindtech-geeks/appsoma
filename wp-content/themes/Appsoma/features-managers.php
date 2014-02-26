<?php
/**
 * Template Name:Features Managers
 * 
 *
 *
 */
get_header();
get_sidebar('2');
?>
    <!-- Splash screen -->
    <section id="innerSplash" class="managers">
    	<div class="subBg"></div>
          <div class="container">
              <div class="row">
                <div class="col-lg-12">
                <hgroup>
                 <?php while(have_posts()) :the_post();?> 
<?php $title=get_the_title();      
	  $postid1 = get_the_ID();
	  $post = get_post($postid1); 
      $contents = apply_filters('the_content', $post->post_content); 
      $image1=wp_get_attachment_image_src( get_post_thumbnail_id($postid1),'post_tec'); 

?>
                        <?php echo $contents;?>
                 </hgroup>
                 <div class="container managers-splash-features">
                      <div class="row">
                        <div class="col-xs-4">
                         <?php 
						      $custom_fields = get_post_custom($postid1);			
							  foreach ($custom_fields as $field_key => $field_values) {
							  if (!isset($field_values[0]))
								continue;
							  if (in_array($field_key, array("_edit_lock", "_edit_last")))
								continue; 								
							  if($field_key=='Technology'){   
							 $technology=$field_values[0]; 
                               } 
							    if($field_key=='Cloud'){ 						
							 $cloud=$field_values[0];
                               }
							    if($field_key=='Support'){							
							 $support=$field_values[0]; 
								}
							  }						 
			
					?>
                        	<figure><img src="<?php echo $image1[0];?>" alt="" class="img-responsive"></figure>
                        	 <?php echo $technology;?>
                        </div>
                        <div class="col-xs-4">
                        	<figure> <?php if (class_exists('MultiPostThumbnails')) {
          $image_name = "feature-image-2";
                if (MultiPostThumbnails::has_post_thumbnail('page', $image_name)) {
                    $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'page', $image_name, $post->ID );
                    $attr = array('class' => "img-responsive");
                    $image = wp_get_attachment_image( $image_id, 'feature-image-2', false, $attr );
                    echo $image;
                }
        };
		?></figure>
                        	<?php echo $cloud;?>
                        </div>
                        <div class="col-xs-4">
                        	<figure><?php if (class_exists('MultiPostThumbnails')) {
          $image_name = "feature-image-3";
                if (MultiPostThumbnails::has_post_thumbnail('page', $image_name)) {
                    $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'page', $image_name, $post->ID );
                    $attr = array('class' => "img-responsive");
                    $image = wp_get_attachment_image( $image_id, 'feature-image-3', false, $attr );
                    echo $image;
                }
        };
		?></figure>
                        	<?php echo $support;?>
                        </div>
                      </div>
                 </div>
                </div>
               </div>
          </div>
    </section>
      <?php endwhile;?>
	<section class="mainContArea">
    	 <div class="container">
          <div class="row">
            <div class="col-lg-12">
            
             <?php query_posts( array ('post_type' => 'managers','order'=> 'ASC' ) );?>
                        <?php while(have_posts()) :the_post();
						$postid = get_the_ID();
                        $image=wp_get_attachment_image_src( get_post_thumbnail_id($postid),'post_sci');?>
                        
            	<div class="contCategory featuresList clearfix"> <!--Feature List-->
                	<div class="row">
                    	<div class="col-sm-6 screen">
                            <figure><img src="<?php echo $image[0];?>" alt="" class="img-responsive"></figure>
                        </div>
                        <div class="col-sm-6 features">
                            <h2><?php the_title(); ?></h2>
                               <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                  <?php endwhile;?>
            	
                
                 <?php get_footer(2);?>
            </div>
          </div>
          </div>
    </section>
   <?php get_footer();?>