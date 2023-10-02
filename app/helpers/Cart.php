<?php

namespace App\Helpers;

use App\Models\Product;

class Cart
{
    private $items = [];

    public function __construct()
    {
        $this->items = session('cart') ?  session('cart') : [];
    }
    public function add($product, $quantity = 1)
    {
        try {
            $item = [
                'product_id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->discount ? $product->discount : $product->price,
                'quantity' => $quantity
            ];

            if (isset($this->items[$product->id])) {
                $this->items[$product->id]['quantity'] += $quantity;
            } else {
                $this->items[$product->id] = $item;
            }
            session(['cart' => $this->items]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getCart()
    {
        return $this->items;
    }

    public function clear()
    {
        session(['cart' => null]);
    }
}
