@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<h2>Sign In</h2>
<p class="subtitle">Enter your credentials to access your account</p>

<!-- Session Status -->
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<!-- Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    
    <!-- Email Address -->
    <div class="form-group">
        <label for="email">Email Address</label>
        <div class="input-wrapper">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
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

    <!-- Remember Me & Forgot -->
    <div class="form-row">
        <label class="remember-check">
            <input type="checkbox" name="remember" id="remember">
            <span>Remember me</span>
        </label>
        
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
        @endif
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn-login">
        <span>Sign In</span>
        <i class="fas fa-arrow-right"></i>
    </button>
</form>

<div class="divider">
    <span>or</span>
</div>

<p class="register-link">
    Don't have an account? <a href="{{ route('register') }}">Create one</a>
</p>

<div class="back-home">
    <a href="{{ route('home') }}">
        <i class="fas fa-arrow-left"></i>
        Back to Home
    </a>
</div>
@endsection
