<?php
	$base = dirname(__FILE__); 
    require( dirname(dirname(dirname($base))) .'/wp-blog-header.php');
            global $wpdb;
			$email = $_POST['email'];
			$username = $_POST['name'];
			$password = $_POST['password'];						
			wp_create_user( $username, $password, $email );
			wp_redirect( home_url() );			
			if ( is_wp_error($status) ){
						echo $error = $status->get_error_message();
						exit;
					}else {
						 $from = get_option('admin_email');
						 $headers = 'MIME-Version: 1.0' . "\r\n";
                         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						 $headers = 'From: '.$from . "\r\n";
						 $subject = "Appsoma Registration successful";
						 $msg = "Registration successful.\nYour login details\nUsername: $username\nPassword: $password";
						@mail( $email, $subject, $msg, $headers );
						echo "\r\n<font color='red'>Please check your email for login details.</font>";
			 			echo "success";
			            exit;
					}
			
								
				?>