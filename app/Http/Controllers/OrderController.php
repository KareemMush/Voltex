<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('orderItems')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }


    public function show(Order $order)
    {
        // Ensure user owns the order
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }

   public function store(Request $request)
{
    $user = auth()->user();

    $cartItems = $user->cartItems()->with('product')->get();

    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    // حساب السعر الكلي
    $totalPrice = 0;
    foreach ($cartItems as $item) {
        $totalPrice += $item->quantity * $item->product->price;
    }

    $order = Order::create([
        'user_id' => $user->id,
        'full_name' => $user->name,
        'address' => $user->address ?? '',
        'phone' => $user->phone ?? '',
        'status' => 'pending',
        'total_price' => $totalPrice, // تأكد ان العمود موجود بالـ migration وبالـ model
    ]);

    foreach ($cartItems as $item) {
        $order->orderItems()->create([
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price_at_order_time' => $item->product->price,
        ]);
    }

    $user->cartItems()->delete();

    return redirect()->route('orders.show', $order)->with('success', 'Order placed successfully.');
}




}
