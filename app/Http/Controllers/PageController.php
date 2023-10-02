<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Http\Requests\checkoutRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home_page()
    {
        $new_products = Product::orderBy('id', 'desc')->limit(6)->get();
        $sale_products = Product::orderBy('id', 'desc')->where('sale_price', '>', 0)->limit(6)->get();
        return view('customer.home', compact('new_products', 'sale_products'));
    }

    public function detail_page($id)
    {
        $pro = Product::find($id);
        return view('customer.detail', compact('pro'));
    }
    public function shop_page()
    {
        $products = Product::search()->filter()->orderBy('id', 'desc')->paginate(9);
        return view('customer.shop', compact('products'));
    }
    public function category_page($id)
    {
        $cate = Category::find($id);
        $products = $cate->products()->search()->filter()->orderBy('id', 'desc')->paginate(9);
        return view('customer.shop', compact('products'));
    }

    public function checkout_page(Cart $cart)
    {
        $pro_checkout = $cart->getCart();
        return view('customer.checkout', compact('pro_checkout'));
    }
    public function post_checkout(checkoutRequest $request, Cart $cart)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        if ($order = Order::create($data)) {
            foreach ($cart->getCart() as $item) {
                $detail = [
                    'product_id' => $item['product_id'],
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ];
                Order_detail::create($detail);
            }
        }

        $cart->clear();
        return redirect()->route('shop');
    }
}
