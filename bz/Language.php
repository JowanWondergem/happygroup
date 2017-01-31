<?php

  if(@file_exists('includes/functions.php') ) {
    	include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
  
  class Language
  {
     function getAllLanguages() 
	{ 
		$query = mysql_query('	
								SELECT * FROM languages
								
								
								') or die('Error get languages'.mysql_error());
								
		return  pushResultInArray($query);		
	}	
	
	
	 function getLanguagesById($id) 
	{ 
		$query = mysql_query('	
								SELECT * FROM languages WHERE id = '.$id.' 
								
								
								') or die('Error get languages'.mysql_error());
								
		return  pushResultInSimpleArray($query);		
	}	
	
	
	function checkLanguageCode($_POST)
	{
		$query = mysql_query('SELECT code FROM languages WHERE code = "'.mysql_prep($_POST['code']).'"');
		return(mysql_num_rows($query));
	}
	
	function InsertLanguage($_POST)
	{
		
		$query = mysql_query('INSERT INTO languages (code, text) 
							  VALUES ("'.strtoupper(mysql_prep($_POST['code'])).'","'.mysql_prep($_POST['text']).'")') or die('Error insert partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	
		
	}
	
	function UpdateLanguage($_POST)
	{
		$query = mysql_query(
		'UPDATE languages SET 	
		code = "'.mysql_prep($_POST['code']).'",
		text = "'.mysql_prep($_POST['text']).'"
		WHERE id = "'.mysql_prep($_POST['id']).'"
		') or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	function DeleteLanguage($id)
	{
		$query = mysql_query(
		'DELETE FROM languages WHERE id = '.$id.'
		') or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	
	
	
	
  }
  
?>