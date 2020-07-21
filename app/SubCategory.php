<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name', 'cate_id', 'status'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'cate_id', 'id');
    }
}
