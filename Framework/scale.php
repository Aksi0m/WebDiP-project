<?php

function scaleUpload(){

		$max_upload_width = 40;
		$max_upload_height = 40;
		
		//JPG/JPEG
		if($_FILES["uslika"]["type"] == "image/jpeg" || $_FILES["uslika"]["type"] == "image/pjpeg"){	
			$image_source = imagecreatefromjpeg($_FILES["uslika"]["tmp_name"]);
		}		
		//GIF
		if($_FILES["uslika"]["type"] == "image/gif"){	
			$image_source = imagecreatefromgif($_FILES["uslika"]["tmp_name"]);
		}				
		//PNG
		if($_FILES["uslika"]["type"] == "image/png"){
			$image_source = imagecreatefrompng($_FILES["uslika"]["tmp_name"]);
		}
		
		$remote_file = "Upload/Thumbnails/".$_FILES["uslika"]["name"];
		imagejpeg($image_source,$remote_file,100);
		chmod($remote_file,0777);
		
		list($image_width, $image_height) = getimagesize($remote_file);
		
		if($image_width>$max_upload_width || $image_height >$max_upload_height){
			$proportions = $image_width/$image_height;
			
			if($image_width>$image_height){
				$new_width = $max_upload_width;
				$new_height = round($max_upload_width/$proportions);
			}		
			else{
				$new_height = $max_upload_height;
				$new_width = round($max_upload_height*$proportions);
			}		
			
			
			$new_image = imagecreatetruecolor($new_width , $new_height);
			$image_source = imagecreatefromjpeg($remote_file);
			
			imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
			imagejpeg($new_image,$remote_file,100);
			
			imagedestroy($new_image);
		}
		imagedestroy($image_source);
		
		move_uploaded_file($_FILES["uslika"]["tmp_name"],"Upload/" . $_FILES["uslika"]["name"]);
		
		
}


?>