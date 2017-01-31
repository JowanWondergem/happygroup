<?php
	include_once('../includes/connection.php');
	include_once('../bz/Category.php');
	$Category = Category::getCategoryLanById($_POST['id'], $_POST['lan']);
	if(!empty($Category))
	{
		$category 			= $Category['category'];
	}
	else
	{
		$category 			= '';
	}
	
	
	$json_arr = array("category"=> $category);
	print_r(json_encode( $json_arr ));
	exit;
	
?>