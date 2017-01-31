<?php

  
  

 if(@file_exists('includes/functions.php') ) {
    	include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
  
  
  class Totals
  {
     function getAllPartners() 
	{ 
		$query = mysql_query('SELECT id FROM partners WHERE active = 1 ') or die('Error get areas'.mysql_error());
		return  mysql_num_rows($query);
	}
	
	function getAllWebsites() 
	{ 
		$query = mysql_query('SELECT id FROM partners WHERE has_happy_website = 1 ') or die('Error get areas'.mysql_error());
		return  mysql_num_rows($query);
	}
	
	function getAllCartholders() 
	{ 
		$query = mysql_query('	SELECT id FROM cartholders') or die('Error get areas'.mysql_error());
		return  mysql_num_rows($query);
	}
	
	
	
	
	
	
  }
  
?>