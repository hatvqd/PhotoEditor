<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
	protected $table = 'parent_categories';

	protected $hidden = ['is_enable', 'created_at', 'updated_at'];

	public function categories()
   	{
        return $this->hasMany('App\Models\Category');
    }
}
