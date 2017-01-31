

<div  class=" span6 <?php echo $pos; ?>">
    
        <div id="container">
        
            <div id="gallery">
            <?php foreach ($WebsitePartnerImages as $image) : ?> 
            	<span  class=" rounded-corners ">
                    <a  class=" rounded-corners " href="media/partners/<?php echo $image['url']; ?>"  rel="prettyPhoto[gallery2]">
                    	<img align="middle" class="img-rounded " src="media/partners/<?php echo $image['url']; ?>" />
                    </a>
                </span>
            <?php endforeach; ?>
            </div>
        
            
          
        
        </div>  
         <a id="prev"></a> 
        <a  id="next"></a>
         <div id="thumbs" class="span5">
            <?php foreach ($WebsitePartnerImages as $image) : ?> 
            	<div class=" left" >
                	<a href="media/partners/<?php echo $image['url']; ?>"  rel="prettyPhoto[gallery1]">
                    	<img class=" img-rounded "  src="media/partners/<?php echo $image['url']; ?>" />
                    </a>
                </div>
            <?php endforeach; ?>
    </div>
    
    </div>