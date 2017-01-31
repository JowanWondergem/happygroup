<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= $l_register_title;  
	include_once('ui/_head.php'); 
	?>
    <script>
		function showContractInfo()
		{
			/*
			*	1 = KIT member
			*	2 = KIT markeing member
			*	
			*/
			var card_type = $('#contract_type').val();	
			$('.contract_preview').hide();
			$('#contract_type_'+card_type).fadeIn(300);	
		}
	</script>
</head>


<body onLoad="<?php 

if(isset($_GET['contract_type']) && $_GET['contract_type']!= '')
{
	echo "$('#contract_type').val(".$_GET['contract_type'].");";	
}  
?>showContractInfo()">


	<?php include_once('ui/_header.php'); ?>

<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>

<div class="center content ">
	<?php include_once('ui/_news_flash.php'); ?>
    <div class="block_15 left">
           
          <?php include_once('ui/_menu.php'); ?>
        
     </div> <!--end lbock left-->
  	<div class="block_85 bg_brown left  rounded-corners ">
    
    
    	<div  class="block_100 content_info left">
    
            <div class="content block_95 ">
         	<h1><?php echo $l_register_mlm_title; ?></h1>
         
           
            <div class="block_45 left bordered rounded-corners">
             
               
			   
			   <div class="message_box"> 
			   <ul class="v_list">
			   <?php
			   if (isset($_SESSION['success']) && $_SESSION['success']!= '')
			   {
				    echo '<li class="message_success">'.$_SESSION['success'].'</li>';
					unset($_SESSION['success']);
			   }
			   else if(isset($_SESSION['errors']) && count($_SESSION['errors']) > 0)
			   {
				   foreach($_SESSION['errors'] as $error)
				   {
					   echo '<li class="message_error">'.$error.'</li>';
				   }
				   $_SESSION['errors'] = array();
			   }
			  
			   ?>
               </ul>
               </div>
               
               
               <form id="form_register_mlm" name="form_register_mlm"  method="post" action="interface/registerMLMpartner.php">
                <ul class="v_list">
                	<li><label><?php echo $l_register_mlm_lbl_contract_type; ?></label>
                    	<select id="contract_type" name="contract_type" class="right" onChange="showContractInfo()" >
							 <?php 
                                include_once('bz/MLM_Contracts.php');
                                $Contracts = MLM_Contracts::getAllContracts();
                            ?>
                            <?php foreach ($Contracts as $contract) : ?>
                                <option value="<?php echo $contract['id'] ?>"><?php echo $contract['name'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </li>
                    <li>
                    	<label><?php echo $l_register_mlm_lbl_sponsor; ?>*</label>
                        <input name="sponsor" class="validate[required]" type="text" value="" />
                    </li>
                    <li>
                    	<label><?php echo $l_register_mlm_lbl_first_name; ?>*</label>
                        <input name="first_name" class="validate[required]" type="text" value="" />
                    </li>
                    <li>
                    	<label><?php echo $l_register_mlm_lbl_last_name; ?>*</label>
                        <input name="last_name" class="validate[required]" type="text" value=""/>
                    </li>
                    <li>
                    	<label><?php echo $l_register_mlm_lbl_address; ?>*</label>
                        <input name="address" class="validate[required]" type="text" value=""/>
                    </li>
                    <li>
                    	<label><?php echo $l_register_mlm_lbl_country; ?>*</label>
                    	<select name="country" class="right validate[required]" >
							<?php
                                include_once('bz/Country.php'); 		
                                $Countries = Country::getAllCountries();  
                            ?>
                        	<?php foreach ($Countries as $country): ?>
                        	<option value="<?php echo $country['id']; ?>"><?php echo $country['country']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </li>
                    <li>
                    	<label><?php echo $l_register_mlm_lbl_city; ?>*</label>
                        <input name="city" class="validate[required]" type="text" value=""/>
                    </li>
                   
                     <li>
                     	<label><?php echo $l_register_mlm_zip_code; ?>*</label>
                        <input name="zip_code" class="validate[required]" id="zip_code"  type="text" value=""/>
                     </li>
                     <li>
                     	 <label><?php echo $l_register_mlm_identification; ?>*</label>
                         <input name="identification" class="validate[required]" id="identification"  type="text" value=""/>
                     </li>
                     <li>
                     	 <label><?php echo $l_register_mlm_lbl_date_of_birth; ?>*</label>
                         <input name="date_birth" class="validate[required]" id="date_birth"  type="text" value=""/>
                    </li>
                    <li>
                    	<label><?php echo $l_register_mlm_lbl_phone; ?>*</label>
                        <input name="phone" class="validate[required]" type="text" value=""/>
                    </li>
                    <li>
                        <label><?php echo $l_register_mlm_lbl_m_phone; ?>*</label>
                        <input name="mobile_phone" type="text" value=""/>
                    </li>
                    <li>
                        <label><?php echo $l_register_mlm_lbl_email; ?>*</label>
                        <input name="email" class="validate[required,custom[email]]" type="text" value=""/>
                    </li> 
                    <li>
                        <label><?php echo $l_register_mlm_lbl_password; ?>*</label>
                        <input name="password" class="validate[required]" type="password" value=""/>
                    </li>
                     <li>
                         <label><?php echo $l_register_mlm_lbl_password_confirm; ?>*</label>
                         <input name="password_confirm" class="validate[required]" type="password" value=""/>
                     </li>
                   
                    <br /><br />
                    
                    <li>
                    	<input class="btn_submit ui-corner-all" type="submit" value="<?php echo $l_register_btn_submit; ?>"/>
                    </li>
                </ul>
                </form>
            </div><!-- end register block -->
           
           
           <?php foreach ($Contracts as $contract) : ?>
            <div id="contract_type_<?php echo $contract['id'] ?>" class="contract_preview block_45 right bordered rounded-corners">
               <h2 class="text_green"><?php echo $contract['name'] ?></h2>
               <br />
               <ul class="v_list ">
                   <li><?php echo $contract['info'] ?></li>
                   <br />
                    <li class="btn_submit ui-corner-all"><?php echo $l_register_price ?>: &euro; <?php echo $contract['price'] ?></li>
               </ul>
               <br />
               <img class="block_100" src="media/mlm_contracts/<?php echo $contract['image'] ?>" />
            </div><!-- end card -->
             <?php endforeach;?>
            
            
            </div>
       
    	</div>
    
    
    
  </div>
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
    

</body>
</html>


