@extends('layouts.admin')

@section('title', 'Category Details')

@section('content')
<h1>Category Details</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $category->name }}</h5>
        <p class="card-text"><strong>ID:</strong> {{ $category->id }}</p>
        <p class="card-text"><strong>Created at:</strong> {{ $category->created_at->format('d M Y') }}</p>
        <p class="card-text"><strong>Updated at:</strong> {{ $category->updated_at->format('d M Y') }}</p>
    </div>
</div>

<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mt-3">Back to Categories</a>
@endsection
