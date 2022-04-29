<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    function index(){
        $data = [];
        $data['products'] = CategoryProduct::with('product')->groupBy('product_id')->get();
        $data['categories'] = CategoryProduct::with('category')->get();
        return view('customer.shop',$data);
    }

    function product_details($pid = null){
        $data = [];
        $data['product'] = CategoryProduct::with('product')->where('product_id',$pid)->groupBy('product_id')->first();
        $data['cats'] = CategoryProduct::with('category')->where('product_id',$pid)->get();
        $data['products'] = CategoryProduct::with('product')->groupBy('product_id')->get();
        $data['categories'] = CategoryProduct::with('category')->get();
        return view('customer.product_details',$data);
    }
}
