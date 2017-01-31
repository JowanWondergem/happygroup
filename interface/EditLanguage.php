<?php

		include_once('../includes/connection.php');
		include_once('../bz/Language.php');
		
		//declare varaibles
		$message_success = 'Succesfully Saved!';
		$message_error = 'Error while inserting';
		$message_exists = 'Language Code already exists!';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		

			if(Language::UpdateLanguage($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
			}			
		
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>