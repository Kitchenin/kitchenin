@extends('emails.layout')

@section('content')
    <h2>New order received</h2>
    Hello,<br />
    There is a new order received from the Kitchenin website.<br />
    The order information is below:<br />

    @include('emails.orderDetails', ['order' => $order])

    <br /><br />

    <b>You will find the invoice, attached to this email.</b>

@endsection
