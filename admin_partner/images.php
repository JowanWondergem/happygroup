<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$max_files = 5;
	$max_size = 5;
	$head_title= $l_head_title;
	include_once('ui/_head.php'); 
	?>
</head>
<body onLoad="<?php // if(isset($_GET['type']) && $_GET['type']=='map') echo 'ammap.focus()'; ?>">

	
	<?php include_once('ui/_header.php'); ?>


 <div class="block_15 left">
<?php include_once('ui/_menu.php'); ?>
</div> <!--end lbock left-->


       
        
     
  	<div class="block_80 block_start  left  ">
    <div class="page_label"><?php echo $l_images_head_title ?> (max. <?php echo $max_files ?>)</div> 
   
    
     
     <div class="block_40  left company_discounts" > 
     
        <ul id="list_images" class="list_images clear v_list">
        <?php 	include_once('../bz/WebsitePartners.php'); 
			$PartnerImages = WebsitePartners::getWebsitePartnerImages($_SESSION['partner_id']);	
			$num_images = count($PartnerImages);
			
		?>
     
        <?php if($num_images>0): ?>
        <?php  foreach($PartnerImages as $partner_image): ?>
        
       		<li class=""  >
                <a href="../media/partners/<?php  echo $partner_image['url']; ?>" rel="prettyPhoto">
                	<img  src="../media/partners/<?php  echo $partner_image['url']; ?>" />
                </a>
                <div class="close" onClick="deleteImage(<?php  echo $partner_image['id']; ?>)" title="<?php echo $l_tip_delete ?>"> </div>
            </li>
     
        <?php  endforeach; ?>
        <!--[if !IE]><!-->
        <li  class="bg_gr_yellow " onClick="$('#photoimg').trigger('click')"> 	
        		<p><?php echo $l_images_no_images; ?></p>
                      
        </li>
        <!--<![endif]-->
        <?php else:?>
        <!--[if !IE]><!-->
        <li  class="bg_gr_yellow " onClick="$('#photoimg').trigger('click')"> 	
        		<p><?php echo $l_images_no_images; ?></p>
                      
        </li>
        <!--<![endif]-->
        <?php endif; ?>
        
        </ul>
    </div>
     <div class="block_35 block_images_info padded left"> 
     <ul class="v_list">
    <li>
    <h2><?php echo $l_images_new; ?></h2>
    </li>
    </ul>
     <div class="block_upload">
<form id="imageform" method="post" enctype="multipart/form-data" action='../interface/UploadPartnerWebsiteImage.php'>
<input type="hidden" name="id" value="<?php echo $_SESSION['partner_id'] ?>" />
<input type="hidden" name="folder" value="partners" />
<input type="hidden" name="img_name" id="img_name" value="<?php echo $_SESSION['partner_id'] ?>_website_image" />
<input type="hidden" name="db_table" value="partners_images" />
<input type="hidden" name="db_field" value="url" />
<input type="hidden" name="mb" value="<?php echo $max_size; ?>" />
<input type="hidden" name="max" value="<?php echo $max_files; ?>" />
<input type="hidden" name="lang" value="<?php echo $_SESSION['lang']; ?>" />
<label><?php  ?></label>
<!--[if !IE]><!-->
<input type="file" name="photoimg" id="photoimg" class="hidden" />
<!--<![endif]-->
<!--[if IE]>
<input type="file" name="photoimg" id="photoimg" />
<![endif]-->

</form>
<!--<div id='preview'>
<?php ?>
<img src='../media/partners/<?php echo $_SESSION['partner_id'] ?>/<?php echo $_SESSION['partner_id'] ?>_website_image.jpg'  class='preview'>
<?php  ?>
</div>-->
<script type="text/javascript" >

//declare global varaibles
var btn_close ='<?php echo $l_form_close ?>';

function TriggerClick(){
		  	
				$('#photoimg').trigger('click');
		   
		   };

		
		 $('#photoimg').change(function(e)			
			{ 
			 	e.preventDefault();
				$("#imageform").ajaxSubmit
				({
					async: false,
					dataType:  'xml',
					contentType: "text/html",
					cache:false,
					type: 'post',
					success:   successUpload 
				}
				)
				
				
			});
			
			
			function successUpload(responseXML)  
			{
				var message = $('message', responseXML).text();
				var success = $('success', responseXML).text(); 
    			
				if(success==0)
				{
					popupMessage(message,window.btn_close);
				}
				else
				{
					$("#list_images").load(location.href+" #list_images>*","");
					
				}
			}
			
			
		
</script>

<!--[if !IE]><!-->
    <a href="javascript:TriggerClick()"  class="btn_upload btn_submit form-file clear" >
        <img src="ui/images/icons/Add16.png" /> 
        <?php echo $l_form_btn_upload ?>
    </a>
<!--<![endif]-->
    <br /><br />

	
    <ul class="v_list">
        <p><b><?php echo $l_images_title_criteria ?></b></p>
        <li><b><?php echo $l_images_lbl_size ?></b> <?php echo $max_size; ?>mb</li>
        <li><b><?php echo $l_images_lbl_type ?></b> jpg, png, bmp, gif</li>
        <li><b><?php echo $l_images_lbl_res ?></b> 600px X 350px</li>
    </ul>

</div>
     </div>
    
  
    
    
    
    	
    
  
  
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
</body>


<script>
					function deleteImage(id)
					{
						$.ajax
						({
							  url: '../interface/deletePartnerWebsiteImage.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			id_partner:			'<?php echo $_SESSION['partner_id'] ?>',				 
										id: 				id									
									},
									
							  success: function(data) 
							  {
								//reloads particular part of page  
								$("#list_images").load(location.href+" #list_images>*","");
							
							  },
							 
							 
						});
					}
								
</script>

</script>
</html>
