@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center form-container">
    <form class="lg--form text-center" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <h1 class="mb-5 font-weight-light text-uppercase">Reset Password</h1>
        <div class="form-group">
            <input type="email" id="forms"
                class="form-control rounded-pill form-control-lg @error('email') is-invalid @enderror" name="email"
                type="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail address"
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
        <div class="form-group">
            <input type="password" id="forms"
                class="form-control rounded-pill form-control-lg @error('password') is-invalid @enderror"
                name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
        </div>
        <button type="submit" id="btn-form" class="btn mt-5 rounded-pill btn-lg btn-block text-uppercase"
            value="Reset Password">Reset Password</button>
    </form>
</div>

@endsection