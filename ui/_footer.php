<div class="block_footer bg_gr_yellow">
<div class="center "> 
  <ul class="list_footer">
    <h2 class="title_footer"><?php echo $l_footer_title_common; ?></h2>
    <br>
        <a href="index.php"> <li><?php echo $l_footer_home; ?></li></a>
        <a href="about.php"><li><?php echo $l_footer_about; ?></li></a>
        <a href="flyers.php"><li><?php echo $l_footer_flyer; ?></li></a>
        <a href="contact.php"><li><?php echo $l_footer_contact; ?></li></a>
  </ul>
  
  
  <ul class="list_footer">
  <h2 class="title_footer"><?php echo $l_footer_title_search; ?></h2>
  <br>
    <a href="index.php?type=map"><li><?php echo $l_footer_map; ?></li></a>
    <a><select class="block_100 quick_search search_zone">
        	<option value="-1" selected="selected"><?php echo $l_footer_search_zone ?></option>
        <?php foreach ($Areas as $area): ?>
        	<option value="<?php echo $area['id'] ?>"><?php echo $area['area'] ?></option>
         <?php endforeach; ?>
        </select></a>
    <a>
    <select class="block_100 quick_search search_activity">
        	<option value="-1" selected="selected"><?php echo $l_footer_search_activity ?></option>
         <?php foreach ($Categories as $category): ?>
        	<option value="<?php echo $category['id_category'] ?>"><?php echo $category['category'] ?></option>
         <?php endforeach; ?>
        </select>
    </a>
   
  </ul>
  
  <ul class="list_footer">
  <h2 class="title_footer"><?php echo $l_footer_title_register; ?></h2>
  <br>
  		<!--<?php 
			include_once('bz/Cards.php');
			$Cards = Cards::getAllCards($_SESSION['id_lan']);
		?> 
        <?php foreach ($Cards as $card) : ?>
        <a href="<?php echo $domain_linkage; ?>/register.php?card_type=<?php echo $card['id']; ?>"> <li><?php echo $card['name']; ?></li></a>
        <?php endforeach; ?>-->
       <!-- <a href="register.php"><li><?php echo $l_footer_register_partner; ?></li></a>-->
        <a href="<?php echo $domain_linkage; ?>/register.php?lang=<?php echo $_SESSION['id_lan']; ?>"><li><?php echo $l_footer_register_client; ?></li></a>
        <a href="<?php echo $domain_linkage; ?>/register.php?lang=<?php echo $_SESSION['id_lan']; ?>"><li><?php echo $l_footer_register_mlm_partner; ?></li></a>
        <!--<a href="register_happy.php"><li><?php echo $l_footer_register_agent; ?></li></a>-->
  </ul>
  
   
  
   <ul class="list_footer">
  <h2 class="title_footer"><?php echo $l_footer_title_login; ?></h2>
  <br>
    <a href="login.php"><li><?php echo $l_footer_login_partners; ?></li></a>
    <a href="<?php echo $domain_linkage; ?>/login.php?lang=<?php echo $_SESSION['id_lan']; ?>"><li><?php echo $l_footer_login_cliente; ?></li></a>
  	<a href="<?php echo $domain_linkage; ?>/login.php?lang=<?php echo $_SESSION['id_lan']; ?>"><li><?php echo $l_footer_login_mlm_partners; ?></li></a>
  </ul>
  
  <ul class="list_footer">
  <h2 class="title_footer"><?php echo $l_footer_title_info; ?></h2>
  <br>
   <!-- <a href="info_common.php"><li><?php echo $l_footer_info_general; ?></li></a>
    <a href="info_partners.php"><li><?php echo $l_footer_info_partners; ?></li></a>-->
    <a href="terms.php"><li><?php echo $l_footer_info_terms; ?></li></a>

  </ul>
  
</div>
</div>
<div class="block_reference block_100">

<h2 class="center" ><?php echo $l_footer_copyright; ?> <?php echo date("Y"); ?></h2>

</div>
<!-- end #footer -->


<!-- GOOGLE ANALITYCS -->


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37285178-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>