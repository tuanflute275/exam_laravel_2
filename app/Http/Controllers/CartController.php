<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = new Cart();
        $cart->add($product, $request->quantity);
        return redirect()->route('checkout');
    }

    public function clear(Cart $cart)
    {
        $cart->clear();
        return redirect()->route('checkout');
    }
}
