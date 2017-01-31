<?php

include_once('../includes/functions.php');
include_once('../bz/AutoResponder.php');

$body = '';

foreach($_POST as $key=>$value)
{
  $body .= $key.' :     '.utf8_decode($value).'<br>';
 
  if($key == 'register_person_email' )
  {
  	$form_email =  $value;
  }
}



	//EMAIL PREPERATION
	
	$to 			= "jowanwondergem@gmail.com";
	$subject 		= 'Inscrição Happy';
	$message 		= $body;
	$from			= $form_email;
	$auto_responder = AutoResponder::createAutoReponder('pt',$_POST);
	
	
	
	// EMAIL SENDING
	
	$sent =  sentEmail($to, $subject,$message,$from);				//SENT TO HAPPYGROUP
	$sent2 = sentEmail($from, $subject,$auto_responder,$to);		//SENT TO CUSTOMER
	
	if($sent == 1 && $sent2 == 1)
	{
		header('Location: ../register_happy.php?register=ok');
	}
	else
	{
		header('Location: ../register_happy.php?register=error');
	}



?>