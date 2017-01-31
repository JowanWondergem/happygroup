<?php
		include_once('../includes/connection.php');
		include_once('../bz/Partners.php');
		
		//declare varaibles
		$message = '';
		$message_error = 'Username and Password don\'t match!';
		
		$success = 0;
		
		$PartnerDetails = Partners::checkLogin($_POST);

		if(empty($PartnerDetails)) // query ok?
		{
			$message = $message_error;	
		}
		else	
		{
			//set all partner details in session
			session_start();
			$_SESSION['partner_id'] 				= $PartnerDetails['id'];
			$_SESSION['partner_logo'] 				= $PartnerDetails['logo'];
			$_SESSION['partner_name'] 				= $PartnerDetails['name'];
			$_SESSION['partner_id_country'] 		= $PartnerDetails['id_country'];
			$_SESSION['partner_id_area'] 			= $PartnerDetails['id_area'];
			$_SESSION['partner_id_city'] 			= $PartnerDetails['id_city'];
			$_SESSION['partner_id_category'] 		= $PartnerDetails['id_category'];
			$_SESSION['partner_address'] 			= $PartnerDetails['address'];
			$_SESSION['partner_zip_code'] 			= $PartnerDetails['zip_code'];
			$_SESSION['partner_email'] 				= $PartnerDetails['email'];
			$_SESSION['partner_url_website'] 		= $PartnerDetails['url_website'];
			$_SESSION['partner_phone'] 				= $PartnerDetails['phone'];
			$_SESSION['partner_mobile_phone'] 		= $PartnerDetails['mobile_phone'];
			$_SESSION['partner_mobile_fax'] 		= $PartnerDetails['fax'];
			$_SESSION['partner_date_creation']		= $PartnerDetails['date_creation'];
			$_SESSION['lang'] 						= 'pt';
			$_SESSION['id_lan'] 					= 2;
			
			$success = 1;

		}
		
		
		
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>