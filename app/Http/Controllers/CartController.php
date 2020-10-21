<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $mightAlsoLike = Product::mightAlsoLike()->take(12)->get();
        return view('cart')->with('mightAlsoLike', $mightAlsoLike);
    }

    public function store(Request $request)
    {

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart');
        }
        Cart::add($request->id, $request->name, 1, $request->price)
             ->associate('App\Product');
             return redirect()->route('cart.index')->with ('success_message', 'Item was added to your cart.');
    }
   

    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed!');
    }


    public function switchToSaveForLater($id)
    {
        
        $item = Cart::get($id);
        
        Cart::remove($id);
        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id){
            return $rowId === $id;
        });

        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message', 'Item is already Saved For Later!');
        }


        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');
            return redirect()->route('cart.index')->with('success_message', 'Item has been Saved for Later');
    }
}