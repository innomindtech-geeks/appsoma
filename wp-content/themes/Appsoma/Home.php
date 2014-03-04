<?php
/**
 * Template Name:Home
 * 
 *
 *
 */
get_header();
?>
    <!-- Splash screen -->
    <section id="homeSplash">
          <div class="container">
              <div class="row">
                <div class="col-lg-12">
                <?php  wp_reset_query(); ?>
        <?php while(have_posts()) :the_post();  ?> 
                    <h1><?php the_content(); ?></h1>
                  
                <div class="ctaWrap">
                	<a href="https://appsoma.com/manage_projects" class="cta yellow">Use Appsoma</a><br>
                	Without registration. For free.
                </div>
                </div>
               </div>
               <div class="row">
                   <div class="col-xs-12">
                   <div class="scroll">
                     <a href="javascript:;" class="scorllDown">
                        Scroll down<br>for details
                     </a>
                   </div>
                 </div>
            </div>
                <figure class="screenShot">
					<?php $postid = get_the_ID(); 
                    $image2=wp_get_attachment_url(get_post_thumbnail_id($postid));?>					
           	    	<img src="<?php echo $image2; ?>"  alt="" class="img-responsive">
                </figure>
                  <?php  endwhile;   ?>
          </div>
    </section>
	<section class="mainContArea homeCont">
    	 <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <?php  wp_reset_query(); ?>
             <?php 
	         $loopb = new WP_Query( array( 'category_name' => 'Home', 'posts_per_page' => 10, 'order'=> 'ASC') );
			 if($loopb->have_posts()){
			 while ( $loopb->have_posts() ) : $loopb->the_post(); 
			 $postId = get_the_ID(); 
             $image1=wp_get_attachment_url(get_post_thumbnail_id($postId));
			 ?>
            	<div class="contCategory clearfix">
                	<h2><?php the_title(); ?></h2>
                    <figure><img src="<?php echo $image1; ?>" alt="" class="img-responsive"></figure>
                    <p><?php the_content(); ?></p>
                </div>
                
             <?php endwhile;
			}
			?>
                <div class="ctaHomeBot">
                	<div class="wrap">
                        ...and even more<br>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_title("Scientists"))); ?>" class="cta">See All Features</a>
                    </div>
                </div>
            </div>
          </div>
          </div>
    </section>
 <?php get_footer(); ?>  