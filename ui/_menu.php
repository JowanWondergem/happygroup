  <ul class="">
  
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'index.php ') || strpos($_SERVER['REQUEST_URI'],'type=slider')) echo 'class="active"';?>><a  href="index.php?type=slider"><?php echo $l_menu_home; ?></a></li>
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'type=map') || strpos($_SERVER['REQUEST_URI'],'partners.php')) echo 'class="active"';?>><a class="happy_btn" href="partners.php?country=172"><?php echo $l_menu_search_pt; ?></a></li>
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'type=map') || strpos($_SERVER['REQUEST_URI'],'partners.php')) echo 'class="active"';?>><a class="happy_btn" href="partners.php?country=80"><?php echo $l_menu_search_de; ?></a></li>
	<li <?php  if(strpos($_SERVER['REQUEST_URI'],'flyers.php')) echo 'class="active"';?>><a href="flyers.php"><?php echo $l_menu_flyers; ?></a></li>

      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'about.php')) echo 'class="active"';?>><a href="about.php"><?php echo $l_menu_aboutus; ?></a></li>
 <!--     <li <?php  if(strpos($_SERVER['REQUEST_URI'],'register.php')) echo 'class="active"';?>><a href="<?php echo $domain_linkage; ?>/register.php?lang=<?php echo  $_SESSION['lang']; ?>"><?php echo $l_menu_register; ?></a></li>-->
      
      <li <?php  if(strpos($_SERVER['REQUEST_URI'],'contact.php')) echo 'active"';?>><a href="contact.php"><?php echo $l_menu_contacts; ?></a></li>
      
  </ul>
   <!-- <img class="map_small"  src="ui/images/map_search.png" onclick="window.location = 'index.php?type=map'"/> -->