<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    public function index()
    {
        $items = OrderItem::whereHas('order', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('product')->get();

        return view('order-items.index', compact('items'));
    }
}
