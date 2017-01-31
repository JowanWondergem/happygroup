<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= 'Ficha de Inscrição';
	include_once('ui/_head.php'); 
	?>
    <link href="ui/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" media="screen" />
    <script type="text/javascript" src="ui/js/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="ui/js/jquery.validationEngine-pt.js"></script>
    <script>
	jQuery(document).ready(function(){
				// binds form submission and fields to the validation engine
				jQuery("#form_register_temp").validationEngine('attach',
				{scroll:true}
				);
				
				$( "#date_birth" ).datepicker({
					changeMonth: true,
					changeYear: true,
					yearRange:'-90:+0',
					dateFormat:'yy-mm-dd',   
				});
				
			});	
	</script>
   <style>
   input{width:70%; padding:5px; }
    img{height:30px; margin-bottom:10px; }
   .block_start{padding:10px;}
   .text_red {color:#F30; font-weight:900;}
  
   .report{ padding:10px;};
   </style>
</head>
<body >








<div class="block_header block_100 bg_gr_yellow ">
  <div class="center">
    <div class="block_100 left"> <a href="index.php"> <img class="company_logo left" src="ui/images/logo_happy.png"/>
      <h1 class="company_name left text">Ficha de Inscrição Happy</h1>
      </a> </div>
    
  </div>
</div>

<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>

<div class="center content ">
	  
  	<div class="block_50 bg_white block_start center rounded-corners ">
    
    <?php 
	
	if(isset($_GET['register']) && $_GET['register']=='ok')
	{
		echo '<div class="report block_90 center rounded-corners bg_gr_yellow"><h1>Registo enviado com sucesso !</h1></div>';
		echo '<br><br>';
	}
	else if(isset($_GET['register']) && $_GET['register']!='ok')
	{
		echo '<div class="report block_90 center rounded-corners bg_gr_yellow">
		<h1>Ocorreu em problema durante o envio!</h1>
		<h3>Tente de novo!</h3>
		<h3>se não conseguir, contacta <a href="mailto:happygroup1999@gmail.com">happygroup1999@gmail.com <a>!</h3>
		</div>';
		echo '<br><br>';
	}
	
	?>
    
    
    <img class=" left" src="ui/images/logo_happy.png"/><h2>Ficha de Inscrição</h2>
    <p class="text_red right">Atenção: Preencher os Campos Assinalados com *</p>
     <form id="form_register_temp" name="form_register_temp" method="post" action="interface/sendRegisterEmail.php">
                <ul class="v_list">
                 <li><label>Data*</label><input name="register_date" class="validate[required]" type="text" value="<?php echo date('Y-m-d'); ?>" /></li>
                  <li><label>Local*</label><input name="register_local" class="validate[required]" type="text" value="" /></li>
                  <br /><br /><br /><br />
                  <li><img class=" left" src="ui/images/logo_happy.png"/><h2>Patrocinador</h2></li>
                  <br /><br />
                  <li><label>Nº   Patrocinador*</label><input name="register_sponsor" class="validate[required]" type="text" value="" /></li>
                  <li><label>Nome*</label><input  name="register_sponsor_name" class="validate[required]" type="text" value="" /></li>
                   <li><label>Tel*</label><input name="register_sponsor_phone" class="validate[required]" type="text" value="" /></li>
                  <br /><br /><br /><br />
                	<li><img class=" left" src="ui/images/logo_happy.png"/><h2>Dados Pessoais</h2></li>
                    <br /><br />
                    <li><label>Nome*</label><input name="register_person_first_name" class="validate[required]" type="text" value="" /></li>
                    <li><label>Apelido*</label><input name="register_person_last_name" class="validate[required]" type="text" value="" /></li>
                  
                    <li><label>Morada (Sítio)</label><input name="register_person_address" class="validate[required]" type="text" value=""/></li>
                    <li><label>Localidade</label><input name="register_person_local" type="text" value=""/></li>
                    <li><label>Codigo Postal</label><input name="register_person_zip_code" type="text" value=""/></li>
                     <li><label>Email*</label><input name="register_person_email" class="validate[required,custom[email]]" type="text" value=""/></li>
                     <li><label>B.I.</label><input  name="register_person_id"type="text" value=""/></li>
                      <li><label>Telephone*</label><input name="register_person_phone" class="validate[required]" type="text" value=""/></li>
                    <li><label>Data Nascimento*</label><input name="register_person_last_name" class="validate[required]" id="date_birth" type="text" value=""/></li>
                   
                   <br /><br /><br /><br />
                	
                    <li><label>Site*</label><input name="register_person_site" class="validate[required]" type="text"  value="www.happy-group.eu/" /></li>
                   <li><label>Username*:</label><input name="register_person_username" class="validate[required]" type="text" value="" /></li>
                    <li><label>Password*:</label><input name="register_person_password" class="validate[required]" type="text" value="" /></li>
                    <li><label>Comprovativo de Pagamento:</label><input name="register_payment_check" type="text" value="" /></li>
                    <li><label>M / REFª:</label><input type="text" name="register_payment_ref" value="" /></li>
                   <br /><br /><br /><br />
                   <li><img class=" left" src="ui/images/logo_happy.png"/><h2>Dados de quem preenche</h2></li>
                   <br /><br />
                    <li><label>Id*</label><input name="register_id" class="validate[required]" type="text" value="" /></li>
                    <li><label>Tel</label><input  name="register_phone" type="text" value="" /></li>
                   
                   <br /><br />
                   <li><p class="text_red right">Apresente este documento sempre que se dirigir a um agente</p></li>
                   <br /><br />
                   
                   
                    
                    <br /><br />
                    <li><input class="btn_submit ui-corner-all" type="submit" value="Registar"/></li>
                	<br /><br /><br /><br />
                </ul>
                </form>
    
    
    	
    
    
    
  </div>
</div>

<div class=" center "> <div class=" block_50 center "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>


</body>
</html>
