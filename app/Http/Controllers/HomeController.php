<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index()
    
        {
            $products = Product::where('featured',true)->take(8)->inRandomOrder()->get();
            return view('home')->with('products',$products);
        }
}

