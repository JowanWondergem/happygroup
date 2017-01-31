<?php
	include_once('../includes/connection.php');
	include_once('../bz/Slider.php');
	$Slider = Slider::getDescriptionOfSlider($_POST['id'], $_POST['lan']);
	if(!empty($Slider))
	{
		$json_arr = array("success"=> 1,"title"=> $Slider['title'],"subtitle"=> $Slider['subtitle']);
		print_r(json_encode( $json_arr ));
		exit;
		
	}
	else
	{
		$json_arr = array("success"=> 1,"title"=> '',"subtitle"=> '');
		print_r(json_encode( $json_arr ));
		exit;
		
	}
	
?>