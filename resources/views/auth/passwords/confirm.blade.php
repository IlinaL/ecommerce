@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center form-container">
    <form class="lg-form text-center" method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <h1 class="mb-5 font-weight-light text-uppercase">Confirm Password</h1>
        <h6 class="mb-5 font-weight-light text-uppercase">Please confirm your password before continuing.</h6>
        <div class="form-group">
            <input type="password" id="forms"
                class="form-control rounded-pill form-control-lg @error('password') is-invalid @enderror"
                name="password" type="password" required autocomplete="current-password" placeholder="Password"
                autofocus>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" id="btn-form" class="btn mt-5 rounded-pill btn-lg btn-block text-uppercase"
            value="Confirm Password">Confirm Password</button>
        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </form>
</div>

@endsection