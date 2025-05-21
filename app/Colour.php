<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Colour extends ShopModel
{
    use SoftDeletes;

    protected $fillable = ['colour_group_id', 'name', 'active', 'index'];

    protected $with = ['photos'];


    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('price');
    }

    public function colourGroup()
    {
        return $this->belongsTo('App\ColourGroup');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function getPriceAttribute()
    {
        if (!isset($this->pivot) || !isset($this->pivot->price)) {
            return null;
        }

        return $this->pivot->price;
    }

    public function addToProducts($colourGroupId)
    {
        if ($colourGroupId > 0) {
            $firstColour = ColourGroup::find($colourGroupId)->colours()->where('id', '<>', $this->id)->first();
            if ($firstColour) {
                $products = $firstColour->products()->get();
                foreach ($products as $product) {
                    $product->colours()->attach($this->id);
                }
            }
        }

    }
}
