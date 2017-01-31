<?php
		include_once('../includes/connection.php');
		include_once('../bz/Slider.php');
		
		//declare varaibles
		$message_success = 'Updated!';
		$message_error = 'Error while updating';
		$message = $message_error;
		$success = 0;
		$id = 0;
		$id_slider = 0;
		$errors_occured = 0;
		
			
		// TABLE SLIDER
		
		$Slider = Slider::getSliderInfo($_POST['id']);
		//
		if(!empty($Slider)) 									//table slider exist -> update
		{
			$id_slider = Slider::UpdateSliderInfo($_POST); 		// table slider inserted!
			if($id_slider!=0)
			{
				
			}
		}
		else													//table slider not exist -> insert
		{
			$id_slider = Slider::InsertSliderInfo($_POST); 		// table slider inserted!
			if($id_slider!=0)
			{
				
			}
		}
		
		
		
		// TABLE SLIDER LAN
		
		
		
		$SliderLan = Slider::getSliderInfoLan($_POST['id'],$_POST['id_lan']);
		if(!empty($SliderLan)) 							//table slider lan exist -> update
		{
			if(Slider::UpdateSliderInfoLan($_POST)==1)
			{
				
				$success = 1;
				$message = $message_success;
			}
		}
		else											//table slider lan not exist -> insert
		{
			
			if(Slider::InsertSliderInfoLan($_POST, $id_slider)==1)
			{
				$success = 1;
				$message = $message_success;
			}
		}
		
		
		
			
			
	
		$json_arr = array("success"=> $success,"message"=> $message,"id"=> $id_slider);
		print_r(json_encode( $json_arr ));
		exit;
		
		
		
		
		
		
		
		
		
		/*
		
		if(Slider::UpdateSliderInfo($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
			}	
		if(Slider::InsertSliderInfo($_POST)==1)
			{
				$success = 1;
				$message = $message_success;
			}
			else
			{
				$id = 
			}*/
?>