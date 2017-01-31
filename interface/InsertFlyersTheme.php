<?php
		include_once('../includes/connection.php');
		include_once('../bz/Themes.php');
		
		//declare varaibles
		$message_success = 'Flyer Theme Saved!';
		$message_error = 'Error while inserting';
		$message_exists = 'This Theme Already exists';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$errors_occured = 0;
		$_POST['id_theme'] = 0;
		$id_theme = $_POST['id_theme'];
		
		///$Card = Cards::getDescriptionOfCard($_POST['id_card'], $_POST['id_lan']);
		if(Themes::checkTheme($_POST)>0)
		{
				$success = 0;
				$message = $message_exists;
			
		}
		else
		{
			if(Themes::InsertTheme($_POST)==1)
			{
				$_POST['id_theme'] = mysql_insert_id();
				$id_theme = $_POST['id_theme'];
				if(Themes::insertThemeLanguage($_POST)==1)
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

