<?php

   


	if(@file_exists('includes/functions.php') ) {
    include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}
	
	
   
 
  
  class MLM_Contracts
  {
	  function getAllContracts($lan = 2) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT c. * ,  cl.name, cl.info
								FROM `mlm_contracts` AS c
								LEFT JOIN mlm_contracts_lan AS cl ON c.id = cl.id_mlm_contract AND cl.id_lan ='.$lan.'
								WHERE  c.active = 1
								ORDER BY id ASC
								
								
								') or die('Error get contracts'.mysql_error());
								
		
		
		return  pushResultInArray($query);
		
	}
	
	
	
	function InsertContractsInfo($_POST)
	{
		$query = mysql_query('INSERT INTO mlm_contracts (active,price) 
							  VALUES ("'.mysql_prep($_POST['active']).'","'.mysql_prep($_POST['price']).'")') or die('Error insert mlm_contracts info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	 function getContractInfoById($id) 
	{ 
	
	
	
		$query = mysql_query('	
								SELECT *
								FROM `mlm_contracts` 
								WHERE  id = '.$id.'
								') or die('Error get mlm_contracts'.mysql_error());
								
		
		
		return  pushResultInSimpleArray($query);
		
	}
	
	
	function getDescriptionOfContracts($id_contract, $lan) 
	{ 
		$query = mysql_query('	SELECT *
								FROM mlm_contracts_lan
								
								WHERE id_mlm_contract = '.$id_contract.' AND id_lan = '.$lan.'
								 LIMIT 1
								') or die('Error get mlm_contracts'.mysql_error());
								
		return  pushResultInSimpleArray($query);	
	}
	
	function UpdateCardDescription($_POST)
	{
		$query = mysql_query(
		'UPDATE mlm_contracts_lan SET 	
		name = "'.mysql_prep($_POST['name']).'",
		info = "'.mysql_prep($_POST['info']).'"
		WHERE id_mlm_contract = "'.mysql_prep($_POST['id_mlm_contracts']).'" AND id_lan = "'.mysql_prep($_POST['id_lan']).'"
		') or die('Error updating mlm_contracts info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	function InsertContractDescription($_POST)
	{
		$query = mysql_query('INSERT INTO mlm_contracts_lan (id_mlm_contract,id_lan,name, info) VALUES("'.mysql_prep($_POST['id_mlm_contract']).'",
							"'.mysql_prep($_POST['id_lan']).'","'.mysql_prep($_POST['name']).'","'.mysql_prep($_POST['info']).'"")'
		) or die('Error updating mlm_contracts info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
		function UpdateContractInfo($_POST)
	{
		$query = mysql_query(
		'UPDATE mlm_contracts SET 	active = "'.mysql_prep($_POST['active']).'",
		price = "'.mysql_prep($_POST['price']).'"
		WHERE id = "'.mysql_prep($_POST['mlm_contract_id']).'"
		') or die('Error updating mlm_contracts info'.mysql_error());
	
		if($query)
			return	1;
		else
			return	0;
	}
	
	
	function DeleteCard($id)
	{
		$query = mysql_query("DELETE FROM mlm_contracts WHERE id=".$id."") or die(mysql_error());	
		$query2 = mysql_query("DELETE FROM mlm_contracts_lan WHERE id_mlm_contract=".$id."") or die(mysql_error());	
		$dir = '../media/mlm_contracts/'.$id.'/';
		EmptyDir($dir);
		if($query && $query2)
			return	1;
		else
			return	0;
	}
	
	
	  
	  
  }




?>