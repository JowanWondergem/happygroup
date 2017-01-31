<?php
		include_once('../includes/connection.php');
		include_once('../bz/WebsiteInterface.php');
		
		//declare varaibles
		$message_success = 'Updated!';
		$message_error = 'Error while updating';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		
			
		
		
		$Text = WebsiteInterface::getFlashDiscounts($_POST['id_lan']);
		if(!empty($Text))
		{
			if(WebsiteInterface::UpdateFlashDiscounts($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
			}	
		}
		else
		{
			if(WebsiteInterface::InsertFlashDiscounts($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
			}
		}
			
			
	
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;
?>