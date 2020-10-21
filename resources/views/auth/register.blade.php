@extends('layouts.app')

@section('content')

@section('title', 'Register')

<div class="d-flex justify-content-center align-items-center form-container">
    <form class="lg-form text-center" method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="mb-5 font-weight-light text-uppercase">Register</h1>
        <div class="form-group">
            <input type="text" id="forms"
                class="form-control rounded-pill form-control-lg @error('name') is-invalid @enderror" name="name"
                type="text" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" id="forms"
                class="form-control rounded-pill form-control-lg @error('email') is-invalid @enderror" name="email"
                type="email value=" {{ old('email') }}" required autocomplete="email" placeholder="E-mail address">
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
            value="Register">Register</button>

    </form>
</div>
@endsection