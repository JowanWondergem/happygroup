<?php include_once('ui/_html.php'); ?>
<head>
<?php include_once('ui/_head.php'); ?>
<script type="text/javascript" src="ui/widgets/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
		keep_styles : false,
        plugins : "fullpage",
        theme_advanced_buttons3_add : "fullpage"
});

</script>
</head>
<body onLoad="getDes(<?php echo $_GET['id'].",". $lang ?>)" > 

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
        
        <?php 
		
			include_once('../bz/Partners.php');
			$Partner = Partners::getDescriptionOfPartner($_GET['id'],2);
		 ?>
		<form>
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top"><?php echo $l_form_language; ?>:</th>
			<td>
                 <select id="lan" name="lan" class="validate[required] " onChange="getDes(<?php echo $_GET['id'] ?>,this.value)" >
                        
			<?php
                include_once('../bz/Language.php'); 		
                $Languages = Language::getAllLanguages();  
            ?>
     
            <?php foreach ($Languages as $language): ?>
             
             <?php if( $language['id'] == $lang): ?>
               <option selected="selected" value="<?php echo $language['id'] ?>" >
                    <?php echo $language['text'] ?>
               </option>
           <?php else : ?>
               <option value="<?php echo $language['id'] ?>">
                    <?php echo $language['text'] ?>
               </option>
           <?php endif; ?>
            <?php endforeach; ?>
        </select></td>
			<td></td>
		</tr>
        
        <tr>
		<th valign="top"><?php echo $l_form_discount; ?>:</th>
		<td>	
		<input class="inp-form" value="" id="discount" />
       
		</td>
		<td></td>
		</tr>
        
	
		<tr>
		<th valign="top"><?php echo $l_form_description_popup; ?>:</th>
		<td>	
		<textarea id="description" name="description" class="wysiwyg" cols="80" rows="10"></textarea>
       
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








<script type="text/javascript">


var id_partner = '<?php echo $_GET['id'] ?>';

function saveInfo()
{

	
	$.ajax
	({
		  url: '../interface/EditPartnerDescription.php',
		  type: 'post',
		  dataType: "json",
		 
		  data: {	
					id_partner:						window.id_partner,					
					id_lan:  						$("#lan").val(), 
					description_discount: 			$("#discount").val(), 
					description_happy: 				tinyMCE.get('description').getContent()
				},
				
		  success: function(data) 
		  {
			bootbox.alert(data.message);
		 },
		 
		 
	});
}
					

function getDes(id, lan)
{

	$.ajax
	({
		  url: '../interface/getPartnerDes.php',
		  type: 'post',
		  dataType: "json",
		 
		  data: {	
					id:						id,					
					lan:  					lan, 
				},
				
		  success: function(data) 
		  {
			
			
			tinyMCE.get('description').setContent(data.description);
			$('#discount').val(data.discount);
		 },
		 
		 
	});
}
					

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