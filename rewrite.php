<?php

	 if(@file_exists('includes/functions.php') ) {
    	include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
	
	#remove the directory path we don't want 
  	$request  =  $_SERVER['REQUEST_URI']; 
  	#split the path by '/' 
	$params = array(); 
  	$params     = explode("/", $request); 
	$company_website = end($params);
	
	$query = mysql_query("SELECT * FROM partners WHERE `url_website`='".mysql_prep($company_website)."' LIMIT 1");  
    $row = mysql_fetch_array($query);  
    if(!empty($row)) 
	{
		$id_partner = $row['id'];  
		
    } 
	else 
	{  
	 	redirect_to('404.php');
    } 
	 #keeps users from requesting any file they want  
	/*  $safe_pages = array("users", "search", "thread");  
	  if(!in_array($params[0], $safe_pages)) {  
		//include($params[0].".php");  
	  } else {  
		include("404.php");  
	  } 
*/
?>