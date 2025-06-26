<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;

class CartItemController extends Controller
{
    public function index(Request $request)
    {
        $cartItems = CartItem::where('user_id', $request->user()->id)->get();
        return response()->json($cartItems);
    }


    public function show($id)
    {
        $cartItem = CartItem::findOrFail($id);
        return response()->json($cartItem);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::updateOrCreate(
            [
                'user_id' => $request->user()->id,
                'product_id' => $request->product_id,
            ],
            [
                'quantity' => $request->quantity,
            ]
        );

        return response()->json([
            'message' => 'Cart item added/updated successfully.',
            'cartItem' => $cartItem,
        ], 201);
    }


    public function update(Request $request, $id)
    {
        $cartItem = CartItem::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        $request->validate([
            'quantity' => 'sometimes|required|integer|min:1',
        ]);

        $cartItem->update($request->only('quantity'));

        return response()->json([
            'message' => 'Cart item updated successfully.',
            'cartItem' => $cartItem,
        ]);
    }


    public function destroy(Request $request, $id)
    {
        $cartItem = CartItem::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        $cartItem->delete();

        return response()->json([
            'message' => 'Cart item deleted successfully.',
        ]);
    }

}
