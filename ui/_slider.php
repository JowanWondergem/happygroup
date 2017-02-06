
    <?php
    include_once('bz/Slider.php'); 		
    $SliderImages = Slider::getSliderImages($_SESSION['id_lan']); 
	?>
    
 	<div class = 'doubleSlider-1'>	
        <div class = 'slider'>   
            <?php foreach ($SliderImages as $slider): ?>
                     
            <div class = 'item' id = 'item<?php echo $slider['id']; ?>'><img class="rounded-corners" src="includes/resize.php?h=400&w=640&image=../media/slider/<?php echo $slider['image']; ?>"  />
                <div class = 'caption bg_gr_yellow'>
                    <span class="caption_big"><?php echo $slider['title']; ?><br /><span class="caption_small"><?php echo $slider['subtitle']; ?></span></span>
                    <div class='bg'></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>  
    </div>

		
		