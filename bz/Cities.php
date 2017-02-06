<?php
  
  if(@file_exists('includes/functions.php') ) {
    include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
  
  class Cities
  {
     function getAllCities($lan = 2) 
	{ 
		$query = mysql_query('	
								SELECT c.*, cl.city, col.country, al.area FROM cities AS c, cities_lan AS cl, countries_lan AS col,areas_lan AS al
								WHERE 
								c.id = cl.id_city AND cl.id_lan = '.$lan.'
								AND c.id_country = col.id_country AND col.id_lan = '.$lan.'
								AND c.id_area = al.id_area AND al.id_lan = '.$lan.'
								ORDER BY cl.city ASC
								') or die('Error get cities'.mysql_error());
								
		return  pushResultInArray($query);		
	}	
 
  

     function getAllCitiesFromArea($lan = 2, $country=172, $area) 
	{ 
		$query = mysql_query('	
								SELECT c.id, cl.city FROM cities AS c, cities_lan AS cl
								WHERE c.id = cl.id_city 
								AND cl.id_lan = '.$lan.'
								AND c.id_country = '.$country.'
								AND c.id_area = '.$area.'
								
								') or die('Error get cities'.mysql_error());
								
		return  pushResultInArray($query);		
	}	
	
	
	
	
	function getAllCitiesFromAreaList($lan = 2, $country = 172, $area) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT c.id, cl.city FROM cities AS c, cities_lan AS cl
								WHERE c.id = cl.id_city 
								AND cl.id_lan = '.$lan.'
								AND c.id_country = '.$country.'
								AND c.id_area = '.$area.'
								
								') or die('Error get areas'.mysql_error());
								
		$list='';
		
		while($row = mysql_fetch_array($query))
		{
			$list .= '<option value="'.$row['id'].'">'.$row['city'].'</option>';
			
		}
		
		echo $list;
		
	}
	
	
	function InsertCity()
	{
		$query = mysql_query('INSERT INTO cities (id_country, id_area, code, text) 
							  VALUES ("'.mysql_prep($_POST['id_country']).'",
							  "'.mysql_prep($_POST['id_area']).'",
							  "'.mysql_prep($_POST['code']).'",
							  "'.mysql_prep($_POST['text']).'")') or die('Error insert card info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function UpdateCity()
	{
		$query = mysql_query('UPDATE cities SET id_country = "'.mysql_prep($_POST['id_country']).'",
												id_area = "'.mysql_prep($_POST['id_area']).'",
												code = "'.mysql_prep($_POST['code']).'",
												text = "'.mysql_prep($_POST['text']).'"
												WHERE id = "'.mysql_prep($_POST['id']).'"
												') or die('Error insert card info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	
	function getCityById($id_city) 
	{ 
		$query = mysql_query('	
								SELECT * FROM cities
								WHERE  id = '.$id_city.' LIMIT 1
								') or die('Error get cities'.mysql_error());
								
		return  pushResultInSimpleArray($query);		
	}
	
	
	function getCityTranslationById($id_city, $id_lan) 
	{ 
		$query = mysql_query('	
								SELECT city FROM cities_lan 
								WHERE id_lan = '.$id_lan.'
								AND id_city = '.$id_city.' LIMIT 1
								') or die('Error get cities'.mysql_error());
								
		return  pushResultInSimpleArray($query);		
	}	
	
	function insertCityTranslation()
	{
		$query = mysql_query('INSERT INTO cities_lan (id_lan, id_city, city) 
							  VALUES ("'.mysql_prep($_POST['id_lan']).'",
							  "'.mysql_prep($_POST['id_city']).'",
							  "'.mysql_prep($_POST['city']).'"
							  )') or die('Error insert city trans info'.mysql_error());
		if($query)
			return	1;
		else
			return	0;
		
	}
	
	function UpdateCityTranslation()
	{
		$query = mysql_query('UPDATE cities_lan SET city = "'.mysql_prep($_POST['city']).'" WHERE id = "'.mysql_prep($_POST['id_city']).'"') or die('Error edting city trans info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function DeleteCity($id)
	{
		$query = mysql_query('DELETE FROM cities WHERE id = '.$id.'') or die('Error Deleting City info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	
	
	
	
	
	
	
	
   }
  
?>