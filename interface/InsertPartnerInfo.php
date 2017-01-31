<?php
		include_once('../includes/connection.php');
		include_once('../bz/Partners.php');
		
		//declare varaibles
		$message_success = 'Succesfully Inserted, Now we go to step 2 to save the images!';
		$message_error = 'Error while inserting';
		$message_error_email = 'Email already exists!';
		$message_error_website = ' Website already exists!';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		
		
		if(Partners::checkWebsite($_POST)>0)
		{
			$message = $message_error_website;
			$errors_occured += 1;
		}
		
		if($_POST['email']!='')
		{
			if(count(Partners::checkEmail($_POST['email']))>0)
			{
				$message .= $message_error_email;
				$errors_occured += 1;
			}
		}
		
		if($errors_occured==0)
		{
			if(Partners::InsertPartnerInfo($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
				$id = mysql_insert_id(); 
				
			}			
		}

		$json_arr = array("success"=> $success,"message"=> $message, "id"=>$id);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>