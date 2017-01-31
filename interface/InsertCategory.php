<?php
		include_once('../includes/connection.php');
		include_once('../bz/Category.php');
		
		//declare varaibles
		$message_success = 'Succesfully Saved!';
		$message_error = 'Error while inserting';
		$message = $message_error;
		$success = 0;
		
			if($_POST['id']==0)
			{
				if(Category::insertCategory($_POST)==1)
				{					
					$id = mysql_insert_id(); 
					$_POST['id'] = $id;	
				}	
			}
			
			
			$Category = Category::getCategoryLanById($_POST['id'],$_POST['id_lan']);
			if(!empty($Category))
			{
				if(Category::updateCategoryLan($_POST)==1)
				{
					$success = 1;
					$message = $message_success;
				}
				
			}
			else
			{
				 if(Category::insertCategoryLan($_POST)==1)
				 {
					$success = 1;
					$message = $message_success; 
				 }
			}
		$json_arr = array("success"=> $success,"message"=> $message, "id"=> $_POST['id']);
		print_r(json_encode( $json_arr ));
		exit;
	
		
		  
		
		
	
?>