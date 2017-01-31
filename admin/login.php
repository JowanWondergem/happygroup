<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once('includes/connection.php'); ?>
<?php include_once('includes/session.php');   ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Happygroup - Login</title>
<link REL="SHORTCUT ICON" HREF="../ui/images/favicon.png">
<link rel="stylesheet" href="ui/css/screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="ui/css/jquery-ui-1.8.23.custom.css"  type="text/css" media="screen" />
<link rel="stylesheet" href="ui/assets/css/bootstrap.css"  type="text/css" media="screen" />
<!--  jquery core -->
<script src="ui/js/jquery-1.8.0.min.js" type="text/javascript"></script>
<script src="ui/js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>
<script src="ui/assets/js/bootstrap.js"  type="text/javascript" ></script>
<script src="ui/js/bootbox.js"  type="text/javascript" ></script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a ><img src="ui/images/shared/logo.png"  height="100" alt="" /></a>
        
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
    <div id="message-red"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
 
	<!--  start login-inner -->
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email (Company)</th>
			<td><input type="text" name="username" id="username" value=""   /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="password" id="password" value="************"  onfocus="this.value=''"  /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input id="remember" type="checkbox" class="hidden checkbox-size"  /><label class="hidden" for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="button" onClick="checkLogin()" class="btn btn-inverse" value="Login"  /></td>
		</tr>
		</table>
	</div>
     <script language='javascript'>
					function checkLogin()
					{
						
						var username = $("#username").val();
						var password = $("#password").val();
						var remember = $("#remember").val();
						
						$.ajax
						({
							  url: '../interface/loginAdmin.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			username:  	username, 
										password: 	password,
										remember:	remember	
									},
									
							  success: function(data) 
							  {
								//alert(data);
							  	if(data.success==1)
								{
									
									window.location="dashboard.php";
							  	}
							  	else
								{
									bootbox.alert(data.message);
									
							    }
							 },
							 
							 
						});
					}
					
					//submit on enter
					$(document).keypress(function(e) {
						if(e.which == 13) {
									checkLogin();
						}
					});
					
					function changeBox(step)
					{
						if(step==0)
						{
							$('#loginbox').hide();
							$('#forgotbox').show();
						}
						else 
						{
							$('#forgotbox').hide();
							$('#loginbox').show();
						}
					}
					
					function recoverPassword()
					{
						
						
						$.ajax
						({
							  url: '../interface/recoverAdminPassword.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			id_lan: 	'en',
							  			email_company:  	$('#email_company').val()
									},
									
							  success: function(data) 
							  {
								
							  	if(data.success==1)
								{
									bootbox.alert(data.message);
							  	}
							  	else
								{
									bootbox.alert(data.message);
									
							    }
							 },
							 
							 
						});
					}
					

	</script>
 	<!--  end login-inner -->
	<div class="clear"></div>
	<a href="javascript:changeBox(0)" class="forgot-pwd">Forgot Password?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email (Company):</th>
			<td><input type="text" id="email_company" name="email_company" value=""   /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" onclick="recoverPassword()" class="btn btn-inverse" value="Send"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="javascript:changeBox(1)" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>