@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<h1>Products</h1>
<a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th><th>Name</th><th>Category</th><th>Price</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><a href="{{ route('admin.products.show', $product) }}">{{ $product->name }}</a></td>
            <td>{{ $product->category->name ?? 'N/A' }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links() }}
@endsection
