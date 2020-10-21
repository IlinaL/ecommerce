@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center form-container">
    <form class="lg-form text-center" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <div class="card-body">
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <button type="submit" id="btn-form" class="btn mt-5 rounded-pill btn-lg btn-block text-uppercase"
                value="Click here to request another">Click here to request another</button>
    </form>
</div>
@endsection