<?php
/* * *
 * functions for theme appsoma
 * 
 */
include 'inc/theme-options.php';
define('appsomaurl', get_bloginfo('template_url'));

function custom_admin_footer() {
    echo '<a>Thanks for Creating with us <i>Innomind</i></a>';
}

add_filter('admin_footer_text', 'custom_admin_footer');
/*
 * Add Theme support for page,posts and other post types
 */
add_theme_support('menus');
add_theme_support('post-thumbnails', array('post', 'page', 'scientists', 'developer', 'managers', 'demo','team','investors','story','careers','contacts'));
add_image_size('post_medium', 270, 270, true);
add_image_size('post_Slider', 960, 385, true);
add_image_size('post_port', 251, 239, true);
add_image_size('post_sci', 406, 306, true);
add_image_size('post_tec', 211, 211, true);
add_image_size('post_blog', 60, 46, true);
add_image_size('post_small', 90, 70, true);
add_image_size('post_image', 130, 130, true);
add_image_size('post_blg_banner', 174, 174, true);


// Define additional "post thumbnails". Relies on MultiPostThumbnails to work
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(array(
        'label' => '2nd Feature Image',
        'id' => 'feature-image-2',
        'post_type' => 'page'
        )
    );
    new MultiPostThumbnails(array(
        'label' => '3rd Feature Image',
        'id' => 'feature-image-3',
        'post_type' => 'page'
        )
    );
   
    
};


   
   
 

function my_function_admin_bar(){ 
  return false; 
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

function get_post_by_title_search($string) {
    global $wpdb;
    $title = esc_sql($string);
    if (!$title)
        return;

    $page = $wpdb->get_results("
        SELECT * 
        FROM $wpdb->posts
        WHERE post_title LIKE '%$title%'
        AND post_type = 'post' 
        AND post_status = 'publish'
        LIMIT 1
    ");
    return $page;
}

register_nav_menu('primary', __('Primary Menu', 'appsoma'));

if (!function_exists('appsoma_posted_on')) :

    function appsoma_posted_on() {
        printf(__('<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'GGC'), esc_url(get_permalink()), esc_attr(get_the_time()), esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_attr(sprintf(__('View all posts by %s', 'GGC'), get_the_author())), get_the_author()
        );
    }

endif;




add_action('admin_print_styles-appearance_page_theme_options', 'appsoma_admin_enqueue_scripts');

function appsoma_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'appsoma' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'appsoma' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'appsoma' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Free Features', 'appsoma' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears Free Features Widget in Plans page', 'appsoma' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Support', 'appsoma' ),
		'id' => 'sidebar-4',
		'description' => __( 'Appears Support Widget in Plans page', 'appsoma' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Early Access', 'appsoma' ),
		'id' => 'sidebar-5',
		'description' => __( 'Appears Early Access Widget in Plans page', 'appsoma' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'appsoma_widgets_init' );

function getappsomafileType($mime_type) {


    //check mime-type against our list of types we style links for
    $type = "";
    switch ($mime_type) {
        case "application/pdf":
        case "application/x-pdf":
        case "application/acrobat":
        case "applications/vnd.pdf":
        case "text/pdf":
        case "text/x-pdf":
            $type = "pdf";
            break;
        case "application/vnd.ms-excel":
            $type = "xls";
            break;
        case "application/doc":
        case "'application/vnd.msword":
        case "application/vnd.ms-word":
        case "application/winword":
        case "application/word":
        case "application/x-msw6":
        case "application/x-msword":
        case "application/msword":
            $type = "doc";
            break;
        case "application/mspowerpnt":
        case "application/vnd-mspowerpoint":
        case "application/powerpoint":
        case "application/x-powerpoint":
        case "application/vnd.ms-powerpoint":
        case "application/mspowerpoint":
        case "application/ms-powerpoint":
            $type = "ppt";
            break;
        case "application/zip":
        case "application/x-zip":
        case "application/x-zip-compressed":
        case "application/x-compress":
        case "application/x-compressed":
        case "multipart/x-zip":
            $type = "zip";
            break;
    }


    return $type; // return new $html	 
}

function GGcTypeToMime($typesToConvert) {
    $unconvertedTypes = explode(",", $typesToConvert);
    $typeString = "";
    $i = 0;
    foreach ($unconvertedTypes as $type) {
        //Check to see if a comma is needed
        if ($i > 0) {
            $typeString .= ",";
        }

        switch ($type) {
            case "pdf":
                $typeString .= "application/pdf,application/x-pdf,application/acrobat,applications/vnd.pdf,text/pdf,text/x-pdf";
                break;
            case "excel":
            case "xls":
                $typeString .= "application/vnd.ms-excel";
                break;
            case "doc":
                $typeString .= "doc";
                break;
            case "ppt":
                $typeString .= "application/mspowerpnt,application/vnd-mspowerpoint,application/powerpoint,application/x-powerpoint,application/vnd.ms-powerpoint,application/mspowerpoint,application/ms-powerpoint";
                break;
            case "zip":
                $typeString .= "application/zip,application/x-zip,application/x-zip-compressed,application/x-compress,application/x-compressed,multipart/x-zip";
                break;
        }
        $i++;
    }
    return $typeString;
}

if (!function_exists('appsoma_comment')) :

    function appsoma_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li class="post pingback">
                    <p><?php _e('Pingback:', 'appsoma'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'appsoma'), '<span class="edit-link">', '</span>'); ?></p>
                    <?php
                    break;
                default :
                    ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <article id="comment-<?php comment_ID(); ?>" class="comment">
                        <footer class="comment-meta">
                            <div class="comment-author vcard">
                                <?php
                                $avatar_size = 68;
                                if ('0' != $comment->comment_parent)
                                    $avatar_size = 39;

                                echo get_avatar($comment, $avatar_size);

                                /* translators: 1: comment author, 2: date and time */
                                printf(__('%1$s on %2$s <span class="says">said:</span>', 'appsoma'), sprintf('<span class="fn">%s</span>', get_comment_author_link()), sprintf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>', esc_url(get_comment_link($comment->comment_ID)), get_comment_time('c'),
                                                /* translators: 1: date, 2: time */ sprintf(__('%1$s at %2$s', 'appsoma'), get_comment_date(), get_comment_time())
                                        )
                                );
                                ?>

                                <?php edit_comment_link(__('Edit', 'appsoma'), '<span class="edit-link">', '</span>'); ?>
                            </div><!-- .comment-author .vcard -->

                            <?php if ($comment->comment_approved == '0') : ?>
                                <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'appsoma'); ?></em>
                                <br />
                            <?php endif; ?>

                        </footer>

                        <div class="comment-content"><?php comment_text(); ?></div>

                        <div class="reply">
                            <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply <span>&darr;</span>', 'appsoma'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                        </div><!-- .reply -->
                    </article><!-- #comment-## -->

                    <?php
                    break;
            endswitch;
        }

    endif; // ends check for appsoma_comment()




  	
    $labels = array('name' => _x('Scientists', 'post type general name'),
        'singular_name' => _x('Scientists', 'post type singular name'),
        'add_Post' => _x('Add new', 'Scientists'),
        'add_Post_item' => __('Add New Scientists'),
        'edit_item' => __('Edit Scientists'),
        'new_item' => __('New Scientists'),
        'view_item' => __('View Scientists'),
        'search_items' => __('Search Scientists'),
        'not_found' => __('No Scientists found'),
        'not_found_in_trash' => __('No Scientists found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Scientists');
    $args = array('labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail')
		//'taxonomies' => array('category')
		);
    register_post_type('scientists', $args);
	//register_taxonomy_for_object_type( 'category', 'scientists' );


    $labels = array('name' => _x('Developer', 'post type general name'),
        'singular_name' => _x('Developer', 'post type singular name'),
        'add_Post' => _x('Add new', 'Developer'),
        'add_Post_item' => __('Add New Developer'),
        'edit_item' => __('Edit Developer'),
        'new_item' => __('New Developer'),
        'view_item' => __('View Developer'),
        'search_items' => __('Search Developer'),
        'not_found' => __('No Developer found'),
        'not_found_in_trash' => __('No Developer found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Developer');
    $args = array('labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'));
    register_post_type('developer', $args);
	
	  $labels = array('name' => _x('Managers', 'post type general name'),
        'singular_name' => _x('Managers', 'post type singular name'),
        'add_Post' => _x('Add new', 'Managers'),
        'add_Post_item' => __('Add New Managers'),
        'edit_item' => __('Edit Managers'),
        'new_item' => __('New Managers'),
        'view_item' => __('View Managers'),
        'search_items' => __('Search Managers'),
        'not_found' => __('No Managers found'),
        'not_found_in_trash' => __('No Managers found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Managers');
    $args = array('labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'));
    register_post_type('managers', $args);
	
	
    $labels = array('name' => _x('Demo', 'post type general name'),
        'singular_name' => _x('Demo', 'post type singular name'),
        'add_Post' => _x('Add new', 'Demo'),
        'add_Post_item' => __('Add New Demo'),
        'edit_item' => __('Edit Demo'),
        'new_item' => __('New Demo'),
        'view_item' => __('View Demo'),
        'search_items' => __('Search Demo'),
        'not_found' => __('No Demo found'),
        'not_found_in_trash' => __('No Demo found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Demo');
    $args = array('labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'));
    register_post_type('demo', $args);
	
	 $labels = array('name' => _x('Team', 'post type general name'),
        'singular_name' => _x('Team', 'post type singular name'),
        'add_Post' => _x('Add new', 'Team'),
        'add_Post_item' => __('Add New Team'),
        'edit_item' => __('Edit Team'),
        'new_item' => __('New Team'),
        'view_item' => __('View Team'),
        'search_items' => __('Search Team'),
        'not_found' => __('No Team found'),
        'not_found_in_trash' => __('No Team found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Team');
    $args = array('labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'));
    register_post_type('team', $args);
	
	$labels = array('name' => _x('Investors', 'post type general name'),
        'singular_name' => _x('Investors', 'post type singular name'),
        'add_Post' => _x('Add new', 'Investors'),
        'add_Post_item' => __('Add New Investors'),
        'edit_item' => __('Edit Investors'),
        'new_item' => __('New Investors'),
        'view_item' => __('View Investors'),
        'search_items' => __('Search Investors'),
        'not_found' => __('No Investors found'),
        'not_found_in_trash' => __('No Investors found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Investors');
    $args = array('labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'));
    register_post_type('investors', $args);
	
	$labels = array('name' => _x('Story', 'post type general name'),
        'singular_name' => _x('Story', 'post type singular name'),
        'add_Post' => _x('Add new', 'Story'),
        'add_Post_item' => __('Add New Story'),
        'edit_item' => __('Edit Story'),
        'new_item' => __('New Story'),
        'view_item' => __('View Story'),
        'search_items' => __('Search Story'),
        'not_found' => __('No Story found'),
        'not_found_in_trash' => __('No Story found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Story');
    $args = array('labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'));
    register_post_type('story', $args);
	
	$labels = array('name' => _x('Careers', 'post type general name'),
        'singular_name' => _x('Careers', 'post type singular name'),
        'add_Post' => _x('Add new', 'Careers'),
        'add_Post_item' => __('Add New Careers'),
        'edit_item' => __('Edit Careers'),
        'new_item' => __('New Careers'),
        'view_item' => __('View Careers'),
        'search_items' => __('Search Careers'),
        'not_found' => __('No Careers found'),
        'not_found_in_trash' => __('No Careers found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Careers');
    $args = array('labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'));
    register_post_type('careers', $args);
	
	
	$labels = array('name' => _x('Contacts', 'post type general name'),
        'singular_name' => _x('Contacts', 'post type singular name'),
        'add_Post' => _x('Add new', 'Contacts'),
        'add_Post_item' => __('Add New Contacts'),
        'edit_item' => __('Edit Contacts'),
        'new_item' => __('New Contacts'),
        'view_item' => __('View Contacts'),
        'search_items' => __('Search Contacts'),
        'not_found' => __('No Contacts found'),
        'not_found_in_trash' => __('No Contacts found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Contacts');
    $args = array('labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'));
    register_post_type('contacts', $args);
	
    add_filter('comment_post_redirect', 'redirect_after_comment');

    function redirect_after_comment($location) {
        $newurl = substr($location, 0, strpos($location, "#comment"));
        return $newurl . '?c=y';
    }

    function appsomathe_title_shorten($len, $rep = '...') {
        $title = the_title('', '', false);
        $shortened_title = appsomatextLimit($title, $len, $rep);
        print $shortened_title;
    }

    function appsomathe_content_shorten($content, $len, $rep = '...') {
        $shorten_content = appsomatextLimit($content, $len, $rep);
        print strip_tags($shorten_content);;
    }

    function appsomatextLimit($string, $length, $replacer) {
        if (strlen($string) > $length)
            return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length + 1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
        return $string;
    }

    function appsomapagebyslug($page_slug, $output = OBJECT, $post_type = 'page') {
        global $wpdb;
        $page = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type= %s", $page_slug, $post_type));
        if ($page)
            return get_page($page, $output);
        return null;
    }
	
	
	function current_page_url() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}
function my_post_queries( $query ) {
  // do not alter the query on wp-admin pages and only alter it if it's the main query
  if (!is_admin() && $query->is_main_query()){

    // alter the query for the home and category pages 

    if(is_home()){
      $query->set('posts_per_page', 5);
    }

    if(is_category()){
      $query->set('posts_per_page', 5);
    }

  }
}
add_action( 'pre_get_posts', 'my_post_queries' );
    ?>