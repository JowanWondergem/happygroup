<?php
	include('../includes/connection.php');
	include('../includes/functions.php');
	extract($_GET);

if(isset($_GET['t']) and $_GET['t'] == "ajax")
{
	
	
	$partner_id	= $p; 
	$t_width 	= $w;	// Maximum thumbnail width
	$t_height 	= $h;	// Maximum thumbnail height
	$new_name 	= $db_field."_".$partner_id.".jpg"; // Thumbnail image name
	$path_db 	=  $partner_id."/".$new_name;
	$path 		= getRootDocument()."media/".$folder."/".$partner_id."/";
	
	$ratio		= ($t_width/$w); 
	$nw 		= ceil($w * $ratio);
	$nh 		= ceil($h * $ratio);
	$nimg 		= imagecreatetruecolor($nw,$nh);
	
	$im_src 	= imagecreatefromjpeg($path.$img);
	
	imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w,$h);
	imagejpeg($nimg,$path.$new_name,90);
	mysql_query("UPDATE partners SET ".$db_field."= '".$path_db."' WHERE id=".$partner_id."") or die(mysql_error());
	unlink($path.$img);
	echo $path_db ."?".time();

	exit;
}
	
	?>