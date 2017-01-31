<?php
		include_once('../includes/connection.php');
		include_once('../bz/Admins.php');
		
		//declare varaibles
		$message = '';
		$message_success = "Deleted!";
		$message_error = 'Error while deleting';
		$message = $message_error;
		$success = 0;
		
	
		if(Admins::DeleteAdmin($_POST)==1)
		{
			$message = $message_success;
			$success = 1;
		}
		
		
		
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>