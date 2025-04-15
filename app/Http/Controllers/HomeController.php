<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        return view('angular-index', [
            // 'stripeKey' => config('services.stripe.key'),
            // 'paypal' => config('services.paypal'),
        ]);
    }
}
