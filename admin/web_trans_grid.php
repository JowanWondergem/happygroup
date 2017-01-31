	<?php include_once('ui/_html.php'); ?>
<head>

	<?php include_once('ui/_head.php'); ?>
 

</head>
<body> 

	<?php include_once('ui/_header.php'); ?>
	
<div class="clear">&nbsp;</div>
 
	<?php include_once('ui/_menu.php'); ?>

 <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Translations</h1>
      
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				<?php // include_once('ui/_message_box.php'); ?>
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
                
                <?php
				
                include_once('../bz/WebsiteInterface.php');
    	 		$Trans = WebsiteInterface::getAllTranslations($lang);  
				
				
				
                ?>
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="list">
                <thead>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
               
					
					<th  width="15" class="table-header-repeat line-left minwidth-1"><a href="">Section</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Part</a></th>
                     <th class="table-header-repeat line-left minwidth-1"><a href="">Text</a></th>
	
                    
					<th  width="10" class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
                </thead>
                <tbody>
                <?php foreach ($Trans as $trans): ?>
                
				<tr>
					<td><input value="<?php echo $trans['id']; ?>"  type="checkbox"/></td>
                    
					<td><?php echo $trans['section']; ?></td>
                    <td><?php echo $trans['part']; ?></td>
                    <td><?php echo $trans['text']; ?></td>
					
                   
					<td class="options-width">
					<a href="slider_edit_step1.php?id=<?php echo $slider['id']; ?>" title="Edit Info" class="icon-1 info-tooltip"></a>
					<a href="javascript:deleteSlider(<?php echo $slider['id']; ?>)" title="Delete" class="icon-2 info-tooltip"></a>
					<!--<a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a>-->
					</td>
				</tr>
                
                
                <?php endforeach; ?>
          		</tbody>      
				
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			
			
			
			
			<div class="clear"></div>
            <!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="javascript:deleteMultiplePartners()" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         

	<?php include_once('ui/_footer.php'); ?>

<!-- end footer -->
 <script type="text/javascript">




function deleteSlider(id)
					{
						var answer = confirm("Are you sure, it will delete all related info ?")
						if(answer) {
          
      
						$.ajax
						({
							  url: '../interface/deletePartner.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			id_partner:			id_partner
									},
									
							  success: function(data) 
							  {
								
								if(data.success==1)
								{
								alert(data.message);
								location.reload();
								
								}
								else
								{
								alert(data.message);
								}
							 },
							 
							 
						});
					}
					  }
					
function deleteMultiplePartners()
{
	var arr = [];
	var i = 0;
	$('.sorting_1').each(function(index) {
		
		if($(this).children("span").attr('class').search('ui-checkbox-state-checked') != -1)
		{
			arr[i] = $(this).children("input").val();
			i++;
		}
		
		
	});
	
	
	
	var answer = confirm("Are you sure, it will delete all related info of all selected partners ?")
						if(answer) {
          
      
						$.ajax
						({
							  url: '../interface/deletePartners.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			arr_partners:			arr
									},
									
							  success: function(data) 
							  {
								
								if(data.success==1)
								{
								alert(data.message);
								location.reload();
								
								}
								else
								{
								alert(data.message);
								}
							 },
							 
							 
						});
					}
	
	
}

</script>
</body>
</html>