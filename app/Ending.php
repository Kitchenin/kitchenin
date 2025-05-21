<?php

namespace App;

use App\Traits\OrderByIndex;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ending extends ShopModel
{
    use SoftDeletes, OrderByIndex;

    protected $fillable = ['ending_group_id', 'name', 'active', 'index'];

    protected $with = ['photos'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function endingGroup()
    {
        return $this->belongsTo('App\EndingGroup');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }
}
