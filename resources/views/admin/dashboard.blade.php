@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Welcome to Admin Dashboard</h1>
    <p>Here you can manage users, categories, products, and orders.</p>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $usersCount ?? '0' }}</h5>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light">Manage Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $categoriesCount ?? '0' }}</h5>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-light">Manage Categories</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $productsCount ?? '0' }}</h5>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light">Manage Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $ordersCount ?? '0' }}</h5>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-light">Manage Orders</a>
                </div>
            </div>
        </div>
    </div>
@endsection
