<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:15',
            'total_price' => 'required|numeric',
            'status' => 'required|string|in:pending,completed,canceled',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được thêm!');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:15',
            'total_price' => 'required|numeric',
            'status' => 'required|string|in:pending,completed,canceled',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được cập nhật!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã bị xóa!');
    }
}
