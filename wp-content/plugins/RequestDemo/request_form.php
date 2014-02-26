<?php
/*
  Plugin Name: RequestDemo
  Description: RequestDemo  plugin
  Author: Innomind Technologies
  Author URI: http://innomindtech.com/
 */

function request_mailer() {
    ?>
    
     <form id="request_form">
            <div class="form-group">
                <div class="col-xs-12">
                  <input type="text" class="form-control validate[required]" id="name" name="name" placeholder="Your Name" data-prompt-position="bottomLeft">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="email" class="form-control validate[required,custom[email]]" id="email" name="email" placeholder="Email" data-prompt-position="bottomLeft">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12 submitBut">
                  <button type="submit" class="cta blue">Request Demo</button>
                </div>
              </div>
           </form>

    <?php
}

function request_mailer_install() {
    global $wpdb, $wp_version;
    $request_mailer_table = $wpdb->prefix . "request_mailer";
    add_option('request_mailer_table', $request_mailer_table);

    if ($wpdb->get_var("show tables like '" . $request_mailer_table . "'") != $request_mailer_table) {
        $wpdb->query("CREATE TABLE IF NOT EXISTS `" . $request_mailer_table . "`(
			  `request_mailer_id` int(11) NOT NULL auto_increment,
			  `request_mailer_name` varchar(120) NOT NULL,
			  `request_mailer_email` varchar(120) NOT NULL,			   
				  PRIMARY KEY  (`request_mailer_id`) )
			");
    }

    add_option('request_mailer_title', "Personal Demo Request"); 
    add_option('request_mailer_On_SendEmail', "YES");
    add_option('request_mailer_On_MyEmail', "test@somedomain.com");
    add_option('request_mailer_On_Subject', "request form");
    add_option('request_mailer_On_Message', "request form");
}

function request_mailer_widget($args) {

    if ($display == "show") {
        extract($args);
        echo $before_widget . $before_title;
        echo get_option('request_mailer_title');
        echo $after_title;
        request_mailer();
        echo $after_widget;
    }
}

function request_mailer_control() {

    echo 'To change the setting goto  request form link on Setting menu.';
    echo '<br><a href="options-general.php?page=RequestDemo/setting.php">';
    echo 'click here</a></p>';
}

//
function request_mailer_widget_init() {
    if (function_exists('wp_register_sidebar_widget')) {
        wp_register_sidebar_widget('request form', 'request form', 'request_mailer_widget');
    }

    if (function_exists('wp_register_widget_control')) {
        wp_register_widget_control('request form', array('request form', 'widgets'), 'request_mailer_control');
    }
}

function request_mailer_deactivation() {
    // No action required
}

function request_mailer_admin() {
    ?>
    <div class="wrap">
        <div class="tool-box">
            <?php
            global $wpdb;
            $request_mailer_table = get_option('request_mailer_table');

            $chk_delete = @$_POST['chk_delete'];
            if (!empty($chk_delete)) {
                $count = count($chk_delete);
                for ($i = 0; $i < $count; $i++) {
                    $del_id = $chk_delete[$i];
                    $sql = "delete FROM $request_mailer_table WHERE request_mailer_id=" . $del_id;
                    $wpdb->get_results($sql);
                }
            }


            if (@$_GET["doAction"] == "DEL" && @$_GET["request_id"] > 0) {

                $wpdb->get_results("delete from $request_mailer_table where request_mailer_id=" . @$_GET["request_id"]);
            }

            $data = $wpdb->get_results("select * from $request_mailer_table order by request_mailer_id desc");
            if (empty($data)) {
                echo "<div id='message' class='error'><p>No data found. Click setting page to change the settings.</p></div>";
            }
            ?>
            <h2>Personal Demo Request</h2>
            <table width="100%" style="padding-bottom:10px;padding-top:10px;">
                <tr>
                    <td align="right">
                        <input name="text_management" lang="text_management" class="button-primary" onClick="location.href='options-general.php?page=RequestDemo/request_form.php'" value="Go to - View request details" type="button" />
                        <input name="setting_management" lang="setting_management" class="button-primary" onClick="location.href='options-general.php?page=RequestDemo/setting.php'" value="Go to - Setting Page" type="button" />

                    </td>
                </tr>
            </table>

            <script language="javascript" type="text/javascript">
            	
                function deleteIt(id)
                {
                    if(confirm("Do you want to delete this record?"))
                    {
                        document.frm.action="options-general.php?page=RequestDemo/request_form.php&doAction=DEL&request_id="+id;
                        document.frm.submit();

                    }
                }	
            	
                function deleteMulti()
                {
                    if(confirm("Do you want to delete the selected record(s)?"))
                    {
                        if(confirm("Are you sure you want to delete?"))
                        {
                            document.frm.action="options-general.php?page=RequestDemo/request_form.php";
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
                            <th align="left"></th>
                        </tr>
                    <thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($data as $data) {
                            $_date = mysql2date(get_option('date_format'), $data->request_mailer_date);
                            ?>
                            <tr class="<?php
                    if ($i & 1) {
                        echo'alternate';
                    } else {
                        echo '';
                    }
                            ?>">
                                <td align="left"><input name="chk_delete[]" id="chk_delete[]" type="checkbox" value="<?php echo(stripslashes($data->request_mailer_id)); ?>" /></td>
                                <td align="left"><?php echo(stripslashes($data->request_mailer_name)); ?></td>
                                <td align="left"><?php echo(stripslashes($data->request_mailer_email)); ?></td>                         
                            

                                <td align="left"><a title="Delete" onClick="javascript:deleteIt('<?php echo($data->request_mailer_id); ?>')" href="javascript:void(0);"></a> </td>
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
                            <input name="text_management" lang="text_management" class="button-primary" onClick="location.href='options-general.php?page=RequestDemo/request_form.php'" value="Go to - View request details" type="button" />
                            <input name="setting_management" lang="setting_management" class="button-primary" onClick="location.href='options-general.php?page=RequestDemo/setting.php'" value="Go to - Setting Page" type="button" /></td>
                    </tr>
                </table>
            </form>


        </div>
    </div>
    <?php
}

function request_mailer_add_to_menu() {
    if (is_admin()) {
        add_menu_page('Personal Demo Request', 'Personal Demo Request', 'manage_options', __FILE__, 'request_mailer_admin');
        add_options_page('Personal Demo Request', '', 'manage_options', "RequestDemo/setting.php", '');
    }
}

function request_mailer_add_javascript_files() {

    wp_enqueue_style('RequestDemo', get_option('siteurl') . '/wp-content/plugins/RequestDemo/style.css');
    wp_enqueue_script('RequestDemo', get_option('siteurl') . '/wp-content/plugins/RequestDemo/request_form.js');
}

add_action('admin_menu', 'request_mailer_add_to_menu');

add_action('wp_enqueue_scripts', 'request_mailer_add_javascript_files');

add_action("plugins_loaded", "request_mailer_widget_init");
register_activation_hook(__FILE__, 'request_mailer_install');
register_deactivation_hook(__FILE__, 'request_mailer_deactivation');
add_action('init', 'request_mailer_widget_init');
?>