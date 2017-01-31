<?php
	include_once('../includes/connection.php');
	
	include_once('../bz/Partners.php');
	ob_clean();
	$year	=  0;
	$month  =  1;
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
					$res = Partners::UpdateMessageAlert(2, 1,$partner['id']);
					if($res==0)
					{
						die();
					}
					
				}	
				
			}
			
		}
	
	
	echo $table;
	
	function sendEmailHappy($partner,$month)
	{
		$l_template_title = 'Invoice warning for '.$partner['name'].' expire in '.$month.' month(s)';
		$l_template_subtitle = 'Payment expires in '.$month.' month(s)';
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