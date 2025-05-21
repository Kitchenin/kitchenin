<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{

    /**
     * Get product object by given Id
     *
     * @param string $slug
     * @return array|null|object
     */
    public function getItem($slug)
    {
        $product = Product::getItem($slug);

        $data    = [];
        if (!is_null($product)) {

            $data = $product;
            $data->hasSizes = $data->hasSizes();
            $data->hasCustomOptions = $data->hasCustomOptions();
        }

        return $data;
    }
}
