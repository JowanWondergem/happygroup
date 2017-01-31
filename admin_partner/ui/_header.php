<div class="block_reference block_100 bg_gr_brown">
  <div class="center">
    <h2 class="left"><?php echo $l_header_buss_of;  ?></h2>
    <ul class="menu_header right">
      
      <li>
     	 <img class="lan_panel" lan="pt" src="ui/images/pt.jpg" title="Traduzir para Português" alt="Traduzir para Português" />
        <!--<select id="lan_panel" >
           <option <?php if($_SESSION['lang']=='pt'){ echo 'selected="selected"'; }; ?> value="pt">PT</option>
           <option <?php if($_SESSION['lang']=='en'){ echo 'selected="selected"'; }; ?> value="en">EN</option>
        </select>-->
      </li>
      <li>
      	<img class="lan_panel" lan="en" src="ui/images/en.jpg" title="Translate to English" alt="Translate to English"  />
      </li>
       <li>
      	<img class="lan_panel" lan="unactive" src="ui/images/ge.jpg" title="Übersetzen auf Deutsch" alt="Übersetzen auf Deutsch"  />
      </li>
       <li>
      	<img class="lan_panel" lan="unactive" src="ui/images/es.jpg" title="Traducir al español" alt="Traducir al español"  />
      </li>
       <li>
      	<img class="lan_panel" lan="unactive" src="ui/images/fr.jpg" title="Traduire en français" alt="Traduire en français"  />
      </li>
      <li></li>
      <li></li>
      <li></li>
      
    </ul>
  </div>
</div>
<div class="block_header block_100 bg_gr_yellow ">
  <div class="center">
    <div class="block_30 left"> <a href="index.php"> <img class="company_logo left" src="ui/images/logo.png"/>
      <h1 class="company_name left text"><?php echo $l_header_company; ?></h1>
      </a> </div>
    <div class="block_70 right">
      <ul class="main_menu right">
     
    
      
       </li>
        <!--<li><a href="info_common.php"><?php echo $l_header_info_general; ?></a></li>
        <li><a href="info_partners.php"><?php echo $l_header_info_partners; ?></a></li>
        <li><a href="terms.php"><?php echo $l_header_info_terms; ?></a></li>-->
        <li><a class="main_menu_link" target="_blank" href="http://<?php echo $_SERVER["SERVER_NAME"].'/'.$_SESSION['partner_url_website']; ?>"><img src="ui/images/icons/Search16.png" /><?php echo $l_header_preview; ?></a></li>
        <li><a class="main_menu_link" href="../interface/logoutPartner.php"><img src="ui/images/icons/Login_out16.png" /><?php echo $l_header_logout_button; ?></a></li>
      </ul>
    </div>
  </div>
</div>
<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>
<div class="h_spacer "> </div>