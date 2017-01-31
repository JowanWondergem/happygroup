<?php
		include_once('../includes/connection.php');
		include_once('../bz/Admins.php');
		
		//declare varaibles
		$message_success = 'Succesfully Updated!';
		$message_error = 'Old Password is not correct';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		
		if(Admins::checkAdminPassword($_POST)==1)
		{
			if(Admins::updateAdminPassword($_POST['id'],$_POST['password_new'])==1)
			{
				$success = 1;
				$message = $message_success;
			}
		}		
		
	
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>