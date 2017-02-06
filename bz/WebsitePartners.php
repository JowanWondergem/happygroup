<?php

 
  if(@file_exists('includes/functions.php') ) {
    	include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
  

  
  class WebsitePartners
  {
	  
	  
	   function getAllPartnerWebsites() 
	{ 
	
	
	
		$query = mysql_query('	SELECT name, url_website
								FROM `partners` 
								WHERE active = 1
								AND url_website != ""						  
		
								') or die('Error get partner info'.mysql_error());
								
		
		
		return pushResultInArray($query);
		
	}
	
     function getWebsitePartnerInfo($lan = 2, $id_partner) 
	{ 
	
	
	
		$query = mysql_query('	SELECT p . * ,  cl.country, al.area, cal.category, cil.city, pl.description_website 
								FROM `partners` AS p
								LEFT JOIN partners_lan AS pl ON p.id = pl.id_partner AND pl.id_lan ='.$lan.'	
								LEFT JOIN countries_lan AS cl ON p.id_country = cl.id_country AND cl.id_lan ='.$lan.'
								LEFT JOIN areas_lan AS al ON p.id_area = al.id_area AND al.id_lan ='.$lan.'
								LEFT JOIN cities_lan AS cil ON p.id_city = cil.id_city AND cil.id_lan ='.$lan.'
								LEFT JOIN categories_lan AS cal ON p.id_category = cal.id_category AND cal.id_lan ='.$lan.'
								
								WHERE p.id = '.$id_partner.'						  
		
								') or die('Error get partner info'.mysql_error());
								
		
		
		return pushResultInSimpleArray($query);
		
	}
	
	
	  function getWebsitePartnerDescriptionLan($lan = 2, $id_partner) 
	{ 
	
	
	
		$query = mysql_query('	SELECT description_website 
								FROM partners_lan
								WHERE id_partner = '.$id_partner.' AND id_lan = '.$lan.'						  
		
								') or die('Error get partner info'.mysql_error());
								
		
		
		return pushResultInSimpleArray($query);
		
	}
	
	function InsertWebsitePartnerDescriptionLan($lan = 2, $id_partner,$description_website)
	{
		$query = mysql_query('INSERT INTO partners_lan (id_lan,id_partner, description_discount, description_happy, description_website) 
							  VALUES ("'.mysql_prep($lan).'","'.mysql_prep($id_partner).'","'.mysql_prep('').'",
							  "'.mysql_prep('').'","'.mysql_prep($description_website).'")') or die('Error insert partner website layout info'.mysql_error());
		if($query)
			return	1;
		else
			return	0;
	}
	
	function EditWebsitePartnerDescriptionLan($lan = 2, $id_partner,$description_website)
	{
		$query = mysql_query(
		'UPDATE partners_lan SET 	
		description_website = "'.mysql_prep($description_website).'"
		WHERE id_partner = "'.mysql_prep($id_partner).'" AND id_lan = "'.mysql_prep($lan).'"
		') or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	
	
	
	
	function getWebsitePartnerImages($id_partner) 
	{ 
	
	
	
		$query = mysql_query('	SELECT pi.*
								FROM partners AS p,
									 partners_images AS pi
									
								WHERE p.id = pi.id_partner
								AND p.id= '. $id_partner.'
								ORDER By id DESC								  
		
								') or die('Error get partner info'.mysql_error());
								
		
		
		return pushResultInArray($query);
		
	}
	
	function getWebsitePartnerImageById($id,$id_partner) 
	{ 
		$query = mysql_query('	SELECT *	FROM  partners_images
								WHERE id = '. $id.'
								AND id_partner = '. $id_partner.'
								LIMIT 1							  
								') or die('Error get partner info'.mysql_error());
		return pushResultInSimpleArray($query);
		
	}
	
	
	function deleteWebsitePartnerImage($id,$id_partner)
	{
		$query = mysql_query("DELETE FROM  partners_images WHERE id=".$id." AND id_partner =".$id_partner." ") or die(mysql_error());		
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function getWebsitePartnerDiscounts($lan = 2, $id_partner) 
	{ 
	
	
	
		$query = mysql_query('	SELECT pl.id_partner, pl.discount_perc, pl.discount_text, pl.id_discount
								FROM partners_discounts AS p,
									 partners_discounts_lan AS pl
									
								WHERE p.id_partner = pl.id_partner	
								AND   p.id= pl.id_discount
								AND pl.id_lan = '.$lan.'
								AND p.id_partner= '.$id_partner.'					  
		
								') or die('Error get partner info'.mysql_error());
								
		
		
		return pushResultInArray($query);
		
	}
	
	
	function getWebsitePartnerDiscountsById($lan = 2, $id_partner, $id_discount) 
	{ 
	
	
	
		$query = mysql_query('	SELECT pl.id_partner, pl.discount_perc, pl.discount_text, pl.id_discount
								FROM partners_discounts AS p,
									 partners_discounts_lan AS pl
									
								WHERE p.id_partner = pl.id_partner	
								AND   p.id= pl.id_discount
								AND pl.id_lan = '.$lan.'
								AND p.id_partner= '.$id_partner.'	
								AND p.id = '.$id_discount.'				  
		
								') or die('Error get partner info'.mysql_error());
								
		
		
		return pushResultInArray($query);
		
	}
	
	
		function getWebsitePartnerDiscountsLan($lan = 2, $id_partner, $id_discount) 
	{ 
	
	
	
		$query = mysql_query('	SELECT *
								FROM partners_discounts_lan 	
								WHERE
								id_lan = '.$lan.'
								AND id_partner= '.$id_partner.'
								AND id_discount = '.$id_discount.'					  
		
								') or die('Error get partner info'.mysql_error());
								
		return pushResultInSimpleArray($query);
		
	}
	

	
	
	
	function InsertWebsitePartnerDiscounts($id_partner)
	{
		$query = mysql_query('INSERT INTO partners_discounts (id_partner) 
							  VALUES ("'.mysql_prep($id_partner).'")') or die('Error insert partner discount'.mysql_error());
		if($query)
			return	mysql_insert_id();
		else
			return	0;
	}
	
	function InsertWebsitePartnerDiscountsLan($id_discount, $id_partner, $id_lan, $discount_perc, $discount_text)
	{
		$query = mysql_query('INSERT INTO partners_discounts_lan (id_discount, id_partner, id_lan, discount_perc, discount_text ) 
							  VALUES ("'.mysql_prep($id_discount).'","'.mysql_prep($id_partner).'","'.mysql_prep($id_lan).'",
							  "'.mysql_prep($discount_perc).'","'.mysql_prep($discount_text).'")') or die('Error insert partner discount lan'.mysql_error());
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function EditWebsitePartnerDiscountsLan($id_discount, $id_partner, $id_lan, $discount_perc, $discount_text)
	{
		$query = mysql_query(
		'UPDATE partners_discounts_lan SET 	
		id_partner = "'.mysql_prep($_POST['id_partner']).'",
		discount_perc = "'.mysql_prep($_POST['discount_perc']).'",
		discount_text = "'.mysql_prep($_POST['discount_text']).'"
		WHERE id_discount = "'.mysql_prep($_POST['id_discount']).' " AND id_lan = "'.mysql_prep($_POST['id_lan']).'"
		') or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}

	
	
	function getWebsitePartnerLayout($lan = 2, $id_partner) 
	{ 
	
	
	
		$query = mysql_query('	SELECT pl.*
								FROM  partners AS p,
									  partners_layout AS pl
									
								WHERE p.id = pl.id_partner
								AND p.id= '.$id_partner.'	LIMIT 1		
													  
		
								') or die('Error get partner info'.mysql_error());
								
		
		
		return pushResultInSimpleArray($query);
			
	}
	
	
	function checkLayoutPosition($content)
	{
		if($content == 'images')
		{
			return 'ui/_company_images.php';	
		}
		else if ($content == 'discounts')
		{
			return 'ui/_company_discounts.php';
		}
		else if ($content == 'texts')
		{
			return 'ui/_company_info.php';
		}
		else if ($content == 'contacts')
		{
			return 'ui/_company_contacts.php';
		}
	}
	
	
	function InsertPartnerWebsiteLayout()
	{
		$query = mysql_query('INSERT INTO partners_layout (id_partner,color_header, color_background, color_lines, top_left,top_right, bottom_left, bottom_right) 
							  VALUES ("'.mysql_prep($_POST['partner_id']).'","'.mysql_prep($_POST['color_header']).'","'.mysql_prep($_POST['color_background']).'",
							  "'.mysql_prep($_POST['color_background']).'","'.mysql_prep('images').'","'.mysql_prep('discounts').'","'.mysql_prep('texts').'",
							  "'.mysql_prep('contacts').'")') or die('Error insert partner website layout info'.mysql_error());
		if($query)
			return	1;
		else
			return	0;
	}
	
	function EditPartnerWebsiteLayout()
	{
		$query = mysql_query(
		'UPDATE partners_layout SET 	
		color_header = "'.mysql_prep($_POST['color_header']).'",
		color_background = "'.mysql_prep($_POST['color_background']).'"
		WHERE id_partner = "'.mysql_prep($_POST['partner_id']).'"
		') or die('Error updating partner info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	
	function DeletePartnerWebsiteDiscount($id_partner, $id_lan, $id_discount)
	{
		$query = mysql_query("DELETE FROM partners_discounts WHERE id=".$id_discount." AND id_partner =".$id_partner."") or die(mysql_error());	
		$query2 = mysql_query("DELETE FROM partners_discounts_lan WHERE id_discount=".$id_discount." AND id_partner=".$id_partner."") or die(mysql_error());	
		if($query && $query2)
			return	1;
		else
			return	0;
	}
	
	
	
	
	
	
  }
  





?>