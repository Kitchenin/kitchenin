<?php

namespace App;

use App\Traits\OrderByIndex;
use Illuminate\Database\Eloquent\SoftDeletes;

class EndingGroup extends ShopModel
{
    use SoftDeletes;

    protected $fillable = ['id', 'name'];

    public function endings()
    {
        return $this->hasMany('App\Ending');
    }
}
