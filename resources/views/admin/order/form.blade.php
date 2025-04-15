@extends('admin.partials.form')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-md-4">
                    <b>Total Price: £{{ $item->getFinalPrice() }}</b>
                </div>
                <div class="col-md-4">
                    <label for="status">Status:</label>
                    <select name="status" class="form-control" id="status" >
                        @foreach ($statuses as $status)
                            <option value="{{ $status }}" {{ $item->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="review">Send Review Email:</label>
                    <input type="checkbox" name="review" id="review" value="1" {{ $item->review ? 'checked' : '' }} />
                </div>
            </div>

            @if ($item->additional_info)
                <div class="row">
                    <div class="col-md-12">
                        <b>Additional Information: {{ $item->additional_info }}</b>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <b>Items Price: £{{ $item->getTotalPrice() }}</b>
                </div>
                <div class="col-md-4">
                    <b>Delivery Price: £{{ $item->getDeliveryPrice() }}</b>
                </div>
                <div class="col-md-4">
                    <b>Total Price: £{{ $item->getFinalPrice() }}</b>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <b>Payment Method</b>: {{ $item->payment_method }}
                </div>
                <div class="col-md-4">
                    <b>Payment ID</b>: {{ $item->payment_id }}
                </div>
                <div class="col-md-4">
                    <b>Invoice</b>: <a href="/invoices/{{ $item->invoice }}.pdf" target="_blank">{{ $item->invoice }}</a>
                </div>

            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">

                <div class="col-md-6">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th colspan="2">Shipping</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr><td>First name</td><td>{{ $item->shipping_first_name }}</td></tr>
                            <tr><td>Last name</td><td>{{ $item->shipping_last_name }}</td></tr>
                            <tr><td>Company name</td><td>{{ $item->shipping_company_name }}</td></tr>
                            <tr><td>County</td><td>{{ $item->shipping_county }}</td></tr>
                            <tr><td>City</td><td>{{ $item->shipping_city }}</td></tr>
                            <tr><td>Postcode</td><td>{{ $item->shipping_postcode }}</td></tr>
                            <tr><td>Address Line 1</td><td>{{ $item->shipping_address1 }}</td></tr>
                            <tr><td>Address Line 2</td><td>{{ $item->shipping_address2 }}</td></tr>
                            <tr><td>Phone</td><td>{{ $item->shipping_phone }}</td></tr>
                            <tr><td>Email</td><td>{{ $item->email }}</td></tr>

                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-striped table-condensed">
                        <thead>
                        <tr>
                            <th colspan="2">Billing</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr><td>First name</td><td>{{ $item->billing_first_name }}</td></tr>
                            <tr><td>Last name</td><td>{{ $item->billing_last_name }}</td></tr>
                            <tr><td>Company name</td><td>{{ $item->billing_company_name }}</td></tr>
                            <tr><td>County</td><td>{{ $item->billing_county }}</td></tr>
                            <tr><td>City</td><td>{{ $item->billing_city }}</td></tr>
                            <tr><td>Postcode</td><td>{{ $item->billing_postcode }}</td></tr>
                            <tr><td>Address Line 1</td><td>{{ $item->billing_address1 }}</td></tr>
                            <tr><td>Address Line 2</td><td>{{ $item->billing_address2 }}</td></tr>
                            <tr><td>Phone</td><td>{{ $item->billing_phone }}</td></tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><i class="fa fa-camera pull-right hidden-xs"></i> Pic</th>
                            <th><i class="fa fa-cube pull-right hidden-xs"></i> Name</th>
                            <th><i class="fa fa-cog pull-right hidden-xs"></i> Options</th>
                            <th><i class="fa fa-star pull-right hidden-xs"></i> Quantity</th>
                            <th><i class="fa fa-money pull-right hidden-xs"></i> Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><img src="{{ $product->getFirstPhoto() }}" class="admin-thumbnail" /></td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if ($product->pivot->sample)
                                    <b>SAMPLE</b><br />
                                @endif
                                @if ($product->pivot->ending())
                                    <b>Ending:</b> {{ $product->pivot->ending()->name }}<br />
                                @endif
                                @if ($product->pivot->colour())
                                    <b>Colour:</b> {{ $product->pivot->colour()->name }}<br />
                                @endif
                                @if ($product->pivot->option())
                                    <b>Option:</b> {{ $product->pivot->option()->name }}<br />
                                @endif
                                @if ($product->pivot->custom_size)
                                    <b>Custom Size:</b> {{ $product->pivot->custom_size }}<br />
                                @endif
                                @if ($product->pivot->position)
                                    <b>Position:</b> {{ $product->pivot->position }}<br />
                                @endif
                                @if ($product->pivot->hinge_side)
                                    <b>Hinge Drill:</b> {{ $product->pivot->hinge_side }}<br />
                                    @if ($product->pivot->hinge_top)
                                        <b>Top Drill:</b> {{ $product->pivot->hinge_top }}mm<br />
                                    @endif
                                    @if ($product->pivot->hinge_bottom)
                                        <b>Bottom Drill:</b> {{ $product->pivot->hinge_bottom }}mm<br />
                                    @endif
                                    @if ($product->pivot->hinge_left)
                                        <b>Left Drill:</b> {{ $product->pivot->hinge_left }}mm<br />
                                    @endif
                                    @if ($product->pivot->hinge_right)
                                        <b>Right Drill:</b> {{ $product->pivot->hinge_right }}mm<br />
                                    @endif

                                    @if ($product->pivot->hinge_center)
                                        <b>Center Drills:</b> {{ $product->pivot->hinge_center }}<br />
                                    @endif
                                @endif
                            </td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>£{{ number_format($product->pivot->price, 2, '.', ',') }}</td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" align="right">Subtotal:</th>
                            <th>&pound;{{ $item->getTotalPrice() }}</th>
                        </tr>
                        <tr>
                            <th colspan="4" align="right">Delivery:</th>
                            <th>&pound;{{ $item->getDeliveryPrice() }}</th>
                        </tr>
                        <tr>
                            <th colspan="4" align="right">VAT content on this order:</th>
                            <th>&pound;{{ number_format($item->getFinalPrice(false) * 0.2 / 1.2, 2, '.', ',') }}</th>
                        </tr>
                        <tr>
                            <th colspan="4" align="right">Total:</th>
                            <th>&pound;{{ $item->getFinalPrice() }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>


@endsection
