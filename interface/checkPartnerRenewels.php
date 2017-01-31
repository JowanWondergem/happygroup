<?php
	include_once('../includes/connection.php');
	include_once('../bz/Partners.php');
	
	$year	= $_POST['year'];
	$month  = $_POST['month'];
	$week 	=  $_POST['week'];
	$day 	=  $_POST['day'];
	$table = '';
	$date_today = date('Y-m-d');
	
	$Partners = Partners::getAllPartners();
	if(!empty($Partners))
	{
		
		foreach($Partners as $partner)
		{
			//calculate date 
			$date_before_renewal = substractingDate($partner['date_contract_renewal'],$year,$month,$week,$day);
			
			//set date to string
			$date_today = strtotime($date_today);
			$date_before_renewal = strtotime($date_before_renewal);
			
			//check if date before renewel date is after today
			if($date_today>$date_before_renewal)
			{
				///////////////////  CALCULATE DAYS
				$daysLeft = calculateDaysLeft($date_today,$partner['date_contract_renewal']);
				$partner['days_left'] = $daysLeft;	
				$table .= drawTable($partner);
			}	
		}	
	}
	
	echo $table;
	
	function drawTable($partner)
	{
			$table = '<tr>
					<td><input value="'.$partner['id'].'"  type="checkbox"/></td>';
                   	if($partner['active']==1)
			$table .='<td><img src="ui/images/table/active.png" /><input type="hidden" value="'.$partner['active'].'" /></td>';
                   else
            $table .='<td><img src="ui/images/table/unactive.png" /><input type="hidden" value="'.$partner['active'].'" /></td>';
      
			$table .= '<td>'. $partner['name'].'</td>
                    <td>'. $partner['email'].'</td>
                    <td>'. $partner['phone'].'</td>
					<td>'. $partner['days_left'].'</td>';
				
                    if($partner['has_happy_website']==1)
            $table .=  '<td><a href="'. getRootUrl().$partner['url_website'].'" target="_blank">'. $partner['url_website'].'</a></td>';
                    else
            $table .=  '<td>NONE</td>';
                  
                   
			$table .=  '<td class="options-width">
					<a href="partners_edit_step1.php?id='.  $partner['id'].'" title="Edit Info" class="icon-1 info-tooltip"></a>
                    <a href="partners_edit_step2.php?id='.$partner['id'].'" title="Edit Images" class="icon-1 info-tooltip"></a>
                    <a href="partners_edit_step3.php?id='. $partner['id'].'" title="Edit Description" class="icon-1 info-tooltip"></a>
					<a href="javascript:deletePartner('. $partner['id'].')" title="Delete" class="icon-2 info-tooltip"></a>
					<!--<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>-->
					</td>
				</tr>';
				
				return $table;
	}
	
?>