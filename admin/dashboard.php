<?php include_once('ui/_html.php'); ?>
<head>

	<?php include_once('ui/_head.php'); ?>
    <?php include_once('../bz/Totals.php'); ?>

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
            <a class="brand" href="#"><?php echo $l_title_panel ?></a>
        </div>
    </div>
        
	</div>
	<!-- end page-heading -->
    <table border="0" width="10%" cellpadding="0" cellspacing="0" id="product-table" class="table-striped  table-condensed table-hover left" >
    <tr>
        <td class="bold">
        	<img class="img_admin" src="../media/admins/<?php echo $_SESSION['admin_image']; ?>" />
        </td>
        
    </tr>
    </table>
    <table border="0" width="40%" cellpadding="0" cellspacing="0" id="product-table" class="table-striped  table-condensed table-hover left">
    <tr>
        <td class="bold">
        	<?php echo $l_dash_today; ?>
        </td>
        <td>
       	 	<?php  echo date('Y-m-d'); ?>
        </td>
    </tr>
    <tr>
        <td class="bold">
        	
        </td>
        <td>
       	 	
        </td>
    </tr>
	<tr>
        <td class="bold">
        	<?php echo $l_dash_admin; ?>
        </td>
        <td>
       	 	<?php echo $_SESSION['admin_f_name']." ".$_SESSION['admin_l_name']; ?>
        </td>
    </tr>
    <tr>
        <td class="bold">
        	<?php echo $l_dash_email; ?>
        </td>
        <td>
       	 	<?php echo $_SESSION['admin_email_company']; ?>
        </td>
    </tr>
    <tr>
        <td class="bold">
        	<?php echo $l_dash_phone; ?>
        </td>
        <td>
       	 	<?php echo $_SESSION['admin_phone']; ?>
        </td>
    </tr>
    <tr>
        <td class="bold">
        	<?php echo $l_dash_mobile_phone; ?>
        </td>
        <td>
       	 	<?php echo $_SESSION['admin_mobile_phone']; ?>
        </td>
    </tr>
   
    </table>
    
	<table border="0" width="40%" cellpadding="0" cellspacing="0" id="product-table" class="table-striped  table-condensed table-hover left">
    <tr>
        <td class="bold">
        	<?php echo $l_dash_web_tester; ?>
        </td>
        <td>
       	 	<input id="url_tester" class="inp-form" type="text" value="" onKeyPress="checkWebsite()" onKeyDown="checkWebsite()" onKeyUp="checkWebsite()" /><br />
            <label class="message btn btn-info "></label>
        </td>
    </tr>
    <tr>
        <td class="bold">
        	<?php echo $l_dash_nr_partners; ?>
        </td>
        <td>
       	 	<?php echo Totals::getAllPartners(); ?>
        </td>
    </tr>
	<tr>
        <td class="bold">
        <?php echo $l_dash_nr_web; ?>
        </td>
        <td>
       	 	<?php echo Totals::getAllWebsites(); ?>
        </td>
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
 <script>
 
function checkWebsite()
{

	if($("#url_tester").val()!='')
	{
	$.ajax
	({
		  url: '../interface/checkWebsite.php',
		  type: 'post',
		  dataType: "json",
		 
		  data: {								
					url_tester:  					$("#url_tester").val()
				},
				
		  success: function(data) 
		  {
			
			$('label.message').html(data.message);
		 },
		 
		 
	});
	}
			else
			{
				$('label.message').html('');
			}
}
					
 </script>
</body>
</html>