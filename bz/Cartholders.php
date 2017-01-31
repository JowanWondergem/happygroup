<?php

 
 
		   if(@file_exists('includes/functions.php') ) {
			include_once('includes/functions.php');
			} 
			else {
			   include_once('../includes/functions.php');
			}
  
  
  class Cartholders
  {
     function getAllCartHolders($lan = 2) 
	{ 
	
	
	
		$query = mysql_query('	SELECT c.*, cl.country
								FROM cartholders AS c
								LEFT JOIN countries_lan AS cl ON c.id_country = cl.id_country AND cl.id_lan ='.$lan.'
								') or die('Error get carthilders'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	
	function registerNewCartHolder($FORM_FIELDS)
	{
		startSession();
		
		//check if email exists
		$check_query = mysql_query('SELECT id FROM cartholders WHERE email = "'.$FORM_FIELDS['cartholder_email'].'"
								') or die('Error while trying to register cartholder'.mysql_error());
		
		if(mysql_num_rows($check_query)>0)
		{
			 // prepare error message
			 $_SESSION['errors'] = array();
			 $_SESSION['errors'][0] = 'Emial exists';
			 redirect_to("../inscribe.php");
		}
		else
		{
		 
		// send to database
		$query = mysql_query('INSERT INTO cartholders VALUES(NULL,"'.mysql_prep($FORM_FIELDS['cartholder_agent']).'","'.mysql_prep($FORM_FIELDS['card_type']).'","'.mysql_prep($FORM_FIELDS['cartholder_first_name']).'"
							,"'.mysql_prep($FORM_FIELDS['cartholder_last_name']).'","'.mysql_prep($FORM_FIELDS['cartholder_date_birth']).'","'.mysql_prep($FORM_FIELDS['cartholder_phone']).'"
							,"'.mysql_prep($FORM_FIELDS['cartholder_mobile_phone']).'","'.mysql_prep($FORM_FIELDS['cartholder_email']).'","'.mysql_prep($FORM_FIELDS['cartholder_address']).'",'.mysql_prep($FORM_FIELDS['cartholder_country']).'
							,"'.date('Y-m-d').'","'.date('Y-m-d').'",0,0)
								') or die('Error while trying to register cartholder'.mysql_error());
		if($query)
		{
			 //prepare sucess message
			 $_SESSION['success'] = 'You´re registered!';
			 redirect_to("../inscribe.php");
		
		}
		}
		
		mysql_close();
	
		
	}
	
	
	
	
	
  }
  





?>