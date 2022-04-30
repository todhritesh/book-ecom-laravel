<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;




// home
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/shop', [ShopController::class,'index'])->name('shop.index');
Route::get('/product_details/{pid?}', [ShopController::class,'product_details'])->name('shop.product_details');


Route::prefix("admin")->group(function(){
    Route::get("/home",[AdminController::class,"index"])->name("admin.index");
    Route::match(['post','get'],"/add-book",[AdminController::class,"add_book"])->name("admin.add_book");
    Route::post("/add/category",[AdminController::class,"add_category"])->name("admin.add_category");
});




Route::get('/signin',function(){
    return view('customer.signin');
})->name('signin');

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




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
