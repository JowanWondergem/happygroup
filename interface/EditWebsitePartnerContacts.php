<?php
		include_once('../includes/connection.php');
		include_once('../admin_partner/ui/locale/locale-'.$_POST['lang'].'.php');
		include_once('../bz/Partners.php');
		
		//declare varaibles
		$message_success = $l_message_contacts_saved;
		$message_error = $l_message_contacts_error;
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		
	
			if(Partners::UpdatePartnerWebsiteInfo($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
				
			}			
		

		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>