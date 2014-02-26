<?php
/**
 * Template Name:Contacts
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
                <div class="contact clearfix">
                
                 <?php query_posts( array ('post_type' => 'contacts','order'=> 'ASC' ) );?>
                        <?php while(have_posts()) :the_post();
						$postid = get_the_ID();
                        $image=wp_get_attachment_image_src( get_post_thumbnail_id($postid), 'post_port');
                		$title=get_the_title();?>
                <!--sales-->
                	<div class="contactCatg">
                        <div class="row">
                        	<div class="col-lg-6">
                           	<img src="<?php echo $image[0];?>" alt="">
                            <a href="mailto:<?php echo $title;?>"><?php echo $title;?></a>
                        </div>
                            <div class="col-lg-6">
                            	<?php the_content();?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
                
            </div>
          </div>
          </div>
    </section>
    
<?php get_footer();?>
