<?php include_once('ui/_html.php'); ?>
<head>
<?php include_once('ui/_head.php'); ?>

</head>
<body onLoad="getDes(<?php echo $_GET['id'].",". $lang ?>)"> 

	<?php  include_once('ui/_header.php'); ?>
	
<div class="clear">&nbsp;</div>
 
	<?php include_once('ui/_menu.php'); ?>

 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading">
	<h1>
	<a href="flyers_grid.php"><?php echo $l_flyers_title_grid ?></a> » 
    <a href="flyers_themes_grid.php"><?php echo $l_themes_title_grid ?></a> » 
    <?php echo $l_themes_edit ?></h1>
</div>

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
		
		<!--  end step-holder -->
	
		<!-- start id-form -->
        <form action="" name="form" id="form" enctype="multipart/form-data">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <input type="hidden" id="admin_id" value="<?php echo $_SESSION['admin_id'] ?>" />
    
        
         
        <tr>
			<th valign="top"><?php echo $l_form_language ?>:</th>
			<td>
                 <select id="lan" name="lan" class="right validate[required] " onChange="getDes(<?php echo $_GET['id'] ?>,this.value)"  >
                        
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
			<th valign="top"><?php echo $l_form_theme ?>:</th>
			<td>
            <input type="text" value=""  id="theme" class= "inp-form validate[required] "/>   
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
					function saveInfo()
					{
					
					
					if($("#form").validationEngine('validate'))
						{
							
					
						
						$.ajax
						({
							  url: '../interface/EditFlyerTheme.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			
										id_lan:					$('#lan').val(), 
										theme:					$("#theme").val(),
										id_theme:				'<?php echo $_GET['id'] ?>'
											
										
									},
									
							  success: function(data) 
							  {
								
								if(data.success==1)
								{
								alert(data.message);
								window.location = 'flyers_themes_grid.php';
								}
								else
								{
								alert(data.message);
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
					
					
					
					
function getDes(id, lan)
	{
	
	$.ajax
	({
		url: '../interface/getThemesDes.php',
		type: 'post',
		dataType: "json",
		
		data: {	
		id:						id,					
		lan:  					lan, 
	},
	
	success: function(data) 
	{
		$('#theme').val(data.theme);	
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