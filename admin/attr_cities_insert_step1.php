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


<div id="page-heading"><h1><a href="attr_cities_grid.php"><?php echo $l_cities_title_grid ?></a> » <?php echo $l_cities_new ?></h1></div>


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
		<?php  include_once('ui/_steps_cities.php'); ?>
		<!--  end step-holder -->
	
		<!-- start id-form -->
        <form action="" name="form" id="form" enctype="multipart/form-data">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <input type="hidden" id="admin_id" value="<?php echo $_SESSION['admin_id'] ?>" />
        
	
        
         
        <tr>
			<th valign="top"><?php echo $l_form_country ?>:</th>
			<td>
                <select id="country" name="country" class="right validate[required] "  >   
                <?php
                    include_once('../bz/Country.php'); 		
                    $Countries = Country::getAllCountries($lang);  
                ?>
                <?php foreach ($Countries as $country): ?>
                    <option value="<?php echo $country['id']; ?>"><?php echo $country['country']; ?></option>
                <?php endforeach; ?>
                </select>
            </td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top"><?php echo $l_form_area ?>:</th>
			<td>
                <select id="area" name="area" class="right validate[required] "  >   
                <?php
                    include_once('../bz/Areas.php'); 		
                    $Areas = Areas::getAllAreasFromCountry($lang);  
                ?>
                <?php foreach ($Areas as $area): ?>
                    <option value="<?php echo $area['id']; ?>"><?php echo $area['area']; ?></option>
                <?php endforeach; ?>
                </select>

            
            </td>
			<td></td>
		</tr>
	
		  
        <tr>
			<th valign="top"><?php echo $l_form_code ?>:</th>
			<td>
               <input type="text" value="" name="code" id="code" class="inp-form right validate[required]"/>
            </td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top"><?php echo $l_form_city ?>:</th>
			<td>
               <input type="text" value="" name="city" id="city" class="inp-form validate[required]"/>
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
							  url: '../interface/InsertCity.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
										id_admin:			$("#admin_id").val(),
										id_country: 		$("#country").val(),
										id_area: 			$("#area").val(),
										code: 				$("#code").val(),
										text:				$("#city").val()
											
										
									},
									
							  success: function(data) 
							  {
								
								if(data.success==1)
								{
								bootbox.alert(data.message, function() 
								{
									window.location = 'attr_cities_insert_step2.php?id='+data.id;
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
					
					
					
					$('#type').change(function()
					{
						var selected = $(this).val();
						hideSelects();
						$('.row_'+selected).show();
						
						
	
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