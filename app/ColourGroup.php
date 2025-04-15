<?php

namespace App;

use App\Traits\OrderByIndex;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColourGroup extends ShopModel
{
    use SoftDeletes;

    protected $fillable = ['id', 'name'];

    public function colours()
    {
        return $this->hasMany('App\Colour');
    }
}
