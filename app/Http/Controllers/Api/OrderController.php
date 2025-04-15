<?php

namespace App\Http\Controllers\Api;

use App\Helpers\OrderHelper;
use App\Order;
use App\OrderProduct;
use App\Product;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Session key for basket.
     *
     * @var string $basket_session_key
     */
    private $basket_session_key = 'basket';

    /**
     * Get items from basket.
     *
     * @param Request $request
     * @return array
     * @throws Exception
     */
    public function prepareOrder(Request $request)
    {
        $seesion_basket = $request->session()->get(
            $this->basket_session_key, []);

        $error_status = [];
        $get_errors = $this->validateRequest($request, $error_status);

        $error_status = 417;
        if (count($seesion_basket) === 0) {

            $response = response(
                [
                    'status'   => $error_status,
                    'messages' => ['Your cart is empty.']
                ], $error_status);

        } else if (count($get_errors) > 0) {

            $response = response(
                [
                    'status'   => $error_status,
                    'messages' => $get_errors
                ], $error_status);

        } else {
            $session = OrderHelper::update_session_items($seesion_basket);

            $order = Order::create(
                  [
                      'shipping_first_name' => $request->input('shipping_first_name'),
                      'shipping_last_name' => $request->input('shipping_last_name'),
                      'shipping_company_name' => $request->input('shipping_company_name'),
                      'shipping_city' => $request->input('shipping_city'),
                      'shipping_county' => $request->input('shipping_county'),
                      'shipping_address1' => $request->input('shipping_address1'),
                      'shipping_address2' => $request->input('shipping_address2'),
                      'shipping_postcode' => $request->input('shipping_postcode'),
                      'shipping_phone' => $request->input('shipping_phone'),
                      'billing_first_name' => $request->input('billing_first_name'),
                      'billing_last_name' => $request->input('billing_last_name'),
                      'billing_company_name' => $request->input('billing_company_name'),
                      'billing_city' => $request->input('billing_city'),
                      'billing_county' => $request->input('billing_county'),
                      'billing_address1' => $request->input('billing_address1'),
                      'billing_address2' => $request->input('billing_address2'),
                      'billing_postcode' => $request->input('billing_postcode'),
                      'billing_phone' => $request->input('billing_phone'),
                      'email' => $request->input('email'),
                      'additional_info' => $request->input('additional_info'),
                      'status' => 'pending'
                  ]
            );

            $order->save();

            foreach ($session as $order_product) {
                $custom_size = ($order_product['width'] !== null && $order_product['height'] !== null)
                    ? $order_product['width'] . 'x' . $order_product['height'] : null;

                $data_order_product[] = [
                    'order_id'   => $order->id,
                    'product_id' => $order_product['id'],
                    'colour_id' => isset($order_product['colours'][0]) ? $order_product['colours'][0]['id'] : null,
                    'option_id' => isset($order_product['options'][0]) ? $order_product['options'][0]['id'] : null,
                    'ending_id' => isset($order_product['endings'][0]) ? $order_product['endings'][0]['id'] : null,
                    'custom_size' => $custom_size,
                    'hinge_side' => $order_product['hinge_side'] !== null ? $order_product['hinge_side'] : null,
                    'hinge_top' => $order_product['hinge_top'] !== null ? $order_product['hinge_top'] : null,
                    'hinge_center' => $order_product['hinge_center'] !== null ? $order_product['hinge_center'] : null,
                    'hinge_bottom' => $order_product['hinge_bottom'] !== null ? $order_product['hinge_bottom'] : null,
                    'quantity' => $order_product['quantity'],
                    'price' => intval($order_product['price']) === 0 ? $order_product['price']['options'][0]['price'] : $order_product['price'],
                ];
            }

            OrderProduct::insert($data_order_product);

            $response = ['order_id' => $order->id];
        }

        // Clear basket session
        $request->session()->put(
            $this->basket_session_key, []);

        return $response;
    }

    /**
     * @param $request
     * @param $error_data
     * @return array
     */
    private function validateRequest($request, &$error_data)
    {
        $filter_options = [
            'options' => [
                'min_range' => 0
            ]
        ];

        foreach ($this->requestedVariables() as $variable) {
            $validate_variable = filter_var(
                $request->input($variable),
                FILTER_VALIDATE_INT,
                $filter_options
            );

            if ($request->input($variable) === null) {
                $error_data[] = "Missing mandatory variable {$variable}.";
            }
        }

        return $error_data;
    }

    private function is_positive_integer($str) {
        return (is_numeric($str) && $str > 0 && $str == round($str));
    }

    /**
     * Requested variables
     *
     * @return array
     */
    private function requestedVariables()
    {
        return [
            'shipping_first_name',
            'shipping_last_name',
            'shipping_city',
            'shipping_county',
            'shipping_address1',
            'shipping_postcode',
            'shipping_phone',
            'billing_first_name',
            'billing_last_name',
            'billing_city',
            'billing_county',
            'billing_address1',
            'billing_postcode',
            'billing_phone',
            'email'
        ];
    }
}
