<div class="block_reference block_100 ">
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
<li>
  <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fhappy-group.eu%2F&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
</li>
     <!-- <li> <a target="_blank" href="http://www.facebook.com" > <img src="ui/images/facebook.png" /> </a> </li>-->
      <li> 
      	<a class="btn_yellow" href="mailto:info.happycard@gmail.com" title="<?php echo $l_header_contact_mail; ?>" alt="<?php echo $l_header_contact_mail; ?>" > 
        	<img src="ui/images/icons/Edit16.png" /> 
        </a> 
      </li>
      <li>
      	<a class="btn_yellow" href="contact.php#form_contact" title="<?php echo $l_header_contact_direct; ?>" alt="<?php echo $l_header_contact_direct; ?>" >
        	<img src="ui/images/icons/Chat16.png" />
        </a> 
      </li>
      
    
      
      <li>
      		<ul class="dropdown">
      		<li><a class="btn_yellow icon_login"><?php echo $l_header_login_button; ?></a>
            <ul class="shadow" >
            <li><a  class="btn_yellow icon_login" href="login.php"><?php echo $l_header_login_partner; ?></a></li>
            <li><a  class="btn_yellow icon_login" href="<?php echo $domain_linkage; ?>/login.php?lang=<?php echo $_SESSION['id_lan']; ?>"><?php echo $l_header_login_client; ?></a></li>
            
            <li><a  class="btn_yellow icon_login" href="<?php echo $domain_linkage; ?>/login.php?lang=<?php echo $_SESSION['id_lan']; ?>"><?php echo $l_header_login_partner_mlm; ?></a></li>
            </ul>
            </li>
           
     		</ul>
     </li>
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
     <li><?php echo $l_header_search_by; ?></li>
      <!-- <li>
      	<a class="main_menu_link" onclick="window.location = 'index.php?type=map'"><?php echo $l_header_search_on_map; ?>
      	
        </a>
        </li> -->
        
         <li>
      
       <select class="block_100 quick_search search_city">
        	<option value="-1" selected="selected"><?php echo $l_header_search_on_city ?></option>
         <?php include_once('bz/Cities.php'); 
		 	$Cities = Cities::getAllCities($_SESSION['id_lan']);
			
		 ?>
         <?php foreach ($Cities as $city): ?>
        	<option value="<?php echo $city['id'] ?>"><?php echo $city['city'] ?></option>
         <?php endforeach; ?>
        </select>
       </li>
        
        
      <li>
      
       <select class="block_100 quick_search search_zone">
        	<option value="-1" selected="selected"><?php echo $l_header_search_on_zone ?></option>
         <?php include_once('bz/Areas.php'); 
		 	$Areas = Areas::getAllAreas($_SESSION['id_lan']);
			
		 ?>
         <?php foreach ($Areas as $area): ?>
        	<option value="<?php echo $area['id'] ?>"><?php echo $area['area'] ?></option>
         <?php endforeach; ?>
        </select>
       </li>
       <li>
       <select class="block_100 quick_search search_activity">
        	<option value="-1" selected="selected"><?php echo $l_header_search_on_activity ?></option>
             <?php include_once('bz/Category.php'); 
		 	$Categories = Category::getAllCategories($_SESSION['id_lan']);
			
		 ?>
         <?php foreach ($Categories as $category): ?>
        	<option value="<?php echo $category['id_category'] ?>"><?php echo $category['category'] ?></option>
         <?php endforeach; ?>
        </select>
       </li>
        <!--<li><a href="info_common.php"><?php echo $l_header_info_general; ?></a></li>
        <li><a href="info_partners.php"><?php echo $l_header_info_partners; ?></a></li>
        <li><a href="terms.php"><?php echo $l_header_info_terms; ?></a></li>-->
        
      </ul>
    </div>
  </div>
  <div class="block_100 bg_brown left">    
  <div class="center happy_main_menu">           
          <?php include_once('ui/_menu.php'); ?>      
     </div> <!--end lbock left-->
</div> <!--end lbock left-->
</div>
