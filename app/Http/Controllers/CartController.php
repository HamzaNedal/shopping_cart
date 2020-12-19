<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        return view('cart.show');
    }
    public function addToCart(Product $product)
    {
        if (session()->has('cart')) {
            $cart = new Cart(session('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        session(['cart' => $cart]);
        return redirect()->back();
    }

    public function checkout()
    {
        if (session()->has('cart')) {
            return view('cart.checkout');
        }
        return redirect()->back();
    }

    public function charge()
    {
        $stripe = Stripe::charges()->create([
            'source' => request()->stripeToken,
            'amount'   => session('cart')->totalPrice,
            'currency' => 'USD',
            'description' => 'Test ttest'

        ]);
        if($stripe['id']){
            auth()->user()->orders()->create([
                'cart'=>serialize(session('cart')),
            ]);
            session()->forget('cart');
            toast('Done','success');
            return redirect()->route('products');
        }else{
            return redirect()->back();
        }
    }
}
