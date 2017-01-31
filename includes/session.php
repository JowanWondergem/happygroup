<?php
confirmVisitorLoggedIn();
function visitorloggedIn()
{	
	session_start();
	return isset($_SESSION['visitor_id']);
}

function confirmVisitorLoggedIn()
{
	if(!visitorloggedIn())
	{
		
		$_SESSION['visitor_id'] = session_id();
		$_SESSION['lang'] 		= 'pt';
		$_SESSION['id_lan'] 	=  2;
		$_SESSION['id_country'] = '172';
	}
}

?>