<?php
/*
  Plugin Name: ContacttMailer
  Description: contact  plugin
  Author: appsoma Technologies
  Author URI: http://innomindtech.com/
 */

function contact_mailer($notice) {
    ?>

   
            <form id="contact">
                <label>Your Name<span>*</span></label>
                <input type="text" class="validate[required] input name " name="name" id="name" >
                <label>Email Address<span>*</span></label>
                <input type="text" class="validate[required,custom[email]] input email " id="email" name="email">
                <label>Your Company<span>*</span></label>
                <input type="text" class="input company validate[required]" id="company" name="company">
                <label>Telephone<span>*</span></label>
                <input type="text" class="input tele validate[required,custom[phone]]" name="phone" id="phone">
                <label>Message</label>
                <textarea class="text-area message validate[required]" name="msg" id="msg"></textarea>
                <input type="submit" value="Submit" class="submit" onClick="_gaq.push(['_trackEvent', 'Contact US', 'Submit',,, false]);">
                <div class="security"> 
                 <?php echo $notice; ?>
               </div>
              </form>
        
					


    <?php
}

function contact_mailer_install() {
    global $wpdb, $wp_version;
    $contact_mailer_table = $wpdb->prefix . "contact_mailer";
    add_option('contact_mailer_table', $contact_mailer_table);

    if ($wpdb->get_var("show tables like '" . $contact_mailer_table . "'") != $contact_mailer_table) {
        $wpdb->query("
			CREATE TABLE IF NOT EXISTS `" . $contact_mailer_table . "` (
			  `contact_mailer_id` int(11) NOT NULL auto_increment,
			  `contact_mailer_name` varchar(120) NOT NULL,
			  `contact_mailer_email` varchar(120) NOT NULL,
			   `contact_mailer_phone` varchar(120) NOT NULL,
			    `contact_mailer_company` Text NOT NULL,
				 `contact_mailer_message` Text NOT NULL,
				  PRIMARY KEY  (`contact_mailer_id`) )
			");
    }

    add_option('contact_mailer_title', "contact Us");
    add_option('contact_mailer_fromemail', "test@somedomain.com");
    add_option('contact_mailer_On_SendEmail', "YES");
    add_option('contact_mailer_On_Subject', "contact form");
    add_option('contact_mailer_On_MyEmail', "test@somedomain.com");
}

function contact_mailer_widget($args) {

    if ($display == "show") {
        extract($args);
        echo $before_widget . $before_title;
        echo get_option('contact_mailer_title');
        echo $after_title;
        contact_mailer();
        echo $after_widget;
    }
}

function contact_mailer_control() {

    echo 'To change the setting goto  contact form link on Setting menu.';
    echo '<br><a href="options-general.php?page=ContactMailer/setting.php">';
    echo 'click here</a></p>';
}

//
function contact_mailer_widget_init() {
    if (function_exists('wp_register_sidebar_widget')) {
        wp_register_sidebar_widget('contact form', 'contact form', 'contact_mailer_widget');
    }

    if (function_exists('wp_register_widget_control')) {
        wp_register_widget_control('contact form', array('contact form', 'widgets'), 'contact_mailer_control');
    }
}

function contact_mailer_deactivation() {
    // No action required
}

function contact_mailer_admin() {
    ?>
    <div class="wrap">
        <div class="tool-box">
            <?php
            global $wpdb;
            $contact_mailer_table = get_option('contact_mailer_table');

            $chk_delete = @$_POST['chk_delete'];
            if (!empty($chk_delete)) {
                $count = count($chk_delete);
                for ($i = 0; $i < $count; $i++) {
                    $del_id = $chk_delete[$i];
                    $sql = "delete FROM $contact_mailer_table WHERE contact_mailer_id=" . $del_id;
                    $wpdb->get_results($sql);
                }
            }


            if (@$_GET["doAction"] == "DEL" && @$_GET["contact_id"] > 0) {

                $wpdb->get_results("delete from $contact_mailer_table where contact_mailer_id=" . @$_GET["contact_id"]);
            }

            $data = $wpdb->get_results("select * from $contact_mailer_table order by contact_mailer_id desc");
            if (empty($data)) {
                echo "<div id='message' class='error'><p>No data found. Click setting page to change the settings.</p></div>";
            }
            ?>
            <h2>Contact Enquires</h2>
            <table width="100%" style="padding-bottom:10px;padding-top:10px;">
                <tr>
                    <td align="right">
                        <input name="text_management" lang="text_management" class="button-primary" onClick="location.href='options-general.php?page=ContactMailer/contact_form.php'" value="Go to - View contact details" type="button" />
                        <input name="setting_management" lang="setting_management" class="button-primary" onClick="location.href='options-general.php?page=ContactMailer/setting.php'" value="Go to - Setting Page" type="button" />

                    </td>
                </tr>
            </table>

            <script language="javascript" type="text/javascript">
            	
                function deleteIt(id)
                {
                    if(confirm("Do you want to delete this record?"))
                    {
                        document.frm.action="options-general.php?page=ContactMailer/contact_form.php&doAction=DEL&contact_id="+id;
                        document.frm.submit();

                    }
                }	
            	
                function deleteMulti()
                {
                    if(confirm("Do you want to delete the selected record(s)?"))
                    {
                        if(confirm("Are you sure you want to delete?"))
                        {
                            document.frm.action="options-general.php?page=ContactMailer/contact_form.php";
                            document.frm.submit();
                        }
                    }
                }
            </script>
            <form name="frm" method="post" onsubmit="return deleteMulti();">
                <table width="100%" class="widefat" id="straymanage">
                    <thead>
                        <tr>
                            <th align="left"></th>
                            <th align="left">Name</th>
                            <th align="left">Email</th>
                            <th align="left">Phone</th>
                            <th align="left">Company</th>                         
                            <th align="left">Message</th>
                            <th align="left"></th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($data as $data) {
                            $_date = mysql2date(get_option('date_format'), $data->contact_mailer_date);
                            ?>
                            <tr class="<?php
                    if ($i & 1) {
                        echo'alternate';
                    } else {
                        echo '';
                    }
                            ?>">
                                <td align="left"><input name="chk_delete[]" id="chk_delete[]" type="checkbox" value="<?php echo(stripslashes($data->contact_mailer_id)); ?>" /></td>
                                <td align="left"><?php echo(stripslashes($data->contact_mailer_name)); ?></td>
                                <td align="left"><?php echo(stripslashes($data->contact_mailer_email)); ?></td>
                                <td align="left"><?php echo(stripslashes($data->contact_mailer_phone)); ?></td>
                                <td align="left"><?php echo(stripslashes($data->contact_mailer_company)); ?></td>                               
                                <td align="left"><?php echo(stripslashes($data->contact_mailer_message)); ?></td>
                                

                                <td align="left"><a title="Delete" onClick="javascript:deleteIt('<?php echo($data->contact_mailer_id); ?>')" href="javascript:void(0);"></a> </td>
                            </tr>
                            <?php $i = $i + 1;
                        }
                        ?>
                    </tbody>
                </table>
                <table width="100%" style="padding-bottom:10px;padding-top:10px;">
                    <tr>
                        <td align="left"><input class="button-primary"  name="multidelete" type="submit" id="multidelete" value="Delete Multiple Records"></td>
                        <td align="right">
                            <input name="text_management" lang="text_management" class="button-primary" onClick="location.href='options-general.php?page=ContactMailer/contact_form.php'" value="Go to - View contact details" type="button" />
                            <input name="setting_management" lang="setting_management" class="button-primary" onClick="location.href='options-general.php?page=ContactMailer/setting.php'" value="Go to - Setting Page" type="button" /></td>
                    </tr>
                </table>
            </form>


        </div>
    </div>
    <?php
}

function contact_mailer_add_to_menu() {
    if (is_admin()) {
        add_menu_page('Contact Enquires', 'Contact Enquires', 'manage_options', __FILE__, 'contact_mailer_admin');
        add_options_page('Contact Enquires', '', 'manage_options', "ContactMailer/setting.php", '');
    }
}

function contact_mailer_add_javascript_files() {

    wp_enqueue_style('ContactMailer', get_option('siteurl') . '/wp-content/plugins/ContactMailer/style.css');
    wp_enqueue_script('ContactMailer', get_option('siteurl') . '/wp-content/plugins/ContactMailer/contact_form.js');
}

add_action('admin_menu', 'contact_mailer_add_to_menu');

add_action('wp_enqueue_scripts', 'contact_mailer_add_javascript_files');

add_action("plugins_loaded", "contact_mailer_widget_init");
register_activation_hook(__FILE__, 'contact_mailer_install');
register_deactivation_hook(__FILE__, 'contact_mailer_deactivation');
add_action('init', 'contact_mailer_widget_init');
?>