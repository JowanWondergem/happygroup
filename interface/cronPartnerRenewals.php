<?php
	include_once('../includes/connection.php');
	
	include_once('../bz/Partners.php');
	ob_clean();
	$year	=  0;
	$month  =  2;
	$week 	=  0;
	$day 	=  0;
	$table = '';
	$date_today = date('Y-m-d');
	
	$Partners = Partners::getAllPartners();
		if(!empty($Partners))
		{
			
			foreach($Partners as $partner)
			{
				
				//calculate date 
				$date_before_renewal = substractingDate($partner['date_contract_renewal'],$year,$month,$week,$day);
			
				//check if date before renewel date is after today
				if($date_today==$date_before_renewal)
				{
					///////////////////  CALCULATE DAYS
					$daysLeft = calculateDaysLeft($date_today,$partner['date_contract_renewal']);
					$partner['days_left'] = $daysLeft;	
					$table .= sendEmailHappy($partner,$month);
					$res = Partners::UpdateMessageAlert(1, 1,$partner['id']);
					if($res==0)
					{
						die();
					}
				}	
				
			}
			
		}
	
	
	echo $table;
	sentEmail('jowanwondergem@gmail.com', 'test-cron',$table,'jowanwondergem@gmail.com');
	
	function sendEmailHappy($partner,$month)
	{
		$l_template_title = 'Partner '.$partner['name'].' needs renewal within '.$month.' months';
		$l_template_subtitle = 'Partner needs renewal within '.$month.' months';
		$l_template_text = '<br>ID: '.$partner['id'];
		$l_template_text .= '<br>Name: '.$partner['name'];
		$l_template_text .= '<br>Email: '.$partner['email'];
		$l_template_text .= '<br>Phone: '.$partner['phone'];
		if($partner['has_happy_website']==1)
		{
		$l_template_text .= '<br>Website: '.getRootUrl().$partner['url_website'];
		}
		$l_template_text .= '<br>Days Left: '.$partner['days_left'];
		$mail = prepareEmailTemplate($l_template_title ,$l_template_subtitle, $l_template_text);
		
			
		return $mail;
	}
	
?>