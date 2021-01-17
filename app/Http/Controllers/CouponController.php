<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller {
    public function totalAmount() {
        return $total_price = auth()->user()->carts->sum('total_price'); //get total price
    }

    public function storeCoupon(Request $request) {
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
        if (!$coupon) {
            return redirect()->back()->with('error', 'Invalid coupon code. Please try again.');
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
            $carts       = auth()->user()->carts;
            $totalAmount = $this->totalAmount(); //get total price

            $discount    = session()->get('coupon')['discount'] ?? 0;
            $newSubTotal = $totalAmount - $discount;
            // $newVat      = round(($newSubTotal * 15) / 100);
            $newTotal = $newSubTotal;

            return view('frontend.checkout', compact('carts', 'totalAmount', 'discount', 'newSubTotal', 'newTotal'));
        } else {
            return view('frontend.checkout');
        }
    }
}
