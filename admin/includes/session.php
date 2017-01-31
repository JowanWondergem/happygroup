<?php


function loggedIn()
{
	@session_start();
	return isset($_SESSION['admin_id']);
}

function confirmLoggedIn()
{

	if(!loggedIn())
	{
		header("Location: login.php");
	}
}

?>