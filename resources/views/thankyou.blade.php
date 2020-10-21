@extends('layouts.app')

@section('title', 'Thank You')

@section('content')
<div class="breadcrumb" style = "height:100vh;">
    <div class="thank-you-section text-center p-3 mx-auto">
        <h1>Thank you for <br> Your Order!</h1>
        <p>A confirmation email was sent.</p>
        <div class="spacer"></div>
        <div class="cart-buttons ml-3">
                <a href="{{route('monohoo.index')}}">M O N O H O O </a>
        </div>
    </div>
@endsection