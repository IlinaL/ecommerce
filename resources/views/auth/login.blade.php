@extends('layouts.app')

@section('content')

@section('title', 'Login')

<div class="d-flex justify-content-center align-items-center form-container">
    <form class="lg-form text-center" method="POST" action="{{ route('login') }}">
        @csrf

        <h1 class="mb-5 font-weight-light text-uppercase">Login</h1>
        <div class="form-group">
            <input type="email" id="forms"
                class="form-control rounded-pill form-control-lg @error('email') is-invalid @enderror" name="email"
                type="email value=" {{ old('email') }}" required autocomplete="email" placeholder="E-mail address"
                autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" id="forms"
                class="form-control rounded-pill form-control-lg @error('password') is-invalid @enderror"
                name="password" type="password" required autocomplete="current-password" placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="forgot-link form-group d-flex justify-content-between align-items-center">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember Password</label>
            </div>
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
        <button type="submit" id="btn-form" class="btn mt-5 rounded-pill btn-lg btn-block text-uppercase"
            value="Login">Login</button>
        <p class="mt-3 font-weight-normal">Don't have an account? <a href="{{route('register')}}"><strong>Register
                    Now</strong></a></p>
    </form>
</div>

@endsection