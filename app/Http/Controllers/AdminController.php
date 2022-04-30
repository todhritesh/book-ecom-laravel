<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.index");
    }

    public function add_book(Request $req){

        $data['category'] = Category::all();

        if($req->method() == "POST"){
            $req->validate([
                "pro_title" => "required",
                "pro_author" => "required",
                "pro_price" => "required",
                "pro_discount_price" => "required",
                "pro_isbn" => "required",
                "pro_pages" => "required",
                "category" => "required",
                "pro_image" => "required",
                "pro_publisher" => "required",
                "pro_qty" => "required",
                "pro_language" => "required",
                "pro_edition" => "required",
                "pro_description" => "required",
            ]);

            $details = [
                "pro_title"=>$req->pro_title,
                "pro_author"=>$req->pro_author,
                "pro_price"=>$req->pro_price,
                "pro_discount_price"=>$req->pro_discount_price,
                "pro_isbn"=>$req->pro_isbn,
                "pro_pages"=>$req->pro_pages,
                "pro_publisher"=>$req->pro_publisher,
                "pro_qty"=>$req->pro_qty,
                "pro_language"=>$req->pro_language,
                "pro_edition"=>$req->pro_edition,
                "pro_description"=>$req->pro_description,
            ];
            // return $req->except("category");
             $proInsert = Product::create($details);
             
             $lastId = $proInsert->id;
             $pro = Product::find($lastId);
             $count = 0;
             if($images = $req->file("pro_image")){
                foreach($images as $image){
                    // return 7456;
                    $filename = $image->getClientOriginalName();
                    $image->move(public_path("product_images"),$filename);
                    if($count == 0){
                        $pro->pro_image = $filename;
                    }
                    else{
                        $pro->{'pro_image'.$count} = $filename;
                    }
                    $count++;
                }
                $pro->save();
             }
             $last = Product::find($lastId);
             foreach($req->category as $cat){
                 $pro_cat = new CategoryProduct;
                 $pro_cat->product_id = $last->id;
                 $pro_cat->category_id = (int)$cat;
                 $pro_cat->save();
             }

             return redirect()->route("admin.index");

        }
        return view("admin.add_book_form",$data);
    }


    public function add_category(Request $req){
        $category = $req->validate([
            "cat_title" => "required"
        ]);

        Category::create($category);

        return redirect()->back();



    }
}
