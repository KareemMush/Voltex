@extends('layouts.app')

@section('title', $product->name)

@section('content')
<h1>{{ $product->name }}</h1>

<p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
<p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
<p><strong>Description:</strong></p>
<p>{{ $product->description }}</p>

<form action="{{ route('cart-items.store') }}" method="POST" class="mt-3">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input id="quantity" name="quantity" type="number" min="1" value="1" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Add to Cart</button>
</form>

<a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
@endsection
