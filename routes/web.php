<?php

use Illuminate\Support\Facades\Route;

Route::view('/','monohoo');

// Auth
Auth::routes();

// Home
Route::get('/home','HomeController@index')->name('home.index');

// Shop
Route::get('/shop','ShopController@index')->name('shop.index');
Route::get('/shop/{product}','ShopController@show')->name('shop.show');

// Monohoo
Route::get('/monohoo','MonohooController@index')->name('monohoo.index');

// Cart
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('cart.store');
Route::delete('/cart{product}','CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}','CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

// Cart/SaveForLater
Route::delete('/saveForLater{product}','SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}','SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

// Cart Empty
Route::get('empty', function (){
        Cart::instance('saveForLater')->destroy();
});

//Checkout
Route::get('/checkout','CheckoutController@index')->name('checkout.index');
Route::post('/checkout','CheckoutController@store')->name('checkout.store');

// Contact
Route::get('/contact', 'ContactController@create')->name('contact.index');
Route::post('/contact','ContactController@store')->name('contact.store');

// Confirmation
Route::get('/thank you', 'ConfirmationController@index')->name('confirmation.index');