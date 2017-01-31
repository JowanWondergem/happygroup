<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= $l_head_title;
	include_once('ui/_head.php'); 
	?>
</head>
<body onLoad="<?php // if(isset($_GET['type']) && $_GET['type']=='map') echo 'ammap.focus()'; ?>">

	
	<?php include_once('ui/_header.php'); ?>

 <div class="block_15 left">
<?php include_once('ui/_menu.php'); ?>
</div> <!--end lbock left-->


       
        
     
  	<div class="block_80 block_start left  ">
    <div class="page_label"><?php echo $l_head_title . ' - '.$l_form_change.' '.$l_form_password ?></div> 
    <div class="block_50 block_settings_password"> 
    <form id="form_contact" name="form_contact" method="post">
                <ul class="v_list">
                    <li>
                    <label ><?php echo $l_form_password_old; ?> </label>
                    <input  id="password_old" name="password_old"  class=" block_60 validate[required]" type="text" value="" />
                    </li>
                     <li>
                    <label ><?php echo $l_form_password_new; ?>  </label>
                    <input  id="password_new" name="password_new"  class=" block_60 validate[required]" type="text" value="" />
                    </li>
                    
                    
                    
                    <li>
                   
                    <input class="btn_submit left ui-corner-all" onClick="saveInfo()" type="button" value="<?php echo $l_form_btn_save ; ?>"/>
                    <input type="button" onClick="window.location.replace('settings.php')" class="left btn_submit ui-corner-all" value="<?php echo $l_settings_back; ?>"/>
                    </li>
                </ul>
    </form>
    </div>
    
    	
    
  
  
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
    
    <script language='javascript'>
	
					//declare global varaibles
					var btn_close ='<?php echo $l_form_close ?>';
					
					function saveInfo()
					{
					
						if($("#form").validationEngine('validate'))
						{
						
						$.ajax
						({
							  url: 		 '../interface/EditPartnerPassword.php',
							  type:		 'post',
							  dataType:  "json",
							 
							  data: {	
							  			id:					'<?php echo $_SESSION['partner_id'] ?>',
										lang:				'<?php echo $_SESSION['lang'] ?>',
							  			password_old:  		$("#password_old").val(),
										password_new:		$('#password_new').val()
										
									},
									
							  success: function(data) 
							  {
							
								if(data.success==1)
								{
								var res = popupMessage(data.message,btn_close);
								
								}
								else
								{
								popupMessage(data.message,btn_close);
								}
							 },
							 
							 
						});
					}
					}
					
					//submit on enter
					$(document).keypress(function(e) {
						if(e.which == 13) {
									saveInfo();
						}
					});
					
					
					
					
				

	</script>

</body>
</html>
