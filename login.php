<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= $l_head_title;
	include_once('ui/_head.php'); 
	?>
</head>
<body >


	




	<div class="block_reference block_100 bg_gr_brown">
  <div class="center">
    <h2 class="left"><?php echo $l_header_buss_of;  ?></h2>
    
  </div>
</div>
<div class="block_header block_100 bg_gr_yellow ">
  <div class="center">
    <div class="block_30 left"> <a href="index.php"> <img class="company_logo left" src="ui/images/logo.png"/>
      <h1 class="company_name left text"><?php echo $l_header_company; ?></h1>
      </a> </div>
    <div class="block_70 right">
      
    </div>
  </div>
</div>

<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>


	
	
    
<div class="block_35 center block_login bg_brown   ui-corner-all ">
<div class="block_30 right login_label bg_gr_yellow ui-corner-all "><a href="index.php"><?php echo $l_login_back_home ?></a></div>
   <h1><?php echo $l_login_partner ?></h1> 
    <form method="post" action="">
    <ul class="v_list">
		<li><label><?php echo $l_login_form_email ?></label><input class="block_70" autofocus="autofocus" type="text" name="email" id="email" value="" /></li>
        <li><label><?php echo $l_login_form_password ?></label><input class="block_70" type="password" name="password" id="password" value=""/></li>
        <li><input class="btn_submit ui-corner-all" type="button" onClick="checkLogin()" value="<?php echo $l_login_button_login; ?>"/></li>
      
        <li><a href="password_recovery.php"><?php echo $l_login_forgot_password ?></a></li>
	</ul>
	</form>
    
    <script language='javascript'>
					function checkLogin()
					{
						
						var email = $("#email").val();
						var password = $("#password").val();
						
						$.ajax
						({
							  url: 'interface/loginPartner.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			email:  	email, 
										password: 	password
									},
									
							  success: function(data) 
							  {
								
							  	if(data.success==1)
								{
									
									window.location="admin_partner/index.php";
							  	}
							  	else
								{
									popupMessage(data.message);
									
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

	</script>
    	
    
       
</div>

 <div class="center block_35 "> <img class="center block_100" src="ui/images/img03.png" /> </div>

<div class="h_spacer "></div>

	
</body>
</html>
