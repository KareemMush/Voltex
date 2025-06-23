@extends('layouts.app')

@section('title', 'Order #' . $order->id)

@section('content')
<h1>Order #{{ $order->id }}</h1>

<ul class="list-group">
    <li class="list-group-item"><strong>Status:</strong> {{ $order->status }}</li>
    <li class="list-group-item"><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</li>
    <li class="list-group-item"><strong>Created at:</strong> {{ $order->created_at->format('d M Y H:i') }}</li>
</ul>

<h3 class="mt-4">Order Items</h3>
<table class="table table-bordered">
    <thead>
        <tr><th>Product</th><th>Quantity</th><th>Price</th><th>Total</th></tr>
    </thead>
    <tbody>
        @foreach($order->orderItems as $item)
        <tr>
            <td>{{ $item->product->name ?? 'N/A' }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ number_format($item->price_at_order_time, 2) }}</td>
            <td>${{ number_format($item->price_at_order_time * $item->quantity, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
@endsection
