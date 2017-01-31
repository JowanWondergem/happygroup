<?php
		include_once('../includes/connection.php');
		include_once('../includes/functions.php');
		
		//declare varaibles
		$message_success = 'Succesfully Inserted, Now we go to step 2 to save the images!';
		$message_error = 'Error while inserting';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		
		
		if($errors_occured==0)
		{
			$query = mysql_query('UPDATE partners SET img_s ="'.mysql_prep($_POST['active']).'", img_b = "'.mysql_prep($_POST['has_happy_website']).'"') or die('Error insert partner images'.mysql_error());
			if($query1)
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