<?php
		include_once('../includes/connection.php');
		include_once('../bz/Cities.php');
		
		//declare varaibles
		$message_success = 'Succesfully Inserted!';
		$message_error = 'Error while inserting';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		
		$City = Cities::getCityTranslationById($_POST['id_city'],$_POST['id_lan']);
		if(!empty($City))
		{
				$city = $City['city'];
		}
		else
		{
				$city = ""; 
		}
	
					
		
		

		$json_arr = array("success"=> $success,"message"=> $message, "city" => $city);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>