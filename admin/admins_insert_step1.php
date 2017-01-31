<?php include_once('ui/_html.php'); ?>
<head>
<?php include_once('ui/_head.php'); ?>

</head>
<body> 

	<?php  include_once('ui/_header.php'); ?>
	
<div class="clear">&nbsp;</div>
 
	<?php include_once('ui/_menu.php'); ?>

 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1><a href="admins_grid.php"><?php echo $l_admins_title_grid ?></a> » <?php echo $l_admins_new ?></h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="ui/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="ui/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		<?php include_once('ui/_steps_admins.php'); ?>
		<!--  end step-holder -->
	
		<!-- start id-form -->
        <form action="" name="form" id="form" enctype="multipart/form-data">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <input type="hidden" id="admin_id" value="<?php echo $_SESSION['admin_id'] ?>" />
        
		<tr>
			<th valign="top"><?php echo $l_form_active ?>:</th>
			<td>
                 <select id="active"  class="">
                    <option value="1" selected="selected">YES</option>
                    <option value="0">NO</option>
                    
                </select></td>
			<td></td>
		</tr>
	
		
		<tr>
		<th valign="top"><?php echo $l_form_country ?>:</th>
		<td>	
		<select id="country" class=" validate[required] " >
                        
			<?php
                include_once('../bz/Country.php'); 		
                $Countries = Country::getAllCountries();  
            ?>
             <option value=""><?php echo $l_form_country_choice ?></option>
            <?php foreach ($Countries as $country): ?>
           
            <option value="<?php echo $country['id']; ?>"><?php echo $country['country']; ?></option>
            <?php endforeach; ?>
        </select>
		</td>
		<td></td>
		</tr> 
		
         <tr>
			<th valign="top"><?php echo $l_form_first_name?>:</th>
			<td>	
		<input id="first_name" type="text" value="" class="inp-form validate[required]"  />
		</td>
		<td></td>
		</tr>
        
          <tr>
			<th valign="top"><?php echo $l_form_last_name ?>:</th>
			<td>	
		<input id="last_name" type="text" value="" class="inp-form validate[required]"  />
		</td>
		<td></td>
		</tr>
        
         <tr>
			<th valign="top"><?php echo $l_form_address ?>:</th>
			<td>	
		<input id="address" type="text" value="" class="inp-form validate[required]"  />
		</td>
		<td></td>
		</tr>
		 <tr>
			<th valign="top"><?php echo $l_form_email_private ?>:</th>
			<td>	
		<input id="email_private" type="text" value="" class="inp-form validate[required,custom[email]]"  />
		</td>
		<td></td>
		</tr>
        <tr>
			<th valign="top"><?php echo $l_form_email_company ?>:</th>
			<td>	
		<input id="email_company" type="text" value="" class="inp-form validate[required,custom[email]]"  />
		</td>
		<td></td>
		</tr>
         <tr>
			<th valign="top"><?php echo $l_form_phone ?>:</th>
			<td>	
		<input id="phone" type="text" value="" class="inp-form validate[required]"  />
		</td>
		<td></td>
		</tr>
         <tr>
			<th valign="top"><?php echo $l_form_mobile_phone ?>:</th>
			<td>	
		<input id="mobile_phone" type="text" value="" class="inp-form"  />
		</td>
		<td></td>
		</tr>
        
        
        
         <tr>
			<th valign="top"><?php echo $l_form_password ?>:</th>
			<td>	
		<input id="password" type="password" value="" class="inp-form validate[required]"   />
		</td>
		<td></td>
		</tr>
        
      
		
        
        
        
        
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
        	<input type="reset" value="<?php echo $l_form_btn_cancel ?>" class="btn btn-danger"  />
			<input type="button" value="<?php echo $l_form_btn_save; ?>" onClick="saveInfo()" class="btn btn-success" />
			
		</td>
		<td></td>
	</tr>
    
    
    
    
	</table>
    </form>
	<!-- end id-form  -->

	</td>
	<td>

	

</td>
</tr>
<tr>
<td><img src="ui/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>

<script language='javascript'>
					function saveInfo()
					{
					
						if($("#form").validationEngine('validate'))
						{
					
						
						$.ajax
						({
							  url: '../interface/InsertAdminInfo.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			active:  			$("#active").val(),
										id_admin_registrator:$('#admin_id').val(), 
										id_country:			$("#country").val(),
										first_name:			$("#first_name").val(),
										last_name:			$("#last_name").val(),
										address:			$("#address").val(),
										email_private:		$("#email_private").val(),
										email_company:		$("#email_company").val(),
										phone:				$("#phone").val(),	
										mobile_phone:		$("#mobile_phone").val(),	
										password:			$('#password').val()
									
									},
									
							  success: function(data) 
							  {
								 
								if(data.success==1)
								{
								bootbox.alert(data.message, function() 
								{
                					window.location = 'admins_insert_step2.php?id='+data.id;
            					}
								);
								
								}
								else
								{
								bootbox.alert(data.message);
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
					
					
					
					$('#country').change(function()
					{
						var lan = 2;
						var country = $(this).val();
						$.ajax
						({
							  url: '../bz/Areas.php',
							  type: 'post',
							  dataType: "html",
							 
							  data: {	
							  			lan:  				lan,
										country:			country,
										func:				'getAllAreasFromCountryList'			
									},
									
							  success: function(data) 
							  {
							
							
								$('#area').html(data);
							 }
							 
							 
						});
						
	
					});
					
					$('#area').change(function()
					{
						
						var lan = 2;
						var country = $('#country').val();
						var area = $(this).val();
						$.ajax
						({
							  url: '../bz/Cities.php',
							  type: 'post',
							  dataType: "html",
							 
							  data: {	
							  			lan:  				lan,
										country:			country,
										area:				area,
										func:				'getAllCitiesFromAreaList'			
									},
									
							  success: function(data) 
							  {
							
							
								$('#city').html(data);
							 }
							 
							 
						});
						
	
					});

	</script>







 





<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         

	<?php include_once('ui/_footer.php'); ?>

<!-- end footer -->
 
</body>
</html>