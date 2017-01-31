<?php
		include_once('../includes/connection.php');
		include_once('../bz/WebsitePartners.php');
		
		//declare varaibles
		$message = '';
		$discount_perc = "";
		$discount_text = "";
		$message_success = "Deleted!";
		$message_error = 'Error while deleting';
		$message = $message_error;
		$success = 0;
		
		$Discount = WebsitePartners::getWebsitePartnerDiscountsLan($_POST['id_lan'],$_POST['id_partner'],$_POST['id_discount']);
	
		if(count($Discount)>0)
		{
			$discount_perc = $Discount['discount_perc'];
			$discount_text = $Discount['discount_text'];
			$message = $message_success;
			$success = 1;
		}
		
		
		
		$json_arr = array("discount_perc"=>$discount_perc,"discount_text"=>$discount_text,"success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>