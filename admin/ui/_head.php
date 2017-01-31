<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Happygroup - <?php echo $l_title_panel; ?></title>
<link REL="SHORTCUT ICON" HREF="../ui/images/favicon.png">
<link rel="stylesheet" href="ui/css/screen.css" type="text/css" media="screen"  />
<link rel="stylesheet" href="ui/css/jquery.dataTables.css" type="text/css" media="screen" />
<link rel="stylesheet" href="ui/css/validationEngine.jquery.css"  type="text/css" media="screen" />
<link rel="stylesheet" href="ui/css/jquery-ui-1.9.2.custom.css"  type="text/css" media="screen" />
<link rel="stylesheet" href="ui/assets/css/bootstrap.css"  type="text/css" media="screen" />
<link rel="stylesheet" href="ui/css/bootstrap-image-gallery.css"  type="text/css" media="screen" />
<link rel="stylesheet" href="../ui/css/prettyPhoto.css">
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<style>
.form-file
{
margin-right:-300px;
}

</style>

<![endif]-->

<!--  jquery core -->
<script src="ui/js/jquery-1.8.0.min.js" type="text/javascript"></script>
<script src="ui/js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>
<script src="ui/js/admin_functions.js"    type="text/javascript"></script>

<script src="ui/js/jquery.dataTables.js"  type="text/javascript" ></script>
<script src="ui/assets/js/bootstrap.js"  type="text/javascript" ></script>
<script src="ui/js/bootbox.js"  type="text/javascript" ></script>
<script src="ui/js/bootstrap-image-gallery.js"  type="text/javascript" ></script>
<script src="../ui/js/jquery.prettyPhoto.js" type="text/javascript" ></script>
   <script> 
/* when document is ready */
$(function() {
	$("a[rel^='prettyPhoto']").prettyPhoto();
});
</script>
<?php if( strpos( $_SERVER['REQUEST_URI'], 'grid' ) === false ):?>
<script type="text/javascript" src="ui/js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="ui/js/jquery.validationEngine-<?php echo $_SESSION['lang'] ?>.js"></script>
<script type="text/javascript" src="ui/js/jquery.form.js"></script>
    <script>
	$(function() {
		
		jQuery("#form").validationEngine('attach',
	{scroll:true,promptPosition:'centerRight'}
	);
		
	});
</script>
<?php else: ?>
<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                
                $('#list').dataTable({
					
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
					"iDisplayLength": 25,
					"aaSorting": [[ 1, "desc" ]],
					"bProcessing": true,
					"bStateSave": true,
                    "oLanguage": 
					{
						"sUrl": "ui/locale/dataTables.<?php echo $_SESSION['lang'] ?>.txt"
					}
        
                });
				
				
				
            } );
			
			
     </script>
<?php endif; ?>
