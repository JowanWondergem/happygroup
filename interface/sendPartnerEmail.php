<?php
include_once('../includes/session.php');
include_once('../includes/functions.php');
include_once('../bz/autoResponder.php');

if(@file_exists('../ui/locale/locale-'.$_REQUEST['lang'].'.php')){	include_once('../ui/locale/locale-'.$_REQUEST['lang'].'.php');}
else{include_once('../ui/locale/locale-pt.php');}


$body = '';

foreach($_POST as $key=>$value)
{
  utf8_decode($value);
}




	$to 			= $_POST['email_des'];
	$subject 		= $_POST['subject'];
	$message_body 		= $_POST['message'];
	$from			= $_POST['email_emm'];
	$success		= 0;
	$message		= "Error while sending message";
	$message_success = "Email succesfully sent!";
	
	
	
		
	
	$auto_responder = prepareEmailTemplate($l_template_autoresponder_title ,$l_template_autoresponder_subtitle, $l_template_autoresponder_text);
	
	
	$sent =  sentEmail($to,$subject,$message_body,$from);					//SENT TO PARTNER
	$sent2 = sentEmail($from,$subject,$auto_responder,$to);				//SENT TO CUSTOMER


	if($sent == 1 && $sent2 == 1 )
	{
		//prepare sucess message
		$success = 1;
		$message = $message_success;
		
	}
	
	
	
	$json_arr = array("success"=> $success,"message"=> $message);
	print_r(json_encode( $json_arr ));
	exit;
	



?>