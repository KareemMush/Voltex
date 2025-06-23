@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<h1>Edit Product</h1>

<form action="{{ route('admin.products.update', $product) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name', $product->name) }}">
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input id="price" name="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" required value="{{ old('price', $product->price) }}">
        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
