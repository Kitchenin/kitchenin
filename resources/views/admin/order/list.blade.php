<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th><i class="fa fa-bolt pull-right hidden-xs"></i> ID</th>
                <th><i class="fa fa-user pull-right hidden-xs"></i> Client Name</th>
                <th><i class="fa fa-money pull-right hidden-xs"></i> Price</th>
                <th><i class="fa fa-cog pull-right hidden-xs"></i> Status</th>
                <th><i class="fa fa-credit-card pull-right hidden-xs"></i> Payment Method</th>
                <th><i class="fa fa-file-text-o pull-right hidden-xs"></i> Invoice</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr href="/admin/orders/{{ $order->id }}" class="btn-form">
                <td>#{{ $order->id }} {{ $order->getDate() }}</td>
                <td>{{ $order->shipping_first_name }} {{ $order->shipping_last_name }}</td>
                <td>£{{ $order->getFinalPrice() }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->invoice }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
