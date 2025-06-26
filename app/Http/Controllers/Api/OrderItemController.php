<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;

class OrderItemController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->role === 'admin') {
            $orderItems = OrderItem::all();
        } else {
            $orderItems = OrderItem::whereHas('order', function ($query) use ($request) {
                $query->where('user_id', $request->user()->id);
            })->get();
        }

        return response()->json($orderItems);
    }

    public function show(Request $request, $id)
    {
        $orderItem = OrderItem::where('id', $id)
            ->when($request->user()->role !== 'admin', function ($query) use ($request) {
                $query->whereHas('order', function ($q) use ($request) {
                    $q->where('user_id', $request->user()->id);
                });
            })->firstOrFail();

        return response()->json($orderItem);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price_at_order_time' => 'required|numeric|min:0',
        ]);

        $order = $request->user()->role === 'admin' ? 
            Order::findOrFail($request->order_id) :
            Order::where('id', $request->order_id)
                ->where('user_id', $request->user()->id)
                ->firstOrFail();

        $orderItem = OrderItem::create($request->all());

        return response()->json([
            'message' => 'Order item created successfully.',
            'orderItem' => $orderItem,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::where('id', $id)
            ->when($request->user()->role !== 'admin', function ($query) use ($request) {
                $query->whereHas('order', function ($q) use ($request) {
                    $q->where('user_id', $request->user()->id);
                });
            })->firstOrFail();

        $request->validate([
            'order_id' => 'sometimes|required|exists:orders,id',
            'product_id' => 'sometimes|required|exists:products,id',
            'quantity' => 'sometimes|required|integer|min:1',
            'price_at_order_time' => 'sometimes|required|numeric|min:0',
        ]);

        if ($request->has('order_id')) {
            $order = $request->user()->role === 'admin' ?
                \App\Models\Order::findOrFail($request->order_id) :
                \App\Models\Order::where('id', $request->order_id)
                    ->where('user_id', $request->user()->id)
                    ->firstOrFail();
        }

        $orderItem->update($request->all());

        return response()->json([
            'message' => 'Order item updated successfully.',
            'orderItem' => $orderItem,
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $orderItem = OrderItem::where('id', $id)
            ->when($request->user()->role !== 'admin', function ($query) use ($request) {
                $query->whereHas('order', function ($q) use ($request) {
                    $q->where('user_id', $request->user()->id);
                });
            })->firstOrFail();

        $orderItem->delete();

        return response()->json([
            'message' => 'Order item deleted successfully.',
        ]);
    }
}
