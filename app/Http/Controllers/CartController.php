<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function addToCart(Request $request) {
        $product_id  = $request->product_id;
        $price       = $request->product_price;
        $quantity    = $request->quantity;
        $total_price = $price * $quantity;

        $cart              = new Cart();
        $cart->user_id     = auth()->user()->id;
        $cart->product_id  = $product_id;
        $cart->quantity    = $quantity;
        $cart->total_price = $total_price;

        $cart->save();

        return redirect()->back()->with('success', 'product added into cart');

        // return response()->json(['success' => 'product added to cart']);
    }
    static function cartItem() {
        if (auth()->user()) {
            $user_id  = auth()->user()->id;
            $cartItem = Cart::where('user_id', $user_id)->sum('quantity');
            return $cartItem;

        }
    }

    public function viewCart() {
        if (auth()->user()) {
            $user_id     = auth()->user()->id;
            $carts       = Cart::where('user_id', $user_id)->get();
            $total_price = Cart::where('user_id', $user_id)->sum('total_price');
            return view('frontend.cart', compact('carts', 'total_price'));
        } else {
            return view('frontend.cart');
        }
    }

    public function updateCart(Request $request, Cart $cart) {
        $quantity       = $request->quantity;
        $cart->quantity = $quantity;
        $cart->total_price *= $quantity;
        $cart->update();

        return redirect()->back()->with('success', 'cart updated');
    }
    public function removeCart(Cart $cart) {
        $cart->delete();
        return redirect()->back()->with('success', 'cart has been deleted');
    }

    public function checkOut() {
        $user_id = auth()->user()->id;
        $carts   = Cart::where('user_id', $user_id)->get();
        return view('frontend.checkout', compact('carts'));
    }

    static function viewCartItems() {
        if (auth()->user()) {
            $user_id = auth()->user()->id;
            $carts   = Cart::where('user_id', $user_id)->get();
            return $carts;
        } else {
            return 'null';
        }
    }
}
