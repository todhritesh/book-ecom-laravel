@extends('customer.authComponents.auth-base')

@section('page-subheader')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Sign in Page</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Sign in</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('main-section')

<section class="checkout spad">
    <div class="container" style="height:60vh">
        <div class="checkout__form">
            <form  method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto border shadow-lg">
                        <div class="row">
                            <h6 class="coupon__code fs-2">Sign in here</h6>
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" placeholder="Email" name="email">
                                    @error('email')
                                        <p class="small text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Password<span>*</span></p>
                                    <input type="text" placeholder="Password" name="password">
                                    @error('password')
                                        <p class="small text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 mb-3">
                                <input type="submit" value="Login" class="btn btn-success" style="width:100%">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
