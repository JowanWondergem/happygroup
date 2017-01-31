<?php
		include_once('../includes/connection.php');
		include_once('../includes/functions.php');
		
		//declare varaibles
		$message = '';
		$message_success = "Deleted!";
		$message_error = 'Error while deleting';
		$message = $message_error;
		$success = 0;
		$errors = 0;
		
		foreach($_POST['arr_partners'] as $partner_id)
		{
			$query = mysql_query("DELETE FROM partners WHERE id=".$partner_id."") or die(mysql_error());	
			$query2 = mysql_query("DELETE FROM partners_images WHERE id_partner=".$partner_id."") or die(mysql_error());	
			if(!$query && !$query2)
			{
				$errors++;
			}
		}
		
		if($errors==0)
			{
				$message = $message_success;
				$success = 1;
			}
		
		
		
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>