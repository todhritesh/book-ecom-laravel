<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/shop',function(){
    return view('shop');
})->name('shop');

Route::get('/product_details',function(){
    return view('product_details');
})->name('product_details');

Route::get('/cart',function(){
    return view('cart');
})->name('cart');

Route::get('/about_us',function(){
    return view('about_us');
})->name('about_us');

Route::get('/contact_us',function(){
    return view('contact_us');
})->name('contact_us');

Route::get('/checkout',function(){
    return view('checkout');
})->name('checkout');
