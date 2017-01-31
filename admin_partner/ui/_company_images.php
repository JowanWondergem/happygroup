

<div  class="block_65 company_images <?php echo $pos; ?>">
    
        <div id="container">
        
            <div id="gallery">
            <?php foreach ($WebsitePartnerImages as $image) : ?> 
            	<span  class=" rounded-corners "><a  class=" rounded-corners " href="media/partners/<?php echo $image['url']; ?>"  rel="prettyPhoto[gallery2]"><img align="middle" class=" rounded-corners " src="media/partners/<?php echo $image['url']; ?>" /></a></span>
            <?php endforeach; ?>
            </div>
        
            
          
        
        </div>   
        <a href="#" id="next"></a>
    
    </div>