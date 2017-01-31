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
           <a class="brand" href="partners_grid.php"><?php echo $l_partners_title_grid ?> &nbsp;&nbsp; »</a>
            <a class="brand" href="#"><?php echo $l_partners_contracts_title ?></a>
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
                <div class="btn-group">
                
               <button class="btn" disabled="disabled">
               <?php echo $l_partners_contracts_period ?> 
                </button>
             
                	<select  class="btn" id="year">
                    <option value="0"> <?php echo $l_partners_contracts_year ?></option>
                    <?php for($i=1; $i<5;$i++): ?> 
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor; ?>
                    </select>
                
                	<select class="btn" id="month">
                    <option value="0"> <?php echo $l_partners_contracts_month ?></option>
                     <?php for($i=1; $i<13;$i++): ?> 
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor; ?>
                    </select>
               
                	<select class="btn" id="week">
                    <option value="0"> <?php echo $l_partners_contracts_week ?></option>
                    <?php for($i=1; $i<11;$i++): ?> 
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor; ?>
                    </select>
                
                	<select class="btn" id="day">
                    <option value="0"> <?php echo $l_partners_contracts_day ?></option>
                     <?php for($i=1; $i<8;$i++): ?> 
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor; ?>
                    </select>
                
                	<a class="btn" href="javascript:getAllExpiringPartners()"><?php echo $l_partners_contracts_filter ?></a>
            
                
            
                
                </div>
                <br /><br />
                <br />
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="list">
                <thead>
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
               
					<th class="table-header-repeat line-left " width="10"><a href=""><?php echo $l_form_active ?></a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href=""><?php echo $l_form_name ?></a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href=""><?php echo $l_form_email ?></a></th>
                     <th class="table-header-repeat line-left"><a href=""><?php echo $l_form_phone ?></a></th>
                     <th class="table-header-repeat line-left"><a href=""><?php echo 'days_left';//$l_form_phone ?></a></th>
                    <th class="table-header-repeat line-left"><a href=""><?php echo $l_form_web ?></a></th>
                    
					<th class="table-header-options line-left"><a href=""><?php echo $l_form_options ?></a></th>
				</tr>
                </thead>
                <tbody>
                
          		</tbody>      
				
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			
			
			
			
			<div class="clear"></div>
            <!--  start actions-box ............................................... -->
			
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




function deletePartner(id_partner)
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



function getAllExpiringPartners()
{ 
	$.ajax
	({
		  url: '../interface/checkPartnerRenewels.php',
		  type: 'post',
		  dataType: "html",
		 
		  data: {	
					day:			$('#day').val(),
					week:			$('#week').val(),
					month:			$('#month').val(),
					year:			$('#year').val()
					
				},
				
		  success: function(data) 
		  {
			$('#list tbody').html(data);
		 },	 
	});				
}

</script>
</body>
</html>