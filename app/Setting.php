<?php

namespace App;

class Setting extends ShopModel
{

    protected $fillable = ['name', 'title', 'value'];

    public static function delivery_price()
    {
        return self::where('name', 'delivery_price')->first()->value;
    }

    public static function free_delivery()
    {
        return self::where('name', 'free_delivery')->first()->value;
    }

    public static function coefficient_custom_size()
    {
        return self::where('name', 'coefficient_custom_size')->first()->value;
    }

    public static function hinge_price()
    {
        return self::where('name', 'hinge_price')->first()->value;
    }

    public static function sitewide_message()
    {
        return self::where('name', 'sitewide_message')->first()->value;
    }

}
