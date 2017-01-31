<?php


 
    
	function pushResultInArray($query)
	{
		$n =  mysql_num_rows($query);
		$Array = array();
		for($i=0;$i<$n;$i++)
		{
			$Array[]= mysql_fetch_array($query);
			
		}
		
		return $Array;
	}
	
	function pushResultInSimpleArray($query)
	{
		$n =  mysql_num_rows($query);
		$Array = array();
		for($i=0;$i<$n;$i++)
		{
			$Array= mysql_fetch_array($query);
			
		}
		
		return $Array;
	}
	
	function mysql_prep( $value ) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return euroISO15toUTF($value);
	}

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysql_error());
		}
	}
	
	function euroUTFtoISO15($text) //Euro + utf to iso encoding fox for ajax requests
	{
		//array with char to find
		$enc_vars= array(chr(128));
		//array with char to substitute
		$replace_vars = array( chr(164));
		$new_text = mb_convert_encoding(str_replace($enc_vars,$replace_vars,$text), 'UTF-8', 'ISO-8859-15');
		return $new_text;
	}
	
	
	function euroISO15toUTF($text) //Euro + utf to iso encoding fox for ajax requests
	{
		//array with char to find
		$enc_vars= array('€',"'", chr(146));
		//array with char to substitute
		$replace_vars = array('',"'", "'");
		$new_text = utf8_decode(str_replace($enc_vars,$replace_vars,$text));//, 'ISO-8859-15', 'UTF-8');
		return $new_text;
	}
	
	function startSession()
	{
		session_start();
	}
	
	
	function sentEmail($to, $subject,$message,$from)
	{
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From:" . $from;  
		
		if(mail($to,$subject,$message,$headers))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	function getRootUrl()
	{
		$local = array('localhost', '127.0.0.1');
		if(in_array($_SERVER['HTTP_HOST'], $local))
		{
			// Database Constants LOCALHOST
			return 'http://localhost/HAPPYGROUP/';
		}
		else
		{
			// Database Constants ONLINE
			return 'http://www.jowandesign.com/HAPPYGROUP/';
		}
	}
	
	
	function getRootDocument()
	{
		$local = array('localhost', '127.0.0.1');
		if(in_array($_SERVER['HTTP_HOST'], $local))
		{
			// Database Constants LOCALHOST
			return $_SERVER['DOCUMENT_ROOT'].'HAPPYGROUP/';
		}
		else
		{
			// Database Constants ONLINE
			return $_SERVER['DOCUMENT_ROOT'].'HAPPYGROUP/';
		}
	}
	
	
	
	
	function goback()
	{
		header("Location: {$_SERVER['HTTP_REFERER']}");
		exit;
	}
	
	
	function cleanEditor($text)
	{
		
	/*	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
</head>
<body>*/
		
		return $text;
	}



	function substractingDate($date_renewal,$year=0,$months=0,$weeks=0, $days=0)
	{
			//calculate date before renewel 
		
			$date_before_renewal = strtotime ( '-'.$year.' year' , strtotime ( $date_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '-'.$months.' month' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '-'.$weeks.' week' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '-'.$days.' day' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
		
			return $date_before_renewal;	
	}
	
	function addingDate($date_renewal,$year=0,$months=0,$weeks=0, $days=0)
	{
			//calculate date before renewel 
		
			$date_before_renewal = strtotime ( '+'.$year.' year' , strtotime ( $date_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '+'.$months.' month' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '+'.$weeks.' week' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '+'.$days.' day' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
		
			return $date_before_renewal;	
	}
	
	
	function calculateDaysLeft($date_start, $date_end)
	{
		$timefromdb = date("Y-m-d",strtotime($date_start));
		$future_year = date("Y",strtotime($date_end));
		$future_month = date("m",strtotime($date_end));
		$future_day = date("d",strtotime($date_end));
		$future = date("Y-m-d",strtotime($date_end));
		
		$hours_left = (mktime(0,0,0,$future_month,$future_day,$future_year) - time())/3600; 
		$daysLeft = ceil($hours_left/24);
		return $daysLeft;
	}






?>