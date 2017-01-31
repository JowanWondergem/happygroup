<div class="block_footer bg_gr_yellow">
<div class="center "> 
  <ul class="list_footer">
        
        <a   href="index.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'index ' )) echo 'class="active"';?>>
      <img src="ui/images/icons/Home16.png" />
	  <?php echo $l_menu_home; ?>
      </li>
      </a>
      
      <a  href="settings.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'settings.php ')) echo 'class="active"';?>>
      <img src="ui/images/icons/Wrench16.png" />
	  <?php echo $l_menu_settings; ?>
      </li>
      </a>
      
      <a  href="images.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'images.php ')) echo 'class="active"';?>>
      <img src="ui/images/icons/Folder16.png" />
	  <?php echo $l_menu_images; ?>
      </li>
      </a>
      
      <a  href="discounts.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'discounts.php ')) echo 'class="active"';?>>
      <img src="ui/images/icons/Percent16.png" />
	  <?php echo $l_menu_discounts; ?>
      </li>
      </a>
      
      <a  href="texts.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'texts.php ')) echo 'class="active"';?>>
      <img src="ui/images/icons/Edit16.png" />
	  <?php echo $l_menu_texts; ?>
      </li>
      </a>
      
      <a  href="contacts.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'contacts.php ')) echo 'class="active"';?>>
      <img src="ui/images/icons/Telephone16.png" />
	  <?php echo $l_menu_contacts; ?>
      </li>
      </a>
      
      <a  href="../interface/logoutPartner.php">
      <li class="bg_gray">
      <img src="ui/images/icons/Login_out16.png" />
	  Logout<?php //$l_menu_logout; ?>
      </li>
      </a>
        
  </ul>
  
 
  
</div>
</div>
<div class="block_reference block_100 bg_gr_brown">
<div  class="center">
<h2 ><?php echo $l_footer_copyright; ?> <?php echo date("Y").' '.$l_footer_credits; ?> </h2>
</div>
</div>
<!-- end #footer -->