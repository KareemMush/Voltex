<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a href="{{ route('admin.users.index') }}" class="nav-link">Users</a></li>
                <li class="nav-item"><a href="{{ route('admin.categories.index') }}" class="nav-link">Categories</a></li>
                <li class="nav-item"><a href="{{ route('admin.products.index') }}" class="nav-link">Products</a></li>
                <li class="nav-item"><a href="{{ route('admin.orders.index') }}" class="nav-link">Orders</a></li>
                <!-- <li class="nav-item"><a href="{{ route('admin.order-items.index') }}" class="nav-link">Order Items</a></li>
                <li class="nav-item"><a href="{{ route('admin.cart-items.index') }}" class="nav-link">Cart Items</a></li> -->
            </ul>
            <ul class="navbar-nav ms-auto">
                <!-- <li class="nav-item"><a href="{{ route('profile.edit') }}" class="nav-link">Profile</a></li> -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-link nav-link" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
