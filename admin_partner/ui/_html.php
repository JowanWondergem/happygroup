<?php
ob_start(); //started buffering
?>
<?php 
include_once('includes/session.php');
confirmLoggedIn();   
?>
<?php include_once('includes/connection.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
if(@file_exists('ui/locale/locale-'.$_SESSION['lang'].'.php'))
		{
			include_once('ui/locale/locale-'.$_SESSION['lang'].'.php');
		}
		else
		{
			include_once('ui/locale/locale-pt.php');
		}
?>




