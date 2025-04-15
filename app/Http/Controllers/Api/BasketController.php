<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Setting;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BasketController extends Controller
{

    /**
     * Add item to basket.
     *
     * @param Request $request
     * @return array
     * @throws Exception
     */
    public function getItem(Request $request)
    {
        $data = $request->all();

        if (!isset($data['product_id'])) {
            return [];
        }

        $product = Product::findOrFail($data['product_id']);

        if (isset($data['colour_id']) && !empty($data['colour_id'])) {
            $data['colour'] = $product->colours()->findOrFail($data['colour_id']);
        }

        if (isset($data['ending_id']) && !empty($data['ending_id'])) {
            $data['ending'] = $product->endings()->findOrFail($data['ending_id']);
        }

        if (isset($data['width']) && isset($data['height']) && !empty($data['width']) && !empty($data['height'])) {
            // Custom Size
            if (isset($product->price) && $product->price > 0) {
                $data['price'] = ($data['width']/1000) * ($data['height']/1000) * $product->price;
            } else {
                $data['depth'] = $request->input('depth', 0);
                $data['price'] = (1 + Setting::coefficient_custom_size()) * $product->getCustomSizePrize($data['width'], $data['height'], $data['depth']);
            }


        } elseif (isset($data['size_id']) && !empty($data['size_id'])) {

            // Selected size option
            $option = $product->options()->findOrFail($data['size_id']);
            $data['price'] = $option->price;
            $data['size'] = $option;

        } elseif (isset($data['colour']) && isset($data['colour']->price) && $data['colour']->price > 0) {

            $data['price'] = $data['colour']->price;

        } elseif ($product->hasOptions()) {

            // Minimum price from options
            $data['price'] = -$product->getMinOptionPrice();

        } elseif ($product->hasColourPrices()) {

            $data['price'] = -$product->getMinColourPrice();

        } else {

            // Default product price
            $data['price'] = $product->price;
        }

        if (!isset($data['price'])) {
            throw new \Exception('Can not get price of product');
        }

        if ($data['price'] > 0) {
            $hinges = ['top', 'bottom', 'left', 'right'];
            $hingePrice = Setting::hinge_price();
            foreach ($hinges as $hinge) {
                if (isset($data['hinge_' . $hinge]) && !empty($data['hinge_' . $hinge])) {
                    $data['price'] += $hingePrice;
                }
            }

            if (isset($data['hinge_center']) && !empty($data['hinge_center'])) {
                $data['price'] += $data['hinge_center'] * $hingePrice;
            }
        }

        $data['product'] = $product;

        return $data;
    }


}
