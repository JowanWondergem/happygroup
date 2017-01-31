<?php

   if(@file_exists('includes/functions.php') ) {
    	include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
  
  class Slider
  {
     function getSliderImages($lan = 2) 
	{ 
	
	
	
		$query = mysql_query('	SELECT s.image, s.active, sl.*
								FROM slider AS s, slider_lan AS sl
								WHERE s.id = sl.id_slider 
								AND s.id IS NOT NULL AND sl.id_slider IS NOT NULL
								AND sl.id_lan = '.$lan.' AND s.active = 1 
								ORDER BY id DESC
								') or die('Error get slider'.mysql_error());
								
		
		return  pushResultInArray($query);
		
	}
	
	function InsertSliderInfo()
	{
		$query = mysql_query('INSERT INTO slider(active) VALUES("'.mysql_prep($_POST['active']).'")'
		) or die('Error insert slider info'.mysql_error());
	
		if($query)
			return	mysql_insert_id();
		else
			return	0;
		
	}
	
	function InsertSliderInfoLan($id_slider)
	{
		$query = mysql_query('INSERT INTO slider_lan(id_lan,id_slider,title, subtitle) VALUES("'.mysql_prep($_POST['id_lan']).'",
							"'.$id_slider.'","'.mysql_prep($_POST['title']).'","'.mysql_prep($_POST['subtitle']).'")'
		) or die('Error insert slider lan info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
		
	}
	
	function UpdateSliderInfo()
	{
		$query = mysql_query(
		'UPDATE slider SET 	active = "'.mysql_prep($_POST['active']).'"
		WHERE id = "'.mysql_prep($_POST['id']).'"
		') or die('Error updating slider info info'.mysql_error());
	
		if($query)
			return	$_POST['id'];
		else
			return	0;
		
		
	}
	
	
	function UpdateSliderInfoLan()
	{
		$query = mysql_query(
		'UPDATE slider_lan SET 	
		title = "'.mysql_prep($_POST['title']).'", subtitle = "'.mysql_prep($_POST['subtitle']).'"
		WHERE id_slider = "'.mysql_prep($_POST['id']).'" AND id_lan = "'.mysql_prep($_POST['id_lan']).'"
		') or die('Error updating slider info info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	
	}
	
	
	function getSliderInfo($id) 
	{ 
		$query = mysql_query('	SELECT *
								FROM slider
								WHERE id = '.$id.'
								 LIMIT 1
								') or die('Error get partners'.mysql_error());
								
		return  pushResultInSimpleArray($query);	
	}
	
	function getSliderInfoLan($id, $lan) 
	{ 
		$query = mysql_query('	SELECT *
								FROM slider_lan
								WHERE id_slider = '.$id.' AND id_lan = '.$lan.'
								 LIMIT 1
								') or die('Error get partners'.mysql_error());
								
		return  pushResultInSimpleArray($query);	
	}
	
	
	
	function deleteSlider()
	{
		$query = mysql_query("DELETE FROM slider WHERE id=".$_POST['id']) or die(mysql_error());
		$query2 = mysql_query("DELETE FROM slider_lan WHERE id_slider=".$_POST['id']) or die(mysql_error());	
		$dir = '../media/slider/'.$_POST['id'].'/';
		EmptyDir($dir);
			    	
	
		if($query )
			return	1;
		else
			return	0;
	} 
	
	
	function getDescriptionOfSlider($id, $lan) 
	{ 
		$query = mysql_query('	SELECT *
								FROM slider_lan
								
								WHERE id_slider = '.$id.' AND id_lan = '.$lan.'
								 LIMIT 1
								') or die('Error get slider desc'.mysql_error());
								
		return  pushResultInSimpleArray($query);	
	}
	
	
	
	
	
  }
  





?>