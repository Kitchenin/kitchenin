<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kitchenin Invoice</title>

    <style>
        html, body {
            margin: 0;
            padding: 0;
        }

        @page {
            header: page-header;
            footer: page-footer;

            margin-top: 200px;
            margin-bottom: 150px;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .total {
            text-align: right;
        }

        @media (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

    </style>
</head>

<body>

<htmlpageheader name="page-header">
    <div class="invoice-box header">
        <table cellpadding="0" cellspacing="0" style="width: 100%;">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="/assets/img/logo.svg" style="width:100%; max-width:300px;">
                            </td>

                            <td>
                                <br />
                                Invoice #: {{ $order->invoice }}<br />
                                Date: {{ $order->getDate() }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</htmlpageheader>

<htmlpagefooter name="page-footer">
    <div class="footer" style="text-align: center; position: absolute; bottom: 40px; left:0; width:100%;">
        <p style="font-size: 12px;">
            KITCHENIN is a trading name of RBS Interiors UK Ltd. Registered in England & Wales Company<br />
            Reg. No 06416851, Vat Reg. No 944166317. 103 Corran Way, South Ockendon, Essex, RM15 6AP<br />
            ({PAGENO})
        </p>
    </div>
</htmlpagefooter>

<div class="invoice-box">
    <table cellpadding="0" cellspacing="0" style="width: 100%;">
        <tr class="information">
            <td colspan="4">
                <table>
                    <tr>
                        <td>
                            <h3>Shipping details</h3>
                            {{ $order->shipping_first_name }} {{ $order->shipping_last_name }}<br />
                            {{ $order->shipping_address1 }}<br />
                            @if ($order->shipping_address2)
                                {{ $order->shipping_address2 }}<br />
                            @endif
                            {{ $order->shipping_city }}<br />
                            {{ $order->shipping_county }}<br />
                            {{ $order->shipping_postcode }}<br />
                            {{ $order->shipping_phone }}<br />
                            {{ $order->email }}
                        </td>

                        <td>
                            <h3>Billing details:</h3>
                            @if ($order->billing_company_name)
                                {{ $order->billing_company_name }}<br />
                            @endif
                            {{ $order->billing_first_name }} {{ $order->billing_last_name }}<br />
                            {{ $order->billing_address1 }}<br />
                            @if ($order->billing_address2)
                                {{ $order->billing_address2 }}<br />
                            @endif
                            {{ $order->billing_city }}<br />
                            {{ $order->billing_county }}<br />
                            {{ $order->billing_postcode }}<br />
                            {{ $order->billing_phone }}<br />
                            {{ $order->email }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td colspan="4">
                Payment Method
            </td>
        </tr>

        <tr class="details">
            <td colspan="4">
                {{ ucfirst($order->payment_method) }}
            </td>
        </tr>

        <tr class="heading">
            <td>Product</td>
            <td>Quantity</td>
            <td>Single Price</td>
            <td>Total Price</td>
        </tr>

        @foreach ($order->products()->get() as $product)
            <tr class="item">
                <td>
                    {{ $product->name }}
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
                <td style="text-align: center;">{{ $product->pivot->quantity }}</td>
                <td style="text-align: right;">£{{ number_format($product->pivot->price, 2, '.', ',') }}</td>
                <td style="text-align: right;">£{{ number_format($product->pivot->price * $product->pivot->quantity, 2, '.', ',') }}</td>
            </tr>
        @endforeach


        <tr class="total">
            <td colspan="2"></td>
            <td>Subtotal:</td>
            <td>£{{ $order->getTotalPrice() }}</td>
        </tr>

        <tr class="total">
            <td colspan="2"></td>
            <td>Delivery</td>
            <td>£{{ $order->getDeliveryPrice() }}</td>
        </tr>

        <tr class="total">
            <td colspan="2"></td>
            <td>VAT content on this order:</td>
            <td>£{{ number_format($order->getFinalPrice(false) * 0.2 / 1.2, 2, '.', ',') }}</td>
        </tr>

        <tr class="total">
            <td colspan="2"></td>
            <td>Total</td>
            <td>£{{ $order->getFinalPrice() }}</td>
        </tr>
    </table>

    <div style="text-align: center;">
        <h2 style="margin: 60px 0 30px;">Thank you for your order</h2>
    </div>

</div>
</body>
</html>
