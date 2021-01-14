<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller {

    //count cart item
    static function cartItem() {
        if (auth()->user()) {
            $user_id = auth()->user()->id;
            // $cartItem = Cart::where('user_id', $user_id)->sum('quantity');
            $cartItem = Cart::where('user_id', $user_id)->count();
            return $cartItem;

        }
    }

    // view all cart item
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
// update cart item
    public function updateCart(Request $request, Cart $cart) {
        $quantity       = $request->quantity;
        $cart->quantity = $quantity;
        $cart->total_price *= $quantity;
        $cart->update();

        return redirect()->back()->with('success', 'cart updated');
    }
    // remove cart item
    public function removeCart(Cart $cart) {
        $cart->delete();
        return redirect()->back()->with('success', 'cart has been deleted');
    }
// show cart item into checkout page
    public function checkOut() {
        $user_id = auth()->user()->id;
        $carts   = Cart::where('user_id', $user_id)->get();
        return view('frontend.checkout', compact('carts'));
    }
// view cart item into dropdown
    static function viewCartItems() {
        if (auth()->user()) {
            $user_id = auth()->user()->id;
            $carts   = Cart::where('user_id', $user_id)->get();
            return $carts;
        }
    }

    public function AddCart(Request $request) {

        $product  = Product::where('id', $request->product_id)->first();
        $quantity = $request->quantity;
        $data     = array();

        $user_id             = auth()->user()->id;
        $data['user_id']     = $user_id;
        $data['product_id']  = $product->id;
        $data['quantity']    = $quantity;
        $data['total_price'] = $product->price * $quantity;

        Cart::create($data);

        if (auth()->user()) {
            $user_id  = auth()->user()->id;
            $cartItem = Cart::where('user_id', $user_id)->count();

        }

        return response()->json(['success' => 'product added to cart', 'cartItem' => $cartItem]);
    }
}
