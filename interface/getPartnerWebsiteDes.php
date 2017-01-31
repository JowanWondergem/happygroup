<?php
	include_once('../includes/connection.php');
	include_once('../bz/WebsitePartners.php');
	$Partner = WebsitePartners::getWebsitePartnerInfo($_POST['lan'], $_POST['id']);
	if(!empty($Partner))
	{
		
		$json_arr = array("description"=> $Partner['description_website']);
		print_r(json_encode( $json_arr ));
		exit;
	}
	else
	{
		$json_arr = array("description"=> '');
		print_r(json_encode( $json_arr ));
		exit;
	}
	
?>