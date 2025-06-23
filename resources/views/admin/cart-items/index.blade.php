@extends('layouts.app')

@section('content')
<h1>My Cart</h1>

@if($cartItems->isEmpty())
    <p>Your cart is empty.</p>
@else
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th><th>Quantity</th><th>Price</th><th>Total</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cartItems as $item)
        <tr>
            <td>{{ $item->product->name ?? 'N/A' }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ number_format($item->product->price ?? 0, 2) }}</td>
            <td>${{ number_format(($item->product->price ?? 0) * $item->quantity, 2) }}</td>
            <td>
                <form action="{{ route('cart-items.destroy', $item) }}" method="POST" onsubmit="return confirm('Remove this item?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Process Order</button>
</form>
@endif
@endsection
