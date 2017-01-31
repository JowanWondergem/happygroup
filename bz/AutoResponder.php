<?php


	if(@file_exists('includes/functions.php') ) {
    	include_once('includes/functions.php');
	} 
	else {
	   include_once('../includes/functions.php');
	}


class AutoResponder
{

	function createAutoReponder($lan = 'pt',$form_fields)
	{
			
		ob_start();
		include_once('../media/templates/Confirmregister-'.$lan.'.php');
		$email_template = ob_get_clean();
		return $email_template;
		
	}
}
?>