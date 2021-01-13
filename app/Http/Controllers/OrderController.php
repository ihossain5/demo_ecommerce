<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;

class OrderController extends Controller {
    public function newOrder(OrderRequest $request) {

        $user_id  = auth()->user()->id;
        $allCarts = Cart::where('user_id', $user_id)->get();

        foreach ($allCarts as $cart) {
            $order                 = new Order();
            $order->product_id     = $cart['product_id'];
            $order->user_id        = $cart['user_id'];
            $order->total_price    = $cart['total_price'];
            $order->quantity       = $cart['quantity'];
            $order->name           = $request->name;
            $order->email          = $request->email;
            $order->address        = $request->address;
            $order->city           = $request->city;
            $order->phone          = $request->phone;
            $order->payment_method = $request->payment_method;
            $order->save();
            Cart::where('user_id', $user_id)->delete();
        }

        return redirect()->to('/')->with('success', 'Thanks for your order');

    }

    public function getOrder() {
        $orders = auth()->user()->orders;
        return view('frontend.orders', compact('orders'));
    }
}
