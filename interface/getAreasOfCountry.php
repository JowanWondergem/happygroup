<?php
	include_once('../includes/connection.php');
	include_once('../bz/Areas.php');
	$Areas = Areas::getAllAreasFromCountryList($_POST['lan'],$_POST['country']);
	echo $Areas;
	
?>