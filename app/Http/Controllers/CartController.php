<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {

    public function userCart() {
        return auth()->user()->carts;
    }

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
            $carts       = $this->userCart();
            $carts       = $this->userCart();
            $total_price = $this->userCart()->sum('total_price'); //get total price
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

// view cart item into dropdown
    static function viewCartItems() {
        if (auth()->user()) {
            $user_id = auth()->user()->id;
            $carts   = Cart::where('user_id', $user_id)->get();
            return $carts;
        }
    }

    public function AddCart(Request $request) {
        if (Auth::check()) {
            $product  = Product::where('id', $request->product_id)->first();
            $quantity = $request->quantity;

            $cart = Cart::updateOrCreate([
                'product_id' => $request->product_id,
                'user_id'    => auth()->user()->id,
            ],
                ['quantity'   => $quantity,

                    'total_price' => $product['price'] * $quantity,
                ]);

            if (auth()->user()) {
                $user_id  = auth()->user()->id;
                $cartItem = Cart::where('user_id', $user_id)->count();

            }
            $data                  = array();
            $data['product_id']    = $request->product_id;
            $data['quantity']      = $quantity;
            $data['product_image'] = $product->image;
            $data['product_name']  = $product->name;

            return response()->json(['success' => 'product added to cart', 'cartItem' => $cartItem, 'data' => $data]);

        } else {
            return response()->json(['error' => ' Login to add item']);
        }
    }

}
