<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            <div class="dropdown">
                                @auth
                                    <button style="font-size:13px;background-color:transparent;color:#ffffff" class="dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person me-2"></i>{{auth()->user()->name}}</button>
                                    <ul class="dropdown-menu">
                                        <form class="d-inline" action="{{route('logout')}}" method="Post">
                                            @csrf
                                            <input class="dropdown-item" type="submit" value="SIGN OUT" style="font-size:13px;background-color:transparent;color:black">
                                        </form>
                                    </ul>
                                @endauth
                            </div>
                            @guest
                                <a href="{{route('signin')}}">Sign in</a>
                                <a href="{{route('signup')}}">Sign up</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{asset('customer/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="@php echo Route::current()->getName() === "home" ? "active":null; @endphp" ><a href="{{route("home")}}">Home</a></li>
                        <li class="@php echo Route::current()->getName() === "shop.index" ? "active":null; @endphp" ><a href="{{route("shop.index")}}">Shop</a></li>
                        <li class="@php echo Route::current()->getName() === "shop.index" ? "active":null; @endphp" ><a href="{{route("shop.index")}}">Categories</a></li>
                        <li class="@php echo Route::current()->getName() === "about_us" ? "active":null; @endphp" ><a href="{{route("about_us")}}">About Us</a></li>
                        <li class="@php echo Route::current()->getName() === "contact_us" ? "active":null; @endphp" ><a href="{{route('contact_us')}}">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="{{asset('customer/img/icon/search.png')}}" alt=""></a>
                    <a href="#"><img src="{{asset('customer/img/icon/heart.png')}}" alt=""></a>
                    <a  class="position-relative d-inline-block"  href="{{route('show_cart')}}"><img src="{{asset('customer/img/icon/cart.png')}}"alt="">
                        <span class="position-absolute translate-middle badge rounded-pill" style="background-color:#f3f2ee;left:20px;top:-5px">
                            99+
                        </span>
                    </a>
                    <div class="price">$0.00</div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
