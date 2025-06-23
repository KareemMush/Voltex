@extends('layouts.admin')

@section('title', 'Edit Order')

@section('content')
<h1>Edit Order</h1>

<form action="{{ route('admin.orders.update', $order) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select id="user_id" name="user_id" class="form-select @error('user_id') is-invalid @enderror" required>
            <option value="">Select User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ (old('user_id', $order->user_id) == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
        @error('user_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input id="status" name="status" type="text" class="form-control @error('status') is-invalid @enderror" required value="{{ old('status', $order->status) }}">
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="price_at_order_time" class="form-label">Price at Order Time</label>
        <input id="price_at_order_time" name="price_at_order_time" type="number" step="0.01" class="form-control @error('price_at_order_time') is-invalid @enderror" required value="{{ old('price_at_order_time', $order->price_at_order_time ?? '') }}">
        @error('price_at_order_time')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>


    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
