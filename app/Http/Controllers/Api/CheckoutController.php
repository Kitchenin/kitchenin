<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfirmOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\PendingOrderRequest;
use App\Http\Requests\QuoteRequest;
use App\Http\Requests\StripeOrderRequest;
use App\Order;
use Exception;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CheckoutController extends Controller
{

    public function validateOrder(OrderRequest $request)
    {
        return response()->json(['success' => true]);
    }

    public function stripePayment(StripeOrderRequest $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $order = Order::createPending($request->order, $request->cart, 'stripe');

        $customer = Customer::create(array(
            'email' => $request->email,
            'source'  => $request->token,
        ));

        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $request->amount*100,
            'currency' => 'GBP'
        ));

        $order->confirm($charge['id']);

        return response()->json([
            'success' => true,
            'orderId' => $order->invoice,
        ]);
    }

    public function stripeSession(Request $request) {
        Stripe::setApiKey(config('services.stripe.secret'));

        $order = Order::createPending($request->order, $request->cart, 'stripe');

        $order->refresh();
        try {

            $session = Session::create([
                'payment_method_types' => ['card'],
                'client_reference_id' => $order->id,
                'line_items' => [[
                    'name' => 'KitchenIn Order #'.$order->id,
                    'amount' => $request->amount * 100,
                    'currency' => 'GBP',
                    'quantity' => 1,
                ]],
                'success_url' => env('APP_URL').'/thank-you' . '/' . $order->id,
                'cancel_url' => env('APP_URL').'/checkout'
            ]);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }

        return [
            'id' => $session->id
        ];
    }

    public function paypalCreateOrder(Request $request)
    {
        $ppClient = new PayPalClient;

        $ppClient->getAccessToken();

        $order = Order::createPending($request->order, $request->cart, 'paypal');

        // error_log('>>>>>>' . $order->id);

        $order->refresh();

        // error_log('>>>>>>' . $order->id);

        $ppOrder = $ppClient->createOrder([
                'intent' => 'CAPTURE',
                'order_id' => $order->id,
                'purchase_units' => [
                    [
                        'reference_id' => $order->id,
                        'amount' => [
                            'currency_code' => 'GBP',
                            'value' => number_format($request->amount, 2, '.', ',')
                        ]
                    ]
                ]
            ]);

        return [
            'paypal' => $ppOrder,
            'kin_order_id' => $order->id
        ];
    }

    public function pending(PendingOrderRequest $request)
    {
        $order = Order::createPending($request->order, $request->cart, 'paypal');
        return response()->json(['success' => true, 'pending_order_id' => $order->id]);
    }

    public function confirm(ConfirmOrderRequest $request)
    {
        $order = Order::findOrFail($request->id);

        if ($order->payment_method === 'paypal') {
            $ppClient = new PayPalClient;
            $ppClient->getAccessToken();
            $capture = $ppClient->capturePaymentOrder($request->payment_id);

            $order->confirm($capture['payments']['captures'][0]['id']);
        } else {
            $order->confirm($request->payment_id);
        }

        return response()->json([
            'success' => true,
            'orderId' => $order->invoice,
        ]);
    }

    public function quote(QuoteRequest $request)
    {
        $quoteFile = Order::generateQuote($request->order, $request->cart);

        return response()->json([
            'success' => true,
            'file' => $quoteFile,
        ]);
    }
}
