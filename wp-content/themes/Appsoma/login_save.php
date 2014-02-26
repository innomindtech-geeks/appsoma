<?php 
$base = dirname(__FILE__); 
require( dirname(dirname(dirname($base))) .'/wp-blog-header.php');

if(isset($_POST['testcookie'])){
		global $wpdb;
		$username = $wpdb->escape($_REQUEST['log']);  
		$password = $wpdb->escape($_REQUEST['pwd']);  
		$rememberme = $wpdb->escape($_REQUEST['rememberme']);     
		if($remember) $remember = "true";  
		else $remember = "false";
		
			$user = wp_authenticate( $username, $password );
			if( is_wp_error( $user ) )
			{
				echo $error = $user->get_error_message();
				
			}else{
			
			$username		=	(isset($_POST['log'])) ? $_POST['log'] : '';
			$password		=	(isset($_POST['pwd'])) ? $_POST['pwd'] : '';
			$rememberme	=	(isset($_POST['rememberme'])) ? '1' : '0';
			
				$credentials = array();
				$credentials['user_login'] = $username;
				$credentials['user_password'] = $password;
				$credentials['remember'] = $rememberme;
				$user = wp_signon( $credentials, false );

				if ( is_wp_error( $user ) ) {
					echo $error = $user->get_error_message();
				} else {
					wp_set_current_user( $user->ID, $username );
					do_action('set_current_user');
					echo "success";
					exit;
					
					
			}
		}
	}
	
	?>
	