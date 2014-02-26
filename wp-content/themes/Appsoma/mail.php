<?php


/**
 * Template Name:mail
 * 
 *
 *
 */



get_header(1);
$to = "sonia.wilson26@gmail.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "hi@innomindtech.com";
$headers = "From:" . $from;
@wp_mail($to,$subject,$message,$headers);
echo "Mail Sent.";


get_footer();
?>

