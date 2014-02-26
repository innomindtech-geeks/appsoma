<?php
/**
 * Template Name:Team
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
            
            <?php query_posts( array ('post_type' => 'team','order'=> 'ASC' ) );?>
                        <?php while(have_posts()) :the_post();
						$postid = get_the_ID();
                        $image=wp_get_attachment_image_src( get_post_thumbnail_id($postid), 'post_port');?>
                        

                <div class="team-member clearfix">
                	<div class="row">
                    	<div class="col-sm-3">
                            <figure><img src="<?php echo $image[0];?>" alt="" class="img-responsive img-circle"></figure>
                        </div>
                        <div class="col-sm-9">
                       	  <div class="memberInfo">
                          
                          <?php $title=get_the_title();
						  $t1=explode(',', $title, 2);
						 
						  
						  ?>
                                <h2><?php echo $t1[0];?></h2>
                            <h6><?php echo $t1[1];?></h6>
                                  <p><?php the_content();?> </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php endwhile;?>
               
               
                
            </div>
          </div>
          </div>
    </section>
    
<?php get_footer();?>
