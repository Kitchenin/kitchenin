@extends('emails.layout')

@section('content')
    <h2>Please review our services</h2>
    Hello, {{ $order->billing_first_name }} {{ $order->billing_last_name }},
    We hope you are satisfied with your order from Kitchenin. <br />
    Please take a few minutes to rate our services at <a href="https://uk.trustpilot.com/evaluate/kitchenin.co.uk" target="_blank">Trustpilot</a>.<br />

    <br /><br />

    Thank you for using our services.
@endsection
