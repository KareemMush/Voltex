@extends('layouts.app')

@section('title', $category->name)

@section('content')
<h1>Products in {{ $category->name }}</h1>

<div class="row">
    @forelse($category->products as $product)
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p>Price: ${{ number_format($product->price, 2) }}</p>
                <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Details</a>
            </div>
        </div>
    </div>
    @empty
    <p>No products found in this category.</p>
    @endforelse
</div>

<a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
@endsection
