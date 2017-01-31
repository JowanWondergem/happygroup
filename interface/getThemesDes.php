<?php
	include_once('../includes/connection.php');
	include_once('../bz/Themes.php');
	$Themes = Themes::getDescriptionOfTheme($_POST['id'], $_POST['lan']);
	if(!empty($Themes))
	{
		$theme 			= $Themes['theme'];
	}
	else
	{
		$theme 			= "";
	}
	
	
	$json_arr = array("theme"=> $theme);
	print_r(json_encode( $json_arr ));
	exit;
	
?>