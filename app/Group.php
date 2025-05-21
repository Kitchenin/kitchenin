<?php

namespace App;

use App\Traits\OrderByIndex;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends ShopModel
{
    use SoftDeletes, OrderByIndex;

    protected $fillable = ['name', 'index'];


    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}
