<?php
/**
 * Template Name:Investors
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
            
            <?php query_posts( array ('post_type' => 'investors','order'=> 'ASC' ) );?>
                        
                        <?php while(have_posts()) :the_post();?>
						
            	<div class="forinvestors clearfix">
                	<div class="row">
                    	<div class="col-md-4">
                            <h2><?php the_title();?></h2>
                        </div>
                        <div class="col-md-8">
                           <?php the_content();?>
                        </div>
                    </div>
                </div>
                
               <?php endwhile;?>
                               
            </div>
          </div>
          </div>
    </section>
    
<?php get_footer();?>
