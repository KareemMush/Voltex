@extends('layouts.app')

@section('title', 'Products')

@section('content')
<h1>Products</h1>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p>Category: {{ $product->category->name ?? 'N/A' }}</p>
                <p>Price: ${{ number_format($product->price, 2) }}</p>
                <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{ $products->links() }}
@endsection
