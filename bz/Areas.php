<?php

  
  
 
  if(@file_exists('includes/functions.php') ) {
    include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
  
  
  class Areas
  {
     function getAllAreas($lan = 2) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT a.*, al.area, cl.country FROM areas AS a, areas_lan AS al, countries_lan AS cl
								WHERE a.id = al.id_area 
								AND al.id_lan = '.$lan.'
								AND a.id_country = cl.id_country
								AND cl.id_lan = '.$lan.' 
								ORDER BY al.area ASC
								
								') or die('Error get areas'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	function getAllAreasFromCountry($lan = 2, $country = 172) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT a.id, al.area FROM areas AS a, areas_lan AS al
								WHERE a.id = al.id_area 
								AND al.id_lan = '.$lan.'
								AND a.id_country = '.$country.'
								
								') or die('Error get areas'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	function getAllAreasFromCountryList($lan = 2, $country = 172) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT a.id, al.area FROM areas AS a, areas_lan AS al
								WHERE a.id = al.id_area 
								AND al.id_lan = '.$lan.'
								AND a.id_country = '.$country.'
								
								') or die('Error get areas'.mysql_error());
								
		$list='';
		
		while($row = mysql_fetch_array($query))
		{
			$list .= '<option value="'.$row['id'].'">'.$row['area'].'</option>';
			
		}
		
		echo $list;
		
	}
	
	
	
	
	
  }
  
?>