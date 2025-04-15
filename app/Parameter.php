<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Parameter extends ShopModel
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'name', 'value'];


    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
