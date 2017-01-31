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
		
        <div class="navbar">
          <div class="navbar-inner">
            <a class="brand" href="#"><?php echo $l_cities_title_grid ?></a>
            <ul class="nav">
             <a class="btn" href="attr_cities_insert_step1.php"><?php echo $l_cities_new ?></a>
            </ul>
          </div>
		</div>
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
				
                include_once('../bz/Cities.php'); 
    	 		$Cities = Cities::getAllCities($_SESSION['id_lan']);  
				
                ?>
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="list">
                <thead>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
           
					<th class="table-header-repeat line-left minwidth-1"><a href=""><?php echo $l_form_code ?></a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href=""><?php echo $l_form_country ?></a></th>
                     <th class="table-header-repeat line-left minwidth-1"><a href=""><?php echo $l_form_area ?></a></th> 
                     <th class="table-header-repeat line-left minwidth-1"><a href=""><?php echo $l_form_city ?></a></th>             
					<th class="table-header-options line-left"><a href=""><?php echo $l_form_options ?> </a></th>
				</tr>
                </thead>
                <tbody>
                <?php foreach ($Cities as $city): ?>
                
				<tr>
					<td><input value="<?php echo $city['id']; ?>"  type="checkbox"/></td>
                   
					<td><?php echo $city['code']; ?></td>
                    <td><?php echo $city['country']; ?></td>
                    <td><?php echo $city['area']; ?></td>
                     <td><?php echo $city['city']; ?></td>
                    
                   
					<td class="options-width">
					<a href="attr_cities_edit_step1.php?id=<?php echo $city['id']; ?>" title="Edit City" class="icon-1 info-tooltip"></a>
                    <a href="attr_cities_edit_step2.php?id=<?php echo $city['id']; ?>" title="Edit Translation" class="icon-1 info-tooltip"></a>
					<a href="javascript:deleteCity(<?php echo $city['id']; ?>)" title="Delete" class="icon-2 info-tooltip"></a>
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
			<!--	<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="javascript:deleteMultiplePartners()" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>-->
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




function deleteCity(id)
					{
						var answer =bootbox.confirm("Are you sure, it will delete all related info ?", function(confirmed) {
						if(confirmed) {
          
      
						$.ajax
						({
							  url: '../interface/deleteCity.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			id:			id
									},
									
							  success: function(data) 
							  {
								
								if(data.success==1)
								{
								bootbox.alert(data.message, function(){	
									location.reload();
								});
								}
								else
								{
								bootbox.alert(data.message);
								}
							 },
							 
							 
						});	}}	);	
					
					  }


</script>
</body>
</html>