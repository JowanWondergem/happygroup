<?php
	include_once('../includes/connection.php');
	include_once('../bz/WebsiteInterface.php');
	$AboutUs = WebsiteInterface::getAboutUs($_POST['lan']);
	if(!empty($AboutUs) && isset($AboutUs['text']))
	{
		print_r($AboutUs['text']); 
	}
	else
	{
		echo '';
	}
	
?>