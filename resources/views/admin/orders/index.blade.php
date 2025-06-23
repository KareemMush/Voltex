@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<h1>Orders</h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th><th>User</th><th>Status</th><th>Total</th><th>Created At</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name ?? 'N/A' }}</td>
            <td>{{ $order->status }}</td>
            <td>${{ number_format($order->price_at_order_time, 2) }}</td>
            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
            <td>
                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-sm btn-warning">Edit</a>
                <form method="POST" action="{{ route('admin.orders.destroy', $order) }}" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $orders->links() }}
@endsection
