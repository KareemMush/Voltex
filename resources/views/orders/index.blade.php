@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<h1>My Orders</h1>

@if($orders->isEmpty())
    <p>You have no orders yet.</p>
@else
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Order ID</th><th>Status</th><th>Total Price</th><th>Created At</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->status }}</td>
            <td>${{ number_format($order->orderItems->sum(function($item) {
    return $item->price_at_order_time * $item->quantity;
}), 2) }}</td>

            <td>{{ $order->created_at->format('d M Y H:i') }}</td>


            <td>
                <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
