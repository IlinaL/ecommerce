@extends('layouts.app')

@section('content')

@section('title', 'Reset Password')

<div class="d-flex justify-content-center align-items-center form-container">
    <form class="lg-form text-center" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="card-body">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
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

        <button type="submit" id="btn-form" class="btn mt-5 rounded-pill btn-lg btn-block text-uppercase"
            value="Send Password Reset Link">Send Password Reset Link</button>
    </form>
</div>

@endsection