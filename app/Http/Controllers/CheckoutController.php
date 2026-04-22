<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }
        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|min:10',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index');
        }

        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        $order = Order::create([
            'user_id' => auth()->id(),
            'total'   => $total,
            'status'  => 'pending',
            'address' => $request->address,
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $productId,
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('order.success')->with('success', 'Order placed successfully!');
    }

    public function success()
    {
        return view('order-success');
    }
    public function myOrders()
{
    $orders = Order::where('user_id', auth()->id())
        ->with('items.product')
        ->latest()
        ->get();
    return view('my-orders', compact('orders'));
}
}