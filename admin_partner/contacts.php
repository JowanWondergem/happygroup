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


       
    <?php 	include_once('../bz/Partners.php');
			$Partner = Partners::getInfoOfPartner($_SESSION['partner_id']);	
	?>
     
  	<div class="block_80 block_start left  ">
    <div class="page_label"><?php echo $l_contacts_head_title; ?></div> 
    <div class="block_60"> 
    <form id="form" name="form" >
                <ul class="v_list">
                	
                    <li>
                    <label><?php echo $l_form_country; ?></label>
                    <select id="country" class="block_60 validate[required] " >
                        
			<?php
                include_once('../bz/Country.php'); 		
                $Countries = Country::getAllCountries();  
            ?>
             <option value=""><?php  ?></option>
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
                	</li>
                    
                    <li>
                    <label><?php echo $l_form_area; ?></label>
                    <select id="area" class="block_60 validate[required] " >
                        
			<?php
                include_once('../bz/Areas.php'); 		
                $Areas = Areas::getAllAreas();  
            ?>
             <option value=""><?php  ?></option>
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
                	</li>
                    
                    <li>
                    <label><?php echo $l_form_city; ?></label>
                    <select id="city" class="block_60 validate[required] " >
                        
			<?php
                include_once('../bz/Cities.php'); 		
                $Cities = Cities::getAllCities();  
            ?>
             <option value=""><?php  ?></option>
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
                	</li>
                
                
                
                    <li>
                    <label ><?php echo $l_form_address; ?> </label>
                    <input  id="address" name="address" class=" block_60 validate[required]" type="text" 
                    value="<?php echo $Partner['address'] ?>" />
                    </li>
                    <li>
                    <label ><?php echo $l_form_zip_code; ?></label>
                    <input  id="zip_code" name="zip_code" class=" block_60 validate[required]" type="text" 
                    value="<?php echo $Partner['zip_code'] ?>" />
                    </li>
                     <li>
                    <label ><?php echo $l_form_phone; ?> </label>
                    <input  id="phone_1" name="phone_1"  class=" block_60 validate[required]" type="text"
                    value="<?php echo $Partner['phone'] ?>" />
                    </li>
                    <li>
                    <label ><?php echo $l_form_phone_2; ?>  </label>
                    <input  id="phone_2" name="phone_2" class=" block_60" type="text" 
                    value="<?php echo $Partner['mobile_phone'] ?>" />
                    </li>
                    <li>
                    <label ><?php echo $l_form_fax; ?>  </label>
                    <input  id="fax" name="fax"  class=" block_60 " type="text" 
                    value="<?php echo $Partner['fax'] ?>" />
                    </li>
<li>
                    <label ><?php echo $l_form_email; ?>  </label>
                    <input  id="email" name="email" class=" block_60 validate[required,custom[email]]" type="text" 
                    value="<?php echo $Partner['email'] ?>" />
                    </li>
<li>
                    <label ><?php echo $l_form_url_web_private; ?>  </label>
                    <input  id="url_website_private" name="url_website_private" class=" block_60 " type="text" 
                    value="<?php echo $Partner['url_website_private'] ?>" />
                    </li>
                   
                    
                    <li><input type="button" class="btn_submit" onClick="saveInfo()" value="<?php echo $l_form_btn_save; ?>"/></li>
                </ul>
    </form>
    </div>
    
    	
    
  
  
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
    
<script type="text/javascript">

					//declare global varaibles
					var btn_close ='<?php echo $l_form_close ?>';

	
function saveInfo()
					{
						if($("#form").validationEngine('validate'))
						{
						
						$.ajax
						({
							  url: '../interface/EditWebsitePartnerContacts.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			id:						'<?php echo $_SESSION['partner_id'] ?>',
										lang:					'<?php echo $_SESSION['lang'] ?>',						
										id_country: 			$('#country').val(),
										id_area: 				$('#area').val(),
										id_city: 				$('#city').val(),
										address: 				$('#address').val(),
										zip_code: 				$('#zip_code').val(),
										phone_1: 				$('#phone_1').val(),
										phone_2: 				$('#phone_2').val(),
										fax: 					$('#fax').val(),
										email: 					$('#email').val(),
										url_website_private: 	$('#url_website_private').val()
										
									},
									
							  success: function(data) 
							  {
							
									popupMessage(data.message,window.btn_close);
							 },
							 
							 
						});
						}
					
					}
					

</script>
    
</body>
</html>
