@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<h2>Create Account</h2>
<p class="subtitle">Join ABC Centre and get started today</p>

<!-- Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Full Name -->
    <div class="form-group">
        <label for="name">Full Name</label>
        <div class="input-wrapper">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="John Doe" required autofocus>
            <i class="fas fa-user"></i>
        </div>
    </div>

    <!-- Email Address -->
    <div class="form-group">
        <label for="email">Email Address</label>
        <div class="input-wrapper">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
            <i class="fas fa-envelope"></i>
        </div>
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-wrapper">
            <input id="password" type="password" class="form-control" name="password" placeholder="••••••••" required>
            <i class="fas fa-lock"></i>
        </div>
    </div>

    <!-- Confirm Password -->
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <div class="input-wrapper">
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="••••••••" required>
            <i class="fas fa-lock"></i>
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn-login">
        <span>Create Account</span>
        <i class="fas fa-arrow-right"></i>
    </button>
</form>

<div class="divider">
    <span>or</span>
</div>

<p class="register-link">
    Already have an account? <a href="{{ route('login') }}">Sign In</a>
</p>

<div class="back-home">
    <a href="{{ route('home') }}">
        <i class="fas fa-arrow-left"></i>
        Back to Home
    </a>
</div>
@endsection
