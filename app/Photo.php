<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends ShopModel
{
    use SoftDeletes;

    protected $fillable = ['photoable_id', 'photoable_type', 'filename', 'featured'];

    public static $TYPES = [
        'categories' => 'App\Models\Category',
        'products' => 'App\Models\Product',
        'colours' => 'App\Colour',
        'options' => 'App\Option',
        'endings' => 'App\Ending',
        'articles' => 'App\Article',
    ];

    public function photoable()
    {
        return $this->morphTo();
    }

    public static function getPhotoableTypeByType($type)
    {
        return self::$TYPES[$type];
    }

    public function getType($photoableType = null)
    {
        return array_search(isset($photoableType) ? $photoableType : $this->photoable_type, self::$TYPES);
    }

    public function getFullPath()
    {
        return '/images/'.$this->getType().'/'.$this->filename;
    }
}
