@extends('layouts.app')

@section('content')

@section('title', 'Shopping Cart')

<div class="breadcrumb">
    <div class="container">
        <a href="/home" class="text-black hover:text-black">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shopping Cart</span>
    </div>
    <div class="cart-section container"> <!-- Cart-Section -->
        <div>
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif

            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (Cart::count() > 0)

            <h2 class="cart-heading">{{ Cart::count() }} item(s) in Shopping Cart</h2>

            <div class="cart-table">
                @foreach (Cart::content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->slug) }}"><img
                                src="{{ asset('pictures/Shop/'.$item->model->slug.'.jpg')}}" alt="product"
                                class="img-cart"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a
                                    href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                            </div>
                            <div class="cart-table-description">{{ $item->model->description }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST" class="form-cart">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options">Remove</button>
                            </form>

                            <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST"
                                class="form-cart">
                                {{ csrf_field() }}

                                <button type="submit" class="cart-options">Save for Later</button>
                            </form>
                            <div class="subtotal">{{ presentPrice($item->subtotal) }}</div>

                        </div>
                    </div>
                </div> <!-- END Cart-Table-Row -->
                @endforeach

            </div> <!-- END Cart-Table -->

            <div class="cart-totals-subtotal"> <!-- Cart-Totals -->
                <strong>Subtotal</strong>
                {{ presentPrice(Cart::subtotal()) }} <br>
                <strong>Tax (13%)</strong>
                {{ presentPrice(Cart::tax()) }} <br>
                <strong>Total </strong>
                {{ presentPrice(Cart::total()) }}
                <hr>
            </div> <!-- END Cart-Totals -->

            <div class="cart-buttons">

                <a href="{{ route('shop.index') }}" value="Continues Shopping">Continue Shopping</a>
                <a href="{{ route('checkout.index') }}" value="Proceed to Checkout">Proceed to Checkout</a>
            </div>

            @else

            <h3>No items in Cart!</h3>
            <div class="spacer"></div>
            <div class="cart-buttons">
                <a class="button" href="{{ route('shop.index') }}">Continue Shopping</a>
            </div>
            <div class="spacer"></div>

            @endif

            @if (Cart::instance('saveForLater')->count() > 0)

            <h2 class="cart-heading">{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h2>

            <div class="saved-for-later cart-table"> <!-- Saved-For-Later -->
                @foreach (Cart::instance('saveForLater')->content() as $item)
                
                <div class="cart-table-row"> <!-- Cart-Table-Row -->
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->slug) }}"><img
                                src="{{ asset('pictures/Shop/'.$item->model->slug.'.jpg')}}" alt="product"
                                class="img-cart"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a
                                    href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                            </div>
                            <div class="cart-table-description">{{ $item->model->description }}</div>
                        </div>
                    </div>

                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST"
                                class="form-cart">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options">Remove</button>
                            </form>

                            <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST"
                                class="form-cart">
                                {{ csrf_field() }}

                                <button type="submit" class="cart-options">Move to Cart</button>
                            </form>
                            <div>{{ $item->model->presentPrice() }}</div>
                        </div>
                    </div>
                </div> <!-- END Cart-Table-Row -->
                @endforeach

            </div> <!-- END Saved-For-Later -->

            @else
            <h3>You have no items Saved for Later.</h3>
            @endif

        </div>
    </div> <!-- END Cart-Section -->
    @include('might-like')
    @endsection