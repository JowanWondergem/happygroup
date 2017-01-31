<?php 
 if(file_exists('includes/functions.php') ) {
    include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}

include_once('../bz/Admins.php');
echo EncryptPass($_REQUEST['pass']);

?>