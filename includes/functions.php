<?php


 
    
	function pushResultInArray($query)
	{
		$n =  mysql_num_rows($query);
		$Array = array();
		for($i=0;$i<$n;$i++)
		{
			$Array[]= mysql_fetch_array($query);
			
		}
		
		return $Array;
	}
	
	function pushResultIn1DimArray($query)
	{
		$n =  mysql_num_rows($query);
		$Array = array();
		$Array= mysql_fetch_array($query);
		return $Array;
	}

	
	function pushResultInSimpleArray($query)
	{
		$n =  mysql_num_rows($query);
		$Array = array();
		for($i=0;$i<$n;$i++)
		{
			$Array= mysql_fetch_array($query);
			
		}
		
		return $Array;
	}
	
	function mysql_prep( $value ) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysql_error());
		}
	}
	
	function euroUTFtoISO15($text) //Euro + utf to iso encoding fox for ajax requests
	{
		//array with char to find
		$enc_vars= array(chr(128));
		//array with char to substitute
		$replace_vars = array( chr(164));
		$new_text = mb_convert_encoding(str_replace($enc_vars,$replace_vars,$text), 'UTF-8', 'ISO-8859-15');
		return $new_text;
	}
	
	
	function euroISO15toUTF($text) //Euro + utf to iso encoding fox for ajax requests
	{
		//array with char to find
		$enc_vars= array('€',"'", chr(146));
		//array with char to substitute
		$replace_vars = array('',"'", "'");
		$new_text = utf8_decode(str_replace($enc_vars,$replace_vars,$text));//, 'ISO-8859-15', 'UTF-8');
		return $new_text;
	}
	
	function startSession()
	{
		session_start();
	}
	
	
	function sentEmail($to, $subject,$message,$from)
	{
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Reply-To: ".$from." <".$from.">\r\n"; 
		$headers .= "Return-Path: ".$from." <".$from.">\r\n"; 
		$headers .= "From: ".$from." <".$from.">\r\n"; 
		$headers .= "Organization: Happy-Group\r\n";
		 $headers .= "X-Priority: 3\r\n";
 		 $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
		//$headers .= 'MIME-Version: 1.0\r\n';
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		if(mail($to,$subject,$message,$headers))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	
	function prepareEmailTemplate($l_template_title ,$l_template_subtitle, $l_template_text)
	{
		//put whole template file in varaible BODY_MAIL
		flush();
		ob_start(); 
		include('../media/templates/template.php'); 
		$body_mail = ob_get_clean(); 
		
		return $body_mail;
	}
	
	
	
	function testArray($array)
	{
		die(print_r($array));
	}
	
	
	function showFlyers($arr, $field1, $field2)
	{
		
		
		$all = array();
		$all_city_names = array();
		$index = 0;
		foreach($arr as $city)
		{
			$all[$index] = $arr[$index][$field1];
			$all_city_names[$index] = $arr[$index][$field2];
			$index++;
		}
		$all = array_values(array_unique($all));
		$all_city_names = array_values(array_unique($all_city_names));
			
		
		$flyers ="";		
		for($i=0; $i<count($all) ;$i++)
		{
            $flyers .= '<li>
            	<h2>'. $all_city_names[$i].'</h2>';
                 
				   		$n_flyer = 1; 
                        for($in=0; $in<count($arr) ;$in++)
						{
               				if($arr[$in][$field1] == $all[$i])
							{
                          		$flyers .= '<a href="media/flyers/'.$arr[$in]['url'].'" rel="prettyPhoto[gallery1]">
											<img class="flyer_thumb" src="includes/resize.php?w=60&h=60&image=../media/flyers/'.$arr[$in]['url'].'" /></a>';
                				$n_flyer++; 
							}
						}
                $flyers .=  '</li>';
  
          } 
		  
		  
		  return $flyers;
	}
	
	function EncryptPass($pass)
	{
		return hash("sha512",$pass);
	}
	
	
	function GeneratePassword()
	{
		
		$length = 10;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		$string = "";    
		for ($p = 0; $p < $length; $p++) 
		{
			$string .= $characters[mt_rand(0, strlen($characters))];
		}
		
		return $string;
	}
	
	
	function getRootUrl()
	{
		$local = array('localhost', '127.0.0.1');
		if(in_array($_SERVER['HTTP_HOST'], $local))
		{
			// Database Constants LOCALHOST
			return 'http://localhost/HAPPYGROUP/';
		}
		else
		{
			// Database Constants ONLINE
			return 'http://www.jowandesign.com/HAPPYGROUP/';
		}
	}
	
	function getRootDocument()
	{
		$local = array('localhost', '127.0.0.1');
		if(in_array($_SERVER['HTTP_HOST'], $local))
		{
			// Database Constants LOCALHOST
			return $_SERVER['DOCUMENT_ROOT'].'HAPPYGROUP/';
		}
		else
		{
			// Database Constants ONLINE
			return $_SERVER['DOCUMENT_ROOT'].'HAPPYGROUP/';
		}
	}
	
	
	function limitText($text,$len)
	{
		$white_spaces = substr_count($text," ");
		$characters = strlen($text);
		$all_fields = $white_spaces + $characters;
		
		if($all_fields>$len)
		{
			return substr($text,0,$len-3)."...";
		}
		else
		{
			return $text;
		}
		
		
		
	}
	
	
	
function image_resize($path_to_image, $target) {
	//get image dimensions
	$img_dimensions = getimagesize($path_to_image);
	$width = $img_dimensions[0]; //stored in first element of return array
	$height = $img_dimensions[1]; //stored in second element of return array
	unset ($img_dimensions); //free up memory
	//declare a ratio to be used to store image dimensions ratio. If ratio is
	//not declared prior to usage, you might get PHP warnings.
	$ratio = FALSE;
	//We're looking for a maximum target size, so we must figure out which side
	//is larger: width or height, and then use that to produce the proper ratio
	if ($width > $height) {
	$ratio = ($target / $width);
	} else {
	$ratio = ($target / $height);
	}
	//apply ratio to dimensions
	$width = round($width * $ratio);
	$$height = round($height * $ratio);
	//return the resized image dimensions in html image tag format
	return 'width="'.$width.'" height="'.$height.'"';
}
	
	
	function cleanEditor($text)
	{
		$start = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html><head></head>	<body>';
		$end = '</body></html>';
		
		$text = str_replace($start, '',$text);
		$text = str_replace($end, '',$text);
		$text = str_replace('<p>', '',$text);
		$text = str_replace('</p>', '',$text);

		return $text;
	}
	
	function EmptyDir($dir) 
	{
		if (is_dir($dir)) 
		{
		$handle=opendir($dir);
		
		while (($file = readdir($handle))!==false) {
		//echo "$file <br>";
		@unlink($dir.'/'.$file);
		}
		
		closedir($handle);
		rmdir($dir);
		}
	}
	
	function resize($imagePath,$opts=null){
	$imagePath = urldecode($imagePath);
	# start configuration
	$cacheFolder = './cache/'; # path to your cache folder, must be writeable by web server
	$remoteFolder = $cacheFolder.'remote/'; # path to the folder you wish to download remote images into

	$defaults = array('crop' => false, 'scale' => 'false', 'thumbnail' => false, 'maxOnly' => false, 
	   'canvas-color' => 'transparent', 'output-filename' => false, 
	   'cacheFolder' => $cacheFolder, 'remoteFolder' => $remoteFolder, 'quality' => 90, 'cache_http_minutes' => 20);

	$opts = array_merge($defaults, $opts);    

	$cacheFolder = $opts['cacheFolder'];
	$remoteFolder = $opts['remoteFolder'];

	$path_to_convert = 'convert'; # this could be something like /usr/bin/convert or /opt/local/share/bin/convert
	
	## you shouldn't need to configure anything else beyond this point

	$purl = parse_url($imagePath);
	$finfo = pathinfo($imagePath);
	$ext = $finfo['extension'];

	# check for remote image..
	if(isset($purl['scheme']) && ($purl['scheme'] == 'http' || $purl['scheme'] == 'https')):
		# grab the image, and cache it so we have something to work with..
		list($filename) = explode('?',$finfo['basename']);
		$local_filepath = $remoteFolder.$filename;
		$download_image = true;
		if(file_exists($local_filepath)):
			if(filemtime($local_filepath) < strtotime('+'.$opts['cache_http_minutes'].' minutes')):
				$download_image = false;
			endif;
		endif;
		if($download_image == true):
			$img = file_get_contents($imagePath);
			file_put_contents($local_filepath,$img);
		endif;
		$imagePath = $local_filepath;
	endif;

	if(file_exists($imagePath) == false):
		$imagePath = $_SERVER['DOCUMENT_ROOT'].$imagePath;
		if(file_exists($imagePath) == false):
			return 'image not found';
		endif;
	endif;

	if(isset($opts['w'])): $w = $opts['w']; endif;
	if(isset($opts['h'])): $h = $opts['h']; endif;

	$filename = md5_file($imagePath);

	// If the user has requested an explicit output-filename, do not use the cache directory.
	if(false !== $opts['output-filename']) :
		$newPath = $opts['output-filename'];
	else:
        if(!empty($w) and !empty($h)):
            $newPath = $cacheFolder.$filename.'_w'.$w.'_h'.$h.(isset($opts['crop']) && $opts['crop'] == true ? "_cp" : "").(isset($opts['scale']) && $opts['scale'] == true ? "_sc" : "").'.'.$ext;
        elseif(!empty($w)):
            $newPath = $cacheFolder.$filename.'_w'.$w.'.'.$ext;	
        elseif(!empty($h)):
            $newPath = $cacheFolder.$filename.'_h'.$h.'.'.$ext;
        else:
            return false;
        endif;
	endif;

	$create = true;

    if(file_exists($newPath) == true):
        $create = false;
        $origFileTime = date("YmdHis",filemtime($imagePath));
        $newFileTime = date("YmdHis",filemtime($newPath));
        if($newFileTime < $origFileTime): # Not using $opts['expire-time'] ??
            $create = true;
        endif;
    endif;

	if($create == true):
		if(!empty($w) and !empty($h)):

			list($width,$height) = getimagesize($imagePath);
			$resize = $w;
		
			if($width > $height):
				$resize = $w;
				if(true === $opts['crop']):
					$resize = "x".$h;				
				endif;
			else:
				$resize = "x".$h;
				if(true === $opts['crop']):
					$resize = $w;
				endif;
			endif;

			if(true === $opts['scale']):
				$cmd = $path_to_convert ." ". escapeshellarg($imagePath) ." -resize ". escapeshellarg($resize) . 
				" -quality ". escapeshellarg($opts['quality']) . " " . escapeshellarg($newPath);
			else:
				$cmd = $path_to_convert." ". escapeshellarg($imagePath) ." -resize ". escapeshellarg($resize) . 
				" -size ". escapeshellarg($w ."x". $h) . 
				" xc:". escapeshellarg($opts['canvas-color']) .
				" +swap -gravity center -composite -quality ". escapeshellarg($opts['quality'])." ".escapeshellarg($newPath);
			endif;
						
		else:
			$cmd = $path_to_convert." " . escapeshellarg($imagePath) . 
			" -thumbnail ". (!empty($h) ? 'x':'') . $w ."". 
			(isset($opts['maxOnly']) && $opts['maxOnly'] == true ? "\>" : "") . 
			" -quality ". escapeshellarg($opts['quality']) ." ". escapeshellarg($newPath);
		endif;

		$c = exec($cmd, $output, $return_code);
        if($return_code != 0) {
            error_log("Tried to execute : $cmd, return code: $return_code, output: " . print_r($output, true));
            return false;
		}
	endif;

	# return cache file path
	return str_replace($_SERVER['DOCUMENT_ROOT'],'',$newPath);
	
}

	function defaultText($field,$defualt_text)
	{
		if($field==NULL || $field=='')
	 			$field = $defualt_text;
	
		return $field;
	}
	

	function substractingDate($date_renewal,$year=0,$months=0,$weeks=0, $days=0)
	{
			//calculate date before renewel 
		
			$date_before_renewal = strtotime ( '-'.$year.' year' , strtotime ( $date_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '-'.$months.' month' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '-'.$weeks.' week' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '-'.$days.' day' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
		
			return $date_before_renewal;	
	}
	
	function addingDate($date_renewal,$year=0,$months=0,$weeks=0, $days=0)
	{
			//calculate date before renewel 
		
			$date_before_renewal = strtotime ( '+'.$year.' year' , strtotime ( $date_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '+'.$months.' month' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '+'.$weeks.' week' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
			$date_before_renewal = strtotime ( '+'.$days.' day' , strtotime ( $date_before_renewal ) ) ;
			$date_before_renewal = date ( 'Y-m-d' , $date_before_renewal );
		
			return $date_before_renewal;	
	}
	
	
	function calculateDaysLeft($date_start, $date_end)
	{
		$timefromdb = date("Y-m-d",strtotime($date_start));
		$future_year = date("Y",strtotime($date_end));
		$future_month = date("m",strtotime($date_end));
		$future_day = date("d",strtotime($date_end));
		$future = date("Y-m-d",strtotime($date_end));
		
		$hours_left = (mktime(0,0,0,$future_month,$future_day,$future_year) - time())/3600; 
		$daysLeft = ceil($hours_left/24);
		return $daysLeft;
	}




?>