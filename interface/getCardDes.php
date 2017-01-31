<?php
	include_once('../includes/connection.php');
	include_once('../bz/Cards.php');
	$Card = Cards::getDescriptionOfCard($_POST['id'], $_POST['lan']);
	if(!empty($Card))
	{
		$name 			= $Card['name'];
		$subtitle 		= $Card['subtitle'];
		$duration 		= $Card['duration'];
		$description 	= $Card['description']; 
	}
	else
	{
		$name 			= "";
		$subtitle 		= "";
		$duration 		= "";
		$description 	= "";
	}
	
	
	$json_arr = array("name"=> $name,"subtitle"=> $subtitle, "duration"=>$duration, "description"=>$description);
	print_r(json_encode( $json_arr ));
	exit;
	
?>