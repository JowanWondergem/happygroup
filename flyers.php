<?php include_once('ui/_html.php'); ?>
<head>
 	
	<?php 
	$head_title= $l_flyers_title;  
	include_once('ui/_head.php'); 
	?>
    <link rel="stylesheet" href="ui/css/jPages.css">
	<script src="ui/js/jPages.js"></script>
</head>
<body >


    <?php // include_once('ui/popups/_popup_login.php'); ?>




	<?php include_once('ui/_header.php'); ?>

<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>

<div class="center content ">
	<?php include_once('ui/_news_flash.php'); ?>
    <!-- <div class="block_15 left">
           
          <?php include_once('ui/_menu.php'); ?>
        
     </div>  --><!--end lbock left-->
  	<div class="block_100 bg_brown left  rounded-corners ">
    
    
    	<div  class="block_95 content_info left">
    		 
            <?php
					include_once('bz/Flyers.php'); 
					$FlyersCities = Flyers::getAllCitiesFlyers($_SESSION['id_lan']);
					$FlyersAreas  = Flyers::getAllAreasFlyers($_SESSION['id_lan']);
					$FlyersThemes = Flyers::getAllThemesFlyers($_SESSION['id_lan']);
					
					
					/*$all = array();
					$all_city_names = array();
					$index = 0;
					foreach($FlyersCities as $city)
					{
						$all[$index] = $FlyersCities[$index]['id_city'];
						$all_city_names[$index] = $FlyersCities[$index]['city'];
						$index++;
					}
					$all = array_values(array_unique($all));
					$all_city_names = array_values(array_unique($all_city_names));*/
					
					
					
					
					
					
				
			?> 
            
            <div class="content ">
            
           
            
            
            
            <div class="holder hidden"></div>
         	<h1><?php echo $l_flyers_title; ?> </h1>
            
            
        
             <div class="block_100 bg_gr_brown">
               
                <div class="block_30 left">
                <img class="block_100" src="ui/images/Flyers.png" />
                </div>
            	<div class="block_60 right">
                <p>
                <?php echo $l_flyers_intro ?>
                <p>
                </div>
            </div> 
            
            <ul id="list_flyers" class="list_flyers h_list">
            
                <li class="headers">
                    <h1><?php echo $l_flyers_cities.' ('.count($FlyersCities).')'; ?></h1>
                </li>
                <?php $flyer_cities = showFlyers($FlyersCities, 'id_city', 'city'); 
				if($flyer_cities!='')
					echo $flyer_cities;
				else
					echo '<li>'.$l_flyers_no_flyers.'</li>';
				?>
                
                <li class="headers">
                    <h1><?php echo $l_flyers_zones.' ('.count($FlyersAreas).')';; ?></h1>   
                </li>
                <?php $flyer_areas = showFlyers($FlyersAreas, 'id_area', 'area'); 
				if($flyer_areas!='')
					echo $flyer_areas;
				else
					echo '<li>'.$l_flyers_no_flyers.'</li>';
				?>
                
                <li class="headers">
                    <h1><?php echo $l_flyers_themes.' ('.count($FlyersThemes).')';; ?></h1> 
                </li>
                <?php $flyer_themes = showFlyers($FlyersThemes, 'id_theme', 'theme'); 
				if($flyer_themes!='')
					echo $flyer_themes;
				else
					echo '<li>'.$l_flyers_no_flyers.'</li>';
				?>
            </ul>
            </div>
       
    	</div><!--end content info-->
    
    
    
  </div>
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
    <script> 
/* when document is ready */
$(function() {

	$("a[rel^='prettyPhoto']").prettyPhoto();
    /* initiate plugin */
    $("div.holder").jPages({
        containerID : "list_flyers"
    });
    
    

});
</script>
</body>
</html>
