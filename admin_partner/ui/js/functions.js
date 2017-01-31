// JavaScript Document
var detail_open = false;
var item_open;

$(document).ready(function() {

	//MAKE SELECT BOXES SAME WIDTH AS INPUT OR TEXTAREA FIELDS
	var w_form ;
	if($('textarea').length>0)
	{
		w_form = $('textarea').width();
		$('select').width(w_form);	
	}
	else if($('input').length>0)
	{
		w_form = $('input').width();
		$('select').width(w_form);	
	}

	
	
	

//END MAKE SELECT BOXES SAME WIDTH AS INPUT OR TEXTAREA FIELDS

$('.map_small').mouseover(function() {
 	
	$(this).attr('src','ui/images/map_over.png')
}).mouseout(function(){
    
	 $(this).attr('src','ui/images/map.png')
});
$( "#dialog:ui-dialog" ).dialog( "destroy" );

$( "#dialog-activity" ).dialog({
			autoOpen: false,
			modal: false,
			resizable:false,
			show: "drop",
            hide: "drop",
			
			close: function() {
				
			}
		});


$( "#dialog-login" ).dialog({
			autoOpen: false,
			height: 150,
			width: 300,
			modal: true,
			resizable:false,
			
			close: function() {
				
			}
		});
		
//popup small show		
$(".list_blocks li").mouseenter(function() {
	$(this).next('.popup_small').fadeIn(300);
})

//popup small hide
$(".list_blocks li").next('.popup_small').mouseleave(function(){
	$(this).fadeOut(300);
});
  
  
/* PARTNERS */  
  
//partner list items		
$(".list_partners li ").mouseenter(function() {
	//$(this).find('.partner_thumb img').animate({opacity: 1}, 300);
	//$(this).find('.partner_type').slideDown(300);
	
}).mouseleave(function(){
	//$(this).find('.partner_thumb img').animate({opacity: 0.7}, 300);
	//$(this).find('.partner_type').slideUp(300);
});




  

//partner list items		
$(".list_partners li ").click(function() {
	
	var id				= $(this).attr('id');
	var name 			= $(this).find('.partner_name').html();
	var area 			= $(this).find('.partner_area ').html();
	var city 			= $(this).find('.partner_city').html();
	var type 			= $(this).find('.partner_type').html();
    var description 	= $(this).find('#des').val();
	var image_big 		= $(this).find('#img_b').val();
	var url 			= $(this).find('#url').val();
	var email 			= $(this).find('#email').val();
	var phone 			= $(this).find('#phone').val();
	var mobile_phone 	= $(this).find('#mobile_phone').val();
	var address 		= $(this).find('#address').val();
	var zip_code 		= $(this).find('#zip_code').val();
	var discount 		= $(this).find('#discount').val();
	var fax 			= $(this).find('#fax').val();
	
	if(window.detail_open == false)
	{
		window.detail_open = true;
		openDetails(this,id, image_big, name, area, city, type, description, url, email, phone, mobile_phone, address, zip_code, discount, fax);
	}
	else
	{
		closeDetials();//.delay(2000).fadeIn().$(document).openDetails(this,id, image_big, name, area, city, type, description, url);
		 window.detail_open = false; 
		 openDetails(this,id, image_big, name, area, city, type, description, url, email, phone, mobile_phone, address, zip_code, discount, fax);	
		 window.detail_open = true; 
	}
	 
	
});


$( ".search_zone").change(function(){
	
	var area = $(this).val();
	var country = 172;
	if(area!=-1)
	{
		window.location.href = 'partners.php?country='+country+'&area='+area;
	}
	
});
$( ".search_activity").change(function(){
	
	var act = $(this).val();
	var country = 172;
	if(act!=-1)
	{
		window.location.href = 'partners.php?country='+country+'&act='+act;
	}
});

$( ".search_city").change(function(){
	
	var city = $(this).val();
	var country = 172;
	if(city!=-1)
	{
		window.location.href = 'partners.php?country='+country+'&city='+city;
	}
});
  
  
  
  //get select activity from popup
$( "#dialog-activity select").change(function(){
	
	var activity = $(this).val();
	var location = $('#location').val();
	var arrLocation = new Array();
	arrLocation = location.split(',');
	var country = arrLocation[0];
	var area = arrLocation[1];
	//only area selected
	if(arrLocation[2] == -1)
	{
		window.location.href = 'partners.php?country='+country+'&area='+area+'&act='+activity;
	}
	// area and city selected
	else
	{
		var city = arrLocation[2];
		window.location.href = 'partners.php?country='+country+'&area='+area+'&city='+city+'&act='+activity;
	}

});


/*$('img').load(function(){
    // ... loaded  
}).error(function(){
    // ... not loaded
    $(this).attr('src','ui/images/no_image.jpg');
});*/
 
 
$('.lan_panel').click(function()
{
	$.ajax({
		type:"POST",
		dataType: "json",
		data: 
		{	
			lan:			$(this).attr('lan'), 
		},
		url:"../interface/changeLanguage.php",
		cache:false,
		success:function(data)
		{
			if(data.success==1)
			{
				window.location.reload();
			}
			else
			{
				popupMessage('Coming Soon <br><i>Brevemente</i>');
			}
		}
	});
});
 
  
  
  
});//end doucment ready


function popupMessage(message,textClose)
{
	//set Default Close Button Text
	if(typeof textClose == 'undefined') {
        textClose = 'Close';
    }
	//Create HTML popup div
	var $dialog = '<div id="instant_dialog" title="">'+message+'</div>';
	$('body').before($dialog);
	
	//trigger popup
	$('#instant_dialog').dialog({
			autoOpen: true,
			modal: false,
			resizable:false,
			show: "drop",
            hide: "drop",
			buttons: [{
                text: textClose,
                click : function() {    
                    $( this ).dialog( "close" );
                    }
                }]
            });	;	
}


function popupConfirm(message,ok,cancel,okCallback,cancelCallback)
{

	//set Default Close Button Text
	if(typeof ok == 'undefined') {
        ok = 'Ok';
    }
	//set Default Close Button Text
	if(typeof cancel == 'undefined') {
        cancel = 'Cancel';
    }
	

	var $dialog = '<div id="instant_dialog" title="">'+message+'</div>';
	$('body').after($dialog);
	
	$('#instant_dialog').dialog({
			autoOpen: true,
			modal: false,
			resizable:false,
			show: "drop",
            hide: "drop",
			buttons: [{
                text: ok,
                click : function() {    
                    $( this ).dialog( "close" );
                    okCallback();
                    }
                }, {
                text: cancel,
                click: function() {
                    $( this ).dialog( "close" );
                    cancelCallback();
                }}]
            });	
}


//partner close

function closeDetials(){

	//$('.list_partners li#'+obj+' ').fadeIn(300);
	 $('.popup_partner').hide(300);//({'min-height': "0px", "opacity":"0"},500, function() { $('.popup_partner').hide();  });
	
	

};

function openDetails(obj,id, image_big, name, area, city, type, description, url, email, phone, mobile_phone, address, zip_code,discount,fax){
	//$(obj).hide();
	//show Big Popup
	$(obj).before(drawPopup(id, image_big, name, area, city, type, description, url, email, phone, mobile_phone, address, zip_code,discount,fax));	
	// $('.popup_partner_contacts').hide();
	//$('.popup_partner_contacts').delay(300).show("puff", {}, 700);
	// control if image not found
	$('.popup_partner img').load(function(){  }).error(function(){   $(this).attr('src','ui/images/no_image.jpg'); });
	$('.popup_partner').animate({'min-height': "300px","opacity":"1"}, 300);

}



function drawPopup(id, image_big, name, area, city, type, description, url, email, phone, mobile_phone, address, zip_code,discount,fax)
{
	var popup;
	if(url!='')
	{
		var url_website = '<a class=" btn_submit rounded-corners partner_link" href="'+url+'" >'+window.view_website+'</a>';
	}
	else
	{
		var url_website = '';
	}
	
	 popup = '<div class="popup_partner block_100 clear rounded-corners" >'

			+''
			+'<div class="block_100">'
				+'<div class="block_65 popup_partner_img left rounded-corners"><img src="'+image_big+'">'
				+'<div class=" popup_partner_contacts  left rounded-corners">'
				+'<ul class="">';
				popup += '<li><img src="ui/images/icons/Home16.png"/>';
				if(address!='')
				{
					popup += ': '+address;
				}
				if(zip_code!='')
				{
					popup += '&nbsp;&nbsp;'+zip_code;
				}
				popup += '</li>';
				
				
				if(phone!='')
				{
					popup += '<li><img src="ui/images/icons/Telephone16.png"/>: '+phone+'</li>';
				}
				if(mobile_phone!='')
				{
					popup += '<li><img src="ui/images/icons/Telephone16.png"/>: '+mobile_phone+'</li>';
				}
				if(email!='')
				{
					popup += '<li><img src="ui/images/icons/Chat16.png"/>: '+email+'</li>';
				}
				if(fax!='')
				{
					popup += '<li><img src="ui/images/icons/File16.png"/>: '+fax+'</li>';
				}
				
				popup += '</ul>';
				
				
				
				popup += '</div>';
				if(discount!='')
				{
					popup += '<div class="popup_partner_discount">'+discount+'</div>';
				}
				
				popup += '</div>';
				popup += '<div class="popup_partner_details block_30 right">'
				+'<div class="btn_close" onclick="closeDetials('+id+')"><input id="item_open" type="text" class="hidden" value="'+id+'"/></div><br><h2>'+name+'</h2>'
				
				+'<ul class="h_list">'
					+'<li>'+area+'</li>'
					+'<li>-</li>'
					+'<li>'+city+'</li>'
					+'<li>-</li>'
					+'<li>'+type+'</li>'
				+'</ul>'
				+'<div class="popup_description">'
				+''
				+description
				+'</div>'+
				url_website
				+'</div>'
			+'</div>'
		+'</div>';
		
		
		return popup;
}


function showCardInfo()
{
	/*
	*	1 = Bonus Card
	*	2 = Holiday Card
	*	3 = Party Card
	*/
	var card_type = $('#card_type').val();	
	$('.card_preview').hide();
	$('#card_type_'+card_type).fadeIn(300);
	
	
}








function mapClicked(data)
{
	$("#dialog-activity" ).dialog( "open" );
	$('#location').val(data);

	
	
	
	
 
	
}


function openLogin()
{
	//alert(data);
	$( "#dialog-login" ).dialog( "open" );
}




jQuery.fn.extend(
{
  scrollTo : function(speed, easing)
  {
    return this.each(function()
    {
      var targetOffset = $(this).offset().top-500;
      $('html,body').animate({scrollTop: targetOffset}, speed, easing);
    });
  }
});



$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
}



// VERTICALLY ALIGN FUNCTION
jQuery.fn.vAlign = function() {
	
	$(this).hide();
	return this.each(function(i){
	var ah =  $(this).height(); //get heiht of dinamically loaded picture
	
	var ph = $(this).parent().height();

		var mh = Math.ceil((ph-ah) / 2);
		$(this).css('margin-top', mh).fadeIn(300);
		
	
	});
};


