<?php
		include_once('../includes/connection.php');
		include_once('../bz/Cities.php');
		
		//declare varaibles
		$message_success = 'Succesfully Saved!';
		$message_error = 'Error while inserting';
		$message = $message_error;
		$success = 1;
		$id = 0;
		$errors_occured = 0;
		$City = Cities::getCityTranslationById($_POST['id_city'],$_POST['id_lan']);
		if(!empty($City))
		{
			if(Cities::updateCityTranslation($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
			}	
		}
		else
		{
			if(Cities::insertCityTranslation($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
			}
		}
	
						
		
		

		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>