@extends('layouts.auth')

@section('content')
<h1 class="text-primary text-center mb-4">Welcome Back!</h1>

<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div class="mb-3">
        <label for="email" class="form-label">{{ __('Email Address') }}</label>
        <input id="email" type="email" class="form-control border-primary" name="email" value="{{ old('email') }}" required autofocus>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control border-primary" name="password" required>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input border-primary" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">
                {{ __('Remember me') }}
            </label>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        @if (Route::has('password.request'))
            <a class="text-primary" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <button type="submit" class="btn btn-primary rounded-pill px-4">
            {{ __('Log in') }}
        </button>
    </div>

    <div class="text-center mt-4">
        <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register here</a></p>
    </div>
</form>
@endsection
