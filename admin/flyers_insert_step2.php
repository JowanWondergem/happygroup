<?php include_once('ui/_html.php'); ?>
<head>
<?php include_once('ui/_head.php'); ?>
<?php 

if(isset($_GET['id']))
{
$partner_id= $_GET['id']; 
}
?>

<!--<link rel="stylesheet" type="text/css" href="../ui/css/imgareaselect-default.css" />
<script type="text/javascript" src="../ui/js/jquery.imgareaselect.pack.js"></script>-->

<script type="text/javascript">

var id_partner =  '<?php echo $partner_id;?>';
/*$(document).ready(function () {
    $('img.cropper').imgAreaSelect({
        aspectRatio: '1:1',	
        onSelectEnd: getSizes
    });
});

*/

</script>

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


<div id="page-heading"><h1><a href="flyers_grid.php"><?php echo $l_flyers_title_grid ?></a> » <?php echo $l_flyers_new ?></h1></div>


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
		<?php include_once('ui/_steps_flyers.php'); ?>
		<!--  end step-holder -->
		<?php include_once('../bz/Flyers.php');
		
			$Flyers = Flyers::getFlyerById($_GET['id']);
		
			
		 ?>
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        
        
        <?php
			include_once('includes/functions.php');	
			//include_once('includes/functions_images.php');	
			//echo UploadImage($partner_id,'small_temp',1,'img_s','partners',175,175,'Image Logo',0);
			
			//echo UploadImage($partner_id,'big_temp',2,'img_b','partners',500,370,'Image Large',0);
	 
	
?>
<div class="block_upload">
<form id="imageform" method="post" enctype="multipart/form-data" action='../interface/UploadImage.php'>
<input type="hidden" name="id" value="<?php echo $partner_id;?>" />
<input type="hidden" name="folder" value="flyers" />
<input type="hidden" name="img_name" value="<?php echo $partner_id;?>_flyer" />
<input type="hidden" name="db_table" value="flyers" />
<input type="hidden" name="db_field" value="url" />
<input type="hidden" name="mb" value="5" />
<input type="hidden" name="w" value="800" />
<input type="hidden" name="h" value="0" />
<label><?php echo $l_flyers_image ?></label>
<input type="file" name="photoimg" id="photoimg" class="form-file" />
</form>
<div id='preview'>
<?php 

if(!empty($Flyers)): ?>
<img src='../media/flyers/<?php echo $Flyers['url'] ?>'  class='preview'>
<?php endif; ?>
</div>
<script type="text/javascript" >
 $(document).ready(function() { 
		
            $('#photoimg').live('change', function()			{ 
			           $("#preview").html('');
			    $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
			$("#imageform").ajaxForm({
						target: '#preview'
		}).submit();
		
			});
        }); 
</script>
</div>



    
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