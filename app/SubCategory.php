<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name', 'slug', 'cate_id', 'status'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'cate_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'subcate_id', 'id')->latest()->take(3);
    }
}
