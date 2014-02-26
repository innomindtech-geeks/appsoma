<?php
/**
 * Template Name: Demo
 * 
 *
 *
 */
get_header(1);
?>	<!-- Features Select -->
    <section id="demo-splash">
          <div class="container">
              <div class="row">
                <div class="col-lg-12">
                <?php while(have_posts()) :the_post(); ?>
                    <h1><?php the_content(); ?></h1>
                  <?php endwhile; ?>
                	<div class="demo-splash-rhtCol">
                        <span class="or">or</span>
                        <div class="ctaWrap">
                            <a href="javascript:;" class="cta blue"   data-toggle="modal" data-target="#reqdemo">Request a Personal Demo</a><br>
                            via Skype by our team. For free.
                        </div>
                    </div>
                </div>
               </div>
          </div>
          <div class="pointer"></div>
    </section>
    
    <!-- Main Cont Area -->
	<section class="mainContArea">
    	<div class="demo">
    	 <div class="container">
                        <?php
						$count_posts = wp_count_posts('demo');
						$demo_count= $count_posts->publish;
						$row=round($demo_count/3);	
						$remaining=$demo_count%3;				
					    $i=0;
						$j=0;					
						$count=$demo_count - $remaining;
						?>
						<div class="row">                        
                       
						<?php query_posts( array ('post_type' => 'demo','order'=> 'ASC' ) );
                        	?>
                        <?php while(have_posts()) :the_post(); 
                        $i=$i+1;
						 $custom_fields = get_post_custom($postid1);			
							  foreach ($custom_fields as $field_key => $field_values) {
							  if (!isset($field_values[0]))
								continue;
							  if (in_array($field_key, array("_edit_lock", "_edit_last")))
								continue; 								
							  if($field_key=='description'){   
							 $description=$field_values[0];
							 $pieces = explode("<br>", $description);				            
                               } 
							    }		
						
						if($i<= $count){
						?>
                        
						<div class="col-sm-4">
            	<div class="demo-catg">
                    <a href="javascript::" data-toggle="modal" data-target="#mass-demo<?php echo $i?>">
                        <div class="demo-icon-wrap">
                            <div class="demo-icon">
                          <?php  $postId = get_the_ID(); 
                               $image1=wp_get_attachment_url(get_post_thumbnail_id($postId)); ?>
                                <img src="<?php echo $image1; ?>" alt="" class="img-responsive">
                                <span class="demo-icon-mask"></span>
                            </div>
                        </div>
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <p><?php echo $description; ?></p>
                </div>
            </div>   
            
            <div class="modal fade appDemo" id="mass-demo<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php bloginfo('template_url'); ?>/img/close.png" alt=""></button>
            <h4 class="modal-title" id="myModalLabel"><?php the_title(); ?></h4>            
            <span class="appCaption"><?php   echo $pieces[0].' '.$pieces[1]; ?></span>
      </div>
      <div class="modal-body">
   	<?php the_content(); ?>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>                            
                        
                     <?php	
						}
						else{
							$j++;
							
							if($j==1 && $remaining==1){
								$cls= 'col-sm-offset-4';
							}if($j==1 && $remaining==2) {
								$cls= 'col-sm-offset-2';
							}
							?>
							
							<div class="col-sm-4 <?php echo $cls; ?>" >
            	<div class="demo-catg">
                    <a href="javascript::" data-toggle="modal" data-target="#mass-demo<?php echo $i?>">
                        <div class="demo-icon-wrap">
                            <div class="demo-icon">
                          <?php  $postId = get_the_ID(); 
                          $image1=wp_get_attachment_url(get_post_thumbnail_id($postId)); ?>
                                <img src="<?php echo $image1; ?>" alt="" class="img-responsive">
                                <span class="demo-icon-mask"></span>
                            </div>
                        </div>
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <p><?php echo $description; ?></p>
                </div>
            </div>  
            
            <div class="modal fade appDemo" id="mass-demo<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php bloginfo('template_url'); ?>/img/close.png" alt=""></button>
            <h4 class="modal-title" id="myModalLabel"><?php the_title(); ?></h4>            
            <span class="appCaption"><?php   echo $pieces[0].' '.$pieces[1]; ?></span>
      </div>
      <div class="modal-body">
   	 <?php the_content(); ?>
        </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div> 
            <?php 
			$cls="";
							
						}
						
						
						if($i%3==0){
							echo '</div><div class="row">';
						}
					 				
					  endwhile;?>   
                        
                        
                      
                        <?php
					
					
						
						
							?>
						 </div>
					<?php	
						?>
                       
          
          <div class="row">
          	<div class="col-lg-12">
            	<div class="demo-footer">
            		or look through our <img src="<?php bloginfo('template_url'); ?>/img/star.png" alt=""> <a href="javascript::">App Catalogue</a>
                </div>
            </div>
          </div>
          
          </div>
       </div>
    </section>
   <?php get_footer(); ?>  