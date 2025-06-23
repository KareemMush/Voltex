@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
<h1>User Details</h1>

<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $user->id }}</li>
    <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
    <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
    <li class="list-group-item"><strong>Role:</strong> {{ ucfirst($user->role) }}</li>
    <li class="list-group-item"><strong>Created at:</strong> {{ $user->created_at->format('d M Y') }}</li>
</ul>

<a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Back to Users</a>
@endsection
