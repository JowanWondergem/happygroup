<marquee class="text_slider" behavior="scroll" direction="left" scrollamount="2" >
    <?php 
			include_once('bz/WebsiteInterface.php'); 		
    		$FlashDiscounts = (new WebsiteInterface)->getFlashDiscounts($_SESSION['id_lan']);  
			
			$text = '';
			
			foreach ($FlashDiscounts as $discount)
			{	
				 if($discount['link']=='' || $discount['link']==NULL)
					$text .= $discount['text'].' - ';
				 else
					$text .= '<a href="'.$discount['link'].'">'.$discount['text'] .'</a> - ';
			}
			echo $text;
     ?>
 	</marquee>