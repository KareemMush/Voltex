@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mt-4">
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        <p>Browse products and shop now.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Shop Now</a>
    </div>
@endsection
