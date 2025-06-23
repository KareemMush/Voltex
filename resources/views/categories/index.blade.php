@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<h1>Categories</h1>
<div class="row">
    @foreach($categories as $category)
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <a href="{{ route('categories.show', $category) }}" class="btn btn-primary">View Products</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
