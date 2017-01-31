<?php
		include_once('../includes/connection.php');
		include_once('../admin_partner/ui/locale/locale-'.$_POST['lang'].'.php');
		include_once('../bz/WebsitePartners.php');
		
		//declare varaibles
		$message_success = $l_message_discount_saved;
		$message_error = $l_message_discount_error;
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		
	
		//if no id given , lets insert
		if($_POST['id_discount']=='')
		{
			$PartnerDiscount = WebsitePartners::InsertWebsitePartnerDiscounts($_POST['id_partner']);
			if($PartnerDiscount!=0)
			{
				$PartnerDiscountLan = WebsitePartners::InsertWebsitePartnerDiscountsLan($PartnerDiscount,$_POST['id_partner'],$_POST['id_lan'],
				$_POST['discount_perc'],$_POST['discount_text']);
				if($PartnerDiscountLan==1)
				{
					$success = 1;
					$message = $message_success;
				}
			}
		}
		//if id given lets update
		else
		{
				$PartnerDiscountLan = WebsitePartners::getWebsitePartnerDiscountsLan($_POST['id_lan'],$_POST['id_partner'],$_POST['id_discount']);
				//if language description already exists
				if(count($PartnerDiscountLan)>0)
				{
					$PartnerDiscount = WebsitePartners::EditWebsitePartnerDiscountsLan($_POST['id_discount'],$_POST['id_partner'],$_POST['id_lan'],
					$_POST['discount_perc'],$_POST['discount_text']);
					if($PartnerDiscount==1)
					{
						$success = 1;
						$message = $message_success;
					}
				}
				else
				{
					$PartnerDiscountLan = WebsitePartners::InsertWebsitePartnerDiscountsLan($_POST['id_discount'],$_POST['id_partner'],$_POST['id_lan'],
					$_POST['discount_perc'],$_POST['discount_text']);
					if($PartnerDiscountLan==1)
					{
						$success = 1;
						$message = $message_success;
					}
				}
			
		
		 
		}
		
	
			
	
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;	
?>

