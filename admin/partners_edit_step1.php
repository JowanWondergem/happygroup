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


<div id="page-heading"><h1><a href="partners_grid.php"><?php echo $l_partners_title_grid ?></a> » <?php echo $l_partners_edit ?></h1></div>


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
		<?php include_once('ui/_steps_partners.php'); ?>
		<!--  end step-holder -->
	
    	<?php include_once('../bz/Partners.php');
		
			$Partner = Partners::getInfoOfPartner($_GET['id']);

			
			
		 ?>
    
    
    
    
		<!-- start id-form -->
        <form action="" name="form" id="form" enctype="multipart/form-data">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <input type="hidden" id="admin_id" value="<?php echo $_SESSION['admin_id'] ?>" />
         <input type="hidden" id="partner_id" value="<?php echo $_GET['id']?>" />
        
		<tr>
			<th valign="top"><?php echo $l_form_active ?>:</th>
			<td>
                 <select id="active"  class="">
                    <option value="1"   <?php if($Partner['active']==1){ echo 'selected="selected" '; } ?>  >YES</option>
                    <option value="0"   <?php if($Partner['active']==0){ echo 'selected="selected" '; } ?> >NO</option>
                    
                </select></td>
			<td></td>
		</tr>
	
		<tr>
		<th valign="top"><?php echo $l_form_category ?>:</th>
		<td>	
		<select id="category"  class=" validate[required] " >
                        
			<?php
                include_once('../bz/Category.php'); 		
                $Categories = Category::getAllCategories();  
            	
			?>
            <option value=""><?php echo $l_form_category_choice ?></option>
            <?php foreach ($Categories as $category): ?>
             
             <?php if( $category['id_category'] == $Partner['id_category']): ?>
               <option selected="selected" value="<?php echo $category['id'] ?>" >
                    <?php echo $category['category'] ?>
               </option>
           <?php else : ?>
               <option value="<?php echo $category['id_category'] ?>">
                    <?php echo $category['category'] ?>
               </option>
           <?php endif; ?>
            <?php endforeach; ?>
        </select>
		</td>
 
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
           
           
            
            <?php if( $country['id'] == $Partner['id_country']): ?>
               <option selected="selected" value="<?php echo $country['id'] ?>" >
                    <?php echo $country['country'] ?>
               </option>
           <?php else : ?>
               <option value="<?php echo $country['id'] ?>">
                    <?php echo $country['country'] ?>
               </option>
           <?php endif; ?>
            
            
            
            <?php endforeach; ?>
        </select>
		</td>
		<td></td>
		</tr> 
		<tr>
			<th valign="top"><?php echo $l_form_area?></th>
			<td>	
		<select id="area" class=" validate[required] " >
                        
			<?php
                include_once('../bz/Areas.php'); 		
                $Areas = Areas::getAllAreas();  
            ?>
             <option value=""><?php echo  $l_form_area_choice ?></option>
            <?php foreach ($Areas as $area): ?>
           
           
            
            <?php if( $area['id'] == $Partner['id_area']): ?>
               <option selected="selected" value="<?php echo $area['id'] ?>" >
                    <?php echo $area['area'] ?>
               </option>
           <?php else : ?>
               <option value="<?php echo $area['id'] ?>">
                    <?php echo $area['area'] ?>
               </option>
           <?php endif; ?>
            
            
            
            <?php endforeach; ?>
        </select>
		</td>
		<td></td>
		</tr>
        <tr>
			<th valign="top"><?php echo $l_form_city ?>:</th>
			<td>	
		<select id="city" class=" validate[required] " >
                        
			<?php
                include_once('../bz/Cities.php'); 		
                $Cities = Cities::getAllCities();  
            ?>
             <option value=""><?php echo $l_form_city_choice ?></option>
            <?php foreach ($Cities as $city): ?>
           
           
            
            <?php if( $city['id'] == $Partner['id_city']): ?>
               <option selected="selected" value="<?php echo $city['id'] ?>" >
                    <?php echo $city['city'] ?>
               </option>
           <?php else : ?>
               <option value="<?php echo $city['id'] ?>">
                    <?php echo $city['city'] ?>
               </option>
           <?php endif; ?>
            
            
            
            <?php endforeach; ?>
        </select>
		</td>
		<td></td>
		</tr>
         <tr>
			<th valign="top"><?php echo $l_form_name ?>:</th>
			<td>	
		<input id="name" type="text" value="<?php echo $Partner['name'] ?>" class="inp-form validate[required]"  />
		</td>
		<td></td>
		</tr>
        
        
         <tr>
			<th valign="top"><?php echo $l_form_owner; ?>:</th>
			<td>	
		<input id="owner" type="text" value="<?php echo $Partner['owner'] ?>" class="inp-form"  />
		</td>
		<td></td>
		</tr>
        
        <tr>
			<th valign="top"><?php echo $l_form_tax_number; ?>:</th>
			<td>	
		<input id="tax_number" type="text" value="<?php echo $Partner['tax_number'] ?>" class="inp-form"  />
		</td>
		<td></td>
		</tr>
        
        <tr>
			<th valign="top"><?php echo $l_form_bank_account; ?>:</th>
			<td>	
		<input id="bank_account" type="text" value="<?php echo $Partner['bank_account'] ?>" class="inp-form"  />
		</td>
		<td></td>
		</tr>
        
        
        <tr>
			<th valign="top"><h2><?php echo $l_partners_title_contact ?></h2></th>
			<td>	
		
		</td>
		<td></td>
		</tr>
         <tr>
			<th valign="top"><?php echo $l_form_address ?>:</th>
			<td>	
		<input id="address" type="text" value="<?php echo $Partner['address'] ?>" class="inp-form validate[required]"  />
		</td>
		<td></td>
		</tr>
        <tr>
			<th valign="top"><?php echo $l_form_zip_code ?>:</th>
			<td>	
		<input id="zip_code" type="text" value="<?php echo $Partner['zip_code'] ?>" class="inp-form validate[required]"  />
		</td>
		<td></td>
		</tr>
		 <tr>
			<th valign="top"><?php echo $l_form_email ?>:</th>
			<td>	
		<input id="email" type="text" value="<?php echo $Partner['email'] ?>" class="inp-form validate[custom[email]]"  />
		</td>
		<td></td>
		</tr>
		<tr>
			<th valign="top"><?php echo $l_form_password ?>:</th>
			<td>	
		<a href="partners_edit_step1_password.php?id=<?php echo $_GET['id']; ?>"><?php echo $l_form_change ?></a>
		</td>
		<td></td>
		</tr>

         <tr>
			<th valign="top"><?php echo $l_form_phone ?>:</th>
			<td>	
		<input id="phone" type="text" value="<?php echo $Partner['phone'] ?>" class="inp-form validate[required]"  />
		</td>
		<td></td>
		</tr>
         <tr>
			<th valign="top"><?php echo $l_form_mobile_phone ?>:</th>
			<td>	
		<input id="mobile_phone" type="text" value="<?php echo $Partner['mobile_phone'] ?>" class="inp-form"  />
		</td>
		<td></td>
		</tr>
        
          <tr>
			<th valign="top"><?php echo $l_form_fax ?>:</th>
			<td>	
		<input id="fax" type="text" value="<?php echo $Partner['fax'] ?>" class="inp-form"  />
		</td>
		<td></td>
		</tr>
        
        <tr><td>
		<h2 ><?php echo $l_partners_title_website ?> </h2>
		</td>
		
		
		
		</tr>
        
        
      
         <tr>
			<th valign="top"><?php echo $l_form_contract_start ?>:</th>
			<td>	
		<input id="date_contract_start" name="date_contract_start" value="<?php echo $Partner['date_contract_start'] ?>" class="inp-form date_picker"  />
        
		</td>
		<td>
        
        </td>
		</tr>
         <tr>
			<th valign="top"><?php echo $l_form_contract_renewal ?>:</th>
			<td>	
		<input id="date_contract_renewal" name="date_contract_renewal" value="<?php echo $Partner['date_contract_renewal'] ?>" class="inp-form date_picker"  />
        
		</td>
		<td>
        
        </td>
		</tr>
        
        <tr>
			<th valign="top"><?php echo $l_has_web_happy?> ?</th>
			<td>
                 <select id="has_happy_website" onChange="showWebsiteStuff()"  class="">
                    <option value="1"  <?php if($Partner['has_happy_website']==1){ echo 'selected="selected" '; } ?>>YES</option>
                    <option value="0"  <?php if($Partner['has_happy_website']==0){ echo 'selected="selected" '; } ?>>NO</option>
                    
                </select></td>
			<td>
             
            </td>
		</tr>
          <tr class="block_happy_web">
			<th valign="top"><?php echo $l_form_url_web_happy ?>:</th>
			<td>	
		<input id="url_website" type="text" value="<?php echo $Partner['url_website'] ?>" class="inp-form"  />
		</td>
		<td>
         <div class="bubble-left"></div>
        <div class="bubble-inner"><?php echo $l_msg_exp_web ?></div>
        <div class="bubble-right"></div>
        </td>
		</tr>
          <tr>
			<th valign="top"><?php echo $l_form_url_web_private ?>:</th>
			<td>	
		<input id="url_website_private" type="text" value="<?php echo $Partner['url_website_private'] ?>" class="inp-form"  />
		</td>
		<td>
       
        </td>
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
							  url: '../interface/EditPartnerInfo.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			partner_id:			$('#partner_id').val(),				
							  			active:  			$("#active").val(),
										admin_id:			$('#admin_id').val(), 
										category: 			$("#category").val(),
										country:			$("#country").val(),
										area:				$("#area").val(),
										city:				$("#city").val(),
										name:				$("#name").val(),
										address:			$("#address").val(),
										zip_code:			$("#zip_code").val(),
										email:				$("#email").val(),
										phone:				$("#phone").val(),	
										mobile_phone:		$("#mobile_phone").val(),
										fax:				$("#fax").val(),
										owner:				$("#owner").val(),
										tax_number:			$("#tax_number").val(),
										bank_account:		$("#bank_account").val(),	
										has_happy_website:	$("#has_happy_website").val(),	
										url_website:		$("#url_website").val(),	
										url_website_private:$("#url_website_private").val(),
										date_contract_start:$('#date_contract_start').val(),
										date_contract_renewal:$('#date_contract_renewal').val()
										
										
									},
									
							  success: function(data) 
							  {
								  
								
								bootbox.alert(data.message);
								
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
							  url: '../interface/getAreasOfCountry.php',
							  type: 'post',
							  dataType: "html",
							 
							  data: {	
							  			lan:  				lan,
										country:			country			
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
							  url: '../interface/getCitiesOfArea.php',
							  type: 'post',
							  dataType: "html",
							 
							  data: {	
							  			lan:  				lan,
										country:			country,
										area:				area
												
									},
									
							  success: function(data) 
							  {
								$('#city').html(data);
							 }
							 
							 
						});
						
	
					});
					
					
					
					function showWebsiteStuff()
					{
						if($('#has_happy_website').val()==1)
						{
							$('.block_happy_web').show();
						}
						else
						{
							$('.block_happy_web').hide();
						}
					}
					
					
			
      
	var currentDate = new Date();  
	$("#date_contract_start").datepicker("setDate",currentDate);
	$( "#date_contract_start" ).datepicker({
						changeMonth: true,
						changeYear: true,
						yearRange:'-90:+0',
						dateFormat:'yy-mm-dd', 
						onSelect: function(obj)
						{
							 var date = new Date(obj);
							 var d = date.getDate();
							 var m = date.getMonth();
							 var y = date.getFullYear();
							 var new_y = y+1;
							 var new_date = new Date(new_y, m, d);
							 var datestrInNewFormat = $.datepicker.formatDate( "yy-mm-dd", new_date);
							$( "#date_contract_renewal" ).val(datestrInNewFormat);	
						}
					});
	 $( "#date_contract_renewal" ).datepicker({
								changeMonth: true,
								changeYear: true,
								yearRange:'-90:+0',
								dateFormat:'yy-mm-dd', 
								
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