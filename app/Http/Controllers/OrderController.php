<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;

class OrderController extends Controller {
    public function newOrder(OrderRequest $request) {

        // $allCarts = Cart::where('user_id', $user_id)->sum('total_price');
        $allCarts = auth()->user()->carts;

        $total = $allCarts->sum('total_price');

        if (session()->has('coupon')) {
            $discount    = session()->get('coupon')['discount'];
            $totalAmount = $total - $discount;
        } else {
            $totalAmount = $total;
            $discount    = 0;
        }

        foreach ($allCarts as $cart) {
            $order = new Order();

            $order->product_id     = $cart['product_id'];
            $order->user_id        = $cart['user_id'];
            $order->price          = $cart['total_price'];
            $order->quantity       = $cart['quantity'];
            $order->discount       = $discount;
            $order->total_price    = $totalAmount;
            $order->name           = $request->name;
            $order->email          = $request->email;
            $order->address        = $request->address;
            $order->city           = $request->city;
            $order->phone          = $request->phone;
            $order->payment_method = $request->payment_method;
            $order->save();

            session()->forget('coupon');
            $cart->delete();
        }

        return redirect()->to('/')->with('success', 'Thanks for your order');

    }

    public function getOrder() {
        if (auth()->user()) {
            $orders = auth()->user()->orders;
            return view('frontend.orders', compact('orders'));
        }
        return view('frontend.orders');
    }
}
