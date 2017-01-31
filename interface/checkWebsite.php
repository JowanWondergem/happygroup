<?php

	include('../includes/connection.php');
	include('../includes/functions.php');

	$message = "";
	$message_ok = 'domain is still available!';
	$message_error = 'domain is taken!';
	$message = $message_error;
	$success = 0;

	$query = mysql_query('SELECT id FROM partners WHERE url_website = "'.mysql_prep($_POST['url_tester']).'"') or die(mysql_error());
	if(mysql_num_rows($query)==0)
	{
		$message = $message_ok;
		$success = 1;
	}
	
	$json_arr = array("message"=>$message,"success"=>$success);
	print_r(json_encode( $json_arr ));
	exit;
	
?>