<?php
	session_start();
	$db = mysql_connect("indiapicture.cjgqyv6rnqde.ap-southeast-1.rds.amazonaws.com","mahattaart","arts@#009");
	mysql_select_db("mahattaart");
	  
	  
	  if(!isset($_COOKIE['user_info'])){
		$user_info = "user_info";
		$info = $_SESSION['user_info'];
		setcookie($user_info, $info, time() + (86400 * 30), "/"); // 86400 = 1 day
		$session_id  = $_SESSION['user_info'];
		}
		else{
			$session_id  = $_SESSION['user_info'];
		}
		
		for($i=0;$i<=count($_FILES['file']['name'])-1;$i++){
		$file_extn = explode(".", strtolower($_FILES['file']['name'][$i]));	
		$change_name[$i] = 'image'.uniqid(rand()).'.'.$file_extn[1];
		$temp = $_FILES['file']['tmp_name'][$i];
		$tmp_name = $_FILES['file']['tmp_name'][$i];
		$image_name = $change_name[$i];
		$image_type = $_FILES['file']['type'][$i];
		$image_size = $_FILES['file']['size'][$i];
	    $max_width=417;
		$max_height=550;
		makeThumbnail($temp,$max_width,$max_height,"upload_images/".$image_name, $image_type);
		if(move_uploaded_file($tmp_name,"upload_images/original/".$change_name[$i])){
            $query = mysql_query("INSERT INTO add_images_table(image_name,image_type,image_path,image_size,session_id) VALUES('$image_name','$image_type','$tmp_name','$image_size','$session_id')");
			}
	
		}

         function makeThumbnail($sourcefile,$max_width, $max_height, $endfile, $type){
            // Takes the sourcefile (path/to/image.jpg) and makes a thumbnail from it
            // and places it at endfile (path/to/thumb.jpg).
            // Load image and get image size.
            //   
            switch($type){
            	    case'image/png':
            		$img = imagecreatefrompng($sourcefile);
            		break;
            		case'image/jpeg':
            		$img = imagecreatefromjpeg($sourcefile);
            		break;
            		case'image/gif':
            		$img = imagecreatefromgif($sourcefile);
            		break;
            		case'image/jpg':
            		$img = imagecreatefromjpeg($sourcefile);
            		break;
            		default : 
            		return 'Un supported format';
            }
            
            $width = imagesx( $img );
            $height = imagesy( $img );
            
            if ($width > $height) {
                if($width < $max_width)
            		$newwidth = $width;
            	else
                $newwidth = $max_width;	
                $divisor = $width / $newwidth;
                $newheight = floor( $height / $divisor);
            }
            else {
            	 if($height < $max_height)
                     $newheight = $height;
                 else
            		 $newheight =  $max_height;
                $divisor = $height / $newheight;
                $newwidth = floor( $width / $divisor );
            }
            // Create a new temporary image.
            $tmpimg = imagecreatetruecolor( $newwidth, $newheight );
            
                imagealphablending($tmpimg, false);
                imagesavealpha($tmpimg, true);
            	
            // Copy and resize old image into new image.
            imagecopyresampled( $tmpimg, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            // Save thumbnail into a file.
            //compressing the file
            switch($type){
            	case'image/png':
            		imagepng($tmpimg, $endfile, 0);
            		break;
            	case'image/jpeg':
            		imagejpeg($tmpimg, $endfile, 100);
            		break;
            	case'image/gif':
            		imagegif($tmpimg, $endfile, 0);
            		break;	
            }
            // release the memory
               imagedestroy($tmpimg);
               imagedestroy($img);
             
            }

?>
 