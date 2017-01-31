<?php
		include_once('../includes/connection.php');
		include_once('../bz/Cards.php');
		
		//declare varaibles
		$message_success = 'Succesfully Inserted, Now we go to step 2 to save the images!';
		$message_error = 'Error while inserting';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		
		if($errors_occured==0)
		{
			if(Cards::InsertCardInfo($_POST)==1)
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