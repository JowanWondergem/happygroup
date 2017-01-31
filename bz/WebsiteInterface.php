<?php

   if(@file_exists('includes/functions.php') ) {
    	include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
  
  class WebsiteInterface
  {
     function getAboutUs($lan = 2) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT il.text FROM interface AS i, interface_lan AS il
								WHERE 
								i.section = "about_us"
								AND i.id = il.id_interface
								AND il.id_lan = '.$lan.'
								
								') or die('Error get aboutus'.mysql_error());
								
		
		
		return  pushResultInSimpleArray($query);
		
	}
	
	 function getFlashDiscounts($lan = 2) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT * FROM flash_discounts
								WHERE  id_lan = '.$lan.'
								
								') or die('Error get flash discounts'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	
	
	 function getWebsitePartnerTexts($lan = 2) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT il.text FROM interface AS i, interface_lan AS il
								WHERE 
								i.section = "website_partner"
								AND i.id = il.id_interface
								AND il.id_lan = '.$lan.'
								
								') or die('Error get aboutus'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	 function getFlyersTexts($lan = 2) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT il.text FROM interface AS i, interface_lan AS il
								WHERE 
								i.section = "flyers"
								AND i.id = il.id_interface
								AND il.id_lan = '.$lan.'
								
								') or die('Error get flyers'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	
	
	function UpdateAboutUs()
	{
		$query = mysql_query(
		'UPDATE interface_lan SET 	
		text = "'.mysql_prep($_POST['text']).'"
		WHERE id_interface = 3 AND id_lan = "'.mysql_prep($_POST['id_lan']).'"
		') or die('Error updating aboutus info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	function InsertAboutUs()
	{
		$query = mysql_query('INSERT INTO interface_lan(id_lan,id_interface,text) VALUES("'.mysql_prep($_POST['id_lan']).'",
							3,"'.mysql_prep($_POST['text']).'")'
		) or die('Error inserting aboutus info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	function UpdateFlashDiscounts()
	{
		
		$_POST['text'] = cleanEditor($_POST['text']);
	
		$query = mysql_query(
		'UPDATE flash_discounts SET 	
		text = "'.mysql_prep($_POST['text']).'"
		WHERE  id_lan = "'.mysql_prep($_POST['id_lan']).'"
		') or die('Error updating newsflash info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	function InsertFlashDiscounts()
	{
		$_POST['text'] = cleanEditor($_POST['text']);
		$query = mysql_query('INSERT INTO flash_discounts(id_lan,text) VALUES("'.mysql_prep($_POST['id_lan']).'",
							"'.mysql_prep($_POST['text']).'")'
		) or die('Error inserting newsflash info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	 function getAllTranslations($lan = 2) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT i.*,il.text FROM interface AS i, interface_lan AS il
								WHERE 
								i.id = il.id_interface
								AND il.id_lan = '.$lan.'
								
								') or die('Error get all trnas'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	
	
  }
  





?>