<!--  start nav-outer-repeat................................................................................................. START -->
<div class=""> 
<!--  start nav-outer -->

<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
       <div class="btn-group btn-large left">
        	<div class="btn-group left">
         
              <a  class="btn btn-inverse " href="admins_edit_step1.php?id=<?php echo $_SESSION['admin_id'] ?>"><?php echo $l_menu_my_account ?></a>
                     </div>
            
            <div class="btn-group left">
          
              <a  class="btn btn-danger" href="../interface/logoutAdmin.php"><?php echo $l_menu_logout ?></a>
          
            </div>
            </div>
        
			
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="">
		<div class="">
		
        
   
        <div class="btn-group btn-large left">
        <div class="btn-group left">
        
          <a class="btn  <?php if( strpos( $_SERVER['REQUEST_URI'], 'dashboard' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>"  href="dashboard.php"><?php echo $l_menu_home ?></a>
          
        </div>
        
           <div class="btn-group left">

          <a   class="btn <?php if( strpos( $_SERVER['REQUEST_URI'], 'admins' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>" href="admins_grid.php"><?php echo $l_menu_admin ?></a>
     
          <button class="btn  dropdown-toggle <?php if( strpos( $_SERVER['REQUEST_URI'], 'admins' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="admins_grid.php"><?php echo $l_menu_all ?></a></li>
            <li><a href="admins_insert_step1.php"><?php echo $l_menu_new ?></a></li>
          </ul>
        
        
        </div>
        
        <div class="btn-group left">
          
          <a class="btn  <?php if( strpos( $_SERVER['REQUEST_URI'], 'partners' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>"  href="partners_grid.php"><?php echo $l_menu_partners ?></a>
          
          <button class="btn  dropdown-toggle <?php if( strpos( $_SERVER['REQUEST_URI'], 'partners' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="partners_grid.php"><?php echo $l_menu_all ?></a></li>
            <li><a href="partners_insert_step1.php"><?php echo $l_menu_new ?></a></li>
             <li class="divider"></li>
             <li><a href="partners_contracts_grid.php"><?php echo 'View Contracts';//$l_menu_all ?></a></li>
          </ul>
        </div>
        
         <div class="btn-group left">
         
          <a  class="btn  <?php if( strpos( $_SERVER['REQUEST_URI'], 'cards' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>" href="cards_grid.php"><?php echo $l_menu_cards ?></a>
         
          <button class="btn  dropdown-toggle <?php if( strpos( $_SERVER['REQUEST_URI'], 'cards' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="cards_grid.php"><?php echo $l_menu_all ?></a></li>
            <li><a href="cards_insert_step1.php"><?php echo $l_menu_new ?></a></li>
          </ul>
        </div>
        
        <div class="btn-group left">
          
          <a class="btn <?php if( strpos( $_SERVER['REQUEST_URI'], 'flyers' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>"  href="flyers_grid.php"><?php echo $l_menu_flyers ?></a>
          
         <button class="btn  dropdown-toggle <?php if( strpos( $_SERVER['REQUEST_URI'], 'flyers' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="flyers_grid.php"><?php echo $l_menu_all ?></a></li>
            <li><a href="flyers_insert_step1.php"><?php echo $l_menu_new ?></a></li>
          	<li class="divider"></li>
     
             <li><a href="flyers_themes_grid.php"><?php echo $l_menu_themes ?></a></li>
             <li><a href="flyers_insert_theme_step1.php"><?php echo $l_menu_new ?> <?php echo $l_menu_themes ?></a></li>
          </ul>
        </div>
        
        <div class="btn-group left">
          
          <a  class="btn <?php if( strpos( $_SERVER['REQUEST_URI'], 'web' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>"  href="web_slider_grid.php"><?php echo $l_menu_web ?></a>
          
          <button class="btn dropdown-toggle <?php if( strpos( $_SERVER['REQUEST_URI'], 'web' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="web_slider_grid.php"><?php echo $l_menu_home ?></a></li>
                <li><a href="web_edit_newsflash.php"><?php echo $l_menu_newsflash ?></a></li>
                <li><a href="web_edit_about.php"><?php echo $l_menu_aboutus ?></a></li>
              	<li><a href="web_contacts_grid.php"><?php echo $l_menu_contact ?></a></li>
          </ul>
        </div>
        
          <div class="btn-group left">
          
          <a   class="btn <?php if( strpos( $_SERVER['REQUEST_URI'], 'attr' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>" href="attr_languages_grid.php"><?php echo $l_menu_attr ?></a>
                    <button class="btn  dropdown-toggle <?php if( strpos( $_SERVER['REQUEST_URI'], 'attr' ) !== false ) echo 'btn-primary'; else echo 'btn-inverse';?>" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
           		<li><a href="attr_languages_grid.php"><?php echo $l_menu_languages ?></a></li>
                <li><a href="attr_countries_grid.php"><?php echo $l_menu_countries ?></a></li>
                <li><a href="attr_areas_grid.php"><?php echo $l_menu_regions ?></a></li>
                 <li><a href="attr_cities_grid.php"><?php echo $l_menu_cities ?></a></li>
                  <li><a href="attr_categories_grid.php"><?php echo $l_menu_categories ?></a></li>
          </ul>
        </div>
        </div>
       
     
		
		
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->