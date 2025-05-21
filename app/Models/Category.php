<?php

namespace App\Models;

use App\ShopModel;
use App\Traits\OrderByIndex;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends ShopModel
{
    use SoftDeletes, OrderByIndex;

    protected $fillable = ['parent_id', 'name', 'slug', 'description', 'order', 'index', 'page_title', 'meta_description', 'h1'];

    protected $with = ['photos'];


    public function isMainCategory()
    {
        return $this->parent_id == null;
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function hasChildren()
    {
        return $this->children()->get()->count();
    }

    public static function getAllOrdered()
    {
        return self::orderBy('order', 'asc')->orderBy('id', 'asc')->get();
    }


    public static function getMainCategories()
    {
        return self::with('children')->where('parent_id', null)->orderBy('order', 'asc')->get();
    }

    /**
     * Get category ids.
     *
     * @param int $id
     * @return mixed
     */
    public static function getCategoryIds(int $id)
    {
        return self::where('id', $id)
            ->orWhere('parent_id', $id)
            ->orderBy('order', 'asc')
            ->get(['id']);
    }

}
