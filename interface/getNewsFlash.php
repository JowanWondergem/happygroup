<?php
	include_once('../includes/connection.php');
	include_once('../bz/WebsiteInterface.php');
	$NewsFlash = WebsiteInterface::getFlashDiscounts($_POST['lan']);
	if(!empty($NewsFlash))
	{
		print_r($NewsFlash[0]['text']); 
	}
	else
	{
		echo '';
	}
	
?>