<?php 
include_once('ui/_html.php');
include_once('rewrite.php');
//get inteface texts
			
include_once('bz/WebsiteInterface.php'); 
$WebsitePartnerTexts = WebsiteInterface::getWebsitePartnerTexts($_SESSION['id_lan']);

//get partner images
include_once('bz/WebsitePartners.php'); 
$WebsitePartnerImages = WebsiteInterface::getWebsitePartnerImages($id_partner);
//print_r($WebsitePartnerImages);
//get partner texts

$WebsitePartnerInfo = WebsiteInterface::getWebsitePartnerInfo($_SESSION['id_lan'], $id_partner); 
//print_r($WebsitePartnerInfo);

//get partner discounts
$WebsitePartnerDiscounts = WebsiteInterface::getWebsitePartnerDiscounts($_SESSION['id_lan'], $id_partner);
//print_r($WebsitePartnerDiscounts);

//get partner layout
$WebsitePartnerLayout = WebsiteInterface::getWebsitePartnerLayout($_SESSION['id_lan'], $id_partner);
//print_r($WebsitePartnerLayout);
	?>
     
<head>
	
   
    <?php 
	$head_title=  $WebsitePartnerInfo['name'] ;
	include_once('ui/partner/_head.php'); 
	?>
    
     <style>
    <?php 
		if(count($WebsitePartnerLayout)!=0){
		//DYNAMIC STYLE LAYOUT PREFERNCES OF PARTNER
		if($WebsitePartnerLayout['color_background']!='' )
		{	
			echo 'body {background:'.$WebsitePartnerLayout['color_background'].'}';		
		}
		else
		{
				echo 'body {background:#E4E4E4}';
		}
		if($WebsitePartnerLayout['color_lines']!='' )
		{			
			echo '.block_header{background:'.$WebsitePartnerLayout['color_header'].' }';
			echo '.company_discounts ul li{background:'.$WebsitePartnerLayout['color_header'].'}';
			echo '.company_contacts ul li{background:'.$WebsitePartnerLayout['color_header'].'}';
		}
		else
		{
			echo '.block_header{background:#FC0}';
			echo '.company_discounts ul li{background:#FC0}';
			echo '.company_contacts ul li{background:#FC0}';
		}
		//if($WebsitePartnerLayout['color_header']!='' ){			echo '.color_header {color:'.$WebsitePartnerLayout['color_header'].'}';		}	
		}
	?>
	
    </style>
    <!--[if IE]>
    <style>
    .block_title{padding-left:15px;}
	</style>
	<![endif]-->
    
</head>
<body >




	<div class="block_reference  ">
  <div class="center row-fluid">
  	<span class="span6" >
    <a ><img src="ui/images/bullet.png"/> <?php echo $l_header_buss_of;  ?></a>
    </span>
    <span class=" offset2 span4" >
    <ul class=" menu_header">
      
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
      		<ul class="dropdown">
      		<li><a class="btn_yellow icon_login"><?php echo $l_header_login_button; ?></a>
            <ul class="shadow" >
            <li><a  class="btn_yellow icon_login" href="login.php"><?php echo $l_header_login_partner; ?></a></li>
            <li><a  class="btn_yellow icon_login" href="login.php"><?php echo $l_header_login_partner_mlm; ?></a></li>
            </ul>
            </li>
           
     		</ul>
     </li>
    </ul>
    </span>
  </div>
</div>


<div class="block_header "  >
<?php 
		 $i = 0;
		 $WebsitesPartners = WebsiteInterface::getAllPartnerWebsites();
		
		  $sites = "[";
		 foreach($WebsitesPartners as $webs)
		 {
			
			if($webs['url_website']!='')
			{
			$i++;
			if(count($WebsitesPartners)!=$i)
			{
				 $sites .= '"'.$webs['url_website'].'",' ;
			}
			else
			{
				 $sites .= '"'.$webs['url_website'].'"' ;
			}
			
			}
			
			
		 }
		   $sites .= "]";
		 
		 
		 ?>
  <div class="center row-fluid">
  		
        <span class=" clear "  >
     		<img class="company_logo left " src="media/partners/<?php echo $WebsitePartnerInfo['img_s'] ?>" />
      		<h1 class="company_name left text"><?php echo $WebsitePartnerInfo['name'] ?></h1>
     	</span>
 
   
    
    
     </div><!--center row-fluid-->
  </div><!--block_header-->
  <div class="h_spacer span12 "> <img src="ui/images/img03.png" /> </div>
  
  
 <div class="center row-fluid">
	<div class=" clear">
    	<div class="input-append  " > 
          <input  class="" data-provide="typeahead"  id="cmb_sites" type="text" data-items="10" placeholder="Find more partners..." data-source='<?php echo   $sites ?>'>
          <a id="btn_sites" class="btn btn_submit" type="button" ><i class="icon-search"></i></a>
         
          <?php
			   if(!empty($_SERVER['HTTP_REFERER'])): ?>
       			<a class="btn btn_submit" type="button" href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><?php echo $l_partner_go_back ; ?>  <img src="ui/images/bullet.png"/></a>
             <?php  else: ?>
             	<a  class="btn btn_submit" type="button" href="index.php"><?php echo $l_partner_go_back ; ?>   <img src="ui/images/bullet.png"/></a>
             <?php  endif; ?>
        </div>
    </div>
    </div>


	


    
   <div class="center   container-fluid ">
      <div class="block_100 bg_white left row-fluid  rounded-corners  ">
        <?php 
            if(count($WebsitePartnerLayout)!=0){
            $page1 =  WebsiteInterface::heckLayoutPosition($WebsitePartnerLayout['top_left']);
            $pos = 'left';
            include_once($page1);
            $page2 = WebsiteInterface::checkLayoutPosition($WebsitePartnerLayout['top_right']);
            $pos = 'right';
            include_once($page2);
            }
            else
            {
                echo '<img src="ui/partner/nocontent.png" onclick="openLogin()">'	;
            }
        ?> 
      </div> <!--end block 100-->
    </div><!--end block 70 centered-->

	<div class=" center block_70 ">  <img class="span12" src="ui/images/img03.png" /> </div>

	<div class="h_spacer span12 "></div>


	<div class="center  ">
		<div  class="block_100 bg_white left  row-fluid   rounded-corners ">
            <ul id="tab_list" class="nav nav-tabs ">
                <li><a href="#tabs-1"  data-toggle="tab" rel="tooltip" title="first tooltip"><?php echo $l_partner_tab_info; ?></a></li>
                <!--<li><a href="#tabs-2" data-toggle="tab">Shop</a></li>-->
                <li><a href="#tabs-3" data-toggle="tab"><?php echo $l_partner_tab_contact; ?></a></li>
            </ul>
            <div class="tab-content ">
                <div id="tabs-1" class="block_100 tab-pane  active  left ">
                <?php 
                    if(count($WebsitePartnerLayout)!=0){
                    $page3 =  WebsiteInterface::checkLayoutPosition($WebsitePartnerLayout['bottom_left']);
                    $pos = 'left';
                    include_once($page3);
                    $page4 = WebsiteInterface::checkLayoutPosition($WebsitePartnerLayout['bottom_right']);
                    $pos = 'right';
                    include_once($page4);
                    }
                    else
                    {
                        echo '<img src="ui/partner/nocontent.png" onclick="openLogin()">'	;
                    }
                ?>
              </div><!-- end tab1-->
              
               <div id="tabs-2" class="block_100 tab-pane  block_start left ">
                <ul class="list_partners pad_10">
                <li>
                    <div class="partner_thumb block_100">
                    	<img src="includes/resize.php?w=130&image=../media/partners/76/img_s.png" />
                    </div>
                    <div class="partner_details block_100">
                        <h3 class="partner_name clear">Bone Roxo</h3>
                        <p class="clear ">Perfeito para os dias frios!</p>
                        <div class="left btn ">&euro; 50</div>
                        <a class="btn btn_buy  btn-warning right"><i class="icon-shopping-cart"></i>Buy</a>   
                    </div>
                </li>
                </ul>
                 
                 </div>
              
              <div id="tabs-3" class="block_100 tab-pane  block_start left ">
               
            		<div class="span6 pad_10">
                     <h2 class="block_title color_header " ><?php echo $l_partner_contact_title ?></h2> 
                   <form id="form_email" class="form " enctype="multipart/form-data" >
                  
                  <div class="control-group">
                    <label class="control-label " for="inputEmail"><?php echo $l_partner_contact_email ?></label>
                    <div class="controls">
                  
                      <input type="text" id="email"  class="validate[required,custom[email]]" placeholder="<?php echo $l_partner_contact_email_placeholder ?>" />
                  
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputPassword"><?php echo $l_partner_contact_subject ?></label>
                    <div class="controls">
                      <input type="text" name="subject" id="subject" class="validate[required]" placeholder="<?php echo $l_partner_contact_subject_placeholder ?>" >
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputPassword"><?php echo $l_partner_contact_message ?></label>
                    <div class="controls">
              
                      <textarea type="text" name="message" id="message" class="validate[required]"  placeholder="<?php echo $l_partner_contact_message_placeholder ?>" ></textarea>
                    </div>
                  </div>
            
                 <div class="control-group">
                 <div class="controls">
                      <button id="submit" type="button" class="btn btn_submit  " onClick="sendEmail()"><?php  echo $l_partner_contact_btn_send?></button>
                      </div>
                 </div>
                </form>
                </div>
                 <div class="span5"> 
                <img   src="http://maps.googleapis.com/maps/api/staticmap?center=
				<?php echo urlencode($WebsitePartnerInfo['city']); ?>
                ,<?php echo urlencode($WebsitePartnerInfo['area']); ?>,
				<?php echo urlencode($WebsitePartnerInfo['country']) ?>&zoom=14&size=600x500&sensor=false"/>
                </div>
                
                </div><!-- end tab2-->
                
                
                
        
            </div>  <!-- end tab content-->  
   
  		</div> <!--end block 100-->
  </div><!-- end block 70 centered-->
  

<div class=" center block_70 ">  <img class="block_100" src="ui/images/img03.png" /> </div>




	<div class="h_spacer span12"></div>
    
	<div class="block_reference block_100 bg_gr_brown ">
        <div class="center">
             <?php  if(!empty($_SERVER['HTTP_REFERER'])): ?>
                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><img src="ui/images/bullet.png"/><?php echo $l_link_back_happy; ?></a>
             <?php  else: ?>
               <a href="index.php"><img src="ui/images/bullet.png"/><?php echo $l_link_back_happy; ?></a>
             <?php  endif; ?>
        </div>
    </div>

</body>

</html>

<!-- load at end of page for quicker page load-->
<script type="text/javascript" language="javascript" src="ui/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" language="javascript" src="ui/js/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript" language="javascript" src="ui/js/partner_functions.js"></script>

<script type="text/javascript" language="javascript" src="ui/js/mocha.js"></script>
<script type="text/javascript" language="javascript" src="ui/js/jquery.prettyPhoto.js" ></script>
<script type="text/javascript" language="javascript" src="ui/js/jquery.validationEngine.js" ></script>
<script type="text/javascript" language="javascript" src="ui/js/jquery.validationEngine-pt.js"></script>
<script type="text/javascript" language="javascript" src="ui/js/bootstrap.js" ></script>

 <script>
  $(function () {
	 jQuery("#form_email").validationEngine('attach',{scroll:true,promptPosition:'BottomLeft'});
	$("a[rel^='prettyPhoto']").prettyPhoto();
	$('.typeahead').typeahead();
    $('#myTab a:last').tab('show');
  
  	$('#cmb_sites').live('change',function()
		{
			$('#btn_sites').trigger('click');
		}
	)
	$('#btn_sites').live('click',function()
		{
			window.location.href= '/'+$('#cmb_sites').val();
		}
	)
	
  })
  
  
  
  function sendEmail()
					{
					
					
					if($("#form_email").validationEngine('validate'))
						{
							
				
						$.ajax
						({
							  url: 'interface/sendPartnerEmail.php',
							  type: 'post',
							  dataType: "json",
							 
							  data: {	
										email_des:			'<?php echo $WebsitePartnerInfo['email'] ?>',
										email_emm: 			$("#email").val(),
										subject: 			$("#subject").val(),
										message: 			$("#message").val()	
									},
									
							  success: function(data) 
							  {
								
								if(data.success==1)
								{
								popupMessage(data.message)
								}
								else
								{
								popupMessage(data.message);
								}
								
							 },
							 
							 
						});
					}
					}
  
  
  
  
</script>