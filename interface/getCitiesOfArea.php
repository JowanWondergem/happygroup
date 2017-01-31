<?php
	include_once('../includes/connection.php');
	include_once('../bz/Cities.php');
	$Cities = Cities::getAllCitiesFromAreaList($_POST['lan'],$_POST['country'],$_POST['area']);
	echo $Cities;
	
?>