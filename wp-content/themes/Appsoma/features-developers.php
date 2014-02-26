<?php
/**
 * Template Name:Features Developers
 * 
 *
 *
 */
get_header();
get_sidebar('2');
?>
    <!-- Splash screen -->
    <section id="innerSplash" class="developers">
          <div class="container">
              <div class="row">
                <div class="col-lg-12">
                <?php while(have_posts()) :the_post();?> 
<?php $title=get_the_title();      
	  $postid1 = get_the_ID();
	  $post = get_post($postid1); 
      $contents = apply_filters('the_content', $post->post_content); 
      $image1=wp_get_attachment_image_src( get_post_thumbnail_id($postid1));

?>
                <hgroup>
                     <?php echo $contents;?>
                 </hgroup>
                </div>
               </div>
               <figure class="screenShot">
           	    	<img src="<?php echo $image1[0];?>"  alt="" class="img-responsive">
                </figure>
          </div>
    </section>
     <?php endwhile;?>
    <section class="mainContArea devFeaturesTable">
    	<div class="container">
          <div class="row">
            <div class="col-lg-12">
                <?php
        $posttitle = "Developer Post";
        $postid = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '" . $posttitle . "'");
        $getpost = get_post($postid);
		echo $getpost->post_content;
        ?>
            </div>
          </div>
        </div>
    </section>
	<section class="mainContArea">
    	 <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <?php query_posts( array ('post_type' => 'developer','order'=> 'ASC' ) );?>
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