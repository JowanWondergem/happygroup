<?php

	
  if(file_exists('includes/functions.php') ) {
    include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}

  class Admins
  {
	 
	 function getAllAdmins() 
	{ 
		$query = mysql_query('SELECT * FROM admins ORDER BY first_name ASC'
							) or die('Error get categories'.mysql_error());		
		return  pushResultInArray($query);	
	}
	
	
	
	function InsertAdminInfo($_POST)
	{
		$query = mysql_query('INSERT INTO admins (active,id_country, id_admin_registrator, first_name, last_name, address, email_private, email_company, phone, mobile_phone, password, date_creation) 
							  VALUES ("'.mysql_prep($_POST['active']).'","'.mysql_prep($_POST['id_country']).'","'.mysql_prep($_POST['id_admin_registrator']).'",
							  "'.mysql_prep($_POST['first_name']).'","'.mysql_prep($_POST['last_name']).'","'.mysql_prep($_POST['address']).'","'.mysql_prep($_POST['email_private']).'","'.mysql_prep($_POST['email_company']).'","'.mysql_prep($_POST['phone']).'"
							  ,"'.mysql_prep($_POST['mobile_phone']).'","'.mysql_prep(EncryptPass($_POST['password'])).'","'.mysql_prep(date('Y-m-d')).'")') or die('Error insert admin info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function UpdateAdminInfo($_POST)
	{
		$query = mysql_query(
		'UPDATE admins SET 	
		active = "'.mysql_prep($_POST['active']).'",
		id_country = "'.mysql_prep($_POST['id_country']).'", 
		first_name = "'.mysql_prep($_POST['first_name']).'",
		last_name = "'.mysql_prep($_POST['last_name']).'", 
		address = "'.mysql_prep($_POST['address']).'", 
		email_private = "'.mysql_prep($_POST['email_private']).'", 
		email_company = "'.mysql_prep($_POST['email_company']).'", 
		phone = "'.mysql_prep($_POST['phone']).'", 
		mobile_phone = "'.mysql_prep($_POST['mobile_phone']).'"
		WHERE id = "'.mysql_prep($_POST['id']).'"
		') or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	
	function checkEmailCompany($_POST)
	{
		$query = mysql_query('SELECT id FROM admins WHERE email_company = "'.mysql_prep($_POST['email_company']).'"');
	
		if($query)
			return	pushResultInSimpleArray($query);
		else
			return	-1;
	}
	
	
	function checkLogin($_POST)
	{
		$query = mysql_query("SELECT * FROM `admins` WHERE email_company = '".$_POST['username']."' AND password = '".mysql_prep(EncryptPass($_POST['password']))."' AND active = 1 LIMIT 1") or		 die('Error check login'.mysql_error());		
		
		if($query)
			return pushResultInSimpleArray($query);
		else
			return	-1;
	}
	
	function checkAdminPassword($_POST)
	{
		$query = mysql_query("SELECT * FROM `admins` WHERE password = '".EncryptPass($_POST['password_old'])."' AND id = ".$_POST['id']."") or		 die('Error check login'.mysql_error());		
		
		if(mysql_num_rows($query)>0)
			return	1;
		else
			return	0;
	}
	
	function updateAdminPassword($id, $password_new)
	{
		$query = mysql_query("UPDATE admins SET password = '".EncryptPass($password_new)."' WHERE id = ".$id."") or die(mysql_error());		
		
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function getAdminById($id_admin) 
	{ 
		$query = mysql_query('	SELECT *
								FROM `admins`
								WHERE  id = '.$id_admin.' LIMIT 1
								') or die('Error get admin'.mysql_error());
								
		return  pushResultInSimpleArray($query);	
	}
	
	
	
	

	
	
	
	function DeleteAdmin($_POST)
	{
		$query = mysql_query("DELETE FROM admins WHERE id=".$_POST['id']) or die(mysql_error());	
		$dir = '../media/admins/'.$_POST['id'].'/';
		EmptyDir($dir);
			    	
	
		if($query )
			return	1;
		else
			return	0;
	}  
	  
  

  }


?>