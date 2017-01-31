<?php

   if(@file_exists('includes/functions.php') ) {
    	include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
  
  class Themes
  {
     function getAllThemes($lan = 2) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT t.*, tl.theme FROM themes AS t, themes_lan AS tl
								WHERE t.id = tl.id_theme 
								AND tl.id_lan = '.$lan.'
								
								') or die('Error get themes'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	
	function getDescriptionOfTheme($id, $lan) 
	{ 
		$query = mysql_query('	SELECT *
								FROM themes_lan
								
								WHERE id_theme = '.$id.' AND id_lan = '.$lan.'
								 LIMIT 1
								') or die('Error get cards'.mysql_error());
								
		return  pushResultInSimpleArray($query);	
	}
	
	
	function checkTheme($_POST)
	{
		$query = mysql_query('SELECT id FROM themes WHERE theme = "'.mysql_prep($_POST['theme']).'"');
	
		if($query)
			return	mysql_num_rows($query);
		else
			return	-1;
	}
	
	function checkThemeLanguage($_POST)
	{
		$query = mysql_query('SELECT id FROM themes_lan WHERE id_theme = "'.mysql_prep($_POST['id_theme']).'" AND id_lan = "'.mysql_prep($_POST['id_lan']).'"');
	
		if($query)
			return	mysql_num_rows($query);
		else
			return	-1;
	}
	
	
	function updateTheme($_POST)
	{
		$query = mysql_query('UPDATE themes SET theme = "'.mysql_prep($_POST['theme']).'"
							WHERE id = "'.$_POST['id_theme'].'"
							') or die('Error update theme info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function insertTheme($_POST)
	{
		$query = mysql_query('INSERT INTO themes (theme) VALUES ("'.mysql_prep($_POST['theme']).'")') or die('Error insert themes info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	function insertThemeLanguage($_POST)
	{
		$query = mysql_query('INSERT INTO themes_lan (id_lan,id_theme,theme) VALUES ("'.mysql_prep($_POST['id_lan']).'","'.mysql_prep($_POST['id_theme']).'","'.mysql_prep($_POST['theme']).'")') or die('Error insert themes info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function updateThemeLanguage($_POST)
	{
		$query = mysql_query('UPDATE themes_lan SET 
							id_lan = "'.mysql_prep($_POST['id_lan']).'"
							,id_theme = "'.mysql_prep($_POST['id_theme']).'"
							, theme = "'.mysql_prep($_POST['theme']).'"	
							WHERE id_theme = "'.$_POST['id_theme'].'" AND id_lan = "'.$_POST['id_lan'].'"
							') or die('Error update themes langauges info'.mysql_error());
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function DeleteTheme($id)
	{
		$query = mysql_query('DELETE FROM themes WHERE id = "'.$id.'"') or die('Error update themes langauges info'.mysql_error());
		$query2 = mysql_query('DELETE FROM themes_lan WHERE id_theme = "'.$id.'"') or die('Error update themes langauges info'.mysql_error());
		if($query && $query2)
			return	1;
		else
			return	0;
	}
	
	
	
	
	
  }
  
?>