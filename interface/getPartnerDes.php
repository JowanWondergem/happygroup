<?php
	include_once('../includes/connection.php');
	include_once('../bz/Partners.php');
	$Partner = Partners::getDescriptionOfPartner($_POST['id'], $_POST['lan']);
	if(!empty($Partner))
	{
		
		$json_arr = array("description"=> $Partner['description_happy'],"discount"=> $Partner['description_discount']);
		print_r(json_encode( $json_arr ));
		exit;
	}
	else
	{
		$json_arr = array("description"=> '',"discount"=> '');
		print_r(json_encode( $json_arr ));
		exit;
	}
	
?>