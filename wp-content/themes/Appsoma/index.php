<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * 
 * @subpackage appsoma
 * @since appsoma
 */
get_header();
?>
<!--start:banner part-->
<div class="banner-outer">
    <div class="wrapper">
        <div class="banner-rightside-links">
            <div class="bannerlink-leftside-arrow"></div>
            <div class="banner-rightside-innerbox">
                <ul>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title("DOMESTIC & COMMERCIAL"))); ?>">Domestic &amp; Commercial</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title("DOMESTIC & COMMERCIAL"))); ?>">Domestic Renovation &amp; Maintenance</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title("DOMESTIC & COMMERCIAL"))); ?>">Commercial Building &amp; Property Maintenance</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title("SHIRE COUNCIL"))); ?>">Shire Council</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title("HERITAGE REPAIRS"))); ?>">Heritage Repairs</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title("MINESITE WORKS"))); ?>">Minesite Works</a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_title("SHEDS FOR ANY PURPOSE"))); ?>">Sheds for any Purpose</a></li>
                </ul>
            </div>
        </div>
        <div class="banner">
            <div class="container">
                <div class="folio_block">
                    <div class="main_view">
                        <div class="window">
                            <div style="width: 3160px; left: -1930px; top:0px; height:285px;"
                                 class="image_reel"> 
                                     <?php
                                     query_posts(array('post_type' => 'slider', 'order' => 'ASC'));
                                     while (have_posts()) :the_post();
                                         ?>
                                         <?php if (has_post_thumbnail()) { ?>
                                        <a href="#"><?php the_post_thumbnail("post_blg_banner"); ?></a> 
                                        <?php
                                    }
                                endwhile;
                                wp_reset_query();
                                ?>
                            </div>
                        </div>
                        <div style="display: block;" class="paging"> 
                            <?php
                            query_posts(array('post_type' => 'slider', 'order' => 'ASC'));
                            $i = 1;
                            while (have_posts()) :the_post();
                                ?>
                                <?php if (has_post_thumbnail()) { ?>
                                    <a class="" href="#" rel="<?php echo $i; ?>"></a> 
                                    <?php
                                }
                                $i = $i + 1;
                            endwhile;
                            wp_reset_query();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--stop:banner part--> 

<!--start:middle part-->
<div class="middle-outer">
    <div class="wrapper"> 
        <!--start:middle-contents-->
        <div class="middle-contents"> 
            <!--start:left side contents-->
            <div class="leftside-content-area">
                <?php
                $posttitle = "Home-heading-1";
                $postid = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '" . $posttitle . "'");
                $getpost = get_post($postid);
                ?>
                <h1><?php echo $getpost->post_content; ?></h1>
                <?php
                $posttitle = "Home-heading-2";
                $postid = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '" . $posttitle . "'");
                $getpost = get_post($postid);
                ?>
                <h2><?php echo $getpost->post_content; ?></h2>
                <?php
                if (have_posts()):the_post;
                    if (has_post_thumbnail()) {
                        ?>
                        <div class="content-area-img">
                            <?php the_post_thumbnail("post_medium"); ?>
                        </div>
                        <?php
                    }
                    the_content();
                endif;
                ?>
                
                <?php
                $posttitle = "Home-heading-3";
                $postid = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '" . $posttitle . "'");
                $getpost = get_post($postid);
                ?>
                <h1><?php echo $getpost->post_content; ?></h1>
            </div>
            <!--stop:left side contents--> 

            <?php get_sidebar(); ?>
        </div>
        <!--stop:middle-contents--> 
    </div>
</div>
<!--stop:middle part--> 

<?php get_footer(); ?>
<!--start:banner js --> 
<script type="text/javascript" src="<?bolgInfo('template_url');?>/js/jquery.js"></script>
<script type="text/javascript">

    $(document).ready(function() {

        //Set Default State of each portfolio piece
        $(".paging").show();
        $(".paging a:first").addClass("active");

        //Get size of images, how many there are, then determin the size of the image reel.
        var imageWidth = $(".window").width();
        var imageSum = $(".image_reel img").size();
        var imageReelWidth = imageWidth * imageSum;

        //Adjust the image reel to its new size
        $(".image_reel").css({'width' : imageReelWidth});

        //Paging + Slider Function
        rotate = function(){
            var triggerID = $active.attr("rel") - 1; //Get number of times to slide
            var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

            $(".paging a").removeClass('active'); //Remove all active class
            $active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)

            //Slider Animation
            $(".image_reel").animate({
                left: -image_reelPosition
            }, 500 );

        };

        //Rotation + Timing Event
        rotateSwitch = function(){
            play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds
                $active = $('.paging a.active').next();
                if ( $active.length === 0) { //If paging reaches the end...
                    $active = $('.paging a:first'); //go back to first
                }
                rotate(); //Trigger the paging and slider function
            }, 7000); //Timer speed in milliseconds (3 seconds)
        };

        rotateSwitch(); //Run function on launch

        //On Hover
        $(".image_reel a").hover(function() {
            clearInterval(play); //Stop the rotation
        }, function() {
            rotateSwitch(); //Resume rotation
        });

        //On Click
        $(".paging a").click(function() {
            $active = $(this); //Activate the clicked paging
            //Reset Timer
            clearInterval(play); //Stop the rotation
            rotate(); //Trigger rotation immediately
            rotateSwitch(); // Resume rotation
            return false; //Prevent browser jump to link anchor
        });

    });
</script> 
<!--stop:banner js -->
<style type="text/css" media="screen">
	html { margin-top: 0px !important; }