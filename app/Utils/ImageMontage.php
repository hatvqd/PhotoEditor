<?php

namespace App\Utils;

class ImageMontage
{
	/*
		$templateFilePath = resource_path() . '/assets/props/11.png';
	 */
	public static function montageBookFrame($baseimage, $templateFilePath)
	{
		$src_width = imagesx($baseimage);
		$src_height = imagesy($baseimage);

		$dst = @imagecreatetruecolor(671, 412);
		$dst_width = 671;
		$dst_height = 412;
		$new_width = $dst_width;
		$new_height = round($new_width*($src_height/$src_width));
		$new_x = 0;
		$new_y = round(($dst_height-$new_height)/2);
		$next = $new_height < $dst_height;

		if ($next) {
			$new_height = $dst_height;
			$new_width = round($new_height*($src_width/$src_height));
			$new_x = round(($dst_width - $new_width)/2);
			$new_y = 0;
		}
		
		imagecopyresampled($dst, $baseimage , $new_x, $new_y, 0, 0, $new_width, $new_height, $src_width, $src_height);
		$baseimage = @imagecreatetruecolor(766, 586);
		imagecopy ($baseimage, $dst,53,88,0,0,766,586);
		
		$effect = imagecreatefrompng($templateFilePath);
		imagecopyresampled ($baseimage, $effect,0,0,0,0,766,586,766,586);

		return $baseimage;
	}

	/*
		$templateFilePath = resource_path() . '/assets/props/16.png';
	 */
	public static function montageCollageFrame($baseimage, $templateFilePath)
	{
		$canvaswidth = 600;
		$canvasheight = 451;

		//desired max width and max height of the uploaded image
		$dst = @imagecreatetruecolor(599, 450);
		imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));
		$src_width = imagesx($baseimage);
		$src_height = imagesy($baseimage);

		$dst_width = 599;
		$dst_height = 450;
		$new_width = $dst_width;
		$new_height = round($new_width*($src_height/$src_width));
		$new_x = 0;
		$new_y = round(($dst_height-$new_height)/2);
		$next = $new_height < $dst_height;

		if ($next) {
			$new_height = $dst_height;
			$new_width = round($new_height*($src_width/$src_height));
			$new_x = round(($dst_width - $new_width)/2);
			$new_y = 0;
		}
		return $baseimage;
		imagecopyresampled($dst, $baseimage , $new_x, $new_y, 0, 0, $new_width, $new_height, $src_width, $src_height);
		$baseimage = @imagecreatetruecolor($canvaswidth, $canvasheight);
		//delete the following if you do not want a rotation
		//position of the resized uploaded image, 0 is the left position and 200 the top position
		imagecopy ($baseimage,$dst,3,3,0,0,$canvaswidth,$canvasheight); 

		$effect = imagecreatefrompng($templateFilePath); 

		/*for debug
		//uncomment the following and comment the next imagecopyresampled to see the transparency and edit the position easily
		//imagecopymerge ($finalimage,$effect,0,0,0,0,$canvaswidth,$canvasheight,50); 
		*/
		imagecopyresampled($baseimage, $effect,0,0,0,0, $canvaswidth, $canvasheight, $canvaswidth, $canvasheight);
		return $baseimage;
	}

	/*
		$templateFilePath = "../props/9.png"; 
	 */
	public static function montageConferenceFrame($baseimage, $templateFilePath) {
		$canvaswidth = 878;
		$canvasheight = 586;

		//desired max width and max height of the uploaded image
		$dst = @imagecreatetruecolor(430, 300);
		imagefill($dst, 0, 0, imagecolorallocate($dst, 255, 255, 255));

		$src_width = imagesx($baseimage);
		$src_height = imagesy($baseimage);

		$dst_width = 430;
		$dst_height = 300;
		$new_width = $dst_width;
		$new_height = round($new_width*($src_height/$src_width));
		$new_x = 0;
		$new_y = round(($dst_height-$new_height)/2);
		$next = $new_height < $dst_height;
		if ($next) {
			$new_height = $dst_height;
			$new_width = round($new_height*($src_width/$src_height));
			$new_x = round(($dst_width - $new_width)/2);
			$new_y = 0;
		}
		imagecopyresampled($dst, $baseimage , $new_x, $new_y, 0, 0, $new_width, $new_height, $src_width, $src_height);
		$baseimage = @imagecreatetruecolor($canvaswidth, $canvasheight); 
		//delete the following if you do not want a rotation
		//position of the resized uploaded image, 0 is the left position and 200 the top position
		imagecopy ($baseimage,$dst,218,110,0,0,$canvaswidth,$canvasheight);
		 $templateFilePath;
		$effect = imagecreatefrompng($templateFilePath); 

		/*for debug
		//uncomment the following and comment the next imagecopyresampled to see the transparency and edit the position easily
		//imagecopymerge ($finalimage,$effect,0,0,0,0,$canvaswidth,$canvasheight,50); 
		*/
		imagecopyresampled($baseimage, $effect,0,0,0,0,$canvaswidth,$canvasheight,$canvaswidth,$canvasheight);

		return $baseimage;
	}


}


?>