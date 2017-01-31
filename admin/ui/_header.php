<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href="dashboard.php"><img src="ui/images/shared/logo.png"  height="60" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	<div id="top-search">
		
        <label><?php echo $l_header_lang; ?></label>
		 <select id="lan_panel" name="lan_panel" class="validate[required] " >
                        
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
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->