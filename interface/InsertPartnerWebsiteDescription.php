<?php
		include_once('../includes/connection.php');
		include_once('../admin_partner/ui/locale/locale-'.$_POST['lang'].'.php');
		include_once('../bz/WebsitePartners.php');
		
		//declare varaibles
		$message = '';
		$message_success = $l_message_texts_saved;
		$message_error = $l_message_texts_error;
		$message = $message_error;
		$success = 0;
		
		
		
		$Partner = WebsitePartners::getWebsitePartnerDescriptionLan($_POST['id_lan'], $_POST['id']);
		
		//if description already exists UPDATE
		if(!empty($Partner))
		{
			
			$Partner = WebsitePartners::EditWebsitePartnerDescriptionLan($_POST['id_lan'], $_POST['id'],$_POST['description_website']);
			if($Partner==1)
			{
				$message = $message_success;
				$success = 1;
			}
			
		}
		//INSERT
		else
		{
			$Partner = WebsitePartners::InsertWebsitePartnerDescriptionLan($_POST['id_lan'], $_POST['id'],$_POST['description_website']);
			if($Partner==1)
			{
				$message = $message_success;
				$success = 1;
			}
		}
	
	
			
	
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;	
?>

