<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/lukani-preview-v1/lukani/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Dec 2019 10:29:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    
    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="{{asset('assets/front-end/css/bootstrap.min.css')}}">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{{asset('assets/front-end/css/owl.carousel.min.css')}}">
    <!--slick min css-->
    <link rel="stylesheet" href="{{asset('assets/front-end/css/slick.css')}}">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{asset('assets/front-end/css/magnific-popup.css')}}">
    <!--font awesome css-->
    <link rel="stylesheet" href="{{asset('assets/front-end/css/font.awesome.css')}}">
    <!--animate css-->
    <link rel="stylesheet" href="{{asset('assets/front-end/css/animate.css')}}">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{asset('assets/front-end/css/jquery-ui.min.css')}}">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{{asset('assets/front-end/css/slinky.menu.css')}}">
    <!--plugins css-->
    <link rel="stylesheet" href="{{asset('assets/front-end/css/plugins.css')}}">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/front-end/css/style.css')}}">
    @stack('css')
    <!--modernizr min js here-->
    <script src="{{asset('assets/front-end/js/vendor/modernizr-3.7.1.min.js')}}"></script>
</head>

<body>
   
    <!--header area start-->
    
    @include('layouts.front-end.partials.header')
    <!--header area end-->

    @yield('content')


    @include('layouts.front-end.partials.footer')
    

    
<!-- JS
============================================ -->
<!--jquery min js-->
<script src="{{asset('assets/front-end/js/vendor/jquery-3.4.1.min.js')}}"></script>
<!--popper min js-->
<script src="{{asset('assets/front-end/js/popper.js')}}"></script>
<!--bootstrap min js-->
<script src="{{asset('assets/front-end/js/bootstrap.min.js')}}"></script>
<!--owl carousel min js-->
<script src="{{asset('assets/front-end/js/owl.carousel.min.js')}}"></script>
<!--slick min js-->
<script src="{{asset('assets/front-end/js/slick.min.js')}}"></script>
<!--magnific popup min js-->
<script src="{{asset('assets/front-end/js/jquery.magnific-popup.min.js')}}"></script>
<!--counterup min js-->
<script src="{{asset('assets/front-end/js/jquery.counterup.min.j')}}s"></script>
<!--jquery countdown min js-->
<script src="{{asset('assets/front-end/js/jquery.countdown.js')}}"></script>
<!--jquery ui min js-->
<script src="{{asset('assets/front-end/js/jquery.ui.js')}}"></script>
<!--jquery elevatezoom min js-->
<script src="{{asset('assets/front-end/js/jquery.elevatezoom.js')}}"></script>
<!--isotope packaged min js-->
<script src="{{asset('assets/front-end/js/isotope.pkgd.min.js')}}"></script>
<!--slinky menu js-->
<script src="{{asset('assets/front-end/js/slinky.menu.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('assets/front-end/js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/front-end/js/main.js')}}"></script>
<script src="{{asset('js/cartStore.js')}}"></script>

@stack('js')

</body>


<!-- Mirrored from demo.hasthemes.com/lukani-preview-v1/lukani/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Dec 2019 10:31:11 GMT -->
</html>