<?php
		include_once('../includes/connection.php');
		include_once('../bz/Themes.php');
		
		//declare varaibles
		$message_success = 'Flyer Theme Saved!';
		$message_error = 'Error while inserting';
		$message_exists = 'This Theme Already exists';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		
	
		if(Themes::checkThemeLanguage($_POST)>0)
		{
			if(Themes::updateThemeLanguage($_POST)==1)
				{
					$success = 1;
					$message = $message_success;
				}
		}
		else
		
		
		{
				if(Themes::insertThemeLanguage($_POST)==1)
				{
					$success = 1;
					$message = $message_success;
				}
			
		}
			
			
	
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;	
?>

