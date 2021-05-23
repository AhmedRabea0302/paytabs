<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    
    public function childrencategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('childrencategories');
    }
}
