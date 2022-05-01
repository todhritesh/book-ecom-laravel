<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




// home
Route::get('/', [HomeController::class,'index'])->name('home');

//show products
Route::get('/shop', [ShopController::class,'index'])->name('shop.index');

// product details
Route::get('/product_details/{pid?}', [ShopController::class,'product_details'])->name('shop.product_details');

//cart operations
//add to cart
Route::get("/add_to_cart/{pid?}",[OrderController::class,"add_to_cart"])->name('add_to_cart');
//remove from cart
Route::get("/minus_cart_product/{pid?}",[OrderController::class,"minus_cart_product"])->name('minus_cart_product');
//show cart
Route::get("show_cart",[OrderController::class,"show_cart"])->name('show_cart');



//sign in
Route::get('/signin',function(){
    if(Auth::user())
        return redirect()->back();
    return view('customer.signin');
})->name('signin');

//sign in
Route::get('/signup',function(){
    if(Auth::user())
        return redirect()->back();
    return view('customer.signup');
})->name('signup');


Route::get('/cart',function(){
    return view('customer.cart');
})->name('cart');

Route::get('/about_us',function(){
    return view('customer.about_us');
})->name('about_us');

Route::get('/contact_us',function(){
    return view('customer.contact_us');
})->name('contact_us');

Route::get('/checkout',function(){
    return view('customer.checkout');
})->name('checkout');


Route::get('/admin/home',function(){
    return view('admin.index');
})->name('checkout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
