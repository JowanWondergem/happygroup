<?php include_once('ui/_html.php'); ?>
<head>
<?php include_once('ui/_head.php'); ?>

</head>
<body onLoad="getDes(<?php echo $_GET['id'] ?>,<?php echo $lang ?>)" > 

	<?php  include_once('ui/_header.php'); ?>
	
<div class="clear">&nbsp;</div>
 
	<?php include_once('ui/_menu.php'); ?>

 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1><a href="web_slider_grid.php"><?php echo $l_slider_title_grid ?></a> » <?php echo $l_slider_edit ?></h1></div>


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
		<?php include_once('ui/_steps_slider.php'); ?>
		
         <?php include_once('../bz/Slider.php');		
			$Slider = Slider::getSliderInfo($_GET['id']);	
		 ?>
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
         <form action="" name="form" id="form" enctype="multipart/form-data">
         
         <tr>
			<th valign="top"><?php echo $l_form_active ?>:</th>
			<td>
                 <select id="active"  class="">
                     <option value="1"   <?php if($Slider['active']==1){ echo 'selected="selected" '; } ?>  >YES</option>
                    <option value="0"   <?php if($Slider['active']==0){ echo 'selected="selected" '; } ?> >NO</option>
                    
                </select></td>
			<td></td>
		</tr>
         
		<tr>
			<th valign="top"><?php echo $l_form_language ?>:</th>
			<td>
                 <select id="lan" name="lan" class="right validate[required] " onChange="getDes(<?php echo $_GET['id'] ?>,this.value)" >
                        
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
		<th valign="top"><?php echo $l_form_title ?>:</th>
		<td>	
		<input name="title" id="title" type="text" class="inp-form validate[required]"  />
       
		</td>
		<td></td>
		</tr>
        <tr>
		<th valign="top"><?php echo $l_form_subtitle ?>:</th>
		<td>	
		<input name="subtitle" id="subtitle" type="text" class="inp-form validate[required]"  />
       
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
    
    
    
     </form>
	</table>
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

var id_slider = '<?php echo $_GET['id'] ?>';

function saveInfo()
{
	if($("#form").validationEngine('validate'))
	{
	
	$.ajax
	({
		  url: '../interface/InsertSliderImage.php',
		  type: 'post',
		  dataType: "json",
		 
		  data: {	
					id:						window.id_slider,
					active:  				$("#active").val(),				
					id_lan:  				$("#lan").val(), 
					title: 					$('#title').val(),
					subtitle: 				$('#subtitle').val()
				},
				
		  success: function(data) 
		  {
			
			
			window.id_slider = data.id;	//set generated id , as new id
			bootbox.alert(data.message);
			
		 },
		 
		 
	});
	}				
	
}


function getDes(id, lan)
{
	$('#lan').val(lan);

	$.ajax
	({
		  url: '../interface/getSliderDes.php',
		  type: 'post',
		  dataType: "json",
		 
		  data: {	
					id:						id,					
					lan:  					lan, 
				},
				
		  success: function(data) 
		  {
			
			$('#title').val(data.title);
			$('#subtitle').val(data.subtitle);
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