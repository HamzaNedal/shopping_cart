<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{


    public $items = [];
    public $totalQTY = 0;
    public $totalPrice  = 0;

    public function __construct($cart = null)
    {
        // dd($cart);
        if ($cart) {
           
            $this->items = $cart->items;
            $this->totalQTY = $cart->totalQTY;
            $this->totalPrice = $cart->totalPrice;
            // dd($this->items);
        } else {
           
            $this->items = [];
            $this->totalQTY = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($product)
    {
        $item= [
            'title' => $product->title,
            'price' => $product->price,
            'qty' => 0,
            'image' => $product->image,
        ];

        if (!array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item;  
        }
        
        $this->totalQTY += 1;
        $this->totalPrice += $product->price;
        $this->items[$product->id]['qty'] += 1;
    }
}
