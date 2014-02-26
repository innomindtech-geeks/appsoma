
<?php while(have_posts()) :the_post();?> 
<?php $title=get_the_title();      
	  $postid1 = get_the_ID();
	  $post = get_post($postid1); 
      $contents = apply_filters('the_content', $post->post_content); 
      $image1=wp_get_attachment_image_src( get_post_thumbnail_id($postid1));

?>
<?php endwhile;?>
<?php 	$scientists_actv='';
		$developers_actv='';
		$managers_actv='';		
		
		if($title=="Scientists"){
			$scientists_actv="actv";
		}else if($title=="Developers"){
			$developers_actv="actv";
		}else if($title=="Managers"){
			$managers_actv="actv";		
		}
		
?>
<!-- Features Select -->
   <section id="feature-select">
          <div class="container">
              <div class="row">
                <div class="col-lg-12">
                    <h2>We bring our <span>features</span> for</h2>
                    <div class="feature-tabs">
                    	<a href="<?php echo esc_url(get_permalink(get_page_by_title("Scientists"))); ?>" class="scientists <?php echo $scientists_actv;?>">
                        	<div class="iconWrap">
                            	<div class="icon"></div>
                                <div class="iconHover"></div>
                            </div>
                        	Scientists
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_title("Developers"))); ?>" class="developers <?php echo $developers_actv;?>">
                        	<div class="iconWrap">
                            	<div class="icon"></div>
                                <div class="iconHover"></div>
                            </div>
                        	Developers
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_title("Managers"))); ?>" class="managers <?php echo $managers_actv;?>">
                        	<div class="iconWrap">
                            	<div class="icon"></div>
                                <div class="iconHover"></div>
                            </div>
                        	Managers
                        </a>
                    </div>
                </div>
               </div>
          </div>
          <div class="pointer"></div>
    </section>