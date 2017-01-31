<?php
		session_start();
		if($_POST['lan']!='unactive')
		{
			$_SESSION['lang'] = $_POST['lan'];
			$success = 1;
			$message = '';
		}
		else
		{
			$success = 0;
			$message = 'Coming Soon!';
		}
		
		
		$json_arr = array("success"=> $success,"message"=> $message);
		print_r(json_encode( $json_arr ));
		exit;	
?>