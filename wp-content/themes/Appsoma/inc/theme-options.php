<?php
/**
 * appsoma Theme Options
 *
 * 
 * @subpackage appsoma
 * @since appsoma 1.0
 */

/**
 * Properly enqueue styles and scripts for our theme options page.
 *
 * This function is attached to the admin_enqueue_scripts action hook.
 *
 * @since appsoma 1.0
 *
 */
function appsoma_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style( 'appsoma-theme-options', get_template_directory_uri() . '/inc/theme-options.css', false, '2011-04-28' );
	wp_enqueue_script( 'appsoma-theme-options', get_template_directory_uri() . '/inc/theme-options.js', array( 'farbtastic' ), '2011-06-10' );
	wp_enqueue_style( 'farbtastic' );
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'appsoma_admin_enqueue_scripts' );

$items = array (
array(
'id' => 'fb',
'name' => __('Facebook URL', 'imt'),
'desc' => __('Put your full Facebook address here.(with http:// , leave it blank for display none.)', 'imt')
),
array(
'id' => 'you',
'name' => __('Youtube URL', 'imt'),
'desc' => __('Put your full Youtube address here.(with http:// , leave it blank for display none.)', 'imt')
),
array(
'id' => 'gplus',
'name' => __('Google Plus URL', 'imt'),
'desc' => __('Put your full Twitter address here.(with http:// , leave it blank for display none.)', 'imt')
),
/*array(
'id' => 'linked',
'name' => __('LinkedIn URL', 'imt'),
'desc' => __('Put your full LinkedIn address here.(with http:// , leave it blank for display none.)', 'imt')
),*/

);
add_action( 'admin_init', 'imt_theme_options_init' );
add_action( 'admin_menu', 'imt_theme_options_add_page' );
function imt_theme_options_init(){
register_setting( 'imt_options', 'imt_options', 'imt_options_validate' );
}
function imt_theme_options_add_page() {
add_theme_page( __( 'Theme Options' ), __( 'Theme Options' ), 'edit_theme_options', 'theme_options', 'imt_theme_options_do_page' );
}
function imt_default_options() {
global $items;
$options = get_option( 'imt_options' );
foreach ( $items as $item ) {
if ( ! isset( $options[$item['id']] ) ) {
$options[$item['id']] = '';
}
}
update_option( 'imt_options', $options );
}
add_action( 'init', 'imt_default_options' );
function imt_theme_options_do_page() {
global $items;
if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;
?>
<div class="wrap">
<?php screen_icon(); echo "<h2>" . sprintf( __( '%1$s Options', 'imt' ), get_current_theme() ) . "</h2>"; ?>
<?php if ( false !== $_REQUEST['updated'] ) : ?>
<div class="updated fade"><p><strong><?php _e( 'Options saved', 'imt' ); ?></strong></p></div>
<?php endif; ?>
<form method="post" action="options.php">
<?php settings_fields( 'imt_options' ); ?>
<?php $options = get_option( 'imt_options' ); ?>
<table class="form-table">
<?php foreach ($items as $item) { ?>
<?php if ($item['id'] == 'excerpt_check' || $item['id'] == 'comment_notes' || $item['id'] == 'smilies') { ?>
<tr valign="top" style="margin:0 10px;border-bottom:1px solid #ddd;">
<th scope="row"><?php echo $item['name']; ?></th>
<td>
<input name="<?php echo 'imt_options['.$item['id'].']'; ?>" type="checkbox" value="true" <?php if ( $options[$item['id']] ) { $checked = "checked=\"checked\""; } else { $checked = ""; } echo $checked; ?> />
<br/>
<label class="description" for="<?php echo 'imt_options['.$item['id'].']'; ?>"><?php echo $item['desc']; ?></label>
</td>
</tr>
<?php } else { ?>
<tr valign="top" style="margin:0 10px;border-bottom:1px solid #ddd;">
<th scope="row"><?php echo $item['name']; ?></th>
<td>
<input name="<?php echo 'imt_options['.$item['id'].']'; ?>" type="text" value="<?php if ( $options[$item['id']] != "") { echo $options[$item['id']]; } else { echo ''; } ?>" size="80" />
<br/>
<label class="description" for="<?php echo 'imt_options['.$item['id'].']'; ?>"><?php echo $item['desc']; ?></label>
</td>
</tr>
<?php } } ?>
</table>
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'imt' ); ?>" />
</p>
</form>

</div>
<?php
}
function imt_options_validate($input) {
global $items;
foreach ( $items as $item ) {
$input[$item['id']] = wp_filter_nohtml_kses($input[$item['id']]);
}
return $input;
}
?>