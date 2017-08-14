<?php
namespace App\Utils;

class ImageUtil 
{
	public static function resizeImage($baseimage, $maximumsize) {
		$originalwidth = imagesx($baseimage);
		$originalheight = imagesy($baseimage);

		$generalscale = min($maximumsize / $originalwidth, $maximumsize / $originalheight); 
		$modwidth = ceil($generalscale * $originalwidth);
		$modheight = ceil($generalscale * $originalheight);

		$finalimage = imagecreatetruecolor($modwidth, $modheight);
		imagecopyresampled($finalimage, $baseimage, 0, 0, 0, 0, $modwidth, $modheight, $originalwidth, $originalheight);

		return $finalimage;
	}

	public static function generatePhotoPath($sourcePath, $parentCategory, $category, $name, $extension) {
		return $sourcePath . '/' . $parentCategory . '/' .$category . '/' . $name . '.' . $extension;
	}

}

?>