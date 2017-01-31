<?php
function loggedIn()
{ 
session_start();
return isset($_SESSION['partner_id']);
}
function confirmLoggedIn()
{
if(!loggedIn())
{
header("Location: ../login.php");
}
}
?>