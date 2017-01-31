<?php
		include_once('../includes/connection.php');
		include_once('../bz/Admins.php');
		
		//declare varaibles
		$message = '';
		$message_error = 'Username and Password don\'t match!';
		
		$success = 0;
		
		$AdminDetials = Admins::checkLogin($_POST);

		if(empty($AdminDetials)) // query ok?
		{
			$message = $message_error;	
		}
		else	
		{
			//set all admin details in session
			session_start();
			$_SESSION['admin_id'] 				= $AdminDetials['id'];
			$_SESSION['admin_image'] 			= $AdminDetials['image'];
			$_SESSION['admin_f_name'] 			= $AdminDetials['first_name'];
			$_SESSION['admin_l_name'] 			= $AdminDetials['last_name'];
			$_SESSION['admin_email_private'] 	= $AdminDetials['email_private'];
			$_SESSION['admin_email_company'] 	= $AdminDetials['email_company'];
			$_SESSION['admin_phone'] 			= $AdminDetials['phone'];
			$_SESSION['admin_mobile_phone'] 	= $AdminDetials['mobile_phone'];
			$_SESSION['lang'] 					= 'pt';
			
			$success = 1;

		}
		
		
		
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>