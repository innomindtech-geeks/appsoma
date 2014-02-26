<aside class="col-lg-3 columns">
				<div class="widgets">
					<h3>Categories</h3>		
					<ul class="categories">
                    <?php			
			 $cat_name='Blog';			
			 $cat_id=get_cat_ID( $cat_name ) ;          
			 $childCats = get_categories( 'child_of='.$cat_id );		   
             foreach($childCats as $child){ ?>             
             <?php  echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($child->term_id), apply_filters('get_term', $child->name)); ?>
             <?php
               }
			?>
                    
                    
                    
						<!--<li><a href="#">Print Design<span>(3)</span></a></li>
						<li><a href="#">User Interface<span>(7)</span></a></li>
						<li><a href="#">Photography<span>(1)</span></a></li>
						<li><a href="#">User experience<span>(12)</span></a></li>
						<li><a href="#">Wallpapers<span>(32)</span></a></li>
						<li><a href="#">Futuristic design<span>(2)</span></a></li>-->
					</ul>
				</div>
				<div class="widgets">
					<h3>Tags</h3>			
					<ul id="tags">
                    
                    
                    <?php
                    query_posts('category_name=Blog');
                    if (have_posts()) : while (have_posts()) : the_post();

                        if( get_the_tag_list() ){
                            echo $posttags = get_the_tag_list('<li>','</li><li>','</li>');
                        }

                    endwhile; endif; 

                    wp_reset_query(); 
					
					
					
                ?>
                    
						<!--<li><a href="#" class="button small">web design</a></li>
						<li><a href="#" class="button small">html</a></li>
						<li><a href="#" class="button small">user interface</a></li>
						<li><a href="#" class="button small">ror</a></li>
						<li><a href="#" class="button small">css</a></li>
						<li><a href="#" class="button small">user interface</a></li>
						<li><a href="#" class="button small">php</a></li>-->
					</ul>
					<div class="clearfix"></div>
					
				</div>
				
				
				
			</aside>