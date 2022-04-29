<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;




// home
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/shop', [ShopController::class,'index'])->name('shop.index');
Route::get('/product_details/{pid?}', [ShopController::class,'product_details'])->name('shop.product_details');




// Route::get('/product_details',function(){
//     return view('customer.product_details');
// })->name('product_details');

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
