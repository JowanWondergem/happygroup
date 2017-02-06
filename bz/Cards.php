<?php

   


	if(@file_exists('includes/functions.php') ) {
    include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
	
	
   
 
  
  class Cards
  {
	  function getAllCards($lan = 2) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT c. * ,  cl.name, cl.subtitle, cl.duration,  cl.description
								FROM `cards` AS c
								LEFT JOIN cards_lan AS cl ON c.id = cl.id_card AND cl.id_lan ='.$lan.'
								WHERE  c.active = 1
								ORDER BY id DESC
								
								
								') or die('Error get partners'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	
	
	function InsertCardInfo()
	{
		$query = mysql_query('INSERT INTO cards (active,price) 
							  VALUES ("'.mysql_prep($_POST['active']).'","'.mysql_prep($_POST['price']).'")') or die('Error insert card info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	 function getCardInfoById($id) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT *
								FROM `cards` 
								WHERE  id = '.$id.'
								
								
								') or die('Error get cards'.mysql_error());
								
		
		
		return  pushResultInSimpleArray($query);
		
	}
	
	
	function getDescriptionOfCard($id_card, $lan) 
	{ 
		$query = mysql_query('	SELECT *
								FROM cards_lan
								
								WHERE id_card = '.$id_card.' AND id_lan = '.$lan.'
								 LIMIT 1
								') or die('Error get cards'.mysql_error());
								
		return  pushResultInSimpleArray($query);	
	}
	
	function UpdateCardDescription()
	{
		$query = mysql_query(
		'UPDATE cards_lan SET 	
		name = "'.mysql_prep($_POST['name']).'",
		subtitle = "'.mysql_prep($_POST['subtitle']).'",
		duration = "'.mysql_prep($_POST['duration']).'",
		description = "'.mysql_prep($_POST['description']).'"
		WHERE id_card = "'.mysql_prep($_POST['id_card']).'" AND id_lan = "'.mysql_prep($_POST['id_lan']).'"
		') or die('Error updating card info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	function InsertCardDescription()
	{
		$query = mysql_query('INSERT INTO cards_lan (id_card,id_lan,name, subtitle, duration, description) VALUES("'.mysql_prep($_POST['id_card']).'",
							"'.mysql_prep($_POST['id_lan']).'","'.mysql_prep($_POST['name']).'","'.mysql_prep($_POST['subtitle']).'","'.mysql_prep($_POST['duration']).'"
							,"'.mysql_prep($_POST['description']).'")'
		) or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
		function UpdateCardInfo()
	{
		$query = mysql_query(
		'UPDATE cards SET 	active = "'.mysql_prep($_POST['active']).'",
		price = "'.mysql_prep($_POST['price']).'"
		WHERE id = "'.mysql_prep($_POST['card_id']).'"
		') or die('Error updating card info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function DeleteCard($id)
	{
		$query = mysql_query("DELETE FROM cards WHERE id=".$id."") or die(mysql_error());	
		$query2 = mysql_query("DELETE FROM cards_lan WHERE id_card=".$id."") or die(mysql_error());	
		$dir = '../media/cards/'.$id.'/';
		EmptyDir($dir);
		if($query && $query2)
			return	1;
		else
			return	0;
	}
	
	
	  
	  
  }




?>