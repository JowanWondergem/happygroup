<?php
	include_once('../includes/connection.php');
	include_once('../ui/locale/locale-'.$_POST['lan'].'.php');
	include_once('../bz/Cities.php');
	include_once('../bz/Partners.php');
	
	
	$Cities = Cities::getAllCitiesFromArea($_POST['id_lan'],$_POST['country'],$_POST['area']);
	$list= '';
	if(!empty($Cities))
	{
		$list = '<ul>';
		foreach($Cities as $city)
		{
			$Partners = Partners::getPartnersofCity($_POST['id_lan'],$_POST['country'],$city['id']);
			$num = count($Partners);
			$list .= '<li class="map_city_list" id="'.$city['id'].'">
						<a href="javascript:mapClicked(\'172,'.$_POST['area'].','. $city['id'].'\')">'.$city['city'].' - </a>
						('.$num.')
					  </li>';
		}
		$list .= '</ul>';
		echo $list;
		exit();
	}
	else
	{
		echo $l_map_message_no_cities;  //'Ainda não há cidades nesta!<br><a href=""> Torna-se Membro é ajuda-nos a adquirir parceiros!</a>';
	}
	
	
?>