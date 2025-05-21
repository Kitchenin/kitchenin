<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends ShopModel
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'type', 'name', 'width', 'height', 'depth', 'price', 'active', 'index'];


    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }
}
