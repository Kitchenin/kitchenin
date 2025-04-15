<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        return view('admin.order.index');
    }

    public function listAll()
    {
        $orders = Order::with('products')->orderBy('id', 'desc')->get();
        return view('admin.order.list', [
            'orders' => $orders
        ]);
    }

    public function edit(Order $order)
    {

        return view('admin/order/form', [
            'formTitle' => 'Review Order #'. $order->id . ' / ' . $order->getDate(),
            'formUrl' => 'admin/orders/'.$order->id,
            'item' => $order,
            'products' => $order->products()->get(),
            'statuses' => Order::$STATUSES,
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->all();

        $data['review'] = isset($data['review']) ? $data['review'] : 0;

        $order->update($data);

        return response()->json(['message' => ['Order is successfully updated!']]);
    }

}
