/*
 * --------------------------------------------------------------------
 * Simple Scroller
 * by Siddharth S, www.ssiddharth.com, hello@ssiddharth.com
 * Version: 1.0, 05.10.2009 	
 * --------------------------------------------------------------------
 */
 
 

$(window).load(function() {

	var index = 0;
	var images = $("#gallery img");
	var thumbs = $("#thumbs div a img");
	var imgHeight = $(thumbs).attr("height");
	$(thumbs).vAlign('thumbs');
	
	
	
	
	for (i=0; i<thumbs.length; i++)
	{
		$(thumbs[i]).addClass("thumb-"+i);
		$(images[i]).addClass("image-"+i);
	}
	
	$("#next").click(sift);
	$("#prev").click(siftback);

    show(index);
	//setInterval(sift, 8000);
	
	function sift()
	{
		if (index<(thumbs.length-1)){index+=1 ; }
		else {index=0}
		show (index);
		
	}
	function siftback()
	{
		if (index>0){index-=1 ; }
		else {index=thumbs.length-1}
		show (index);
		
	}
	
	function show(num)
	{
		$(images).fadeOut(400);
		
		$(".image-"+num).center();
		
		$(".image-"+num).stop().fadeIn(400);
		var scrollPos = (num+1)*imgHeight;
		
		$("#thumbs").stop().animate({scrollTop: scrollPos}, 400);
		
		console.log(scrollPos, "img.image-"+num);
	}
	
	
});

jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", ( $('#gallery').height() - this.height() ) / 2+$('#gallery').scrollTop() + "px");
    this.css("left", ( $('#gallery').width() - this.width() ) / 2+$('#gallery').scrollLeft() + "px");
    return this;
}


// VERTICALLY ALIGN FUNCTION
jQuery.fn.vAlign = function($holder) {
	return this.each(function(i){
	var ah = $(this).height();
	if($holder=='gallery')
	{
	var ph = $(this).parent().parent().parent().height();
	}
	
	
	var mh = Math.ceil((ph-ah) / 2);
	$(this).css('margin-top', mh);
	});
};
