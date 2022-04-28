<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    function order(){
        return $this->hasOne(Order::class,'id','order_id');
    }
    function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
