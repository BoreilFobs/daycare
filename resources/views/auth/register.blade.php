@extends('layouts.auth')

@section('content')
<h1 class="text-primary text-center mb-4">Create Account</h1>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Full Name') }}</label>
        <input id="name" type="text" class="form-control border-primary" name="name" value="{{ old('name') }}" required autofocus>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mb-3">
        <label for="email" class="form-label">{{ __('Email Address') }}</label>
        <input id="email" type="email" class="form-control border-primary" name="email" value="{{ old('email') }}" required>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control border-primary" name="password" required>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
        <input id="password_confirmation" type="password" class="form-control border-primary" name="password_confirmation" required>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a class="text-primary" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <button type="submit" class="btn btn-primary rounded-pill px-4">
            {{ __('Register') }}
        </button>
    </div>
</form>
@endsection
