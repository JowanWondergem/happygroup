<?php

	if(@file_exists('includes/functions.php') ) {
    	include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}

  class Category
  {
     function getAllCategories($lan = 2) 
	{ 
		$query = mysql_query('SELECT * FROM categories_lan WHERE id_lan = '.$lan.' ORDER BY category ASC') or die('Error get categories'.mysql_error());		
		return  pushResultInArray($query);	
	}
	
	
	function getCategoryById($id)
	{
			$query = mysql_query('SELECT * FROM categories WHERE id = "'.mysql_prep($id).'"') or die(mysql_error());
			return  pushResultInSimpleArray($query);
  	}
	
	
	function getCategoryLanById($id, $id_lan)
	{
			$query = mysql_query('SELECT * FROM categories_lan WHERE id_category = "'.mysql_prep($id).'" AND id_lan = "'.mysql_prep($id_lan).'"') or die(mysql_error());
			return  pushResultInSimpleArray($query);
  	}
	
	function insertCategory($_POST)
	{
			$query = mysql_query('INSERT INTO categories (text)  VALUES ("'.mysql_prep($_POST['text']).'")') or die(mysql_error());
			if($query)
			return	1;
			else
			return	0;
  	}
	
	function updateCategory($_POST)
	{
			$query = mysql_query('UPDATE categories SET text = "'.mysql_prep($_POST['text']).'" WHERE id = "'.mysql_prep($_POST['id']).'"') or die(mysql_error());
			if($query)
			return	1;
			else
			return	0;
  	}
	
	function insertCategoryLan($_POST)
	{
			$query = mysql_query('INSERT INTO categories_lan (id_lan, id_category, category )  VALUES ("'.mysql_prep($_POST['id_lan']).'",
			"'.mysql_prep($_POST['id']).'","'.mysql_prep($_POST['text']).'")') or die(mysql_error());
			if($query)
			return	1;
			else
			return	0;
  	}
	
	
	function updateCategoryLan($_POST)
	{
			$query = mysql_query('UPDATE categories_lan SET category = "'.mysql_prep($_POST['text']).'" WHERE id_category = "'.mysql_prep($_POST['id']).'" AND id_lan = "'.mysql_prep($_POST['id_lan']).'"') or die(mysql_error());
			if($query)
			return	1;
			else
			return	0;
  	}
	
	
	
	
  }




?>