<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasMany(Category::class,"id","category_id");
    }
    public function product(){
        return $this->hasMany(Product::class,"id","product_id");
    }
}
