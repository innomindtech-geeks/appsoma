<div class="wrap">
  <h2>Personal Demo Request Settings</h2>
  <?php
global $wpdb, $wp_version;


$request_mailer_title = get_option('request_mailer_title');
$request_mailer_On_SendEmail = get_option('request_mailer_On_SendEmail');
$request_mailer_On_MyEmail = get_option('request_mailer_On_MyEmail');
$request_mailer_On_Subject = get_option('request_mailer_On_Subject');

if (@$_POST['request_mailer_submit']) 
{
	$request_mailer_title = stripslashes($_POST['request_mailer_title']);
	$request_mailer_On_Homepage = stripslashes($_POST['request_mailer_On_Homepage']);
	$request_mailer_On_Posts = stripslashes($_POST['request_mailer_On_Posts']);
	$request_mailer_On_Pages = stripslashes($_POST['request_mailer_On_Pages']);
	$request_mailer_On_Search = stripslashes($_POST['request_mailer_On_Search']);
	$request_mailer_On_Archives = stripslashes($_POST['request_mailer_On_Archives']);
	$request_mailer_On_SendEmail = stripslashes($_POST['request_mailer_On_SendEmail']);
	$request_mailer_On_MyEmail = stripslashes($_POST['request_mailer_On_MyEmail']);
	$request_mailer_On_Subject = stripslashes($_POST['request_mailer_On_Subject']);
	
	update_option('request_mailer_title', $request_mailer_title );
	update_option('request_mailer_On_Homepage', $request_mailer_On_Homepage );
	update_option('request_mailer_On_Posts', $request_mailer_On_Posts );
	update_option('request_mailer_On_Pages', $request_mailer_On_Pages );
	update_option('request_mailer_On_Search', $request_mailer_On_Search );
	update_option('request_mailer_On_Archives', $request_mailer_On_Archives );
	update_option('request_mailer_On_SendEmail', $request_mailer_On_SendEmail );
	update_option('request_mailer_On_MyEmail', $request_mailer_On_MyEmail );
	update_option('request_mailer_On_Subject', $request_mailer_On_Subject );
}

echo '<table width="100%" border="0" cellspacing="5" cellpadding="0">';
echo '<tr>';
echo '<td align="left">';
echo '<form name="form_request_mailer" method="post" action="">';
echo '<p>Title:<br><input  style="width: 350px;" type="text" value="';
echo $request_mailer_title . '" name="request_mailer_title" id="request_mailer_title" /></p>';
echo '<br><p>Send Email to Admin (i.e receive email when user submit the form in the front end):<br><input  style="width: 300px;" type="text" value="';
echo $request_mailer_On_SendEmail . '" name="request_mailer_On_SendEmail" id="request_mailer_On_SendEmail" maxlength="3" /> ( YES/NO )</p>';
echo '<p>Enter Email Address:<br><input  style="width: 300px;" type="text" value="';
echo $request_mailer_On_MyEmail . '" name="request_mailer_On_MyEmail" id="request_mailer_On_MyEmail" /> ( Enter your email id to receive emails )</p>';
echo '<p>Enter Email Subject:<br><input  style="width: 300px;" type="text" value="';
echo $request_mailer_On_Subject . '" name="request_mailer_On_Subject" id="request_mailer_On_Subject" /> ( Email subject)</p>';
echo '<input type="submit" id="request_mailer_submit" name="request_mailer_submit" lang="publish" class="button-primary" value="Update Setting" value="1" />';
echo '</form>';
echo '</td>';
echo '<td align="center">';

echo '</td>';
echo '</tr>';
echo '</table>';

?>
<div style="float:right;">
  <input name="text_management" lang="text_management" class="button-primary" onClick="location.href='options-general.php?page=RequestDemo/request_form.php'" value="Go to - View request details" type="button" />
  <input name="setting_management" lang="setting_management" class="button-primary" onClick="location.href='options-general.php?page=RequestDemo/setting.php'" value="Go to - Setting Page" type="button" />
  <input name="Help" lang="publish" class="button-primary" onclick="" value="Help" type="button" /></td>
</div>




</div>
