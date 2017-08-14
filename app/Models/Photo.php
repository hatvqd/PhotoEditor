<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $attributes = ['image_url' => ''];

	public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

	public function getImageUrlAttribute()
    {
        return $this->attributes['image_url'];
    }
}
