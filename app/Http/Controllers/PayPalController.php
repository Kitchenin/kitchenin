<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    public function webhook()
    {
        $payload = @file_get_contents('php://input');

        http_response_code(200);

        // error_log('>>> paypal webhook');
        // error_log($payload);

        $pp_response = json_decode($payload);

        // error_log($pp_response->resource->id);
        // error_log($pp_response->resource->purchase_units[0]->reference_id);

        if ($pp_response->event_type == "CHECKOUT.ORDER.APPROVED") {
            $order = Order::findOrFail($pp_response->resource->purchase_units[0]->reference_id);
            $order->confirm($pp_response->resource->id);

            // error_log('OK ', $pp_response->resource->purchase_units[0]->reference_id, $pp_response->resource->id);
        }

    }
}
