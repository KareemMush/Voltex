<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->role === 'admin') {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', $request->user()->id)->get();
        }

        return response()->json($orders);
    }

    public function show(Request $request, $id)
    {
        $order = Order::where('id', $id)
            ->when($request->user()->role !== 'admin', function ($query) use ($request) {
                $query->where('user_id', $request->user()->id);
            })->firstOrFail();

        return response()->json($order);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
            'total_price' => 'required|numeric|min:0',
        ]);

        $order = Order::create([
            'user_id' => $request->user()->id,
            'status' => $request->status,
            'total_price' => $request->total_price,
        ]);

        return response()->json([
            'message' => 'Order created successfully.',
            'order' => $order,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)
            ->when($request->user()->role !== 'admin', function ($query) use ($request) {
                $query->where('user_id', $request->user()->id);
            })->firstOrFail();

        $request->validate([
            'status' => 'sometimes|required|string',
            'total_price' => 'sometimes|required|numeric|min:0',
        ]);

        $order->update($request->only('status', 'total_price'));

        return response()->json([
            'message' => 'Order updated successfully.',
            'order' => $order,
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $order = Order::where('id', $id)
            ->when($request->user()->role !== 'admin', function ($query) use ($request) {
                $query->where('user_id', $request->user()->id);
            })->firstOrFail();

        $order->delete();

        return response()->json([
            'message' => 'Order deleted successfully.',
        ]);
    }
}
