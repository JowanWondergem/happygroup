<?php

	//function resizeSlider()
   header("Content-type: image/jpeg");		 
   include('../bz/Image.php');
   $image = new Image();
   $image->load($_GET['image']);
   if(isset($_GET['w']) && isset($_GET['h']))
   {
	   $image->resize($_GET['w'],$_GET['h']);
   }
   if(isset($_GET['w']) && !isset($_GET['h']))
   {
	   $image->resizeToWidth($_GET['w']);
   }
   if(!isset($_GET['w']) && isset($_GET['h']))
   {
	   $image->resizeToHeight($_GET['h']);
   }
   
   
   
   $image->output();
 
			  
?>