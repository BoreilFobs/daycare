@extends('layouts.auth')

@section('title', 'Verify Email')

@section('content')
<h2>Verify Your Email</h2>
<p class="subtitle">Thanks for signing up! Please verify your email address by clicking the link we sent you.</p>

@if (session('status') == 'verification-link-sent')
    <div class="alert alert-success">
        A new verification link has been sent to your email address.
    </div>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit" class="btn-login">
        <span>Resend Verification Email</span>
        <i class="fas fa-paper-plane"></i>
    </button>
</form>

<div class="back-home" style="margin-top: 20px;">
    <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" style="background: none; border: none; color: #718096; cursor: pointer; font-size: 0.95rem;">
            <i class="fas fa-sign-out-alt"></i>
            Log Out
        </button>
    </form>
</div>
@endsection
