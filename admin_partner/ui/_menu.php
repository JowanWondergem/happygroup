  <ul class="v_list side_menu ">
  
      <a   href="index.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'index' )) echo 'class="active_1"';?>>
      <img src="ui/images/icons/Home16.png" />
	  <?php echo $l_menu_home; ?>
      </li>
      </a>
      
      <a  href="settings.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'settings')) echo 'class="active_1"';?>>
      <img src="ui/images/icons/Wrench16.png" />
	  <?php echo $l_menu_settings; ?>
      </li>
      </a>
      
      <a  href="images.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'images')) echo 'class="active_1"';?>>
      <img src="ui/images/icons/Folder16.png" />
	  <?php echo $l_menu_images; ?>
      </li>
      </a>
      
      <a  href="discounts.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'discounts')) echo 'class="active_1"';?>>
      <img src="ui/images/icons/Percent16.png" />
	  <?php echo $l_menu_discounts; ?>
      </li>
      </a>
      
      <a  href="texts.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'texts')) echo 'class="active_1"';?>>
      <img src="ui/images/icons/Edit16.png" />
	  <?php echo $l_menu_texts; ?>
      </li>
      </a>
      
      <a  href="contacts.php">
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'contacts')) echo 'class="active_1"';?>>
      <img src="ui/images/icons/Telephone16.png" />
	  <?php echo $l_menu_contacts; ?>
      </li>
      </a>
      
       <a  href="../interface/logoutPartner.php">
      <li class="bg_gray">
      <img src="ui/images/icons/Login_out16.png" />
	  <?php echo $l_menu_logout; ?>
      </li>
      </a>
      
      <br />
      <br />
      <br />
      <br />
      <li>
      <b>
      <img src="ui/images/icons/Faq16.png" />
      <?php echo $l_menu_direct_contact ?>
      </b> 
      <br />
      <br />
      <font size="1">
      <?php echo $happy_phone ?><br />
      <?php echo $happy_fax ?><br />
      <a href="mailto:<?php echo $happy_email ?>"><?php echo $happy_email ?></a><br />
      </font>
      </li>
      
      
      
      
     
     
  </ul>
   