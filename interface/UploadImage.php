<?php
	include('../includes/connection.php');
	$partner_id =		$_POST['id']; 
	$folder 	=		$_POST['folder']; 
	$img_name	=		$_POST['img_name']; 
	$db_table	=		$_POST['db_table'];
	$db_field	=		$_POST['db_field']; 
	$img_name	=		$_POST['img_name']; 
	$w			=		$_POST['w']; 
	$h			=		$_POST['h']; 
	$mb			=		$_POST['mb']; 

	$image= "";
	$actual_image_name = "";
	$path = "../media/".$folder."/".$partner_id."/";
	
	
	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","JPEG","JPG", "PNG", "GIF", "BMP");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					$ext = explode(".", $name);
					$ext = end($ext);
					
					if(in_array($ext,$valid_formats))
					{
						if($size<($mb*1024)*($mb*1024))
						{//time().substr(str_replace(" ", "_", $txt), 5)
								$actual_image_name = $img_name.".".$ext;
								$tmp = $_FILES['photoimg']['tmp_name'];
							
								if(!file_exists($path)) 
								{ 
									mkdir($path, 0777);
								}
								
								include('../bz/Image.php');
								$image = new Image();
   								$image->load($tmp);
								
								if($w==0 || $w=='')
								{
									$image->resizeToHeight($h);
								}
								else if($h==0 || $h=='')
								{
									$image->resizeToWidth($w);
								}
							
								else
								{
									$image->resize($w,$h);
								}
								$image->save($tmp);
								
							
								if(move_uploaded_file($tmp, $path.$actual_image_name))
									{
									mysql_query("UPDATE $db_table SET $db_field='$partner_id/$actual_image_name' WHERE id='$partner_id'") or die(mysql_error());
										
										echo "<a href='".$path."/".$actual_image_name."'   rel=\"prettyPhoto[gallery1]\"><img src='".$path."/".$actual_image_name."'  class='preview'></a>";
									}
								else
									echo "failed";
							}
							else
							echo "Image file size max ".$mb." MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
		
?>