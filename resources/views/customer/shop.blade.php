@extends('customer.components.base')


@section('page-subheader')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('main-section')
    <!-- Shop Section Begin -->

    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($products as $p)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                {{-- <div class="product__item "> --}}
                                    <div class="product__item sale">
                                        <div class="product__item__pic set-bg" data-setbg="{{asset('customer/img/product/product-3.jpg')}}">
                                            <a href="{{route('shop.product_details',['pid'=>$p->product_id])}}" class="stretched-link"></a>
                                        <span class="label">Sale</span>
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="{{asset('customer/img/icon/heart.png')}}" alt=""></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6 class="fs-5">{{ $p->product[0]->pro_title }}</h6>
                                        <input class="pid" type="hidden" value="{{$p->product_id}}">
                                        <a onclick="add_to_cart({{$p->product_id}})" href="javascript:void(0);" class="add-cart">+ Add To Cart</a>
                                        <h5>Discount : {{ $p->product[0]->pro_discount_price }} %</h5>
                                        <h5 class="h6 text-success">
                                            @php
                                                $discounted_price = ($p->product[0]->pro_price * (100 - $p->product[0]->pro_discount_price)) / 100;
                                            @endphp
                                            Price : ₹ {{ $discounted_price }}
                                            <span class="text-danger text-decoration-line-through ms-2">&nbsp; ₹
                                                {{ $p->product[0]->pro_price }} &nbsp;</span>
                                        </h5>
                                    </div>
                                    <h5 class="text-secondary small">Category :
                                        @foreach ($categories as $c)
                                            @if ($p->product_id === $c->product_id)
                                                <a href="" class="stop-hover">{{$c->category[0]->cat_title}}&nbsp;</a>
                                            @endif
                                        @endforeach
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                                <a href="#">21</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection

@section('js')
    @include('customer.components.add-to-cart-ajax')
@endsection
