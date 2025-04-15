<?php

namespace App\Helpers;

use App\Product;

class OrderHelper
{
    public static function is_positive_integer($str) {
        return (is_numeric($str) && $str > 0 && $str == round($str));
    }

    public static function update_session_items($data)
    {
        $session = [];
        foreach ($data as $keyItem => $item) {

            $product_data = [
                'product_id'   => $item['id'],
                'quantity'     => intval($item['quantity']),
                'hinge_side'   => $item['hinge_side'],
                'width'        => $item['hinge_top'],
                'height'       => $item['hinge_top'],
                'depth'        => $item['hinge_top'],
                'hinge_top'    => $item['hinge_top'],
                'hinge_center' => $item['hinge_center'],
                'hinge_bottom' => $item['hinge_bottom'],
                'size_id'      => isset($item['options'][0]) ? $item['options'][0]['id'] : 0,
                'color_id'     => isset($item['color_id'][0]) ? $item['color_id'][0]['id'] : 0
            ];

            $session[$keyItem] = Product::getItemAndRelatedParameters($product_data);

        }

        return $session;
    }
}
