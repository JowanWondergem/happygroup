<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= $l_about_title;  
	include_once('ui/_head.php'); 
	?>
</head>
<body >


    <?php //include_once('ui/popups/_popup_login.php'); ?>




	<?php include_once('ui/_header.php'); ?>

<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>

<div class="center content ">
	<?php include_once('ui/_news_flash.php'); ?>
    <!-- <div class="block_15 left">
           
          <?php include_once('ui/_menu.php'); ?>
        
     </div>  --><!--end lbock left-->
  	<div class="block_100 bg_brown left  rounded-corners ">
    
    
    	<div  class="block_75 content_info left">
    
            <div id="content ">
            
             <?php
					include_once('bz/WebsiteInterface.php'); 		
					$AboutUs = (new WebsiteInterface)->getAboutUs($_SESSION['id_lan']);  
					
			?>
            
            
         	<h1><?php echo $l_about_title;  ?></h1>
            <h2 class="text_yellow"><?php // echo $AboutUs['text']; ?></h2>
            <p><?php echo $AboutUs['text']; ?>  </p>
              
            
            </div>
       
    	</div>
    
    
    <div class="block_25  right block_start" >
        <ul class="list_blocks  v_list">
            <li class="" ><img class="block_100"  src="media/about/1.png" /></li>
            <li class="" ><img class="block_100" src="media/about/3.png" /></li>
            <li class="" ><img class="block_100" src="media/about/2.png" /></li>
             
        </ul>
    </div>
  </div>
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
</body>
</html>
