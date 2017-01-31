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


<div id="page-heading"><h1><a href="attr_languages_grid.php"><?php echo $l_languages_title_grid ?></a> » <?php echo $l_languages_edit ?></h1></div>


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
	
	
		 <?php include_once('../bz/Language.php');		
			$Language = Language::getLanguagesById($_GET['id']);
			
		 ?>
         
        
	
		<!-- start id-form -->
        <form action="" name="form" id="form" enctype="multipart/form-data">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <input type="hidden" id="admin_id" value="<?php echo $_SESSION['admin_id'] ?>" />
      	<input type="hidden" id="id_language" value="<?php echo $_GET['id'] ?>" />
     
		
         <tr>
			<th valign="top"><?php echo $l_form_code ?>:</th>
			<td>	
            <input id="code" disabled="disabled" type="text" value="<?php echo $Language['code'] ?>" class="inp-form validate[required,maxSize[2]]"  />
		</td>
		<td></td>
		</tr>
        
         <tr>
			<th valign="top"><?php echo $l_form_language ?>:</th>
			<td>	
            <input id="text" type="text" value="<?php echo $Language['text'] ?>" class="inp-form validate[required]"  />
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
							  url: '../interface/EditLanguage.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			code:  			$("#code").val(),
										text:			$('#text').val(), 
										id_admin:		$('#admin_id').val(), 
										id:				$('#id_language').val()
										
									
									},
									
							  success: function(data) 
							  {
								
								if(data.success==1)
								{
								bootbox.alert(data.message, function() 
								{
									window.location = 'attr_languages_grid.php?id='+data.id;
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