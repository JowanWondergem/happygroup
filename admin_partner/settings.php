<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= $l_head_title;
	include_once('ui/_head.php'); 
	
	?>
    <link rel="stylesheet" media="screen" type="text/css" href="ui/widgets/colorpicker/css/colorpicker.css" />
    
	<script type="text/javascript" src="ui/widgets/colorpicker/js/colorpicker.js"></script>
 	
</head>
<body onLoad="<?php // if(isset($_GET['type']) && $_GET['type']=='map') echo 'ammap.focus()'; ?>">

	
	<?php include_once('ui/_header.php'); ?>

 <div class="block_15 left">
<?php include_once('ui/_menu.php'); ?>
</div> <!--end lbock left-->

	<?php include_once('../bz/WebsitePartners.php');
		
			$WebsitePartners = WebsitePartners::getWebsitePartnerLayout($_SESSION['id_lan'],$_SESSION['partner_id']);	
			if(empty($WebsitePartners))
			{
				$WebsitePartners['color_background'] = '#FC0';
				$WebsitePartners['color_header'] = '#FC0';
			}
	?>
     
     <?php include_once('../bz/Partners.php');
		
			$Partner = Partners::getInfoOfPartner($_SESSION['partner_id']);	
			if(empty($Partner))
			{
				$Partner['id_category'] = '0';
			}
	?>  
      
        
     
  	<div class="block_80 block_start  left  ">
    <div class="page_label"><?php echo $l_settings_head_title; ?></div> 
    <div class="block_50 block_settings"> 
    <form id="form" name="form" method="post" >
                <ul class="v_list">
               	 <li>
                    <h2><?php echo $l_settings_head_title_safity; ?></h2>
                    </li>
                    <li>
                    <label><?php echo $l_settings_form_password ?></label>
                    <a class="btn_submit ui-corner-all"  href="settings_password.php?id=1"><?php echo $l_form_change.' '.$l_form_password; ?></a><br />
                    </li>
                	<li>
                    <h2><?php echo $l_settings_head_title_layout; ?></h2>
                    </li>
                    
                    <li>
                    <label ><?php echo $l_settings_color_background ?></label>
                   
                    <input  id="color_background"  name="color_background" 
                    class=" block_60  hidden right" type="text" value="<?php echo $WebsitePartners['color_background'] ?>" />
                    <div id="color_bg" class="right color_bg"><div style="background-color: <?php echo $WebsitePartners['color_background'] ?>"></div></div>
                    </li>
                     <li>
                    <label ><?php echo $l_settings_color_bars ?></label>
                    <input  id="color_header" name="color_header"  class=" block_60 hidden" type="text" 
                    value="<?php echo $WebsitePartners['color_header'] ?>" />
                    <div id="color_hd" class="right color_bg"><div style="background-color: <?php echo $WebsitePartners['color_header'] ?>"></div></div>
                    </li>
                    <li>
                    <h2><?php echo $l_settings_head_title_shop_detials; ?></h2>
                    </li>
                    <li>
                    <label><?php echo $l_settings_form_category ?></label>
                    <select id="category"  class="block_60 validate[required] " >
                        
			<?php
                include_once('../bz/Category.php'); 		
                $Categories = Category::getAllCategories();  
            ?>
            <option value=""><?php  ?></option>
            <?php foreach ($Categories as $category): ?>
             
             <?php if( $category['id_category'] == $Partner['id_category']): ?>
               <option selected="selected" value="<?php echo $category['id'] ?>" >
                    <?php echo $category['category'] ?>
               </option>
           <?php else : ?>
               <option value="<?php echo $category['id'] ?>">
                    <?php echo $category['category'] ?>
               </option>
           <?php endif; ?>
            <?php endforeach; ?>
        </select>
                    </li>
                   
                    
                    <li><input class="btn_submit ui-corner-all" type="button" onClick="saveInfo()" value="<?php  echo $l_form_btn_save; ?>"/></li>
                    
                    
                    
                </ul>
    </form>
    </div>
    
    	
    
  
  
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
</body>
<script language='javascript'>

	//declare global varaibles
	var btn_close ='<?php echo $l_form_close ?>';

					function saveInfo()
					{
					
						if($("#form").validationEngine('validate'))
						{
					
						
						$.ajax
						({
							  url: '../interface/EditPartnerWebsiteLayout.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			id_lan:				'<?php echo $_SESSION['id_lan'] ?>',
										lang:				'<?php echo $_SESSION['lang'] ?>',	
							  			partner_id:			'<?php echo $_SESSION['partner_id'] ?>',				 
										category: 			$("#category").val(),
										color_background:	$("#color_background").val(),
										color_header:		$("#color_header").val()								
										
									},
									
							  success: function(data) 
							  {
								  
								 
								if(data.success==1)
								{
									popupMessage(data.message,window.btn_close);
								}
								else
								{
									popupMessage(data.message,window.btn_close);
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
<script>
$('#color_bg').ColorPicker({
	color: '#0000ff',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#color_bg div').css('backgroundColor', '#' + hex);
		$('#color_background').val('#' + hex);
	}
});

$('#color_hd').ColorPicker({
	color: '#0000ff',
	onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
	},
	onChange: function (hsb, hex, rgb) {
		$('#color_hd div').css('backgroundColor', '#' + hex);
		$('#color_header').val('#' + hex);
	}
});
	</script>
</html>
