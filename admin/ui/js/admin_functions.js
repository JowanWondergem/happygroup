
$(document).ready(function() {
/*
// fix all file uploads for modzilla
	if ( $.browser.mozilla) {
		
		$('.form-file').after('<a onclick="$(this).prev().click()" class="form-file">Upload</a>')
		
	  }

$('img').load(function(){
    // ... loaded  
}).error(function(){
    // ... not loaded
   // $(this).hide(); //attr('src','ui/images/no_image_100.png');
});*/

$('#lan_panel').change(function()
{
	$.ajax({
		type:"POST",
		dataType: "json",
		data: 
		{	
			lan:			$(this).val(), 
		},
		url:"../interface/changeLanguage.php",
		cache:false,
		success:function(data)
		{
			window.location.reload();
		}
	});
});


  
  
});//end doucment ready

function getSizes(im,obj)
	{
		
		var x_axis = obj.x1;
		var x2_axis = obj.x2;
		var y_axis = obj.y1;
		var y2_axis = obj.y2;
		var id_partner = window.id_partner ;
		var thumb_width = $(im).attr('t_w');
		var thumb_height = $(im).attr('t_h');
		var $cropper = $(im);
		var arr = $(im).attr('id').split('_');
		var n_cropper = arr[1];
		var folder = $(im).attr('folder');
		var db_field = $(im).attr('db_field');
		
		var $thumb_list = $(im).next();
		//obj.width obj.height
		
		if(thumb_width > 0)
			{
				if(confirm("Do you want to save image..!"))
					{
						
						
						$.ajax({
							type:"GET",
							dataType: "html",
							url:"../interface/createThumb.php?t=ajax&img="+$("#image_name_"+n_cropper).val()+"&w="+thumb_width+"&h="+thumb_height+"&x1="+x_axis+"&y1="+y_axis+"&p="+id_partner+"&folder="+folder+"&db_field="+db_field,
							cache:false,
							success:function(rsponse)
								{
								
								$cropper.imgAreaSelect({remove:true});
								$cropper.hide();
								$thumb_list.html("");
								$thumb_list.html("<img src='../media/partners/"+rsponse+"' />");
								}
						});
					}
			}
		else
			alert("Please select portion..!");
	}
	
	
	
	
	