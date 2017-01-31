<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= $l_head_title;
	include_once('ui/_head.php'); 
	?>
    <script type="text/javascript" src="ui/widgets/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
    tinyMCE.init({
		 theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
      
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "none",
		theme : "advanced",
		keep_styles : false,
		mode : "textareas",
		plugins : "fullpage",
		theme_advanced_buttons3_add : "fullpage"
    });
    
    </script>
</head>
<body onLoad="getDes(<?php echo $_SESSION['partner_id'].",". $_SESSION['id_lan'] ?>)">

	
	<?php include_once('ui/_header.php'); ?>


 <div class="block_15 left">
<?php include_once('ui/_menu.php'); ?>
</div> <!--end lbock left-->


       
        
     
  	<div class="block_80 block_start  left  ">
    <div class="page_label"><?php echo $l_texts_head_title ?></div> 
    <div class="block_60 block_text"> 
    <form id="form" name="form">
                <ul class="v_list">
                    <li>
                    <label class="block_100"><?php echo $l_form_language?></label><br />
                     <select id="lan" name="lan" class="correction_select validate[required] " onChange="getDes(<?php echo $_SESSION['partner_id'] ?>,this.value)" >
                        
			<?php
                include_once('../bz/Language.php'); 		
                $Languages = Language::getAllLanguages();  
            ?>
     
            <?php foreach ($Languages as $language): ?>
             
             <?php if( $language['id'] == $_SESSION['id_lan']): ?>
               <option selected="selected" value="<?php echo $language['id'] ?>" >
                    <?php echo $language['text'] ?>
               </option>
           <?php else : ?>
               <option value="<?php echo $language['id'] ?>">
                    <?php echo $language['text'] ?>
               </option>
           <?php endif; ?>
            <?php endforeach; ?>
        </select>
                    </li>
                   
                    <li>
                    <br /><br /><br /><br />
                    <label class="block_100"><?php echo $l_form_description ?>*</label><br />
                    <textarea class="wysiwyg validate[required] clear partner_textarea" id="description" name="description"  ></textarea></li>
                    <li><input type="button" onClick="saveInfo()" class="btn_submit right ui-corner-all"  value="<?php echo $l_form_btn_save; ?>"/></li>
                </ul>
    </form>
    </div>
    
    	
    
  
  
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
 <script>
 					//declare global varaibles
					var btn_close ='<?php echo $l_form_close ?>';
 
function getDes(id, lan)
{

	$.ajax
	({
		  url: '../interface/getPartnerWebsiteDes.php',
		  type: 'post',
		  dataType: "json",
		 
		  data: {	
					id:						id,					
					lan:  					lan, 
				},
				
		  success: function(data) 
		  {
			
			tinyMCE.get('description').setContent(data.description);
		 },
		 
		 
	});
}

    



function saveInfo()
					{
						if($("#form").validationEngine('validate'))
						{
						
						$.ajax
						({
							  url: '../interface/InsertPartnerWebsiteDescription.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
							  			id:						'<?php echo $_SESSION['partner_id'] ?>',
										lang:						'<?php echo $_SESSION['lang'] ?>',					
							  			id_lan:  				$("#lan").val(), 
										description_website: 	tinyMCE.get('description').getContent()
										
									},
									
							  success: function(data) 
							  {
							
									popupMessage(data.message,window.btn_close);
							 },
							 
							 
						});
						}
					
					}
					

</script>
</body>
</html>
