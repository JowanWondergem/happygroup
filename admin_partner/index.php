<?php include_once('ui/_html.php');  ?>
<head>
	<?php 
	$head_title= $l_head_title;
	include_once('ui/_head.php'); 
	?>
</head>
<body onLoad="<?php // if(isset($_GET['type']) && $_GET['type']=='map') echo 'ammap.focus()'; ?>">

	
	<?php include_once('ui/_header.php'); ?>


 <div class="block_15 left">
<?php include_once('ui/_menu.php'); ?>
</div> <!--end lbock left-->


       
        
    
  	<div class="block_80 block_start  left  ">
    
 
    
    <div class="page_label "><?php echo $l_home_head_title; ?></div> 
    <div class="block_50"> 
    <form id="form_contact" name="form_contact" method="post" action="interface/sendContactEmail.php?lang=<?php echo $_SESSION['lang']; ?>">
                <ul class="v_list">
                     <li>
                     <?php // print_r($_SESSION); ?>
                    <label ><?php echo $l_home_website; ?></label>
                    <a target="_blank" href="http://<?php echo $_SERVER["SERVER_NAME"].'/'.$_SESSION['partner_url_website']; ?>" >
                    <?php echo $_SERVER["SERVER_NAME"].'/'.$_SESSION['partner_url_website']; ?>
                    </a>
                    </li>
                    
                    <li>
                    <label ><?php echo $l_home_website_today_date; ?></label>
                     <a><?php 
					 	///////////////////  CALCULATE DAYS
						$timefromdb = date("Y-m-d",strtotime($_SESSION['partner_date_creation']));
						$future_year = date("Y",strtotime($timefromdb."+1 year"));
						$future_month = date("m",strtotime($timefromdb."+1 year"));
						$future_day = date("d",strtotime($timefromdb."+1 year"));
						$future = date("Y-m-d",strtotime($timefromdb."+1 year"));
						$today = date("Y-m-d");
						
						$hours_left = (mktime(0,0,0,$future_month,$future_day,$future_year) - time())/3600; 
						$daysLeft = ceil($hours_left/24);
						
						echo $today;
					
 						?>
                       </a>
                    </li>
                    <br /><br />
                    
                     <li>
                    <label ><?php echo $l_home_website_start_date; ?></label>
                     <a><?php echo $_SESSION['partner_date_creation']; ?></a>
                    </li>
                    
                    
                   
                    
                    
                     <li>
                    <label ><?php echo $l_home_website_expire_date; ?></label>
                     <a><?php echo $future; ?></a>
                    </li>
                     
                     <?php  if($daysLeft<30):?>
                     <li >
                    <label ><?php echo $l_home_website_days_left; ?></label>
                     <a>
						<span style=" color:#CC0000;font-weight:bold;"><?php echo $daysLeft ?></span>
						
						</a>
                    </li>
                    <li><span  style="color:#CC0000;font-weight:bold;"><?php echo $l_home_website_renewel ?></span></li>
                    <script type="text/javascript">
						popupMessage('<?php echo $l_home_website_renewel ?>');
					</script>
                    <?php  else:?>
                     <li >
                    <label ><?php echo $l_home_website_days_left; ?></label>
                     <a>
						<?php echo $daysLeft ?>
					</a>
                    </li>
                    
                    
                    <?php endif; ?>
                	
                    
                    <li>
                    
                </ul>
    </form>
    </div>
    
    	
    
  
  
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
</body>
</html>
