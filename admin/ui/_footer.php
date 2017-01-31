<div id="footer">
	<!--  start footer-left -->
	<div id="footer-left">
	
	 &copy; Copyright Happygroup<span id="spanYear"></span> <a href="">www.happy-group.eu</a>. All rights reserved.
     
     
      <select id="lan_panel" name="lan_panel" class="right " >
                        
			<?php
                include_once('../bz/Language.php'); 		
                $Languages = Language::getAllLanguages();  
            ?>
            <?php foreach ($Languages as $language): ?>
            
              <?php 
			  $language['code'] = strtolower($language['code']);
			   if( $language['code'] == $_SESSION['lang']): ?>
               <option selected="selected" value="<?php echo $language['code'] ?>" >
                    <?php echo $language['text'] ?>
               </option>
          	 <?php else : ?>
               <option value="<?php echo $language['code'] ?>">
                    <?php echo $language['text'] ?>
               </option>
           <?php endif; ?>
            <?php endforeach; ?>
        </select>
     
     </div>
	<!--  end footer-left -->
    
	<div class="clear">&nbsp;</div>
</div>