@extends('emails.layout')

@section('content')
    <h2>Your order has been received</h2>
    Hello, {{ $order->billing_first_name }} {{ $order->billing_last_name }},<br />
    Your order to Kitchenin has been received. You are receiving this email as a confirmation of the ordered products and your shipping and billing data. <br />
    Please look at the information below and if you notice anything wrong, contact us.<br />

    @include('emails.orderDetails', ['order' => $order])

    <br /><br />

    <b>You will find the invoice, attached to this email.</b>

    <br /><br />

    Thank you for using our services.

    <br /><br /><br /><br />
@endsection
