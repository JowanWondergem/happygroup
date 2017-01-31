<?php
		include_once('../includes/connection.php');
		include_once('../bz/Partners.php');
		
		//declare varaibles
		$message_success = 'Partner Updated!';
		$message_error = 'Error while updating';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		
			
		
		
		$Partner = Partners::getDescriptionOfPartner($_POST['id_partner'], $_POST['id_lan']);
		if(!empty($Partner))
		{
			if(Partners::UpdatePartnerDescription($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
			}	
		}
		else
		{
			if(Partners::InsertPartnerDescription($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
			}
		}
			
			
	
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;
?>