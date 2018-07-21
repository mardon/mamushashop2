<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function store(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);
        Cart::add($product->id, $product->name, 1, $product->price);
        return response()->json(['success' => 'success'], 200);
    }
}
