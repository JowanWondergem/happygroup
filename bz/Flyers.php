<?php

	
  if(file_exists('includes/functions.php') ) {
    include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}

  class Flyers
  {
	 
	 function getAllFlyers($lan = 2) 
	{ 
		$query = mysql_query('	SELECT  f.*, cl.city, al.area, tl.theme
								FROM flyers AS f
								LEFT JOIN cities_lan AS cl ON f.id_city = cl.id_city AND cl.id_lan ='.$lan.'
								LEFT JOIN areas_lan AS al ON f.id_area = al.id_area AND al.id_lan ='.$lan.'
								LEFT JOIN themes_lan AS tl ON f.id_theme = tl.id_theme AND tl.id_lan ='.$lan.'	
								ORDER BY id DESC
							  '
							
		
		
							) or die('Error get categories'.mysql_error());		
		return  pushResultInArray($query);	
	}
	  
	  
     function getAllCitiesFlyers($lan = 2) 
	{ 
		$query = mysql_query('SELECT DISTINCT f.*, cl.city
							  FROM flyers AS f, cities_lan AS cl
							  WHERE 
							  f.id_city IS NOT NULL  
							  AND f.id_city = cl.id_city 
							  AND cl.id_lan = '.$lan.'	
							  '
							
		
		
							) or die('Error get categories'.mysql_error());		
		return  pushResultInArray($query);	
	}
	
	 function getAllAreasFlyers($lan = 2) 
	{ 
		$query = mysql_query('SELECT DISTINCT f.*, al.area
							  FROM flyers AS f, areas_lan AS al
							  WHERE 
							  f.id_area IS NOT NULL 
							  AND f.id_area = al.id_area 
							  AND al.id_lan = '.$lan.'	
							  '
							
		
		
							) or die('Error get areas'.mysql_error());		
		return  pushResultInArray($query);	
	}
	
	 function getAllThemesFlyers($lan = 2) 
	{ 
		$query = mysql_query('SELECT DISTINCT f.*, tl.theme
							  FROM flyers AS f, themes_lan AS tl
							  WHERE 
							  f.id_theme IS NOT NULL  
							  AND f.id_theme = tl.id_theme 
							  AND tl.id_lan = '.$lan.'	
							  '
							
		
		
							) or die('Error get themes'.mysql_error());		
		return  pushResultInArray($query);	
	}
	
	
	
  
  
  
  
   function getFlyerById($id,$lan = 2) 
	{ 
		$query = mysql_query('	SELECT *
								FROM flyers 
								WHERE id= '.$id.' AND id_lan ='.$lan.' LIMIT 1	
							  ') or die('Error get categories'.mysql_error());		
		return  pushResultInSimpleArray($query);	
	}
	  
  
  	function deleteFlyer($id)
	{
		$query = mysql_query("DELETE FROM flyers WHERE id=".$id."") or die(mysql_error());	
		$dir = '../media/flyers/'.$id.'/';
		EmptyDir($dir);
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function insertFlyerInfo($_POST)
	{
		$query = mysql_query('INSERT INTO flyers (active,id_lan, id_admin, id_city, id_area, id_theme) 
							  VALUES ("'.mysql_prep($_POST['active']).'","'.mysql_prep($_POST['id_lan']).'","'.mysql_prep($_POST['id_admin']).'",
							  "'.mysql_prep($_POST['id_city']).'","'.mysql_prep($_POST['id_area']).'","'.mysql_prep($_POST['id_theme']).'")') or die('Error insert flyer info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function updateFlyerInfo($_POST)
	{
		$query = mysql_query('UPDATE flyers SET active = "'.mysql_prep($_POST['active']).'"
							,id_lan = "'.mysql_prep($_POST['id_lan']).'"
							,id_admin = "'.mysql_prep($_POST['id_admin']).'"
							, id_city = "'.mysql_prep($_POST['id_city']).'"
							, id_area = "'.mysql_prep($_POST['id_area']).'"
							, id_theme = "'.mysql_prep($_POST['id_theme']).'"
							WHERE id = "'.$_POST['id'].'"
							') or die('Error update flyer info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	
	
	
	
	

}



?>