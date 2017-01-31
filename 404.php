	<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= 'Not Found 404';
	include_once('ui/_head.php'); 
	?>
</head>
<body >


	
    <?php include_once('ui/popups/_popup_login.php'); ?>




	<?php include_once('ui/_header.php'); ?>

<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>

<div class="center content ">
	

    
      
     
    <div class="block_15 left">
           
          <?php include_once('ui/_menu.php'); ?>
        
     </div> <!--end lbock left-->
  	<div class="block_85 bg_brown left  rounded-corners ">
    
    
    	<div  class="block_75 left">
    
            <div id="content ">
            	<div class="content_info">
                    <h2 >A sua página não foi encontrada!</h2>
                    
                    <p>Mas continua sua navegação com um sorriso!</p>
            	</div>
            </div>
       
    	</div>
    
    
    <div class="block_25  right block_start" >
        <ul class="list_blocks  v_list">
            <li class="bg_gr_white" ><a  href=""><img src="ui/images/card.png" /><h3>Bonus Card</h3><p>Saiba Mais..</p></a>
            
            </li>
             <div class="popup_small bg_gr_yellow rounded-corners" onClick="location.href='inscribe.php?card_type=1'">
                <ul>
                    <li >
                        <span class="card_type">Happy Card</span>
                        <span class="card_time">  (1 Ano)</span>
                        <span class="card_price">&euro; 25</span>    
                    </li>
                     <!--<li >
                        <span class="card_type">Holiday Card</span>
                        <span class="card_time">  (3 Meses)</span>
                        <span class="card_price">&euro; 12,50</span>    
                    </li>-->
               
                </ul>
            </div>
            
            <li class="bg_gr_white" ><a  href=""><img src="ui/images/card2013.png" /><h3>Holiday Card</h3><p>Saiba Mais..</p></a>
            
            </li>
             <div class="popup_small bg_gr_yellow rounded-corners" onClick="location.href='inscribe.php?card_type=2'">
                <ul>
                   <!-- <li >
                        <span class="card_type">Happy Card</span>
                        <span class="card_time">  (1 Ano)</span>
                        <span class="card_price">&euro; 25</span>    
                    </li>-->
                     <li >
                        <span class="card_type">Holiday Card</span>
                        <span class="card_time">  (3 Meses)</span>
                        <span class="card_price">&euro; 12,50</span>    
                    </li>
               
                </ul>
            </div>
            <li class="bg_gr_white"><a ><img src="ui/images/cardparty.png" /><h3>Party Card</h3><p>Saiba Mais..</p></a></li>
             <div class="popup_small bg_gr_yellow rounded-corners" onClick="location.href='inscribe.php?card_type=3'">
                 <ul>
                    <li>
                        <span class="card_type">Party Card</span>
                        <span class="card_time">  (1 Ano)</span>
                        <span class="card_price">&euro; 19</span>    
                    </li>
                     <li >
                        <span class="card_type">Bars - Clubs - Discos</span>
                        <span class="card_time"> </span>
                        <span class="card_time">Para Usuários até 30 anos de idade</span>    
                    </li>
               
                </ul>
            </div>
        </ul>
    </div>
  </div>
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
</body>
</html>
