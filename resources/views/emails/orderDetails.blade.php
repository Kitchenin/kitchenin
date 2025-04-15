<p style="margin: 30px 0;">Order reference: <b>{{ $order->invoice }}</b></p>

<table class="table table-striped table-condensed" style="margin-top: 30px; width: 100%;">
    <tr>
        <td style="padding-right: 30px; vertical-align: top;" width="380">
            <table class="table table-striped table-condensed" style="width: 100%;">
                <thead>
                    <tr>
                        <th colspan="2">Shipping information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td style="vertical-align: top;">First name</td><td>{{ $order->shipping_first_name }}</td></tr>
                    <tr><td style="vertical-align: top;">Last name</td><td>{{ $order->shipping_last_name }}</td></tr>
                    <tr><td style="vertical-align: top;">Phone</td><td>{{ $order->shipping_phone }}</td></tr>
                    <tr><td style="vertical-align: top;">Email</td><td>{{ $order->email }}</td></tr>
                    <tr><td style="vertical-align: top;">Company name</td><td>{{ $order->shipping_company_name }}</td></tr>
                    <tr><td style="vertical-align: top;">Address Line 1</td><td>{{ $order->shipping_address1 }}</td></tr>
                    <tr><td style="vertical-align: top;">Address Line 2</td><td>{{ $order->shipping_address2 }}</td></tr>
                    <tr><td style="vertical-align: top;">City</td><td>{{ $order->shipping_city }}</td></tr>
                    <tr><td style="vertical-align: top;">County</td><td>{{ $order->shipping_county }}</td></tr>
                    <tr><td style="vertical-align: top;">Postcode</td><td>{{ $order->shipping_postcode }}</td></tr>
                </tbody>
            </table>
        </td>
        <td>
            &nbsp;
        </td>
        <td style="padding-left: 30px; vertical-align: top;" width="380">
            <table class="table table-striped table-condensed" style="width: 100%;">
                <thead>
                    <tr>
                        <th colspan="2">Billing information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td style="vertical-align: top;">First name</td><td>{{ $order->billing_first_name }}</td></tr>
                    <tr><td style="vertical-align: top;">Last name</td><td>{{ $order->billing_last_name }}</td></tr>
                    <tr><td style="vertical-align: top;">Phone</td><td>{{ $order->billing_phone }}</td></tr>
                    <tr><td style="vertical-align: top;">Company name</td><td>{{ $order->billing_company_name }}</td></tr>
                    <tr><td style="vertical-align: top;">Address Line 1</td><td>{{ $order->billing_address1 }}</td></tr>
                    <tr><td style="vertical-align: top;">Address Line 2</td><td>{{ $order->billing_address2 }}</td></tr>
                    <tr><td style="vertical-align: top;">City</td><td>{{ $order->billing_city }}</td></tr>
                    <tr><td style="vertical-align: top;">County</td><td>{{ $order->billing_county }}</td></tr>
                    <tr><td style="vertical-align: top;">Postcode</td><td>{{ $order->billing_postcode }}</td></tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>

<table class="table table-hover table-bordered table-striped" style="margin-top: 30px; width: 100%;">
    <thead>
        <tr>
            <th style="text-align: left;">Name</th>
            <th>Quantity</th>
            <th style="text-align: right;">Price</th>
        </tr>
    </thead>
    <tbody>
    @foreach($order->products()->get() as $product)
        <tr>
            <td style="padding-bottom: 30px;">
                <b style="font-size: 17px;">{{ $product->name }}</b>
                @if ($product->pivot->sample)
                    <b>SAMPLE</b><br />
                @endif
                @if ($product->pivot->ending())
                    <br /><b>Ending:</b> {{ $product->pivot->ending()->name }}
                @endif
                @if ($product->pivot->colour())
                    <br /><b>Colour:</b> {{ $product->pivot->colour()->name }}
                @endif
                @if ($product->pivot->option())
                    <br /><b>Option:</b> {{ $product->pivot->option()->name }}
                @endif
                @if ($product->pivot->custom_size)
                    <br /><b>Custom Size:</b> {{ $product->pivot->custom_size }}
                @endif
                @if ($product->pivot->position)
                    <br /><b>Position:</b> {{ $product->pivot->position }}
                @endif
                @if ($product->pivot->hinge_side)
                    <br /><b>Hinge Drill:</b> {{ $product->pivot->hinge_side }}
                    @if ($product->pivot->hinge_top)
                        <br /><b>Top Drill:</b> {{ $product->pivot->hinge_top }}mm
                    @endif
                    @if ($product->pivot->hinge_bottom)
                        <br /><b>Bottom Drill:</b> {{ $product->pivot->hinge_bottom }}mm
                    @endif
                    @if ($product->pivot->hinge_left)
                        <br /><b>Left Drill:</b> {{ $product->pivot->hinge_left }}mm
                    @endif
                    @if ($product->pivot->hinge_right)
                        <br /><b>Right Drill:</b> {{ $product->pivot->hinge_right }}mm
                    @endif
                    @if ($product->pivot->hinge_center)
                        <br /><b>Center Drills:</b> {{ $product->pivot->hinge_center }}
                    @endif
                @endif
            </td>
            <td style="text-align: center; vertical-align: top;">{{ $product->pivot->quantity }}</td>
            <td style="text-align: right; vertical-align: top;">£{{ number_format($product->pivot->price, 2, '.', ',') }}</td>
        </tr>

    @endforeach
    </tbody>
    <tfoot align="right">
        <tr>
            <th colspan="2" align="right">Subtotal:</th>
            <th>&pound;{{ $order->getTotalPrice() }}</th>
        </tr>
        <tr>
            <th colspan="2" align="right">Delivery:</th>
            <th>&pound;{{ $order->getDeliveryPrice() }}</th>
        </tr>
        <tr>
            <th colspan="2" align="right">VAT content on this order:</th>
            <th>&pound;{{ number_format($order->getFinalPrice(false) * 0.2 / 1.2, 2, '.', ',') }}</th>
        </tr>
        <tr>
            <th colspan="2" align="right">Total:</th>
            <th>&pound;{{ $order->getFinalPrice() }}</th>
        </tr>
    </tfoot>
</table>

<br />
@if ($order->additional_info)
    <br />
    <b>Additional Information: {{ $order->additional_info }}</b>
    <br /><br />
@endif

<b>Payment Method</b>: {{ ucfirst($order->payment_method) }}<br />
