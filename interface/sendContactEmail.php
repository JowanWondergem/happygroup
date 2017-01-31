<?php
include_once('../includes/session.php');
include_once('../includes/functions.php');

if(@file_exists('../ui/locale/locale-'.$_REQUEST['lang'].'.php')){	include_once('../ui/locale/locale-'.$_REQUEST['lang'].'.php');}
else{include_once('../ui/locale/locale-pt.php');}


$body = '';
$success =0;
$error_message = '';
foreach($_POST as $key=>$value)
{
  utf8_decode($value);
}




	$to 			= "info.happycard@gmail.com";
	$subject 		= $_POST['subject'];
	$message 		= $_POST['message'];
	$from			= $_POST['email'];
	

	
	
	$auto_responder = prepareEmailTemplate($l_template_autoresponder_title ,$l_template_autoresponder_subtitle, $l_template_autoresponder_text);
	
	
	$sent =  sentEmail($to,$subject,$message,$from);					//SENT TO HAPPYGROUP
	$sent2 = sentEmail($from,$subject,$auto_responder,$to);				//SENT TO CUSTOMER
	




	if($sent == 1 && $sent2 == 1)
	{
		
		//prepare sucess message
		$success = 1;
		$error_message = $l_contact_form_sent;
		
	}
	else
	{
		
		// prepare error message
		 $success = 0;
		 $error_message = $l_contact_form_sent_error;
		 
	}

		$json_arr = array("success"=> $success,"message"=> $error_message);
		print_r(json_encode( $json_arr ));
		exit;


?>