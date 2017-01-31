<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= $l_head_title;
	include_once('ui/_head.php'); 
	?>
</head>
<body onLoad="addNew()">

	
	<?php include_once('ui/_header.php'); ?>

 <div class="block_15 left">
<?php include_once('ui/_menu.php'); ?>
</div> <!--end lbock left-->


       
        
     
  	<div class="block_80 block_start  left  ">
    <div class="page_label"><?php echo $l_discounts_head_title ?></div> 
     
   
     
     <div class="block_40  left padded company_discounts" > 
     	<input type="button" onClick="addNew()" class="discount_btn_add_new btn_submit ui-corner-all" value="<?php echo $l_discounts_new; ?>"/>
        <ul class="list_discounts  v_list">
        
         <?php 
		  	 include_once('../bz/WebsitePartners.php');
			$PartnerDiscounts = WebsitePartners::getWebsitePartnerDiscounts($_SESSION['id_lan'],$_SESSION['partner_id']);	
		?>
        
        <?php if(count($PartnerDiscounts)>0): ?>
        <?php  foreach($PartnerDiscounts as $discount): ?>
       		<li   >
            <div class="bg_gr_yellow discount_preview " onClick="$('#editDiscount').click()">
            <span class="discount_perc"><?php  echo $discount['discount_perc']; ?></span>
            <p>
				<?php echo $discount['discount_text']; ?>
			</p>
            </div>
            <div class="list_options">
             <a id="editDiscount" href="javascript:editDiscount(<?php echo $discount['id_discount']; ?>,'<?php  echo $discount['discount_perc']; ?>','<?php  echo $discount['discount_text']; ?>')" title="<?php echo $l_tip_edit ?>" class="icon-2 info-tooltip"></a>
            <a href="javascript:deleteDiscount(<?php echo $discount['id_discount']; ?>,'<?php echo $l_form_confirm ?>','<?php echo $l_form_yes ?>','<?php echo $l_form_no ?>')" title="<?php echo $l_tip_delete ?>" class="icon-1 info-tooltip"></a>
           
			
            </div>
            </li> 
            
        <?php  endforeach; ?>
         <?php else: ?>
         <li class="bg_gr_yellow "  >
         
            <p>
				<?php echo $l_discount_no_discounts ?>
			</p>
            
            </li>
         
         
          <?php endif; ?>
        </ul>
    </div>
    
     <div class="block_35 discount_form padded left"> 
    <form id="form" name="form" method="post">
    				
                <ul class="v_list">
                <li>
                <h2 id="title_action"><span><?php echo $l_discounts_new ?></span><span><?php echo $l_discounts_edit ?></span></h2>
                
                </li>
                <li>
                    <input  id="id_discount" name="id_discount" class="hidden"  type="text" value="" />
                </li>
                    <li>
                    <label><?php echo $l_form_language?></label>
                     <select id="lan" name="lan" class=" block_60 validate[required] " onChange="getDes(<?php echo $_SESSION['partner_id'] ?>,this.value)" >
                        
			<?php
                include_once('../bz/Language.php'); 		
                $Languages = Language::getAllLanguages();  
            ?>
     
            <?php foreach ($Languages as $language): ?>
             
             <?php if( $language['id'] == $_SESSION['id_lan']): ?>
               <option selected="selected" value="<?php echo $language['id'] ?>" >
                    <?php echo $language['text'] ?>
               </option>
           <?php else : ?>
               <option value="<?php echo $language['id'] ?>">
                    <?php echo $language['text'] ?>
               </option>
           <?php endif; ?>
            <?php endforeach; ?>
        </select>
                    </li>
                   
                   <li>
                    <label ><?php echo $l_form_percentage ?> </label>
                    <input  id="discount_perc" name="discount_perc"  class=" block_60 validate[required]" type="text" value="" />
                    </li>
                    
                    <li>
                    <label><?php echo $l_form_discount ?></label>
                    <textarea class="validate[required] block_60" id="discount_text" name="discount_text"  ></textarea></li>
                    <li><input type="button" onClick="saveInfo()" class="btn_submit ui-corner-all" value="<?php echo $l_form_btn_save; ?>"/></li>
                </ul>
    </form>
    </div>
    
    
    
    	
    
  
  
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
    
    
<script type="text/javascript">


function saveInfo()
					{
						if($("#form").validationEngine('validate'))
						{
						
						$.ajax
						({
							  url: '../interface/InsertPartnerWebsiteDiscount.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			id_partner:				'<?php echo $_SESSION['partner_id'] ?>',
										lang:					'<?php echo $_SESSION['lang'] ?>',					
							  			id_lan:  				$("#lan").val(), 
										discount_perc: 			$("#discount_perc").val(), 
										discount_text: 			$("#discount_text").val(),
										id_discount:			$("#id_discount").val()
									},
									
							  success: function(data) 
							  {
							
								if(data.success==1)
								{
									$("#id_discount").val('');
									$("#discount_perc").val('');
									$("#discount_text").val('');
									$(".list_discounts").load(location.href+" .list_discounts>*","");
									
								}
								else
								{
									popupMessage(data.message);
								}
							 },
							 
							 
						});
						}
					
					}
					
	
	function editDiscount(id,perc,text)
	{
		$('#title_action span').eq(0).hide();
		$('#title_action span').eq(1).show();
		$("#id_discount").val(id);
		$("#discount_perc").val(perc);
		$("#discount_text").val(text);
		
	}
	
	function addNew()
	{
		$('#title_action span').eq(1).hide();
		$('#title_action span').eq(0).show();
		$("#id_discount").val('');
		$("#discount_perc").val('');
		$("#discount_text").val('');
		
	}
	
	
	
	function deleteDiscount(id,confirmText,yesText,noText)
	{
		
		popupConfirm(confirmText,yesText,noText, 
				function () {
 				//if is ok
				$.ajax
						({
							  url: '../interface/DeletePartnerWebsiteDiscount.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			id_partner:				'<?php echo $_SESSION['partner_id'] ?>',					
							  			id_lan:  				$("#lan").val(),
										id_discount:			id
									},
									
							  success: function(data) 
							  {
								$(".list_discounts").load(location.href+" .list_discounts>*","");
							 },
							 
							 
						});
				
			}, function() {
				//
			});
		
		
	
	}
	
	
	function getDes(id_partner,id_lan)
	{
		
		var id_discount = $("#id_discount").val();
		//check if id discount isset
		if(id_discount!='')
		{
			$.ajax
						({
							  url: '../interface/getPartnerWebsiteDiscountLanById.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			id_partner:				'<?php echo $_SESSION['partner_id'] ?>',					
							  			id_lan:  				$("#lan").val(),
										id_discount:			id_discount
									},
									
							  success: function(data) 
							  {
								$("#discount_perc").val(data.discount_perc);
								$("#discount_text").val(data.discount_text);
							 },
							 
							 
						});
			
		}
		
		
	}
	
	
					

</script>
 

</body>
</html>

