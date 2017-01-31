<?php

	function UploadImage($partner_id,$img_name,$id_cropper,$db_field,$folder,$thumb_w, $thumb_h,$label,$enable_crop)
	{	
		
		//declare varaibles
		$image= "";
		$actual_image_name = "";
		$path = "../media/".$folder."/".$partner_id."/";
		$valid_formats = array("jpg", "png", "gif", "bmp");
		
		/*$exists = mysql_query("SELECT ".$db_field." FROM  partners WHERE ".$db_field." IS NOT NULL AND id='$partner_id' LIMIT 1") or die(mysql_error());
		if(mysql_num_rows($exists)>0)
		{
			$row = mysql_fetch_array($exists);
			$actual_image_name = $row[$db_field];
			
		}
		else
		{*/
			if(isset($_FILES['photoimg_'.$id_cropper]))
			{
				
			$name = $_FILES['photoimg_'.$id_cropper]['name'];
			$size = $_FILES['photoimg_'.$id_cropper]['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats) && $size<(1024*1024))
						{
							$actual_image_name = $img_name.".".$ext;
							$tmp = $_FILES['photoimg_'.$id_cropper]['tmp_name'];
							
							if(!file_exists($path)) 
							{ 
								mkdir($path, 0777);
							}
							
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									mysql_query("UPDATE partners SET ".$db_field."='$partner_id/$actual_image_name' WHERE id='$partner_id'") or die(mysql_error());
									
									
								}
							else
								echo "failed";
						}
					else
						echo "Invalid file formats..!";					
				}
			else
				echo "Please select image..!";
		
			}
		//}
		
		
		
		
		
		
		if($enable_crop==1)
		{
		return
		'<div id="crop_panel'.$id_cropper.'" class="crop_panel">
		<h2>'.$label.'</h2>
		<img id="cropper_'.$id_cropper.'" src="'.$path.$actual_image_name.'" class="cropper" folder="'.$folder.'" t_w="'.$thumb_w.'" t_h="'.$thumb_h.'" db_field="'.$db_field.'" >
		<div id="thumbs_'.$id_cropper.'" class="thumbs_list" ></div>
		
		
		<form id="cropimage_'.$id_cropper.'" class="cropimage" method="post" enctype="multipart/form-data">
			<input type="file" name="photoimg_'.$id_cropper.'" id="photoimg" class="form-file" onchange="document.getElementById(\'btn_submit'.$id_cropper.'\').click();" />
			<input type="hidden" name="image_name_'.$id_cropper.'" id="image_name_'.$id_cropper.'" value="'.$actual_image_name.'" />
			<input class="hidden form-submit" id="btn_submit'.$id_cropper.'" type="submit" name="submit" value="Submit"  />
		</form>
		
		</div>
		<div>
		</div>';
		}
		else
		{
			return
			'<div >
		<h2>'.$label.'</h2>
		<img class="image_preview" src="'.$path.$actual_image_name.'">
		<div  class="thumbs_list" ></div>
		<div>
		
		<form id="" class="cropimage" method="post" enctype="multipart/form-data">
			<input type="file" name="photoimg_'.$id_cropper.'" id="photoimg" class="form-file" onchange="document.getElementById(\'btn_submit'.$id_cropper.'\').click();" />
			<input type="hidden" name="image_name_'.$id_cropper.'" id="image_name_'.$id_cropper.'" value="'.$actual_image_name.'" />
			<input class="hidden form-submit" id="btn_submit'.$id_cropper.'" type="submit" name="submit" value="Submit"  />
		</form>
		
		</div>
		</div>';
		}
		
	}
	
	
	/*function getPartnerImages($partner_id)
	{
		mysql_query("SELECT  WHERE id='$partner_id'") or die(mysql_error());
	}*/
	
	

	
	
	


?>

			