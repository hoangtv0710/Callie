<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'content', 'image', 'author', 'status', 'cate_id', 'subcate_id', 'created_at'];

    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory', 'subcate_id', 'id');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category', 'cate_id', 'id');
    }
}
