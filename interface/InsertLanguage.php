<?php

		include_once('../includes/connection.php');
		include_once('../bz/Language.php');
		
		//declare varaibles
		$message_success = 'Succesfully Inserted!';
		$message_error = 'Error while inserting';
		$message_exists = 'Language Code already exists!';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		
		if(Language::checkLanguageCode($_POST)==0)	
		{	

			if(Language::InsertLanguage($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
				$id = mysql_insert_id(); 
				
			}			
		}
		else
		{
			$success = 0;
			$message = $message_exists;
		}
		$json_arr = array("success"=> $success,"message"=> $message, "id"=>$id);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>