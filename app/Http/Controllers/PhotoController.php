<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Requests;
use File;
use App\Utils\ImageUtil;
use App\Utils\ImageMontage;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Category;
use App\Models\Photo;
use App\Models\ParentCategory;
use Illuminate\Routing\UrlGenerator;

class PhotoController extends Controller
{
	public function index()
    {
    	 return array(
		      1 => "John",
		      2 => "Mary",
		      3 => "Steven"
		    );
    }

    public function getAllParentCategory()
    {
        $parentcategory = ParentCategory::with('categories')->get();
        foreach ($parentcategory as $parent) {
            foreach ($parent->categories as $category) {
                $category->path = url('/') . '/thumbnail' . '/' . $parent->code . '/' . $category->code;
                $category->image_path = $category->path;
            }
        }
        return $parentcategory;
    }

    public function getCategoryByParentCategory(Request $request, $parent_category_id)
    {
        $categories = Category::where('parent_category_id', $parent_category_id)
                        ->where('is_enable', 1)
                        ->get();
        foreach ($categories as $category) {
            $category->image_url = url('/') . '/thumbnail' . '/' . $category->image_path;
        }                      
        return $categories;
    }

    public function getPhotosByCategory(Request $request, $category_id)
    {
        $category = Category::find($category_id);
        $photos = Photo::where('category_id', $category_id)
                        ->get();
        foreach($photos as $photo) {
            $photo->image_url = url('/') . '/thumbnail' . $photo->path . '/' . $photo->name;
        }
        return $photos;
    }

    public function showPhoto(Request $request, $photo_id)
    {
        $photo = Photo::find($photo_id);
        $photo->image_path = url('/') . '/photo' . $photo->path . '/' . $photo->name;
        return $photo;   
    }

    public function processImage(Request $request, $parentcategory, $category, $fx, Response $response)
    {
    	$path = resource_path() . '/assets/photo/' . $parentcategory . '/' . $category . '/' . $fx . ".jpg";
	    if(!File::exists($path)) {
	        return response()->json(['message' => 'Image not found.'], 404);
	    }

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

    	return $response;
    }

    public function processImage2(Request $request)
    {
    	$image_id = $request->input('image_id');
    	$image = $request->file('image');
        $photo = Photo::find($image_id);
        $templatePath = resource_path() . '/assets/photo/' . $photo->path . '/' . str_replace('jpg', 'png', $photo->name);

    	$inputImage = imagecreatefromjpeg($image->getRealPath());
    	
    	$resizedImage = ImageUtil::resizeImage($inputImage, 800);
    	
    	$outputImage = ImageMontage::montageBookFrame($resizedImage, $templatePath);
    	$random = 'tmpout' .'-'.rand(546, 8784);
        $fileOut = '/photo/output/' . $random . '.jpg';
    	$destFile = public_path() . $fileOut;
    	imagejpeg($outputImage, $destFile, 100);
       
    	#return Response::download($destFile);
 	return response()->json(['url_image' => url('/') . $fileOut]);
	#return url('/') . $fileOut ;
    }
}
