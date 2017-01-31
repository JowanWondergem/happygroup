<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Happy-Group" /> 
<meta name="developer" content="www.jowandesign.com">
<meta name="copyright" content="Happy-Group"> 
<meta name="distribution" content="Global"> 
<meta name="rating" content="General"> 
<meta name="expires" content="Never"> 
<meta name="robots" content="Index, Follow"> 
<meta name="revisit-after" content="2 Days"> 
<meta name="description" content="O HAPPY_GROUP oferece cartões de DESCONTOS, VANTAGENS e REGALIAS em Bares e Discotecas, Clínicas, Farmácias, Gastronomia, Institutos de Beleza, Lojas, Oficina, Aluguer de Carro, Saúde, Bem Estar e muito mais." />
<meta name="keywords" content="descontos, vantagens, cartões, cartões de desconto,  bar, discoteca, restaurante, gastronomia, clínicas, lojas, actividades algarve, Faro, Albufeira, Leiria, procurar parceiros" />


<title>Happygroup  - <?php echo $head_title ?></title>
<link REL="SHORTCUT ICON" HREF="ui/images/favicon.png">
<link href="ui/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" media="screen" />
<link href="ui/css/slider.css" rel="stylesheet" type="text/css" media="screen" />
<link href="ui/css/style.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 5]>
<link href="ui/css/style-ie5.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 6]>
<link href="ui/css/style-ie6.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 7]>
<link href="ui/css/style-ie7.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<link href="ui/css/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" media="screen" />
<link href="ui/css/minimalist.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript" src="ui/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="ui/js/jquery-ui-1.8.23.custom.min.js"></script>
<script type="text/javascript" src="ui/js/functions.js"></script>
<script type="text/javascript" src="ui/js/jquery.iosslider.js"></script>
<script type="text/javascript" src="ui/js/jquery.preloader.js"></script>
<script type="text/javascript" src="ui/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="ui/js/flowplayer.min.js"></script>
<script type="text/javascript">
$(function(){
	if (!$.browser.msie ) {
	$(".slider .button").preloader();
	//$("#list_partners").preloader();
	$(".popup_partner").preloader();	
	}
});
</script>
<?php if( strpos( $_SERVER['REQUEST_URI'], 'register' ) !== false || strpos( $_SERVER['REQUEST_URI'], 'contact' ) !== false ):?>
	
	<script type="text/javascript" src="ui/js/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="ui/js/jquery.validationEngine-<?php echo $_SESSION['lang'] ?>.js"></script>
    <script>
				$(function() {
					
					jQuery("#form_register").validationEngine('attach',{scroll:true,promptPosition:'centerRight'});
					jQuery("#form_register_mlm").validationEngine('attach',{scroll:true,promptPosition:'centerRight'});
					jQuery("#form_contact").validationEngine('attach',{scroll:true,promptPosition:'centerRight'});
					
					$( "#date_birth" ).datepicker({
						changeMonth: true,
						changeYear: true,
						yearRange:'-90:+0',
						dateFormat:'yy-mm-dd',   
					});
					
					//MAKE SELECT BOXES SAME WIDTH AS INPUT OR TEXTAREA FIELDS
					var w_form ;
					if($('form textarea').length>0)
					{
						w_form = $('form textarea').width();
						$('form select').width(w_form);	
					}
					else if($('form input').length>0)
					{
						w_form = $('form input').width();
						$('form select').width(w_form);	
					}
				});
			</script>
<?php endif; ?>

<?php if( strpos( $_SERVER['REQUEST_URI'], 'flyers' ) !== false ):?>
<link rel="stylesheet" href="ui/css/prettyPhoto.css">
<script type="text/javascript" src="ui/js/jquery.prettyPhoto.js" ></script>
<?php endif; ?>



<script type="text/javascript">
			$(document).ready(function() {
			
				$('.doubleSlider-1').iosSlider({
					scrollbar: true,
					snapToChildren: true,
					desktopClickDrag: true,
					navSlideSelector: $('.doubleSlider-2 .button'),
					navPrevSelector: $('.doubleSliderPrevButton'),
					navNextSelector: $('.doubleSliderNextButton'),
					scrollbarHeight: '2',
					scrollbarBorderRadius: '0',
					scrollbarOpacity: '0.5',
					onSliderLoaded: doubleSlider2Load,
					onSlideChange: doubleSlider2Load,
					startAtSlide: 3,
					autoSlide: true,
					autoSlideTimer: 7000,
					keyboardControls:true
				});
				
				$('.doubleSlider-2').iosSlider({
					desktopClickDrag: true
				});
				
				function doubleSlider2Load(args) {
					
					/* indicator */
					$('.doubleSlider-2 .button').removeClass('selected');
					$('.doubleSlider-2 .button:eq(' + args.currentSlideNumber + ')').addClass('selected');
					
				}
				
			});
		</script>