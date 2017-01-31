<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= $l_register_title;  
	include_once('ui/_head.php'); 
	?>
</head>



<body onLoad="<?php 

if(isset($_GET['card_type']) && $_GET['card_type']!= '')
{
	echo "$('#card_type').val(".$_GET['card_type'].");";	
}  
?>showCardInfo()">


	<?php include_once('ui/_header.php'); ?>

<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>

<div class="center content ">
	<?php include_once('ui/_news_flash.php'); ?>
    <div class="block_15 left">
           
          <?php include_once('ui/_menu.php'); ?>
        
     </div> <!--end lbock left-->
  	<div class="block_85 bg_brown left  rounded-corners ">
    
    
    	<div  class="block_100 content_info left">
    
            <div class="content block_95 ">
         	<h1><?php echo $l_register_title; ?></h1>
            
            <p><?php echo $l_register_intro; ?> 
           </p>
           
            <div class="block_45 left bordered rounded-corners">
             
               
			   
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
               
               
               <form id="form_register" name="form_register" onSubmit="checkAge();" method="post" action="interface/registerCartholder.php">
                <ul class="v_list">
                	<li><label><?php echo $l_register_lbl_card_type; ?></label>
                    	<select id="card_type" name="card_type" class="right" onChange="showCardInfo()" >
                         <?php 
							include_once('bz/Cards.php');
							$Cards = Cards::getAllCards();
						?>
                        <?php foreach ($Cards as $card) : ?>
                        	<option value="<?php echo $card['id'] ?>"><?php echo $card['name'] ?></option>
                        <?php endforeach;?>
                        </select>
                    
                    </li>
                    <li><label><?php echo $l_register_lbl_n_agent; ?></label><input name="cartholder_agent" class="validate[required]" type="text" value="" /></li>
                    <li><label><?php echo $l_register_lbl_first_name; ?></label><input name="cartholder_first_name" class="validate[required]" type="text" value="" /></li>
                    <li><label><?php echo $l_register_lbl_last_name; ?></label><input name="cartholder_last_name" class="validate[required]" type="text" value=""/></li>
                    <li><label><?php echo $l_register_lbl_date_of_birth; ?></label><input name="cartholder_date_birth" class="validate[required]" id="date_birth"  type="text" value=""/></li>
                    <li><label><?php echo $l_register_lbl_phone; ?></label><input name="cartholder_phone" class="validate[required]" type="text" value=""/></li>
                    <li><label><?php echo $l_register_lbl_m_phone; ?></label><input name="cartholder_mobile_phone" type="text" value=""/></li>
                    <li><label><?php echo $l_register_lbl_email; ?></label><input name="cartholder_email" class="validate[required,custom[email]]" type="text" value=""/></li>
                    <li><label><?php echo $l_register_lbl_address; ?></label><input name="cartholder_address" class="validate[required]" type="text" value=""/></li>
                    <li><label><?php echo $l_register_lbl_country; ?></label>
                    	<select name="cartholder_country" class="right validate[required]" >
                        
                        <?php
							include_once('bz/Country.php'); 		
							$Countries = Country::getAllCountries();  
						   
						?>
                        	<?php foreach ($Countries as $country): ?>
							
                        	<option value="<?php echo $country['id']; ?>"><?php echo $country['country']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    
                    </li>
                    <br /><br />
                    <li><input class="btn_submit ui-corner-all" type="submit" value="<?php echo $l_register_btn_submit; ?>"/></li>
                </ul>
                </form>
            </div><!-- end register block -->
           
           
           <?php foreach ($Cards as $card) : ?>
            <div id="card_type_<?php echo $card['id'] ?>" class="card_preview block_45 right bordered rounded-corners">
               <h2 class="text_green"><?php echo $card['name'] ?></h2>
               <br />
               <ul class="v_list list_bullets">
                   <li><?php echo $card['description'] ?></li>
                   <li><?php echo $l_register_duration ?>: <?php echo $card['duration'] ?></li>
                    <li><?php echo $l_register_price ?>: &euro; <?php echo $card['price'] ?></li>
               </ul>
               <br />
               <img class="block_100" src="media/cards/<?php echo $card['image_register'] ?>" />
            </div><!-- end card -->
             <?php endforeach;?>
            
            
            </div>
       
    	</div>
    
    
    
  </div>
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
</body>
</html>
