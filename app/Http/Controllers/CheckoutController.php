<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Exception\CardErrorException;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }


    public function store(Request $request)
    {
        

     \Stripe\Stripe::setApiKey('sk_test_51HX8QuA7wzv4omQrNotT9iY8HqnjaIVdmxGt3QXGnEZ4tJg8Azwl5bY4vQbQaMscMnnXosRlUWWgvd1TgTJVU1pM00JsigoFgR');

     $token = $_POST['stripeToken'];
     $contents = Cart::content()->map(function ($item) {
    return $item->model->slug.', '.$item->qty;
    })->values()->toJson();

      try{
       $charge = \Stripe\Charge::create([

       'amount'   => Cart::total() * 100,
       'receipt_email'=>$request->email,
       'currency'=>'CAD',
       'description'=>'Order',
       'source'=> $request->stripeToken,
       'statement_descriptor' => 'Custom descriptor',
       'metadata'=>[
         'contents'=>$contents,
         'quantity'=>Cart::instance('default')->count()

                    ],
    ]);
       Cart::instance('default')->destroy();

       return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
      } catch(CardErrorException $e){
      return back()->withErrors('Error!'. $e->getMessage());
  } 
 }
}

