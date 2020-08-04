<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'status'];

    public function subcategories()
    {
        return $this->hasMany('App\SubCategory', 'cate_id', 'id')->where('status', 1)->orderBy('id', 'desc');
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'cate_id', 'id')->where('status', 1)->orderBy('id', 'desc');
    }
}
