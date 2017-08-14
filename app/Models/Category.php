<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $attributes = ['image_url' => ''];

    protected $hidden = ['is_enable', 'image_path', 'created_at', 'updated_at'];

    public function parentCategory()
    {
        return $this->belongsTo('App\Models\ParentCategory');
    }
    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }
    
    public function getImageUrlAttribute()
    {
        return $this->attributes['image_url'];
    }
}