<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= $l_contact_title;  
	include_once('ui/_head.php'); 
	?>
</head>
<body >


    <?php //include_once('ui/popups/_popup_login.php'); ?>




	<?php include_once('ui/_header.php'); ?>

<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>

<div class="center content ">
	<?php include_once('ui/_news_flash.php'); ?>
<!--     <div class="block_15 left">
           
          <?php include_once('ui/_menu.php'); ?>
        
     </div> <!--end lbock left--> 
  	<div class="block_100 bg_brown left  rounded-corners ">
    
    
    	<div  class="block_50 content_info left">
    
            <div id="content ">
         	<h1><?php echo  $l_contact_title; ?></h1>
            
            	<?php 
					include_once('bz/Contact.php');
					$Contact = Contact::getAllContact();
				 ?>
            	<?php foreach($Contact as $contact): ?>
                <div class="block_95 block_contacts rounded-corners bordered">
                    <h2 class="text_green"><?php echo $contact['name']; ?></h2>
                    <div><?php echo $contact['place']; ?> -  <?php echo $contact['address']; ?> - <?php echo $contact['zip_code']; ?></div>
                    <div>T: <?php echo $contact['telephone']; ?></div>
                    <div>F: <?php echo $contact['fax']; ?></div>
                    <div>E: <?php echo $contact['email']; ?></div>
                    <div><a href="https://www.facebook.com/happy.card.9" target="_blank"><img src="ui/images/face.png" /> Facebook</a></div>
                    
                </div>
                <br />
                <?php endforeach; ?>
                
                
            </div>
            <br />
            <div class="block_95 block_contacts rounded-corners bordered">
             <h2 class="text_green"><?php echo $l_contact_form_title; ?></h2>
             
             <div class="message_box"> 
			   <ul class="v_list">
			   <?php
			   if (isset($_SESSION['success']) && $_SESSION['success']!= '')
			   {
				    echo '<li class="message_success">'.$_SESSION['success'].'</li>';
					unset($_SESSION['success']);
			   }
			   else if(isset($_SESSION['errors']) && count($_SESSION['errors']) > 0)
			   {
				   foreach($_SESSION['errors'] as $error)
				   {
					   echo '<li class="message_error">'.$error.'</li>';
				   }
				   $_SESSION['errors'] = array();
			   }
			  
			   ?>
               </ul>
               </div>
             
            <form id="form_contact" name="form_contact" method="post" >
                <ul class="v_list">
                    <li><label ><?php echo $l_contact_form_email; ?>*</label>
                    <input  id="email" name="email" placeholder="<?php echo $l_contact_form_email_ex; ?>" class="validate[required,custom[email]] clear block_100" type="text" value="" style="width:100%" /></li>
                    <li><label><?php echo $l_contact_form_subject; ?>*</label>
                    <input id="subject" name="subject" class="validate[required] clear block_100" placeholder="<?php echo $l_contact_form_subject_ex; ?>" type="text" value="" style="width:100%"/></li>
                    <li><label><?php echo $l_contact_form_message; ?>*</label>
                    <textarea class="validate[required] clear block_100" id="message" name="message" placeholder="<?php echo $l_contact_form_message_ex; ?>" style="width:100%"></textarea></li>
                    <li><input id="btn_mail" class="btn_submit ui-corner-all" type="button" onclick="sendContactEmail()" value="<?php echo $l_contact_form_btn_sumbit; ?>"/></li>
                </ul>
            </form><br /><br />
            </div>
       
    	</div>
    
    
    <div class="block_45  right" >
       
        <br /> <br /> <br /> <br />
       
           <iframe id="contact_map" width="350" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-PT&amp;geocode=&amp;q=lagoa+8400&amp;aq=&amp;sll=43.399587,-98.872451&amp;sspn=51.297034,119.267578&amp;ie=UTF8&amp;hq=&amp;hnear=Lagoa,+Portugal&amp;ll=37.135663,-8.451723&amp;spn=0.027678,0.058236&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=pt-PT&amp;geocode=&amp;q=lagoa+8400&amp;aq=&amp;sll=43.399587,-98.872451&amp;sspn=51.297034,119.267578&amp;ie=UTF8&amp;hq=&amp;hnear=Lagoa,+Portugal&amp;ll=37.135663,-8.451723&amp;spn=0.027678,0.058236&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left"><?php echo $l_contact_view_map ?></a></small></li>
            
             
       
    </div>
  </div>
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
    
    <script language='javascript'>
		function sendContactEmail()
		{
			
			if($("#form_contact").validationEngine('validate'))
			{
				$('#btn_mail').val('<?php echo $l_contact_form_btn_sending; ?>');
				$.ajax
				({
					  url: 'interface/sendContactEmail.php',
					  type: 'post',
					  dataType: "json",
					  data: {	
								lang: 				'<?php echo $_SESSION['lang']; ?>',
								email:  			$("#email").val(),
								subject:			$('#subject').val(), 
								message:			$("#message").val()
							},
					  success: function(data) 
					  {
						$('#btn_mail').val('<?php echo $l_contact_form_btn_sumbit; ?>');
						popupMessage(data.message);
						
					 },
					 
					 
				});
			}
		
		}
</script>
</body>
</html>


