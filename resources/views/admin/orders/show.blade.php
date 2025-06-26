@extends('layouts.admin')

@section('title', 'Order Details')

@section('content')
<h1>Order Details</h1>

<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $order->id }}</li>
    <li class="list-group-item"><strong>User:</strong> {{ $order->user->name ?? 'N/A' }}</li>
    <li class="list-group-item"><strong>Status:</strong> {{ $order->status }}</li>
    <li class="list-group-item"><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</li>
    <li class="list-group-item"><strong>Created at:</strong> {{ $order->created_at->format('d M Y H:i') }}</li>
</ul>

<a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
@endsection
