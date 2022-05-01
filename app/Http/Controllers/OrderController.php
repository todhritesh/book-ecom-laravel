<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    //add to cart
    function add_to_cart($pid=null){
        $check_pro = Product::find($pid);
        if(!$check_pro){
            return response()->json([
                'status'=>false,
            ]);
        }

        $user_id = Auth::user()->id;

        $checkOrderId = Order::where([['user_id',$user_id],['order_status',0],['is_buy_now',0]])->orderBy('id','desc')->first();

        //checking buy now
        $check_buy_now_OrderId = Order::where([['user_id',$user_id],['order_status',0],['is_buy_now',1]])->orderBy('id','desc')->first();
        if($check_buy_now_OrderId){
            $buy_now_id = $check_buy_now_OrderId->id;
            $findPro = OrderItem::where('order_id',$buy_now_id)->first();
            if($checkOrderId){
                $findPro->order_id = $checkOrderId->id;
                $findPro->save();
                $check_buy_now_OrderId->delete();
            }else{
                $check_buy_now_OrderId->is_buy_now = 0;
                $check_buy_now_OrderId->save();
            }
        }

        $checkOrderId = Order::where([['user_id',$user_id],['order_status',0],['is_buy_now',0]])->orderBy('id','desc')->first();

        if($checkOrderId){
            $oid = $checkOrderId->id;
            $checkProduct = OrderItem::where([['order_id',$oid],['product_id',$pid]])->first();
            if($checkProduct){
                $checkProduct->qty=$checkProduct->qty+1;
                $checkProduct->save();
                return response()->json([
                    'status'=>true,
                    'qty'=>$checkProduct->qty
                ]);
            }
        }else{
            $newOrder = new Order();
            $newOrder->user_id = $user_id;
            $newOrder->order_status = 0;
            $newOrder->save();
            $oid = $newOrder->id;
        }

        $data = new OrderItem();
        $data->order_id = $oid;
        $data->product_id = $pid;
        $data->user_id = $user_id;
        $data->qty = 1;
        $data->save();
        return response()->json([
            'status'=>true,
            'qty'=>$data->qty
        ]);;
    }

    //remove from cart
    function minus_cart_product($pid=null){
        $check_pro = Product::find($pid);
        if(!$check_pro){
            return response()->json([
                'status'=>false,
            ]);
        }

        $user_id = Auth::user()->id;

        $checkOrderId = Order::where([['user_id',$user_id],['order_status',0],['is_buy_now',0]])->orderBy('id','desc')->first();

        if(!$checkOrderId){
            $checkOrderId = Order::where([['user_id',$user_id],['order_status',0],['is_buy_now',1]])->orderBy('id','desc')->first();
            $findPro = OrderItem::where([['product_id',$pid],['order_id',$checkOrderId->id]])->first();
            if($findPro){
                $findPro->delete();
                $checkOrderId->is_buy_now = 0;
                $checkOrderId->save();
                return response()->json([
                    'status'=>true,
                    'is_delete'=>true,
                ]);
            }
        }

        $oid = $checkOrderId->id;
        $checkProduct = OrderItem::where([['order_id',$oid],['product_id',$pid]])->first();
        if(!$checkProduct){
            return 0;
        }

        if($checkProduct->qty==1){
            $checkProduct->delete();
            return response()->json([
                'status'=>true,
                'is_delete'=>true,
            ]);
        }else{
            $checkProduct->qty = $checkProduct->qty - 1;
            $checkProduct->save();
            return response()->json([
                'status'=>true,
                'qty'=>$checkProduct->qty
            ]);
        }


    }


    //show cart
    public function show_cart(){
        if(!$user_id = Auth::user()){
            return redirect()->back();
        }
        $user_id = $user_id->id;

        $count_cart = OrderItem::where([['user_id',$user_id],['o_status',0]])->count();


        $check_oid = Order::where([['user_id',$user_id],['order_status',0]])->orderBy('id','desc')->count();
        if(!$check_oid){
            return redirect()->back();
        }
         $oid_array = Order::where([['user_id',$user_id],['order_status',0]])->orderBy('id','desc')->get();;
        if($check_oid==2){
            $find_buy_now_order_item = OrderItem::where('order_id',$oid_array[0]['id'])->first();
            $find_buy_now_order_item->order_id = $oid_array[1]['id'];
            $find_buy_now_order_item->save();
            $previous_buy_new_oid = Order::find($oid_array[0]['id']);
            $previous_buy_new_oid->delete();
        }

       $check_oid = Order::where([['user_id',$user_id],['order_status',0]])->orderBy('id','desc')->first();


        $oid = $check_oid->id;

        $get_cart_product = OrderItem::with("product")->where('order_id',$oid)->get();

        $product_details_array = [];
        $total_amount = 0;
        foreach($get_cart_product as $pro_details){
            $p = $pro_details['product'];

            $discounted_price = ($p->pro_price * (100-$p->pro_discount_price))/100;
            $total_price = $discounted_price * $pro_details->qty;
            $total_amount += $discounted_price * $pro_details->qty;
            $product_details_array[]=[
                'pid'=>$p->id,
                'title'=>$p->pro_title,
                'price'=>$p->pro_price ,
                'qty'=>$pro_details->qty,
                'image'=>$p->pro_image,
                'discount'=>$p->pro_discount_price,
                'total_price'=>$total_price,
            ];
        }
        // $product_details_array;

        $data = [
            'total_amount'=> $total_amount,
            'cart_products'=>$product_details_array,
            'cart_value' => $count_cart,
        ];

        return view("customer.cart",$data);
    }




}
