<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $data = [];
        $data['products'] = CategoryProduct::with('product')->groupBy('product_id')->get();
        $data['categories'] = CategoryProduct::with('category')->get();

        return view('customer.welcome',$data);
    }
}
