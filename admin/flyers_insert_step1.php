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


<div id="page-heading"><h1><a href="flyers_grid.php"><?php echo $l_flyers_title_grid ?></a> » <?php echo $l_flyers_new ?></h1></div>


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
		<?php  include_once('ui/_steps_flyers.php'); ?>
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
			<th valign="top"><?php echo $l_form_language ?>:</th>
			<td>
                 <select id="lan" name="lan" class="right validate[required] "  >
                        
			<?php
                include_once('../bz/Language.php'); 		
                $Languages = Language::getAllLanguages();  
            ?>
            <?php foreach ($Languages as $language): ?>
            
            <option value="<?php echo $language['id']; ?>"><?php echo $language['text']; ?></option>
            <?php endforeach; ?>
        </select></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top"><?php echo $l_form_flyer_type ?>:</th>
			<td>
                 <select id="type"  class="validate[required]">
                  		<option value="" ><?php echo $l_form_flyer_type_choice ?></option>
                        <option value="area" ><?php echo $l_form_area ?></option>
                        <option value="city" ><?php echo $l_form_city ?></option>
                        <option value="theme" ><?php echo $l_form_theme ?></option>
                </select></td>
			<td></td>
		</tr>
	
		
		
		<tr class="row_area">
			<th valign="top"><?php echo $l_form_area ?></th>
			<td>	
		<select id="area" class="right validate[required]" >
            <?php
                include_once('../bz/Areas.php'); 		
                $Areas = Areas::getAllAreas();  
            ?>
             <option value=""><?php echo $l_form_area_choice ?></option>
            <?php foreach ($Areas as $area): ?>
           
               <option value="<?php echo $area['id'] ?>">
                    <?php echo $area['area'] ?>
               </option>           
            <?php endforeach; ?>
         
        </select>
		</td>
		<td></td>
		</tr>
        <tr class="row_city">
			<th valign="top"><?php echo $l_form_city ?>:</th>
			<td>	
		<select id="city" class="right validate[required]" >
                        
			
            <?php
                include_once('../bz/Cities.php'); 		
                $Cities = Cities::getAllCities();  
            ?>
             <option value=""><?php echo $l_form_city_choice ?></option>
            <?php foreach ($Cities as $city): ?>
           
               <option value="<?php echo $city['id'] ?>">
                    <?php echo $city['city'] ?>
               </option>           
            <?php endforeach; ?>
            
        </select>
		</td>
		<td></td>
		</tr>
        
        
         <tr class="row_theme">
			<th valign="top"><?php echo $l_form_theme ?>:</th>
			<td>	
		<select id="theme" class="right validate[required]" >
                        
			
            <?php
                include_once('../bz/Themes.php'); 		
                $Themes = Themes::getAllThemes();  
            ?>
             <option value=""><?php echo $l_form_theme_choice ?></option>
            <?php foreach ($Themes as $theme): ?>
           
               <option value="<?php echo $theme['id'] ?>">
                    <?php echo $theme['theme'] ?>
               </option>           
            <?php endforeach; ?>
            
        </select>
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

					$('#lan').val('<?php echo $lang; ?>');
					hideSelects();
					function hideSelects()
					{
						$('.row_area').hide();
						$('.row_city').hide();
						$('.row_theme').hide();
					}
					
					
					
					
					function saveInfo()
					{
					
					
					if($("#form").validationEngine('validate'))
						{
							if($('#area').is(":visible"))
							{
								var id_city 	= '';
								var id_area 	= $('#area').val();
								var id_theme 	= '';
							}
							if($('#city').is(":visible"))
							{
								var id_city 	= $('#city').val();
								var id_area 	= '';
								var id_theme 	= '';
							}
							if($('#theme').is(":visible"))
							{
								var id_city 	= '';
								var id_area 	= '';
								var id_theme 	= $('#theme').val();
								
							}
												
						$.ajax
						({
							  url: '../interface/InsertFlyerInfo.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			active:  			$("#active").val(),
										id_lan:				$('#lan').val(), 
										id_admin:			$("#admin_id").val(),
										id_city: 			id_city,
										id_area: 			id_area,
										id_theme: 			id_theme
											
										
									},
									
							  success: function(data) 
							  {
								
								if(data.success==1)
								{
								bootbox.alert(data.message, function() 
								{
                					window.location = 'flyers_insert_step2.php?id='+data.id;
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