 <!--start Footer -->
	 <footer class="footer_wrapper">
     
     <div class="row footer-part">
      <div class="col-lg-12 columns">
       <div class="row">
         <div class="col-lg-3 columns">
					<h4 class="footer-title">LATEST FROM THE BLOG</h4>
					<div class="divdott"></div>
					<ul class="footer-list">
                     <li>
                     	<div class="wpl-image">
                          <a href="#">
							<img class="cover wp-post-image" width="50" height="50" alt="quality" src="<?php bloginfo('template_url'); ?>/img/001.jpg">
						  </a> 
                        </div>
                     	<div class="wpl-desc">
							<a class="footer-post-link" href="#">Hello world!</a>
                                <time datetime="2013-10-06">
							      <span class="date">
								     <i class="fa fa-calendar"></i>
								     October 06, 2013
							      </span>
                                </time>
                            </div>
                          <div class="clearfix"></div>
                     </li>
                     <li>
                     	<div class="wpl-image">
                          <a href="#">
							<img class="cover wp-post-image" width="50" height="50" alt="quality" src="<?php bloginfo('template_url'); ?>/img/002.jpg">
						  </a> 
                        </div>
                     	<div class="wpl-desc">
							<a class="footer-post-link" href="#">Hello world!</a>
                                <time datetime="2013-10-06">
							      <span class="date">
								     <i class="fa fa-calendar"></i>
								     October 06, 2013
							      </span>
                                </time>
                            </div>
                     </li>
                    </ul>
				</div>
                
                <div class="col-lg-3 columns">
					<h4 class="footer-title">Video</h4>
					<div class="divdott"></div>
					<div class="footer_part_content">
                    
                    
                    <div class="videoWrapper">
					<?php  wp_reset_query(); ?>
                    <?php
						$posttitle = "Footer Video";
						$postid = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '" . $posttitle . "'");
						$getpost = get_post($postid);		
						?>	
                        <?php echo $getpost->post_content; ?> 
</div>
					</div>
				</div>
                
                
                <div class="col-lg-3 columns">
					<h4 class="footer-title">CONTACT INFO</h4>
					<div class="divdott"></div>
					<div class="footer_part_content">

<ul class="about-info">     
                            <?php  wp_reset_query(); ?>
                    <?php
						$posttitle = "CONTACT INFO";
						$postid = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '" . $posttitle . "'");
						$getpost = get_post($postid);		
						?>	
                        <?php echo $getpost->post_content; ?> 
						</ul>
 <?php  wp_reset_query(); ?>
                    <?php
						$posttitle = "HOURS OF OPERATION";
						$postid = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '" . $posttitle . "'");
						$getpost = get_post($postid);		
						?>
                        <h6><strong><?php echo $posttitle; ?></strong></h6>	
                        <?php echo $getpost->post_content; ?>                       
            <?php $urlFb=''; $options = get_option('imt_options');  if($options['fb'] <> '') { $urlFb=($options['fb']); }
			 if($options['gplus'] <> '') { $gplus=($options['gplus']); } if($options['you'] <> '') { $you=($options['you']); }
			?>

						
						<ul class="social-icons">
						<li><a href="<?php echo $gplus;?>"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="<?php echo $urlFb;?>"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php echo $you;?>"><i class="fa fa-youtube"></i></a></li>
					</ul>
					</div>
				</div>
                
                <div class="col-lg-3 columns"> 
					<h4 class="footer-title">Subscribe Newsletter</h4>
                   <h5> Keep uptodate with us</h5>
					<div class="divdott"></div>
					<form method="POST" action="#" id="footer-contact-form">
						<div class="footer_part_content">
							<div class="row">
								<div class="columns subscribe001">
									<input type="text" placeholder="Name"  name="name" class="subscribe"/>
								</div>
								<div class="columns subscribe001">
									<input type="text" placeholder="E-mail" name="email" class="subscribe"/>
								</div>
								
								<div class="large-12 columns text-right">
									<input type="submit" class="button btn_bg" value="Subscribe Now" name="send" />
								</div>	
							</div>
						</div>
					</form>
				</div>
                
                
       </div>
      </div>
     </div>
     
     
     <div class="privacy footer_bottom">
		<div class="footer-part">
			<div class="row">
				<div class="col-lg-6 columns copyright">
					<p >&copy; 2013 Medico Theme, All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 columns">
                	<div class="poweredby">
                	Powered by  On Demand Marketing and Business Solutions			</div>
					<div id="back-to-top"><a href="#top"></a></div>
                    
				</div>
			</div>
		</div>
	</div>
    
      </footer>
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <!--<script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>-->

        <script src="<?php bloginfo('template_url'); ?>/js/vendor/bootstrap.min.js"></script>

        <script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        
        
     <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTSJ4nigiCUcS_KdUEvTfegUWC2EPbP_Q&amp;sensor=false"></script>
<script type="text/javascript">
function initialize() {
	alert('test');
var mapOptions = {
  center: new google.maps.LatLng(35.58329 , -98.4375),
  zoom: 15,
  mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map = new google.maps.Map(document.getElementById("map_canvas"),
	mapOptions);
var myLatlng = new google.maps.LatLng(35.58329 , -98.4375);
var marker = new google.maps.Marker({
	position: myLatlng,
	title:"Address"
});

// To add the marker to the map, call setMap();
marker.setMap(map);
}
</script> 
        
        
 

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/validationEngine.jquery.css" type="text/css"/>

<script type="text/javascript">
/*$(document).ready(function(){
		
			$("#appointment").validationEngine('attach',{
        onValidationComplete : function(form,status){
            if(status == true){
                $.ajax({
                    type:'POST',
                    url: 'http://www.innomindtech.in/development/wordpressProjects/Medico/wp-content/plugins/AppointmentMailer/appointment_save.php',
                    data: $('#appointment').serialize(),
                    dataType: 'text',
                    success: function(html){
						var split_word = html.split('@');
						var success = split_word[1];						
                       if(success == "success"){
						  
                            $('#app_disable').slideUp("slow");
                            $("#app_disable").attr("disabled","disabled");
                            $("#app_disable").html('<h2 style="color:#FB7C15; padding-bottom:20px;">Thank you for your Enquiry, we will get in touch with you soon!</h2>');
                            $("#app_disable").fadeIn("slow");
                        }else{
                            alert("Mail sending failed.");
                        }
                    }
                });
            }else{
                return false;
            }
        }
    });
	
	 });*/
		</script>
   <!-- for Google Map-->




    </body>
</html>
