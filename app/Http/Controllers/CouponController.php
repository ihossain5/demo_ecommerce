<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller {
    protected function totalAmount() {
        $user_id     = auth()->user()->id;
        $total_price = Cart::where('user_id', $user_id)->sum('total_price'); //get total price
        return $total_price;
    }

    public function storeCoupon(Request $request) {
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
        if (!$coupon) {
            return redirect()->back()->withErrors('Invalid coupon code. Please try again.');
        }
        $request->session()->put('coupon', [
            'name'     => $coupon->coupon_code,
            'discount' => $coupon->discount($this->totalAmount()),

        ]);
        return redirect()->back()->with('success', 'coupon applied');
    }

    public function destroyCoupon() {
        session()->forget('coupon');
        return redirect()->back()->with('success', 'coupon has been removed');
    }

    // show cart item into checkout page
    public function checkOut() {
        if (Auth::user()) {
            $user_id = auth()->user()->id;
        } else {
            return redirect('login');
        }

        $carts       = Cart::where('user_id', $user_id)->get();
        $total_price = $this->totalAmount(); //get total price

        $discount    = session()->get('coupon')['discount'] ?? 0;
        $newSubTotal = $total_price - $discount;
        // $newVat      = round(($newSubTotal * 15) / 100);
        $newTotal = $newSubTotal;

        return view('frontend.checkout', compact('carts', 'total_price', 'discount', 'newSubTotal', 'newTotal'));
    }
}
