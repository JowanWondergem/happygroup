
<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= $l_head_title;
	include_once('ui/_head.php'); 
	?>
</head>
<body onLoad="<?php  // if(isset($_GET['type']) && $_GET['type']=='map') echo 'ammap.focus()'; ?>">


<?php 
    include_once('ui/popups/_popup_activity.php');
    include_once('ui/_header.php'); 
?>


<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>

<div class="center content ">
	
	<?php include_once('ui/_news_flash.php'); ?>
    
      
     
    <div class="block_15 left">
           
          <?php include_once('ui/_menu.php'); ?>
        
     </div> <!--end lbock left-->
  	<div class="block_85 bg_brown left  rounded-corners ">
    
    	<div  class="block_75 left">
    
            <div id="content">
            <?php 
            
            if(!isset($_GET['type']) || $_GET['type']=='slider')
            {
                include_once('ui/_slider.php'); 
                
            }
            else if($_GET['type']=='map')
            {
                include_once('ui/_map.php'); 
            }
            ?>
            </div>
       
    	</div>
    
    <?php 
	include_once('bz/Cards.php');
	$Cards = (new Cards)->getAllCards($_SESSION['id_lan']);
	?>
    <div class="block_25  right block_start" >
        <ul class="list_blocks list_cards  v_list">
        
        <?php foreach ($Cards as $card) : ?>
        
            <li class="bg_gr_white" ><a  href="">
            	<img src="media/cards/<?php echo $card['image_home']; ?>" />
            	<h3><?php echo $card['name']; ?></h3>
                <p><?php echo $card['subtitle']; ?></p></a>
            </li>
            
            <!-- location.href='<?php echo $domain_linkage; ?>/register.php?lang=<?php echo $_SESSION['lang']; ?>&card_type=<?php echo $card['id']; ?>'
            -->
             <div class="popup_small bg_gr_yellow rounded-corners"  onClick="javascript:popupMessage('Em breve pode obter o cartão através do a nossa página, para já entre em contato connosco directamente!</br></br><i> Soon you have to possibility to order the cards directly online, for now contact us directly</i> by phone +351 931 353 804 or mail happygroup1999@gmail.com ') ">
                <ul>
                    <li >
                        <span class="card_type"><?php echo $card['name']; ?></span>
                        <span class="card_time">(<?php echo $card['duration']; ?>)</span>
                          
                        <span class="card_des"> <?php echo limitText($card['description'],80); ?></span>    
                        <span class="card_price">&euro; <?php echo $card['price']; ?></span>  
                    </li>
                </ul>
            </div>
            
         <?php endforeach; ?>
        </ul>
    </div>
  </div>
</div>


<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>





<div class=" center "> 
	<?php if ($_SESSION['id_lan']==2) : ?>
	<div class="padded_10 block_85 right bg_white rounded-corners  "> 
    <h1>Obtenha um website pessoal no Happy-Group! </h1>
    <div class="block_60 left">
    
    <div class="flash padded_10">
       <iframe id="ytplayer" type="text/html" width="500" height="370"
      src="http://www.youtube.com/embed/yDjwKw7joCg?autoplay=0&origin=http://www.happy-group.com&rel=0"
      frameborder="0"></iframe>
    
    </div>
    </div>
    <div class="block_35  right">
    <h1>Como e Porque?</h1>
    Quando se registe no Happy-Group como parceiro, recebe uma página web para o seu negócio.
    <br />
    Esta página será hospedada no Happy-Group e será acessível atráves de:
    <br />
    <b>www.happy-group.eu/oseunegocio</b>
     <br />
     Este website vem com um painel de administração pessoal,
     para que pode actualizar os contéudos à sua vontade.
     <br /><br />
     Quais são as suas vantagens :
     <br /> <br />
     <ul class=" list_bullets">
     
     	<li>Acesso directo </li>
        <li>Mini-website de baixo custo </li>
        <li>Suporte Mobile </li>
        <li>Alojamento</li>
        <li>5 Imagens Empresariais</li>
        <li>Actualizar Cores de Layout</li>
        <li>Actualizar Descontos e Novidades</li>
        <li>Actualizar dados de contato</li>
        <li>Actualizar Tipo de Negócio</li>
        
     </ul>
     <br /><br />
     <div class="block_100 left"></div>
    
     <a href="javascript:window.open('http://www.happy-group.eu/happy')" class="btn_submit rounded-corners left">Ver Exemplo</a>
    <a href="contact.php" class="btn_submit rounded-corners left">Contacte para registar</a>
     </div>
    <?php endif; ?>
    <?php if ($_SESSION['id_lan']==1) : ?>
   <div class="padded_10 block_85 right bg_white rounded-corners  "> 
    <h1>Have your own personal Happy-group website! </h1>
    <div class="block_60 left">
    <div class="flash padded_10">
       <iframe id="ytplayer" type="text/html" width="500" height="370"
      src="http://www.youtube.com/embed/yDjwKw7joCg?autoplay=0&origin=http://www.happy-group.com&rel=0"
      frameborder="0">
      </iframe>
	</div>
   
   
    </div>
    <div class="block_35  right">
    <h1>How and Why?</h1>
    Get a personal website when registering as a partner at Happy-Group!
    <br />
    The page will be hosted at Happy-Group and directly accesable at the link:
    <br />
    <b>www.happy-group.eu/yourcompanyname</b>
     <br />
     This miniwebsite offers a personal admin panel,
     where you can change your contents.
     <br /><br />
     These are your advantages :
     <br /> <br />
     <ul class=" list_bullets">
     
     	<li>Direct Link</li>
        <li>LOW COST Mini-website </li>
        <li>Mobile Support </li>
        <li>Hosting</li>
        <li>5 Images</li>
        <li>Change Layout Colours</li>
        <li>Change Discounts and News</li>
        <li>Change Contact Data</li>
        <li>Change Bussiness Sector</li>
        
     </ul>
     <br /><br />
     <div class="block_100 left"></div>
    
     <a href="javascript:window.open('http://www.happy-group.eu/happy')" class="btn_submit rounded-corners left">View Example</a>
     <a href="contact.php" class="btn_submit rounded-corners left">Contact us to Register</a>
     </div>
	<?php endif; ?>
    </div>
    
    <div class=" block_85 right "> <img class="block_100 left" src="ui/images/img03.png" />  </div>
   
</div>





<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
</body>
</html>


