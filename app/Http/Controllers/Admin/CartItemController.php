<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartItem;

class CartItemController extends Controller
{
    public function index()
    {
        $items = CartItem::with('user', 'product')->latest()->paginate(10);
        return view('admin.cart-items.index', compact('items'));
    }

    public function show(CartItem $cartItem)
    {
        return view('admin.cart-items.show', compact('cartItem'));
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('admin.cart-items.index');
    }
}
