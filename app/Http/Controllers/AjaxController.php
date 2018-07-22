<?php

namespace App\Http\Controllers;

use Cart;
use Session;
use App\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function store(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);
        Cart::add($product->id, $product->name, 1, $product->price);
        $request->session()->flash('message', 'New customer added successfully.');
        $request->session()->flash('message-type', 'success');
        $cart_qty =  Cart::count();
        return response()->json(['success' => 'success', 'cart_qty' => $cart_qty], 200);
    }
}
