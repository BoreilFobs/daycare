@extends('layouts.auth')

@section('title', 'Confirm Password')

@section('content')
<h2>Confirm Password</h2>
<p class="subtitle">This is a secure area. Please confirm your password before continuing.</p>

<!-- Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <!-- Password -->
    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-wrapper">
            <input id="password" type="password" class="form-control" name="password" placeholder="••••••••" required>
            <i class="fas fa-lock"></i>
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn-login">
        <span>Confirm</span>
        <i class="fas fa-arrow-right"></i>
    </button>
</form>
@endsection
