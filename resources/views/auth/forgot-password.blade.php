@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<h2>Forgot Password?</h2>
<p class="subtitle">No worries! Enter your email and we'll send you a reset link.</p>

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

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div class="form-group">
        <label for="email">Email Address</label>
        <div class="input-wrapper">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
            <i class="fas fa-envelope"></i>
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn-login">
        <span>Send Reset Link</span>
        <i class="fas fa-paper-plane"></i>
    </button>
</form>

<div class="divider">
    <span>or</span>
</div>

<p class="register-link">
    Remember your password? <a href="{{ route('login') }}">Sign In</a>
</p>

<div class="back-home">
    <a href="{{ route('home') }}">
        <i class="fas fa-arrow-left"></i>
        Back to Home
    </a>
</div>
@endsection
