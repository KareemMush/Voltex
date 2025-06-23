@extends('layouts.admin')

@section('title', 'Product Details')

@section('content')
<h1>Product Details</h1>

<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $product->id }}</li>
    <li class="list-group-item"><strong>Name:</strong> {{ $product->name }}</li>
    <li class="list-group-item"><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</li>
    <li class="list-group-item"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</li>
    <li class="list-group-item"><strong>Description:</strong> {{ $product->description }}</li>
    <li class="list-group-item"><strong>Created at:</strong> {{ $product->created_at->format('d M Y') }}</li>
</ul>

<a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
@endsection
