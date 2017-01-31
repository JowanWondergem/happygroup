<?php

	include_once('../includes/connection.php');
	include_once('../includes/functions.php');
	include_once('../bz/Partners.php');
	include_once('../ui/locale/locale-'.$_POST['id_lan'].'.php');
	
	//message
	$message = "";
	$message_ok = $l_email_message_ok_1.$_POST['email'].$l_email_message_ok_2;
	$message_error_email = $l_email_message_not_in_database;
	$message_error_sent = $l_email_message_not_sent;
	$message = $message_error_email;
	$success = 0;
	//mail
	$subject_mail = $l_template_title;
	$from_mail = 'info.happycard@gmail.com';
	
	
	//check if email of partner is in database
	$Partner = Partners::checkEmail($_POST['email']);
	//if email in database
	if(!empty($Partner))
	{
		
		//generate string for password
		$password_string = GeneratePassword();
		
		//set password in text
		$l_template_title = $l_template_title;
		$l_template_subtitle = $l_template_subtitle;
		$l_template_text = str_replace( 'XXXEMAIL', $_POST['email'], $l_template_text ); 
		$l_template_text = str_replace( 'XXXPASS', $password_string, $l_template_text ); 
		
		$body_mail = prepareEmailTemplate($l_template_title ,$l_template_subtitle, $l_template_text);
		
		//send email to customer with new password
		$sent = sentEmail($_POST['email'], $subject_mail,$body_mail,$from_mail);
		
		//if email is sent
		if($sent==1)
		{
		
			$Updated = Partners::updatePassword($Partner['id'],$password_string);
			if($Updated==1)
			{
				$message = $message_ok;
				$success = 1;
			}
		}
		//if problems occored when sending email
		else
		{
			$message = $message_error_sent;
		}
	}
	

	$json_arr = array("message"=>$message,"success" =>$success);
	print_r(json_encode( $json_arr ));
	exit;
	
?>