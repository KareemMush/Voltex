@extends('layouts.admin')

@section('title', 'Order Items')

@section('content')
<h1>Order Items</h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th><th>Order ID</th><th>Product</th><th>Quantity</th><th>Price</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orderItems as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->order_id }}</td>
            <td>{{ $item->product->name ?? 'N/A' }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ number_format($item->price, 2) }}</td>
            <td>
                <a href="{{ route('admin.order-items.show', $item) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('admin.order-items.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                <form method="POST" action="{{ route('admin.order-items.destroy', $item) }}" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $orderItems->links() }}
@endsection
