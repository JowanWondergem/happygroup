<?php

   


	if(@file_exists('includes/functions.php') ) {
    include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
	
	
   
 
  
  class Partners
  {
	 function getAllPartners($lan = 2, $active = 1) 
	{ 
	
		if($active == 0)
		{
			$clause = '';	
		}
		else
		{
			$clause = 'WHERE  p.active = 1';
		}
	
	
		$query = mysql_query('	
								SELECT p . * ,  cl.country, al.area, cal.category, cil.city
								FROM `partners` AS p
								
								LEFT JOIN countries_lan AS cl ON p.id_country = cl.id_country AND cl.id_lan ='.$lan.'
								LEFT JOIN areas_lan AS al ON p.id_area = al.id_area AND al.id_lan ='.$lan.'
								LEFT JOIN cities_lan AS cil ON p.id_city = cil.id_city AND cil.id_lan ='.$lan.'
								LEFT JOIN categories_lan AS cal ON p.id_category = cal.id_category AND cal.id_lan ='.$lan.'
								'.$clause.' ORDER BY name ASC
								
								
								') or die('Error get partners'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	function getAllExpiringPartners($year=0,$month=0,$week=0,$day=0)
	{
		
		$date_today = date('Y-m-d');
		
		$Partners = Partners::getAllPartners();
		if(!empty($Partners))
		{
			
			foreach($Partners as $partner)
			{
				//calculate date 
				$date_before_renewal = substractingDate($partner['date_contract_renewal'],$year,$month,$week,$day);
				
				//set date to string
				$date_today = strtotime($date_today);
				$date_before_renewal = strtotime($date_before_renewal);
				
				//check if date before renewel date is after today
				if($date_today>$date_before_renewal)
				{
					///////////////////  CALCULATE DAYS
					$daysLeft = calculateDaysLeft($date_today,$partner['date_contract_renewal']);
					$partner['daysLeft'] = $daysLeft;	
					
				}	
			}
			return $Partners;	
		}
			
	}
	
	
	  
	 function getPartnersofArea($lan = 2, $country=172, $area) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT p . * , pl.description_happy, pl.description_discount, cl.country, al.area, cal.category, cil.city
								FROM `partners` AS p
								LEFT JOIN partners_lan AS pl ON p.id = pl.id_partner AND pl.id_lan = '.$lan.'
								LEFT JOIN countries_lan AS cl ON p.id_country = cl.id_country AND cl.id_lan ='.$lan.'
								LEFT JOIN areas_lan AS al ON p.id_area = al.id_area AND al.id_lan ='.$lan.'
								LEFT JOIN cities_lan AS cil ON p.id_city = cil.id_city AND cil.id_lan ='.$lan.'
								LEFT JOIN categories_lan AS cal ON p.id_category = cal.id_category AND cal.id_lan ='.$lan.'
								WHERE p.active =1
								AND p.id_country = '.$country.'
								AND p.id_area = '.$area.'
								
								') or die('Error get partners'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	
	function getPartnersofCity($lan = 2, $country=172, $city) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT p . * , pl.description_happy, pl.description_discount, cl.country, al.area, cal.category, cil.city
								FROM `partners` AS p
								LEFT JOIN partners_lan AS pl ON p.id = pl.id_partner AND pl.id_lan = '.$lan.'
								LEFT JOIN countries_lan AS cl ON p.id_country = cl.id_country AND cl.id_lan ='.$lan.'
								LEFT JOIN areas_lan AS al ON p.id_area = al.id_area AND al.id_lan ='.$lan.'
								LEFT JOIN cities_lan AS cil ON p.id_city = cil.id_city AND cil.id_lan ='.$lan.'
								LEFT JOIN categories_lan AS cal ON p.id_category = cal.id_category AND cal.id_lan ='.$lan.'
								WHERE p.active =1
								AND p.id_country = '.$country.'
								AND p.id_city = '.$city.'
								
								') or die('Error get partners'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	function getPartnersofCategory($lan = 2, $country=172, $cat) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT p . * , pl.description_happy, pl.description_discount, cl.country, al.area, cal.category, cil.city
								FROM `partners` AS p
								LEFT JOIN partners_lan AS pl ON p.id = pl.id_partner AND pl.id_lan = '.$lan.'
								LEFT JOIN countries_lan AS cl ON p.id_country = cl.id_country AND cl.id_lan ='.$lan.'
								LEFT JOIN areas_lan AS al ON p.id_area = al.id_area AND al.id_lan ='.$lan.'
								LEFT JOIN cities_lan AS cil ON p.id_city = cil.id_city AND cil.id_lan ='.$lan.'
								LEFT JOIN categories_lan AS cal ON p.id_category = cal.id_category AND cal.id_lan ='.$lan.'
								WHERE p.active =1
								AND p.id_country = '.$country.'
								AND p.id_category = '.$cat.'
								
								') or die('Error get partners'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	
	
     function getPartnersActivityofArea($lan = 2, $country=172, $area, $category) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT p . * , pl.description_happy, pl.description_discount, cl.country, al.area, cal.category, cil.city
								FROM `partners` AS p
								LEFT JOIN partners_lan AS pl ON p.id = pl.id_partner AND pl.id_lan = '.$lan.'
								LEFT JOIN countries_lan AS cl ON p.id_country = cl.id_country AND cl.id_lan ='.$lan.'
								LEFT JOIN areas_lan AS al ON p.id_area = al.id_area AND al.id_lan ='.$lan.'
								LEFT JOIN cities_lan AS cil ON p.id_city = cil.id_city AND cil.id_lan ='.$lan.'
								LEFT JOIN categories_lan AS cal ON p.id_category = cal.id_category AND cal.id_lan ='.$lan.'
								WHERE p.active =1
								AND p.id_country = '.$country.'
								AND p.id_area = '.$area.'
								AND p.id_category = '.$category.'
								') or die('Error get partners'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	function getPartnersActivityofCity($lan = 2, $country=1, $area, $city, $category) 
	{ 
		$query = mysql_query('	SELECT p . * , pl.description_happy, pl.description_discount, cl.country, al.area, cil.city, cal.category
								FROM `partners` AS p
								LEFT JOIN partners_lan AS pl ON p.id = pl.id_partner AND pl.id_lan = '.$lan.'
								LEFT JOIN countries_lan AS cl ON p.id_country = cl.id_country AND cl.id_lan ='.$lan.'
								LEFT JOIN areas_lan AS al ON p.id_area = al.id_area AND al.id_lan ='.$lan.'
								LEFT JOIN cities_lan AS cil ON p.id_city = cil.id_city AND cil.id_lan ='.$lan.'
								LEFT JOIN categories_lan AS cal ON p.id_category = cal.id_category AND cal.id_lan ='.$lan.'
								WHERE p.active =1
								AND p.id_country = '.$country.'
								AND p.id_area = '.$area.'
								AND p.id_city = '.$city.'
								AND p.id_category = '.$category.'
								') or die('Error get partners'.mysql_error());
		
		return  pushResultInArray($query);
		
		
	}
	
	
	
 
  
	function getInfoOfPartner($id_partner) 
	{ 
		$query = mysql_query('	SELECT *
								FROM `partners` AS p
								WHERE  id = '.$id_partner.' LIMIT 1
								') or die('Error get partners'.mysql_error());
								
		return  pushResultInSimpleArray($query);	
	}
	
	function getDescriptionOfPartner($id_partner, $lan) 
	{ 
		$query = mysql_query('	SELECT *
								FROM partners_lan
								
								WHERE id_partner = '.$id_partner.' AND id_lan = '.$lan.'
								 LIMIT 1
								') or die('Error get partners'.mysql_error());
								
		return  pushResultInSimpleArray($query);	
	}
	
	function getAllOfPartner($id_partner, $lan) 
	{ 
		$query = mysql_query('	SELECT p.*, pl.description_happy
								FROM `partners` AS p
								LEFT JOIN partners_lan AS pl ON p.id = pl.id_partner AND pl.id_lan ='.$lan.'
								WHERE p.id = '.$id_partner.'
								 LIMIT 1
								') or die('Error get partners'.mysql_error());
								
		return  pushResultInSimpleArray($query);	
	}
	
	
	function UpdatePartnerInfo($_POST)
	{
		
		$query = mysql_query(
		'UPDATE partners SET 	active = "'.mysql_prep($_POST['active']).'",
		has_happy_website = "'.mysql_prep($_POST['has_happy_website']).'",
		id_admin = "'.mysql_prep($_POST['admin_id']).'", 
		id_category = "'.mysql_prep($_POST['category']).'", 
		id_country = "'.mysql_prep($_POST['country']).'", 
		id_area = "'.mysql_prep($_POST['area']).'", 
		id_city = "'.mysql_prep($_POST['city']).'", 
		name = "'.mysql_prep($_POST['name']).'", 
		url_website = "'.mysql_prep($_POST['url_website']).'", 
		url_website_private = "'.mysql_prep($_POST['url_website_private']).'", 
		address = "'.mysql_prep($_POST['address']).'", 
		zip_code = "'.mysql_prep($_POST['zip_code']).'", 
		email = "'.mysql_prep($_POST['email']).'", 
		phone = "'.mysql_prep($_POST['phone']).'", 
		mobile_phone = "'.mysql_prep($_POST['mobile_phone']).'",
		fax = "'.mysql_prep($_POST['fax']).'",
		owner = "'.mysql_prep($_POST['owner']).'",
		tax_number = "'.mysql_prep($_POST['tax_number']).'",
		bank_account = "'.mysql_prep($_POST['bank_account']).'",
		date_contract_start = "'.mysql_prep($_POST['date_contract_start']).'",
		date_contract_renewal = "'.mysql_prep($_POST['date_contract_renewal']).'"
		WHERE id = "'.mysql_prep($_POST['partner_id']).'"
		') or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function UpdatePartnerWebsiteInfo($_POST)
	{
		
		$query = mysql_query(
		'UPDATE partners SET 	
		active = 1,
		has_happy_website = 1,
		id_country = "'.mysql_prep($_POST['id_country']).'", 
		id_area = "'.mysql_prep($_POST['id_area']).'", 
		id_city = "'.mysql_prep($_POST['id_city']).'", 
		url_website_private = "'.mysql_prep($_POST['url_website_private']).'", 
		address = "'.mysql_prep($_POST['address']).'", 
		zip_code = "'.mysql_prep($_POST['zip_code']).'", 
		email = "'.mysql_prep($_POST['email']).'", 
		phone = "'.mysql_prep($_POST['phone_1']).'", 
		mobile_phone = "'.mysql_prep($_POST['phone_2']).'",
		fax = "'.mysql_prep($_POST['fax']).'"
		WHERE id = "'.mysql_prep($_POST['id']).'"
		') or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	function UpdatePartnerCategory($_POST)
	{
		$query = mysql_query(
		'UPDATE partners SET 	
		id_category = "'.mysql_prep($_POST['category']).'"
		WHERE id = "'.mysql_prep($_POST['partner_id']).'"
		') or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	function UpdatePartnerDescription($_POST)
	{
		$query = mysql_query(
		'UPDATE partners_lan SET 	
		description_happy = "'.mysql_prep($_POST['description_happy']).'",
		description_discount = "'.mysql_prep($_POST['description_discount']).'"
		WHERE id_partner = "'.mysql_prep($_POST['id_partner']).'" AND id_lan = "'.mysql_prep($_POST['id_lan']).'"
		') or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function InsertPartnerDescription($_POST)
	{
		$query = mysql_query('INSERT INTO partners_lan(id_lan,id_partner,description_happy,description_discount) VALUES("'.mysql_prep($_POST['id_lan']).'",
							"'.mysql_prep($_POST['id_partner']).'","'.mysql_prep($_POST['description_happy']).'","'.mysql_prep($_POST['description_discount']).'")'
		) or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	function InsertPartnerInfo($_POST)
	{
		$query = mysql_query('INSERT INTO partners (active,has_happy_website, id_admin, id_category, id_country, 
									id_area, id_city, name, url_website, url_website_private, address, zip_code, email, phone, mobile_phone,fax, owner, tax_number, bank_account, date_creation,
									password,date_contract_start,date_contract_renewal) 
							  VALUES ("'.mysql_prep($_POST['active']).'","'.mysql_prep($_POST['has_happy_website']).'","'.mysql_prep($_POST['admin_id']).'",
							  "'.mysql_prep($_POST['category']).'","'.mysql_prep($_POST['country']).'","'.mysql_prep($_POST['area']).'","'.mysql_prep($_POST['city']).'",
							  "'.mysql_prep($_POST['name']).'","'.mysql_prep($_POST['url_website']).'","'.mysql_prep($_POST['url_website_private']).'"
							  ,"'.mysql_prep($_POST['address']).'","'.mysql_prep($_POST['zip_code']).'","'.mysql_prep($_POST['email']).'","'.mysql_prep($_POST['phone']).'"
							  ,"'.mysql_prep($_POST['mobile_phone']).'","'.mysql_prep($_POST['fax']).'","'.mysql_prep($_POST['owner']).'","'.mysql_prep($_POST['tax_number']).'","'.mysql_prep($_POST['bank_account']).'","'.mysql_prep(date('Y-m-d')).'"
							  ,"'.EncryptPass(mysql_prep($_POST['password'])).'","'.mysql_prep($_POST['date_contract_start']).'","'.mysql_prep($_POST['date_contract_renewal']).'")') 
							  or die('Error insert partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function DeletePartner($_POST)
	{
		$query = mysql_query("DELETE FROM partners WHERE id=".$_POST['id_partner']."") or die(mysql_error());	
		$query2 = mysql_query("DELETE FROM partners_images WHERE id_partner=".$_POST['id_partner']."") or die(mysql_error());	
		if($query && $query2)
			return	1;
		else
			return	0;
	}
	
	
	
	function checkWebsite($_POST)
	{
		if(mysql_prep($_POST['url_website'])!='')
		{
			$query = mysql_query('SELECT id FROM partners WHERE url_webiste = "'.mysql_prep($_POST['url_website']).'"');
			if($query)
				return	mysql_num_rows($query);
			else
				return	-1;
		}
		else
		{
			return 0;
		}
		
		
		
	}
	
	function checkEmail($email)
	{
		$query = mysql_query('SELECT id FROM partners WHERE email = "'.mysql_prep($email).'"');
	
		return	pushResultInSimpleArray($query);

	}
	
	function checkPassword($id,$password_old)
	{
		$query = mysql_query('SELECT id FROM partners WHERE password = "'.mysql_prep(EncryptPass($password_old)).'" AND id = "'.mysql_prep($id).'"');
	
		if($query)
			return	mysql_num_rows($query);
		else
			return	-1;
	}
	
	function updatePassword($id,$password_new)
	{
		$query = mysql_query("UPDATE partners SET password = '".EncryptPass($password_new)."' WHERE id = ".$id."") or die(mysql_error());		
		
		if($query)
			return	1;
		else
			return	0;
	}


 
 function checkLogin($_POST)
	{
		$query = mysql_query("SELECT * FROM `partners` WHERE email = '".$_POST['email']."' AND password = '".mysql_prep(EncryptPass($_POST['password']))."' AND active = 1 LIMIT 1") or		 die('Error check login'.mysql_error());		
		
		if($query)
			return pushResultInSimpleArray($query);
		else
			return	-1;
	}
	
	
	function UpdateMessageAlert($reminder = 1, $active = 0,$id_partner)
	{
		$query = mysql_query("UPDATE partners SET reminder_".$reminder." = ".$active." WHERE id = ".$id_partner."") or die(mysql_error());		
		
		if($query)
			return	1;
		else
			return	0;
	}
	
	
 }
?>