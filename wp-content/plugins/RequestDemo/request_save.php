<?php
session_start();

$request_abspath = dirname(__FILE__);
$request_abspath_1 = str_replace('wp-content/plugins/RequestDemo', '', $request_abspath);
$request_abspath_1 = str_replace('wp-content\plugins\RequestDemo', '', $request_abspath_1);
require_once($request_abspath_1 . 'wp-config.php');



$request_mailer_table = $wpdb->prefix . 'request_mailer';
$request_mailer_name = $_POST['name'];
$request_mailer_email = $_POST['email'];

$table = $wpdb->prefix . 'request_mailer';
$sql = "INSERT INTO " . $table . " (
`request_mailer_id` ,
`request_mailer_name` ,
`request_mailer_email`  
)
VALUES (
NULL ,  '" . mysql_real_escape_string(trim($request_mailer_name)) . "',
    '" . mysql_real_escape_string(trim($request_mailer_email)) . "')";
		
	
		
		
$sql = @$wpdb->prepare($sql,null);
$_ressql =$wpdb->query($sql);
//echo $_ressql;
	$ret="failed";
if($_ressql==1){
	
$ret="success"	;
//echo $ret;
} else{
	//echo $ret;
$ret="failed"	;
}

//echo $ret;
$request_On_SendEmail = get_option('request_mailer_On_SendEmail');
$request_by_mail = get_option('request_mailer_On_MyEmail');
//$request_by_mail = get_option('request_mailer_fromemail');

$request_title = get_option('request_mailer_title');
$request_On_Subject = get_option('request_mailer_On_Subject');
$request_On_Message = get_option('request_mailer_On_Message');

if ($request_On_SendEmail == "YES") {
    if ($request_by_mail <> "test@somedomain.com") {
        
        $sender_name = ucfirst($request_mailer_name);
        $sender_email = mysql_real_escape_string(trim($request_mailer_email));
        $subject = $request_On_Subject;
        $subject = $request_title;

        $mailtext = "<b> New Personal Demo Request</b>";

        $mailtext .="<p>Name :" . $request_mailer_name . "</p>";
        $mailtext .="<p>Email :" . $sender_email . "</p>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers .= "From: \"$sender_name\" <$sender_email>\n";

        $mailtext = str_replace("\r\n", "<br />", $mailtext);
        @wp_mail($request_by_mail, $subject, $mailtext, $headers);
//echo $ret;
      // @wp_mail($request_by_mail, $subject, $mailtext, $headers)
	   
   
	 }
    echo "success";
} else {
    echo "fail";
}
?>