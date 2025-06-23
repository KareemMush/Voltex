@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<h2>Edit Profile</h2>

<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            class="form-control @error('name') is-invalid @enderror" 
            value="{{ old('name', auth()->user()->name) }}" 
            required
        >
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input 
            type="email" 
            name="email" 
            id="email" 
            class="form-control @error('email') is-invalid @enderror" 
            value="{{ old('email', auth()->user()->email) }}" 
            required
        >
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>
@endsection
