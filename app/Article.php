<?php

namespace App;

use App\Traits\OrderByIndex;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Article extends ShopModel
{
    use SoftDeletes; // , OrderByIndex;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'page_title',
        'meta_description'
    ];

    protected $with = ['photos'];


    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

}
