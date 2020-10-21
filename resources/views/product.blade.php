@extends('layouts.app')

@section('content')

@section('title', 'Product')

<div class="breadcrumb"> <!-- Product -->
    <div class="container">
        <a href="/home" class="text-black hover:text-black">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <a href="{{route('shop.index')}}" class="text-black hover:text-black">Shop</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>{{$product->name}}</span>
    </div>

    <div class="container px-lg-12 pt-10"> <!-- Product details -->
        <div class="row mx-lg-n5">
            <div class="col py-3 px-lg-5">
                <img src="{{ asset('pictures/Shop/'.$product->slug.'.jpg')}}" style="width:300px" alt="product">
            </div>

            <div class="col py-3 px-lg-5">
                <h2 class="product-section-title">{{$product->name}}</h2>
                <strong class="text-2xl">{{$product->presentPrice()}}</strong>
                <div class="mt-4" style="font-family: sans-serif "> {{$product->description}}</div>
                <hr>

                <form action="{{ route('cart.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product->id}}">
                    <input type="hidden" name="name" value="{{ $product->name}}">
                    <input type="hidden" name="price" value="{{ $product->price}}">
                    <div class="add-cart">
                        <button type="submit">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                </form>
            </div>
        </div>
    </div>
</div> <!-- END Product details -->
</div> <!-- END Product -->
<div class="border-b border-gray-700"></div>
@include ('might-like')
@endsection