<?php
	include('../includes/connection.php');
	include_once('../admin_partner/ui/locale/locale-'.$_POST['lang'].'.php');
	
	
	
	$partner_id=$_POST['id']; 
	$folder=$_POST['folder'];
	$folder_website = "website"; 
	$img_name=$_POST['img_name']; 
	$db_table=$_POST['db_table'];
	$db_field=$_POST['db_field']; 
	$img_name=$_POST['img_name']; 
	$mb=$_POST['mb']; 
	$max_files = $_POST['max'];

	$image= "";
	$actual_image_name = "";
	$path_partner = "../media/".$folder."/".$partner_id."/";
	$path = "../media/".$folder."/".$partner_id."/".$folder_website."/";
	$filecount = count(glob($path.'*.*'));
	
	
	$message_error_db 		= $l_message_images_error_db;
	$message_error_type 	= $l_message_images_error_type;
	$message_error_size 	= $l_message_images_error_size .$mb." Mb";
	$message_error_no_image = $l_message_images_error_no_image;
	$message_limit_images 	= $l_message_images_limit_images.$max_files.$l_message_images_limit_images_2;
	

	
	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","JPEG","JPG", "PNG", "GIF", "BMP");
	
	if($filecount >= $max_files)
	{
		//OUTPUT
		echo '<root><success>0</success><message>'.$message_limit_images.'</message></root>'; 
		exit;
	}
	else
	{
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
				// check if image selected
				if(strlen($name))
				{
					$ext = explode(".", $name);
					$ext = end($ext);
					
					//check valid formats
					if(in_array($ext,$valid_formats))
					{
						//check image size
						if($size<($mb*1024)*($mb*1024))
						{
								$actual_image_name = time().'_'.$img_name.".".$ext;
								$tmp = $_FILES['photoimg']['tmp_name'];
								
								//create partner folder if not exists
								if(!file_exists($path_partner)) 
								{ 
									mkdir($path, 0777);
								}
								
								//create partner website folder if not exists
								if(!file_exists($path)) 
								{ 
									mkdir($path, 0777);
								}
								include('../bz/Image.php');
								$image = new Image();
   								$image->load($tmp);
								$image->resizeToHeight(350);
								$image->save($tmp);
								
								//check if image moves to correct folder
								if(move_uploaded_file($tmp, $path.$actual_image_name))
									{
										mysql_query("INSERT INTO $db_table (id_partner,$db_field) VALUES($partner_id,'$partner_id/$folder_website/$actual_image_name')") 
										or die(mysql_error());
										
										$message = "Saved!";
										$success = 1;
										//OUTPUT
										echo '<root><success>'.$success.'</success><message>'.$message.'</message></root>'; 
										exit;
										
									}
								else
									$message =   $message_error_db;
									$success = 0;
							}
							else
							
							$message =   $message_error_size;
							$success = 0;	
											
						}
						else
						$message =  $message_error_type;
						$success = 0;
							
				}
				
			else
				$message = $message_error_no_image;
				$success = 0;
		}
		}
		
		
		echo '<root><success>'.$success.'</success><message>'.$message.'</message></root>'; 
		exit;
		
		
?>