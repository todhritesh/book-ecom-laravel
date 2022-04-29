<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('customer/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('customer/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('customer/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('customer/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('customer/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('customer/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('customer/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('customer/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('customer/css/myCustomCss.css')}}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Header Section Begin -->
        @include('customer.authComponents.auth-header')
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
        @section('page-subheader')
        @show
    <!-- Breadcrumb Section End -->

    {{-- Main section --}}
        @section('main-section')
        @show
    {{-- End main section --}}

    <!-- Footer Section Begin -->
        @include('customer.components.footer')
    <!-- Footer Section End -->


    <!-- Js Plugins -->
    <script src="{{asset('customer/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('customer/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('customer/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('customer/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('customer/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('customer/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('customer/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('customer/js/mixitup.min.js')}}"></script>
    <script src="{{asset('customer/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('customer/js/main.js')}}"></script>
</body>

</html>
