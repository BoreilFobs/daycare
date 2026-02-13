@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<h2>Reset Password</h2>
<p class="subtitle">Enter your new password below</p>

<!-- Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('password.store') }}">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <!-- Email Address -->
    <div class="form-group">
        <label for="email">Email Address</label>
        <div class="input-wrapper">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $request->email) }}" placeholder="you@example.com" required autofocus>
            <i class="fas fa-envelope"></i>
        </div>
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password">New Password</label>
        <div class="input-wrapper">
            <input id="password" type="password" class="form-control" name="password" placeholder="••••••••" required>
            <i class="fas fa-lock"></i>
        </div>
    </div>

    <!-- Confirm Password -->
    <div class="form-group">
        <label for="password_confirmation">Confirm New Password</label>
        <div class="input-wrapper">
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="••••••••" required>
            <i class="fas fa-lock"></i>
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn-login">
        <span>Reset Password</span>
        <i class="fas fa-arrow-right"></i>
    </button>
</form>

<div class="back-home">
    <a href="{{ route('login') }}">
        <i class="fas fa-arrow-left"></i>
        Back to Login
    </a>
</div>
@endsection
