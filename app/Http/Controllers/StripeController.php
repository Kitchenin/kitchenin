<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function webhook()
    {

        Stripe::setApiKey(config('services.stripe.secret'));

        $payload = @file_get_contents('php://input');

        // $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        // $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        // $event = null;

        // try {
        //     $event = \Stripe\Webhook::constructEvent(
        //         $payload, $sig_header, $endpoint_secret
        //     );
        // } catch(\UnexpectedValueException $e) {
        //     // Invalid payload
        //     http_response_code(400); // PHP 5.4 or greater
        //     exit();
        // } catch(\Stripe\Error\SignatureVerification $e) {
        //     // Invalid signature
        //     http_response_code(400); // PHP 5.4 or greater
        //     exit();
        // }

        http_response_code(200);

        $event = json_decode($payload);

        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;

            $order = Order::findOrFail($session->client_reference_id);
            $order->confirm($session->payment_intent);
        }

    }

}
