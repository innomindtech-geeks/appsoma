<?php
get_header();
	if(have_posts()){
		while(have_posts()):the_post(); 
		                            
$id=get_the_ID();
$category=get_the_category( $id );
$category=$category[0]->cat_name;
endwhile;
	}
if($category=='Blog'){
	
	?>
	  <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns">
				<h2>Blog</h2>
			</div>        
		</div>
	</div>		
</div>
<div class="main-wrapper">
	<div class="row main-content"><!-- Main Content -->    
   <?php  if(have_posts()){
		while(have_posts()):the_post(); ?>
    
    	<div class="col-lg-9 columns def-mg">
				<article class="post single-post">
					<div class="post_img">
                    <?php $postid = get_the_ID(); 
            			$image=wp_get_attachment_url(get_post_thumbnail_id($postid));?>     
						<img class="post_image" src="<?php echo $image; ?>" alt="post title">
						<ul class="meta">
							<li><i class="fa fa-comment"></i><a href="javascript:void(0);"><?php echo $x; ?> comments</a></li>
							<li><i class="fa fa-calendar"></i><?php  the_time('j F Y');?></li>
						</ul>
					</div>
					<h3><?php the_title();?></h3>
					<p class="post_text">
                    <?php the_content();?>
                    </p>
				</article>
				<div class="comments">
					 <?php comments_template();?>
				</div>
				
			</div>
      <?php endwhile;
			 }?>      
            
            <?php get_sidebar('3'); ?>

	</div>      
    
  <!-- End Main Content -->
   
 </div>
    
      <!-- /container --> 	
	<?php 	
}else{
	
    ?> 
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns">
            <?php 
			if(have_posts()){
		while(have_posts()):the_post();
           ?> 
				<h2><?php the_title();?></h2>
			</div>        
			</div>
	</div>		
</div>
<div class="main-wrapper">
	<div class="row main-content"><!-- Main Content -->

    	<div class="col-lg-12 columns">
               
                <div class="row"><!-- Row -->
                
                	<div class="col-lg-9 columns inner">
                    
							<?php 
                    		
                            		the_content();
                        		endwhile;
                        
                    		}
                    ?>          
                    </div>                    
                    <?php get_sidebar(); ?>
                
                </div><!-- End Row -->
                </div>
	</div>
            <!-- End Main Content -->
    
 </div>    
      <!-- /container --> 
      <?php }?>
 <?php get_footer(); ?>