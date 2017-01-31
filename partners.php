<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= $l_partners_title; 
	include_once('ui/_head.php'); 
	?>

	<link rel="stylesheet" href="ui/css/jPages.css">
	<script id="helper" data-next="<?php echo $l_partners_next ?>" data-prev="<?php echo $l_partners_prev ?>" src="ui/js/jPages.js"></script>
    <script>
    var view_website = '<?php echo $l_partners_view_website ?>';
	var l_next = '<?php echo $l_partners_next ?>';
	var l_prev = '<?php echo $l_partners_prev ?>';
    </script>
</head>


<body >




	<?php include_once('ui/_header.php'); ?>

<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>

<div class="center content ">
	<?php include_once('ui/_news_flash.php'); ?>
    <div class="block_15 left">
           
          <?php include_once('ui/_menu.php'); ?>
        
     </div> <!--end lbock left-->
  	<div class="block_85 bg_brown left block_content  rounded-corners ">
    
    
    
   
    <?php
		 
		 include_once('bz/Partners.php'); 
		
		
			 if(isset($_GET['area']) && isset($_GET['city']) && isset($_GET['act']))
			 $Partners = Partners::getPartnersActivityofCity($_SESSION['id_lan'], $_GET['country'], $_GET['area'],$_GET['city'], $_GET['act']); 
			 else if(isset($_GET['area']) && isset($_GET['act']))
			 $Partners = Partners::getPartnersActivityofArea($_SESSION['id_lan'], $_GET['country'], $_GET['area'], $_GET['act']); 
			 else if(!isset($_GET['area']) && !isset($_GET['city']))
			 $Partners = Partners::getPartnersofCategory($_SESSION['id_lan'], $_GET['country'], $_GET['act']);
		 	 else if(!isset($_GET['act']) && !isset($_GET['city']))
			 $Partners = Partners::getPartnersofArea($_SESSION['id_lan'], $_GET['country'], $_GET['area']);
			  else if(!isset($_GET['act']) && !isset($_GET['area']) &&  isset($_GET['city']))
			 $Partners = Partners::getPartnersofCity($_SESSION['id_lan'], $_GET['country'], $_GET['city']);
		
		 
    		 
		
		 
			
		
		 
		
	?>
     <div class="grid_detials block_100   rounded-corners <?php if(count($Partners)==0) echo 'hidden'; ?>">
     <ul class="h_list">
     <li><div class="btn_back"><a href="index.php?type=map"><?php echo $l_partners_search_again ?></a></div></li>
     <li >
    	
	
        <?php 
			if(count($Partners)>0)
			{
				echo '<input type="text" readonly="readonly" value="'.count($Partners).'" />'; 
				echo " ".$l_partners_in_zone." ";
				if(isset($_GET['area']))
				{
					
					echo "<b> ".$Partners[0]['area']."</b>"; 
					
					/*echo '
					<select class="quick_search search_zone">';
					 
						$Areas = Areas::getAllAreas();
						
					  foreach ($Areas as $area){
						 
						if( $Partners[0]['id_area'] == $area['id'])
							echo "<option value=". $area['id'] ." selected=\"selected\">". $area['area']."</option>";
                        else
                        	echo "<option value=". $area['id'] .">". $area['area']."</option>";
                          
					 }					
                     echo "</select>";*/
					
					
					
				}
				if(isset($_GET['city']) && $_GET['city']!='undefined')
				{
					echo " - <b> ".$Partners[0]['city']."</b>";
					
					/*echo '
					<select class="quick_search search_city">';
					 
						$Cities = Cities::getAllCities();
						
					  foreach ($Cities as $city){
						 
						if( $Partners[0]['id_city'] == $city['id'])
							echo "<option value=". $city['id'] ." selected=\"selected\">". $city['city']."</option>";
                        else
                        	echo "<option value=". $city['id'] .">". $city['city']."</option>";
                          
					 }					
                     echo "</select>";*/
				}
				if(isset($_GET['act']))
				{
					echo " ".$l_of_category."<b> ".$Partners[0]['category']."</b>";
					
					/*echo '
					<select class="quick_search search_category">';
					 
						$Categories = Category::getAllCategories();
						
					  foreach ($Categories as $category){
						 
						if( $Partners[0]['id_category'] == $category['id'])
							echo "<option value=". $category['id'] ." selected=\"selected\">". $category['category']."</option>";
                        else
                        	echo "<option value=". $category['id'] .">". $category['category']."</option>";
                          
					 }					
                     echo "</select>";*/
					
					 
				}
			}
		?>
    
        
    </li>
    <li><div class="holder "></div></li>
  
    <li class="right block_25" style="float:right;">
     <form>
            <label><?php echo $l_partners_per_page; ?>: </label>
            <select>
                <option>8</option>
                <option selected="selected">16</option>
                <option>40</option>
                <option>100</option>
            </select>
        </form>
    </li>
 
   
    </ul>
     
    </div>
  
    <ul id="list_partners" class="block_100 list_partners">
    
   
     
     <?php if(count($Partners)>0): ?>
     
		  <?php foreach ($Partners as $partner): ?>
          
          
          
          
            <li id="<?php echo $partner['id']; ?>">
                <div class="partner_thumb block_100">
            
                
                	<img src="includes/resize.php?w=130&image=../media/partners/<?php echo $partner['img_s']; ?>" />
                  </div>
                <div class="partner_details block_100">
                    <a>
                        <h3 class="partner_name clear"><?php echo limitText($partner['name'],60); ?></h3>
                         <p class="partner_type left "><?php echo $partner['category']; ?></p>
                        <p class="partner_area left"><?php echo $partner['area']; ?></p>
                        <p class="partner_city left"><?php echo $partner['city']; ?></p>
                       
                       
                       
                       
                        <textarea id="des" class="hidden" ><?php echo cleanEditor(defaultText(trim($partner['description_happy']),$l_partner_not_inserted)); ?></textarea>
                       
                        <input type="text" id="img_b" class="hidden" value="<?php echo 'media/partners/'.$partner['img_b'];?>"/>
                        <input type="text" id="address" class="hidden" value="<?php echo $partner['address']; ?>"/>
                        <input type="text" id="zip_code" class="hidden" value="<?php echo $partner['zip_code']; ?>"/>
                         <input type="text" id="url" class="hidden" value="<?php echo $partner['url_website']; ?>"/>
                         <input type="text" id="email" class="hidden" value="<?php echo $partner['email']; ?>"/>
                         <input type="text" id="phone" class="hidden" value="<?php echo $partner['phone']; ?>"/>
                         <input type="text" id="mobile_phone" class="hidden" value="<?php echo $partner['mobile_phone']; ?>"/>
                          <input type="text" id="discount" class="hidden" value="<?php	echo $partner['description_discount']; ?>"/>
                          <input type="text" id="fax" class="hidden" value="<?php echo $partner['fax']; ?>"/>
                        
                    </a>
                </div>
    
            </li>
             <?php endforeach; ?>
           
        <?php else: ?>
        <div class="no_results rounded-corners bg_white block_50">
        	<img src="ui/images/unhappy.png" />
            <p><?php echo $l_partners_no_results; ?></p>
           <a class="btn_submit rounded-corners " href="index.php?type=map"><?php echo $l_partners_go_back; ?></a>
        </div>
        
         <?php endif; ?>
       
    </ul>	
   <div class="grid_detials block_100   rounded-corners <?php if(count($Partners)==0) echo 'hidden'; ?>">
     <ul class="h_list">
     <li><div class="btn_back"><a href="index.php?type=map"><?php echo $l_partners_search_again ?></a></div></li>
     <li >
    	
	
        <?php 
			if(count($Partners)>0)
			{
				echo '<input type="text" readonly="readonly" value="'.count($Partners).'" />'; 
				echo " ".$l_partners_in_zone." ";
				if(isset($_GET['area']))
				{
					
					echo "<b> ".$Partners[0]['area']."</b>"; 
					
					/*echo '
					<select class="quick_search search_zone">';
					 
						$Areas = Areas::getAllAreas();
						
					  foreach ($Areas as $area){
						 
						if( $Partners[0]['id_area'] == $area['id'])
							echo "<option value=". $area['id'] ." selected=\"selected\">". $area['area']."</option>";
                        else
                        	echo "<option value=". $area['id'] .">". $area['area']."</option>";
                          
					 }					
                     echo "</select>";*/
					
					
					
				}
				if(isset($_GET['city']) && $_GET['city']!='undefined')
				{
					echo " - <b> ".$Partners[0]['city']."</b>";
					
					/*echo '
					<select class="quick_search search_city">';
					 
						$Cities = Cities::getAllCities();
						
					  foreach ($Cities as $city){
						 
						if( $Partners[0]['id_city'] == $city['id'])
							echo "<option value=". $city['id'] ." selected=\"selected\">". $city['city']."</option>";
                        else
                        	echo "<option value=". $city['id'] .">". $city['city']."</option>";
                          
					 }					
                     echo "</select>";*/
				}
				if(isset($_GET['act']))
				{
					echo " ".$l_of_category."<b> ".$Partners[0]['category']."</b>";
					
					/*echo '
					<select class="quick_search search_category">';
					 
						$Categories = Category::getAllCategories();
						
					  foreach ($Categories as $category){
						 
						if( $Partners[0]['id_category'] == $category['id'])
							echo "<option value=". $category['id'] ." selected=\"selected\">". $category['category']."</option>";
                        else
                        	echo "<option value=". $category['id'] .">". $category['category']."</option>";
                          
					 }					
                     echo "</select>";*/
					
					 
				}
			}
		?>
    
        
    </li>
    <li><div class="holder "></div></li>
  
    <li class="right block_25" style="float:right;">
     <form>
            <label><?php echo $l_partners_per_page; ?>: </label>
            <select>
                <option>8</option>
                <option selected="selected">16</option>
                <option>40</option>
                <option>100</option>
            </select>
        </form>
    </li>
 
   
    </ul>
     
    </div>
   
 	</div>
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
    <script>

/* $(".list_partners li").hide().each(function (i) {
var delayInterval = 200; // milliseconds
$(this).delay(i * delayInterval).fadeIn();
});*/

 
</script>
<script> 
/* when document is ready */
$(function() {

	

    /* initiate plugin */
    $("div.holder").jPages({
        containerID : "list_partners",
        perPage : 16
    });
    
    /* on select change */
    $("select").change(function(){ 
        /* get new nº of items per page */
		var newPerPage = parseInt( $(this).val() );
        
        /* destroy jPages and initiate plugin again */
		$("div.holder").jPages("destroy").jPages({
			containerID   : "list_partners",
			perPage       : newPerPage
			
		
			
		});
	
	});

});
$(window).load(function() {
 //  $('.partner_thumb img').vAlign();
});

</script>
</body>
</html>
