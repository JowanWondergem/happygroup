<?php

   


	if(@file_exists('includes/functions.php') ) {
    include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
	
	
   
 
  
  class Contact
  {
	  function getAllContact() 
	{ 
		$query = mysql_query('	SELECT *
								FROM `contact` AS c
								WHERE  c.active = 1
								') or die('Error get contacts'.mysql_error());
								
		return  pushResultInArray($query);
		
	}
	
	 function getContactById($id) 
	{ 
		$query = mysql_query('	SELECT *
								FROM `contact` AS c
								WHERE  c.active = 1 AND id = '.$id.'
								') or die('Error get contact'.mysql_error());
								
		return  pushResultInSimpleArray($query);
		
	}
	
	function InsertContact()
	{
		$query = mysql_query('INSERT INTO contact (active,name, place, address, zip_code, telephone, fax, email) 
							  VALUES ("'.mysql_prep($_POST['active']).'","'.mysql_prep($_POST['name']).'","'.mysql_prep($_POST['place']).'","'.mysql_prep($_POST['address']).'",
							  "'.mysql_prep($_POST['zip_code']).'","'.mysql_prep($_POST['telephone']).'","'.mysql_prep($_POST['fax']).'","'.mysql_prep($_POST['email']).'")') or die('Error insert contact info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function UpdateContact()
	{
		$query = mysql_query(
		'UPDATE contact SET 	
		active = "'.mysql_prep($_POST['active']).'",
		name = "'.mysql_prep($_POST['name']).'",
		place = "'.mysql_prep($_POST['place']).'", 
		address = "'.mysql_prep($_POST['address']).'", 
		zip_code = "'.mysql_prep($_POST['zip_code']).'", 
		telephone = "'.mysql_prep($_POST['telephone']).'", 
		fax = "'.mysql_prep($_POST['fax']).'", 
		email = "'.mysql_prep($_POST['email']).'"
		WHERE id = "'.mysql_prep($_POST['id']).'"
		') or die('Error updating contact info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	
	function deleteContact($id)
	{
		$query = mysql_query("DELETE FROM contact WHERE id=".$id) or die(mysql_error());

		if($query )
			return	1;
		else
			return	0;
	} 
	
	
	  
	  
  }




?>