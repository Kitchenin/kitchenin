<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends ShopModel
{
    use SoftDeletes;

    protected $fillable = ['title', 'short_description', 'meta_description', 'slug', 'content'];

}
