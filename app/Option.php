<?php

namespace App;

use App\Traits\OrderByIndex;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends ShopModel
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'type', 'name', 'width', 'height', 'depth', 'price', 'active', 'index'];


    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }
}
