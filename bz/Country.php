<?php

   if(@file_exists('includes/functions.php') ) {
    	include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
  
  class Country
  {
     function getAllCountries($lan = 2) 
	{ 
		$query = mysql_query('	
								SELECT c.*, cl.country FROM countries AS c, countries_lan AS cl
								WHERE c.id = cl.id_country 
								AND cl.id_lan = '.$lan.'
								ORDER BY cl.country ASC
								
								') or die('Error get countries'.mysql_error());
								
		return  pushResultInArray($query);		
	}	
  }
  
?>