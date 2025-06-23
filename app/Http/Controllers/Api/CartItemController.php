<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;

class CartItemController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::all();
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
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::create($request->all());

        return response()->json([
            'message' => 'Cart item added successfully.',
            'cartItem' => $cartItem,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);

        $request->validate([
            'user_id' => 'sometimes|required|exists:users,id',
            'product_id' => 'sometimes|required|exists:products,id',
            'quantity' => 'sometimes|required|integer|min:1',
        ]);

        $cartItem->update($request->all());

        return response()->json([
            'message' => 'Cart item updated successfully.',
            'cartItem' => $cartItem,
        ]);
    }

    public function destroy($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        return response()->json([
            'message' => 'Cart item deleted successfully.',
        ]);
    }
}
