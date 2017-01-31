<!--<script type="text/javascript" src="ui/map/ammap/swfobject.js"></script>
<div id="flashcontent">
	<strong>You need to upgrade your Flash Player</strong>
</div>

<script type="text/javascript">
	// <![CDATA[
		
		var so = new SWFObject("ui/map/ammap/ammap.swf", "ammap", "637", "520", "8", "#FFFFFF");
		 
		so.addVariable("path", "ui/map/ammap/");
		so.addVariable("data_file", escape("ui/map/portugal/ammap_data.xml"));
		so.addVariable("settings_file", escape("ui/map/portugal/ammap_settings.xml"));		
		so.addVariable("preloader_color", "#999999");
		so.addParam("wmode", "opaque");
		so.write("flashcontent");
		// ]]>
</script>-->
<script type="text/javascript" src="ui/js/jquery.maphilight.min.js" ></script>
<script type="text/javascript" src="ui/js/jquery.qtip-1.0.0-rc3.min.js" ></script>

<script type="text/javascript">

 
jQuery(function() {
	
	jQuery('.map').maphilight({
		fill: true,
	fillColor: 'F62217',
	fillOpacity: 0.8,
	strokeColor: 'F62217',
	strokeWidth: 0,
	neverOn: false,
	groupBy: false,
	wrapClass: true,
	shadow: true,
	shadowX: 0,
	shadowY: 0,
	shadowRadius: 6,
	shadowColor: 'F62217',
	shadowOpacity: 0.8,
	shadowPosition: 'outside',
	shadowFrom: false
	});
	});
</script>
<script class="example" type="text/javascript"> 
// Create the tooltips only when document ready
jQuery(document).ready(function()
{
	
/*$('area').mouseenter(function() {
				
	$.ajax({
		type:"POST",
		dataType: "html",
		data: 
		{	
			lan:			2,
			country:		172,
			area:			5, 
		},
		url:"interface/getCitiesOfAreaList.php",
		cache:false,
		success:function(data)
		{
			window.list = data;
		}
	});
			
});*/
	
   // Use the each() method to gain access to each elements attributes
	
	$('area').mouseenter(function()
	{
			var id = $(this).attr('id_area');
		
			//$('.map_list li').removeClass('area_active');
			$('.map_list li#'+id).addClass('area_active');
		
	})
   
   jQuery('area').each(function()
   {
	   
	   
      jQuery(this).qtip(
      {
		  
         content:  {
			 title: jQuery(this).attr('alt')+'<img  onclick="$(\'.qtip\').hide()" src="ui/images/icons/Close16.png"/>',
			  url: 'interface/getCitiesOfAreaList.php',
			  data: { 	id_lan:			'<?php echo $_SESSION['id_lan']; ?>',
			  			lan:			'<?php echo $_SESSION['lang']; ?>',
						country:		172,
						area:			$(this).attr('id_area') },
			  method: 'post'
		   },
		   position: {
     corner: {
        target: 'middleTop',
        tooltip: 'rightMiddle'
                }
                },
         style: {
            name: 'light', // Give it the preset cream style
            border: {
               width: 0, 
               radius: 4 
            }, 
			 
            tip: true // Apply a tip at the default tooltip corner,
			
			
         },
		
         hide: { fixed: true, delay: 50 }
      });
	  
	  
	  
	  
	  
   });
   
   
 
 
});
</script>

  
  <script>
  $(document).ready(function() {
    	$("#accordion").accordion({ active: 0 ,autoHeight: false, collapsible: false,heightStyle: "fill"});
  }); 
  </script>

<div id="accordion" class="map_list left">


<h3><img src="ui/images/icons/Search16.png" /> <?php echo $l_map_title_areas ?></h3>
<div>
<ul>

<?php
include_once('bz/Areas.php');
include_once('bz/Partners.php');

$Areas = Areas::getAllAreas(2,172); 
?>
<?php foreach($Areas as $area): ?>
<?php 
$Partners = Partners::getPartnersofArea(2,172,$area['id']);
$num = count($Partners);
if($num!=0):
?>
<li id="<?php  echo $area['id'] ?>"><a href="javascript:mapClicked('172,<?php  echo $area['id'] ?>,-1')"><?php  echo $area['area'].'     ('.$num.')' ?></a></li>


<?php
endif;
endforeach; ?>

</ul>
</div>

<h3><img src="ui/images/icons/Search16.png" /><?php echo $l_map_title_cities ?></h3>
<div>
<ul>

<?php

include_once('bz/Cities.php');
$Cities = Cities::getAllCities(2,172,5); 
?>
<?php foreach($Cities as $city): ?>
<?php 
$Partners = Partners::getPartnersofCity(2,172,$city['id']);
$num = count($Partners);
if($num!=0):
?>
<li id="<?php  echo $city['id'] ?>"><a href="javascript:mapClicked('172,<?php  echo $city['id_area'] ?>,<?php  echo $city['id'] ?>')"><?php  echo $city['city'].'     ('.$num.')' ?>  </a></li>
<?php 
endif;
endforeach; 
?>

</ul>
</div>




</div>


<img class="block_50 right map" src="ui/images/500map.jpg"  height="475"  border="0" usemap="#Map" /> 
<map name="Map" id="Map">
  
  <area  shape="poly" coords="69,463,73,450,70,431,88,433,105,438,105,462,100,468,82,465,76,469" 
  id_area="19" href="javascript:mapClicked('172,19,-1')"  alt="Albufeira" />
  
  <area  shape="poly" coords="35,473,40,455,40,442,48,431,57,435,67,433,70,431,73,447,68,464,57,464" 
  id_area="18" href="javascript:mapClicked('172,18,-1')"  alt="Lagos" />
  
  <area   shape="poly" coords="147,422,155,412,165,396,168,384,186,376,188,370,190,366,187,362,180,366,173,352,134,365,118,354,99,353,95,360,82,368,82,386,77,393,71,395,62,400,50,402,50,416,50,431,57,434,72,430,101,437,112,434,120,430,127,428,133,427" 
  id_area="17" href="javascript:mapClicked('172,17,-1')" alt="Beja" />
 
  <area   shape="poly" coords="153,303,149,293,126,296,113,289,103,294,95,288,89,301,86,308,70,309,68,317,62,327,74,331,81,338,88,347,96,353,99,354,118,353,133,365,152,359,165,354,173,353,167,340,164,332,166,322,169,310"
  id_area="13" href="javascript:mapClicked('172,13,-1')" alt="Évora" />
  
  <area   shape="poly" coords="51,401,58,400,65,399,74,393,82,387,81,381,82,375,81,367,100,355,96,354,86,346,82,341,75,333,61,327,64,322,71,309,59,309,44,309,35,302,24,309,26,312,18,318,21,328,13,330,18,343,29,343,34,339,45,334,43,342,48,349,51,370,44,385,47,388" 
  id_area="15" href="javascript:mapClicked('172,15,-1')"   alt="Sétubal" />
  
  <area shape="poly" coords="138,232,146,233,161,248,168,259,170,270,179,279,187,281,181,302,169,310,164,307,158,306,153,302,148,293,124,295,114,288,103,293,95,288,96,268,110,252,100,237,118,232,125,236,134,228" 
  id_area="16" href="javascript:mapClicked('172,16,-1')"  alt="Portalegre" />
 
  <area   shape="poly" coords="60,210,70,212,75,221,88,219,98,232,106,225,117,232,99,237,110,250,105,259,94,267,94,279,95,288,90,296,87,305,83,309,76,309,68,308,62,307,56,308,52,310,48,309,40,308,35,301,49,286,44,278,51,267,39,269,33,261,38,247,61,238" 
  id_area="12" href="javascript:mapClicked('172,12,-1')"  alt="Santarém" />
  
  <area  shape="poly" coords="9,256,20,262,24,269,34,261,40,269,50,268,43,278,48,287,35,300,32,304,31,305,22,312,14,319,2,318,-1,290,4,281,8,272" 
  id_area="14" href="javascript:mapClicked('172,14,-1')"  alt="Lisboa" />
 
 <area  shape="poly" coords="44,200,46,194,53,196,59,200,70,200,87,199,104,197,85,208,79,219,73,221,69,210,59,210,61,236,38,248,32,262,22,270,19,260,10,256,14,249,23,243,20,244,33,230,39,213,40,206" id_area="11" href="javascript:mapClicked('172,11,-1')"  alt="Leiria" />
  
  <area   shape="poly" coords="128,182,129,174,137,170,147,165,162,160,156,173,191,173,182,180,182,185,193,195,191,210,185,219,183,228,157,231,140,232,138,231,136,227,127,235,120,233,114,229,106,224,99,232,89,218,82,219,85,209,105,197,119,202,132,190" 
  id_area="10" href="javascript:mapClicked('172,10,-1')" alt="Castelo Branco" />
  
  <area  shape="poly" coords="51,157,71,157,81,165,99,163,112,163,128,174,130,190,121,201,115,199,112,198,103,196,94,197,92,200,87,200,77,199,62,199,73,196,59,199,57,197,44,192,41,180"
  id_area="9" href="javascript:mapClicked('172,9,-1')"   alt="Coimbra" />
  
  <area "  shape="poly" coords="150,119,158,99,176,91,189,109,195,119,197,143,193,156,197,166,188,173,176,173,157,173,162,160,161,161,157,161,145,166,136,170,128,173,120,169,114,162,141,143,141,126" 
   id_area="8" href="javascript:mapClicked('172,8,-1')"   alt="Guarda" />
 
  <area   shape="poly" coords="97,96,112,93,135,94,157,85,161,92,178,91,157,98,150,120,141,126,143,137,139,145,124,154,114,162,82,163,90,152,87,125,100,120,102,116,104,112" id_area="7" href="javascript:mapClicked('172,7,-1')"    alt="Viseu" />
  
  <area   shape="poly" coords="59,96,71,106,97,96,103,112,100,120,87,125,89,153,81,165,80,164,72,156,51,156,60,109" 
   id_area="6" href="javascript:mapClicked('172,6,-1')"  alt="Aveiro" />
  
  <area  shape="poly" coords="59,95,49,55,61,67,65,71,87,71,95,65,112,77,111,84,114,92,96,96,72,106"
   id_area="3" href="javascript:mapClicked('172,3,-1')"  alt="Porto" />
  
  <area   shape="poly" coords="169,14,184,17,200,17,211,16,215,28,213,37,215,42,225,41,234,48,239,51,230,68,217,80,206,84,202,91,197,100,188,102,180,92,174,89,161,92,154,77,162,58,167,54,170,34,166,15"  id_area="5" href="javascript:mapClicked('172,5,-1')"  alt="Bragança" />
 
  <area   shape="poly" coords="100,30,114,25,117,27,129,23,143,28,166,23,170,33,167,54,160,59,159,70,153,77,156,84,137,93,115,92,110,82,110,75,112,68,120,53,115,54,111,47,98,39"  
  id_area="4" href="javascript:mapClicked('172,4,-1')"  alt="Vila Real" />
  
  <area  shape="poly" coords="100,29,87,34,78,36,68,50,56,44,48,50,56,64,66,72,77,71,91,68,98,68,99,67,103,71,111,76,111,69,118,55,114,54,114,50,106,44,98,40" 
  id_area="2" href="javascript:mapClicked('172,2,-1')"  alt="Braga" />
 
  <area shape="poly" coords="92,1,74,10,66,11,56,18,49,24,43,36,48,48,57,44,68,50,78,35,85,34,100,28,95,18,93,18,100,12,96,6" id_area="1" href="javascript:mapClicked('172,1,-1')"  alt="Viana do Castelo" />
 
  <area shape="poly" coords="105,437,120,432,132,441,133,447,139,452,142,463,126,473,112,474,100,468,105,463" id_area="20" href="javascript:mapClicked('172,20,-1')"  alt="Faro" />
 
  <area  shape="poly" coords="146,423,118,432,132,441,134,448,140,453,143,464,151,458,157,457,153,441,152,427" id_area="21" href="javascript:mapClicked('172,21,-1')" alt="Tavira" />
</map>