<?php
/**
 * Template Name:Careers
 * 
 *
 *
 */
get_header();
get_sidebar('1');
?>
 <!-- Main Cont Area -->
	<section class="mainContArea">
    	 <div class="container">
          <div class="row">
            <div class="col-lg-12">
           <?php  $count_posts = wp_count_posts('video');
		          $demo_count= $count_posts->publish;					
					if(empty($demo_count)){ ?>
            	<div class="career clearfix">
                	<div class="no-opening">
                    <?php 
					wp_reset_query();											
        			while(have_posts()) :the_post();					
                    the_content();
                    endwhile;   ?>
                    
                        </div>
                </div>
                <?php } else { ?>
                <div class="career clearfix">
                <!--Opening-->                
                 <?php
				 wp_reset_query();	
				 query_posts( array ('post_type' => 'careers','order'=> 'ASC' ) );
                 while(have_posts()) :the_post();?>
                 
                	<div class="opening">
                    
                    <?php $title=get_the_title();
						  $t1=explode(',', $title, 2);?>
                          
                        <h3><a href="javascript:;"><?php echo $t1[0];?></a></h3>
						<span class="location"><?php echo $t1[1];?></span>
                        <?php the_content();?>
                    </div>
                    <?php endwhile;?>
            </div>
            <?php } ?>
          </div>
          </div>
    </section>
    
<?php get_footer();?>
