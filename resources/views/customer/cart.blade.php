@extends('customer.components.base')

@section('page-subheader')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('main-section')

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart_products as $cart_product)
                                <tr class="{{'cart_row'.$cart_product['pid']}}" >
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{asset('customer/img/shopping-cart/cart-1.jpg')}}" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h4>{{$cart_product['title']}}</h4>
                                            <h5>Discount : {{$cart_product['discount']}} %</h5>
                                            <h5 class="h6 text-success">
                                                @php
                                                    $discounted_price = ($cart_product['price'] * (100-$cart_product['discount']))/100;
                                                @endphp
                                                Price : ₹ {{$discounted_price}}
                                                <span class="text-danger text-decoration-line-through ms-2" >&nbsp; ₹ {{$cart_product['price']}} &nbsp;</span>
                                            </h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2 d-flex">
                                                <a href="javascript:void(0);" onclick="minus_cart_product({{$cart_product['pid']}})" class="nav-link px-0 text-dark"><i class="bi bi-chevron-left"></i></a>
                                                <input class="{{'pro_count'.$cart_product['pid']}}" type="text" value="{{$cart_product['qty']}}">
                                                <a href="javascript:void(0);" onclick="add_to_cart({{$cart_product['pid']}})" class="nav-link px-0 text-dark"><i class="bi bi-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">₹ {{$cart_product['total_price']}}</td>
                                    <td class="cart__close"><i class="fa fa-close"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 col-sm-8 ">
                            <div class="continue__btn ">
                                <a href="{{route('shop.index')}}"> Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span> ₹ {{$total_amount}}</span></li>
                            <li>Total <span>₹ {{$total_amount}}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection

@section('js')
<script>
    function minus_cart_product(pid){
        const pro_count = document.querySelector(`.pro_count${pid}`);
        fetch(`/minus_cart_product/${pid}`, {
            method: 'get',
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                },
            })
            .then((data) => {
                return data.json()
            })
            .then((data) => {
                toastr.options = {
                    "closeButton" : true,
  	                "progressBar" : true
                }
                if(!data.status){
                    toastr.warning("Something went wrong")
                }
                else if(data.status){
                    if(data.is_delete){
                        toastr.success("Item removed successfully cart")
                        const cart_row = document.querySelector(`.cart_row${pid}`);
                        cart_row.remove();
                    }else{
                        toastr.success("Item removed successfully cart")
                        pro_count.value = data.qty;
                    }
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    }



    function add_to_cart(pid){
        const pro_count = document.querySelector(`.pro_count${pid}`);
        fetch(`/add_to_cart/${pid}`, {
            method: 'get',
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                },
            })
            .then((data) => {
                return data.json()
            })
            .then((data) => {
                toastr.options = {
                    "closeButton" : true,
  	                "progressBar" : true
                }
                if(!data.status){
                    toastr.warning("Something went wrong")
                }
                else if(data.status){
                    toastr.success("Item added to cart")
                    pro_count.value = data.qty;
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    }
</script>

@endsection
