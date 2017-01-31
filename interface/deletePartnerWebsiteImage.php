<?php
		include_once('../includes/connection.php');
		include_once('../bz/WebsitePartners.php');
		
		//declare varaibles
		$message = '';
		$message_success = "Deleted!";
		$message_error = 'Error while deleting';
		$message = $message_error;
		$success = 0;
		
		$Image = WebsitePartners::getWebsitePartnerImageById($_POST['id'],$_POST['id_partner']); 
		
	
		if(WebsitePartners::deleteWebsitePartnerImage($_POST['id'],$_POST['id_partner'])==1)
		{
			
			unlink('../media/partners/'.$Image['url']);
			$message = $message_success;
			$success = 1;
		}
		
		
		
		$json_arr = array("success"=> $success,"message"=> $Image['url']);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>