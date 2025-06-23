<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;

class OrderItemController extends Controller
{
    public function index()
    {
        $items = OrderItem::with('order', 'product')->latest()->paginate(10);
        return view('admin.order-items.index', compact('items'));
    }

    public function show(OrderItem $orderItem)
    {
        return view('admin.order-items.show', compact('orderItem'));
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('admin.order-items.index');
    }
}
