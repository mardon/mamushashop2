<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::content();
        if (Cart::count() == 0) {
            return view('cartempty');
        }
        return view('cart')->with('cart', $cart);
    }
}
