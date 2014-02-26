<?php
/**
 * The Template for displaying all page posts.
 *
 * @package appsoma
 * @subpackage appsoma
 * @since appsoma
 */
get_header();
?>

<!--===============start:content area============-->
<div class="middle-outer">
    <div class="wrapper">
        <div class="middle-contents"> 
            <!--====================start:left contents==================-->
            <div class="services-contents">
            <h1>sedgvdfgbfbhfghngjnghj</h1>
                <h1><?php the_title(); ?></h1>
                   <br><br>
                        <?php
                        while (have_posts()):the_post();
                            if (has_post_thumbnail()) {
                                the_post_thumbnail();
                                ?>
                                <br>
                                <?php
                            }
                            the_content();
                        endwhile;
                        ?>
            </div>
            <!--======================/stop:left contents=========================--> 
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<!--===============stop:content area============--> 
<?php get_footer(); ?>