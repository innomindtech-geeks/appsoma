<?php
/**
 * Template Name:Blog
 * 
 *
 *
 */
get_header();
include 'pagination.php';
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
    	<div class="col-lg-9 columns">
                <?php $cat_name = 'Blog'; 
           
			$cmt_count=0;     
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$loopb = new WP_Query( array( 'category_name' => 'Blog', 'posts_per_page' => 1, 'paged' => $paged ) );
			 if($loopb->have_posts()){
			 while ( $loopb->have_posts() ) : $loopb->the_post(); 
			  $cmt_count1=$cmt_count1+1;;
			  $postid=get_the_ID();
			//$cmt_count= wp_count_comments( $postid );
			  $comment_array = get_approved_comments($postid);
			  $x=0;
			  foreach($comment_array as $comment){
			  $x=$x+1;
			  //$cmt=$comment->comment_ID;
			   }
			  //$author = get_the_author();
			 $content= get_the_content() ;			
			 //$len=strlen($content);			
			 $retval = $content;  
			 $array = explode(" ", $content);			
				if (count($array)<=50)
				{
					$retval = $content;
				
				}				
				else
				{
					array_splice($array, 50);
					$retval = implode(" ", $array);					
				}			
		  ?>
				<article class="post row column1-layout">
					<div class="col-lg-4 columns">
						<div class="post_img">
                        <?php $postid = get_the_ID();             			
                        $image=wp_get_attachment_image_src( get_post_thumbnail_id($postid), 'post_port')?>                        
							<img class="post_image" src="<?php echo $image[0];?>" alt="post title">
							<ul class="meta">
								<li><i class="fa fa-comment"></i><a href="<?php the_permalink()?>"><?php echo $x; ?> comments</a></li>
								<li><i class="fa fa-calendar"></i><?php  the_time('j F Y');?></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-8 columns">
						<h3><?php the_title(); ?></h3>
						<div class="divline"><span></span></div>
						<p class="post_text"><?php echo $retval ?></p>
						<a href="<?php the_permalink()?>" class="blog-btn">Read More</a>
					</div>
					<div class="clearfix"></div>
				</article>
            
				<?php endwhile;?>
				<?php }?>
            
                <?php	$items = $loopb->found_posts;
                    if ($items > 0) {
                        $p = new PaginationCls();
                        $p->items($items);
                        $p->limit(1); // Limit entries per page
                        $p->target($_SERVER["REQUEST_URI"]);
                        $p->calculate(); // Calculates what to show
                        $p->parameterName('paged');
                        $p->adjacents(1);
                        $p->page = $paged;
                        $tntPagi = $p->getOutput();
                        $view .= $tntPagi;                        
                    }
                    ?>
            <div class="pagination-wrapper">
					<div class="pagination">
                                      <span class="content_links"><?php echo $view; ?></span>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
            
             <?php get_sidebar('3'); ?>
	</div>
      
  <!-- End Main Content -->    
 </div>
          <!-- /container --> 
    <?php get_footer(); ?> 