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
    	<a href="attr_categories_grid.php"><?php echo $l_categories_title_grid ?></a> » <?php echo $l_categories_new ?></h1></div>


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
	
	
		<!-- start id-form -->
        <form name="form" id="form" enctype="multipart/form-data">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <input type="hidden" id="admin_id" value="<?php echo $_SESSION['admin_id'] ?>" />
         <input type="hidden" id="id" value="<?php if(isset($_GET['id'])){ echo $_GET['id']; }else { echo '0';} ?>" />
 
        <tr>
			<th valign="top"><?php echo $l_form_language ?>:</th>
			<td>
                 <select id="lan" name="lan" class="right validate[required] " onChange="getDes(<?php echo $_GET['id'] ?>,this.value)"  >
                        
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
			<th valign="top"><?php echo $l_form_category ?>:</th>
			<td>
            <input type="text" value="" class="inp-form validate[required]" id="category" name="category" />
            
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
							  url: '../interface/InsertCategory.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			id:				$('#id').val(), 
										id_lan:			$('#lan').val(), 
										text:			$("#category").val()
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
					
					
					
					$('#type').change(function()
					{
						var selected = $(this).val();
						hideSelects();
						$('.row_'+selected).show();
						
						
	
					});
					
					function getDes(id, lan)
			{
		
			$.ajax
			({
				  url: '../interface/getCategoryDes.php',
				  type: 'post',
				  dataType: "json",
				 
				  data: {	
							id:						id,					
							lan:  					lan, 
						},
						
				  success: function(data) 
				  {
					$('#category').val(data.category);	
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