<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', function () {
    return view('admin.index');
});

Route::resource('category', CategoryController::class);
Route::resource('subcategory', SubCategoryController::class);
Route::get('/subcategories/{id}', [SubCategoryController::class, 'loadSubCategory']);
Route::resource('products', ProductController::class);
Route::get('/products/{id}/detail/', [ProductController::class, 'getProductByID'])->name('product.detail');

// Route::post('/products/add/cart/', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::get('/products/view/cart', [CartController::class, 'viewCart'])->name('cart.show');
Route::post('/products/update/{cart}', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/products/remove/{cart}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::get('/checkout', [CouponController::class, 'checkOut'])->name('checkout');

Route::post('/cart/add/{id}', [CartController::class, 'AddCart']);

Route::post('/cart/checkout/', [OrderController::class, 'newOrder'])->name('order.new');
Route::get('/order/', [OrderController::class, 'getOrder'])->name('order.index');

Route::get('/category/{id}/products', [ProductController::class, 'getProductByCategory'])->name('category.product');

Route::post('/store/coupon', [CouponController::class, 'storeCoupon'])->name('store.coupon');
Route::delete('/remove/coupon', [CouponController::class, 'destroyCoupon'])->name('destroy.coupon');
