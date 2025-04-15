<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET')
    ],

    'paypal' => [
        'env'    => env('APP_ENV') == 'live' ? 'live' : 'sandbox',
        'key'    => env('APP_ENV') == 'live' ? env('PAYPAL_LIVE_CLIENT_ID') : env('PAYPAL_SANDBOX_CLIENT_ID'),
        'secret' => env('APP_ENV') == 'live' ? env('PAYPAL_LIVE_CLIENT_SECRET') : env('PAYPAL_SANDBOX_CLIENT_SECRET'),
    ],

];
